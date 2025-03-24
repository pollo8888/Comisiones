<?php
// index.php

// Conexión a la base de datos (reemplaza los valores con los de tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cirugias";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
	die("Conexión fallida: " . $conn->connect_error);
}

function obtenerClaves()
{
	session_start();
	$depar = $_SESSION['departamento'];
	global $conn;

	$sql = "SELECT `tblid`, `claveP`, `Departamento` FROM `pclavesp` WHERE `Departamento` = '$depar'";
	$result = $conn->query($sql);

	$claves = array();
	while ($row = $result->fetch_assoc()) {
		$claves[] = $row["claveP"];
	}

	return $claves;
}






if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["obtenerClaves"])) {
	header("Content-Type: application/json");
	echo json_encode(obtenerClaves());
	exit;
}
?>














<?php


function obtenertansporte()
{


	global $conn;

	$sql = "SELECT `tblid`, `claveP`, `Departamento` FROM `pclavesp` WHERE `Departamento` = 'MedioTransporte'";
	$result = $conn->query($sql);

	$claves = array();
	while ($row = $result->fetch_assoc()) {
		$claves[] = $row["claveP"];
	}

	return $claves;
}






if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["obtenerTansporte"])) {
	header("Content-Type: application/json");
	echo json_encode(obtenertansporte());
	exit;
}
?>







<?php


function obtenerecon_econ()
{


	global $conn;

	$sql = "SELECT `tblid`, `claveP`, `Departamento` FROM `pclavesp` WHERE `Departamento` = 'NumEcon'";
	$result = $conn->query($sql);

	$claves = array();
	while ($row = $result->fetch_assoc()) {
		$claves[] = $row["claveP"];
	}

	return $claves;
}






if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["obtenerecon_econ1"])) {
	header("Content-Type: application/json");
	echo json_encode(obtenerecon_econ());
	exit;
}
?>





<?php


function obtenerobtenerunidad_adscripcion()
{


	global $conn;

	$sql = "SELECT `tblid`, `claveP`, `Departamento` FROM `pclavesp` WHERE `Departamento` = 'UnidadAdscripcion'";
	$result = $conn->query($sql);

	$claves = array();
	while ($row = $result->fetch_assoc()) {
		$claves[] = $row["claveP"];
	}

	return $claves;
}






if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["obtenerunidad_adscripcion1"])) {
	header("Content-Type: application/json");
	echo json_encode(obtenerobtenerunidad_adscripcion());
	exit;
}
?>













<script>
	$(document).ready(function() {
		// Habilitar la edición al hacer clic en campos con la clase 'editable-field'
		$('.editable-field').on('click', function() {
			// Obtener el valor del campo de entrada
			var inputField = $(this).find('input');
			var fieldValue = inputField.val();

			// Verificar si el campo tiene algún valor antes de permitir la edición
			if (fieldValue.trim() !== '') {
				// Mostrar alerta antes de habilitar la edición
				Swal.fire({
					icon: 'info',
					title: '¡Preparado para editar!',
					text: 'Haz clic en "OK" para empezar a editar. Los cambios se guardarán hasta la próxima edición.',
					confirmButtonText: 'OK',
					showCancelButton: false,
				}).then((result) => {
					if (result.isConfirmed) {
						// Permitir la edición y enfocar el campo
						inputField.prop('readonly', false).focus();
					}
				});
			}
		});

		// Manejar la pérdida de foco para deshabilitar la edición
		$('.editable-field input').on('blur', function() {
			$(this).prop('readonly', true);
		});
	});
</script>




<script>
	$(document).ready(function() {
		// Habilitar la edición al hacer clic en campos con la clase 'editable-field'
		$('.editable-field1').on('click', function() {
			var inputField = $(this).find('input');
			var fieldValue = inputField.val();

			if (fieldValue.trim() !== '') {
				// Mostrar alerta antes de habilitar la edición
				Swal.fire({
					icon: 'info',
					title: '¡Preparado para editar!',
					text: 'Haz clic en "OK" para empezar a editar. Los cambios se guardarán hasta la próxima edición.',
					confirmButtonText: 'OK',
					showCancelButton: false,
				}).then((result) => {
					if (result.isConfirmed) {
						// Permitir la edición y enfocar el campo
						var inputField = $(this).find('input');
						inputField.prop('readonly', false).focus();
					}
				});
			}
		});

		// Manejar la pérdida de foco para deshabilitar la edición
		$('.editable-field1 input').on('blur', function() {
			$(this).prop('readonly', true);
		});
	});
