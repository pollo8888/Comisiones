<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pantalla de Carga con Carrusel</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      text-align: center;
    }

    #loadingText {
      font-size: 36px;
      font-weight: bold;
      color: white;
      text-shadow: 0 0 10px rgb(0, 0, 0,1);
      position: absolute;
      z-index: 1; /* Asegura que el texto esté sobre el fondo */
    }


    .listo{
        text-decoration: none;
        background-color: #6cb56f;
        color: white;
        padding: 20px;
        border-radius: 10px;
    }


    .listo:hover{
        background-color: hsl(122, 33%, 80%);
    }


    #background {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-size: cover; /* Ajusta el tamaño de la imagen para cubrir completamente */
      background-position: center; /* Centra la imagen */
      z-index: -1;
    }
  </style>
</head>
<body>
  <div id="background"></div>
  <div id="loadingText">Estamos preparando todo para ti <br> <?php echo ucfirst($_SESSION['nombre']); ?></div>

  <script>
    var loadingTexts = [
    "Preparando la configuración...",
    "Solo un momento más...",
      "Cargando...",
      "¡Listo para comenzar!",
      "Solo un momento más...",
      "Preparando la configuración...",
      "¡Casi listo!",
      "Solo un momento más..."
    ];

    var index = 0;
    var loadingTextElement = document.getElementById("loadingText");
    var backgroundElement = document.getElementById("background");

    function changeText() {
      var newText = loadingTexts[index];

      if (newText === "¡Listo para comenzar!") {
        // Si el texto es "¡Listo para comenzar!", crea un enlace y detén el cambio automático
        loadingTextElement.innerHTML = '<a href="inicio.php" class="listo">' + newText + '</a>';
        clearInterval(textChangeInterval);
      } else {
        // Para otros textos, simplemente actualiza el texto
        loadingTextElement.textContent = newText;
      }

      index = (index + 1) % loadingTexts.length;
    }

    var textChangeInterval = setInterval(changeText, 4000);

    // Cambiar opacidad de fondo
    var opacity = 0.5; // Ajusta la opacidad según tus preferencias
    var images = [
            'CRUD/contextos/img/1.jpg',
            'CRUD/contextos/img/2.jpg',
            'CRUD/contextos/img/3.jpg'
            // Agrega más nombres de archivo según sea necesario
        ];


    var currentImageIndex = 0;

    function changeBackgroundOpacity() {
      backgroundElement.style.backgroundImage = 'url("' + images[currentImageIndex] + '")';
      backgroundElement.style.opacity = opacity;
      currentImageIndex = (currentImageIndex + 1) % images.length;
    }

    setInterval(changeBackgroundOpacity, 5000); // Cambia la imagen cada 5 segundos (5000 milisegundos)
  </script>
</body>
</html>
