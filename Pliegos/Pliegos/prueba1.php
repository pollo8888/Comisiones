<?php
$fecha = "25/02/2024";

// Crea un objeto DateTime con la fecha proporcionada
$fechaObj = DateTime::createFromFormat('d/m/Y', $fecha);

// Formatea la fecha en el nuevo formato deseado
$nuevaFecha = $fechaObj->format('Y-m-d');


echo $nuevaFecha;

?>