</script>





<script>
	$(document).ready(function() {
		// Función para obtener claves en tiempo real
		function obtenerClavesEnTiempoReal() {
			$.ajax({
				url: "CRUD/contextos/AgregarModal.php?obtenerClaves=true",
				type: "GET",
				dataType: "json",
				success: function(data) {
					actualizarSelect(data);
				}
			});
		}

		// Función para actualizar el select con las nuevas claves
		function actualizarSelect(claves) {
			var selectClaveP = $("#selectClaveP");
			selectClaveP.empty(); // Limpiar las opciones actuales


			// Agregar las nuevas claves
			for (var i = 0; i < claves.length; i++) {
				selectClaveP.append("<option value='" + claves[i] + "'>" + claves[i] + "</option>");
			}
			// Agregar la opción "Otra"


			selectClaveP.append("<option value='otra'>Otra</option>");
		}

		// Manejar el cambio en el select
		$("#selectClaveP").change(function() {
			var selectClaveP = document.getElementById("selectClaveP");

			if (selectClaveP.value === "otra") {
				$('#addRowModal').modal('hide');
				$('#otroModal').modal('show');
			} else {
				$('#otroModal').modal('hide');
				$('#addRowModal').modal('show');
			}
		});


		// Manejar el evento shown.bs.modal para el modal otroModal
		$('#otroModal').on('shown.bs.modal', function() {
			// Ocultar el modal addRowModal
			$('#addRowModal').modal('hide');
		});

		// Manejar el evento hidden.bs.modal para el modal otroModal
		$('#otroModal').on('hidden.bs.modal', function() {
			// Mostrar el modal addRowModal
			$('#addRowModal').modal('show');
		});



		// Manejar el envío del formulario en el modal
		$("#otroModal form").submit(function(event) {
			event.preventDefault(); // Evitar que el formulario se envíe y la página se recargue

			// Obtener la nueva clave desde el formulario
			var nuevaClave = $("#nuevaClaveP").val();

			// Realizar la solicitud Ajax para agregar la nueva clave
			$.ajax({
				url: "CRUD/contextos/agregarclave.php",
				type: "POST",
				data: {
					nuevaClave: nuevaClave
				},
				success: function(response) {
					console.log(response); // Puedes imprimir la respuesta en la consola para depuración
					// Verificar si la respuesta indica éxito
					if (response === "exito") {
						// Mostrar SweetAlert 2 indicando que el modal se envió correctamente
						Swal.fire({
							icon: 'success',
							title: 'Enviado Correctamente ',
							text: 'La clave presupuestal fue agregada correctamente',
						});

						// Actualizar el select después de agregar la clave
						obtenerClavesEnTiempoReal();
						// Ocultar el modal después de agregar la clave
						$('#otroModal').modal('hide');
					} else {
						// En caso de error, puedes mostrar un SweetAlert 2 con un mensaje de error
						Swal.fire({
							icon: 'error',
							title: 'Error',
							text: 'Hubo un error al enviar el modal. Inténtalo de nuevo.',
						});
					}
				}
			});
		});

		// Obtener claves al cargar la página
		obtenerClavesEnTiempoReal();
	});
</script>



































