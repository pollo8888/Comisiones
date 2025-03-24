

  
<div class="modal fade" id="addRowModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
								<label>Usuario</label>
								<input name="usuario" type="text" class="form-control" required placeholder="Ingrese usuario">
							</div>
						</div>

												
						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Contraseña</label>
								<input name="clave" type="password" class="form-control" required placeholder="Ingrese contraseña">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Matricula</label>
								<input name="matricula" type="text" class="form-control" required placeholder="Ingrese la matricula">
							</div>
						</div>


						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Nombre Completo</label>
								<input name="nombre" type="text" class="form-control" required readonly>
							</div>
						</div>
						

						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Departamento</label>
								<input name="departamentoo" type="text" class="form-control" required >
							</div>
						</div>
						

						
						
						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Cargo</label>
								<select class="form-control" name="cargo">
				<option value="3">Usuario</option>
		
				
				
			</select>
							</div>
						</div>
						
						
						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Correo</label>
								<input name="email" type="text" class="form-control" required placeholder="Ingrese correo">
							</div>
						</div>




											
						
						
					</div>
			
            </div>

        </div>
		 <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="submit" name="agregarPliego" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
			</form>
                </div>
			
            </div>

        </div>
		
    </div>
</div>
</div>
<!-- -->