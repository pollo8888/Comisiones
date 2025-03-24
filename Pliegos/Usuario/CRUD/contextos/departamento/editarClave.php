
	<!-- Delete -->
	<div class="modal fade" id="deleteRowModal1<?php echo $row['tblid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					<a href="CRUD/contextos/departamento/BorrarRegistro.php?id=<?php echo $row['tblid']; ?>" class="btn btn-danger"><span class="fa fa-times"></span> Eliminar</a>
				</div>

			</div>
		</div>
	</div>