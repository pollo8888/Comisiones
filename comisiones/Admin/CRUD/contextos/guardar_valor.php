<?php
$tipo_campo = $_POST['tipo_campo'];
$valor = $_POST['valor'];

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "comisiones");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Insertar valor solo si no existe ya
$sql = "INSERT IGNORE INTO justificaciones (valor, tipo_campo) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $valor, $tipo_campo);

if ($stmt->execute()) {
    echo "Valor guardado correctamente";
} else {
    echo "Error al guardar el valor";
}

$stmt->close();
$conn->close();
?>
