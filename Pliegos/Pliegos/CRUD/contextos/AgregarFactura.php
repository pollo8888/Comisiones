<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index: 1050;">
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">

				<center>
					<h4 class="modal-title" id="myModalLabel">Nueva Factura</h4>
				</center>
			</div>
			<div class="modal-body">
				<div class="container-fluid">

					<div class="card-body">
						<form method="POST" autocomplete="off" enctype="multipart/form-data">
							<div class="row">

								<div class="col-md-6 pr-0">
									<div class="form-group form-group-default">
										<label>N° Factura</label>
										<input name="num_factura"  type="text" class="form-control" placeholder="Ingrese el N° Factura" required>
									</div>
								</div>

								<div class="col-md-6 pr-0">
									<div class="form-group form-group-default">
										<label>Proveedor</label>
										<input name="proveedor"  type="text" class="form-control" placeholder="Ingrese el Proveedor" required>
									</div>
								</div>




								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Fecha</label>
										<input name="fecha"  type="date" class="form-control" required>
									</div>
								</div>

								<div class="col-md-6 pr-0">
									<div class="form-group form-group-default">
										<label>Importe</label>
										<input name="importe"  type="number" class="form-control" placeholder="Ingrese el importe" required>
									</div>
								</div>

								<div class="col-md-6 pr-0">
									<div class="form-group form-group-default">
										<label>Tipo Factura</label>
										<select class="form-control" name="tipo_factura" id="tipo_factura">
											<option value="HOSPEDAJE" >HOSPEDAJE</option>
											<option value="ALIMENTACION">ALIMENTACION</option>
											<option value="TRANSPORTE" >TRANSPORTE</option>
											<option value="OTROS">OTROS</option>
										</select>
									</div>
								</div>






								<input name="qsubio" value="<?php echo ($_SESSION['nombre']); ?>" type="text" class="form-control" readonly>

							</div>

					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
					<button type="submit" name="agregar" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
					</form>
				</div>

			</div>

		</div>

	</div>
</div>
</div>
<!-- -->