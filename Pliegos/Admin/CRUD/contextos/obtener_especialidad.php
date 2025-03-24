<?php
// Conexión a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'cirugias');

// Obtener la matrícula enviada desde JavaScript
$cluasigec = $_POST['cluasigec'];

// Escapar la matrícula para evitar inyección de SQL (usar la función adecuada según tu conexión)
$cluasigec = mysqli_real_escape_string($conexion, $cluasigec);

// Consultar la base de datos
$query = "SELECT id,especialidad FROM especialidad WHERE id = '$cluasigec'";
$resultado = mysqli_query($conexion, $query);

// Verificar si se encontraron resultados
if (mysqli_num_rows($resultado) > 0) {
  $alumno1 = mysqli_fetch_assoc($resultado);
  echo json_encode($alumno1);
} else {
  echo json_encode(null);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>