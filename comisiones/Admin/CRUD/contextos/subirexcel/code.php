<?php
session_start();
require 'vendor/autoload.php'; // Asegúrate de tener PhpSpreadsheet instalado

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

// Conexión a la base de datos
$host = 'localhost'; // Cambia esto a tu configuración de base de datos
$dbname = 'comisiones';
$user = 'root';
$password = '';
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verifica si se ha subido un archivo
if (isset($_POST['save_excel_data'])) {
    $file_mimes = array('application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    
    if (isset($_FILES['import_file']['name']) && in_array($_FILES['import_file']['type'], $file_mimes)) {
        
        $fileName = $_FILES['import_file']['tmp_name'];
        
        // Cargar el archivo Excel
        $spreadsheet = IOFactory::load($fileName);
        $sheet = $spreadsheet->getActiveSheet();
        $rowCount = 0;

        // Iterar sobre cada fila en el archivo Excel
        foreach ($sheet->getRowIterator(2) as $row) { // Comienza en la fila 2 para evitar el encabezado
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            
            // Obtener valores de cada celda
            $matricula = $sheet->getCell('A' . $row->getRowIndex())->getValue();
            $nombre = $sheet->getCell('B' . $row->getRowIndex())->getValue();
            $categoria_puesto = $sheet->getCell('C' . $row->getRowIndex())->getValue();

            // Insertar en la base de datos si los valores no están vacíos
            if (!empty($matricula) && !empty($nombre) && !empty($categoria_puesto)) {
                $stmt = $conn->prepare("INSERT INTO maestro (matricula, nombre, categoria_puesto) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $matricula, $nombre, $categoria_puesto);
                $stmt->execute();
                $rowCount++;
            }
        }

        // Mensaje de éxito y redirección
        $_SESSION['message'] = "Archivo Excel subido con éxito. Se importaron $rowCount registros.";
        header('Location: ../../../subirexcel.php');
        exit();
    } else {
        $_SESSION['message'] = "Por favor, sube un archivo Excel válido.";
        header('Location: ../../../subirexcel.php');
        exit();
    }
}
?>
