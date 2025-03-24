<?php
// Conexión a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'cirugias');

// Obtener la matrícula enviada desde JavaScript
$mprm = $_POST['mprm'];

// Escapar la matrícula para evitar inyección de SQL (usar la función adecuada según tu conexión)
$mprm = mysqli_real_escape_string($conexion, $mprm);

// Consultar la base de datos
$query = "SELECT nombre,A_Materno,A_Paterno FROM alumnos WHERE matricula = '$mprm'";
$resultado = mysqli_query($conexion, $query);

// Verificar si se encontraron resultados
if (mysqli_num_rows($resultado) > 0) {
  $alumno2 = mysqli_fetch_assoc($resultado);
  echo json_encode($alumno2);
} else {
  echo json_encode(null);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>