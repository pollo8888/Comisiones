<!-- Agregar Nuevos Registros -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <center>
                <h4 class="modal-title" id="myModalLabel">Nuevo Registro</h4>
            </center>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
                <div class="card-body">
                    <form method="POST" autocomplete="true" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 pr-0">
                                <select name="enviarr" class="selectpicker" data-live-search="true">

                                    <option value="Alta">Alta</option>
                                    <option value="Baja">Baja</option>
                                    <option value="Desactivar">Desactivar</option>
                                    <option value="Cambio">Cambio</option>
                                    <option value="Cobertura">Cobertura</option>
                                    <option value="Reactivar_Usuario">Reactivar Usuario</option>
                                    <option value="Reactivar_Contrasena">Reactivar Contraseña</option>
                                    <option value="Medico_Titular">Médico Titular</option>
                                    <option value="Medico_Suplente">Médico Suplente</option>
                                    <option value="Asignacion_de_Perfil">Asignación de Perfil</option>
                                    <option value="Cambio_de_Perfil">Cambio de Perfil</option>
                                    <option value="Alta_de_Consultorio">Alta de Consultorio</option>
                                    <option value="Relacion_Consultorio_Turno_Horario">Relación Consultorio -
                                        Turno - Horario</option>
                                    <option value="Relacion_Consultorios_Usuarios">Relación Consultorios-
                                        Usuarios</option>
                                    <option value="Sexto_y_Septimo_Dia">Sexto y Séptimo Día</option>




                                </select>
                            </div>



                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>Matricula</label>
                                    <input name="matricula" id="matricula" type="text" class="form-control" required placeholder="Ingrese su matricula">
                                </div>
                            </div>

                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>Nombre</label>
                                    <input id="nombre" name="nombre" type="text" class="form-control" required placeholder="Ingrese su matricula">
                                </div>
                            </div>


                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>Apellido Paterno</label>
                                    <input id="apaterno" name="apaterno" type="text" class="form-control" required placeholder="Ingrese su matricula">
                                </div>
                            </div>

                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>Apellido Materno</label>
                                    <input id="amaterno" name="amaterno" type="text" class="form-control" required placeholder="Ingrese su matricula">
                                </div>
                            </div>

                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>Cédula Profesional</label>
                                    <input id="edad" name="edad" type="text" class="form-control" required placeholder="Ingrese su Cédula Profesional">
                                </div>
                            </div>

                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>"Correo electrónico institucional [@imss.gob.mx]"</label>
                                    <input id="celectronico" name="celectronico" type="text" class="form-control" required placeholder="Ingrese su Correo Electronico">
                                </div>
                            </div>

                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>"Tipo de Prestador de la Atención"</label>
                                    <input id="tpPrestadorat" name="tpPrestadorat" type="text" class="form-control" required placeholder="Ingrese su ">
                                </div>
                            </div>


                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>"Clave de Usuario asignada[ECE IMSS - MOCE]"</label>
                                    <input id="cluasigec" name="cluasigec" type="text" class="form-control" required placeholder="Ingrese su ">
                                </div>
                            </div>





                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>"Clave Servicio / Especialidad / SubEspecialidad"</label>
                                    <input id="Clses" name="Clses" type="text" class="form-control" required placeholder="Ingrese su ">
                                </div>
                            </div>





                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>"Descripción de la Especialidad / SubEspecialidad"</label>
                                    <input id="DESCUB" name="DESCUB" type="text" class="form-control" required placeholder="Ingrese su ">
                                </div>
                            </div>

                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>"Consultorio ECE IMSS - MOCE[Clave]"</label>
                                    <input id="conEce" name="conEce" type="text" class="form-control" required placeholder="Ingrese su ">
                                </div>
                            </div>


                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>"Consultorio SIMO CENTRAL[Clave]"</label>
                                    <input id="conSimo" name="conSimo" type="text" class="form-control" required placeholder="Ingrese su ">
                                </div>
                            </div>

                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>"Turno"</label>
                                    <input id="turno" name="turno" type="text" class="form-control" required placeholder="Ingrese su " onkeyup="autocompletarFrase()">
                                </div>
                            </div>

                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>"Horas Trabajadas por Turno "</label>
                                    <input id="horaInput1" name="hrtxtu" type="text" class="form-control" required placeholder="Ingrese su ">
                                </div>
                            </div>

                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>"Tipo de Vista"</label>
                                    <input id="tpVista" name="tpVista" type="text" class="form-control" required placeholder="Ingrese su ">
                                </div>
                            </div>

                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>"Inicio y fin de la Agenda de Citas"</label>
                                    <input id="horaInput2" name="infnac" type="text" class="form-control" required placeholder="Ingrese su ">
                                </div>
                            </div>


                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>"Inicio y fin de la Atención"</label>
                                    <input id="horaInput3" name="infnat" type="text" class="form-control" required placeholder="Ingrese su ">
                                </div>
                            </div>

                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>"Intervalo"</label>
                                    <input id="intervalo" name="intervalo" type="text" class="form-control" required placeholder="Ingrese su ">
                                </div>
                            </div>

                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>"Fecha Inicio"</label>
                                    <input id="fchi" name="fchi" type="date" class="form-control" required placeholder="Ingrese su ">
                                </div>
                            </div>


                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>"Fecha Final"</label>
                                    <input id="fchf" name="fchf" type="date" class="form-control" required placeholder="Ingrese su ">
                                </div>
                            </div>


                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>"Fecha en que se aplica el movimiento ECE IMSS - MOCE"</label>
                                    <input id="fchamece" name="fchamece" type="date" class="form-control" required placeholder="Ingrese su ">
                                </div>
                            </div>



                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>"Matrícula persona realiza movimiento"</label>
                                    <input id="mprm" name="mprm" type="text" class="form-control" required placeholder="Ingrese su ">
                                </div>
                            </div>


                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>"Nombre Completo persona realiza movimiento"</label>
                                    <input id="ncprm" name="ncprm" type="text" class="form-control" required placeholder="Ingrese su ">
                                </div>
                            </div>


                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>"Movimiento aplicado en Catálogos"</label>
                                    <input id="maec" name="maec" type="text" class="form-control" required placeholder="Ingrese su ">
                                </div>
                            </div>

                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>"Visto Bueno por parte del Usuario"</label>
                                    <input id="vbpdu" name="vbpdu" type="text" class="form-control" required placeholder="Ingrese su ">
                                </div>
                            </div>


                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>"Ticket registrado en la Mesa de Servicios"</label>
                                    <input id="trmds" name="trmds" type="text" class="form-control" required placeholder="Ingrese su ">
                                </div>
                            </div>


                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>"Estatus y respuesta(s) por parte de Mesa"</label>
                                    <input id="estatus" name="estatus" type="text" class="form-control" required placeholder="Ingrese su ">
                                </div>
                            </div>


                            <div class="col-md-6 pr-0">
                                <div class="form-group form-group-default">
                                    <label>"Observaciones"</label>
                                    <input id="obser" name="obser" type="text" class="form-control" required placeholder="Ingrese su ">
                                </div>
                            </div>








                        </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="simf.php" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
            <button type="submit" name="agregar" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
            </form>
        </div>
    </div>
