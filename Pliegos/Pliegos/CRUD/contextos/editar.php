<?php
// index.php

$depar = $_SESSION['departamento'];

// Conexión a la base de datos (reemplaza los valores con los de tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cirugias";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
	die("Conexión fallida: " . $conn->connect_error);
}


// Consulta SQL
$sql = "SELECT `tblid`, `claveP`, `Departamento` FROM `pclavesp` WHERE `Departamento` = '$depar'";
$result = $conn->query($sql);

$claves = [];
if ($result->num_rows > 0) {
	while ($rowsss = $result->fetch_assoc()) {
		$claves[] = $rowsss;
	}
}




// Guardar las opciones seleccionadas en variables
$opcionSelectClaveP = $row['clave_presupuestal'];
$opcionSelectMedioTransporte = $row['medio_transporte'];
$opcionSelectNumEcon = $row['num_econ'];
$opcionSelectUnidadAdscripcion = $row['unidad_adscripcion'];

// Consultas para otras opciones
$queryMedioTransporte = "SELECT `tblid`, `claveP`, `Departamento` FROM `pclavesp` WHERE `Departamento` = 'MedioTransporte'";
$queryNumEcon = "SELECT `tblid`, `claveP`, `Departamento` FROM `pclavesp` WHERE `Departamento` = 'NumEcon'";
$queryUnidadAdscripcion = "SELECT `tblid`, `claveP`, `Departamento` FROM `pclavesp` WHERE `Departamento` = 'UnidadAdscripcion'";

// Arrays para almacenar los resultados
$optionsMedioTransporte = [];
$optionsNumEcon = [];
$optionsUnidadAdscripcion = [];

// Obtener resultados para MedioTransporte
$result = $conn->query($queryMedioTransporte);
if ($result->num_rows > 0) {
	while ($rowsss = $result->fetch_assoc()) {
		$optionsMedioTransporte[] = $rowsss;
	}
}

// Obtener resultados para NumEcon
$result = $conn->query($queryNumEcon);
if ($result->num_rows > 0) {
	while ($rowssss = $result->fetch_assoc()) {
		$optionsNumEcon[] = $rowssss;
	}
}

// Obtener resultados para UnidadAdscripcion
$result = $conn->query($queryUnidadAdscripcion);
if ($result->num_rows > 0) {
	while ($rowsssss = $result->fetch_assoc()) {
		$optionsUnidadAdscripcion[] = $rowsssss;
	}
}

// Determinar si mostrar el contenedor de vehículo oficial
$mostrarVehiculoOficial = $opcionSelectMedioTransporte == "VEHICULO OFICIAL";

$conn->close();
?>



















