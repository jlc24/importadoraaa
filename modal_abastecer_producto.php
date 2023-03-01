        <?php include("assets/inc/conexion.php");?>
<!-- MODAL PARA REGISTRAR ACTUALIZAR DATOS DE LA HOJA DE RUTA -->

        <!-- MODAL PARA REGISTRAR ACTUALIZAR DATOS DE LA HOJA DE RUTA -->
        <?php //session_start();
            //$admid = $_SESSION['adm_id'];
            // OBTENEMOS LOS DATOS DE LA HOJA DE RUTA QUE SE VA ACTUALIZAR
            $sql="SELECT * FROM producto WHERE prod_id = (SELECT prod_id FROM configuracion);";
            $result=mysqli_query($conexion,$sql);
            if (!empty($result)) {
                $rows = mysqli_fetch_assoc($result);
                //echo $rows;
            ?>
                <form class="form-horizontal" id="formulario_abastecer_producto">
                    <div class="form-row">
                        <div class="form-group col-lg-4">
                            <label class="col-form-label">Nombre Comercial</label>
                            <input type="hidden" id="prodid" name="prodid" value="<?php echo $rows['prod_id']; ?>">
                            <input type="text" style="font-weight: 500; background-color:#EBF9D6;" class="form-control form-control-sm" id="prod_nombre_comercial_abastecer" name="prod_nombre_comercial_abastecer" readonly="" value="<?php echo $rows['prod_nombre_comercial']; ?>">
                        </div>
                        <legend>Datos anteriores del Producto</legend>
                        <!-- ID DEL PRODUCTO QUE QUEREMOS ABASTECER -->
                        
                        <div class="form-group col-lg-2">
                            <label class="col-form-label">Cantidad Actual</label>
                            <!-- STOCK ACTUAL DEL PRODUCTO -->
                            <input type="number" style="font-weight: 500; background-color:#EBF9D6;" class="form-control form-control-sm" id="prod_stock_abastecer" name="prod_stock_abastecer" readonly="" value="<?php echo $rows['prod_stock']; ?>">
                        </div>
                        <div class="form-group col-lg-3">
                            <label class="col-form-label">Precio Compra (Bs)</label>
                            <input type="number" min="0" style="font-weight: 500; background-color:#EBF9D6;" class="form-control form-control-sm" id="precio_compra_anterior" name="precio_compra_anterior" readonly="" value="<?php echo $rows['prod_precio_compra']; ?>">
                        </div>
                        <div class="form-group col-lg-3">
                            <label class="col-form-label">Precio Unitario (Bs)</label>
                            <input type="number" min="0" style="font-weight: 500; background-color:#EBF9D6;" class="form-control form-control-sm" id="precio_unitario_anterior" name="precio_unitario_anterior" readonly="" value="<?php echo $rows['prod_precio_unitario']; ?>">
                        </div>
                        <div class="form-group col-lg-3">
                            <label class="col-form-label">Precio Venta (Bs)</label>
                            <!-- STOCK ACTUAL DEL PRODUCTO -->
                            <input type="text" style="font-weight: 500; background-color:#EBF9D6;" class="form-control form-control-sm" id="precio_venta_anterior" name="precio_venta_anterior" readonly="" value="<?php echo $rows['prod_precio_venta']; ?>">
                        </div>
                        
                        <legend>Datos del Producto a Abastecer</legend>
                        <div class="form-group col-lg-2">
                            <label class="col-form-label" for="cantidad_abastecer">Cantidad</label>
                            <input type="number" name="cantidad_abastecer" id="cantidad_abastecer" class="form-control form-control-sm" placeholder="0" onkeyup="cantidad('cantidad_abastecer', 'precio_abastecer', 'unitario_abastecer')" required>
                        </div>
                        <div class="form-group col-lg-3">
                            <label class="col-form-label" for="precio_abastecer">Precio Compra (Bs)</label>
                            <input type="number" name="precio_abastecer" id="precio_abastecer" class="form-control form-control-sm" placeholder="0" onkeyup="cantidad('cantidad_abastecer', 'precio_abastecer', 'unitario_abastecer')" required>
                        </div>
                        
                        <div class="form-group col-lg-3" >
                            <label class="col-form-label" for="unitario_abastecer">Precio Unitario (Bs)</label>
                            <input type="number" name="unitario_abastecer" id="unitario_abastecer" class="form-control form-control-sm" placeholder="0" readonly>
                        </div>
                        <div class="form-group col-lg-3">
                            <label class="col-form-label" for="venta_abastecer">Precio Venta (Bs)</label>
                            <input type="number" class="form-control form-control-sm" id="venta_abastecer" name="venta_abastecer" placeholder="0" required>
                        </div>
                        
                        <div class="form-group col-lg-3">
                            <label class="col-form-label">Tipo Compra</label>
                            <select class="custom-select custom-select-sm" id="prod_tipo_compra_abastecer" name="prod_tipo_compra_abastecer">
                                <option value="CONTADO">CONTADO</option>
                                <option value="CREDITO">CRÉDITO</option>
                                <option value="OTRO">OTRO</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="col-form-label">Vendedor</label>
                            <input type="text" class="form-control form-control-sm" id="prod_vendedor_abastecer" name="prod_vendedor_abastecer" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="col-form-label">Detalle de Compra</label>
                            <input type="text" class="form-control form-control-sm" id="prod_detalle_abastecer" name="prod_detalle_abastecer" placeholder="Ej. Caja de 6 unidades" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                        </div>
                    </div>
                </form>
        <?php
        }
        ?>


