<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Inicio</h4>
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
                                <h4 class="card-title">Busca tu matricula</h4>

                                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                <a href="modalsimf.php" class="btn btn-primary btn-round ml-auto">Nuevo</a>




                            </div>
                            <div class="card-tools">


                            </div>
                            <div class="card-body">


                                <div class="card-body">



                                    <form action="simf_enviar.php" method="POST">
                                        <div class="form-group form-inline">
                                            <label for="inlineinput" class="col-md-1">Matricula</label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control input-full" id="matricula" name="matricula" placeholder="Introduce tu matricula" required>
                                            </div>
                                        </div>
                                    
                                        <input type="submit" value="Buscar..." class="btn btn-primary btn-round ml-auto">

                                    </form>

                                    <?php

                                    if (isset($_SESSION['message1'])) {
                                    ?>
                                        <script type="text/javascript">
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Actualizado Correctamente..',
                                                showConfirmButton: false,
                                                timer: 1500

                                            })
                                        </script>

                                    <?php
                                        unset($_SESSION['message1']);
                                    }

                                    ?>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">Nuevo</span>
                    <span class="fw-light">Registro</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="simf_enviar.php" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Tipo de Movimiento</label>
                                <input id="tipo_movimiento" name="tipo_movimiento" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" name="agregar" class="btn btn-primary">Agregar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--   Core JS Files   -->
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
<script src="assets/js/dataTables.colReorder.min.js"></script>



