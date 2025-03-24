<?php
$campo_tipo = $_POST['campo_tipo'];

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "comisiones");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener valores guardados para el campo específico
$sql = "SELECT valor FROM justificaciones WHERE tipo_campo = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $campo_tipo);
$stmt->execute();
$result = $stmt->get_result();

$options = '<option value="">Seleccione o ingrese uno nuevo</option>';
while ($row = $result->fetch_assoc()) {
    $options .= '<option value="' . htmlspecialchars($row['valor']) . '">' . htmlspecialchars($row['valor']) . '</option>';
}

echo $options;

$stmt->close();
$conn->close();
?>
