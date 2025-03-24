<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección con Alerta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        select {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<select id="miSelect" onchange="verificarSeleccion()">
    <option value="opcion1">Opción 1</option>
    <option value="opcion2">Opción 2</option>
    <option value="opcion3">Opción 3</option>
    <option value="opcion4">Opción 4</option>
</select>

<script>
    

    let contador = 0;
    
    function verificarSeleccion() {
        const select = document.getElementById("miSelect");
        const valorSeleccionado = select.value;
        
        if (valorSeleccionado === "opcion4") {
            contador++;
            console.log(contador);
            if (contador === 1) {
                alert("¡Seleccionaste la opción 4 cuatro veces seguidas!");
                // Reiniciar el contador después de la alerta
                contador = 0;
            }
        } else {
            // Reiniciar el contador si se elige otra opción
            contador = 0;
        }
    }
</script>

</body>
</html>
