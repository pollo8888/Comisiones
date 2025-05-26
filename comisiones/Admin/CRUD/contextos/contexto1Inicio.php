<meta charset="UTF-8">

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
                                <h4 class="card-title">Comisiones</h4>
                                <a href="CRUD/contextos/subirexcel/descargar_excel.php"
                                    class="btn btn-success btn-round ml-auto">Descargar Excel</a>
                                <a href="#addRowModal" class="btn btn-primary btn-round " data-toggle="modal">Nuevo</a>
                                <a href="#terminocomi" class="btn btn-danger btn-round" data-toggle="modal">Término
                                    Comisión</a>

                                <?php include('AgregarModal.php'); ?>



                            </div>
                            <div class="card-tools">


                            </div>
                            <div class="card-body">


                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
						<th>Action</th>
						<th>Estatus</th>
                                                <th>Folio</th>
						<th>Fecha Termino </th>
                                                <th>Fecha Comision</th>
                                                <th>Nombre Comisionado</th>
						<th>Fecha Termino Finalizado</th>
                                                <th>Matricula</th>
                                                <th>Telefono</th>
                                                <th>Categoria</th>
                                                <th>Adscripcion</th>
                                                <th>Plaza</th>
                                                <th>Puesto Comisionado</th>
                                                <th>UM Destino</th>
                                                <th>Turno</th>
                                                <th>Horas Turno</th>
                                                <th>Fecha Inicio</th>
                                                <th>Año Comision</th>
                                                <th>Director</th>
                                                <th>Director Adscripcion</th>
                                                <th>Numero Comisiones</th>
                                                <th>Fecha Solicitud</th>
                                                <th>Medio Solicitud</th>
                                                <th>Fecha Recepcion Personal</th>
                                                <th>Folio_Termino</th>
                                                <th>Entrega Personal Termino</th>
                                            </tr>
                                        </thead>



                                        <tbody>
                                            <?php
                                            //incluimos el fichero de conexion
                                            include_once('CRUD/config/dbconect.php');
                                            $database = new Connection();
                                            $db = $database->open();
                                            try {
                                                $sql = "SELECT * FROM comisiones ";
                                                foreach ($db->query($sql) as $row) {
                                                    ?>
                                                    <tr>


<td>
                                                            <div class="form-button-action">


                                                                <button href="#editRowModal=<?php echo $row['tblid']; ?>"
                                                                    class="btn btn-link btn-primary btn-lg" data-toggle="modal"
                                                                    title="" data-original-title="Edit Task"
                                                                    data-target="#editRowModal<?php echo $row['tblid']; ?>">
                                                                    <i class="fa fa-edit"></i>

                                                                </button>

                                                                <button href="#deleteRowModal=<?php echo $row['tblid']; ?>"
                                                                    class="btn btn-link btn-danger btn-lg" data-toggle="modal"
                                                                    title="" data-original-title="Delete Task"
                                                                    data-target="#deleteRowModal<?php echo $row['tblid']; ?>">
                                                                    <i class="fa fa-times"></i>

                                                                </button>


                                                                <a href="CRUD/contextos/generarword/generarWord.php?id=<?php echo $row['tblid']; ?>"
                                                                    class="btn btn-link btn-success btn-lg"
                                                                    title="Descargar Comisión en Word">
                                                                    <i class="fa fa-file-word"></i>
                                                                </a>


                                                                <?php if (!empty($row['documentos'])): ?>
                                                                    <a href="CRUD/contextos/descargar_carpeta.php?folder=<?php echo urlencode($row['documentos']); ?>"
                                                                        class="btn btn-link btn-info btn-lg"
                                                                        title="Descargar Documentos">
                                                                        <i class="fa fa-download"></i>
                                                                    </a>
                                                                <?php endif; ?>


                                                                <?php if (!empty($row['Folio_Termino']) && !empty($row['Fecha_Finalizado_Termino']) && !empty($row['Entrega_Personal_Termino'])): ?>
                                                                    <a href="CRUD/contextos/generarword/generartermino.php?folio_termino=<?php echo($row['Folio_Termino']); ?>"
                                                                        class="btn btn-link btn-danger btn-lg"
                                                                        title="Descargar Folio Término">
                                                                        <i class="fa fa-file-pdf"></i>
                                                                    </a>
                                                                <?php endif; ?>


                                                                <?php include('CRUD/contextos/editar.php'); ?>
                                                            </div>
                                                        </td>


							<td><?php echo $row['estatus']; ?></td>
                                                        <td><?php echo $row['folio']; ?></td>
                                                        <td><?php echo $row['fecha_termino_num']; ?></td>
                                                        <td><?php echo $row['fecha_comision_num']; ?></td>
                                                        <td><?php echo $row['nombre_comisionado']; ?></td>
                                                        <td><?php echo $row['Fecha_Finalizado_Termino']; ?></td>
                                                        <td><?php echo $row['matricula']; ?></td>
                                                        <td><?php echo $row['telefono']; ?></td>
                                                        <td><?php echo $row['categoria']; ?></td>
                                                        <td><?php echo $row['adscripcion']; ?></td>
                                                        <td><?php echo $row['plaza']; ?></td>
                                                        <td><?php echo $row['puesto_comisionado']; ?></td>
                                                        <td><?php echo $row['um_destino']; ?></td>
                                                        <td><?php echo $row['turno']; ?></td>
                                                        <td><?php echo $row['horas_turno']; ?></td>
                                                        <td><?php echo $row['fecha_inicio_num']; ?></td>
                                                        <td><?php echo $row['ano_comision']; ?></td>
                                                        <td><?php echo $row['director']; ?></td>
                                                        <td><?php echo $row['director_adscripcion']; ?></td>
                                                        <td><?php echo $row['numero_comisiones']; ?></td>
                                                        <td><?php echo $row['fecha_solicitud']; ?></td>
                                                        <td><?php echo $row['medio_solicitud']; ?></td>
                                                        <td><?php echo $row['fecha_recepcion_personal']; ?></td>
                                                        <td><?php echo $row['Folio_Termino']; ?></td>
                                                        <td><?php echo $row['Entrega_Personal_Termino']; ?></td>


                                                        


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


                                <div class="row container">
                                    <?php
                                    // Consulta para contar el total de registros
                                    $sql_total_registros = "SELECT COUNT(*) AS total_registros FROM comisiones";
                                    $resultado_total = $db->query($sql_total_registros);
                                    $total_registros = 0;

                                    if ($resultado_total) {
                                        $fila_total = $resultado_total->fetch(PDO::FETCH_ASSOC);
                                        $total_registros = $fila_total['total_registros'];
                                    }
                                    ?>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Total de Registros</label>
                                            <input type="text" value="<?php echo $total_registros; ?>"
                                                class="form-control" disabled>
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




<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js">
    </script>
<script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js">
</script>
<script type="text/javascript" language="javascript"
    src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js">
    </script>
<script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js">
</script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js">
</script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css">






<script type="text/javascript" language="javascript">
    $(document).ready(function () {
        var dataTable = $('#add-row').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
            },

            dom: 'Bfrtip',
            buttons: [

            ],
            colReorder: true,
            stateSave: true


        });
        $('#column_name').selectpicker();

        $('#column_name').change(function () {
            var all_column = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10"];
            var remove_column = $('#column_name').val();
            var remaining_column = all_column.filter(function (obj) {
                return remove_column.indexOf(obj) == -1;
            });
            dataTable.columns(remove_column).visible(true);
            dataTable.columns(remaining_column).visible(false);
        });




        $('#column_namee').selectpicker();

        $('#column_namee').change(function () {
            var all_columnn = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10"];
            var remove_columnn = $('#column_namee').val();
            var remaining_columnn = all_columnn.filter(function (obj) {
                return remove_columnn.indexOf(obj) == -1;
            });
            dataTable.columns(remove_columnn).visible(true);
            dataTable.columns(remaining_columnn).visible(false);
        });



    });





    // Variable para almacenar el ID del último modal abierto antes de captureValueModal
    let lastOpenedModal = null;

    // Función para detectar doble retroceso en campos específicos (funciona en ambos modales: add y edit)
    let lastBackspace = 0;
    const campos = ['adscripcion', 'plaza', 'puesto_comisionado', 'um_destino', 'director', 'director_adscripcion', 'estatus', 'medio_solicitud', 'justificacion'];

    campos.forEach(campo => {
        // Selecciona todos los campos con el mismo nombre (esto incluye los del modal de creación y edición)
        document.getElementsByName(campo).forEach(input => {
            input.addEventListener('keydown', function (e) {
                if (e.key === 'Backspace') {
                    const now = Date.now();
                    if (now - lastBackspace < 300) { // Doble Backspace en menos de 300ms
                        $('#campoTipo').val(campo);  // Guardar el nombre del campo en el modal
                        $('#campoValor').val('');    // Limpiar el input para un nuevo valor
                        $('#campoValorTextarea').val(''); // Limpiar el textarea

                        // Detectar el campo 'justificación' y alternar elementos visibles
                        if (campo === 'justificacion') {
                            $('#campoValor').hide();
                            $('#campoValorTextarea').show();
                            $('#valoresGuardados').addClass('select-expandido');
                        } else {
                            $('#campoValor').show();
                            $('#campoValorTextarea').hide();
                            $('#valoresGuardados').removeClass('select-expandido');
                        }

                        // Guardar el ID del modal activo antes de abrir captureValueModal
                        lastOpenedModal = $(this).closest('.modal').attr('id');

                        cargarValoresGuardados(campo);  // Cargar opciones existentes en el select
                        $('#captureValueModal').modal('show');  // Mostrar el modal de selección
                    }
                    lastBackspace = now;
                }
            });
        });
    });

    // Función para cargar valores guardados en el modal
    function cargarValoresGuardados(campo) {
        $.ajax({
            url: 'CRUD/contextos/obtener_valores.php',
            type: 'POST',
            data: { campo_tipo: campo },
            success: function (response) {
                $('#valoresGuardados').html(response);
            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo cargar los valores guardados.'
                });
            }
        });
    }

    // Insertar el valor seleccionado en el campo original sin guardarlo en la base de datos
    $('#valoresGuardados').on('change', function () {
        const tipoCampo = $('#campoTipo').val();
        const valorSeleccionado = $(this).val();

        // Insertar el valor seleccionado en el campo original
        if (valorSeleccionado) {
            document.getElementsByName(tipoCampo).forEach(input => {
                input.value = valorSeleccionado;
            });
            $('#captureValueModal').modal('hide');  // Cerrar el modal
        }
    });

    // Guardar solo el valor ingresado manualmente
    $('#guardarValor').on('click', function () {
        const tipoCampo = $('#campoTipo').val();
        const nuevoValor = tipoCampo === 'justificacion' ? $('#campoValorTextarea').val() : $('#campoValor').val();

        if (nuevoValor) {  // Guardar solo si el valor es nuevo (ingresado manualmente)
            $.ajax({
                url: 'CRUD/contextos/guardar_valor.php',
                type: 'POST',
                data: {
                    tipo_campo: tipoCampo,
                    valor: nuevoValor
                },
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: response
                    });
                    // Insertar el nuevo valor en el campo original
                    document.getElementsByName(tipoCampo).forEach(input => {
                        input.value = nuevoValor;
                    });
                    $('#captureValueModal').modal('hide'); // Cerrar el modal
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No se pudo guardar el valor.'
                    });
                }
            });
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Advertencia',
                text: 'Por favor, ingrese un valor nuevo antes de guardar.'
            });
        }
    });

    // Alternar visibilidad de los modales
    $('#captureValueModal').on('show.bs.modal', function () {
        $('.modal').modal('hide');  // Ocultar todos los modales (incluyendo los de edición o creación)
    });

    $('#captureValueModal').on('hidden.bs.modal', function () {
        // Mostrar nuevamente el modal que estaba abierto antes de captureValueModal
        if (lastOpenedModal) {
            $('#' + lastOpenedModal).modal('show');
        }
    });





    $(document).ready(function () {
        // Función para manejar la búsqueda de datos de matrícula
        function buscarDatosMatricula(matriculaInput, nombreInput, categoriaInput, numeroComisionesInput) {
            const matricula = $(matriculaInput).val();
            if (matricula) {
                $.ajax({
                    url: 'CRUD/contextos/obtener_datos_matricula.php',  // Archivo PHP que hará la consulta
                    type: 'POST',
                    data: { matricula: matricula },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            // Rellenar los campos de nombre, categoría y número de comisiones
                            $(nombreInput).val(response.nombre);
                            $(categoriaInput).val(response.categoria);
                            $(numeroComisionesInput).val(response.nextNumeroComisiones); // Asignar el siguiente número de comisiones
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'No se encontró información para la matrícula ingresada.'
                            });
                            // Limpiar campos si no se encuentra información
                            $(nombreInput).val('');
                            $(categoriaInput).val('');
                            $(numeroComisionesInput).val('');
                        }
                    },
                    error: function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Hubo un problema al consultar la base de datos.'
                        });
                    }
                });
            }
        }

        // Detectar cambio en el campo de matrícula en el modal de agregar
        $('#matricula').on('keydown', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();  // Evitar envío del formulario
                buscarDatosMatricula('#matricula', '#nombre_comisionado', '#categoria', '#numero_comisiones');
            }
        });

        // Detectar cambio en el campo de matrícula en los modales de edición
        $('[id^="edit_matricula"]').on('keydown', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();  // Evitar envío del formulario
                const idSuffix = $(this).attr('id').replace('edit_matricula', '');
                buscarDatosMatricula(
                    '#edit_matricula' + idSuffix,
                    '#edit_nombre_comisionado' + idSuffix,
                    '#edit_categoria' + idSuffix,
                    '#edit_numero_comisiones' + idSuffix
                );
            }
        });
    });



    // Detectar doble 'Ctrl' en el campo de matrícula
    let lastCtrlTime = 0;
    document.getElementById('matricula').addEventListener('keydown', function (e) {
        if (e.key === 'Control') {  // Detectar cuando la tecla 'Ctrl' es presionada
            const now = Date.now();
            if (now - lastCtrlTime < 300) {  // Si el tiempo entre dos 'Ctrl' es menor a 300 ms
                e.preventDefault();  // Evitar cualquier acción predeterminada
                buscarDatosPorMatricula(this.value);  // Llamar a la función de búsqueda
            }
            lastCtrlTime = now;  // Actualizar el tiempo de la última pulsación
        }
    });




    function buscarDatosPorMatricula(matricula) {
        if (matricula) {
            $.ajax({
                url: 'CRUD/contextos/buscar_datos_matricula.php',  // Archivo PHP para la búsqueda
                type: 'POST',
                data: { matricula: matricula },
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        // Llenar los campos del modal con los datos obtenidos
                        $('#folio').val(response.folio);
                        $('#fecha_comision_num').val(response.fecha_comision_num);
                        $('#nombre_comisionado').val(response.nombre_comisionado);
                        $('#telefono').val(response.telefono);
                        $('#categoria').val(response.categoria);
                        $('#adscripcion').val(response.adscripcion);
                        $('#plaza').val(response.plaza);
                        $('#puesto_comisionado').val(response.puesto_comisionado);
                        $('#um_destino').val(response.um_destino);
                        $('#turno').val(response.turno);
                        $('#horas_turno').val(response.horas_turno);
                        $('#fecha_inicio_num').val(response.fecha_inicio_num);
                        $('#fecha_termino_num').val(response.fecha_termino_num);
                        $('#ano_comision').val(response.ano_comision);
                        $('#justificacion').val(response.justificacion);
                        $('#director').val(response.director);
                        $('#director_adscripcion').val(response.director_adscripcion);
                        $('#numero_comisiones').val(response.numero_comisiones);
                        $('#estatus').val(response.estatus);
                        $('#fecha_solicitud').val(response.fecha_solicitud);
                        $('#medio_solicitud').val(response.medio_solicitud);
                        $('#fecha_recepcion_personal').val(response.fecha_recepcion_personal);
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Sin resultados',
                            text: 'No se encontró información para la matrícula ingresada.'
                        });
                    }
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo un problema al consultar la base de datos.'
                    });
                }
            });
        }
    }






    document.getElementById('folio_foliodelter').addEventListener('keydown', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();

            let folio = this.value.trim();

            if (!folio) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Advertencia',
                    text: 'Por favor, ingresa un folio válido.'
                });
                return;
            }

            // Extraer los dígitos antes del '/'
            const folioParte = folio.split('/')[0];
            console.log('Parte del folio enviada:', folioParte); // Debug

            fetch('CRUD/contextos/buscar_folio.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ folio: folioParte }), // Enviar solo la parte del folio
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la respuesta del servidor');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Datos recibidos:', data);
                    if (data.success) {
                        // Llenar los campos con los datos obtenidos
                        document.getElementById('nombre_comisionado_t').value = data.data.nombre_comisionado;
                        document.getElementById('matricula_t').value = data.data.matricula;
                        document.getElementById('categoria_t').value = data.data.categoria;
                        document.getElementById('adscripcion_t').value = data.data.adscripcion;
                        document.getElementById('lcomision').value = `${data.data.puesto_comisionado} - ${data.data.um_destino}`;
                        document.getElementById('plaza_tt').value = data.data.plaza;
                        document.getElementById('fecha_termino_num_t').value = data.data.fecha_termino_num;
                        document.getElementById('fecha_comision_num_t').value = data.data.fecha_inicio_num;
                        // Calcular la fecha actual + 1 día
                        const fechaTermino = new Date();
                        fechaTermino.setDate(fechaTermino.getDate() + 1);
                        document.getElementById('fecha_termino_t').value = fechaTermino.toISOString().split('T')[0];
                    } else {
                        Swal.fire({
                            icon: 'info',
                            title: 'Sin resultados',
                            text: 'No se encontró información para el folio ingresado.'
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ocurrió un problema al consultar los datos.'
                    });
                    console.error('Error en la solicitud:', error);
                });
        }
    });




    document.addEventListener('DOMContentLoaded', function () {
        const btnGuardarFolio = document.getElementById('btnguardarfolio');

        if (btnGuardarFolio) {
            btnGuardarFolio.addEventListener('click', function () {
                const foliotermino = document.getElementById('foliotermino').value.trim();
                const fechaTermino = document.getElementById('fecha_termino_t').value.trim();
                const folioFiltro = document.getElementById('folio_foliodelter').value.trim();

                if (!foliotermino || !fechaTermino || !folioFiltro) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Advertencia',
                        text: 'Todos los campos son obligatorios.'
                    });
                    return;
                }

                fetch('CRUD/contextos/actualizar_folio.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        foliotermino: foliotermino,
                        fecha_termino_t: fechaTermino,
                        folio_foliodelter: folioFiltro
                    }),
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Error en la respuesta del servidor');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Actualización Exitosa',
                                text: data.message || 'Los datos se han actualizado correctamente.',
                            });
                            $('#terminocomi').modal('hide'); // Cerrar el modal
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: data.message || 'No se pudo actualizar el registro.',
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Hubo un problema al actualizar los datos.',
                        });
                        console.error('Error en la solicitud:', error);
                    });
            });
        } else {
            console.error('El botón con id="btnguardarfolio" no se encontró en el DOM.');
        }
    });



</script>







<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function () {
    $('#btnGuardarAjax').click(function () {
        var formData = new FormData(document.getElementById("formAgregarComision"));

        $.ajax({
            url: 'CRUD/contextos/guardar_comision.php', // o el archivo que procesa el formulario
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Comisión guardada correctamente',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = "inicio.php";
                });
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo guardar la comisión. Verifica la conexión o los datos.'
                });
                console.error('Error AJAX:', xhr.responseText);
            }
        });
    });
});
</script>















</body>

</html>