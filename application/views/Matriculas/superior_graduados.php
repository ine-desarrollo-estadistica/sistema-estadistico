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
        $('#agrupacion_id').multiselect();
    });
</script>

<div class="container">

    <!--<div class="container text-center">
      <h3  class="text-info">INSTITUTO NACIONAL DE ESTADISTICA <small>-INE-</small></h3>  
    </div>-->

    <div class="container text-center">
      <h3  class="text-info">POBLACION ESTUDIANTIL - GRADUADOS<small>-Educacion-</small></h3>  
    </div>

    <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <!--<a data-toggle="collapse" href="#collapse1">-->
                    <i class="fa fa-info-circle" aria-hidden="true"></i> INFORMACION<!--</a>-->
                </h4>
            </div>
             <!--<div id="collapse1" class="panel-collapse collapse">-->
            <div class="panel-body" style="text-align: left;">

                 <div class="row">  
                    <div class="col-sm-12">
                        <p>
                            <b>Matriculados/Graduados por sexo y sector</b>
                            <ul>
                                <li>Fuente: Instituto Nacional de Estadística</li>
                                <li>En la serie 2006 - 2013 se recibieron datos de la universidad pública y 12 privadas.</li>
                                <li>En el 2014 se recibieron datos de la universidad pública y 10 privadas.</li>
                                <li>En el 2015 se recibieron datos de la universidad pública y 9 privadas.</li>
                            </ul>                            
                        </p>
                    </div>
                    <!--<div class="col-sm-4">

                    </div>
                    <div class="col-sm-4">
                           
                    </div>-->
                </div>    

            </div>
        <!--</div>-->
    </div>  



    <div class="panel panel-primary">
      <div class="panel-heading"><i class="fa fa-list-alt" aria-hidden="true"></i> OPCIONES</div>
      <div class="panel-body" style="text-align: center;">
    


        <form action="" method="post">


        <div class="row">
            <div class="col-sm-3">
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

            <div class="col-sm-4">
                        <label for="nivel_id">Agrupación:</label>
                        <select class="form-control text-capitalize" id="agrupacion_id" name="agrupacion">
                            <option value=1>Sexo</option>
                            <option value=2>Sector</option>
                        </select> <br>
            </div>
            <div class="col-sm-2">
                        <input type="hidden" name="ctrl" value="1">
                        <!--<input type="submit" value="Ver" type="button" class="btn btn-success" />-->
                          <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
            </div>
        </div>    

        </form>

        </div>
    </div>
    <?php 

        if ($agr==1){
            $opc1="Matriculados Hombres";
            $opc2="Matriculados Mujeres";
            $opc3="Graduados Hombres";
            $opc4="Graduados Mujeres";
        }else{
            $opc1="Matriculados Sector Publico";
            $opc2="Matriculados Sector Privado";
            $opc3="Graduados Sector Publico";
            $opc4="Graduados Sector Privado";
        }

    ?>
    <table id="maestros" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                                        <th>Periodo</th>
                                        <th>Total Matriculados</th>
                                        <th><?php echo $opc1;?></th>
                                        <th><?php echo $opc2;?></th>
                                        <th>Total Graduados</th>
                                        <th><?php echo $opc3;?></th>
                                        <th><?php echo $opc4;?></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                                        <th>Periodo</th>
                                        <th>Total Matriculados</th>
                                        <th><?php echo $opc1;?></th>
                                        <th><?php echo $opc2;?></th>
                                        <th>Total Graduados</th>
                                        <th><?php echo $opc3;?></th>
                                        <th><?php echo $opc4;?></th>
            </tr>
        </tfoot>
        <tbody>
            <?php

                                    $registros = json_decode($registros, true);

                                    $grafico_periodo= '[';
                                    $grafico_graduadosh='[';
                                    $grafico_graduadosm='[';

                                    $grafico_graduadosh='[';
                                    $grafico_graduadosm='[';

                                    $grafico_matriculadosh='[';
                                    $grafico_matriculadosm='[';

                                    $grafico_totalmatriculados='[';
                                    $grafico_totalgraduados='[';

                                    $cont=0;

                                        foreach ($registros as $row ) { 

                                    ?>
                                    <tr>
                                        <td><?php echo $row['periodo']; ?></td>
                                        <td><?php echo number_format($row['total']); ?></td>
                                        <?php if ($agr==1){ ?>
                                            <td><?php echo number_format($row['matriculados_h']); ?></td>
                                            <td><?php echo number_format($row['matriculados_m']); ?></td>
                                            <td><?php echo number_format($row['totalg']); ?></td>
                                            <td><?php echo number_format($row['graduados_h']); ?></td>
                                            <td><?php echo number_format($row['graduados_m']); ?></td>
                                        <?php }else{ ?>
                                            <td><?php echo number_format($row['matriculados_p']); ?></td>
                                            <td><?php echo number_format($row['matriculados_pr']); ?></td>
                                            <td><?php echo number_format($row['totalg']); ?></td>
                                            <td><?php echo number_format($row['graduados_p']); ?></td>
                                            <td><?php echo number_format($row['graduados_pr']); ?></td>
                                        <?php }?>

                                        <?php 
                                            
                                            if ($cont==0){
        
                                                $grafico_periodo.=''.$row['periodo'].'';
                                                if ($agr==1){
                                                    $grafico_graduadosh.=''.$row['graduados_h'].'';
                                                    $grafico_graduadosm.=''.$row['graduados_m'].'';

                                                    $grafico_matriculadosh.=''.$row['matriculados_h'].'';
                                                    $grafico_matriculadosm.=''.$row['matriculados_m'].'';

                                                    $grafico_totalmatriculados.=''.$row['total'].'';
                                                    $grafico_totalgraduados.=''.$row['totalg'].'';

                                                }else{
                                                    $grafico_graduadosh.=''.$row['graduados_p'].'';
                                                    $grafico_graduadosm.=''.$row['graduados_pr'].'';

                                                    $grafico_matriculadosh.=''.$row['matriculados_p'].'';
                                                    $grafico_matriculadosm.=''.$row['matriculados_pr'].'';

                                                    $grafico_totalmatriculados.=''.$row['total'].'';
                                                    $grafico_totalgraduados.=''.$row['totalg'].'';   
                                                }
                                            }else{

                                                $grafico_periodo.=', '.$row['periodo'].'';
                                                if ($agr==1){
                                                    $grafico_graduadosh.=', '.$row['graduados_h'].'';
                                                    $grafico_graduadosm.=', '.$row['graduados_m'].'';

                                                    $grafico_matriculadosh.=', '.$row['matriculados_h'].'';
                                                    $grafico_matriculadosm.=', '.$row['matriculados_m'].'';

                                                    $grafico_totalmatriculados.=', '.$row['total'].'';
                                                    $grafico_totalgraduados.=', '.$row['totalg'].'';  

                                                }else{
                                                    $grafico_graduadosh.=', '.$row['graduados_p'].'';
                                                    $grafico_graduadosm.=', '.$row['graduados_pr'].'';

                                                    $grafico_matriculadosh.=', '.$row['matriculados_p'].'';
                                                    $grafico_matriculadosm.=', '.$row['matriculados_pr'].'';

                                                    $grafico_totalmatriculados.=', '.$row['total'].'';
                                                    $grafico_totalgraduados.=', '.$row['totalg'].'';      
                                                }

                                            }
                                            
                                            $cont++;

                                        ?>
                                    </tr>
                                    <?php  } 

                                        $grafico_periodo.=']';
                                        $grafico_graduadosh.=']';
                                        $grafico_graduadosm.=']';
                                        $grafico_matriculadosh.=']';
                                        $grafico_matriculadosm.=']';

                                        $grafico_totalmatriculados.=']';
                                        $grafico_totalgraduados.=']';  

                                    ?>
        </tbody>
    </table>

