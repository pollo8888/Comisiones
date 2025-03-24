<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/buttons/1.3.1/css/buttons.bootstrap4.min.css" />
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        var delayTimer;

        // Evento de cambio en el campo de matrícula
        $('input[name="matricula"]').on('input', function() {
            // Limpiar el temporizador anterior (si existe)
            clearTimeout(delayTimer);

            // Obtener el valor de la matrícula
            var matricula = $(this).val();

            // Establecer un nuevo temporizador
            delayTimer = setTimeout(function() {
                // Realizar la solicitud AJAX con la ruta correcta
                $.ajax({
                    type: 'POST',
                    url: 'CRUD/contextos/buscar_alumno.php', // Ruta correcta de tu archivo PHP
                    data: {
                        matricula: matricula
                    },
                    success: function(response) {
                        // Manejar la respuesta del servidor
                        if (response.success) {
                            var nombreCompleto = response.A_Paterno + ' ' + response.A_Materno + ' ' + response.nombre;

                            // Mostrar el nombre completo en el campo correspondiente
                            $('input[name="nombre"]').val(nombreCompleto);
                        } else {
                            // Mostrar un mensaje SweetAlert2 si no se encuentra la matrícula
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Matrícula no encontrada',
                            });
                        }
                    },
                    error: function() {
                        // Mostrar un mensaje SweetAlert2 en caso de error en la solicitud AJAX
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error al buscar la matrícula',
                        });
                    }
                });
            }, 500); // Establecer el retraso en milisegundos (500 milisegundos = 0.5 segundos)
        });
    });
