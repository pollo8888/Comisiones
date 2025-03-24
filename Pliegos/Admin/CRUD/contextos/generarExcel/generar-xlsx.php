<?php


require __DIR__ . "/vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


 
$documento = new Spreadsheet();
$nombreDelDocumento = "Estadísticas Gráficas Consumo de alimentos costos y raciones Tablero.xlsx";
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
header('Cache-Control: max-age=0');

$spreadsheet = PhpOffice\PhpSpreadsheet\IOFactory::load('plantilla.xlsx');
$worksheet = $spreadsheet->SetActiveSheetIndex(0);
$worksheet->setTitle("Est. mensual Cons. Víveres");
$worksheet->getCell("D6")->setValue("Hola");

 
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;


?>
