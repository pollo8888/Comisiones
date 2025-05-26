<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comisiones";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Error de conexión: ' . $conn->connect_error]);
    exit;
}

// Función para convertir fechas
function fechaEnTexto($fecha, $incluye_anio = true) {
    $meses_espanol = [
        'January' => 'enero', 'February' => 'febrero', 'March' => 'marzo',
        'April' => 'abril', 'May' => 'mayo', 'June' => 'junio',
        'July' => 'julio', 'August' => 'agosto', 'September' => 'septiembre',
        'October' => 'octubre', 'November' => 'noviembre', 'December' => 'diciembre'
    ];
    $timestamp = strtotime($fecha);
    $mes = $meses_espanol[date("F", $timestamp)];
    $dia = date("d", $timestamp);
    $anio = date("Y", $timestamp);
    return $incluye_anio ? "$dia de $mes del $anio" : "$dia de $mes";
}

// Obtener datos
$folio = $_POST['folio'];
$fecha_comision_num = $_POST['fecha_comision_num'];
$nombre_comisionado = $_POST['nombre_comisionado'];
$matricula = $_POST['matricula'];
$telefono = $_POST['telefono'];
$categoria = $_POST['categoria'];
$adscripcion = $_POST['adscripcion'];
$plaza = $_POST['plaza'];
$puesto_comisionado = $_POST['puesto_comisionado'];
$um_destino = $_POST['um_destino'];
$turno = $_POST['turno'];
$horas_turno = $_POST['horas_turno'];
$fecha_inicio_num = $_POST['fecha_inicio_num'];
$fecha_termino_num = $_POST['fecha_termino_num'];
$ano_comision = $_POST['ano_comision'];
$justificacion = $_POST['justificacion'];
$director = $_POST['director'];
$director_adscripcion = $_POST['director_adscripcion'];
$numero_comisiones = $_POST['numero_comisiones'];
$estatus = $_POST['estatus'];
$fecha_solicitud = $_POST['fecha_solicitud'];
$medio_solicitud = $_POST['medio_solicitud'];
$fecha_recepcion_personal = $_POST['fecha_recepcion_personal'];

// Fechas en texto
$fecha_comision = fechaEnTexto($fecha_comision_num);
$fecha_inicio = fechaEnTexto($fecha_inicio_num, false);
$fecha_termino = fechaEnTexto($fecha_termino_num, false);

// Insertar en la BD
$sql = "INSERT INTO comisiones (
    folio, fecha_comision_num, fecha_comision, nombre_comisionado, matricula, telefono, categoria,
    adscripcion, plaza, puesto_comisionado, um_destino, turno, horas_turno, 
    fecha_inicio_num, fecha_inicio, fecha_termino_num, fecha_termino, ano_comision, justificacion, 
    director, director_adscripcion, numero_comisiones, estatus, fecha_solicitud, 
    medio_solicitud, fecha_recepcion_personal
) VALUES (
    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssssssssssssssssss",
    $folio, $fecha_comision_num, $fecha_comision, $nombre_comisionado, $matricula, $telefono, $categoria,
    $adscripcion, $plaza, $puesto_comisionado, $um_destino, $turno, $horas_turno,
    $fecha_inicio_num, $fecha_inicio, $fecha_termino_num, $fecha_termino, $ano_comision, $justificacion,
    $director, $director_adscripcion, $numero_comisiones, $estatus, $fecha_solicitud,
    $medio_solicitud, $fecha_recepcion_personal
);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al guardar: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
