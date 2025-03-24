<?php
// Conectar a la base de datos (reemplaza con tus propios detalles)
$mysqli = new mysqli("localhost", "root", "", "cirugias");

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

// Obtener la matrícula del formulario
$matricula = $_POST['matricula'];

// Consulta SQL para buscar el empleado por matrícula
$query = "SELECT `nombre`, `Cve_Cat_Pto`, `Descripcion_Categoria_Puesto`, 
            `Depto`, `Desc_Depto`, `Sexo`, `Edad`, `NSS`, `RFC`, `CURP`, `Descripcion_Plaza`
          FROM `emppliego` WHERE `matricula` = '$matricula'";

$result = $mysqli->query($query);

// Verificar si se encontró la matrícula
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response = array(
        'success' => true,
        'nombre' => $row['nombre'],
        'Cve_Cat_Pto' => $row['Cve_Cat_Pto'],
        'Descripcion_Categoria_Puesto' => $row['Descripcion_Categoria_Puesto'],
        'Depto' => $row['Depto'],
        'Desc_Depto' => $row['Desc_Depto'],
        'Sexo' => $row['Sexo'],
        'Edad' => $row['Edad'],
        'NSS' => $row['NSS'],
        'RFC' => $row['RFC'],
        'CURP' => $row['CURP'],
        'Descripcion_Plaza' => $row['Descripcion_Plaza']
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
