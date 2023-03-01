<!-- INICIALIZAMOS EL PLUGIN Datatables EN LA TABLA CON id=medicamento-->
<script type="text/javascript">
    $(document).ready(function() {
        $('#historial_compra').dataTable({
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
        var table = $('#historial_compra').DataTable();
        $('#historial_compra_filter input').focus();
    });
</script>

<!--=================================================
=            CONEXION A LA BASE DE DATOS            =
==================================================-->
<?php include('assets/inc/conexion.php'); 
     $sql="SELECT * FROM producto WHERE prod_id = (SELECT prod_id FROM configuracion);";
     $result=mysqli_query($conexion,$sql);
     if (!empty($result)) {
         $rows = mysqli_fetch_assoc($result);
?>
        
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Historial de compras de <?php echo $rows['prod_nombre_comercial']; ?></h3>
                    </div>
                    <div class="modal-body"  id="historial_producto">

                        <table id="historial_compra" class="table mb-0 table-sm table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead style="background-color: #DBEDC8;">
                                <th hidden>ID</th>
                                <th data-priority="3" width="50">Fecha</th>
                                <th data-priority="6" width="100">Cantidad compra</th>
                                <th data-priority="2" width="50">Precio compra</th>
                                <th data-priority="4" width="50">Precio unitario</th>
                            </thead>
                            <tbody>
                                <?php
                                $sql1 = "SELECT * FROM compra WHERE prod_id = (SELECT prod_id FROM configuracion) ORDER BY comp_fecha_registro DESC";
                                
                                $resultado = mysqli_query($conexion, $sql1);
                                while ($registro = mysqli_fetch_assoc($resultado))
                                {
                                ?>
                                    <tr>
                                        <td hidden><?php echo $registro['prod_id'] ?></td>
                                        <td><?php echo $registro["comp_fecha_registro"]; ?></td>
                                        <td> <?php echo $registro['comp_cantidad'] ?></td>
                                        <td><?php echo $registro["comp_subtotal"]; ?></td>
                                        <td><?php echo $registro["comp_precio_unitario"]; ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn_historial_producto" class="btn btn-purple waves-effect" data-dismiss="modal">
                            Cerrar
                        </button>
                    </div>
                
    <?php
     }
     ?>


