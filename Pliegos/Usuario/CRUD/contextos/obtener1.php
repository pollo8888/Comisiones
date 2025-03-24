<?php
	session_start();
	include_once('../config/dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id  = $_GET['id'];
			$nombre=$_POST['nombre'];
			$usuario=$_POST['usuario'];
			$email=$_POST['email'];
			$clave=$_POST['clave'];
			$cargo=$_POST['cargo'];
			$departamentoss=$_POST['departamentoss'];
			
			$sql = "UPDATE usuarios SET nombre = '$nombre',usuario = '$usuario',email = '$email',clave = '$clave',cargo = '$cargo', departamento = '$departamentoss' WHERE id = '$id'";
			//if-else statement in executing our query
			$_SESSION['message1'] = ( $db->exec($sql) ) ? 'Actualizado correctamente' : 'No se pudo actualizar ';

		}
		catch(PDOException $e){
			$_SESSION['message1'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message1'] = 'Complete el formulario de edición';
	}

	header('location: ../../index.php');

?>