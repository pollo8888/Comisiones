<?php
	session_start();
	include_once('../../config/dbconect.php');

	if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$sql = "DELETE FROM pclavesp WHERE tblid  = '".$_GET['id']."'";
			//if-else statement in executing our query
			$_SESSION['messageeliminar'] = ( $db->exec($sql) ) ? 'usuarios Borrada' : 'Hubo un error al borrar el usuario';
		}
		catch(PDOException $e){
			$_SESSION['messageeliminar'] = $e->getMessage();
		}

		//Cerrar conexión
		$database->close();

	}
	else{
		$_SESSION['messageeliminar'] = 'Seleccionar miembro para eliminar primero';
	}

	header('location: ../../../index.php');

?>