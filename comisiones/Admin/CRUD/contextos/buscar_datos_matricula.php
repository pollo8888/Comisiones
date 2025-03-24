<?php
include_once('../config/dbconect.php');

if (isset($_POST['matricula'])) {
    $matricula = $_POST['matricula'];
    $database = new Connection();
    $db = $database->open();

    try {
        // Consulta para obtener la última comisión registrada para la matrícula
        $sql = "SELECT * FROM comisiones 
                WHERE matricula = :matricula 
                ORDER BY numero_comisiones DESC 
                LIMIT 1";
        $stmt = $db->prepare($sql);
        $stmt->execute(['matricula' => $matricula]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($result) {
            // Suponiendo que $result contiene los datos de la consulta
            $numeroComisiones = isset($result['numero_comisiones']) ? (int) $result['numero_comisiones'] + 1 : 1;

            echo json_encode([
                'success' => true,
                'folio' => $result['folio'],
                'fecha_comision_num' => $result['fecha_comision_num'],
                'nombre_comisionado' => $result['nombre_comisionado'],
                'telefono' => $result['telefono'],
                'categoria' => $result['categoria'],
                'adscripcion' => $result['adscripcion'],
                'plaza' => $result['plaza'],
                'puesto_comisionado' => $result['puesto_comisionado'],
                'um_destino' => $result['um_destino'],
                'turno' => $result['turno'],
                'horas_turno' => $result['horas_turno'],
                'fecha_inicio_num' => $result['fecha_inicio_num'],
                'fecha_termino_num' => $result['fecha_termino_num'],
                'ano_comision' => $result['ano_comision'],
                'justificacion' => $result['justificacion'],
                'director' => $result['director'],
                'director_adscripcion' => $result['director_adscripcion'],
                'numero_comisiones' => $numeroComisiones,
                'estatus' => $result['estatus'],
                'fecha_solicitud' => $result['fecha_solicitud'],
                'medio_solicitud' => $result['medio_solicitud'],
                'fecha_recepcion_personal' => $result['fecha_recepcion_personal']
            ]);
        } else {
            echo json_encode(['success' => false]);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }

    // Cerrar la conexión
    $database->close();
}
?>