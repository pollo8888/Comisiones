<?php
// Conectar a la base de datos (reemplaza con tus propios detalles)
$mysqli = new mysqli("localhost", "root", "", "cirugias");

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

// Obtener la matrícula del formulario
$matricula = $_POST['matricula'];

// Consulta SQL para buscar el alumno por matrícula
$query = "SELECT `nombre`, `A_Paterno`, `A_Materno` FROM `alumnos` WHERE `matricula` = '$matricula'";
$result = $mysqli->query($query);

// Verificar si se encontró la matrícula
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response = array(
        'success' => true,
        'nombre' => $row['nombre'],
        'A_Paterno' => $row['A_Paterno'],
        'A_Materno' => $row['A_Materno']
    );
} else {
    $response = array('success' => false);
}

// Devolver la respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($response);

// Cerrar la conexión a la base de datos
$mysqli->close();
?>
