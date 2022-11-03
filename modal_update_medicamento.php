<?php include("assets/inc/conexion.php");?>
<!-- MODAL PARA REGISTRAR MEDICAMENTO -->
<?php
    //OBTENEMOS EL ID DEL PRODUCTO, DE LA TABLA CONFIGURACION
    $consulta = "SELECT prod_id FROM configuracion";
    $resultado = mysqli_query($conexion,$consulta);
    $fila = mysqli_fetch_row($resultado);
    $numero = (int)$fila[0];

    $sql="SELECT *FROM producto WHERE prod_id = $numero";
    $result=mysqli_query($conexion,$sql);
    if (!empty($result)) {
        $row = mysqli_fetch_row($result);

?>
    <form class="form-horizontal" id="formulario_editar_medicamento">
        <div class="form-group row">
            <label class="col-md-4 col-form-label ui-front">Nombre Comercial:</label>
            <div class="col-md-8">
                <input type="hidden" id="prod_id_update" name="prod_id_update" value="<?php echo $row[0];?>">
                <input type="search" id="prod_nombre_comercial_update" name="prod_nombre_comercial_update" class="form-control form-control-sm" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $row[1];?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label">Acción Terapeútica :</label>
            <div class="col-md-8">
                <input type="text" id="prod_propaganda_update" name="prod_propaganda_update" class="form-control form-control-sm" value="<?php echo $row[2];?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label">Forma Farmaceútica :</label>
            <div class="col-md-8">
                <input type="text" id="prod_forma_update" name="prod_forma_update" class="form-control form-control-sm" value="<?php echo $row[3];?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label">Principio Activo (N.G.) :</label>
            <div class="col-md-8">
                <input type="text" id="prod_ingrediente_update" name="prod_ingrediente_update" class="form-control form-control-sm" value="<?php echo $row[4];?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label">Laboratorio Fabricante :</label>
            <div class="col-md-8">
                <input type="text" id="prod_laboratorio_update" name="prod_laboratorio_update" class="form-control form-control-sm" value="<?php echo $row[6];?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label">Nickname Lab. Fabricante :</label>
            <div class="col-md-8">
                <input type="text" id="prod_nicklaboratorio_update" name="prod_nicklaboratorio_update" class="form-control form-control-sm" value="<?php echo $row[7];?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label">Distribuido por :</label>
            <div class="col-md-8">
                <input type="text" id="prod_representante_update" name="prod_representante_update" class="form-control form-control-sm" value="<?php echo $row[9];?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label">Código de Farmacia :</label>
            <div class="col-md-8">
                <input type="text" id="prod_codigo_update" name="prod_codigo_update" class="form-control form-control-sm" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $row[10];?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label">Código de Barras :</label>
            <div class="col-md-8">
                <input type="text" id="prod_barcode_update" name="prod_barcode_update" class="form-control form-control-sm" value="<?php echo $row[20];?>">
            </div>
        </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label">Fecha de Vencimiento :</label>
            <div class="col-md-8">
                <input type="date" id="prod_fecha_vencimiento_update" name="prod_fecha_vencimiento_update" class="form-control form-control-sm" value="<?php echo $row[13];?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label">Stock Actual :</label>
            <div class="col-md-8">
                <input type="number" min="1" id="prod_stock_update" name="prod_stock_update" class="form-control form-control-sm" value="<?php echo $row[14];?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label">Ubicación :</label>
            <div class="col-md-8">
                <input type="text" id="prod_ubicacion_update" name="prod_ubicacion_update" class="form-control form-control-sm" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $row[12];?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label">Precio de Compra (Bs) :</label>
            <div class="col-md-8">
                <input type="number" min="0" id="prod_precio_compra_update" name="prod_precio_compra_update" class="form-control form-control-sm" value="<?php echo $row[15];?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label">Precio de Venta (Bs) :</label>
            <div class="col-md-8">
                <input type="number" min="0" id="prod_precio_venta_update" name="prod_precio_venta_update" class="form-control form-control-sm" value="<?php echo $row[16];?>">
            </div>
        </div>
    </form>
<?php
    }
?>