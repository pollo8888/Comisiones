<?php
	session_start();
	include_once('../config/dbconect.php');

	if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$sql = "DELETE FROM pliegos WHERE tblid  = '".$_GET['id']."'";
			//if-else statement in executing our query
			$_SESSION['messageeliminar'] = ( $db->exec($sql) ) ? 'Registro eliminado con exito' : 'Hubo un error al borrar el registro';
		}
		catch(PDOException $e){
			$_SESSION['messageeliminar'] = $e->getMessage();
		}

		//Cerrar conexión
		$database->close();

	}
	else{
		$_SESSION['messageeliminar'] = 'Seleccione el registro para eliminar primero';
	}

	header('location: ../../inicio.php');

?>