<?php
$matricula = $_POST['matricula'];

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "cirugias");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta SQL
$sql = "SELECT `matricula`, `nombre`, `A_Paterno`, `A_Materno`, `Cve_Cat_Pto`, `Descripcion_Categoria_Puesto`, `Depto`, `Sexo`, `Edad`, `NSS`, `RFC`, `CURP`, `Descripcion_Plaza` FROM `emppliego` WHERE `matricula` = '$matricula'";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    echo json_encode($fila);
} else {
    echo json_encode(array('error' => 'Matrícula no encontrada'));
}

// Cerrar la conexión
$conexion->close();
?>
