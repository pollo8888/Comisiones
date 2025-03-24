<?php 
	session_start();
	include_once('../config/dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id  = $_GET['id'];
			$tipo_movimiento = $_POST['tipo_movimiento'];
			$matricula = $_POST['matricula'];
			$a_paterno = $_POST['a_paterno'];
			$a_materno = $_POST['a_materno'];
			$nombre = $_POST['nombre'];
			$cedula_prof = $_POST['cedula_prof'];
			$c_electronicoi = $_POST['c_electronico'];
			$t_prestador_a = $_POST['t_prestador_a'];
			$cl_usr_asig_simf = $_POST['cl_usr_asig_simf'];
			$cl_ser_o_esp = $_POST['cl_ser_o_esp'];
			$des_ser_esp = $_POST['des_ser_esp'];
			$cons_simf = $_POST['cons_simf'];
			$cons_sias = $_POST['cons_sias'];
			$turno_sias = $_POST['turno_sias'];
			$hr_tr_x_turno = $_POST['hr_tr_x_turno'];
			$t_vista = $_POST['t_vista'];
			$i_f_agnda_c = $_POST['i_f_agnda_c'];
			$i_f_atncion = $_POST['i_f_atncion'];
			$intervalor = $_POST['intervolor'];
			$f_inicio = $_POST['f_inicio'];
			$f_final = $_POST['f_final'];
			$f_apl_mov_simf = $_POST['f_aplic_mov_simf'];
			$matricula_p_r_m_simf = $_POST['matricula_p_r_m_simf'];
			$nom_p_r_m_simf = $_POST['nom_p_r_m_simf'];
			$mov_aplicado_ct = $_POST['mov_aplicado_ct'];
			$v_b_usrojefe = $_POST['v_b_usrojefe'];
			$ticket_mes_st = $_POST['ticket_mes_st'];
			$status_mesa_st = $_POST['status_mesa_st'];
			$observa_jus_auto = $_POST['observa_jus_auto'];

			$sql = "UPDATE simf SET 
			`Tipo_Movimiento`='$tipo_movimiento',
			`Matricula`='$matricula',
			`A_Paterno`='$a_paterno',
			`A_Materno`='$a_materno',
			`Nombre`='$nombre',
			`Cedula_prof`='$cedula_prof',
			`C_ElectronicoI`='$c_electronicoi',
			`T_Prestador_A`='$t_prestador_a',
			`Cl_Usr_Asig_simf`='$cl_usr_asig_simf',
			`Cl_ser_o_esp`='$cl_ser_o_esp',
			`Des_Ser_esp`='$des_ser_esp',
			`Cons_Simf`='$cons_simf',
			`Cons_Sias`='$cons_sias',
			`Turno_sias`='$turno_sias',
			`Hr_tr_x_turno`='$hr_tr_x_turno',
			`T_vista`='$t_vista',
			`I_F_Agnda_C`='$i_f_agnda_c',
			`I_F_Atncion`='$i_f_atncion',
			`Intervalor`='$intervalor',
			`F_inicio`='$f_inicio',
			`F_final`='$f_final',
			`F_apl_mov_simf`='$f_apl_mov_simf',
			`Matricula_p_r_m_simf`='$matricula_p_r_m_simf',
			`Nom_p_r_m_simf`='$nom_p_r_m_simf',
			`Mov_aplicado_ct`='$mov_aplicado_ct',
			`V_b_usrojefe`='$v_b_usrojefe',
			`Ticket_Mes_sT`='$ticket_mes_st',
			`Status_mesa_sT`='$status_mesa_st',
			`Observa_Jus_Auto`='$observa_jus_auto'
			WHERE `tblid`='$id'";
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

	header('location: ../../simf.php');

?>