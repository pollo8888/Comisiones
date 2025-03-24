<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<style>
    .btn-custom-color {
    color: orange !important;
}

</style>

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
                                <h4 class="card-title">Pliegos obtenidos hasta la fecha:</h4>
                                <a href="#addRowModal" class="btn btn-primary btn-round ml-auto" data-toggle="modal">Pliego Nuevo</a>
                                <?php include('AgregarModal.php'); ?>


                            </div>
                            <div class="card-tools">


                            </div>
                            <div class="card-body">


                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>N° Pliego</th>
                                                <th>Fecha elaboración</th>
                                                <th>Nombre comisionado</th>
                                                <th>Lugar comisión</th>
                                                <th>Inicio comisión</th>
                                                <th>Termino comisión</th>
                                                <th>Anticipo Viaticos</th>
                                                <th>Action</th>

                                            </tr>

                                        </thead>



                                        <tbody>
                                            <?php
                                            //incluimos el fichero de conexion
                                            include_once('CRUD/config/dbconect.php');
                                        


                                            $nombreUsuario = $_SESSION['nombre'];

                                            $database = new Connection();
                                            $db = $database->open();
                                            try {
                                                $sql = "SELECT * FROM pliegos WHERE qsubio='$nombreUsuario' ";
                                                foreach ($db->query($sql) as $row) {
                                                    $numPliego1 =  $row['num_pliego'];
                                            ?>
                                                    <tr>

                                                        <?php if ($numPliego1 == null) { ?>
                                                            <td>S/N</td>
                                                        <?php } else { ?>
                                                            <td><?php echo $row['num_pliego']; ?></td>
                                                        <?php } ?>


                                                        <td><?php echo $row['fecha_elaboracion']; ?></td>
                                                        <td><?php echo $row['nombre_comisionado']; ?></td>
                                                        <td><?php echo $row['lugar_comision']; ?></td>
                                                        <td><?php echo $row['inicio_comision']; ?></td>
                                                        <td><?php echo $row['termino_comision']; ?></td>
                                                        <td><?php echo $row['anticipo_viaticos']; ?></td>

                                                        <td>
                                                            <div class="form-button-action">


                                                                <button href="#editRowModal=<?php echo $row['tblid']; ?>" class="btn btn-link btn-primary btn-lg" data-toggle="modal" title="" data-original-title="Edit Task" data-target="#editRowModal<?php echo $row['tblid']; ?>">
                                                                    <i class="fa fa-edit"></i>

                                                                </button>

                                                                <button href="#deleteRowModal=<?php echo $row['tblid']; ?>" class="btn btn-link btn-danger btn-lg" data-toggle="modal" title="" data-original-title="Delete Task" data-target="#deleteRowModal<?php echo $row['tblid']; ?>">
                                                                    <i class="fa fa-times"></i>

                                                                </button>
                                                                <a href="CRUD/contextos/generarExcel/generar-xlsx.php?id=<?php echo $row['tblid'] ?>" class="btn btn-link btn-success btn-lg">
                                                                    <i class="fa fa-file-excel"></i> <!-- Versión más reciente de Font Awesome -->
                                                                </a>


                                                                <a href="facturas.php?id=<?php echo $row['tblid'] ?>" class="btn btn-link btn-custom-color btn-lg">
                                                                    <i class="fa fa-file-invoice"></i> <!-- Versión más reciente de Font Awesome -->
                                                                </a>


                                                                <?php   include('CRUD/contextos/editar.php'); ?>
                                                                
                                                            </div>
                                                        </td>

                                                        





                                                    </tr>

                                                <?php
                                                


                                                }
                                            } catch (PDOException $e) {
                                                echo "Hubo un problema en la conexión: " . $e->getMessage();
                                            }

                                            //Cerrar la Conexion
                                            $database->close();


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


                                            if (isset($_SESSION['messageeliminar'])) {
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







<?php
if (isset($_POST["agregar"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cirugias";

    // Creamos la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Revisamos la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }



    $matriculaSolicitante = $_POST['matricula_solicitante'];
    $nuevoNombreSolicitante = $_POST['nombre_solicitante'];

    $nuevoCargoSolicitante = $_POST['cargo'];

    $matriculaAutoriza = $_POST['matricula_autoriza'];
    $nuevoNombreAutoriza = $_POST['nombre_autoriza'];

    $matriculaComisionado = $_POST['matricula_comisionado'];
    $nuevoNombreComisionado = $_POST['nombre_comisionado'];

    $nuevoGpoJerarquicoComisionado = $_POST['gpo_jerarquico'];
    $nuevoContComisionadoComisionado = $_POST['cont_comisionado'];
    $numPliego = $_POST['num_pliego'];
    $fechaElaboracion = $_POST['fecha_elaboracion'];
    $motivoComision = $_POST['motivo_comision'];
    $lugarComision = $_POST['lugar_comision'];
    $inicioComision = $_POST['inicio_comision'];
    $terminoComision = $_POST['termino_comision'];
    $medioTransporte = $_POST['medio_transporte'];
    $numEcon = isset($_POST['econ_econ']) ? $_POST['econ_econ'] : null; // Obtén este valor solo si está seteado
    $anticipoViaticos = $_POST['anticipo_viaticos'];
    $anticipoGastosVehiculo = $_POST['anticipo_gastos_vehiculo'];
    $anticipoPasajes = $_POST['anticipo_pasajes'];
    $anticipoGastosPeaje = $_POST['anticipo_gastos_peaje'];
    $disponible1603 = $_POST['disponible_1603'];
    $disponible1623 = $_POST['disponible_1623'];
    $unidadAdscripcion = $_POST['unidad_adscripcion'];
    $clavePresupuestal = $_POST['selectClaveP'];
    $act_realizadas=$_POST['act_realizadas'];
    $res_obtenidos=$_POST['res_obtenidos'];

    $qsubio = $_POST['qsubio'];



?>


    <?php
    if ($nuevoNombreSolicitante === '' && $nuevoCargoSolicitante === '' && $nuevoNombreAutoriza === '' && $nuevoNombreComisionado === '' && $nuevoGpoJerarquicoComisionado === '' && $nuevoContComisionadoComisionado === '') {
    ?>
        <script type="text/javascript">
            Swal.fire({
                icon: 'error',
                title: 'Datos Requeridos',
                html: 'Algunos datos importantes se mandaron vacíos podria ser:<br>Nombre Solicitante <br>Cargo Solicitante <br>Nombre Autoriza <br>Nombre Comisionado <br>Gpo Jerarquico Comisionado <br>Contratacion Comisionado',
            });
        </script>


        <?php
    } else {


        // Actualizar datos para el solicitante
        $sqlActualizarSolicitante = "UPDATE emppliego SET nombre = '$nuevoNombreSolicitante', Desc_Depto = '$nuevoCargoSolicitante' WHERE matricula = '$matriculaSolicitante'";

        // Actualizar datos para el autoriza
        $sqlActualizarAutoriza = "UPDATE emppliego SET nombre = '$nuevoNombreAutoriza' WHERE matricula = '$matriculaAutoriza'";

        // Actualizar datos para el comisionado
        $sqlActualizarComisionado = "UPDATE emppliego SET nombre = '$nuevoNombreComisionado', Descripcion_Categoria_Puesto = '$nuevoGpoJerarquicoComisionado', Descripcion_Plaza = '$nuevoContComisionadoComisionado' WHERE matricula = '$matriculaComisionado'";

        $sqlInsertarPliegos = "INSERT INTO `pliegos` (`num_pliego`, `fecha_elaboracion`, `matricula_solicitante`, `nombre_solicitante`, `cargo_solicitante`, `matricula_comisionado`, `gpo_jerarquico_comisionado`, `contratacion_del_comisionado`, `nombre_comisionado`, `matricula_autoriza`, `nombre_autoriza`, `motivo_comision`, `lugar_comision`, `inicio_comision`, `termino_comision`, `medio_transporte`, `num_econ`, `anticipo_viaticos`, `anticipo_gastos_vehiculo`, `anticipo_pasajes`, `anticipo_gastos_peaje`, `disponible_1603`, `disponible_1623`, `unidad_adscripcion`, `qsubio`, `clave_presupuestal`, `act_realizadas`, `res_obtenidos`) VALUES ('$numPliego', '$fechaElaboracion', '$matriculaSolicitante', '$nuevoNombreSolicitante', '$nuevoCargoSolicitante', '$matriculaComisionado', '$nuevoGpoJerarquicoComisionado', '$nuevoContComisionadoComisionado', '$nuevoNombreComisionado', '$matriculaAutoriza', '$nuevoNombreAutoriza', '$motivoComision', '$lugarComision', '$inicioComision', '$terminoComision', '$medioTransporte', '$numEcon', '$anticipoViaticos', '$anticipoGastosVehiculo', '$anticipoPasajes', '$anticipoGastosPeaje', '$disponible1603', '$disponible1623', '$unidadAdscripcion', '$qsubio', '$clavePresupuestal', '$act_realizadas', '$res_obtenidos')";



        $resultadoActualizarSolicitante = $conn->query($sqlActualizarSolicitante);
        $resultadoActualizarAutoriza = $conn->query($sqlActualizarAutoriza);
        $resultadoActualizarComisionado = $conn->query($sqlActualizarComisionado);
        $resultadoInsertarTodo = $conn->query($sqlInsertarPliegos);




        if ($resultadoActualizarSolicitante === TRUE && $resultadoActualizarAutoriza === TRUE && $resultadoActualizarComisionado === TRUE && $resultadoInsertarTodo === TRUE) {
        ?>

            <script type="text/javascript">
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Agregado correctamente',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location = "inicio.php";
                });
            </script>

        <?php
        } else {
        ?>
            <script type="text/javascript">
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se pudo guardar!'

                })
            </script>
<?php

        }
    }
    // Cerramos la conexión

}

?>










</body>

</html>