<script>
	$(document).ready(function() {
		// Función para obtener claves en tiempo real
		function obtenerTansporteEnTiempoReal() {
			$.ajax({
				url: "CRUD/contextos/AgregarModal.php?obtenerTansporte=true",
				type: "GET",
				dataType: "json",
				success: function(data) {
					actualizarSelect(data);
				}
			});
		}

		// Función para actualizar el select con las nuevas claves
		function actualizarSelect(claves) {
			var selectClaveP = $("#medio_transporte1");
			selectClaveP.empty(); // Limpiar las opciones actuales


			// Agregar las nuevas claves
			for (var i = 0; i < claves.length; i++) {
				selectClaveP.append("<option value='" + claves[i] + "'>" + claves[i] + "</option>");
			}
			// Agregar la opción "Otra"


			selectClaveP.append("<option value='otra'>Otra</option>");
		}

		// Manejar el cambio en el select
		$("#medio_transporte1").change(function() {
			var selectClaveP = document.getElementById("medio_transporte1");

			if (selectClaveP.value === "otra") {
				$('#addRowModal').modal('hide');
				$('#otroModalTrans').modal('show');
			} else {
				$('#otroModalTrans').modal('hide');
				$('#addRowModal').modal('show');
			}
		});


		// Manejar el evento shown.bs.modal para el modal otroModal
		$('#otroModalTrans').on('shown.bs.modal', function() {
			// Ocultar el modal addRowModal
			$('#addRowModal').modal('hide');
		});

		// Manejar el evento hidden.bs.modal para el modal otroModal
		$('#otroModalTrans').on('hidden.bs.modal', function() {
			// Mostrar el modal addRowModal
			$('#addRowModal').modal('show');
		});



		// Manejar el envío del formulario en el modal
		$("#otroModalTrans form").submit(function(event) {
			event.preventDefault(); // Evitar que el formulario se envíe y la página se recargue

			// Obtener la nueva clave desde el formulario
			var nuevaClave = $("#nuevoTransport").val();

			// Realizar la solicitud Ajax para agregar la nueva clave
			$.ajax({
				url: "CRUD/contextos/agregartransporte.php",
				type: "POST",
				data: {
					nuevaClave: nuevaClave
				},
				success: function(response) {
					console.log(response); // Puedes imprimir la respuesta en la consola para depuración
					// Verificar si la respuesta indica éxito
					if (response === "exito") {
						// Mostrar SweetAlert 2 indicando que el modal se envió correctamente
						Swal.fire({
							icon: 'success',
							title: 'Enviado Correctamente ',
							text: 'El trasnporte fue agregado correctamente',
						});

						// Actualizar el select después de agregar la clave
						obtenerTansporteEnTiempoReal();
						// Ocultar el modal después de agregar la clave
						$('#otroModalTrans').modal('hide');
					} else {
						// En caso de error, puedes mostrar un SweetAlert 2 con un mensaje de error
						Swal.fire({
							icon: 'error',
							title: 'Error',
							text: 'Hubo un error al enviar el modal. Inténtalo de nuevo.',
						});
					}
				}
			});
		});

		// Obtener claves al cargar la página
		obtenerTansporteEnTiempoReal();
	});
</script>











































<script>
	$(document).ready(function() {
		// Función para obtener claves en tiempo real
		function obtenerecon_econ1EnTiempoReal() {
			$.ajax({
				url: "CRUD/contextos/AgregarModal.php?obtenerecon_econ1=true",
				type: "GET",
				dataType: "json",
				success: function(data) {
					actualizarSelect(data);
				}
			});
		}

		// Función para actualizar el select con las nuevas claves
		function actualizarSelect(claves) {
			var selectClaveP = $("#econ_econ1");
			selectClaveP.empty(); // Limpiar las opciones actuales


			// Agregar las nuevas claves
			for (var i = 0; i < claves.length; i++) {
				selectClaveP.append("<option value='" + claves[i] + "'>" + claves[i] + "</option>");
			}
			// Agregar la opción "Otra"


			selectClaveP.append("<option value='otra'>Otra</option>");
		}

		// Manejar el cambio en el select
		$("#econ_econ1").change(function() {
			var selectClaveP = document.getElementById("econ_econ1");

			if (selectClaveP.value === "otra") {
				$('#addRowModal').modal('hide');
				$('#otroModalecon').modal('show');
			} else {
				$('#otroModalecon').modal('hide');
				$('#addRowModal').modal('show');
			}
		});


		// Manejar el evento shown.bs.modal para el modal otroModal
		$('#otroModalecon').on('shown.bs.modal', function() {
			// Ocultar el modal addRowModal
			$('#addRowModal').modal('hide');
		});

		// Manejar el evento hidden.bs.modal para el modal otroModal
		$('#otroModalecon').on('hidden.bs.modal', function() {
			// Mostrar el modal addRowModal
			$('#addRowModal').modal('show');
		});



		// Manejar el envío del formulario en el modal
		$("#otroModalecon form").submit(function(event) {
			event.preventDefault(); // Evitar que el formulario se envíe y la página se recargue

			// Obtener la nueva clave desde el formulario
			var nuevaClave = $("#nuevoecon_econ").val();

			// Realizar la solicitud Ajax para agregar la nueva clave
			$.ajax({
				url: "CRUD/contextos/agregarecon.php",
				type: "POST",
				data: {
					nuevaClave: nuevaClave
				},
				success: function(response) {
					console.log(response); // Puedes imprimir la respuesta en la consola para depuración
					// Verificar si la respuesta indica éxito
					if (response === "exito") {
						// Mostrar SweetAlert 2 indicando que el modal se envió correctamente
						Swal.fire({
							icon: 'success',
							title: 'Enviado Correctamente ',
							text: 'El NUM ECON fue agregado correctamente',
						});

						// Actualizar el select después de agregar la clave
						obtenerecon_econ1EnTiempoReal();
						// Ocultar el modal después de agregar la clave
						$('#otroModalecon').modal('hide');
					} else {
						// En caso de error, puedes mostrar un SweetAlert 2 con un mensaje de error
						Swal.fire({
							icon: 'error',
							title: 'Error',
							text: 'Hubo un error al enviar el modal. Inténtalo de nuevo.',
						});
					}
				}
			});
		});

		// Obtener claves al cargar la página
		obtenerecon_econ1EnTiempoReal();
	});
