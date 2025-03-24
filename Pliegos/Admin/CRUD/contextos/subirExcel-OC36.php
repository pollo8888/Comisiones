<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Subir excel</h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="../admin/admin.php">
							<i class="flaticon-home"></i>
						</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>


					<li class="nav-item">
						<a href="#">Mostrar</a>
					</li>
				</ul>
			</div>
			<div class="row">

				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Importar Excel OC36</h4>

							</div>
							<div class="container">
								<div class="row">
									<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
									<div class="col-md-12 mt-4">

										<div class="card">
											<div class="card-body">


												<form action="CRUD/contextos/subirexcel/code_OC36.php" method="POST" enctype="multipart/form-data">

													<div class="form-group">
														<label for="file2">Archivo LP01:</label>
														<input type="file" name="file2" class="form-control" />
													</div>
													<button type="submit" name="save_excel_data" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

			</div>



		</div>

	</div>

</div>