<div class="btn-group">
    <div class="btn-group">
        <button id="columna" class="btn btn-primary"><i class="fa fa-bar-chart" aria-hidden="true"></i></button>
    </div>
    <div class="btn-group">
        <button id="lineal" class="btn btn-primary"><i class="fa fa-line-chart" aria-hidden="true"></i></button>
    </div>
    <div class="btn-group">
        <button id="temp" class="btn btn-primary"><i class="fa fa-area-chart" aria-hidden="true"></i></button>
    </div>
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-caret-down" aria-hidden="true"></i>
    </button>
      <ul class="dropdown-menu" style="font-size: 9px;">
        <li>&nbsp;<?php echo $opc1?> <button id="mhombres" class="btn btn-success btn-xs" type="button">+</button> 
                                    <button id="eliminar_mhombres" class="btn btn-danger btn-xs" type="button">-</button></li>
        <li class="divider"></li>

        <li>&nbsp;<?php echo $opc2?> <button id="mmujeres" class="btn btn-success btn-xs" type="button">+</button> 
                                    <button id="eliminar_mmujeres" class="btn btn-danger btn-xs" type="button">-</button></li>
        <li class="divider"></li>

        <li>&nbsp;<?php echo $opc3?> <button id="ghombres" class="btn btn-success btn-xs" type="button">+</button> 
                                    <button id="eliminar_ghombres" class="btn btn-danger btn-xs" type="button">-</button></li>
        <li class="divider"></li>

        <li>&nbsp;<?php echo $opc4?> <button id="gmujeres" class="btn btn-success btn-xs" type="button">+</button> 
                                    <button id="eliminar_gmujeres" class="btn btn-danger btn-xs" type="button">-</button></li>
        <li class="divider"></li>

        <li>&nbsp;Total Matriculados <button id="total" class="btn btn-success btn-xs" type="button">+</button> 
                                <button id="eliminar_total" class="btn btn-danger btn-xs" type="button">-</button></li>
                                
        <li class="divider"></li>
        <li>&nbsp;Total Graduados <button id="totalg" class="btn btn-success btn-xs" type="button">+</button> 
                                <button id="eliminar_totalg" class="btn btn-danger btn-xs" type="button">-</button></li>

      </ul>

