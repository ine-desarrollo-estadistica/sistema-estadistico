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
        $('#nivel_id').multiselect({includeSelectAllOption: true});
        $('#departamento_id').multiselect({includeSelectAllOption: true});
    });
</script>

<div class="container">

    <!--<div class="container text-center">
      <h3  class="text-info">INSTITUTO NACIONAL DE ESTADISTICA <small>-INE-</small></h3>  
    </div>-->

    <div class="container text-center">
      <h3  class="text-info">TASA DE APROBACIÓN<small>-Educación-</small></h3>  
    </div>

    <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <!--<a data-toggle="collapse" href="#collapse1">-->
                    <i class="fa fa-info-circle" aria-hidden="true"></i> INFORMACION</a>
                </h4>
            </div>
            <!--<div id="collapse1" class="panel-collapse collapse">-->
            <div>    
            <div class="panel-body" style="text-align: left;">

                 <div class="row">  
                    <div class="col-sm-12">
                        <p>
                            <b>La tasa de aprobacion,</b> establece una
                            relación entre la inscripción final (incripcion inicial - retirados) total y los alumnos promovidos de grado.
                        </p>
                    </div>
                </div>    

            </div>
        </div>
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
            <!--<div class="col-sm-2">
    
                
            </div>-->
            <div class="col-sm-3">
                        <label for="nivel_id">Nivel:</label>
                         <!--<select class="selectpicker" multiple data-actions-box="true" name="nivel[]" required>-->
                         <select class="form-control text-capitalize" id="nivel_id" name="nivel[]" multiple="multiple" required>
                            <?php
                                $niveles=json_decode($niveles, true);
                                foreach ($niveles as $key => $nivel) {
                                  echo "<option value=".$nivel['id'].">".$nivel['nivel']."</option>";
                                } 
                            ?>
                         </select> <br>
            </div>
            <!--<div class="col-sm-2">
                <input type="checkbox" name="vehicle"> Tasa Neta<br>
                <input type="checkbox" name="vehicle"> Tasa Bruta<br>
            </div>-->
            <div class="col-sm-4">
                        <label for="nivel_id">Departamento:</label>
                        <select class="form-control text-capitalize" id="departamento_id" style="width:100%;" name="departamento[]" multiple="multiple" required>
                            <?php
                                $departamentos=json_decode($departamentos, true);
                                foreach ($departamentos as $key => $departamento) {
                                  echo "<option value=".$departamento['id'].">".$departamento['departamento']."</option>";
                                } 
                            ?>
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





    <table id="maestros" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                                        <th>Departamento</th>
                                        <th>Nivel</th>
                                        <th>Periodo</th>
                                        <th>Inscripcion Final</th>
                                        <th>Ins. Hombres</th>
                                        <th>Ins. Mujeres</th>
                                        <th>Promovios</th>
                                        <th>Prom. Hombres</th>
                                        <th>Prom. Mujeres</th>
                                        <th>Tasa de Aprobación</th>
                                        <th>Aprob. Hombres</th>
                                        <th>Aprob. Mujeres</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                                        <th>Departamento</th>
                                        <th>Nivel</th>
                                        <th>Periodo</th>
                                        <th>Inscripcion Final</th>
                                        <th>Ins. Hombres</th>
                                        <th>Ins. Mujeres</th>
                                        <th>Promovios</th>
                                        <th>Prom. Hombres</th>
                                        <th>Prom. Mujeres</th>
                                        <th>Tasa de Aprobación</th>
                                        <th>Aprob. Hombres</th>
                                        <th>Aprob. Mujeres</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
                                    //print_r($dispositivos);
                                    $registros = json_decode($registros, true);
                                    $grafico_depto= '[';
                                    $grafico_total= '[';
                                    $grafico_hombres= '[';
                                    $grafico_mujeres= '[';

                                    $grafico_promtotal= '[';
                                    $grafico_promhombres= '[';
                                    $grafico_prommujeres= '[';

                                    $grafico_instotal= '[';
                                    $grafico_inshombres= '[';
                                    $grafico_insmujeres= '[';

                                   // $grafico_inscritos= '[';
                                    /*$grafico_perido= '';
                                    $grafico_nivel= '';*/
                                    $grafico_perido= array();
                                    $grafico_nivel= array();
                                    $cont=0;
                                    //print_r($dispositivos);
                                        /*if (isset($dispositivos) && $dispositivos != '') {*/
                                        foreach ($registros as $row ) { 

                                    ?>
                                    <tr>
                                        <td><?php echo $row['departamento'];?></td>
                                        <td><?php echo $row['nivel']; ?></td>
                                        <td><?php echo $row['periodo']; ?></td>
                                        <td><?php echo number_format($row['Total_inscritos']); ?></td>
                                        <td><?php echo number_format($row['inscritos_h']); ?></td>
                                        <td><?php echo  number_format($row['inscritos_m']); ?></td>
                                        <td><?php echo  number_format($row['Total_promovidos']); ?></td>
                                        <td><?php echo  number_format($row['promovidos_h']); ?></td>
                                        <td><?php echo  number_format($row['promovidos_m']); ?></td>
                                        <td><?php echo  number_format($row['Total'],2); ?></td>
                                        <td><?php echo  number_format($row['Total_hombres'],2); ?></td>
                                        <td><?php echo  number_format($row['Total_mujeres'],2); ?></td>
                                        <?php 
                                            
                                            if ($cont==0){
                                                //$grafico_depto.='"'.$row['departamento'].'"';
                                                $grafico_depto.='"'.$row['abDep']."-".$row['abNiv'].'"';
                                                $grafico_total.=''.$row['Total'].'';
                                                $grafico_hombres.=''.$row['Total_hombres'].'';
                                                $grafico_mujeres.=''.$row['Total_mujeres'].'';

                                                $grafico_promtotal.=''.$row['Total_promovidos'].'';
                                                $grafico_promhombres.=''.$row['promovidos_h'].'';
                                                $grafico_prommujeres.=''.$row['promovidos_m'].'';

                                                $grafico_instotal.=''.$row['Total_inscritos'].'';
                                                $grafico_inshombres.=''.$row['inscritos_h'].'';
                                                $grafico_insmujeres.=''.$row['inscritos_m'].'';

                                            }else{
                                                //$grafico_depto.=', "'.$row['departamento'].'"';
                                                $grafico_depto.=', "'.$row['abDep']."-".$row['abNiv'].'"';
                                                $grafico_total.=', '.$row['Total'].'';
                                                $grafico_hombres.=', '.$row['Total_hombres'].'';
                                                $grafico_mujeres.=', '.$row['Total_mujeres'].'';

                                                $grafico_promtotal.=', '.$row['Total_promovidos'].'';
                                                $grafico_promhombres.=', '.$row['promovidos_h'].'';
                                                $grafico_prommujeres.=', '.$row['promovidos_m'].'';

                                                $grafico_instotal.=', '.$row['Total_inscritos'].'';
                                                $grafico_inshombres.=', '.$row['inscritos_h'].'';
                                                $grafico_insmujeres.=', '.$row['inscritos_m'].'';

                                            }

                                             /*$grafico_perido.=$row['periodo']." ";
                                             $grafico_nivel.=$row['nivel']." ";*/

                                             /*$grafico_perido.=$row['periodo']." ";
                                             $grafico_nivel.=$row['nivel']." ";*/


                                             if(in_array($row['periodo'], $grafico_perido)){

                                             }else{
                                                array_push($grafico_perido, $row['periodo']);
                                             }

                                             if(in_array($row['nivel'], $grafico_nivel)){
                                                
                                             }else{
                                                array_push($grafico_nivel, $row['nivel']);
                                             }
                                             
                                             //array_push($grafico_perido, $row['periodo']);

                                             /*var_dump($grafico_perido);
                                             var_dump($grafico_nivel);*/
                                            
                                            $cont++;

                                        ?>
                                    </tr>
                                    <?php  } 
                                        $grafico_depto.=']';
                                        $grafico_total.=']';
                                        $grafico_hombres.=']';
                                        $grafico_mujeres.=']';

                                        $grafico_promtotal.=']';
                                        $grafico_promhombres.=']';
                                        $grafico_prommujeres.=']';

                                        $grafico_instotal.=']';
                                        $grafico_inshombres.=']';
                                        $grafico_insmujeres.=']';
                                        //$grafico_inscritos.=']';

                                        //print_r($grafico_depto);
                                        //print_r($grafico_bruta);

                                        /*var_dump($grafico_perido);
                                        var_dump($grafico_nivel);*/

                                        $graphP = $this->Matricula_model->ConvertirTexto($grafico_perido);
                                        $graphP = str_replace(",0", "", $graphP);
                                        $graphN = $this->Matricula_model->ConvertirTexto($grafico_nivel);
                                        $graphN = str_replace(",0", "", $graphN);

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
      <ul class="dropdown-menu" style="font-size: 10px;">
        <li>&nbsp;Aprobación Total  <button id="atotal" class="btn btn-success btn-xs" type="button">+</button> 
                                    <button id="eliminar_atotal" class="btn btn-danger btn-xs" type="button">-</button></li>
        <li class="divider"></li>
        <li>&nbsp;Aprobación Hombres  <button id="ahombres" class="btn btn-success btn-xs" type="button">+</button> 
                                    <button id="eliminar_ahombres" class="btn btn-danger btn-xs" type="button">-</button></li>
        <li class="divider"></li>
        <li>&nbsp;Aprobación Mujeres  <button id="amujeres" class="btn btn-success btn-xs" type="button">+</button> 
                                    <button id="eliminar_amujeres" class="btn btn-danger btn-xs" type="button">-</button></li>
        <li class="divider"></li>
        <li>&nbsp;Promovidos  <button id="ptotal" class="btn btn-success btn-xs" type="button">+</button> 
                                    <button id="eliminar_ptotal" class="btn btn-danger btn-xs" type="button">-</button></li>
        <li class="divider"></li>
        <li>&nbsp;Promovidos Hombres  <button id="phombres" class="btn btn-success btn-xs" type="button">+</button> 
                                    <button id="eliminar_phombres" class="btn btn-danger btn-xs" type="button">-</button></li>
        <li class="divider"></li>
        <li>&nbsp;Promovidos Mujeres  <button id="pmujeres" class="btn btn-success btn-xs" type="button">+</button> 
                                    <button id="eliminar_pmujeres" class="btn btn-danger btn-xs" type="button">-</button></li>
        <li class="divider"></li>
        <li>&nbsp;Inscritos  <button id="itotal" class="btn btn-success btn-xs" type="button">+</button> 
                                    <button id="eliminar_itotal" class="btn btn-danger btn-xs" type="button">-</button></li>
        <li class="divider"></li>
        <li>&nbsp;Inscritos Hombres  <button id="ihombres" class="btn btn-success btn-xs" type="button">+</button> 
                                    <button id="eliminar_ihombres" class="btn btn-danger btn-xs" type="button">-</button></li>
        <li class="divider"></li>
        <li>&nbsp;Inscritos Mujeres  <button id="imujeres" class="btn btn-success btn-xs" type="button">+</button> 
                                    <button id="eliminar_imujeres" class="btn btn-danger btn-xs" type="button">-</button></li>

      </ul>