</script>
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
                                <h4 class="card-title">Registro Usuarios</h4>
                                <a href="#addRowModal" class="btn btn-primary btn-round ml-auto" data-toggle="modal">Nuevo</a>
                                <?php include('AgregarModal.php'); ?>

                            </div>
                            <div class="card-tools">


                            </div>
                            <div class="card-body">


                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Usuario</th>
                                                <th>Correo</th>
                                                <th>Cargo</th>
                                                <th style="width: 10%">Action</th>
                                            </tr>

                                        </thead>



                                        <tbody>
                                            <?php
                                            //incluimos el fichero de conexion
                                            include_once('CRUD/config/dbconect.php');



                                            $database = new Connection();
                                            $db = $database->open();
                                            try {

                                                $sql = "SELECT * FROM usuarios ";
                                                foreach ($db->query($sql) as $row) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['nombre']; ?></td>
                                                        <td><?php echo $row['usuario']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['cargo']; ?></td>
                                                        <td>
                                                            <div class="form-button-action">


                                                                <button href="#editRowModal=<?php echo $row['id']; ?>" class="btn btn-link btn-primary btn-lg" data-toggle="modal" title="" data-original-title="Edit Task" data-target="#editRowModal<?php echo $row['id']; ?>">
                                                                    <i class="fa fa-edit"></i>

                                                                </button>

                                                                <button href="#deleteRowModal=<?php echo $row['id']; ?>" class="btn btn-link btn-danger btn-lg" data-toggle="modal" title="" data-original-title="Delete Task" data-target="#deleteRowModal<?php echo $row['id']; ?>">
                                                                    <i class="fa fa-times"></i>

                                                                </button>

                                                                <?php include('CRUD/contextos/editar.php'); ?>
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

                                            ?>
                                        </tbody>





                                    </table>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>










                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Registro Usuarios</h4>
                                <a href="#addRowModal1" class="btn btn-primary btn-round ml-auto" data-toggle="modal">Nuevo Usuario Pliego</a>
                                <?php include('AgregarModalPliegos.php'); ?>

                            </div>
                            <div class="card-tools">


                            </div>
                            <div class="card-body">


                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Matricula</th>
                                                <th>Nombre</th>
                                                <th>Usuario</th>
                                                <th>Departamento</th>
                                                <th>Correo</th>
                                                <th>Cargo</th>
                                                <th style="width: 10%">Action</th>
                                            </tr>

                                        </thead>



                                        <tbody>
                                            <?php
                                            //incluimos el fichero de conexion
                                            include_once('CRUD/config/dbconect.php');



                                            $database = new Connection();
                                            $db = $database->open();
                                            try {

                                                $sql = "SELECT * FROM usuarios WHERE cargo = '3'";

                                                foreach ($db->query($sql) as $row) {
                                            ?>


                    
                                                    <tr>
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['matricula']; ?></td>
                                                        <td><?php echo $row['nombre']; ?></td>
                                                        <td><?php echo $row['usuario']; ?></td>
                                                        <td><?php echo $row['departamento']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['cargo']; ?></td>
                                                        <td>
                                                            <div class="form-button-action">


                                                                <button href="#editRowModal1=<?php echo $row['id']; ?>" class="btn btn-link btn-primary btn-lg" data-toggle="modal" title="" data-original-title="Edit Task" data-target="#editRowModal1<?php echo $row['id']; ?>">
                                                                    <i class="fa fa-edit"></i>

                                                                </button>

                                                                <button href="#deleteRowModal1=<?php echo $row['id']; ?>" class="btn btn-link btn-danger btn-lg" data-toggle="modal" title="" data-original-title="Delete Task" data-target="#deleteRowModal1<?php echo $row['id']; ?>">
                                                                    <i class="fa fa-times"></i>

                                                                </button>

                                                                <?php include('CRUD/contextos/editar1.php'); ?>
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

                                            ?>
                                        </tbody>





                                    </table>

                                </div>
                            </div>
                        </div>










                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Claves Presupuestales</h4>
                                <a href="#addRowModal2" class="btn btn-primary btn-round ml-auto" data-toggle="modal">Nueva Clave</a>
                                <?php include('departamento/AgregarModalClavep.php'); ?>

                            </div>
                            <div class="card-tools">


                            </div>
                            <div class="card-body">


                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Clave Presupuestal</th>
                                                <th>Departamento</th>
                                                <th style="width: 10%">Action</th>
                                            </tr>

                                        </thead>



                                        <tbody>
                                            <?php
                                            //incluimos el fichero de conexion
                                            include_once('CRUD/config/dbconect.php');



                                            $database = new Connection();
                                            $db = $database->open();
                                            try {

                                                $sql = "SELECT * FROM pclavesp WHERE clvpp = '1'";

                                                foreach ($db->query($sql) as $row) {
                                            ?>


                    
                                                    <tr>
                                                        <td><?php echo $row['tblid']; ?></td>
                                                        <td><?php echo $row['claveP']; ?></td>
                                                        <td><?php echo $row['Departamento']; ?></td>

                                                        <td>
                                                            <div class="form-button-action">


                                                                <button href="#deleteRowModal1=<?php echo $row['tblid']; ?>" class="btn btn-link btn-danger btn-lg" data-toggle="modal" title="" data-original-title="Delete Task" data-target="#deleteRowModal1<?php echo $row['tblid']; ?>">
                                                                    <i class="fa fa-times"></i>

                                                                </button>

                                                                <?php include('CRUD/contextos/departamento/editarClave.php'); ?>
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

                                            ?>
                                        </tbody>





                                    </table>

                                </div>
                            </div>
                        </div>



                    </div>










                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Extras</h4>

                            </div>
                            <div class="card-tools">


                            </div>
                            <div class="card-body">


                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Extras</th>
                                                <th>Departamento</th>
                                                <th style="width: 10%">Action</th>
                                            </tr>

                                        </thead>



                                        <tbody>
                                            <?php
                                            //incluimos el fichero de conexion
                                            include_once('CRUD/config/dbconect.php');



                                            $database = new Connection();
                                            $db = $database->open();
                                            try {

                                                $sql = "SELECT * FROM pclavesp WHERE clvpp = '0'";

                                                foreach ($db->query($sql) as $row) {
                                            ?>


                    
                                                    <tr>
                                                        <td><?php echo $row['tblid']; ?></td>
                                                        <td><?php echo $row['claveP']; ?></td>
                                                        <td><?php echo $row['Departamento']; ?></td>

                                                        <td>
                                                            <div class="form-button-action">


                                                                <button href="#deleteRowModal1=<?php echo $row['tblid']; ?>" class="btn btn-link btn-danger btn-lg" data-toggle="modal" title="" data-original-title="Delete Task" data-target="#deleteRowModal1<?php echo $row['tblid']; ?>">
                                                                    <i class="fa fa-times"></i>

                                                                </button>

                                                                <?php include('CRUD/contextos/departamento/editarClave.php'); ?>
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
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $cargo = $_POST['cargo'];
    $email = $_POST['email'];
    $clave = $_POST['clave'];
    $clave1 = $_POST['clave_unica'];
    $activo = "True";



    // Realizamos la consulta para saber si coincide con uno de esos criterios

?>


    <?php

    // Si no hay resultados, ingresamos el registro a la base de datos
    $sql2 = "INSERT INTO usuarios(nombre,usuario,email,clave,cargo,claveU,activo)VALUES ('$nombre','$usuario','$email','$clave','$cargo','$clave1','$activo')";


    if (mysqli_query($conn, $sql2)) {

        if ($sql2) {
    ?>

            <script type="text/javascript">
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Agregado correctamente',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location = "index.php";
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
    } else {

        echo "Error: " . $sql2 . "" . mysqli_error($conn);
    }
}
// Cerramos la conexión



?>
















<?php
if (isset($_POST["agregarPliego"])) {
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
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $cargo = $_POST['cargo'];
    $email = $_POST['email'];
    $clave = $_POST['clave'];
    $matricula = $_POST['matricula'];
    $departamentos = $_POST['departamentoo'];
 



    // Realizamos la consulta para saber si coincide con uno de esos criterios

?>


    <?php

    // Si no hay resultados, ingresamos el registro a la base de datos
    $sql2 = "INSERT INTO usuarios(nombre,usuario,email,clave,cargo,matricula,departamento)VALUES ('$nombre','$usuario','$email','$clave','$cargo','$matricula','$departamentos')";


    if (mysqli_query($conn, $sql2)) {

        if ($sql2) {
    ?>

            <script type="text/javascript">
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Agregado correctamente',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location = "index.php";
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
    } else {

        echo "Error: " . $sql2 . "" . mysqli_error($conn);
    }
}
// Cerramos la conexión



?>






<?php
if (isset($_POST["agregardepartamento"])) {
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
    $clavep = $_POST['clavep'];
    $departamento = $_POST['departamento'];
    $activo = "1";

 



    // Realizamos la consulta para saber si coincide con uno de esos criterios

?>


    <?php

    // Si no hay resultados, ingresamos el registro a la base de datos
    $sql2 = "INSERT INTO pclavesp(claveP,Departamento,clvpp)VALUES ('$clavep','$departamento','$activo')";


    if (mysqli_query($conn, $sql2)) {

        if ($sql2) {
    ?>

            <script type="text/javascript">
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Agregado correctamente',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location = "index.php";
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
    } else {

        echo "Error: " . $sql2 . "" . mysqli_error($conn);
    }
}
// Cerramos la conexión



?>









</body>

</html>