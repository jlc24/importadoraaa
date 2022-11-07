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
        <th data-priority="6" width="200">Descripcion</th>
        <th data-priority="2">Stock</th>
        <th data-priority="4">Estado</th>
        <th data-priority="5">Op.</th>
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
                <td align="center"> 
                    <?php
                        if ($registro["prod_imagen"] != "/assets/images/default/404.png") {
                            echo '<a href="#" data-toggle="modal" data-target="#imagen" title="Ampliar Imagen"><img onclick="verImagen(this)" src="'.$registro["prod_imagen"].'" class="img-thumbnail rounded mx-auto d-block image" id="image" width="50px"></a> ';
                        }else{
                            echo '<img src="/assets/images/default/404.png" class="img-thumbnail rounded mx-auto d-block" width="50px">';
                        }
                    ?>
                </td>
                <!-- Fecha de Vencimiento -->
                <td><?php echo $registro["prod_descripcion"]; ?></td>
                <td><?php echo $registro["prod_stock"]; ?></td>
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
                <td align="center">
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


