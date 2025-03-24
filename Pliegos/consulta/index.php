<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario</title>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>
    $(document).ready(function() {
      var matricula1 = '';
      var nombre1 = '';
      var matricula2 = '';
      var nombreComisionado = '';

      $('#matricula1').on('blur', function() {
        matricula1 = $(this).val();

        $.ajax({
          type: 'POST',
          url: 'consulta.php',
          data: { matricula: matricula1 },
          dataType: 'json',
          success: function(data) {
            if (data.error) {
              alert(data.error);
            } else {
              nombre1 = data.nombre;

              $('#nombre1').val(nombre1);
            }
          },
          error: function() {
            alert('Error al realizar la consulta.');
          }
        });
      });

      $('#matricula2').on('blur', function() {
        matricula2 = $(this).val();

        $.ajax({
          type: 'POST',
          url: 'consulta.php',
          data: { matricula: matricula2 },
          dataType: 'json',
          success: function(data) {
            if (data.error) {
              alert(data.error);
            } else {
              nombreComisionado = data.nombre;

              $('#nombreComisionado').val(nombreComisionado);
            }
          },
          error: function() {
            alert('Error al realizar la consulta.');
          }
        });
      });

      // Evento para el botón de envío
      $('#enviar').on('click', function() {
        var nuevoNombre1 = $('#nombre1').val();
        var nuevoNombreComisionado = $('#nombreComisionado').val();

        // Actualizar nombres en la tabla emppliego
        $.ajax({
          type: 'POST',
          url: 'actualizar.php',
          data: {
            matricula1: matricula1,
            nuevoNombre1: nuevoNombre1,
            matricula2: matricula2,
            nuevoNombreComisionado: nuevoNombreComisionado
          },
          success: function(response) {
            alert(response);
          },
          error: function() {
            alert('Error al realizar la actualización.');
          }
        });
      });
    });
  </script>
</head>
<body>

<form action="#" method="post">
  <!-- Campos para la primera matrícula -->
  <label for="matricula1">Matrícula 1:</label>
  <input type="text" id="matricula1" name="matricula1" required>
  <br>

  <label for="nombre1">Nombre 1:</label>
  <input type="text" id="nombre1" name="nombre1" required>
  <br>

  <!-- Campos para la segunda matrícula -->
  <label for="matricula2">Matrícula 2:</label>
  <input type="text" id="matricula2" name="matricula2" required>
  <br>

  <label for="nombreComisionado">Nombre del Comisionado:</label>
  <input type="text" id="nombreComisionado" name="nombreComisionado" required>
  <br>

  <input type="button" id="enviar" value="Actualizar Nombres">
</form>

</body>
</html>
