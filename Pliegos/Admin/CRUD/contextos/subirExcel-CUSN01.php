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
								<h4 class="card-title">Importar Excel CUSN01</h4>
							</div>
							<div class="container">
								<div class="row">
									<div class="col-md-12 mt-4">
										<?php

										if (isset($_SESSION['error_message'])) {
											$error_message = $_SESSION['error_message'];
											unset($_SESSION['error_message']);
										?>
											<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
											<script>
												Swal.fire({
													position: 'center',
													icon: 'error',
													title: 'Error',
													text: '<?php echo $error_message; ?>',
													confirmButtonColor: '#3085d6',
													confirmButtonText: 'ACEPTAR'
												}).then((result) => {
													if (result.isConfirmed) {
														window.location.href = 'CUSN01.php';
													}
												});
											</script>
										<?php
										} elseif (isset($_SESSION['message'])) {
											$message = $_SESSION['message'];
											$temp_file = isset($_SESSION['temp_file']) ? $_SESSION['temp_file'] : null;
											unset($_SESSION['message']);
										?>
											<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
											<script>
												Swal.fire({
													position: 'center',
													icon: 'success',
													title: 'SUBIDO CON ÉXITO',
													html: 'Las Claves Presupuestales subidas fueron:<br><br><?php echo $message; ?>',
													confirmButtonColor: '#3085d6',
													confirmButtonText: 'ACEPTAR',
												}).then((result) => {
													if (result.isConfirmed) {
														window.location.href = 'CRUD/contextos/subirexcel/descargas/descargar.php?file=<?php echo urlencode($temp_file); ?>';
													}
												});
											</script>
										<?php
										}
										?>
										<div class="card">


											<div class="card-body">
												<form method="post" action="CRUD/contextos/subirexcel/convertirexcelCUSN01.php" enctype="multipart/form-data">
													<label>Selecciona un archivo de texto:</label>
													<input type="file" name="archivo" accept=".txt" class="form-control">
													<br>
													<button type="submit" value="Procesar archivo" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span>Generar Excel</button>
												</form>
											</div>

											<div class="card-body">
												<form action="CRUD/contextos/subirexcel/codeCUSN01.php" method="POST" enctype="multipart/form-data">
													<label>Selecciona el archivo de excel o txt:</label>
													<input type="file" name="import_file" class="form-control" accept=".txt, .xls, .xlsx" required />
													<br>
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