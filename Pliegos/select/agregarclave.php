<?php
// agregarClave.php

// Verifica si se recibió la nueva clave
if (isset($_POST["nuevaClave"])) {
    // Conexión a la base de datos (reemplaza los valores con los de tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cirugias";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener la nueva clave desde el formulario
    $nuevaClave = $_POST["nuevaClave"];

    // Preparar la consulta SQL para la inserción
    $sql = "INSERT INTO `pclavesp` (`claveP`) VALUES ('$nuevaClave')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Clave agregada con éxito";
    } else {
        echo "Error al agregar la clave: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