</div>
</div>



<script>
  function autoCompletarHora(input) {
    input.addEventListener('change', function() {
      let hora = this.value;
      
      // Verificar si el valor ingresado es un número válido
      if (!isNaN(hora) && hora >= 0 && hora <= 23) {
        // Agregar ceros a la izquierda si es necesario
        hora = hora.padStart(2, '0');
        
        // Asignar la hora completa al campo de texto
        this.value = hora + ':00';
      }
    });
  }

  const horaInput1 = document.getElementById('horaInput1');
  const horaInput2 = document.getElementById('horaInput2');
  const horaInput3 = document.getElementById('horaInput3');

  autoCompletarHora(horaInput1);
  autoCompletarHora(horaInput2);
  autoCompletarHora(horaInput3);
</script>




<script>
    function autocompletarFrase() {
        var input = document.getElementById("turno");
        var texto = input.value.toLowerCase();

        if (texto === "m") {
            input.value = "MATUTINO";
        } else if (texto === "v") {
            input.value = "VESPERTINO";
        }
    }
</script>



<script>
    $(document).ready(function() {
        var timeoutId; // Variable para almacenar el ID del temporizador

        $('#matricula').on('input', function() {
            var matricula = $(this).val();

            // Reiniciar los campos antes de la nueva consulta
            reiniciarCampos();

            // Cancelar el temporizador anterior si existe
            clearTimeout(timeoutId);

            // Establecer una demora de 500 ms antes de realizar la solicitud
            timeoutId = setTimeout(function() {
                // Realizar la solicitud AJAX solo si la matrícula no está vacía
                if (matricula !== '') {
                    // Realizar la solicitud AJAX
                    $.ajax({
                        url: 'CRUD/contextos/obtener_datos_alumno.php', // Archivo PHP que consulta la base de datos
                        method: 'POST',
                        data: {
                            matricula: matricula
                        },
                        dataType: 'json',
                        success: function(data) {
                            if (data) {
                                // Rellenar los campos con los datos obtenidos
                                $('#nombre').val(data.nombre);
                                $('#edad').val(data.edad);
                                $('#apaterno').val(data.A_Paterno);
                                $('#amaterno').val(data.A_Materno);
                                $('#celectronico').val(data.CElectronico);
                                $('#tpPrestadorat').val(data.Tipo_de_Prestador);

                                $('#cluasigec').val(data.Clave_de_Usuario_asignada);
                                $('#Clses').val(data.Clave_Servicio);
                                $('#DESCUB').val(data.Des_Especialidad);

                            } else {
                                // Si no se encuentra el alumno, mostrar un mensaje de error o reiniciar los campos
                                reiniciarCampos();
                                alert('No se encontró ningún alumno con esa matrícula');
                            }
                        },
                        error: function() {
                            // Manejo de errores
                            reiniciarCampos();
                            alert('Ocurrió un error en la solicitud');
                        }
                    });
                }
            }, 1500);
        });

        // Función para reiniciar los campos
        function reiniciarCampos() {
            $('#nombre').val('');
            $('#edad').val('');
            $('#amaterno').val('');
            $('#apaterno').val('');
            $('#celectronico').val('');
            $('#tpPrestadorat').val('');

            $('#cluasigec').val('');
            $('#Clses').val('');
            $('#DESCUB').val('');

        }
    });
