<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['excel_file'])) {
    $file = $_FILES['excel_file']['tmp_name'];

    $spreadsheet = IOFactory::load($file);
    $sheet = $spreadsheet->getActiveSheet();

    $columnA = [];
    $columnB = [];

    foreach ($sheet->getRowIterator() as $row) {
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false);

        $cells = [];
        foreach ($cellIterator as $cell) {
            $cells[] = $cell->getValue();
        }

        $columnA[] = $cells[0]; // Columna A
        $columnB[] = $cells[1]; // Columna B
    }

    $differences = [];
    for ($i = 0; $i < count($columnA); $i++) {
        if ($columnA[$i] !== $columnB[$i]) {
            $differences[] = [
                'row' => $i + 1,
                'column_a' => $columnA[$i],
                'column_b' => $columnB[$i]
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Subir archivo de Excel</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="excel_file">Seleccione el archivo de Excel:</label>
        <input type="file" name="excel_file" id="excel_file" required>
        <button type="submit">Subir y analizar</button>
    </form>

    <?php if (!empty($differences)): ?>
        <h2>Datos diferentes entre la columna A y B</h2>
        <table border="1">
            <tr>
                <th>Fila</th>
                <th>Columna A</th>
                <th>Columna B</th>
            </tr>
            <?php foreach ($differences as $difference): ?>
                <tr>
                    <td><?php echo htmlspecialchars($difference['row']); ?></td>
                    <td><?php echo htmlspecialchars($difference['column_a']); ?></td>
                    <td><?php echo htmlspecialchars($difference['column_b']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
        <p>No hay diferencias entre las columnas A y B.</p>
    <?php endif; ?>
</body>
</html>