</div>


<div id="container" style="height: 400px"></div>

<style>
#container {
    /*height: 400px; 
    min-width: 310px; 
    max-width: 800px;*/
    width: 100%;
    margin: 0 auto;
}
</style>

<script>

    $('#total').prop('disabled', true);
    $('#totalg').prop('disabled', true);

    $('#eliminar_mhombres').prop('disabled', true);
    $('#eliminar_mmujeres').prop('disabled', true);

    $('#eliminar_ghombres').prop('disabled', true);
    $('#eliminar_gmujeres').prop('disabled', true);

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
        text: 'Graduados de Nivel Superiror'
    },
    subtitle: {
        text: ''
    },
    plotOptions: {
        column: {
            depth: 25
        }
    },
    xAxis: {
        categories: <?php echo $grafico_periodo;?>,
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

    /*{
        id: 'matriculados_hombres', 
        name: <?php echo "'".$opc1."'"?>,
        data: <?php echo $grafico_matriculadosh;?>
    },

    {
        id: 'matriculados_mujeres', 
        name: <?php echo "'".$opc2."'"?>,
        data: <?php echo $grafico_matriculadosm;?>
    },

     {
        id: 'graduados_hombres',
        name: <?php echo "'".$opc3."'"?>,
        data: <?php echo $grafico_graduadosh;?>
    },

    {
        id: 'graduados_mujeres',
        name: <?php echo "'".$opc4."'"?>,
        data: <?php echo $grafico_graduadosm;?>
    },*/

    {
        id: 'total', 
        name: 'Total Matriculados',
        data: <?php echo $grafico_totalmatriculados;?>
    },

     {
        id: 'total_graduandos',
        name: 'Total graduados',
        data: <?php echo $grafico_totalgraduados;?>
    }]
});

