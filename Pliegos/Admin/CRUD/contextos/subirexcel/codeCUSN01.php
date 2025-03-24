<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;

// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cirugias";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_POST['save_excel_data'])) {
    $file = $_FILES['import_file']['tmp_name'];
    $fileType = $_FILES['import_file']['type'];
    $fileName = $_FILES['import_file']['name'];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    // Validar tipo de archivo
    $allowedExtensions = ['txt', 'xls', 'xlsx'];
    if (!in_array($fileExtension, $allowedExtensions)) {
        session_start();
        $_SESSION['error_message'] = 'Solo se permiten archivos .txt, .xls y .xlsx';
        header('Location: ../../../CUSN01.php');
        exit;
    }

    // Leer archivo y validar encabezados
    $requiredHeaders = ['indice', 'aniom', 'mesm', 'idDel', 'cvePresupuestal', 'tipoServicio', 'AFILIACION', 'AGREGADO', 'NOMBRE', 'EDAD_SEM', 'ADSCRIP', 'NO_ADS', 'FEING', 'HRING', 'FEEGR', 'HREGR', 'TPEGR', 'DIAGNOS', 'REGINTQ', 'CAMA', 'origen', 'AFILIACION_texto', 'edad_anios', 'cve_especialidad_ingreso', 'cve_especialidad_egreso', 'cve_tipo_egreso', 'des_tipo_egreso', 'cve_envio', 'des_envio', 'cve_motivo_egreso', 'des_motivo_egreso'];

    if ($fileExtension === 'txt') {
        $fileContent = file_get_contents($file);
        $rows = explode("\n", $fileContent);
        $headers = explode('|', trim($rows[0]));
    } else {
        $spreadsheet = IOFactory::load($file);
        $worksheet = $spreadsheet->getActiveSheet();
        $headers = [];
        foreach ($worksheet->getRowIterator(1, 1) as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            foreach ($cellIterator as $cell) {
                $headers[] = $cell->getValue();
            }
        }
    }

    $missingHeaders = array_diff($requiredHeaders, $headers);

    if (!empty($missingHeaders)) {
        session_start();
        $_SESSION['error_message'] = 'El archivo no contiene los encabezados requeridos: ' . implode(', ', $missingHeaders);
        header('Location: ../../../CUSN01.php');
        exit;
    }

    $spreadsheet = IOFactory::load($file);
    $worksheet = $spreadsheet->getActiveSheet();

    // Obtener el número de la última fila
    $highestRow = $worksheet->getHighestRow();

    // Array para almacenar las horas por clave presupuestal
    $denominator_hours_by_key = [];
    $numerator_hours_by_key = [];
    // Variables para almacenar el total global de horas
    $total_denominator_hours = 0;
    $total_numerator_hours = 0;

    for ($row = 2; $row <= $highestRow; $row++) {
        $date1 = $worksheet->getCell('O' . $row)->getValue();
        $date2 = $worksheet->getCell('M' . $row)->getValue();
        $key = $worksheet->getCell('E' . $row)->getValue();
        $age = $worksheet->getCell('W' . $row)->getValue(); // Columna W para la edad

        // Filtrar por edad entre 18 y 150 años
        if ($age < 18 || $age > 150) {
            continue; // Saltar las filas que no cumplen con el criterio de edad
        }

        // Verificar si las fechas son numéricas
        if (is_numeric($date1) && is_numeric($date2)) {
            // Convertir el valor numérico de Excel a timestamp
            $date1_obj = DateTime::createFromFormat('U', ($date1 - 25569) * 86400);
            $date2_obj = DateTime::createFromFormat('U', ($date2 - 25569) * 86400);
        } else {
            // Intentar convertir las fechas con el primer formato
            $date1_obj = DateTime::createFromFormat('d/m/Y h:i:sA', str_replace([' a. m.', ' p. m.'], ['AM', 'PM'], $date1));
            $date2_obj = DateTime::createFromFormat('d/m/Y h:i:sA', str_replace([' a. m.', ' p. m.'], ['AM', 'PM'], $date2));

            // Si falla, intentar con el segundo formato
            if (!$date1_obj) {
                $date1_obj = DateTime::createFromFormat('d/m/Y H:i', $date1);
            }
            if (!$date2_obj) {
                $date2_obj = DateTime::createFromFormat('d/m/Y H:i', $date2);
            }
        }

        // Verificar si la conversión fue exitosa
        if (!$date1_obj || !$date2_obj) {
            echo "Error en la conversión de fechas en la fila $row.<br>";
            continue;
        }

        // Asegurarse de que la fecha de inicio sea anterior a la fecha de fin
        if ($date1_obj > $date2_obj) {
            $temp = $date1_obj;
            $date1_obj = $date2_obj;
            $date2_obj = $temp;
        }

        // Calcular la diferencia en segundos entre las dos fechas
        $interval = $date2_obj->getTimestamp() - $date1_obj->getTimestamp();

        // Convertir el intervalo a horas
        $total_hours = $interval / 3600;

        // Para el denominador, agregamos las horas calculadas a la clave presupuestal correspondiente
        if (!isset($denominator_hours_by_key[$key])) {
            $denominator_hours_by_key[$key] = 0;
        }
        $denominator_hours_by_key[$key] += $total_hours;

        // Sumar al total global de horas del denominador
        $total_denominator_hours += $total_hours;

        // Para el numerador, filtrar las fechas mayores a 12 horas
        if ($total_hours > 12) {
            if (!isset($numerator_hours_by_key[$key])) {
                $numerator_hours_by_key[$key] = 0;
            }
            $numerator_hours_by_key[$key] += $total_hours;

            // Sumar al total global de horas del numerador
            $total_numerator_hours += $total_hours;
        }
    }

    // Crear un nuevo archivo de Excel
    $outputSpreadsheet = new Spreadsheet();
    $outputWorksheet = $outputSpreadsheet->getActiveSheet();

    // Escribir los encabezados
    $headers = ['Unidad', 'Clave Presupuestal', 'Numerador (Horas)', 'Denominador (Horas)', 'Porcentaje (%)'];
    $col = 'A';
    foreach ($headers as $header) {
        $outputWorksheet->setCellValue($col . '1', $header);
        $outputWorksheet->getColumnDimension($col)->setAutoSize(true);
        $col++;
    }

    // Aplicar formato a los encabezados
    $headerStyleArray = [
        'font' => [
            'bold' => true,
            'color' => ['argb' => 'FFFFFF'],
        ],
        'alignment' => [
            'horizontal' => Alignment::HORIZONTAL_CENTER,
            'vertical' => Alignment::VERTICAL_CENTER,
        ],
        'fill' => [
            'fillType' => Fill::FILL_SOLID,
            'startColor' => ['argb' => '4CAF50'],
        ],
    ];
    $outputWorksheet->getStyle('A1:E1')->applyFromArray($headerStyleArray);

    // Variables para el total global
    $row = 2;

    // Escribir los datos para cada clave presupuestal
    foreach ($denominator_hours_by_key as $key => $denominator_hours) {
        // Obtener el nombre de la unidad
        $sql = "SELECT Unidadd FROM tblunidades WHERE ClavePresupues = '$key'";
        $result = $conn->query($sql);
        $unit_name = $result->fetch_assoc()['Unidadd'];

        $outputWorksheet->setCellValue("A$row", $unit_name);
        $outputWorksheet->setCellValue("B$row", $key);

        if (isset($numerator_hours_by_key[$key])) {
            $numerator_hours = $numerator_hours_by_key[$key];
            $percentage = ($numerator_hours / $denominator_hours) * 100;
        } else {
            $numerator_hours = 0;
            $percentage = 0;
        }

        $outputWorksheet->setCellValue("C$row", $numerator_hours);
        $outputWorksheet->setCellValue("D$row", $denominator_hours);
        $outputWorksheet->setCellValue("E$row", $percentage);

        $row++;
    }

    // Escribir el total global
    $outputWorksheet->setCellValue("A$row", 'Total Global');
    $outputWorksheet->setCellValue("C$row", $total_numerator_hours);
    $outputWorksheet->setCellValue("D$row", $total_denominator_hours);

    if ($total_denominator_hours > 0) {
        $global_percentage = ($total_numerator_hours / $total_denominator_hours) * 100;
    } else {
        $global_percentage = 0;
    }

    $outputWorksheet->setCellValue("E$row", $global_percentage);

    // Aplicar borde a todas las celdas
    $allBorders = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['argb' => '000000'],
            ],
        ],
    ];
    $outputWorksheet->getStyle('A1:E' . $row)->applyFromArray($allBorders);


    // Guardar el archivo temporalmente en la carpeta uploads
    $temp_file = 'uploads/resultados_CUSN01_' . time() . '.xlsx';
    $writer = new Xlsx($outputSpreadsheet);
    $writer->save($temp_file);

    // Cerrar la conexión a la base de datos
    $conn->close();

    // Guardar la ruta del archivo temporal en la sesión para acceder a él en la respuesta
    session_start();
    $_SESSION['temp_file'] = $temp_file;

    // Redirigir de vuelta a la página del formulario con un mensaje de éxito
    $_SESSION['message'] = "Archivo generado con éxito. Haga clic en aceptar para descargar.";
    header('Location: ../../../CUSN01.php');
    exit;
}