</script>




<script>
    $(document).ready(function() {
        var timeoutId; // Variable para almacenar el ID del temporizador

        $('#cluasigec').on('input', function() {
            var cluasigec = $(this).val();

            // Reiniciar los campos antes de la nueva consulta
            reiniciarCampos();

            // Cancelar el temporizador anterior si existe
            clearTimeout(timeoutId);

            // Establecer una demora de 500 ms antes de realizar la solicitud
            timeoutId = setTimeout(function() {
                // Realizar la solicitud AJAX solo si la matrícula no está vacía
                if (cluasigec !== '') {
                    // Realizar la solicitud AJAX
                    $.ajax({
                        url: 'CRUD/contextos/obtener_especialidad.php', // Archivo PHP que consulta la base de datos
                        method: 'POST',
                        data: {
                            cluasigec: cluasigec
                        },
                        dataType: 'json',
                        success: function(data) {
                            if (data) {
                                // Rellenar los campos con los datos obtenidos
                                $('#Clses').val(data.id);
                                $('#DESCUB').val(data.especialidad);

                            } else {
                                // Si no se encuentra el alumno, mostrar un mensaje de error o reiniciar los campos
                                reiniciarCampos();
                                alert('No se encontró nada con esa clave');
                            }
                        },
                        error: function() {
                            // Manejo de errores
                            reiniciarCampos();
                            alert('Ocurrió un error en la solicitud');
                        }
                    });
                }
            }, 1500);
        });

        // Función para reiniciar los campos
        function reiniciarCampos() {
            $('#Clses').val('');
            $('#DESCUB').val('');

        }
    });
</script>



<script>
    $(document).ready(function() {
        var timeoutId; // Variable para almacenar el ID del temporizador

        $('#mprm').on('input', function() {
            var mprm = $(this).val();

            // Reiniciar los campos antes de la nueva consulta
            reiniciarCampos();

            // Cancelar el temporizador anterior si existe
            clearTimeout(timeoutId);

            // Establecer una demora de 500 ms antes de realizar la solicitud
            timeoutId = setTimeout(function() {
                // Realizar la solicitud AJAX solo si la matrícula no está vacía
                if (mprm !== '') {
                    // Realizar la solicitud AJAX
                    $.ajax({
                        url: 'CRUD/contextos/obtener_nombre.php', // Archivo PHP que consulta la base de datos
                        method: 'POST',
                        data: {
                            mprm: mprm
                        },
                        dataType: 'json',
                        success: function(data) {
                            if (data) {
                                // Rellenar los campos con los datos obtenidos
                                $('#ncprm').val(data.nombre + ' ' + data.A_Paterno + ' ' + data.A_Materno);

                            } else {
                                // Si no se encuentra el alumno, mostrar un mensaje de error o reiniciar los campos
                                reiniciarCampos();
                                alert('No se encontró nada con esa clave');
                            }
                        },
                        error: function() {
                            // Manejo de errores
                            reiniciarCampos();
                            alert('Ocurrió un error en la solicitud');
                        }
                    });
                }
            }, 1500);
        });

        // Función para reiniciar los campos
        function reiniciarCampos() {
            $('#ncprm').val('');

        }
    });
</script>