$('#lineal').click(function () {
    chart.update({
        chart: {
            type: 'spline'
        }
    });
});

$('#columna').click(function () {
    chart.update({
        chart: {    
            type: 'column'
        }
    });
});

$('#temp').click(function () {
    chart.update({
        chart: {    
            type: 'area'
        }
    });
});

/************************************************************************************/
$('#mhombres').click(function () {
    $('#mhombres').prop('disabled', true);
    $('#eliminar_mhombres').prop('disabled', false);
    chart.addSeries({
        id: 'matriculados_hombres',                        
        name: <?php echo "'".$opc1."'"?>,
        data: <?php echo $grafico_matriculadosh;?>
    });
});

$('#eliminar_mhombres').click(function () {
    $('#eliminar_mhombres').prop('disabled', true);
    $('#mhombres').prop('disabled', false);
    chart.get('matriculados_hombres').remove();
});

/************************************************************************************/
$('#mmujeres').click(function () {
    $('#mmujeres').prop('disabled', true);
    $('#eliminar_mmujeres').prop('disabled', false);
    chart.addSeries({
        id: 'matriculados_mujeres',                        
        name: <?php echo "'".$opc2."'"?>,
        data: <?php echo $grafico_matriculadosm;?>
    });
});

$('#eliminar_mmujeres').click(function () {
    $('#eliminar_mmujeres').prop('disabled', true);
    $('#mmujeres').prop('disabled', false);
    chart.get('matriculados_mujeres').remove();
});

/************************************************************************************/
$('#ghombres').click(function () {
    $('#ghombres').prop('disabled', true);
    $('#eliminar_ghombres').prop('disabled', false);
    chart.addSeries({
        id: 'graduados_hombres',                        
        name: <?php echo "'".$opc3."'"?>,
        data: <?php echo $grafico_graduadosh;?>
    });
});

$('#eliminar_ghombres').click(function () {
    $('#eliminar_ghombres').prop('disabled', true);
    $('#ghombres').prop('disabled', false);
    chart.get('graduados_hombres').remove();
});

/************************************************************************************/
$('#gmujeres').click(function () {
    $('#gmujeres').prop('disabled', true);
    $('#eliminar_gmujeres').prop('disabled', false);
    chart.addSeries({
        id: 'graduados_mujeres',                        
        name: <?php echo "'".$opc4."'"?>,
        data: <?php echo $grafico_graduadosm;?>
    });
});

$('#eliminar_gmujeres').click(function () {
    $('#eliminar_gmujeres').prop('disabled', true);
    $('#mmujeres').prop('disabled', false);
    chart.get('graduados_mujeres').remove();
});

/************************************************************************************/
$('#total').click(function () {
    $('#total').prop('disabled', true);
    $('#eliminar_total').prop('disabled', false);
    chart.addSeries({
        id: 'total',                        
        name: 'Total Matriculados',
        data: <?php echo $grafico_totalmatriculados;?>
    });
});

$('#eliminar_total').click(function () {
    $('#eliminar_total').prop('disabled', true);
    $('#total').prop('disabled', false);
    chart.get('total').remove();
});

/************************************************************************************/
$('#totalg').click(function () {
    $('#totalg').prop('disabled', true);
    $('#eliminar_totalg').prop('disabled', false);
    chart.addSeries({
        id: 'total_graduandos',                        
        name: 'Total Graduados',
        data: <?php echo $grafico_totalgraduados;?>
    });
});

$('#eliminar_totalg').click(function () {
    $('#eliminar_totalg').prop('disabled', true);
    $('#totalg').prop('disabled', false);
    chart.get('total_graduandos').remove();
});

</script>

</div>