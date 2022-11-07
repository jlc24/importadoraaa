<!-- MODAL PARA REGISTRAR PRODUCTO -->
<div id="modal_abastecer_producto" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;" aria-labelledby="exampleModalToggleLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Abastecer Producto</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="formulario_abastecer_producto">
                    <div class="form-row">
                        <legend>Datos anteriores del Producto</legend>
                        <!-- ID DEL PRODUCTO QUE QUEREMOS ABASTECER -->
                        <div class="form-group col-lg-4">
                            <label class="col-form-label">Nombre Comercial</label>
                            <input type="text" style="font-weight: 500; background-color:#EBF9D6;" class="form-control form-control-sm" id="prod_nombre_comercial_abastecer" name="prod_nombre_comercial_abastecer" readonly="" value="">
                        </div>
                        <div class="form-group col-lg-2">
                            <label class="col-form-label">Stock Actual</label>
                            <!-- STOCK ACTUAL DEL PRODUCTO -->
                            <input type="number" style="font-weight: 500; background-color:#EBF9D6;" class="form-control form-control-sm" id="prod_stock_abastecer" name="prod_stock_abastecer" readonly="" value="">
                        </div>
                        <div class="form-group col-lg-3">
                            <label class="col-form-label">Precio Compra (Bs)</label>
                            <input type="number" min="0" style="font-weight: 500; background-color:#EBF9D6;" class="form-control form-control-sm" id="precio_unitario_anterior" name="precio_unitario_anterior" readonly="" value="">
                        </div>
                        <div class="form-group col-lg-3">
                            <label class="col-form-label">Precio Venta (Bs)</label>
                            <!-- STOCK ACTUAL DEL PRODUCTO -->
                            <input type="text" style="font-weight: 500; background-color:#EBF9D6;" class="form-control form-control-sm" id="precio_venta_anterior" name="precio_venta_anterior" readonly="" value="">
                        </div>
                        
                        <legend>Datos del Producto a Abastecer</legend>
                        <div class="form-group col-lg-2">
                            <label class="col-form-label">Cantidad</label>
                            <input type="number" min="1" value="" class="form-control form-control-sm" id="cantidad_comprada_abastecer" name="cantidad_comprada_abastecer">
                        </div>
                        <div class="form-group col-lg-2">
                            <label class="col-form-label">P.Compra (Bs)</label>
                            <input type="number" min="0" value="" class="form-control form-control-sm" id="precio_compra_abastecer" name="precio_compra_abastecer">
                        </div>
                        <div class="form-group col-lg-2">
                            <label class="col-form-label">Desc. (%)</label>
                            <input type="number" min="0" value="0" class="form-control form-control-sm" id="descuento_compra_abastecer" name="descuento_compra_abastecer">
                        </div>
                        <div class="form-group col-lg-3">
                            <label class="col-form-label">P.Unit. (Bs)</label>
                            <input type="number" min="0" value="0" class="form-control form-control-sm" id="precio_unitario_abastecer" name="precio_unitario_abastecer">
                        </div>
                        <div class="form-group col-lg-3">
                            <label class="col-form-label">P.Venta (Bs)</label>
                            <input type="number" min="0" class="form-control form-control-sm" id="precio_venta_abastecer" name="precio_venta_abastecer">
                        </div>
                        <div class="form-group col-lg-3"></div>
                        <div class="form-group col-lg-3">
                            <label class="col-form-label">Tipo Compra</label>
                            <select class="custom-select custom-select-sm" id="prod_tipo_compra_abastecer" name="prod_tipo_compra_abastecer">
                                <option value="CONTADO">CONTADO</option>
                                <option value="CREDITO">CRÉDITO</option>
                                <option value="OTRO">OTRO</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-3">
                            <label class="col-form-label">Detalle de Compra</label>
                            <input type="text" class="form-control form-control-sm" id="prod_detalle_abastecer" name="prod_detalle_abastecer" placeholder="Ej. Caja de 6 unidades">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="abastecer_producto" class="btn btn-purple waves-effect" data-dismiss="modal">
                    Guardar
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



