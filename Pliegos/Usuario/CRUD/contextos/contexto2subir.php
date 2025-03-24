<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Configuracion</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="admin/admin.php">
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


                            <div class="container">
                                <?php
                                include_once('CRUD/config/dbconect.php');



                                $database = new Connection();
                                $db = $database->open();
                                try {

                                    $sql = "SELECT * FROM usuarios ";
                                    foreach ($db->query($sql) as $row) {
                                ?>



                                        <div class="page-inner">
                                            <h4 class="page-title">Configuracion del Ususario</h4>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card card-with-nav">
                                                        <div class="card-header">
                                                            <div class="row row-nav-line">
                                                                <ul class="nav nav-tabs nav-line nav-color-secondary" role="tablist">
                                                                    <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Editar informacion</a> </li>
                                                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Perfil</a> </li>
                                                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Configuracion</a> </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row mt-3">
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Id</label>
                                                                        <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $row['id']; ?>"disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Correo</label>
                                                                        <input type="email" class="form-control" name="email" placeholder="Name" value="<?php echo $row['email']; ?>"disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Clave unica</label>
                                                                        <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $row['claveU']; ?>"disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Registrar RFC</label>
                                                                        <input type="email" class="form-control" name="email" placeholder="RFC" value="<?php echo $row['rfc']; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-right mt-3 mb-3">
                                                                <button class="btn btn-success">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                            </div>
                        </div>
                <?php

                                    }
                                } catch (PDOException $e) {
                                    echo "Hubo un problema en la conexión: " . $e->getMessage();
                                }

                                //Cerrar la Conexion
                                $database->close();

                ?>

                    </div>
                </div>

            </div>

        </div>

        <!--   Core JS Files   -->
        <script src="assets/js/core/jquery.3.2.1.min.js"></script>
        <script src="assets/js/core/popper.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>

        <!-- jQuery UI -->
        <script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

        <!-- jQuery Scrollbar -->
        <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
        <!-- Datatables -->
        <script src="assets/js/plugin/datatables/datatables.min.js"></script>
        <!-- Atlantis JS -->
        <script src="assets/js/atlantis.min.js"></script>
        <!-- Atlantis DEMO methods, don't include it in your project! -->
        <script src="assets/js/setting-demo2.js"></script>


        </body>

        </html>

        <script type="text/javascript">
            function subir() {

                var Form = new FormData($('#filesForm')[0]);
                $.ajax({

                    url: "CRUD/contextos/subirxml/data.php",
                    type: "post",
                    data: Form,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        alert('Archivos Agregados Correctamente!');
                        document.location.reload();
                        return true;

                    }
                });
            }
        </script>