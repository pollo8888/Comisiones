<?php
require 'Admin/assets/db/config.php';
if(isset($_POST['login'])) {
    $errMsg = '';

    // Get data from FORM
    $usuario = $_POST['usuario'];
    
    $clave = $_POST['clave'];

    if($usuario == '')
      $errMsg = 'Digite su usuario';
    if($clave == '')
      $errMsg = 'Digite su contraseña';

    if($errMsg == '') {
      try {
$stmt = $connect->prepare('SELECT id, nombre, usuario, email,clave, cargo,departamento FROM usuarios WHERE usuario = :usuario ');


        $stmt->execute(array(
          ':usuario' => $usuario
          
          
          ));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if($data == false){
          $errMsg = "Usuario $usuario no encontrado.";
        }
        else {
          if($clave == $data['clave']) {

            $_SESSION['id'] = $data['id'];
            $_SESSION['nombre'] = $data['nombre'];
            $_SESSION['usuario'] = $data['usuario'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['clave'] = $data['clave'];
            $_SESSION['cargo'] = $data['cargo'];
            
            $_SESSION['departamento'] = $data['departamento'];
            
    if($_SESSION['cargo'] == 1){
          header('Location: Admin/index.php');
        }else if($_SESSION['cargo'] == 2){
          header('Location: Usuario/index.php');
        }else if($_SESSION['cargo'] == 3){
          header('Location: Pliegos/index.php');
        }else if($_SESSION['cargo'] == 4){
          header('Location: Admin/simf.php');
        }
        
        
            exit;
          }
          else
            $errMsg = 'Contraseña incorrecta.';
        }
      }
      catch(PDOException $e) {
        $errMsg = $e->getMessage();
      }
    }
  }
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css "href="Admin/assets/css/style.css">
    <link rel="stylesheet" type="text/css "href="Admin/assets/css/css/all.min.css">
    <link rel="stylesheet" href="Admin/assets/css/sweetalert.css">
	<link rel="icon" href="Admin/assets/img/logo1.svg" type="image/x-icon"/>
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
   <!--  <img class="wave"src="../assets/img/wave.png" alt="">  -->
    <div class="contenedor">
    <div class="img">
    <img src="Admin/assets/img/bg.svg" alt="">
    </div>
    <div class="contenido-login">

    <form autocomplete="off" method="POST"  role="form">

    <img src="Admin/assets/img/logo1.svg" alt="">
    <h2>Login</h2>
    <?php
    if(isset($errMsg)){
    echo '<div style="color:#FF0000;text-align:center;font-size:20px;">'.$errMsg.'</div>';  
         }
?>
    <div class="input-div nit">
    <div class="i">
    <i class="fas fa-user"></i>
    </div>
    <div class="div">

     <input type="text"  name="usuario" value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario'] ?>" autocomplete="off" placeholder="USUARIO">
    </div>
    </div>
    <div class="input-div pass">
    <div class="i">
    <i class="fas fa-lock"></i>
    </div>
    <div class="div">

    <input type="password" required="true" name="clave" value="<?php if(isset($_POST['clave'])) echo MD5($_POST['clave']) ?>" placeholder="CONTRASEÑA" >
    </div>
    </div>
    <div class="row" id="load" hidden="hidden">
      <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
        <img src="Admin/assets/img/load.gif" width="100%" alt="">
      </div>
      <div class="col-xs-12 center text-accent">
        <span>Validando información...</span>
      </div>
        </div>
   
   
    <button class="btn" name='login' type="submit"> Iniciar sesion
    </button> 
	
    </form>
     <div id="msg_error" class="alert alert-danger" role="alert" style="display: none"></div>

    </div>
    </div>
     <script src="Admin/assets/js/jquery.js"></script>
    <script src="Admin/assets/js/sweetalert.min.js"></script>
    <!-- Js personalizado -->
    
	
</body>

</html>
