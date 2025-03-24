<?php
session_start();
include_once('../../config/dbconect.php');
require_once __DIR__ . '/vendor/autoload.php'; // Asegúrate de que esta ruta sea correcta

use PhpOffice\PhpWord\TemplateProcessor;

if (isset($_GET['folio_termino'])) {
    $folioTermino = $_GET['folio_termino'];
    
    // Conexión a la base de datos
    $database = new Connection();
    $db = $database->open();
    
    // Consulta para obtener los datos
    $sql = "SELECT 
                folio,
                fecha_comision,
                fecha_comision_num,
                nombre_comisionado,
                matricula,
                categoria,
                adscripcion,
                plaza,
                puesto_comisionado,
                um_destino,
                fecha_inicio,
                fecha_termino,
                Folio_Termino,
                numero_comisiones,
                Fecha_Finalizado_Termino
            FROM comisiones WHERE Folio_Termino = :folioTermino";
    $stmt = $db->prepare($sql);
    $stmt->execute(['folioTermino' => $folioTermino]);
    $comision = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($comision) {
        // Función para convertir la fecha en texto
        function convertirFechaTexto($fecha) {
            $meses = [
                '01' => 'enero', '02' => 'febrero', '03' => 'marzo', '04' => 'abril',
                '05' => 'mayo', '06' => 'junio', '07' => 'julio', '08' => 'agosto',
                '09' => 'septiembre', '10' => 'octubre', '11' => 'noviembre', '12' => 'diciembre'
            ];
            $fechaObj = new DateTime($fecha);
            $dia = $fechaObj->format('d');
            $mes = $meses[$fechaObj->format('m')];
            $anio = $fechaObj->format('Y');
            return "$dia de $mes de $anio";
        }

        $fechaFinalTexto = convertirFechaTexto($comision['Fecha_Finalizado_Termino']);
        $hospitalComision = $comision['puesto_comisionado'] . " " . $comision['um_destino'];

        // Ruta a la plantilla
        $templatePath = 'Ejemplo_termino.docx';
        $templateProcessor = new TemplateProcessor($templatePath);

        // Reemplazar los valores en la plantilla
        $templateProcessor->setValues([
            '{folio_termino}' => htmlspecialchars($comision['Folio_Termino'], ENT_QUOTES, 'UTF-8'),
            '{folio}' => htmlspecialchars($comision['folio'], ENT_QUOTES, 'UTF-8'),
            '{nombre_comisionado}' => htmlspecialchars($comision['nombre_comisionado'], ENT_QUOTES, 'UTF-8'),
            '{matricula}' => htmlspecialchars($comision['matricula'], ENT_QUOTES, 'UTF-8'),
            '{categoria}' => htmlspecialchars($comision['categoria'], ENT_QUOTES, 'UTF-8'),
            '{adscripcion}' => htmlspecialchars($comision['adscripcion'], ENT_QUOTES, 'UTF-8'),
            '{unidad}' => htmlspecialchars($hospitalComision, ENT_QUOTES, 'UTF-8'),
            '{fecha_inicio}' => htmlspecialchars($comision['fecha_inicio'], ENT_QUOTES, 'UTF-8'),
            '{fecha_termino}' => htmlspecialchars($fechaFinalTexto, ENT_QUOTES, 'UTF-8'),
            '{plaza}' => htmlspecialchars($comision['plaza'], ENT_QUOTES, 'UTF-8'),
            '{fecha_de_termino}' => htmlspecialchars($fechaFinalTexto, ENT_QUOTES, 'UTF-8'),
            '{adscripcion1}' => htmlspecialchars($comision['adscripcion'], ENT_QUOTES, 'UTF-8')
        ]);

        // Directorio de almacenamiento de documentos
        $upload_dir = '../../Documentos';
        $folder_name = "{$comision['folio']}_{$comision['fecha_comision_num']}_{$comision['numero_comisiones']}";
        $folder_path = "$upload_dir/$folder_name";

        // Crear la carpeta si no existe
        if (!is_dir($folder_path)) {
            mkdir($folder_path, 0777, true);
        }

        // Nombre del archivo de salida
        $fileName = "Termino_Comision_{$comision['Folio_Termino']}.docx";
        $filePath = "$folder_path/$fileName";

        // Guardar el archivo en la carpeta específica
        $templateProcessor->saveAs($filePath);

        // Enviar el archivo para descargar en el navegador
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
        header("Content-Transfer-Encoding: binary");
        header("Expires: 0");
        header("Cache-Control: must-revalidate");
        header("Pragma: public");
        readfile($filePath);
        exit; // Terminar la ejecución después de enviar el archivo
    }

    $database->close();
} else {
    header("HTTP/1.1 400 Bad Request");
    exit; // Terminar ejecución si no hay un folio_termino proporcionado
}
?>
