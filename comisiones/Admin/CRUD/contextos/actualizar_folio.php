<?php
header('Content-Type: application/json; charset=utf-8');

$data = json_decode(file_get_contents("php://input"), true);

// Validar datos recibidos
if (
    !isset($data['foliotermino']) || empty($data['foliotermino']) ||
    !isset($data['fecha_termino_t']) || empty($data['fecha_termino_t']) ||
    !isset($data['folio_foliodelter']) || empty($data['folio_foliodelter'])
) {
    echo json_encode(['success' => false, 'message' => 'Faltan datos para la actualización.']);
    exit;
}

$foliotermino = $data['foliotermino'];
$fechaTermino = $data['fecha_termino_t'];
$folioFiltro = $data['folio_foliodelter'];

try {
    // Conexión a la base de datos
    $conn = new PDO("mysql:host=localhost;dbname=comisiones;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para actualizar los datos
    $sql = "UPDATE comisiones 
            SET Folio_Termino = :foliotermino, 
                Fecha_Finalizado_Termino = :fechaTermino, 
                Entrega_Personal_Termino = :fechaTermino 
            WHERE folio = :folioFiltro";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':foliotermino', $foliotermino, PDO::PARAM_STR);
    $stmt->bindParam(':fechaTermino', $fechaTermino, PDO::PARAM_STR);
    $stmt->bindParam(':folioFiltro', $folioFiltro, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Registro actualizado correctamente.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'No se pudo actualizar el registro.']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error en la conexión: ' . $e->getMessage()]);
}
