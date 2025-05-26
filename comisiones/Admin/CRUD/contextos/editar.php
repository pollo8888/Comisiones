<!-- Modal Edit -->
<div class="modal fade" id="editRowModal<?php echo $row['tblid']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="CRUD/contextos/obtener.php?id=<?php echo $row['tblid']; ?>"
                    enctype="multipart/form-data">
                    <input class="form-control" name="id" type="hidden" value="<?php echo $row['tblid']; ?>">
                    <div class="row">
                        <!-- Campos del formulario con valores pre-cargados -->
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Folio</label>
                                <input name="folio" type="text" class="form-control"
                                    value="<?php echo $row['folio']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Fecha Comision</label>
                                <input name="fecha_comision_num" type="date" class="form-control"
                                    value="<?php echo $row['fecha_comision_num']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nombre Comisionado</label>
                                <input name="nombre_comisionado"
                                    id="edit_nombre_comisionado<?php echo $row['tblid']; ?>" type="text"
                                    class="form-control" value="<?php echo $row['nombre_comisionado']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Matrícula</label>
                                <input name="matricula" id="edit_matricula<?php echo $row['tblid']; ?>" type="number"
                                    class="form-control" value="<?php echo $row['matricula']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Teléfono</label>
                                <input name="telefono" type="number" class="form-control"
                                    value="<?php echo $row['telefono']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Categoría</label>
                                <input name="categoria" id="edit_categoria<?php echo $row['tblid']; ?>" type="text"
                                    class="form-control" value="<?php echo $row['categoria']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Adscripción</label>
                                <input name="adscripcion" type="text" class="form-control"
                                    value="<?php echo $row['adscripcion']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Plaza</label>
                                <input name="plaza" type="text" class="form-control"
                                    value="<?php echo $row['plaza']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Puesto Comisionado</label>
                                <input name="puesto_comisionado" type="text" class="form-control"
                                    value="<?php echo $row['puesto_comisionado']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>UM Destino</label>
                                <input name="um_destino" type="text" class="form-control"
                                    value="<?php echo $row['um_destino']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Turno</label>
                                <select name="turno" class="form-control">
                                    <option value="Matutino" <?php if ($row['turno'] == 'Matutino')
                                        echo 'selected'; ?>>
                                        Matutino</option>
                                    <option value="Vespertino" <?php if ($row['turno'] == 'Vespertino')
                                        echo 'selected'; ?>>Vespertino</option>
                                    <option value="Nocturno" <?php if ($row['turno'] == 'Nocturno')
                                        echo 'selected'; ?>>
                                        Nocturno</option>


                                    <option value="Jornada Acomulada" <?php if ($row['turno'] == 'Jornada Acomulada')
                                        echo 'selected'; ?>>
                                        Jornada Acomulada</option>
                                       
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Horas de Turno</label>
                                <input name="horas_turno" type="text" class="form-control"
                                    value="<?php echo $row['horas_turno']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Fecha Inicio</label>
                                <input name="fecha_inicio_num" type="date" class="form-control"
                                    value="<?php echo $row['fecha_inicio_num']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Fecha Término</label>
                                <input name="fecha_termino_num" type="date" class="form-control"
                                    value="<?php echo $row['fecha_termino_num']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Año de Comisión</label>
                                <input name="ano_comision" type="number" class="form-control"
                                    value="<?php echo $row['ano_comision']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Director</label>
                                <input name="director" type="text" class="form-control"
                                    value="<?php echo $row['director']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Director Adscripción</label>
                                <input name="director_adscripcion" type="text" class="form-control"
                                    value="<?php echo $row['director_adscripcion']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Número de Comisiones</label>
                                <input name="numero_comisiones" id="edit_numero_comisiones<?php echo $row['tblid']; ?>"
                                    type="number" class="form-control" value="<?php echo $row['numero_comisiones']; ?>"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Estatus</label>
                                <input name="estatus" type="text" class="form-control"
                                    value="<?php echo $row['estatus']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Fecha Solicitud</label>
                                <input name="fecha_solicitud" type="date" class="form-control"
                                    value="<?php echo $row['fecha_solicitud']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Medio Solicitud</label>
                                <input name="medio_solicitud" type="text" class="form-control"
                                    value="<?php echo $row['medio_solicitud']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Fecha Recepción Personal</label>
                                <input name="fecha_recepcion_personal" type="date" class="form-control"
                                    value="<?php echo $row['fecha_recepcion_personal']; ?>">
                            </div>
                        </div>

                        <!-- Campo de Justificación al final -->
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Justificación</label>
                                <textarea name="justificacion" class="form-control" rows="6"
                                    style="resize: vertical; min-height: 150px;"><?php echo $row['justificacion']; ?></textarea>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Subir Archivos</label>
                                <input type="file" name="archivos[]" class="form-control" multiple
                                    accept=".pdf,.doc,.docx,.xls,.xlsx,.txt,.jpg,.jpeg,.png,.gif">
                            </div>
                        </div>


                        <!-- Nuevos campos añadidos -->
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Folio Término</label>
                                <input name="folio_termino" type="text" class="form-control"
                                    value="<?php echo $row['Folio_Termino']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Fecha Finalizado</label>
                                <input name="fecha_finalizado" type="date" class="form-control"
                                    value="<?php echo $row['Fecha_Finalizado_Termino']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Entrega Personal Término</label>
                                <input name="entrega_personal_termino" type="date" class="form-control"
                                    value="<?php echo $row['Entrega_Personal_Termino']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="editar" class="btn btn-primary">Guardar Cambios</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- Modal Delete -->
<div class="modal fade" id="deleteRowModal<?php echo $row['tblid']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center">¿Está seguro de que desea eliminar el siguiente registro?</p>
                <h2 class="text-center">Folio: <?php echo $row['folio']; ?></h2>
                <h4 class="text-center">Matrícula: <?php echo $row['matricula']; ?></h4>
                <h4 class="text-center">Nombre: <?php echo $row['nombre_comisionado']; ?></h4>
                <p class="text-center text-danger">Este cambio no se puede deshacer.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a href="CRUD/contextos/BorrarRegistro.php?id=<?php echo $row['tblid']; ?>"
                    class="btn btn-danger">Eliminar</a>
            </div>
        </div>
    </div>
</div>