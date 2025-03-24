<?php
// Conexión a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'cirugias');

// Obtener la matrícula enviada desde JavaScript
$matricula = $_POST['matricula'];

// Escapar la matrícula para evitar inyección de SQL (usar la función adecuada según tu conexión)
$matricula = mysqli_real_escape_string($conexion, $matricula);

// Consultar la base de datos
$query = "SELECT nombre,edad,A_Materno,A_Paterno,CElectronico,Tipo_de_Prestador,Clave_de_Usuario_asignada,Clave_Servicio,Des_Especialidad FROM alumnos WHERE matricula = '$matricula'";
$resultado = mysqli_query($conexion, $query);

// Verificar si se encontraron resultados
if (mysqli_num_rows($resultado) > 0) {
  $alumno = mysqli_fetch_assoc($resultado);
  echo json_encode($alumno);
} else {
  echo json_encode(null);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>