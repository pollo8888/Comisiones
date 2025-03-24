<?php
session_start();
include_once('../../config/dbconect.php');
require_once __DIR__ . '/vendor/autoload.php'; // Asegúrate de que esta ruta sea correcta

use PhpOffice\PhpWord\TemplateProcessor;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Conexión a la base de datos y consulta
    $database = new Connection();
    $db = $database->open();
    
    $sql = "SELECT * FROM comisiones WHERE tblid = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute(['id' => $id]);
    $comision = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($comision) {
        // Ruta a la plantilla
        $templatePath = 'Ejemplo_comision.docx';
        $templateProcessor = new TemplateProcessor($templatePath);
        
        // Reemplaza todos los campos en la plantilla con los datos de la comisión usando setValues
        $templateProcessor->setValues([
            '{folio}' => htmlspecialchars($comision['folio'], ENT_QUOTES, 'UTF-8'),
            '{fecha_comision}' => htmlspecialchars($comision['fecha_comision'], ENT_QUOTES, 'UTF-8'),
            '{nombre_comisionado}' => htmlspecialchars($comision['nombre_comisionado'], ENT_QUOTES, 'UTF-8'),
            '{matricula}' => htmlspecialchars($comision['matricula'], ENT_QUOTES, 'UTF-8'),
            '{categoria}' => htmlspecialchars($comision['categoria'], ENT_QUOTES, 'UTF-8'),
            '{adscripcion}' => htmlspecialchars($comision['adscripcion'], ENT_QUOTES, 'UTF-8'),
            '{plaza}' => htmlspecialchars($comision['plaza'], ENT_QUOTES, 'UTF-8'),
            '{puesto_comisionado}' => htmlspecialchars($comision['puesto_comisionado'], ENT_QUOTES, 'UTF-8'),
            '{um_destino}' => htmlspecialchars($comision['um_destino'], ENT_QUOTES, 'UTF-8'),
            '{prueba1}' => htmlspecialchars($comision['um_destino'], ENT_QUOTES, 'UTF-8'),
            '{turno}' => htmlspecialchars($comision['turno'], ENT_QUOTES, 'UTF-8'),
            '{horas_turno}' => htmlspecialchars($comision['horas_turno'], ENT_QUOTES, 'UTF-8'),
            '{fecha_inicio}' => htmlspecialchars($comision['fecha_inicio'], ENT_QUOTES, 'UTF-8'),
            '{fecha_termino}' => htmlspecialchars($comision['fecha_termino'], ENT_QUOTES, 'UTF-8'),
            '{ano_comision}' => htmlspecialchars($comision['ano_comision'], ENT_QUOTES, 'UTF-8'),
            '{justificacion}' => htmlspecialchars($comision['justificacion'], ENT_QUOTES, 'UTF-8'),
            '{director}' => htmlspecialchars($comision['director'], ENT_QUOTES, 'UTF-8'),
            '{director_adscripcion}' => htmlspecialchars($comision['director_adscripcion'], ENT_QUOTES, 'UTF-8')
        ]);

        // Nombre del archivo de salida
        $fileName = "Comision_{$comision['folio']}.docx";

        // Guardar y enviar el archivo al navegador
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
        $templateProcessor->saveAs('php://output');
        exit;
    } else {
        echo "Comisión no encontrada.";
    }

    $database->close();
} else {
    echo "ID no proporcionado.";
}
?>