</script>

















































<script>
	$(document).ready(function() {
		// Función para obtener claves en tiempo real
		function obtenerunidad_adscripcion1EnTiempoReal() {
			$.ajax({
				url: "CRUD/contextos/AgregarModal.php?obtenerunidad_adscripcion1=true",
				type: "GET",
				dataType: "json",
				success: function(data) {
					actualizarSelect(data);
				}
			});
		}

		// Función para actualizar el select con las nuevas claves
		function actualizarSelect(claves) {
			var selectClaveP = $("#unidad_adscripcion1");
			selectClaveP.empty(); // Limpiar las opciones actuales


			// Agregar las nuevas claves
			for (var i = 0; i < claves.length; i++) {
				selectClaveP.append("<option value='" + claves[i] + "'>" + claves[i] + "</option>");
			}
			// Agregar la opción "Otra"


			selectClaveP.append("<option value='otra'>Otra</option>");
		}

		// Manejar el cambio en el select
		$("#unidad_adscripcion1").change(function() {
			var selectClaveP = document.getElementById("unidad_adscripcion1");

			if (selectClaveP.value === "otra") {
				$('#addRowModal').modal('hide');
				$('#otroModalAds').modal('show');
			} else {
				$('#otroModalAds').modal('hide');
				$('#addRowModal').modal('show');
			}
		});


		// Manejar el evento shown.bs.modal para el modal otroModal
		$('#otroModalAds').on('shown.bs.modal', function() {
			// Ocultar el modal addRowModal
			$('#addRowModal').modal('hide');
		});

		// Manejar el evento hidden.bs.modal para el modal otroModal
		$('#otroModalAds').on('hidden.bs.modal', function() {
			// Mostrar el modal addRowModal
			$('#addRowModal').modal('show');
		});



		// Manejar el envío del formulario en el modal
		$("#otroModalAds form").submit(function(event) {
			event.preventDefault(); // Evitar que el formulario se envíe y la página se recargue

			// Obtener la nueva clave desde el formulario
			var nuevaClave = $("#nuevounidadads").val();

			// Realizar la solicitud Ajax para agregar la nueva clave
			$.ajax({
				url: "CRUD/contextos/agregarunidad.php",
				type: "POST",
				data: {
					nuevaClave: nuevaClave
				},
				success: function(response) {
					console.log(response); // Puedes imprimir la respuesta en la consola para depuración
					// Verificar si la respuesta indica éxito
					if (response === "exito") {
						// Mostrar SweetAlert 2 indicando que el modal se envió correctamente
						Swal.fire({
							icon: 'success',
							title: 'Enviado Correctamente ',
							text: 'La nueva unidad de adscripción fue agregado correctamente',
						});

						// Actualizar el select después de agregar la clave
						obtenerunidad_adscripcion1EnTiempoReal();
						// Ocultar el modal después de agregar la clave
						$('#otroModalAds').modal('hide');
					} else {
						// En caso de error, puedes mostrar un SweetAlert 2 con un mensaje de error
						Swal.fire({
							icon: 'error',
							title: 'Error',
							text: 'Hubo un error al enviar el modal. Inténtalo de nuevo.',
						});
					}
				}
			});
		});

		// Obtener claves al cargar la página
		obtenerunidad_adscripcion1EnTiempoReal();
	});
