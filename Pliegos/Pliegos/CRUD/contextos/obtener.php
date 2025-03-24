<?php 
	session_start();
	include_once('../config/dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id  = $_GET['id'];
			$num_pliego = $_POST['num_pliego'];
			
			$fecha_elaboracion = $_POST['fecha_elaboracion'];
		
			$matricula_solicitante = $_POST['matricula_solicitante'];
			$nombre_solicitante = $_POST['nombre_solicitante'];
			$matricula_autoriza = $_POST['matricula_autoriza'];
			$nombre_autoriza = $_POST['nombre_autoriza'];
			$matricula_comisionado = $_POST['matricula_comisionado'];
			$nombre_comisionado = $_POST['nombre_comisionado'];
			$cargo_solicitante = $_POST['cargo'];
			$gpo_jerarquico_comisionado = $_POST['gpo_jerarquico'];
			$contratacion_del_comisionado = $_POST['cont_comisionado'];
			$selectClaveP2 = $_POST['selectClaveP'];
			$motivo_comision = $_POST['motivo_comision'];
			$lugar_comision = $_POST['lugar_comision'];
			$inicio_comision = $_POST['inicio_comision'];
			$termino_comision = $_POST['termino_comision'];
			$medio_transporte2 = $_POST['selectMedioTransporte'];
			$econ_econ2 = isset($_POST['selectNumEcon']) ? $_POST['selectNumEcon'] : null;
			$anticipo_viaticos = $_POST['anticipo_viaticos'];
			$anticipo_gastos_vehiculo = $_POST['anticipo_gastos_vehiculo'];
			$anticipo_pasajes = $_POST['anticipo_pasajes'];
			$anticipo_gastos_peaje = $_POST['anticipo_gastos_peaje'];
			$disponible_1603 = $_POST['disponible_1603'];
			$disponible_1623 = $_POST['disponible_1623'];
			$unidad_adscripcion2 = $_POST['selectUnidadAdscripcion'];
			$act_realizadas=$_POST['act_realizadas'];
			$res_obtenidos=$_POST['res_obtenidos'];

			$sql = "UPDATE pliegos SET 
			`num_pliego`='$num_pliego',
			`fecha_elaboracion`='$fecha_elaboracion',
			`matricula_solicitante`='$matricula_solicitante',
			`nombre_solicitante`='$nombre_solicitante',
			`matricula_autoriza`='$matricula_autoriza',
			`nombre_autoriza`='$nombre_autoriza',
			`matricula_comisionado`='$matricula_comisionado',
			`nombre_comisionado`='$nombre_comisionado',
			`cargo_solicitante`='$cargo_solicitante',
			`gpo_jerarquico_comisionado`='$gpo_jerarquico_comisionado',
			`contratacion_del_comisionado`='$contratacion_del_comisionado',
			`clave_presupuestal`='$selectClaveP2',
			`motivo_comision`='$motivo_comision',
			`lugar_comision`='$lugar_comision',
			`inicio_comision`='$inicio_comision',
			`termino_comision`='$termino_comision',
			`medio_transporte`='$medio_transporte2',
			`num_econ`='$econ_econ2',
			`anticipo_viaticos`='$anticipo_viaticos',
			`anticipo_gastos_vehiculo`='$anticipo_gastos_vehiculo',
			`anticipo_pasajes`='$anticipo_pasajes',
			`anticipo_gastos_peaje`='$anticipo_gastos_peaje',
			`disponible_1603`='$disponible_1603',
			`disponible_1623`='$disponible_1623',
			`unidad_adscripcion`='$unidad_adscripcion2',
			`act_realizadas`='$act_realizadas',
			`res_obtenidos`='$res_obtenidos'
			WHERE `tblid`='$id'";

			$_SESSION['message1'] = ($db->exec($sql)) ? 'Actualizado correctamente' : 'No se pudo actualizar ';

		}
		catch(PDOException $e){
			echo $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message1'] = 'Complete el formulario de edición';
	}
	header('location: ../../inicio.php');

?>