<!-- Modal-edit -->
<div class="modal fade" id="editRowModal<?php echo $row['tblid']; ?>" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 1050;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h4 class="modal-title" id="myModalLabel">Editar registro</h4>
				</center>

			</div>
			<div class="modal-body">
				<div class="container-fluid">

					<form method="POST" action="CRUD/contextos/obtener.php?id=<?php echo $row['tblid']; ?>">
						<div class="row">

							<!-- NUM DE PLIEGO -->
							<div class="col-md-6 pr-0">
								<div class="form-group form-group-default">
									<label>NUM DE PLIEGO</label>
									<input name="num_pliego" value="<?php echo $row['num_pliego']; ?>" type="number" class="form-control" placeholder="Ingrese el número de pliego">
								</div>
							</div>

							<!-- FECHA ELABORACION DE PLIEGO -->
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>FECHA ELABORACION DE PLIEGO</label>
									<input name="fecha_elaboracion" value="<?php echo $row['fecha_elaboracion']; ?>" type="date" class="form-control" required>
								</div>
							</div>

							<!-- MATRICULA SOLICITANTE -->
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>MATRICULA SOLICITANTE</label>
									<input name="matricula_solicitante" value="<?php echo $row['matricula_solicitante']; ?>" type="number" class="form-control" required placeholder="Ingrese la matricula del solicitante">
								</div>
							</div>

							<!-- NOMBRE SOLICITANTE -->
							<div class="col-md-6">
								<div class="form-group form-group-default editable-field">
									<label>NOMBRE SOLICITANTE</label>
									<input name="nombre_solicitante" value="<?php echo $row['nombre_solicitante']; ?>" type="text" class="form-control" required readonly>
								</div>
							</div>

							<!-- MATRICULA AUTORIZA -->
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>MATRICULA AUTORIZA</label>
									<input name="matricula_autoriza" value="<?php echo $row['matricula_autoriza']; ?>" type="number" class="form-control" required placeholder="Ingrese la matricula del solicitante">
								</div>
							</div>

							<!-- NOMBRE AUTORIZA -->
							<div class="col-md-6">
								<div class="form-group form-group-default editable-field">
									<label>NOMBRE AUTORIZA</label>
									<input name="nombre_autoriza" value="<?php echo $row['nombre_autoriza']; ?>" type="text" class="form-control" required readonly>
								</div>
							</div>

							<!-- MATRICULA COMISIONADO -->
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>MATRICULA COMISIONADO</label>
									<input name="matricula_comisionado" value="<?php echo $row['matricula_comisionado']; ?>" type="number" class="form-control" required placeholder="Ingrese la matricula del comisionado">
								</div>
							</div>

							<!-- NOMBRE COMISIONADO -->
							<div class="col-md-6">
								<div class="form-group form-group-default editable-field">
									<label>NOMBRE COMISIONADO</label>
									<input name="nombre_comisionado" value="<?php echo $row['nombre_comisionado']; ?>" type="text" class="form-control" required readonly>
								</div>
							</div>

							<!-- CARGO SOLICITANTE -->
							<div class="col-md-6">
								<div class="form-group form-group-default editable-field1">
									<label>CARGO SOLICITANTE</label>
									<input name="cargo" value="<?php echo $row['cargo_solicitante']; ?>" type="text" class="form-control" required readonly>
								</div>
							</div>

							<!-- GPO JERARQUICO COMISIONADO -->
							<div class="col-md-6">
								<div class="form-group form-group-default editable-field1">
									<label>GPO JERARQUICO COMISIONADO</label>
									<input name="gpo_jerarquico" value="<?php echo $row['gpo_jerarquico_comisionado']; ?>" type="text" class="form-control" required readonly>
								</div>
							</div>

							<!-- CONTRATACIÓN DEL COMISIONADO -->
							<div class="col-md-6">
								<div class="form-group form-group-default editable-field1">
									<label>CONTRATACIÓN DEL COMISIONADO</label>
									<input name="cont_comisionado" value="<?php echo $row['contratacion_del_comisionado']; ?>" type="text" class="form-control" required readonly>
								</div>
							</div>

							<!-- selectClaveP -->
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label for="selectClaveP">Selecciona una clave presupuestal:</label>
									<select id="selectClaveP2" class="form-control" name="selectClaveP">
										<option value="" disabled selected>Seleccione una clave</option>
										<?php foreach ($claves as $rowsss) : ?>
											<option value="<?php echo $rowsss['claveP']; ?>" <?php echo ($rowsss['claveP'] == $opcionSelectClaveP) ? 'selected' : ''; ?>>
												<?php echo $rowsss['claveP']; ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<!-- MOTIVO DE LA COMISION -->
							<div class="col-md-12">
								<div class="form-group form-group-default">
									<label>MOTIVO DE LA COMISION</label>
									<textarea name="motivo_comision" class="form-control" required placeholder="Ingrese el motivo de la comisión"><?php echo $row['motivo_comision']; ?></textarea>
								</div>
							</div>

							<!-- LUGAR DE LA COMISION -->
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>LUGAR DE LA COMISION</label>
									<input name="lugar_comision" value="<?php echo $row['lugar_comision']; ?>" type="text" class="form-control" required placeholder="Ingrese el lugar de la comisión">
								</div>
							</div>

							<!-- INICIO COMISION -->
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>INICIO COMISION</label>
									<input name="inicio_comision" value="<?php echo $row['inicio_comision']; ?>" type="date" class="form-control" required>
								</div>
							</div>

							<!-- TERMINO COMISION -->
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>TERMINO COMISION</label>
									<input name="termino_comision" value="<?php echo $row['termino_comision']; ?>" type="date" class="form-control" required>
								</div>
							</div>

							<!-- MEDIO DE TRANSPORTE -->
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label for="selectMedioTransporte">Medio de Transporte:</label>
									<select id="selectMedioTransporte" class="form-control" name="selectMedioTransporte">
										<option value="" disabled selected>Seleccione un medio de transporte</option>
										<?php foreach ($optionsMedioTransporte as $option) : ?>
											<option value="<?php echo $option['claveP']; ?>" <?php echo ($option['claveP'] == $opcionSelectMedioTransporte) ? 'selected' : ''; ?>>
												<?php echo $option['claveP']; ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<!-- vehiculoOficialSelectContainer -->
			                <div class="col-md-6" id="vehiculoOficialSelectContainer2" style="display: <?php echo $mostrarVehiculoOficial ? 'block' : 'none'; ?>;">
                                <div class="form-group form-group-default">
                                    <label for="selectNumEcon">Número Económico:</label>
                                    <select id="selectNumEcon" class="form-control" name="selectNumEcon">
                                        <option value="" disabled selected>Seleccione un número económico</option>
                                        <?php foreach ($optionsNumEcon as $option) : ?>
                                            <option value="<?php echo $option['claveP']; ?>" <?php echo ($option['claveP'] == $opcionSelectNumEcon) ? 'selected' : ''; ?>>
                                                <?php echo $option['claveP']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

							<!-- ANTICIPO DE VIATICOS -->
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>ANTICIPO DE VIATICOS</label>
									<input name="anticipo_viaticos" value="<?php echo $row['anticipo_viaticos']; ?>" type="number" class="form-control" required step="0.01" placeholder="Ingrese el anticipo de viáticos">
								</div>
							</div>

							<!-- ANTICIPO GASTOS POR USO DE VEHICULO -->
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>ANTICIPO GASTOS POR USO DE VEHICULO</label>
									<input name="anticipo_gastos_vehiculo" value="<?php echo $row['anticipo_gastos_vehiculo']; ?>" type="number" class="form-control" step="0.01" placeholder="Ingrese el anticipo de gastos por uso de vehículo">
								</div>
							</div>

							<!-- ANTICIPO DE PASAJES -->
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>ANTICIPO DE PASAJES</label>
									<input name="anticipo_pasajes" value="<?php echo $row['anticipo_pasajes']; ?>" type="number" class="form-control" step="0.01" placeholder="Ingrese el anticipo de pasajes">
								</div>
							</div>

							<!-- ANTICIPO GASTOS DE PEAJE -->
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>ANTICIPO GASTOS DE PEAJE</label>
									<input name="anticipo_gastos_peaje" value="<?php echo $row['anticipo_gastos_peaje']; ?>" type="number" class="form-control" step="0.01" placeholder="Ingrese el anticipo de gastos de peaje">
								</div>
							</div>

							<!-- DISPONIBLE 1603 -->
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>DISPONIBLE 1603</label>
									<input name="disponible_1603" value="<?php echo $row['disponible_1603']; ?>" type="number" class="form-control" step="0.01" placeholder="Ingrese el monto">
								</div>
							</div>

							<!-- DISPONIBLE 1623 -->
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>DISPONIBLE 1623</label>
									<input name="disponible_1623" value="<?php echo $row['disponible_1623']; ?>" type="number" class="form-control" step="0.01" placeholder="Ingrese el monto">
								</div>
							</div>

							<!-- UNIDAD DE ADSCRIPCION -->
							<div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label for="selectUnidadAdscripcion">Unidad de Adscripción:</label>
                                    <select id="selectUnidadAdscripcion" class="form-control" name="selectUnidadAdscripcion">
                                        <option value="" disabled selected>Seleccione una unidad de adscripción</option>
                                        <?php foreach ($optionsUnidadAdscripcion as $option): ?>
                                            <option value="<?php echo $option['claveP']; ?>" <?php echo ($option['claveP'] == $opcionSelectUnidadAdscripcion) ? 'selected' : ''; ?>>
                                                <?php echo $option['claveP']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>


							
						<div class="form-group form-group-default">
							<label>ACTIVIDADES REALIZADAS</label>
							<textarea name="act_realizadas" id=""  cols="60" rows="5"><?php echo $row['act_realizadas']; ?></textarea>
						</div>




						<div class="form-group form-group-default">
							<label>RESULTADOS OBTENIDOS</label>
							<textarea name="res_obtenidos" id="" cols="60" rows="5"><?php echo $row['res_obtenidos']; ?></textarea>
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
<div class="modal fade" id="deleteRowModal<?php echo $row['tblid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
				<h2 class="text-center"><?php echo $row['tblid']; ?></h2>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
				<a href="CRUD/contextos/BorrarRegistro.php?id=<?php echo $row['tblid']; ?>" class="btn btn-danger"><span class="fa fa-times"></span> Eliminar</a>
			</div>

		</div>
	</div>
</div>