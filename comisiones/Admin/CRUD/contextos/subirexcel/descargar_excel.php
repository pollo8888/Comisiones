<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comisiones";
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Cargar la plantilla de Excel
$templatePath = 'Plantilla.xlsx';  // Ruta al archivo de plantilla
$spreadsheet = IOFactory::load($templatePath);

// Seleccionar la hoja activa
$sheet = $spreadsheet->getActiveSheet();

// Consulta para obtener todos los registros de la tabla
$sql = "SELECT numero_comisiones, folio, fecha_comision_num, nombre_comisionado, matricula, telefono,  
               categoria, adscripcion, plaza, puesto_comisionado, um_destino, horas_turno,  
               fecha_inicio_num, fecha_termino_num, justificacion, estatus, fecha_solicitud,  
               medio_solicitud, fecha_recepcion_personal,Folio_Termino,Fecha_Finalizado_Termino,Entrega_Personal_Termino
        FROM comisiones";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fila inicial en la plantilla donde comenzar a escribir
    $startRow = 2;
    
    while ($row = $result->fetch_assoc()) {
        // Calcular el tiempo de comisión en días
        $fecha_inicio = new DateTime($row['fecha_inicio_num']);
        $fecha_termino = new DateTime($row['fecha_termino_num']);
        $interval = $fecha_inicio->diff($fecha_termino);
        $tiempo_comision = $interval->days; // Número de días de comisión
        
        $sheet->setCellValue("A{$startRow}", $row['numero_comisiones']);
        $sheet->setCellValue("B{$startRow}", $row['folio']);
        $sheet->setCellValue("C{$startRow}", $row['fecha_comision_num']);
        $sheet->setCellValue("D{$startRow}", $row['adscripcion']);
        $sheet->setCellValue("E{$startRow}", $row['plaza']);
        $sheet->setCellValue("F{$startRow}", $row['um_destino']);
        $sheet->setCellValue("G{$startRow}", $row['horas_turno']);
        $sheet->setCellValue("H{$startRow}", $row['puesto_comisionado']);
        $sheet->setCellValue("I{$startRow}", $row['matricula']);
        $sheet->setCellValue("J{$startRow}", $row['nombre_comisionado']);
        $sheet->setCellValue("K{$startRow}", $row['telefono']);
        $sheet->setCellValue("L{$startRow}", $row['categoria']);
        $sheet->setCellValue("M{$startRow}", $row['justificacion']);
        $sheet->setCellValue("N{$startRow}", $row['fecha_inicio_num']);
        $sheet->setCellValue("O{$startRow}", $row['fecha_termino_num']);
        $sheet->setCellValue("P{$startRow}", $tiempo_comision); // Tiempo de comisión calculado
        $sheet->setCellValue("Q{$startRow}", $row['estatus']);
        $sheet->setCellValue("R{$startRow}", $row['fecha_solicitud']);
        $sheet->setCellValue("S{$startRow}", $row['medio_solicitud']);
        $sheet->setCellValue("T{$startRow}", $row['fecha_recepcion_personal']);
        $sheet->setCellValue("U{$startRow}", $row['Folio_Termino']);
        $sheet->setCellValue("V{$startRow}", $row['Fecha_Finalizado_Termino']);
        $sheet->setCellValue("W{$startRow}", $row['Entrega_Personal_Termino']);
        $startRow++;
    }
} else {
    echo "No se encontraron datos en la base de datos.";
    exit();
}

// Cerrar la conexión a la base de datos
$conn->close();

// Configurar la descarga del archivo Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Comisiones.xlsx"');
header('Cache-Control: max-age=0');

// Crear el archivo Excel y enviarlo como descarga
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit();
?>
