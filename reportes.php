<?php
// reportes.php

// Recuperar el rango de fechas desde parámetros GET
$fechaInicio = $_GET['fechaInicio'] ?? '';
$fechaFin = $_GET['fechaFin'] ?? '';

if (!$fechaInicio || !$fechaFin) {
    die("Se requieren las fechas de inicio y fin.");
}

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "citologias");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$conexion->set_charset("utf8");

// Consulta para obtener los registros dentro del rango de fechas (ajusta según corresponda)
$query = "SELECT folio, fecha_toma, nss, agregado, nombre_paciente 
          FROM memo 
          WHERE fecha_toma BETWEEN ? AND ?
          ORDER BY fecha_toma ASC";
$stmt = $conexion->prepare($query);
$stmt->bind_param("ss", $fechaInicio, $fechaFin);
$stmt->execute();
$result = $stmt->get_result();

$registros = [];
while ($row = $result->fetch_assoc()) {
    $registros[] = $row;
}
$stmt->close();
$conexion->close();

// Cargar la plantilla de Excel ("ejemplo.xlsx")
// Asegúrate de haber instalado PhpSpreadsheet mediante Composer y que "ejemplo.xlsx" esté en la misma carpeta
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

// Cargar la plantilla
$templateFile = 'ejemplo.xlsx';
$spreadsheet = IOFactory::load($templateFile);
$sheet = $spreadsheet->getActiveSheet();

// --- Inserción de filas adicionales ---
// Se asume que en la plantilla la fila 10 son los encabezados y la fila 28 es el inicio de información fija.
// Las filas para los registros deben insertarse desde la fila 11 hasta la 27 (17 filas disponibles).
$numRegistros = count($registros);
$espacioDisponible = 28 - 11; // 17 filas disponibles
if ($numRegistros > $espacioDisponible) {
    $filasExtra = $numRegistros - $espacioDisponible;
    // Inserta filas nuevas antes de la fila 28 para desplazar el contenido fijo hacia abajo.
    $sheet->insertNewRowBefore(28, $filasExtra);
}
// --- Fin inserción de filas adicionales ---

// Escribir los registros a partir de la fila 11
$fila = 11;
$contador = 1;
foreach ($registros as $registro) {
    $sheet->setCellValue("A{$fila}", $contador);
    $sheet->setCellValue("B{$fila}", $registro['folio']);
    $sheet->setCellValue("C{$fila}", $registro['fecha_toma']);
    $sheet->setCellValue("D{$fila}", $registro['nss']);
    $sheet->setCellValue("E{$fila}", $registro['agregado']);
    $sheet->setCellValue("F{$fila}", $registro['nombre_paciente']);
    $fila++;
    $contador++;
}

// Establecer el rango de los datos insertados y forzar estilo sin negrita
$ultimaFila = 10 + count($registros); // Última fila con datos
$dataRange = "A11:F{$ultimaFila}";
$sheet->getStyle($dataRange)->getFont()->setBold(false);

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$today = new DateTime();
$sheet->setCellValue("D6", "FECHA:" . $today->format("d/m/Y"));
$sheet->setCellValue("E6", $today->format("H:i"));
$randomNumber = sprintf("%04d", rand(0, 9999));
$sheet->setCellValue("E7", "MEMORANDUN N° " . $randomNumber . "UMF43-" . $today->format("d-m-Y"));



$day = date('d');
$monthNumber = date('n');
$year = date('Y');
$meses = [
    1 => 'ENERO',
    2 => 'FEBRERO',
    3 => 'MARZO',
    4 => 'ABRIL',
    5 => 'MAYO',
    6 => 'JUNIO',
    7 => 'JULIO',
    8 => 'AGOSTO',
    9 => 'SEPTIEMBRE',
    10 => 'OCTUBRE',
    11 => 'NOVIEMBRE',
    12 => 'DICIEMBRE'
];
$fechaTexto = $day . ' DE ' . $meses[$monthNumber] . ' ' . $year;
$textoA8 = "Por este medio le hago entrega de un paquete con 22 muestras de CITOLOGIAS CERVICALES debidamente requisitadas del dia " 
           . $fechaTexto 
           . " con la finalidad de que sean enviadas oportunamente al servicio de LABORATORIO DEL H.G.Z.#46 ADJUNTO DATOS DE LOS PACIENTES";
$sheet->setCellValue("A8", $textoA8);


// Configurar la salida para forzar la descarga del archivo Excel generado
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reporte.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit();
?>
