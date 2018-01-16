<title>INE</title>

<script type="text/javascript">
    $(document).ready(function() {
    var table = $('#registros').DataTable( {
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
        .appendTo( '#registros_wrapper .col-sm-6:eq(0)' );
    /*} );*/

    var table_total = $('#registros_total').DataTable( {
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

    table_total.buttons().container()
        .appendTo( '#registros_total_wrapper .col-sm-6:eq(0)' );
    } );
</script>

<style>
.table {
    font-size: 85% !important;
}
</style>

<!--SELECTORES-->

<script type="text/javascript">
    $(document).ready(function() {
        $('#periodo_id').multiselect({includeSelectAllOption: true});
        $('#departamento_id').multiselect({includeSelectAllOption: true});
    });
</script>

<div class="container">

<!--TITULO-->
    <div class="container text-center">
      <h3  class="text-info">TOTAL DE DEFUNCIONES<small> -Estadisticas Vitales- </small></h3>  
    </div>

<!--INFORMACION-->
    <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="fa fa-info-circle" aria-hidden="true"></i> INFORMACION
                </h4>
            </div>
            <div>    
            <div class="panel-body" style="text-align: left;">
                <!--Contenedor de Informacion-->
                No pos los que se murieron.
            </div>
        </div>
    </div>  


    <div class="panel panel-primary">
      <div class="panel-heading"><i class="fa fa-list-alt" aria-hidden="true"></i> OPCIONES</div>
      <div class="panel-body" style="text-align: center;">
    
      <!--FORMULARIO CON OPCIONES-->
      <form action="" method="post">

        <div class="row">
            <div class="col-sm-5">
                        <label for="periodo_id">Periodo:</label>
                       <select class="form-control text-capitalize" name="periodo[]" id="periodo_id" multiple="multiple" required>
                            <?php
                                $periodos=json_decode($periodos, true);
                                foreach ($periodos as $key => $periodo) {
                                  echo "<option value=".$periodo['periodo'].">".$periodo['periodo']."</option>";
                                } 
                            ?>
                        </select> <br>
            </div>

            <div class="col-sm-5">
                        <label for="nivel_id">Departamento:</label>
                        <select class="form-control text-capitalize" id="departamento_id" style="width:100%;" name="departamento[]" multiple="multiple" required>
                            <?php
                                $departamentos=json_decode($departamentos, true);
                                foreach ($departamentos as $key => $departamento) {
                                  echo "<option value=".$departamento['codigo'].">".$departamento['departamento']."</option>";
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

        </div>
    </div>

    <!--DATATABLE CON REGISTROS-->
    <table id="registros" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Periodo</th>
                <th>Departamento</th>
                <th>Edad</th>
                <th>Hombres</th>
                <th>Mujeres</th>
                <th>Total</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Periodo</th>
                <th>Departamento</th>
                <th>Edad</th>
                <th>Hombres</th>
                <th>Mujeres</th>
                <th>Total</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
                
                $registros = json_decode($registros, true);

                foreach ($registros as $row ) {
                ?>
                    <tr>
                        <td><?php echo $row['departamento'];?></td>
                        <td><?php echo $row['periodo']; ?></td>
                        <td><?php echo number_format($row['edad']); ?></td>
                        <td><?php echo number_format($row['hombres'], 2); ?></td>
                        <td><?php echo number_format($row['mujeres'], 2); ?></td>
                        <td><?php echo number_format($row['total'], 2); ?></td>

                    </tr>
                <?php  
                    } 
                ?>
        </tbody>
    </table>

     <!--DATATABLE CON REGISTROS TOTALES-->
    <br>
    <h3><p class="text-info">TOTAL POR DEPARTAMENTO:</p></h3>
    <table id="registros_total" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Periodo</th>
                <th>Departamento</th>
                <th>Hombres</th>
                <th>Mujeres</th>
                <th>Total</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Periodo</th>
                <th>Departamento</th>
                <th>Hombres</th>
                <th>Mujeres</th>
                <th>Total</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
                
                $registros_totales = json_decode($registros_totales, true);
                
                $grafico_depto= '[';
                $grafico_hombres= '[';
                $grafico_mujeres= '[';
                $grafico_total= '[';

                $grafico_perido= array();
                
                $cont=0;

                foreach ($registros_totales as $row ) {
                ?>
                    <tr>
                        <td><?php echo $row['departamento'];?></td>
                        <td><?php echo $row['periodo']; ?></td>
                        <td><?php echo number_format($row['hombres_total'], 2); ?></td>
                        <td><?php echo number_format($row['mujeres_total'], 2); ?></td>
                        <td><?php echo number_format($row['total'], 2); ?></td>
                        <?php 
                            
                            if ($cont==0){
                                $grafico_depto.='"'.$row['departamento'].'"';
                                $grafico_hombres.=''.$row['hombres_total'].'';
                                $grafico_mujeres.=''.$row['mujeres_total'].'';
                                $grafico_total.=''.$row['total'].'';
                            }else{
                                $grafico_depto.=', "'.$row['departamento'].'"';
                                $grafico_hombres.=', '.$row['hombres_total'].'';
                                $grafico_mujeres.=', '.$row['mujeres_total'].'';
                                $grafico_total.=', '.$row['total'].'';
                            }

                             if(in_array($row['periodo'], $grafico_perido)){

                             }else{
                                array_push($grafico_perido, $row['periodo']);
                             }
                             
                            $cont++;

                        ?>
                    </tr>
                <?php  
                    } 
                    $grafico_depto.= ']';
                    $grafico_hombres.= ']';
                    $grafico_mujeres.= ']';
                    $grafico_total.= ']';

                    $graphP = $this->Matricula_model->ConvertirTexto($grafico_perido);
                    $graphP = str_replace(",0", "", $graphP);
                ?>
        </tbody>
    </table>

    <!--BOTONES PARA OPCIONES DE GRAFICOS-->
    <div class="btn-group">
        <div class="btn-group">
            <button id="columna" class="btn btn-primary"  type="button"><i class="fa fa-bar-chart" aria-hidden="true"></i></button>
        </div>
        <div class="btn-group">
            <button id="lineal" class="btn btn-primary"  type="button"> <i class="fa fa-line-chart" aria-hidden="true"></i></button>
        </div>
        <div class="btn-group">
            <button id="area" class="btn btn-primary" type="button"><i class="fa fa-area-chart" aria-hidden="true"></i></button>
        </div>

      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-caret-down" aria-hidden="true"></i>
        </button>

      <!--OPCIONES PARA INGRESAR VARIABLES A LA GRAFICA-->  
      <ul class="dropdown-menu">

        <li>&nbsp;&nbsp;Hombres  <button id="hombres" class="btn btn-success btn-xs" type="button">+</button> 
                                    <button id="eliminar_hombres" class="btn btn-danger btn-xs" type="button">-</button></li>
        <li class="divider"></li>
        <li>&nbsp;&nbsp;Mujeres  <button id="mujeres" class="btn btn-success btn-xs" type="button">+</button> 
                                    <button id="eliminar_mujeres" class="btn btn-danger btn-xs" type="button">-</button></li>

        <li class="divider"></li>
            <li>&nbsp;&nbsp;Total <button id="total" class="btn btn-success btn-xs" type="button">+</button> 
                                        <button id="eliminar_total" class="btn btn-danger btn-xs" type="button">-</button></li>

      </ul>

    </div>

    <div id="container" style="height: 400px"></div>

</div>

<style>
    #container {
        width: 100%;
        margin: 0 auto;
    }
</style>

<script>

    $('#hombres').prop('disabled', true);
    $('#mujeres').prop('disabled', true);

    $('#eliminar_total').prop('disabled', true);

    var chart = Highcharts.chart('container', {
        chart: {
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 10,
                beta: 25,
                depth: 70
            }
        },
        title: {
            text: '<?php echo $graphP;?>'
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        xAxis: {
            categories: <?php echo $grafico_depto;?>,
            labels: {
                skew3d: false,
                style: {
                    fontSize: '12px'
                }
            }
        },
        yAxis: {
            title: {
                text: null
            }
        },
        series: [

        {
            id: 'hombres',
            name: 'Hombres',
            data: <?php echo $grafico_hombres;?>
        },

        {
            id: 'mujeres',
            name: 'Mujeres',
            data: <?php echo $grafico_mujeres;?>
        }]
    });

    $('#hombres').click(function () {
    $('#hombres').prop('disabled', true);
    $('#eliminar_hombres').prop('disabled', false);
    chart.addSeries({
            id: 'hombres',                        
            name: 'Hombres',
            data: <?php echo $grafico_hombres;?>
        });
    });

    $('#eliminar_hombres').click(function () {
        $('#eliminar_hombres').prop('disabled', true);
        $('#hombres').prop('disabled', false);
        chart.get('hombres').remove();
    });

    $('#mujeres').click(function () {
    $('#mujeres').prop('disabled', true);
    $('#eliminar_mujeres').prop('disabled', false);
    chart.addSeries({
            id: 'mujeres',                        
            name: 'Mujeres',
            data: <?php echo $grafico_mujeres;?>
        });
    });

    $('#eliminar_mujeres').click(function () {
        $('#eliminar_mujeres').prop('disabled', true);
        $('#mujeres').prop('disabled', false);
        chart.get('mujeres').remove();
    });

    $('#total').click(function () {
    $('#total').prop('disabled', true);
    $('#eliminar_total').prop('disabled', false);
    chart.addSeries({
            id: 'total',                        
            name: 'Total',
            data: <?php echo $grafico_total;?>
        });
    });

    $('#eliminar_total').click(function () {
        $('#eliminar_total').prop('disabled', true);
        $('#total').prop('disabled', false);
        chart.get('total').remove();
    });

</script>