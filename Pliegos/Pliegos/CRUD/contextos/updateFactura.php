<?php
session_start();
include_once('../config/dbconect.php');

if (isset($_POST['editar'])) {
	$database = new Connection();
	$db = $database->open();
	try {
		$id  = $_GET['id'];
		$num_factura = $_POST['num_factura'];

		$proveedor = $_POST['proveedor'];

		$fecha = $_POST['fecha'];

	
		$importe = $_POST['importe'];
		$tipo_factura = $_POST['tipo_factura'];


		$sql = "UPDATE facturas 
			SET No_Factura = '$num_factura', 
				Proveedor = '$proveedor', 
				Fecha = '$fecha', 
				Importe = '$importe', 
				Tipo_factura = '$tipo_factura' 
			WHERE tblid = $id";

		$_SESSION['message1'] = ($db->exec($sql)) ? 'Actualizado correctamente' : 'No se pudo actualizar ';
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

	//Cerrar la conexión
	$database->close();
} else {
	$_SESSION['message1'] = 'Complete el formulario de edición';
}
header('location: ../../inicio.php');
