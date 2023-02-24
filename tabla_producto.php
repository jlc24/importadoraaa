<!-- INICIALIZAMOS EL PLUGIN Datatables EN LA TABLA CON id=medicamento-->
<script type="text/javascript">
    $(document).ready(function() {
        $('#producto').dataTable({
            responsive: true,
            columnDefs: [],
            "lengthMenu": [15, 25, 50, 100],
            /* Disable initial sort */
            "aaSorting": [],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
        //var versionNo = $.fn.dataTable.version;
        //alert(versionNo);
        var table = $('#producto').DataTable();
        $('#producto_filter input').focus();
    });
</script>

<!--=================================================
=            CONEXION A LA BASE DE DATOS            =
==================================================-->
<?php include('assets/inc/conexion.php'); ?>

<table id="producto" class="table mb-0 table-sm table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead style="background-color: #DBEDC8;">
        <th hidden>ID</th>
        <th data-priority="1" width="150">Nombre</th>
        <th data-priority="3" width="50">Imagen</th>
        <th data-priority="6" width="100">Precio de Venta</th>
        <th data-priority="2" width="50">Cantidad</th>
        <th data-priority="4" width="50">Estado</th>
        <th data-priority="5" width="100">Op.</th>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM producto ORDER BY prod_estado DESC";
        
        $resultado = mysqli_query($conexion, $sql);
        while ($registro = mysqli_fetch_assoc($resultado))
        {
            if ($registro["prod_estado"] == '1') {
                $estado = "ACTIVO";
            }else{
                $estado = "INACTIVO";
            }
            $datos =    $registro["prod_id"] . "||" . 
                        $registro["prod_nombre_comercial"] . "||" . 
                        $registro["prod_imagen"] . "||" . 
                        $registro["prod_fabricante"] . "||" . 
                        $registro["prod_ubicacion"] . "||" . 
                        $registro["prod_codigo"] . "||" . 
                        $registro["prod_descripcion"] . "||" . 
                        $registro["prod_stock"] . "||" . 
                        $registro["prod_stock_minimo"] . "||" . 
                        $registro["prod_precio_compra"] . "||" . 
                        $registro["prod_precio_venta"] . "||" . 
                        $registro["prod_precio_unitario"] . "||" . 
                        $registro["prod_barcode"] . "||" . 
                        $estado;
        ?>
            <tr>
                <td hidden><?php echo $registro['prod_id'] ?></td>
                <td><?php echo $registro["prod_nombre_comercial"]; ?></td>
                <td align="center"> 
                    <?php
                        if ($registro["prod_imagen"] != "") {
                            echo '<a href="#" data-toggle="modal" data-target="#imagen" title="Ampliar Imagen"><img onclick="verImagen(this)" src="'.$registro["prod_imagen"].'" class="img-thumbnail rounded mx-auto d-block image" id="image" width="100px"></a> ';
                        }else{
                            echo '<a href="#" data-toggle="modal" data-target="#imagen" title="Ampliar Imagen"><img src="assets/images/default/404.png" class="img-thumbnail rounded mx-auto d-block" width="100px"></a>';
                        }
                    ?>
                </td>
                <td><?php echo $registro["prod_precio_venta"]; ?></td>
                <td>
                    <?php 
                        /*if ($registro["prod_stock"] <= $registro["prod_stock_minimo"]) {
                            echo '<p style="text-color: red;">'.$registro["prod_stock"].'</p';
                        }else{
                            echo '<p style="text-color: red;">'.$registro["prod_stock"].'</p';*/
                            echo $registro["prod_stock"];
                    ?>
                </td>
                <td align="center">
                    <?php 
                        $est = $registro["prod_estado"];
                        if ($est == "1") { ?>
                            <div class="btn-group" role="group">
                                <a href="javascript:void(0);" class="btn btn-success btn-sm" title="Deshabilitar Producto" onclick="DesactivarProducto('<?php echo $registro['prod_id']."||".$registro['prod_nombre_comercial']; ?>')">
                                    ACTIVO
                                </a>
                            </div>
                        <?php }
                        else{?>
                            <div class="btn-group" role="group">
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm" title="Habilitar Producto" onclick="ActivarProducto('<?php echo $registro['prod_id']."||".$registro['prod_nombre_comercial']; ?>')">
                                    INACTIVO
                                </a>
                            </div>
                        <?php }
                    ?></td>
                <td align="center">
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a class="btn btn-outline-success btnAbastecerProducto" type="button" href="javascript:void(0);" title="Abastecer Producto">
                            <i class="fas fa-plus-circle" ></i>
                        </a>
                        <a class="btn btn-outline-primary btnActualizarProducto" type="button" href="javascript:void(0);" title="Editar Producto">
                            <i class="far fa-edit"></i>
                        </a>  
                    </div>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>