<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    $enviarrr = $_POST['enviarr'];
    $matriculas = $_POST['matricula'];
    $edads = $_POST['edad'];
    $nombress = $_POST['nombre'];
    $amaterno = $_POST['amaterno'];
    $apaterno = $_POST['apaterno'];
    $celectronico =  $_POST['celectronico'];
    $tpPrestadorat =  $_POST['tpPrestadorat'];

    $cluasigec =  $_POST['cluasigec'];
    $Clses =  $_POST['Clses'];
    $DESCUB =  $_POST['DESCUB'];

    // Realizamos la consulta para saber si coincide con uno de esos criterios
    $query = "SELECT * FROM alumnos WHERE Matricula = '$matriculas' ";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Ya existe un registro con la misma matrícula, realizamos el UPDATE
        $sql = "UPDATE alumnos SET edad = '$edads',CElectronico='$celectronico',Tipo_de_Prestador='$tpPrestadorat',Clave_de_Usuario_asignada='$cluasigec', Clave_Servicio='$Clses', Des_Especialidad='$DESCUB' WHERE Matricula = '$matriculas' ";

        if ($conn->query($sql) === TRUE) {
?>
        <?php
        } else {
        ?>
            <script type="text/javascript">
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se pudo actualizar el registro'
                });
            </script>
        <?php
        }
    } else {
        // No existe un registro con la misma matrícula, realizamos el INSERT
        $sql2 = "INSERT INTO `alumnos`(`Matricula`,`Nombre`,`A_Paterno`,`A_Materno`,`edad`,`CElectronico`,`Tipo_de_Prestador`,`Clave_de_Usuario_asignada`,`Clave_Servicio`,`Des_Especialidad`) VALUES ('$matriculas','$nombress','$apaterno','$amaterno','$edads','$celectronico','$tpPrestadorat','$cluasigec','$Clses','$DESCUB')";

        if ($conn->query($sql2) === TRUE) {
        ?>
            <script type="text/javascript">
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Registro insertado correctamente',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location = "#";
                });
            </script>
        <?php
        } else {
        ?>
            <script type="text/javascript">
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se pudo guardar el registro'
                });
            </script>
<?php
        }
    }

    // Cerramos la conexión
    $conn->close();
}
?>


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

    // Obtener los valores de los campos enviados por POST
    $enviarr = $_POST['enviarr'];
    $matricula = $_POST['matricula'];
    $nombre = $_POST['nombre'];
    $apaterno = $_POST['apaterno'];
    $amaterno = $_POST['amaterno'];
    $edad = $_POST['edad'];
    $celectronico = $_POST['celectronico'];
    $tpPrestadorat = $_POST['tpPrestadorat'];
    $cluasigec = $_POST['cluasigec'];
    $Clses = $_POST['Clses'];
    $DESCUB = $_POST['DESCUB'];
    $conEce = $_POST['conEce'];
    $conSimo = $_POST['conSimo'];
    $turno = $_POST['turno'];
    $hrtxtu = $_POST['hrtxtu'];
    $tpVista = $_POST['tpVista'];
    $infnac = $_POST['infnac'];
    $infnat = $_POST['infnat'];
    $intervalo = $_POST['intervalo'];
    $fchi = $_POST['fchi'];
    $fchf = $_POST['fchf'];
    $fchamece = $_POST['fchamece'];
    $mprm = $_POST['mprm'];
    $ncprm = $_POST['ncprm'];
    $maec = $_POST['maec'];
    $vbpdu = $_POST['vbpdu'];
    $trmds = $_POST['trmds'];
    $estatus = $_POST['estatus'];
    $obser = $_POST['obser'];

    // Realizamos la consulta para insertar los datos en la base de datos
    $sql = "INSERT INTO `simf`(`Tipo_Movimiento`, `Matricula`, `A_Paterno`, `A_Materno`, `Nombre`, `Cedula_prof`, `C_ElectronicoI`, `T_Prestador_A`, `Cl_Usr_Asig_simf`, `Cl_ser_o_esp`, `Des_Ser_esp`, `Cons_Simf`, `Cons_Sias`, `Turno_sias`, `Hr_tr_x_turno`, `T_vista`, `I_F_Agnda_C`, `I_F_Atncion`, `Intervalor`, `F_inicio`, `F_final`, `F_apl_mov_simf`, `Matricula_p_r_m_simf`, `Nom_p_r_m_simf`, `Mov_aplicado_ct`, `V_b_usrojefe`, `Ticket_Mes_sT`, `Status_mesa_sT`, `Observa_Jus_Auto`) VALUES ('$enviarr','$matricula','$apaterno','$amaterno','$nombre','$edad','$celectronico','$tpPrestadorat','$cluasigec','$Clses','$DESCUB','$conEce','$conSimo','$turno','$hrtxtu','$tpVista','$infnac','$infnat','$intervalo','$fchi','$fchf','$fchamece','$mprm','$ncprm','$maec','$vbpdu','$trmds','$estatus','$obser')";


    if (mysqli_query($conn, $sql)) {
?>
        <script type="text/javascript">
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Agregado correctamente',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location = "#";
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
            });
        </script>
<?php
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Cerramos la conexión
    mysqli_close($conn);
}
?>


<!-- -->