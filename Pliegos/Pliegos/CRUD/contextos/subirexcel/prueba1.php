<?php
// Incluir la clase de PHPSpreadsheet
require 'vendor/autoload.php';

// Crear la conexión a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'cirugias');

// Verificar la conexión
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

// Ruta al archivo Excel en el servidor
$excelFilePath = 'prueba1.xlsx';

// Cargar el archivo Excel
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($excelFilePath);

// Seleccionar la primera hoja (puedes cambiar el índice si tienes varias hojas)
$worksheet = $spreadsheet->getActiveSheet();

// Obtener la última fila con datos
$highestRow = $worksheet->getHighestDataRow();

// Preparar la consulta SQL de inserción
$insertQuery = "INSERT INTO `emppliego` (`matricula`, `nombre`, `Cve_Cat_Pto`, `Descripcion_Categoria_Puesto`, `Depto`, `Desc_Depto`, `Sexo`, `Edad`, `NSS`, `RFC`, `CURP`, `Descripcion_Plaza`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Preparar la declaración
$insertStatement = $conexion->prepare($insertQuery);

// Verificar si la preparación fue exitosa
if ($insertStatement === false) {
    die('Error de preparación: ' . $conexion->error);
}

// Vincular los parámetros
$insertStatement->bind_param("ssssssssssss", $matricula, $nombreCom1, $cveCatPto, $descripcionCatPuesto, $depto, $descDepto, $sexo, $edad, $nss, $rfc, $curp, $descripcionPlaza);

// Recorrer las filas y obtener los datos
for ($row = 2; $row <= $highestRow; ++$row) {
    // Obtener los datos de cada columna
    $matricula = $worksheet->getCell('A' . $row)->getValue();
    $nombreCompleto = $worksheet->getCell('B' . $row)->getValue();
    $cveCatPto = $worksheet->getCell('D' . $row)->getValue();
    $descripcionCatPuesto = $worksheet->getCell('E' . $row)->getValue();
    $depto = $worksheet->getCell('G' . $row)->getValue();
    $descDepto = $worksheet->getCell('H' . $row)->getValue();
    $sexo = $worksheet->getCell('I' . $row)->getValue();
    $edad = $worksheet->getCell('K' . $row)->getValue();
    $nss = $worksheet->getCell('N' . $row)->getValue();
    $rfc = $worksheet->getCell('O' . $row)->getValue();
    $curp = $worksheet->getCell('P' . $row)->getValue();
    $descripcionPlaza = $worksheet->getCell('Q' . $row)->getValue();

    // Separar el nombre completo en apellido paterno, apellido materno y nombre
    $nombresSeparados = explode('/', $nombreCompleto);

    // Asegurar que existen al menos tres partes (apellido paterno, apellido materno y nombre)
    $apellidoPaterno = isset($nombresSeparados[0]) ? $nombresSeparados[0] : '';
    $apellidoMaterno = isset($nombresSeparados[1]) ? $nombresSeparados[1] : '';
    $nombre = isset($nombresSeparados[2]) ? $nombresSeparados[2] : '';



    $nombreCom1=$nombre." ".$apellidoPaterno." ".$apellidoMaterno;
    // Verificar la presencia de las palabras "Confianza" o "Base" en la columna Q
    if (stripos($descripcionPlaza, 'Confianza') !== false) {
        $descripcionPlaza = 'CONFIANZA';
    } elseif (stripos($descripcionPlaza, 'Base') !== false) {
        $descripcionPlaza = 'BASE';
    }

    // Ejecutar la consulta de inserción
    $insertStatement->execute();
}

// Cerrar la declaración
$insertStatement->close();

// Cerrar la conexión
$conexion->close();

echo "Datos insertados correctamente en la tabla emppliego.";
?>
