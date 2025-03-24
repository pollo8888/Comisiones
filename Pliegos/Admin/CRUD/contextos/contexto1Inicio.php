
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/buttons/1.3.1/css/buttons.bootstrap4.min.css" />
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
                                <h4 class="card-title">Resultados</h4>

                            </div>
                            <div class="card-tools">
                                

                            </div>
                            <div class="card-body">


                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Fecha Minima</th>
                                                <th>Fecha Maxima</th>
                                                <th>Dias Habiles</th>
                                                <th>N° Quirofanos</th>
                                                <th>Numerador</th>
                                                <th>Denominador</th>
                                                <th>Resultado</th>
                                                <th>Inicios Inoportunos Matutino</th>
                                                <th>Inicios Inoportunos Vespertino</th>
                                            </tr>

                                        </thead>



                                        <tbody>
                                            <?php
                                            //incluimos el fichero de conexion
                                            include_once('CRUD/config/dbconect.php');

                                            $sumar_cantidadesOpov = 0;
                                            $sumar_cantidadesOpoM = 0;
                                            $sumar_cantidades = 0;
                                            $Hospital = $_SESSION['nombre'];
                                            $database = new Connection();
                                            $db = $database->open();
                                            try {
                                                $sql = "SELECT * FROM tblestadisticas WHERE Hospitall='$Hospital' ";
                                                foreach ($db->query($sql) as $row) {
                                            ?>
                                                    <tr>

                                                        <td><?php echo $row['FechMin']; ?></td>
                                                        <td><?php echo $row['FechMax']; ?></td>
                                                        <td><?php echo $row['DiasHabiles']; ?></td>
                                                        <td><?php echo $row['NoQuirofanos']; ?></td>
                                                        <td><?php echo $row['Sumas']; ?></td>
                                                        <td><?php echo $row['Denominador']; ?></td>
                                                        <td><?php echo $row['Resultado']; ?></td>
                                                        <td><?php echo $row['OpoM']; ?></td>
                                                        <td><?php echo $row['OpoV']; ?></td>
                                                       



                                                    </tr>

                                            <?php

                                                    $EjemplosumaOpoV = $row['OpoV'];
                                                    $EjemplosumaOpoM = $row['OpoM'];
                                                    $Ejemplosuma = $row['Resultado'];
                                                    $sumar_cantidades = $sumar_cantidades + $Ejemplosuma;
                                                    $sumar_cantidadesOpov=$sumar_cantidadesOpov+$EjemplosumaOpoV;
                                                    $sumar_cantidadesOpoM=$sumar_cantidadesOpoM+$EjemplosumaOpoM;
                                                }
                                            } catch (PDOException $e) {
                                                echo "Hubo un problema en la conexión: " . $e->getMessage();
                                            }

                                            //Cerrar la Conexion
                                            $database->close();

                                            
											if(isset($_SESSION['message1']))
											{
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


                                            if(isset($_SESSION['messageeliminar'])){
                                                ?>
                                                 <script type="text/javascript">
                                                Swal.fire({
                                                    icon: 'warning',
                                                    title: 'Registro eliminado correctamente..',
                                                    showConfirmButton: false,
                                                    timer: 1500
                                
                                                })
                                            
                                            </script>

                                            <?php
                                                unset($_SESSION['messageeliminar']);

                                            }
											
                                            ?>
                                        </tbody>





                                    </table>

                                </div>


                                <div class="row container">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Porcentaje</label>

                                            <input type="text" value="<?php echo $sumar_cantidades ?>%" class="form-control" disabled>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                    <div class="form-group">
                                            <label for="">Porcentaje I.Matutino</label>

                                            <input type="text" value="<?php echo $sumar_cantidadesOpoM ?>%" class="form-control" disabled>
                                        </div>



                                    </div>
                                    <div class="col-md-4">
                                    <div class="form-group">
                                            <label for="">Porcentaje I.Vespertino</label>

                                            <input type="text" value="<?php echo $sumar_cantidadesOpov ?>%" class="form-control" disabled>
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




<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js">
</script>
<script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js">
</script>
<script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js">
</script>
<script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js">
</script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js">
</script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css">






<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        var dataTable = $('#add-row').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
            },

            dom: 'Bfrtip',
            buttons: [
                'excelHtml5'
            ],
            colReorder: true,
            stateSave: true


        });
        $('#column_name').selectpicker();

        $('#column_name').change(function() {
            var all_column = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10"];
            var remove_column = $('#column_name').val();
            var remaining_column = all_column.filter(function(obj) {
                return remove_column.indexOf(obj) == -1;
            });
            dataTable.columns(remove_column).visible(true);
            dataTable.columns(remaining_column).visible(false);
        });




        $('#column_namee').selectpicker();

        $('#column_namee').change(function() {
            var all_columnn = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10"];
            var remove_columnn = $('#column_namee').val();
            var remaining_columnn = all_columnn.filter(function(obj) {
                return remove_columnn.indexOf(obj) == -1;
            });
            dataTable.columns(remove_columnn).visible(true);
            dataTable.columns(remaining_columnn).visible(false);
        });



    });
</script>


















</body>

</html>