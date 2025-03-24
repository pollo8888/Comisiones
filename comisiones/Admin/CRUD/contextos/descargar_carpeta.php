<?php
if (isset($_GET['folder'])) {
    // Establecer la ruta de la carpeta objetivo
    $folderPath = '../' . $_GET['folder'];
    $zipFileName = basename($folderPath) . '.zip';

    // Crear un archivo ZIP temporal
    $zip = new ZipArchive;
    if ($zip->open($zipFileName, ZipArchive::CREATE) === TRUE) {
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($folderPath, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $file) {
            if (!$file->isDir()) {
                $filePath = $file->getRealPath();
                
                // Ruta relativa que excluye todo antes de `Documentos/2366/2024_2024-07-16_1`
                $relativePath = substr($filePath, strlen(realpath($folderPath)) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();

        // Descargar el archivo ZIP
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . $zipFileName . '"');
        header('Content-Length: ' . filesize($zipFileName));
        readfile($zipFileName);

        // Eliminar el archivo ZIP temporal
        unlink($zipFileName);
    } else {
        echo 'Error al crear el archivo ZIP';
    }
}
?>
