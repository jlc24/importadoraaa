                                    <!-- MODAL PARA REGISTRAR MEDICAMENTO -->
                                    <div id="modal_cerrar_caja" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel">Cierre de caja</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" id="formulario_cerrar_caja">
                                                        <div class="form-group row">
                                                            <!--<label class="col-md-5 col-form-label" for="simpleinput">Adm_id :</label>-->
                                                            <div class="col-md-7">
                                                                <input type="hidden" class="form-control form-control-sm" id="caja_id" name="caja_id" value="" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-5 col-form-label" for="simpleinput">Administrador :</label>
                                                            <div class="col-md-7">
                                                                <input type="text" class="form-control form-control-sm" id="caja_administrador" name="caja_administrador" value="<?php echo utf8_decode($row['adm_nombre']); ?>" style="text-transform: uppercase;" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-5 col-form-label" for="simpleinput">Fecha y Hora:</label>
                                                            <div class="col-md-7">
                                                                <input type="text" min="0" id="caja_fecha_hora" name="caja_fecha_hora" class="form-control form-control-sm" value="<?php echo date('d-m-Y h:i:s a', time());?>" readonly>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        $consulta = "SELECT SUM(det_subtotal) AS total_caja FROM detalle_factura WHERE det_fecha = '".date('Y-m-d')."' AND caja_id = (SELECT MAX(caja_id) FROM caja WHERE caja_estado = 1 AND adm_id = '".$adm_id."');"; 
                                                        $fila = mysqli_fetch_assoc(mysqli_query($conexion,$consulta)); ?>
                                                        <div class="form-group row">
                                                            <label class="col-md-5 col-form-label" for="simpleinput">Monto de Cierre (Bs):</label>
                                                            <div class="col-md-7">
                                                                <input type="number" id="caja_monto_final" name="caja_monto_final" class="form-control form-control-sm" value="<?php echo (isset($fila['total_caja']) ? $fila['total_caja'] : '0' ); ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        $consulta = "SELECT caja_monto_inicial FROM caja WHERE caja_id = (SELECT MAX(caja_id) FROM caja WHERE caja_estado = 1 AND adm_id = '".$adm_id."')"; 
                                                        $fila = mysqli_fetch_assoc(mysqli_query($conexion,$consulta)); ?>
                                                        <div class="form-group row">
                                                            <label class="col-md-5 col-form-label" for="simpleinput">Cambio (Bs):</label>
                                                            <div class="col-md-7">
                                                                <input type="number" id="caja_cambio" name="caja_cambio" class="form-control form-control-sm" value="<?php echo isset($fila['caja_monto_inicial']) ? $fila['caja_monto_inicial'] : '0'; ?>">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" id="close_caja" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
                                                    <button type="button" id="cerrar_caja" class="btn btn-purple waves-effect" data-dismiss="modal">Registrar Cierre</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->