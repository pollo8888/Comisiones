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
                                <h4 class="card-title">Registros Facturas:</h4>
                                <a href="#addRowModal" class="btn btn-primary btn-round ml-auto" data-toggle="modal">Nueva</a>
                                <a href="inicio.php" class="btn btn-danger btn-round ">Volver</a>
                                <?php include('AgregarFactura.php'); ?>


                            </div>
                            <div class="card-tools">


                            </div>
                            <div class="card-body">


                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>N° Factura</th>
                                                <th>Proveedor</th>
                                                <th>Fecha</th>
                                                <th>Importe</th>
                                                <th>Tipo Factura</th>
                                                <th>Action</th>
                                            </tr>

                                        </thead>



                                        <tbody>
                                            <?php
                                            //incluimos el fichero de conexion
                                            include_once('CRUD/config/dbconect.php');
                                            $idpliego = isset($_GET['id']) ? $_GET['id'] : null;

                                            $nombreUsuario = $_SESSION['nombre'];

                                            $database = new Connection();
                                            $db = $database->open();
                                            try {
                                                $sql = "SELECT * FROM facturas WHERE PliegoID='$idpliego' ";

                                                foreach ($db->query($sql) as $row) {

                                            ?>
                                                    <tr>
                                                        <td><?php echo $row['No_Factura']; ?></td>
                                                        <td><?php echo $row['Proveedor']; ?></td>
                                                        <td><?php echo $row['Fecha']; ?></td>
                                                        <td><?php echo $row['Importe']; ?></td>
                                                        <td><?php echo $row['Tipo_factura']; ?></td>

                                                        <td>
                                                            <div class="form-button-action">


                                                                <button href="#editRowModal=<?php echo $row['tblid']; ?>" class="btn btn-link btn-primary btn-lg" data-toggle="modal" title="" data-original-title="Edit Task" data-target="#editRowModal<?php echo $row['tblid']; ?>">
                                                                    <i class="fa fa-edit"></i>

                                                                </button>

                                                                <button href="#deleteRowModal=<?php echo $row['tblid']; ?>" class="btn btn-link btn-danger btn-lg" data-toggle="modal" title="" data-original-title="Delete Task" data-target="#deleteRowModal<?php echo $row['tblid']; ?>">
                                                                    <i class="fa fa-times"></i>

                                                                </button>



                                                                <?php include('CRUD/contextos/editarfactura.php'); ?>
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



    $num_factura = $_POST['num_factura'];
    $proveedor = $_POST['proveedor'];
    $fecha = $_POST['fecha'];
    $tipo_factura = $_POST['tipo_factura'];
    $importe = $_POST['importe'];



?>


    <?php


    function obtenerNumeroFacturasPorTipo($idpliego, $tipoFactura)
    {
        global $conn;

        // Sanitizar $idpliego según sea necesario

        $countQuery = "SELECT COUNT(*) AS numFacturas FROM facturas WHERE PliegoID = '$idpliego' AND Tipo_factura = '$tipoFactura'";
        $result = $conn->query($countQuery);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['numFacturas'];
        } else {
            // Manejar el error según sea necesario
            return 0;
        }
    }

    $numFacturasA = obtenerNumeroFacturasPorTipo($idpliego, 'ALIMENTACION');
    $numFacturasH = obtenerNumeroFacturasPorTipo($idpliego, 'HOSPEDAJE');
    $numFacturasT = obtenerNumeroFacturasPorTipo($idpliego, 'TRANSPORTE');
    $numFacturasO = obtenerNumeroFacturasPorTipo($idpliego, 'OTRO');




    if ($tipo_factura==="ALIMENTACION" && $numFacturasA > 10) {
    ?>
        <script type="text/javascript">
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No se puede agregar más facturas de tipo ALIMENTACION.'

            })
        </script>
        
    <?php
    die();
    } elseif ($tipo_factura==="HOSPEDAJE" && $numFacturasH > 4) {

    ?>
        <script type="text/javascript">
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No se puede agregar más facturas de tipo HOSPEDAJE.'

            })
        </script>
    <?php
    die();
    } elseif ($tipo_factura==="TRANSPORTE" && $numFacturasT > 4) {
    ?>
        <script type="text/javascript">
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No se puede agregar más facturas de tipo TRANSPORTE.'

            })
        </script>
    <?php
    } elseif ($tipo_factura==="OTRO" &&$numFacturasO > 5) {
    ?>
        <script type="text/javascript">
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No se puede agregar más facturas de tipo OTRO.'

            })
        </script>
    <?php
    die();
    } else {
        $sqlInsertarPliegos = "INSERT INTO `facturas` (`No_Factura`, `Proveedor`, `Fecha`, `Importe`, `Tipo_factura`, `PliegoID`) VALUES ('$num_factura', '$proveedor', '$fecha','$importe','$tipo_factura','$idpliego')";
        $resultadoInsertarTodo = $conn->query($sqlInsertarPliegos);
    }










    if ($resultadoInsertarTodo === TRUE) {
    ?>

        <script type="text/javascript">
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Agregado correctamente',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location = "facturas.php?id=<?php echo $idpliego ?>?hospedaje=<?php echo $numFacturasH ?>";
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

    // Cerramos la conexión

}

?>










</body>

</html>