<?php
if (isset($_GET['file'])) {
    // Salir de la carpeta `descargas` y entrar en la carpeta `uploads`
    $file = urldecode($_GET['file']);
    $file_path = '../uploads/' . basename($file);

    if (file_exists($file_path)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename=' . basename($file_path));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
        unlink($file_path); // Eliminar el archivo temporal después de la descarga
        exit;
    } else {
        echo "El archivo no existe.";
    }
} else {
    echo "No se proporcionó ningún archivo para descargar.";
}
?>
