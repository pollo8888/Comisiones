<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">Nuevo Registro
                        <br>
                        Nota:
                        <br>
                        Si es nuevo registro poner matricula y presionar enter
                        <br>
                        Si es actualizar comision anterior poner matricula y doble Control
                    </h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="card-body">
                        <form id="formAgregarComision" method="POST" autocomplete="off" enctype="multipart/form-data">
                            <div class="row">
                                <!-- Campos del formulario con sus IDs -->
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Folio</label>
                                        <input name="folio" id="folio" type="text" class="form-control" required
                                            placeholder="Ingrese folio">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Fecha Comision</label>
                                        <input name="fecha_comision_num" id="fecha_comision_num" type="date"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Nombre Comisionado</label>
                                        <input name="nombre_comisionado" id="nombre_comisionado" type="text"
                                            class="form-control" required placeholder="Ingrese nombre">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Matrícula</label>
                                        <input name="matricula" id="matricula" type="number" class="form-control"
                                            required placeholder="Ingrese matrícula">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Teléfono</label>
                                        <input name="telefono" id="telefono" type="number" class="form-control" required
                                            placeholder="Ingrese teléfono">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Categoría</label>
                                        <input name="categoria" id="categoria" type="text" class="form-control" required
                                            placeholder="Ingrese categoría">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Adscripción</label>
                                        <input name="adscripcion" id="adscripcion" type="text" class="form-control"
                                            required placeholder="Ingrese adscripción">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Plaza</label>
                                        <input name="plaza" id="plaza" type="text" class="form-control" required
                                            placeholder="Ingrese plaza">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Puesto Comisionado</label>
                                        <input name="puesto_comisionado" id="puesto_comisionado" type="text"
                                            class="form-control" required placeholder="Ingrese puesto">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>UM Destino</label>
                                        <input name="um_destino" id="um_destino" type="text" class="form-control"
                                            required placeholder="Ingrese UM de destino">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Turno</label>
                                        <select name="turno" id="turno" class="form-control" required>
                                            <option value="" disabled selected>Seleccione turno</option>
                                            <option value="Matutino">Matutino</option>
                                            <option value="Vespertino">Vespertino</option>
                                            <option value="Nocturno">Nocturno</option>
                                            <option value="Jornada Acomulada">Jornada Acomulada</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Horas de Turno</label>
                                        <input name="horas_turno" id="horas_turno" type="text" class="form-control"
                                            required placeholder="Ingrese horas de turno">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Fecha Inicio</label>
                                        <input name="fecha_inicio_num" id="fecha_inicio_num" type="date"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Fecha Término</label>
                                        <input name="fecha_termino_num" id="fecha_termino_num" type="date"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Año de Comisión</label>
                                        <input name="ano_comision" id="ano_comision" type="number" class="form-control"
                                            required placeholder="Ingrese año">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Director</label>
                                        <input name="director" id="director" type="text" class="form-control" required
                                            placeholder="Ingrese nombre del director">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Director Adscripción</label>
                                        <input name="director_adscripcion" id="director_adscripcion" type="text"
                                            class="form-control" required
                                            placeholder="Ingrese adscripción del director">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Número de Comisiones</label>
                                        <input value="1" name="numero_comisiones" id="numero_comisiones" type="number" 
                                            class="form-control" required placeholder="Ingrese número de comisiones"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Estatus</label>
                                        <input name="estatus" id="estatus" type="text" class="form-control" required
                                            placeholder="Ingrese estatus">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Fecha Solicitud</label>
                                        <input name="fecha_solicitud" id="fecha_solicitud" type="date"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Medio Solicitud</label>
                                        <input name="medio_solicitud" id="medio_solicitud" type="text"
                                            class="form-control" required placeholder="Ingrese medio de solicitud">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Fecha Recepción Personal</label>
                                        <input name="fecha_recepcion_personal" id="fecha_recepcion_personal" type="date"
                                            class="form-control" required>
                                    </div>
                                </div>

                                <!-- Campo de Justificación al final -->
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Justificación</label>
                                        <textarea name="justificacion" id="justificacion" class="form-control" required
                                            placeholder="Escriba aquí la justificación" rows="6"
                                            style="resize: vertical; min-height: 150px;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="button" id="btnGuardarAjax" class="btn btn-primary">Guardar Registro</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<!-- CSS para el estilo expandido del select cuando es justificación -->
