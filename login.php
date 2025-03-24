<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "comisiones");

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script><script>document.addEventListener('DOMContentLoaded', function() { Swal.fire({ icon: 'error', title: 'Error de conexión', text: '" . $conexion->connect_error . "' }); });</script>";
    exit();
}

// Si se envía el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // Prevenir inyección SQL
    $usuario = $conexion->real_escape_string($usuario);
    $clave = $conexion->real_escape_string($clave);

    // Consultar la base de datos
    $sql = "SELECT `tblid`, `nombre`, `email`, `clave`, `cargo` FROM `usuarios` WHERE `email` = '$usuario' AND `clave` = '$clave'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows == 1) {
        // Inicio de sesión exitoso
        session_start();
        $fila = $resultado->fetch_assoc();
        $_SESSION['id'] = $fila['tblid'];
        $_SESSION['nombre'] = $fila['nombre'];
        $_SESSION['email'] = $fila['email'];
        $_SESSION['clave'] = $fila['clave'];
        $_SESSION['cargo'] = $fila['cargo'];

        // Lógica de redirección basada en roles
        if ($_SESSION['cargo'] == 'admin') {
            header("Location: admin_dashboard.php");
        } else if ($_SESSION['cargo'] == 'user') {
            header("Location: comisiones/index.php");
        } else {
            header("Location: dashboard.php");
        }
        exit();
    } else {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script><script>document.addEventListener('DOMContentLoaded', function() { Swal.fire({ icon: 'error', title: 'Error', text: 'Usuario o contraseña incorrectos' }); });</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    
    
    
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <img class="wave" src="img/wave.png">
    <div class="container">
        <div class="img">

        </div>
        <div class="login-content">
            <form action="" method="POST">
                <img src="img/avatar.svg">
                <h2 class="title">Bienvenido</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Usuario</h5>
                        <input type="text" name="usuario" class="input" required>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Contraseña</h5>
                        <input type="password" name="clave" class="input" required>
                    </div>
                </div>
                <a href="#">Olvidaste tu contraseña?</a>
                <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
