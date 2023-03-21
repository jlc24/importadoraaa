        <div id="modal_crear_administrador" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Registrar Administrador</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" id="formulario_crear_administrador">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="adm_nombre" >Nombre Completo</label>
                                <div class="col-md-9">
                                    <input type="text" id="adm_nombre" name="adm_nombre" class="form-control form-control-sm" autocomplete="off" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="adm_usuario">Usuario</label>
                                <div class="col-md-9">
                                    <input type="text" id="adm_usuario" name="adm_usuario" class="form-control form-control-sm" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="adm_pass">Contraseña</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control form-control-sm" id="adm_pass" name="adm_pass" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row" >
                                <label class="col-md-3 col-form-label" for="adm_rol">Rol</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-sm" id="adm_rol" name="adm_rol" autocomplete="off" value="user" readonly>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="close_admin" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
                        <button type="button" id="create_admin" class="btn btn-success waves-effect" data-dismiss="modal">Registrar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->