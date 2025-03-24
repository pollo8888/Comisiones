<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Excel</title>
    <style>
        /* Estilos generales */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Contenedor del formulario */
        .container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            padding: 20px;
            text-align: center;
        }

        /* Título */
        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        /* Etiqueta y campos */
        label {
            display: block;
            font-size: 14px;
            color: #555;
            margin-bottom: 8px;
            text-align: left;
        }

        input[type="file"] {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #fff;
            cursor: pointer;
        }

        input[type="file"]::-webkit-file-upload-button {
            padding: 8px 12px;
            background: #007BFF;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="file"]::-webkit-file-upload-button:hover {
            background: #0056b3;
        }

        /* Botón de envío */
        button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 14px;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cargar Archivo Excel</h1>
        <form action="procesar_excel.php" method="post" enctype="multipart/form-data">
            <label for="excelFile">Selecciona un archivo Excel:</label>
            <input type="file" name="excelFile" id="excelFile" accept=".xls,.xlsx" required>
            <button type="submit">Procesar Archivo</button>
        </form>
    </div>
</body>
</html>
