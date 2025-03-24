<?php
require 'vendor/autoload.php'; // Carga la librería PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_FILES['archivo']) && !empty($_FILES['archivo']['tmp_name'])) {
    // Archivo subido correctamente, comienza el procesamiento

    // Obtener el archivo subido
    $archivo_subido = $_FILES['archivo']['tmp_name'];

    // Leer el contenido del archivo
    $contenido_archivo = file_get_contents($archivo_subido);

    // Convertir el contenido a un array de filas
    $filas = explode(PHP_EOL, $contenido_archivo);

    // Crear un nuevo objeto Spreadsheet
    $spreadsheet = new Spreadsheet();
    $hoja = $spreadsheet->getActiveSheet();

    // Recorrer las filas y añadir cada celda a la hoja de cálculo
    foreach ($filas as $indice_fila => $fila) {
        // Convertir la fila a un array de celdas
        $celdas = explode('|', $fila);

        // Añadir cada celda a la hoja de cálculo
        foreach ($celdas as $indice_celda => $valor_celda) {
            // Eliminar "12:00:00 a. m." de los valores en la columna O
            if ($indice_celda == 14) {
                $valor_celda = str_replace(' 12:00:00 a. m.', '', $valor_celda);
            }
            $hoja->setCellValueByColumnAndRow($indice_celda + 1, $indice_fila + 1, $valor_celda);
        }
    }

    // Crear un objeto Writer para guardar el archivo Excel en memoria
    $writer = new Xlsx($spreadsheet);

    // Establecer las cabeceras necesarias para forzar la descarga del archivo
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="archivo_excel.xlsx"');
    header('Cache-Control: max-age=0');

    // Descargar el archivo
    $writer->save('php://output');
    exit;
} else {
    // No se ha subido ningún archivo
    echo "Por favor, selecciona un archivo para subir.";
}
?>
