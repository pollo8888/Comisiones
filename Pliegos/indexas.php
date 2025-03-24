<?php
function convertirA24Horas($fechaHora12) {
    // Reemplazar "p. m." por "pm" y "a. m." por "am"
    $fechaHora12 = str_replace(['p. m.', 'a. m.'], ['pm', 'am'], $fechaHora12);

    // Crear un objeto DateTime a partir de la cadena de fecha y hora en formato de 12 horas
    $dateTime = DateTime::createFromFormat('d/m/Y h:i:s a', $fechaHora12);
    
    // Si la conversión falla, devuelve un mensaje de error
    if (!$dateTime) {
        return "Formato de fecha y hora no válido";
    }
    
    // Convertir el objeto DateTime a una cadena de fecha y hora en formato de 24 horas
    $fechaHora24 = $dateTime->format('d/m/Y H:i:s');
    
    return $fechaHora24;
}

// Ejemplo de uso
$fechaHora12 = "15/04/2024  06:55:00 a. m.";
$fechaHora24 = convertirA24Horas($fechaHora12);
echo $fechaHora24; // Salida: 28/03/2024 17:35:00
?>