</script>

























<script>
	$(document).ready(function() {
		// Función para buscar el nombre completo
		function buscarNombreCompleto(nombreCampo, cargoCampo, gpo_jerarquicoCampo, cont_comisionadoCampo, inputElement) {
			// Realizar la solicitud AJAX con la ruta correcta
			$.ajax({
				type: 'POST',
				url: 'CRUD/contextos/buscar_alumno.php', // Ruta correcta de tu archivo PHP
				data: {
					matricula: $(inputElement).val()
				},
				success: function(response) {
					// Manejar la respuesta del servidor
					if (response.success) {
						var cargo = response.Desc_Depto;
						var nombreCompleto = response.nombre;

						// Mostrar el nombre completo en el campo correspondiente
						$('input[name="' + nombreCampo + '"]').val(nombreCompleto);

						if (cargoCampo) {
							var cargo = response.Desc_Depto;
							// Mostrar el cargo en el campo correspondiente (si existe)
							$('input[name="' + cargoCampo + '"]').val(cargo);
						}
						if (cont_comisionadoCampo) {
							var Descripcion_PlazaC = response.Descripcion_Plaza;
							$('input[name="' + cont_comisionadoCampo + '"]').val(Descripcion_PlazaC);
						}
						if (gpo_jerarquicoCampo) {
							var gpo_jerarquicoC = response.Descripcion_Categoria_Puesto;
							$('input[name="' + gpo_jerarquicoCampo + '"]').val(gpo_jerarquicoC);
						}
					} else {
						// Mostrar un mensaje SweetAlert2 si no se encuentra la matrícula
						Swal.fire({
							icon: 'error',
							title: 'Error',
							text: 'Matrícula no encontrada',
						});
						$('input[name="' + nombreCampo + '"]').val('');
						$('input[name="' + cargoCampo + '"]').val('');
						$('input[name="' + cont_comisionadoCampo + '"]').val('');
						$('input[name="' + gpo_jerarquicoCampo + '"]').val('');
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
		}

		// Evento de cambio en el campo de matrícula del solicitante
		$('input[name="matricula_solicitante"]').on('input', function(e) {
			if (e.which === 13) { // Verificar si la tecla presionada es Enter
				buscarNombreCompleto('nombre_solicitante', 'cargo', null, null, this);
			}
		}).on('blur', function() {
			buscarNombreCompleto('nombre_solicitante', 'cargo', null, null, this);
		});



		$('input[name="matricula_autoriza"]').on('input', function(e) {
			if (e.which === 13) { // Verificar si la tecla presionada es Enter
				buscarNombreCompleto('nombre_autoriza', null, null, null, this);
			}
		}).on('blur', function() {
			buscarNombreCompleto('nombre_autoriza', null, null, null, this);
		});



		$('input[name="matricula_comisionado"]').on('input', function(e) {
			if (e.which === 13) { // Verificar si la tecla presionada es Enter
				buscarNombreCompleto('nombre_comisionado', null, 'gpo_jerarquico', 'cont_comisionado', this);
			}
		}).on('blur', function() {
			buscarNombreCompleto('nombre_comisionado', null, 'gpo_jerarquico', 'cont_comisionado', this);
		});
		// Otros eventos similares para los demás campos...
	});
</script>




<script>
	document.addEventListener("DOMContentLoaded", function() {
		var medioTransporteSelect = document.querySelector('[name="medio_transporte"]');
		var vehiculoOficialSelectContainer = document.getElementById('vehiculoOficialSelectContainer');

		medioTransporteSelect.addEventListener("change", function() {
			var selectedOption = medioTransporteSelect.options[medioTransporteSelect.selectedIndex].value;

			if (selectedOption === 'VEHICULO OFICIAL') {
				vehiculoOficialSelectContainer.style.display = 'block';
			} else {
				vehiculoOficialSelectContainer.style.display = 'none';
			}
		});
	});
</script>




<script>
	$(document).ready(function() {
		// Función para obtener la fecha actual en el formato YYYY-MM-DD
		function obtenerFechaActual() {
			var fechaActual = new Date();
			var mes = (fechaActual.getMonth() + 1).toString().padStart(2, '0'); // Agrega un cero al mes si es necesario
			var dia = fechaActual.getDate().toString().padStart(2, '0'); // Agrega un cero al día si es necesario
			var fechaFormateada = fechaActual.getFullYear() + '-' + mes + '-' + dia;
			return fechaFormateada;
		}

		// Establecer la fecha actual como valor por defecto
		$('input[name="fecha_elaboracion"]').val(obtenerFechaActual());

		// Función para buscar el nombre completo (tus funciones anteriores aquí)...

		// Evento de cambio en el campo de matrícula del solicitante (tus eventos anteriores aquí)...
	});
</script>




<script>
	$(document).ready(function() {
		// Función para obtener la fecha actual en el formato YYYY-MM-DD
		function obtenerFechaActual() {
			var fechaActual = new Date();
			var mes = (fechaActual.getMonth() + 1).toString().padStart(2, '0'); // Agrega un cero al mes si es necesario
			var dia = fechaActual.getDate().toString().padStart(2, '0'); // Agrega un cero al día si es necesario
			var fechaFormateada = fechaActual.getFullYear() + '-' + mes + '-' + dia;
			return fechaFormateada;
		}

		// Función para restar un día a la fecha
		function restarUnDia(fecha) {
			var fechaRestada = new Date(fecha);
			fechaRestada.setDate(fechaRestada.getDate() - 1);
			return fechaRestada.toISOString().split('T')[0]; // Formato YYYY-MM-DD
		}

		// Establecer la fecha actual menos un día como valor por defecto para inicio_comision
		var fechaActualMenosUnDia = restarUnDia(obtenerFechaActual());
		$('input[name="inicio_comision"]').val(fechaActualMenosUnDia);

		// Función para buscar el nombre completo (tus funciones anteriores aquí)...

		// Evento de cambio en el campo de matrícula del solicitante (tus eventos anteriores aquí)...
	});
</script>






<div class="modal fade" id="otroModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index: 1051;">
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">

				<center>
					<h4 class="modal-title" id="myModalLabel">Nuevo Registro</h4>
				</center>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="modal-body">
						<form>
							<label for="nuevaClaveP">Nueva Clave:</label>
							<input type="text" id="nuevaClaveP" name="nuevaClaveP" class="form-control" required placeholder="Introduce la nueva clave presupuestal">


					</div>

					<!-- Pie del Modal -->
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Enviar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>











<div class="modal fade" id="otroModalTrans" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index: 1051;">
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">

				<center>
					<h4 class="modal-title" id="myModalLabel">Nuevo Registro</h4>
				</center>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="modal-body">
						<form>
							<label for="nuevaClaveP">Nuevo Medio Transporte:</label>
							<input type="text" id="nuevoTransport" name="nuevoTransport" class="form-control" required placeholder="Introduce el nuevo transporte">


					</div>

					<!-- Pie del Modal -->
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Enviar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>










<div class="modal fade" id="otroModalecon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index: 1051;">
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">

				<center>
					<h4 class="modal-title" id="myModalLabel">Nuevo Registro</h4>
				</center>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="modal-body">
						<form>
							<label for="nuevaClaveP">Nuevo NUM. ECON:</label>
							<input type="text" id="nuevoecon_econ" name="nuevoecon_econ" class="form-control" required placeholder="Introduce el nuevo NUM. ECON">


					</div>

					<!-- Pie del Modal -->
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Enviar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>








<div class="modal fade" id="otroModalAds" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index: 1051;">
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">

				<center>
					<h4 class="modal-title" id="myModalLabel">Nuevo Registro</h4>
				</center>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="modal-body">
						<form>
							<label for="nuevaClaveP">Nueva unidad de adscripción:</label>
							<input type="text" id="nuevounidadads" name="nuevounidadads" class="form-control" required placeholder="Introduce la nueva unidad de adscripción">


					</div>

					<!-- Pie del Modal -->
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Enviar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>






<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index: 1050;">
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">

				<center>
					<h4 class="modal-title" id="myModalLabel">Nuevo Registro</h4>
				</center>
			</div>
			<div class="modal-body">
				<div class="container-fluid">

					<div class="card-body">
						<form method="POST" autocomplete="off" enctype="multipart/form-data">
							<div class="row">



								<!-- NUM DE PLIEGO -->
								<div class="col-md-6 pr-0">
									<div class="form-group form-group-default">
										<label>NUM DE PLIEGO</label>
										<input name="num_pliego" type="number" class="form-control" placeholder="Ingrese el número de pliego">
									</div>
								</div>

								<!-- FECHA ELABORACION DE PLIEGO -->
								<div class="col-md-6 ">
									<div class="form-group form-group-default">
										<label>FECHA ELABORACION DE PLIEGO</label>
										<input name="fecha_elaboracion" type="date" class="form-control" required>
									</div>
								</div>


								<!-- MATRICULA SOLICITANTE -->
								<div class="col-md-6 ">
									<div class="form-group form-group-default">
										<label>MATRICULA SOLICITANTE</label>
										<input name="matricula_solicitante" type="number" class="form-control" required placeholder="Ingrese la matricula del solicitante">
									</div>
								</div>



								<div class="col-md-6">
									<div class="form-group form-group-default editable-field">
										<label>NOMBRE SOLICITANTE</label>
										<input name="nombre_solicitante" type="text" class="form-control" required readonly>
									</div>
								</div>



								<div class="col-md-6 ">
									<div class="form-group form-group-default">
										<label>MATRICULA AUTORIZA</label>
										<input name="matricula_autoriza" type="number" class="form-control" required placeholder="Ingrese la matricula del solicitante">
									</div>
								</div>



								<div class="col-md-6">
									<div class="form-group form-group-default editable-field">
										<label>NOMBRE AUTORIZA</label>
										<input name="nombre_autoriza" type="text" class="form-control" required readonly>
									</div>
								</div>





								<!-- MATRICULA COMISIONADO -->
								<div class="col-md-6 ">
									<div class="form-group form-group-default">
										<label>MATRICULA COMISIONADO</label>
										<input name="matricula_comisionado" type="number" class="form-control" required placeholder="Ingrese la matricula del comisionado">
									</div>
								</div>


								<div class="col-md-6">
									<div class="form-group form-group-default editable-field">
										<label>NOMBRE COMISIONADO</label>
										<input name="nombre_comisionado" type="text" class="form-control" required readonly>
									</div>
								</div>


								<div class="col-md-6">
									<div class="form-group form-group-default editable-field1">
										<label>CARGO SOLICITANTE</label>
										<input name="cargo" type="text" class="form-control" required readonly>
									</div>
								</div>


								<div class="col-md-6">
									<div class="form-group form-group-default editable-field1">
										<label>GPO JERARQUICO COMISIONADO</label>
										<input name="gpo_jerarquico" type="text" class="form-control" required readonly>
									</div>
								</div>


								<div class="col-md-6">
									<div class="form-group form-group-default editable-field1">
										<label>CONTRATACIÓN DEL COMISIONADO</label>
										<input name="cont_comisionado" type="text" class="form-control" required readonly>
									</div>
								</div>




								<div class="col-md-6">
									<div class="form-group form-group-default ">
										<label for="selectClaveP">Selecciona una clave presupuestal:</label>
										<select id="selectClaveP" class="form-control" name="selectClaveP" required>

										</select>
									</div>
								</div>



								<!-- MOTIVO DE LA COMISION -->
								<div class="col-md-12 ">
									<div class="form-group form-group-default">
										<label>MOTIVO DE LA COMISION</label>
										<textarea name="motivo_comision" class="form-control" required placeholder="Ingrese el motivo de la comisión"></textarea>
									</div>
								</div>

								<!-- LUGAR DE LA COMISION -->
								<div class="col-md-6 ">
									<div class="form-group form-group-default">
										<label>LUGAR DE LA COMISION</label>
										<input name="lugar_comision" type="text" class="form-control" required placeholder="Ingrese el lugar de la comisión">
									</div>
								</div>

								<!-- INICIO COMISION -->
								<div class="col-md-6 ">
									<div class="form-group form-group-default">
										<label>INICIO COMISION</label>
										<input name="inicio_comision" type="date" class="form-control" required>
									</div>
								</div>

								<!-- TERMINO COMISION -->
								<div class="col-md-6 ">
									<div class="form-group form-group-default">
										<label>TERMINO COMISION</label>
										<input name="termino_comision" type="date" class="form-control" required>
									</div>
								</div>




								<!-- MEDIO DE TRANSPORTE -->
								<div class="col-md-6 ">
									<div class="form-group form-group-default">
										<label>MEDIO DE TRANSPORTE</label>
										<select class="form-control" name="medio_transporte" id="medio_transporte1" require>


										</select>
									</div>
								</div>

								<div class="col-md-6" id="vehiculoOficialSelectContainer" style="display: none;">
									<div class="form-group form-group-default">
										<label>NUM. ECON:</label>
										<select class="form-control" name="econ_econ" id="econ_econ1" require>

										</select>
									</div>
								</div>



								<!-- ANTICIPO DE VIATICOS -->
								<div class="col-md-6 ">
									<div class="form-group form-group-default">
										<label>ANTICIPO DE VIATICOS</label>
										<input name="anticipo_viaticos" type="number" class="form-control" required step="0.01" placeholder="Ingrese el anticipo de viáticos">
									</div>
								</div>

								<!-- ANTICIPO GASTOS POR USO DE VEHICULO -->
								<div class="col-md-6 ">
									<div class="form-group form-group-default">
										<label>ANTICIPO GASTOS POR USO DE VEHICULO</label>
										<input name="anticipo_gastos_vehiculo" type="number" class="form-control" step="0.01" placeholder="Ingrese el anticipo de gastos por uso de vehículo">
									</div>
								</div>

								<!-- ANTICIPO DE PASAJES -->
								<div class="col-md-6 ">
									<div class="form-group form-group-default">
										<label>ANTICIPO DE PASAJES</label>
										<input name="anticipo_pasajes" type="number" class="form-control" step="0.01" placeholder="Ingrese el anticipo de pasajes">
									</div>
								</div>

								<!-- ANTICIPO GASTOS DE PEAJE -->
								<div class="col-md-6 ">
									<div class="form-group form-group-default">
										<label>ANTICIPO GASTOS DE PEAJE</label>
										<input name="anticipo_gastos_peaje" type="number" class="form-control" step="0.01" placeholder="Ingrese el anticipo de gastos de peaje">
									</div>
								</div>

								<!-- DISPONIBLE 1603 -->
								<div class="col-md-6 ">
									<div class="form-group form-group-default">
										<label>DISPONIBLE 1603</label>
										<input name="disponible_1603" type="number" class="form-control" step="0,01" placeholder="Ingrese el monto">
									</div>
								</div>

								<!-- DISPONIBLE 1623 -->
								<div class="col-md-6 ">
									<div class="form-group form-group-default">
										<label>DISPONIBLE 1623</label>
										<input name="disponible_1623" type="number" class="form-control" step="0,01" placeholder="Ingrese el monto">
									</div>
								</div>

								<!-- UNIDAD DE ADSCRIPCION -->
								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>UNIDAD DE ADSCRIPCION</label>
										<select class="form-control" name="unidad_adscripcion" id="unidad_adscripcion1" required>

										</select>
									</div>
								</div>



								<div class="form-group form-group-default">
									<label>ACTIVIDADES REALIZADAS</label>
									<textarea name="act_realizadas" id="" cols="55" rows="5"></textarea>
								</div>




								<div class="form-group form-group-default">
									<label>RESULTADOS OBTENIDOS</label>
									<textarea name="res_obtenidos" id="" cols="55" rows="5"></textarea>
								</div>









								<input name="qsubio" value="<?php echo ($_SESSION['nombre']); ?>" type="text" class="form-control" readonly>

							</div>

					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
					<button type="submit" name="agregar" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
					</form>
				</div>

			</div>

		</div>

	</div>
</div>
</div>
<!-- -->