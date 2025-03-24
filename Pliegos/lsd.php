<?php
function convertirNumeroATexto($numero) {
    $unidades = array('', 'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve');
    $decenas = array('', 'diez', 'veinte', 'treinta', 'cuarenta', 'cincuenta', 'sesenta', 'setenta', 'ochenta', 'noventa');
    $centenas = array('', 'cien', 'doscientos', 'trescientos', 'cuatrocientos', 'quinientos', 'seiscientos', 'setecientos', 'ochocientos', 'novecientos');

    $num = (float) $numero;

    if ($num >= 1 && $num <= 9) {
        return $unidades[$num];
    } elseif ($num >= 10 && $num <= 99) {
        if ($num % 10 == 0) {
            return $decenas[$num / 10];
        } else {
            return $decenas[floor($num / 10)] . ' y ' . convertirNumeroATexto($num % 10);
        }
    } elseif ($num >= 100 && $num <= 999) {
        if ($num % 100 == 0) {
            return $centenas[$num / 100];
        } else {
            return $centenas[floor($num / 100)] . ' ' . convertirNumeroATexto($num % 100);
        }
    } elseif ($num >= 1000 && $num <= 999999) {
        if ($num % 1000 == 0) {
            return convertirNumeroATexto($num / 1000) . ' mil';
        } elseif ($num >= 1000 && $num < 2000) {
            return 'mil ' . convertirNumeroATexto($num % 1000);
        } else {
            return convertirNumeroATexto(floor($num / 1000)) . ' mil ' . convertirNumeroATexto($num % 1000);
        }
    } else {
        // Agrega más casos según sea necesario para cantidades mayores
        return "Número no soportado";
    }
}

$cantidad = '2510';
$texto = convertirNumeroATexto($cantidad);
$dineroTexto = $texto . " pesos";

echo $dineroTexto;
?>