<style>
    /* Clase para expandir el select solo cuando sea el campo de justificación */
    .select-expandido {
        white-space: normal;
        /* Permite que el texto se ajuste en varias líneas */
        max-height: 150px;
        /* Altura máxima para la lista desplegable */
        width: 100%;
        /* Asegura que el select ocupe el ancho completo */
    }
</style>

<!-- Modal para Capturar o Seleccionar Valores (Doble Retroceso) -->
<div class="modal fade" id="captureValueModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Seleccionar o Agregar Opción</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="campoTipo">
                <div class="form-group">
                    <label id="campoValorLabel" for="campoValor">Ingrese un nuevo valor o seleccione uno
                        existente:</label>

                    <!-- Input estándar (se ocultará si es justificación) -->
                    <input type="text" id="campoValor" class="form-control" placeholder="Escriba un nuevo valor">

                    <!-- Textarea para campo de justificación (oculto por defecto) -->
                    <textarea id="campoValorTextarea" class="form-control" placeholder="Escriba una justificación"
                        rows="6" style="display: none; resize: vertical;"></textarea>
                </div>
                <div class="form-group">
                    <label for="valoresGuardados">Valores Guardados:</label>
                    <select id="valoresGuardados" class="form-control">
                        <option value="">Seleccione una opción guardada</option>
                        <!-- Las opciones se cargarán dinámicamente con AJAX -->
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="guardarValor">Guardar</button>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="terminocomi" tabindex="-1" role="dialog" aria-labelledby="terminocomiLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="terminocomiLabel">Término Comisión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Aquí puedes incluir el contenido del modal -->
                <form>
                    <div class="form-group">
                        <label for="folio">Folio Termino</label>
                        <input type="text" class="form-control" id="foliotermino" placeholder="Ingresa el folio">
                    </div>
                    <div class="form-group">
                        <label for="fecha-termino">Fecha de Término</label>
                        <input type="date" class="form-control" id="fecha_termino_t">
                    </div>

         


                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Folio</label>
                                <input name="folio_foliodelter" id="folio_foliodelter" type="text" class="form-control"
                                    required placeholder="Ingrese folio">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Fecha Comision</label>
                                <input name="fecha_comision_num_t" id="fecha_comision_num_t" type="date"
                                    class="form-control" required>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nombre Comisionado</label>
                                <input name="nombre_comisionado_t" id="nombre_comisionado_t" type="text"
                                    class="form-control" required placeholder="Ingrese nombre">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Matrícula</label>
                                <input name="matricula_t" id="matricula_t" type="number" class="form-control" required
                                    placeholder="Ingrese matrícula">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Categoría</label>
                                <input name="categoria_t" id="categoria_t" type="text" class="form-control" required
                                    placeholder="Ingrese categoría">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Adscripción</label>
                                <input name="adscripcion_t" id="adscripcion_t" type="text" class="form-control" required
                                    placeholder="Ingrese adscripción">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Lugar comisión</label>
                                <input name="lcomision" id="lcomision" type="text" class="form-control" required
                                    placeholder="Lugar de comisión">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Fecha Término</label>
                                <input name="fecha_termino_num_t" id="fecha_termino_num_t" type="date"
                                    class="form-control" required>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Plaza</label>
                                <input name="plaza_t" id="plaza_tt" type="text" class="form-control" required
                                    placeholder="Ingrese plaza">
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="btnguardarfolio" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>