<!-- MODAL PARA ACTUALIZAR PRODUCTO -->
<div id="modal_actualizar_producto" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;" aria-labelledby="exampleModalToggleLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Editar Productos</h4>
            </div>
            <div class="modal-body">
                <form id="formulario_update_producto" action="#" class="parsley_create_producto" novalidate="" method="POST">
                    <input type="text" id="prod_id_update" name="prod_id_update" readonly hidden>
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-md-3 col-form-label ui-front">Nombre Comercial:</label>
                        <div class="col-md-6">
                            <input type="text" id="prod_nombre_comercial_update" name="prod_nombre_comercial_update" class="form-control form-control-sm" value="" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" parsley-trigger="change" data-parsley-error-message="‎Este valor es obligatorio.‎" required>
                        </div>
                    </div>
                    <input type="text" id="prod_imagen_update" name="prod_imagen_update" readonly hidden>
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-md-3 col-form-label">Fabricante:</label>
                        <div class="col-md-6">
                            <input type="text" id="prod_fabricante_update" name="prod_fabricante_update" class="form-control form-control-sm" value="" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-md-3 col-form-label">Ubicación:</label>
                        <div class="col-md-6">
                            <input type="text" id="prod_ubicacion_update" name="prod_ubicacion_update" class="form-control form-control-sm" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-md-3 col-form-label">Codigo:</label>
                        <div class="col-md-6">
                            <input type="text" id="prod_codigo_update" name="prod_codigo_update" class="form-control form-control-sm" value="" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-md-3 col-form-label">Descripcion:</label>
                        <div class="col-md-6">
                            <textarea class="form-control form-control-sm" name="prod_descripcion_update" id="prod_descripcion_update" cols="30" rows="auto" ></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-md-3 col-form-label">Código de Barras:</label>
                        <div class="col-md-6">
                            <input type="text" id="prod_barcode_update" name="prod_barcode_update" class="form-control form-control-sm" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-md-3 col-form-label">Estado:</label>
                        <div class="col-md-6">
                            <select class="custom-select custom-select-sm" id="prod_estado_update" name="prod_estado_update">
                                <option value="ACTIVO">ACTIVO</option>
                                <option value="INACTIVO">INACTIVO</option>
                            </select>
                        </div>
                    </div>
                    <!--
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Imagen:</label>
                        <div class="col-md-6">
                            <input type="file" id="prod_imagen" name="prod_imagen_update" class="prod_imagen_update" accept="image/png">
                            <p class="help-block">Peso máximo de la foto 2 MB</p>
                            <img src="/assets/images/default/404.png" class="img-thumbnail ver" width="100px">
                        </div>
                    </div>
                    -->                 
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="update_producto" class="btn btn-purple waves-effect" data-dismiss="modal">Guardar</button>
            </div> 
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



