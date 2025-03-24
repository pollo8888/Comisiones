<?php
require 'vendor/autoload.php'; // Incluye PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['excelFile']) && $_FILES['excelFile']['error'] === UPLOAD_ERR_OK) {
        $uploadedFile = $_FILES['excelFile']['tmp_name'];

        try {
            $spreadsheet = IOFactory::load($uploadedFile);
            $worksheet = $spreadsheet->getActiveSheet();

            $newSpreadsheet = new Spreadsheet();
            $newSheet = $newSpreadsheet->getActiveSheet();
            $newSheet->setTitle('Resultados Procesados');

            $departamentoActual = '';
            $categoriaActual = '';
            $operativo = ''; // Variable para almacenar el registro operativo
            $rowIndexNew = 1; // Fila inicial en el nuevo archivo

            // Encabezados: se agregan 14 columnas para que la columna N (14ª) sea "Operativo"
            $newSheet->fromArray([
                'Departamento', 'Categoría', 'Matrícula', 'Nombre Empleado', 'Mca.', 'TUR.', 'Hor.', 'Concep', 'Matrícula Titular', 'Nombre Titular', 'Cve. Baja', 'Plaza', '', 'Operativo'
            ], NULL, 'A' . $rowIndexNew++);

            // Definición de palabras clave para identificar registros operativos
            $keywords = [
                "OPER.B", "OPERATIVA", "PROG.ESP.", "SOBRANTES", "CUB.VAC.", "BECARIOS", "BECADOS",
                "COMP.B", "COMPENSADA", "CUB.DESCA:", "RESIDENTES", "CUB.DES.B", "EVENTUAL E"
            ];

            foreach ($worksheet->getRowIterator() as $rowIndex => $row) {
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false);

                $rowData = [];
                foreach ($cellIterator as $cell) {
                    $rowData[] = $cell->getValue();
                }

                // Saltar encabezados redundantes
                if (!empty($rowData[1]) && !empty($rowData[2])) {
                    $columnaB = strtolower(trim($rowData[1]));
                    $columnaC = strtolower(trim($rowData[2]));
                    if ($columnaB === 'matricula' && $columnaC === 'nombre empleado') {
                        continue;
                    }
                }

                // Actualizar departamento y categoría
                if (!empty($rowData[1]) && strpos($rowData[1], 'DEPARTAMENTO:') !== false) {
                    $departamentoActual = str_replace('DEPARTAMENTO: ', '', trim($rowData[1]));
                    $categoriaActual = !empty($rowData[9]) ? trim($rowData[9]) : '';
                    continue;
                }

                // Procesar filas con información de empleados
                if (!empty($rowData[2]) && strpos($rowData[1], 'DEPARTAMENTO:') === false) {
                    $matricula = !empty($rowData[1]) ? trim($rowData[1]) : '';
                    $nombreEmpleado = trim($rowData[2]);

                    // Extraer datos de la columna J (índice 9) y otros adicionales
                    $columnaJ = isset($rowData[9]) ? trim($rowData[9]) : '-';
                    $columnaM = isset($rowData[12]) ? trim($rowData[12]) : '-';
                    $columnaP = isset($rowData[15]) ? trim($rowData[15]) : '-';
                    $columnaR = isset($rowData[17]) ? trim($rowData[17]) : '-';

                    // Obtener información del titular
                    $matriculaTitular = isset($rowData[21]) ? trim($rowData[21]) : '';
                    $nombreTitular = isset($rowData[27]) ? trim($rowData[27]) : '';
                    $datoAdicionalTitular = isset($rowData[36]) ? trim($rowData[36]) : '';
                    $plaza = isset($rowData[45]) ? trim($rowData[45]) : 'q';

                    // Filtrar titulares con datos irrelevantes
                    if (
                        strlen($matriculaTitular) <= 2 || strlen($nombreTitular) <= 2 ||
                        preg_match('/^(0\s*-\s*0|1\s*-\s*0|0-0|1-0)$/', "$matriculaTitular - $nombreTitular")
                    ) {
                        $matriculaTitular = '';
                        $nombreTitular = '';
                        $datoAdicionalTitular = '';
                    }

                    // Verificar si la columna J contiene una palabra clave
                    if (in_array(strtoupper($columnaJ), $keywords)) {
                        $operativo = $nombreEmpleado;
                        $operativoValor = ''; // Para la fila operativa, se deja en blanco
                    } else {
                        $operativoValor = !empty($operativo) ? $operativo : '';
                    }

                    // Agregar la información del empleado en 14 columnas (columna N para "Operativo")
                    $newSheet->fromArray([
                        $departamentoActual, 
                        $categoriaActual, 
                        $matricula, 
                        $nombreEmpleado, 
                        $columnaJ, 
                        $columnaM, 
                        $columnaP, 
                        $columnaR, 
                        $matriculaTitular, 
                        $nombreTitular, 
                        $datoAdicionalTitular, 
                        $plaza,
                        '', // Columna M vacía
                        $operativoValor
                    ], NULL, 'A' . $rowIndexNew++);
                }
            }

            // Descargar el archivo Excel generado
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="resultados_procesados.xlsx"');
            header('Cache-Control: max-age=0');

            $writer = new Xlsx($newSpreadsheet);
            $writer->save('php://output');
            exit;

        } catch (Exception $e) {
            echo 'Error al procesar el archivo: ' . htmlspecialchars($e->getMessage());
        }
    } else {
        echo "Error al cargar el archivo.";
    }
} else {
    echo "Método no permitido.";
}
?>
