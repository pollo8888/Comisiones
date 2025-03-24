<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

if (isset($_FILES['files'])) {
    $files = $_FILES['files'];
    $fileCount = count($files['name']);

    for ($i = 0; $i < $fileCount; $i++) {
        $fileTmpPath = $files['tmp_name'][$i];
        $fileName = $files['name'][$i];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        if ($fileExtension == 'xls' || $fileExtension == 'xlsx') {
            $spreadsheet = IOFactory::load($fileTmpPath);
            $newFileName = pathinfo($fileName, PATHINFO_FILENAME) . '.csv';

            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $newFileName . '"');
            header('Cache-Control: max-age=0');

            $writer = IOFactory::createWriter($spreadsheet, 'Csv');
            $writer->save('php://output');
        } else {
            echo "El archivo $fileName no es un archivo .xls o .xlsx válido.<br>";
        }
    }
    exit;
} else {
    echo "No se han subido archivos.";
}
?>
