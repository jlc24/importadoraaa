<!-- MODAL PARA REGISTRAR PRODUCTO -->
<div id="modal_crear_producto" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;" aria-labelledby="exampleModalToggleLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Registrar Productos</h4>
            </div>
            <div class="modal-body">
                <form id="formulario_crear_producto" action="#" class="parsley_create_producto" novalidate="" method="POST">
                    <legend style="display: none;">Datos del Producto</legend>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label ui-front">Nombre Comercial:</label>
                        <div class="col-md-6">
                            <input type="search" id="prod_nombre_comercial" name="prod_nombre_comercial" class="form-control form-control-sm" value="" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" parsley-trigger="change" data-parsley-error-message="‎Este valor es obligatorio.‎" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Fabricante:</label>
                        <div class="col-md-6">
                            <input type="text" id="prod_fabricante" name="prod_fabricante" class="form-control form-control-sm" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Stock Minimo:</label>
                        <div class="col-md-2">
                            <input type="number" min="0" id="prod_stock_minimo" name="prod_stock_minimo" class="form-control form-control-sm" value="">
                        </div>
                        <label class="col-md-2 col-form-label">Stock:</label>
                        <div class="col-md-2">
                            <input type="number" min="0" id="prod_stock" name="prod_stock" class="form-control form-control-sm" value="" parsley-trigger="change" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Fecha de Vencimiento:</label>
                        <div class="col-md-6">
                            <input type="date" id="prod_caducidad" name="prod_caducidad" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Ubicación:</label>
                        <div class="col-md-6">
                            <input type="text" id="prod_ubicacion" name="prod_ubicacion" class="form-control form-control-sm" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Precio de Compra (Bs):</label>
                        <div class="col-md-2">
                            <input type="number" min="0" id="prod_precio_compra" name="prod_precio_compra" class="form-control form-control-sm">
                        </div>
                        <label class="col-md-3 col-form-label">Precio de Venta (Bs):</label>
                        <div class="col-md-2">
                            <input type="number" min="0" id="prod_precio_venta" name="prod_precio_venta" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Precio Unitario (Bs):</label>
                        <div class="col-md-6">
                            <input type="number" min="0" id="prod_precio_unitario" name="prod_precio_unitario" class="form-control form-control-sm"> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Código de Barras:</label>
                        <div class="col-md-6">
                            <input type="text" id="prod_barcode" name="prod_barcode" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Estado:</label>
                        <div class="col-md-6">
                            <select class="custom-select custom-select-sm" id="prod_estado" name="prod_estado">
                                <option value="ACTIVO">ACTIVO</option>
                                <option value="INACTIVO">INACTIVO</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tipo Compra</label>
                        <div class="col-md-6">
                            <select class="custom-select custom-select-sm" id="comp_tipo_compra" name="comp_tipo_compra">
                                <option value="CONTADO">CONTADO</option>
                                <option value="CREDITO">CRÉDITO</option>
                                <option value="OTRO">OTRO</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Vendedor:</label>
                        <div class="col-md-6">
                            <input type="text" id="comp_vendedor" name="comp_vendedor" class="form-control form-control-sm" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Detalle:</label>
                        <div class="col-md-6">
                            <input type="text" id="comp_detalle" name="comp_detalle" class="form-control form-control-sm" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Imagen:</label>
                        <div class="col-md-6">
                            <input type="file" id="prod_imagen" name="prod_imagen" class="prod_imagen" accept="image/png">
                            <p class="help-block">Peso máximo de la foto 2 MB</p>
                            <img src="/assets/images/default/anonymous.png" class="img-thumbnail ver" width="100px">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="close_producto" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
                <button type="button" id="create_producto" class="btn btn-purple waves-effect" data-dismiss="modal">Guardar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



