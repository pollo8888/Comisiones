<?php

require 'vendor/autoload.php'; // Asegúrate de incluir el autoload de PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Conexión a la base de datos (debes configurar tus propias credenciales)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cirugias";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL
$sql = "SELECT  `No_Factura`, `Proveedor`, `Fecha`, `Importe` FROM `facturas` where `PliegoID`='19' ";

$result = $conn->query($sql);

// Crear un nuevo objeto Spreadsheet
$spreadsheet = new Spreadsheet();

// Seleccionar la hoja activa
$sheet = $spreadsheet->getActiveSheet();

// Encabezados de columna
$columnHeaders = ['No_Factura', 'Proveedor', 'Fecha', 'Importe'];


// Escribir datos a partir de la fila B20
$row = 20;
while ($row_data = $result->fetch_assoc()) {
    $sheet->fromArray($row_data, NULL, 'B' . $row);
    $row++;
}

// Crear un objeto Writer para guardar el archivo Excel
$writer = new Xlsx($spreadsheet);

// Guardar el archivo Excel
$writer->save('facturas.xlsx');

// Cerrar la conexión a la base de datos
$conn->close();

echo "Archivo Excel generado exitosamente.";
?>
