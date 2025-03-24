<?php
$matricula1 = $_POST['matricula1'];
$nuevoNombre1 = $_POST['nuevoNombre1'];

$matricula2 = $_POST['matricula2'];
$nuevoNombreComisionado = $_POST['nuevoNombreComisionado'];

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "cirugias");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Actualizar el nombre para la primera matrícula
$sqlActualizarNombre1 = "UPDATE emppliego SET nombre = '$nuevoNombre1' WHERE matricula = '$matricula1'";

// Actualizar el nombre para la segunda matrícula
$sqlActualizarNombreComisionado = "UPDATE emppliego SET nombre = '$nuevoNombreComisionado' WHERE matricula = '$matricula2'";

$resultadoActualizarNombre1 = $conexion->query($sqlActualizarNombre1);
$resultadoActualizarNombreComisionado = $conexion->query($sqlActualizarNombreComisionado);

if ($resultadoActualizarNombre1 === TRUE && $resultadoActualizarNombreComisionado === TRUE) {
    echo "Nombres actualizados correctamente";
} else {
    echo "Error al actualizar nombres: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
