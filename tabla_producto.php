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
        <th data-priority="1">Nombre</th>
        <th data-priority="3">Imagen</th>
        <th data-priority="6">Caducidad</th>
        <th data-priority="4">Stock</th>
        <th data-priority="4">P. Venta</th>
        <th data-priority="4">Estado</th>
        <th data-priority="2">Op.</th>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM producto ORDER BY prod_id";
        $resultado = mysqli_query($conexion, $sql);
        while ($registro = mysqli_fetch_assoc($resultado))
        {
            //$datos = $registro["prod_id"] . "||" . $registro["cli_ci_nit"] . "||" . $registro["cli_nombre"] . "||" . $registro["cli_genero"] . "||" . $registro["cli_direccion"] . "||" . $registro["cli_celular"] . "||" . $registro["cli_fecha_registro"];
        ?>
            <tr>
                <td><?php echo $registro["prod_nombre_comercial"]; ?></td>
                <td> 
                    <?php
                        if ($registro["prod_imagen"] != "") {
                            echo '<img src="'.$registro["prod_imagen"].'" class="img-thumbnail" width="50px"> ';
                        }else{
                            echo '<img src="/assets/images/default/anonymous.png" class="img-thumbnail" width="50px"> ';
                        }
                    ?>
                </td>
                <!-- Fecha de Vencimiento -->
                <td>
                    <?php
                        //echo date_format(date_create($registro['prod_fecha_vencimiento']), 'd/m/Y');
                        $fecha_actual= date("Y-m-d");
                        //echo $fecha_actual;
                        $fecha_vencimiento = date_create($registro['prod_vencimiento']);
                        $fecha_final = date_format($fecha_vencimiento,'Y-m-d');
                        //echo "<br>".$fecha_final;
                        $diferencia = (strtotime($fecha_final) - strtotime($fecha_actual)) / 60 / 60 / 24;
                        $numero = (int)$diferencia;
                        //echo "<br>".$numero."<br>";
                        if($diferencia>181){//si al producto tiene mas de 180 dias de vigencias no se colorea
                            $fecha = date_create("2020-12-13"); echo date_format($fecha, 'd-m-Y');
                        }
                        elseif($diferencia>90){//si al producto tiene mas de 90 dias de vigencias no se colorea verde
                            $fecha = date_format($fecha_vencimiento,'d-m-Y');
                            echo "<font color=\"green\"><b>$fecha</b></font>";
                        }
                        elseif($diferencia>-1){//si al producto tiene mas de 0 dias de vigencias no se colorea amarillo
                            $fecha = date_format($fecha_vencimiento,'d-m-Y');
                            echo "<font color=\"orange\"><b>$fecha</b></font>";
                        }
                        else{//Aqui la diferencia ya es negativa, y el producto ya vencio entonces se colorea rojo
                            $fecha = date_format($fecha_vencimiento,'d-m-Y');
                            echo "<font color=\"red\"><b>$fecha</b></font>";
                        }
                    ?>
                </td>
                <td><?php echo $registro["prod_stock"]; ?></td>
                <td><?php echo $registro["prod_precio_venta"]; ?></td>
                <td>
                    <?php 
                        $est = $registro["prod_estado"];
                        if ($est == "1") {
                            echo "ACTIVO";
                        }
                        else{
                            echo "INACTIVO";
                        }
                    ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a class="btn btn-outline-primary" type="button" href="#" data-toggle="modal" data-target="#modal_actualizar_cliente" title="Editar">
                            <i class="far fa-edit"></i>
                        </a>
                        <a class="btn btn-outline-danger" type="button" href="#" title="Eliminar">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </div>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

