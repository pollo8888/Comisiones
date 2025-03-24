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

					<form method="POST" action="CRUD/contextos/updateFactura.php?id=<?php echo $row['tblid']; ?>">
						<div class="row">

							<!-- NUM DE PLIEGO -->
							<div class="col-md-6 pr-0">
								<div class="form-group form-group-default">
									<label>N° Factura</label>
									<input name="num_factura" value="<?php echo $row['No_Factura']; ?>" type="text" class="form-control" placeholder="Ingrese el N° Factura" required>
								</div>
							</div>

							<div class="col-md-6 pr-0">
								<div class="form-group form-group-default">
									<label>Proveedor</label>
									<input name="proveedor" value="<?php echo $row['Proveedor']; ?>" type="text" class="form-control" placeholder="Ingrese el Proveedor" required>
								</div>
							</div>



					
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Fecha</label>
									<input name="fecha" value="<?php echo $row['Fecha']; ?>" type="date" class="form-control" required>
								</div>
							</div>

							<div class="col-md-6 pr-0">
								<div class="form-group form-group-default">
									<label>Importe</label>
									<input name="importe" value="<?php echo$row['Importe']; ?>" type="number" class="form-control" placeholder="Ingrese el importe" required>
								</div>
							</div>

							<div class="col-md-6 pr-0">
								<div class="form-group form-group-default">
									<label>Tipo Factura</label>
									<select class="form-control" name="tipo_factura" id="tipo_factura">
										<option value="HOSPEDAJE" <?php echo ($row['Tipo_factura'] === 'HOSPEDAJE') ? 'selected' : ''; ?>>HOSPEDAJE</option>
										<option value="ALIMENTACION" <?php echo ($row['Tipo_factura'] === 'ALIMENTACION') ? 'selected' : ''; ?>>ALIMENTACION</option>
										<option value="TRANSPORTE" <?php echo ($row['Tipo_factura'] === 'TRANSPORTE') ? 'selected' : ''; ?>>TRANSPORTE</option>
										<option value="OTROS" <?php echo ($row['Tipo_factura'] === 'OTROS') ? 'selected' : ''; ?>>OTROS</option>
									</select>
								</div>
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
				<a href="CRUD/contextos/BorrarRegistroFactura.php?id=<?php echo $row['tblid']; ?>" class="btn btn-danger"><span class="fa fa-times"></span> Eliminar</a>
			</div>

		</div>
	</div>
</div>