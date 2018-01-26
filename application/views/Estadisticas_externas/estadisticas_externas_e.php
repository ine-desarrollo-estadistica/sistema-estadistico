<title>INE</title>
  

<script type="text/javascript">
    $(document).ready(function() {
    var table = $('#maestros').DataTable( {
        lengthChange: false,
        buttons: [  {
                extend: 'copy',
                text: 'Copiar'
            }, 'excel', 'pdf', {
                extend: 'colvis',
                text: 'Ver columna'
            } ],
        language: {
                        processing:     "Procesando...",
                        search:         "Buscar&nbsp;:",
                        lengthMenu:     "",
                        info:           "Del registro _START_ al _END_ de _TOTAL_ Registros",
                        infoEmpty:      "Sin registros",
                        infoFiltered:   "",
                        infoPostFix:    "",
                        loadingRecords: "Cargando...",
                        zeroRecords:    "No se encontró ningún resultado",
                        emptyTable:     "No existen registros",
                        paginate: {
                            first:      "Primero",
                            previous:   "Anterior",
                            next:       "Siguiente",
                            last:       "Último"
                        }
                    } 
    } );
 
    table.buttons().container()
        .appendTo( '#maestros_wrapper .col-sm-6:eq(0)' );
} );
</script>

<style>
.table {
    font-size: 85% !important;
}
</style>


<!-- Initialize the plugin: -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#periodo_id').multiselect({includeSelectAllOption: true});
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#edad_cod').multiselect({includeSelectAllOption: true});
    });
</script>




<div class="container"><!--Abrir Container-->



    <div class="container text-center">
      <h3  class="text-info">Atenciones en los servicios externos según edad,  causas de atención y sexo <small> -Estadisticas Hospitalarias Servicios Externos- </small></h3> <!--Titulo de la Vista --> 
    </div>

    <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">

                    <i class="fa fa-info-circle" aria-hidden="true"></i> INFORMACION
                </h4>
            </div>

            <div>    
            <div class="panel-body" style="text-align: left;">

                 <!--Panel de Informacion-->


                <!--Fin del Panel de Informacion-->  

            </div>
        </div>
    </div>  


    <div class="panel panel-primary">
      <div class="panel-heading"><i class="fa fa-list-alt" aria-hidden="true"></i> OPCIONES</div>
      <div class="panel-body" style="text-align: center;">
    
        <!--Panel de Opciones-->

        <form action="" method="post">


        <div class="row">
            <div class="col-sm-4">
                        <label for="periodo_id">Periodo:</label>
                       <select class="form-control text-capitalize" name="periodo[]" id="periodo_id" multiple="multiple" required>
                            <?php
                                $periodos=json_decode($periodos, true);
                                foreach ($periodos as $key => $periodo) {
                                  echo "<option value=".$periodo['id'].">".$periodo['periodo']."</option>";
                                } 
                            ?>
                        </select> <br>
            </div>
          
            <div class="col-sm-6">
                 <label for="edad_cod">Rango de Edades: </label>
                       <select class="form-control text-capitalize" name="edad[]" id="edad_cod" multiple="multiple" required>
                            <?php
                                $edades=json_decode($edades, true);
                                foreach ($edades as $key => $edad) {
                                  echo "<option value=".$edad['codigo'].">".$edad['descripcion']."</option>";
                                } 
                            ?>
                        </select> <br>

                        
            </div>
            <div class="col-sm-2">
                        <input type="hidden" name="ctrl" value="1">
                          <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
            </div>
        </div>    

        </form>
        <!--Fin del Panel de Opciones-->

        </div>
    </div>



<!--Tabla de Datos-->

    <table id="maestros" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                                        <th>Periodo</th>
                                        <th>Periodo edad</th>
                                        <th>Codigo de la Causa</th>
                                        <th>Causa</th>
                                        <th>Hombres</th>
                                        <th>Mujeres</th>
                                        <th>Ignorado</th>
                                        <th>Total</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                                        <th>Periodo</th>
                                        <th>Periodo edad</th>
                                        <th>Codigo de la Causa</th>
                                        <th>Causa</th>
                                        <th>Hombres</th>
                                        <th>Mujeres</th>
                                        <th>Ignorado</th>
                                        <th>Total</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
                                    
                                    $registros = json_decode($registros, true);

                                   
                                        foreach ($registros as $row ) { 

                                    ?>
                                    <tr>
                                        <td><?php echo $row['periodo'];?></td>
                                        <td><?php echo $row['Edad']; ?></td>
                                        <td><?php echo $row['Codigo']; ?></td>
                                        <td><?php echo $row['Causa_atención']; ?></td>
                                        <td><?php echo number_format($row['Sexo_masculino'], 0); ?></td>
                                        <td><?php echo number_format($row['Sexo_femenino'], 0); ?></td>
                                        <td><?php echo number_format($row['Ignorado'], 0); ?></td>
                                        <td><?php echo number_format($row['Total'], 0); ?></td>

                                    </tr>
                                    <?php  } 
                                        

                                    ?>
        </tbody>
    </table>

    <!--Fin de la Tabla de Datos-->

</div> <!--Cerrar Container-->