

  
<div class="modal fade" id="addRowModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
	
        <div class="modal-content">
            <div class="modal-header">
               
                <center><h4 class="modal-title" id="myModalLabel">Nuevo Registro</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			
                <div class="card-body">
	<form method="POST" autocomplete="off" enctype="multipart/form-data" >
					<div class="row">
						
						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Clave Presupuestal</label>
								<input name="clavep" type="text" class="form-control" required placeholder="Ingrese la clave">
							</div>
						</div>

												
						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Departamento</label>
								<input name="departamento" type="text" class="form-control" required placeholder="Ingrese el departamento">
							</div>
						</div>

	
						
					</div>
			
            </div>

        </div>
		 <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="submit" name="agregardepartamento" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
			</form>
                </div>
			
            </div>

        </div>
		
    </div>
</div>
</div>
<!-- -->