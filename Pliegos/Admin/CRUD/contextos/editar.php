	<!-- Modal-edit -->
	<div class="modal fade" id="editRowModal<?php echo $row['tblid']; ?>" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">
							Editar</span>

					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">


					<form method="POST" action="CRUD/contextos/obtener.php?id=<?php echo $row['tblid']; ?>">

						<input class="form-control" name="id" type="hidden" value=<?php echo $row['tblid']; ?>>
						<div class="row">

							<div class="col-md-6 pr-0">
								<div class="form-group form-group-default">
									<label>Tipo_Movimiento</label>
									<input name="tipo_movimiento" value="<?php echo $row['Tipo_Movimiento']; ?>" type="text" class="form-control" required placeholder="Ingrese Autor">
								</div>
							</div>


							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Matrícula</label>
									<input name="matricula" value="<?php echo $row['Matricula']; ?>" type="text" class="form-control" required placeholder="Ingrese la matrícula">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Apellido Paterno</label>
									<input name="a_paterno" value="<?php echo $row['A_Paterno']; ?>" type="text" class="form-control" required placeholder="Ingrese el apellido paterno">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Apellido Materno</label>
									<input name="a_materno" value="<?php echo $row['A_Materno']; ?>" type="text" class="form-control" required placeholder="Ingrese el apellido materno">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Nombre</label>
									<input name="nombre" value="<?php echo $row['Nombre']; ?>" type="text" class="form-control" required placeholder="Ingrese el nombre">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Cédula Profesional</label>
									<input name="cedula_prof" value="<?php echo $row['Cedula_prof']; ?>" type="text" class="form-control" required placeholder="Ingrese la cédula profesional">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Correo Electrónico</label>
									<input name="c_electronico" value="<?php echo $row['C_ElectronicoI']; ?>" type="email" class="form-control" required placeholder="Ingrese el correo electrónico">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Tipo de Prestador de Servicio</label>
									<input name="t_prestador_a" value="<?php echo $row['T_Prestador_A']; ?>" type="text" class="form-control" required placeholder="Ingrese el tipo de prestador de servicio">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Clave de Usuario Asignado en SIMF</label>
									<input name="cl_usr_asig_simf" value="<?php echo $row['Cl_Usr_Asig_simf']; ?>" type="text" class="form-control" required placeholder="Ingrese la clave de usuario asignado en SIMF">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Clave de Servicio o Especialidad</label>
									<input name="cl_ser_o_esp" value="<?php echo $row['Cl_ser_o_esp']; ?>" type="text" class="form-control" required placeholder="Ingrese">
								</div>

							</div>
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Descripción del Servicio o Especialidad</label>
									<input name="des_ser_esp" value="<?php echo $row['Des_Ser_esp']; ?>" type="text" class="form-control" required placeholder="Ingrese">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Consulta SIMF</label>
									<input name="cons_simf" value="<?php echo $row['Cons_Simf']; ?>" type="text" class="form-control" required placeholder="Ingrese">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Consulta SIAS</label>
									<input name="cons_sias" value="<?php echo $row['Cons_Sias']; ?>" type="text" class="form-control" required placeholder="Ingrese">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Turno SIAS</label>
									<input name="turno_sias" value="<?php echo $row['Turno_sias']; ?>" type="text" class="form-control" required placeholder="Ingrese">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Horas trabajadas por turno</label>
									<input name="hr_tr_x_turno" value="<?php echo $row['Hr_tr_x_turno']; ?>" type="text" class="form-control" required placeholder="Ingrese">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Tipo de Vista</label>
									<input name="t_vista" value="<?php echo $row['T_vista']; ?>" type="text" class="form-control" required placeholder="Ingrese">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Intervalo de Agendamiento</label>
									<input name="intervolor" value="<?php echo $row['Intervalor']; ?>" type="text" class="form-control" required placeholder="Ingrese">
								</div>
							</div>


							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Fecha Inicio</label>
									<input name="f_inicio" value="<?php echo $row['F_inicio']; ?>" type="date" class="form-control" required>
								</div>

							</div>
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Fecha Final</label>
									<input name="f_final" value="<?php echo $row['F_final']; ?>" type="date" class="form-control" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Fecha de Aplicación del Movimiento en SIMF</label>
									<input name="f_aplic_mov_simf" value="<?php echo $row['F_apl_mov_simf']; ?>" type="date" class="form-control" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Matricula del Profesor o Residente que Mueve en SIMF</label>
									<input name="matricula_p_r_m_simf" value="<?php echo $row['Matricula_p_r_m_simf']; ?>" type="text" class="form-control" required placeholder="Ingrese">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Nombre del Profesor o Residente que Mueve en SIMF</label>
									<input name="nom_p_r_m_simf" value="<?php echo $row['Nom_p_r_m_simf']; ?>" type="text" class="form-control" required placeholder="Ingrese">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Movimiento Aplicado en Carga de Trabajo</label>
									<input name="mov_aplicado_ct" value="<?php echo $row['Mov_aplicado_ct']; ?>" type="text" class="form-control" required placeholder="Ingrese">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Validado por el Jefe Inmediato del Usuario</label>
									<input name="v_b_usrojefe" value="<?php echo $row['V_b_usrojefe']; ?>" type="text" class="form-control" required placeholder="Ingrese">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Ticket de Mesa de Servicios ST</label>
									<input name="ticket_mes_st" value="<?php echo $row['Ticket_Mes_sT']; ?>" type="text" class="form-control" required placeholder="Ingrese">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Ticket de Mesa de Servicios ST 2</label>
									<input name="i_f_atncion" value="<?php echo $row['I_F_Atncion']; ?>" type="text" class="form-control" required placeholder="Ingrese">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Ticket de Mesa de Servicios ST 3</label>
									<input name="i_f_agnda_c" value="<?php echo $row['I_F_Agnda_C']; ?>" type="text" class="form-control" required placeholder="Ingrese">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Status de la Mesa de Servicios ST</label>
									<input name="status_mesa_st" value="<?php echo $row['Status_mesa_sT']; ?>" type="text" class="form-control" required placeholder="Ingrese">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group form-group-default">
									<label>Observaciones o Justificación Automática</label>
									<textarea name="observa_jus_auto" class="form-control" rows="3" required><?php echo $row['Observa_Jus_Auto']; ?></textarea>
								</div>
							</div>


						</div>

				</div>
				<div class="modal-footer no-bd">
					<button type="submit" name="editar" class="btn btn-primary">Editar

					</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				</div>
				</form>
			</div>
		</div>
	</div>


	<!-- Delete -->
	<div class="modal fade" id="deleteRowModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center>
						<h4 class="modal-title" id="myModalLabel"></h4>
					</center>
				</div>
				<div class="modal-body">
					<p class="text-center">¿Esta seguro de borrar el registro con el id?</p>
					<h2 class="text-center"><?php echo $row['id']; ?></h2>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
					<a href="CRUD/contextos/BorrarRegistro.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="fa fa-times"></span> Eliminar</a>
				</div>

			</div>
		</div>
	</div>