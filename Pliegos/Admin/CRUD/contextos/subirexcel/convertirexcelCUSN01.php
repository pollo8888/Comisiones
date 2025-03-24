<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['archivo'])) {
    $file = $_FILES['archivo']['tmp_name'];
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $handle = fopen($file, 'r');
    if ($handle) {
        $rowNumber = 1;
        while (($line = fgets($handle)) !== false) {
            $data = explode('|', trim($line));
            $columnNumber = 'A';
            foreach ($data as $cellValue) {
                $sheet->setCellValue($columnNumber.$rowNumber, $cellValue);
                $columnNumber++;
            }
            $rowNumber++;
        }
        fclose($handle);

        $writer = new Xlsx($spreadsheet);
        $outputFile = 'converted_file.xlsx';
        $writer->save($outputFile);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.basename($outputFile).'"');
        header('Content-Length: ' . filesize($outputFile));
        readfile($outputFile);
        unlink($outputFile);
        exit();
    } else {
        echo 'Error al abrir el archivo.';
    }
} else {
    echo 'No se ha recibido ningún archivo.';
}
