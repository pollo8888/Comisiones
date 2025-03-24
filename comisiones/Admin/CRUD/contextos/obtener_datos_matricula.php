<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comisiones";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Error de conexión a la base de datos"]);
    exit();
}

// Obtener la matrícula desde la solicitud POST
$matricula = $_POST['matricula'];

// Consultar nombre, categoría y el último número de comisiones
$sql = "SELECT nombre, categoria_puesto, COALESCE(MAX(numero_comisiones), 0) AS lastNumeroComisiones
        FROM maestro
        LEFT JOIN comisiones ON maestro.matricula = comisiones.matricula
        WHERE maestro.matricula = ?
        GROUP BY maestro.matricula, maestro.nombre, maestro.categoria_puesto";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $matricula);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombre = $row['nombre'];
    $categoria = $row['categoria_puesto'];
    $nextNumeroComisiones = $row['lastNumeroComisiones'] + 1; // Incrementar en 1

    echo json_encode([
        "success" => true,
        "nombre" => $nombre,
        "categoria" => $categoria,
        "nextNumeroComisiones" => $nextNumeroComisiones
    ]);
} else {
    echo json_encode(["success" => false, "message" => "No se encontró información para la matrícula ingresada."]);
}

$stmt->close();
$conn->close();
?>
