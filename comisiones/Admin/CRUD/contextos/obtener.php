<?php
session_start();
include_once('../config/dbconect.php');

if (isset($_POST['editar'])) {
    $database = new Connection();
    $db = $database->open();
    try {
        $id = $_GET['id'];
        
        // Obtener datos del formulario
        $folio = $_POST['folio'];
        $fecha_comision_num = $_POST['fecha_comision_num'];
        $nombre_comisionado = $_POST['nombre_comisionado'];
        $matricula = $_POST['matricula'];
        $telefono = $_POST['telefono'];
        $categoria = $_POST['categoria'];
        $adscripcion = $_POST['adscripcion'];
        $plaza = $_POST['plaza'];
        $puesto_comisionado = $_POST['puesto_comisionado'];
        $um_destino = $_POST['um_destino'];
        $turno = $_POST['turno'];
        $horas_turno = $_POST['horas_turno'];
        $fecha_inicio_num = $_POST['fecha_inicio_num'];
        $fecha_termino_num = $_POST['fecha_termino_num'];
        $ano_comision = $_POST['ano_comision'];
        $director = $_POST['director'];
        $director_adscripcion = $_POST['director_adscripcion'];
        $numero_comisiones = $_POST['numero_comisiones'];
        $estatus = $_POST['estatus'];
        $fecha_solicitud = $_POST['fecha_solicitud'];
        $medio_solicitud = $_POST['medio_solicitud'];
        $fecha_recepcion_personal = $_POST['fecha_recepcion_personal'];
        $justificacion = $_POST['justificacion'];
        
        // Nuevos campos añadidos
        $folio_termino = $_POST['folio_termino'];
        $fecha_finalizado = $_POST['fecha_finalizado'];
        $entrega_personal_termino = $_POST['entrega_personal_termino'];

        // Array de meses en español
        $meses_espanol = [
            'January' => 'enero', 'February' => 'febrero', 'March' => 'marzo', 'April' => 'abril',
            'May' => 'mayo', 'June' => 'junio', 'July' => 'julio', 'August' => 'agosto',
            'September' => 'septiembre', 'October' => 'octubre', 'November' => 'noviembre', 'December' => 'diciembre'
        ];

        // Función para convertir fecha numérica a texto en español
        function fechaEnTexto($fecha, $meses_espanol, $incluye_anio = true) {
            $timestamp = strtotime($fecha);
            $mes_ingles = date("F", $timestamp);
            $mes_espanol = $meses_espanol[$mes_ingles];
            $dia = date("d", $timestamp);

            if ($incluye_anio) {
                $anio = date("Y", $timestamp);
                return "$dia de $mes_espanol del $anio";
            } else {
                return "$dia de $mes_espanol";
            }
        }

        // Convertimos las fechas en texto en español
        $fecha_comision = fechaEnTexto($fecha_comision_num, $meses_espanol, true);
        $fecha_inicio = fechaEnTexto($fecha_inicio_num, $meses_espanol, false);
        $fecha_termino = fechaEnTexto($fecha_termino_num, $meses_espanol, false);

        // Directorio de almacenamiento de documentos
        $upload_dir = '../Documentos';
        $folder_name = "$folio"."_"."$fecha_comision_num"."_"."$numero_comisiones";
        $folder_path = "$upload_dir/$folder_name";

        $folder_url = ''; // Inicializar para que sea vacío si no hay archivos

        // Verificar si se han subido archivos antes de crear la carpeta y mover archivos
        if (isset($_FILES['archivos']) && !empty($_FILES['archivos']['name'][0])) {
            // Crear carpeta si no existe
            if (!is_dir($folder_path)) {
                mkdir($folder_path, 0777, true);
            }

            // Procesar archivos subidos
            $uploaded_files = [];
            foreach ($_FILES['archivos']['tmp_name'] as $key => $tmp_name) {
                $file_name = $_FILES['archivos']['name'][$key];
                $file_path = "$folder_path/$file_name";

                // Mover archivo al destino
                if (move_uploaded_file($tmp_name, $file_path)) {
                    $uploaded_files[] = $file_path;
                }
            }

            // Guardar la ruta de la carpeta en la base de datos solo si hay archivos subidos
            if (!empty($uploaded_files)) {
                $folder_url = "Documentos/$folder_name";
            }
        }

        // Actualizar la base de datos, asignando la ruta solo si hay documentos
        $sql = "UPDATE comisiones SET 
            `folio` = '$folio',
            `fecha_comision_num` = '$fecha_comision_num',
            `fecha_comision` = '$fecha_comision',
            `nombre_comisionado` = '$nombre_comisionado',
            `matricula` = '$matricula',
            `telefono` = '$telefono',
            `categoria` = '$categoria',
            `adscripcion` = '$adscripcion',
            `plaza` = '$plaza',
            `puesto_comisionado` = '$puesto_comisionado',
            `um_destino` = '$um_destino',
            `turno` = '$turno',
            `horas_turno` = '$horas_turno',
            `fecha_inicio_num` = '$fecha_inicio_num',
            `fecha_inicio` = '$fecha_inicio',
            `fecha_termino_num` = '$fecha_termino_num',
            `fecha_termino` = '$fecha_termino',
            `ano_comision` = '$ano_comision',
            `director` = '$director',
            `director_adscripcion` = '$director_adscripcion',
            `numero_comisiones` = '$numero_comisiones',
            `estatus` = '$estatus',
            `fecha_solicitud` = '$fecha_solicitud',
            `medio_solicitud` = '$medio_solicitud',
            `fecha_recepcion_personal` = '$fecha_recepcion_personal',
            `justificacion` = '$justificacion',
            `documentos` = '$folder_url',
            `Folio_Termino` = '$folio_termino',
            `Fecha_Finalizado_Termino` = '$fecha_finalizado',
            `Entrega_Personal_Termino` = '$entrega_personal_termino'
            WHERE `tblid` = '$id'";

        // Ejecutar la consulta SQL
        $_SESSION['message1'] = ($db->exec($sql)) ? 'Actualizado correctamente' : 'No se pudo actualizar';

    } catch(PDOException $e) {
        $_SESSION['message1'] = $e->getMessage();
    }

    // Cerrar la conexión
    $database->close();
} else {
    $_SESSION['message1'] = 'Complete el formulario de edición';
}

header('location: ../../inicio.php');
?>
