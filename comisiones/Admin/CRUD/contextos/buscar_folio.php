<?php
header('Content-Type: application/json; charset=utf-8');
ini_set('default_charset', 'UTF-8');
mb_internal_encoding('UTF-8');

// Verificar si se recibió el folio
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['folio']) || empty($data['folio'])) {
    echo json_encode(['success' => false, 'message' => 'Folio no proporcionado']);
    exit;
}

$folioParte = urldecode($data['folio']); // Decodifica el folio recibido

try {
    // Conexión a la base de datos
    $conn = new PDO("mysql:host=localhost;dbname=comisiones;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para obtener los datos utilizando LIKE
    $sql = "SELECT nombre_comisionado, matricula, categoria, adscripcion, puesto_comisionado, um_destino, plaza, fecha_inicio_num, fecha_termino_num 
            FROM comisiones WHERE folio LIKE :folio";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':folio', $folioParte . '%', PDO::PARAM_STR); // Usar LIKE con %
    $stmt->execute();

    // Verificar si se encontraron resultados
    if ($stmt->rowCount() > 0) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode(['success' => true, 'data' => $result]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Folio no encontrado']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error en la conexión: ' . $e->getMessage()]);
}
?>
