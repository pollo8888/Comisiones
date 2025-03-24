<?php
session_start();
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comisiones";

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Establecer la codificación de caracteres a UTF-8
$conn->set_charset("utf8");

// Arreglo de meses en español
$meses_espanol = array(
    'January' => 'Enero', 'February' => 'Febrero', 'March' => 'Marzo', 'April' => 'Abril',
    'May' => 'Mayo', 'June' => 'Junio', 'July' => 'Julio', 'August' => 'Agosto',
    'September' => 'Septiembre', 'October' => 'Octubre', 'November' => 'Noviembre', 'December' => 'Diciembre'
);

// Función para convertir la fecha a texto en español usando el array
function fechaEnTexto($fecha, $meses, $con_anio = true) {
    $formato = $con_anio ? 'd \d\e F \d\e Y' : 'd \d\e F';
    $fecha_formateada = date($formato, strtotime($fecha));
    foreach ($meses as $en => $es) {
        $fecha_formateada = str_replace($en, $es, $fecha_formateada);
    }
    return $fecha_formateada;
}

// Verificar si el formulario fue enviado
if (isset($_POST['comisiones_excel'])) {
    $file_mimes = array('application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    if (isset($_FILES['import_file']['name']) && in_array($_FILES['import_file']['type'], $file_mimes)) {

        $spreadsheet = IOFactory::load($_FILES['import_file']['tmp_name']);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        foreach ($sheetData as $index => $row) {
            // Saltar la fila de encabezado
            if ($index == 0) continue;

            // Verificar si las columnas críticas están vacías para detener el procesamiento
            if (empty($row[2]) && empty($row[3]) && empty($row[13]) && empty($row[14]) && empty($row[17]) && empty($row[19])) break;

            // Mapea las columnas de Excel a los campos de la base de datos, formateando las fechas
            $numero_comisiones = $row[0];
            $folio = $row[1];
            $fecha_comision_num = !empty($row[2]) ? date("Y-m-d", strtotime($row[2])) : null;
            $fecha_comision = !empty($fecha_comision_num) ? fechaEnTexto($fecha_comision_num, $meses_espanol, true) : null;
            $nombre_comisionado = $row[9];
            $matricula = $row[8];
            $telefono = $row[10];
            $categoria = $row[11];
            $adscripcion = $row[3];
            $plaza = $row[4];
            $puesto_comisionado = $row[7];
            $um_destino = $row[5];
            $horas_turno = $row[6];
            $fecha_inicio_num = !empty($row[13]) ? date("Y-m-d", strtotime($row[13])) : null;
            $fecha_inicio = !empty($fecha_inicio_num) ? fechaEnTexto($fecha_inicio_num, $meses_espanol, false) : null;
            $fecha_termino_num = !empty($row[14]) ? date("Y-m-d", strtotime($row[14])) : null;
            $fecha_termino = !empty($fecha_termino_num) ? fechaEnTexto($fecha_termino_num, $meses_espanol, false) : null;
            $justificacion = $row[12];
            $estatus = $row[16];
            $fecha_solicitud = !empty($row[17]) ? date("Y-m-d", strtotime($row[17])) : null;
            $medio_solicitud = $row[18];
            $fecha_recepcion_personal = !empty($row[19]) ? date("Y-m-d", strtotime($row[19])) : null;

            // Insertar en la base de datos
            $sql = "INSERT INTO comisiones (
                numero_comisiones, folio, fecha_comision_num, fecha_comision, nombre_comisionado, matricula, telefono, 
                categoria, adscripcion, plaza, puesto_comisionado, um_destino, horas_turno, 
                fecha_inicio_num, fecha_inicio, fecha_termino_num, fecha_termino, justificacion, estatus, fecha_solicitud, 
                medio_solicitud, fecha_recepcion_personal
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param(
                "isssssssssssssssssssss",
                $numero_comisiones, $folio, $fecha_comision_num, $fecha_comision, $nombre_comisionado, $matricula, 
                $telefono, $categoria, $adscripcion, $plaza, $puesto_comisionado, $um_destino, 
                $horas_turno, $fecha_inicio_num, $fecha_inicio, $fecha_termino_num, $fecha_termino, $justificacion, 
                $estatus, $fecha_solicitud, $medio_solicitud, $fecha_recepcion_personal
            );

            if (!$stmt->execute()) {
                $_SESSION['message'] = "Error al guardar el registro de la fila $index: " . $stmt->error;
                break;
            }
        }

        $_SESSION['message'] = "SUBIDO CON EXITO";
        header("Location: ../../../subirexcel.php");
        exit();
    } else {
        $_SESSION['message'] = "Formato de archivo no soportado. Solo se permiten archivos Excel.";
        header("Location: ../../../subirexcel.php");
        exit();
    }
}
?>