</div>

<div id="container" style="height: 400px"></div>

</div>

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

$('#atotal').prop('disabled', true);
$('#ahombres').prop('disabled', true);
$('#amujeres').prop('disabled', true);

$('#eliminar_ptotal').prop('disabled', true);
$('#eliminar_phombres').prop('disabled', true);
$('#eliminar_pmujeres').prop('disabled', true);

$('#eliminar_itotal').prop('disabled', true);
$('#eliminar_ihombres').prop('disabled', true);
$('#eliminar_imujeres').prop('disabled', true);

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
    subtitle: {
        text: '<?php echo $graphN;?>'
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
        id: 'aprobacion_total',
        name: 'Tasa de Aprobación Total',
        data: <?php echo $grafico_total;?>
    },

    {
        id: 'aprobacion_hombres',
        name: 'Tasa de Aprobación Hombres',
        data: <?php echo $grafico_hombres;?>
    },

    {
        id: 'aprobacion_mujeres',
        name: 'Tasa de Aprobación Mujeres',
        data: <?php echo $grafico_mujeres;?>
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

$('#atotal').click(function () {
    $('#atotal').prop('disabled', true);
    $('#eliminar_atotal').prop('disabled', false);
    chart.addSeries({
        id: 'aprobacion_total',                        
        name: 'Tasa de Aprobación Total',
        data: <?php echo $grafico_total;?>
    });
});

$('#eliminar_atotal').click(function () {
    $('#eliminar_atotal').prop('disabled', true);
    $('#atotal').prop('disabled', false);
    chart.get('aprobacion_total').remove();
});

$('#ahombres').click(function () {
    $('#ahombres').prop('disabled', true);
    $('#eliminar_ahombres').prop('disabled', false);
    chart.addSeries({
        id: 'aprobacion_hombres',                        
        name: 'Tasa de Aprobación Hombres',
        data: <?php echo $grafico_hombres;?>
    });
});

$('#eliminar_ahombres').click(function () {
    $('#eliminar_ahombres').prop('disabled', true);
    $('#atotal').prop('disabled', false);
    chart.get('aprobacion_hombres').remove();
});

$('#amujeres').click(function () {
    $('#amujeres').prop('disabled', true);
    $('#eliminar_amujeres').prop('disabled', false);
    chart.addSeries({
        id: 'aprobacion_mujeres',                        
        name: 'Tasa de Aprobación Mujeres',
        data: <?php echo $grafico_mujeres;?>
    });
});

$('#eliminar_amujeres').click(function () {
    $('#eliminar_amujeres').prop('disabled', true);
    $('#amujeres').prop('disabled', false);
    chart.get('aprobacion_mujeres').remove();
});


/***************************************************************************************************/

$('#ptotal').click(function () {
    $('#ptotal').prop('disabled', true);
    $('#eliminar_ptotal').prop('disabled', false);
    chart.addSeries({
        id: 'promocion_total',                        
        name: 'Promovios',
        data: <?php echo $grafico_promtotal;?>
    });
});

$('#eliminar_ptotal').click(function () {
    $('#eliminar_ptotal').prop('disabled', true);
    $('#ptotal').prop('disabled', false);
    chart.get('promocion_total').remove();
});

$('#phombres').click(function () {
    $('#phombres').prop('disabled', true);
    $('#eliminar_phombres').prop('disabled', false);
    chart.addSeries({
        id: 'promocion_hombres',                        
        name: 'Promovidos Hombres',
        data: <?php echo $grafico_promhombres;?>
    });
});

$('#eliminar_phombres').click(function () {
    $('#eliminar_phombres').prop('disabled', true);
    $('#ptotal').prop('disabled', false);
    chart.get('promocion_hombres').remove();
});

$('#pmujeres').click(function () {
    $('#pmujeres').prop('disabled', true);
    $('#eliminar_pmujeres').prop('disabled', false);
    chart.addSeries({
        id: 'promocion_mujeres',                        
        name: 'Promovidos Mujeres',
        data: <?php echo $grafico_prommujeres;?>
    });
});

$('#eliminar_pmujeres').click(function () {
    $('#eliminar_pmujeres').prop('disabled', true);
    $('#pmujeres').prop('disabled', false);
    chart.get('promocion_mujeres').remove();
});

/***************************************************************************************************/

$('#itotal').click(function () {
    $('#itotal').prop('disabled', true);
    $('#eliminar_itotal').prop('disabled', false);
    chart.addSeries({
        id: 'inscripcion_total',                        
        name: 'Inscritos',
        data: <?php echo $grafico_instotal;?>
    });
});

$('#eliminar_itotal').click(function () {
    $('#eliminar_itotal').prop('disabled', true);
    $('#itotal').prop('disabled', false);
    chart.get('promocion_itotal').remove();
});

$('#ihombres').click(function () {
    $('#ihombres').prop('disabled', true);
    $('#eliminar_ihombres').prop('disabled', false);
    chart.addSeries({
        id: 'inscripcion_hombres',                        
        name: 'Inscritos Hombres',
        data: <?php echo $grafico_inshombres;?>
    });
});

$('#eliminar_ihombres').click(function () {
    $('#eliminar_ihombres').prop('disabled', true);
    $('#itotal').prop('disabled', false);
    chart.get('inscripcion_hombres').remove();
});

$('#imujeres').click(function () {
    $('#imujeres').prop('disabled', true);
    $('#eliminar_imujeres').prop('disabled', false);
    chart.addSeries({
        id: 'inscripcion_mujeres',                        
        name: 'Inscritos Mujeres',
        data: <?php echo $grafico_insmujeres;?>
    });
});

$('#eliminar_imujeres').click(function () {
    $('#eliminar_imujeres').prop('disabled', true);
    $('#imujeres').prop('disabled', false);
    chart.get('inscripcion_mujeres').remove();
});


/*

                                        $grafico_promtotal.=']';
                                        $grafico_promhombres.=']';
                                        $grafico_prommujeres.=']';

                                        $grafico_instotal.=']';
                                        $grafico_inshombres.=']';
                                        $grafico_insmujeres.=']';

*/

</script>