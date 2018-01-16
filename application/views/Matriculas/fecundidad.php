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
      <h3  class="text-info">Tasa global de fecundidad, por escolaridad de la mujer, según año de levantamiento de la ENSMI<small>-Educacion-</small></h3>  
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
                            - República de Guatemala, serie histórica por ENSMI, niños por mujer -<br>
                            Para las series 2008/09 y 2014/15 la desagregación de educación, incluye educación superior.


                        </p>
                    </div>
                </div>    

            </div>
        <!--</div>-->
    </div>  

    <table id="maestros" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                                        <th>Periodo</th>
                                        <th>Sin educación</th>
                                        <th>Primaria</th>
                                        <th>Secundaria</th>
                                        <th>Superior</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                                        <th>Periodo</th>
                                        <th>Sin educación</th>
                                        <th>Primaria</th>
                                        <th>Secundaria</th>
                                        <th>Superior</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
                                    //print_r($dispositivos);
                                    $registros = json_decode($registros, true);
                                    $grafico_periodo= '[';
                                    $grafico_sin_educacion= '[';
                                    $grafico_primaria= '[';
                                    $grafico_secundaria= '[';
                                    $grafico_superior= '[';
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
                                        <td><?php echo $row['periodo'];?></td>
                                        <td><?php echo $row['sin_educacion']; ?></td>
                                        <td><?php echo $row['primaria']; ?></td>
                                        <td><?php echo $row['secundaria']; ?></td>
                                        <td><?php echo $row['superior']; ?></td>
                                        <?php 
                                            
                                            /*if(empty($row['superior'])){

                                                $row['superior']='NULL';
                                            }*/

                                            if ($cont==0){
                                                //$grafico_depto.='"'.$row['departamento'].'"';
                                                //$grafico_depto.='"'.$row['abDep']."-".$row['abNiv'].'"';
                                                $grafico_periodo.='"'.$row['periodo'].'"';
                                                $grafico_sin_educacion.=''.$row['sin_educacion'].'';
                                                $grafico_primaria.=''.$row['primaria'].'';
                                                $grafico_secundaria.= ''.$row['secundaria'].'';
                                                $grafico_superior.= ''.$row['superior'].'';
                                            }else{
                                                //$grafico_depto.=', "'.$row['departamento'].'"';
                                                //$grafico_depto.=', "'.$row['abDep']."-".$row['abNiv'].'"';
                                                $grafico_periodo.=', "'.$row['periodo'].'"';
                                                $grafico_sin_educacion.=', '.$row['sin_educacion'].'';
                                                $grafico_primaria.=', '.$row['primaria'].'';
                                                $grafico_secundaria.= ', '.$row['secundaria'].'';
                                                $grafico_superior.= ', '.$row['superior'].'';

                                            }

                                             /*$grafico_perido.=$row['periodo']." ";
                                             $grafico_nivel.=$row['nivel']." ";*/

                                             /*$grafico_perido.=$row['periodo']." ";
                                             $grafico_nivel.=$row['nivel']." ";*/


                                             /*if(in_array($row['periodo'], $grafico_perido)){

                                             }else{
                                                array_push($grafico_perido, $row['periodo']);
                                             }

                                             if(in_array($row['nivel'], $grafico_nivel)){
                                                
                                             }else{
                                                array_push($grafico_nivel, $row['nivel']);
                                             }*/
                                             
                                             //array_push($grafico_perido, $row['periodo']);

                                             /*var_dump($grafico_perido);
                                             var_dump($grafico_nivel);*/
                                            
                                            $cont++;

                                        ?>
                                    </tr>
                                    <?php  } 
                                        /*$grafico_depto.=']';*/
                                        $grafico_periodo.=']';
                                        $grafico_sin_educacion.=']';
                                        $grafico_primaria.=']';
                                        $grafico_secundaria.= ']';
                                        $grafico_superior.= ']';

                                        //$grafico_inscritos.=']';

                                        //print_r($grafico_depto);
                                        //print_r($grafico_bruta);

                                       /* var_dump($grafico_periodo);
                                        var_dump($grafico_sin_educacion);
                                        var_dump($grafico_primaria);
                                        var_dump($grafico_secundaria);
                                        var_dump($grafico_superior);*/

                                       /* $graphP = $this->matricula_model->ConvertirTexto($grafico_perido);
                                        $graphP = str_replace(",0", "", $graphP);
                                        $graphN = $this->matricula_model->ConvertirTexto($grafico_nivel);
                                        $graphN = str_replace(",0", "", $graphN);*/

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
        text: '<?php echo "Tasa global de fecundidad, por escolaridad de la mujer";?>'
    },
    subtitle: {
        text: '<?php "República de Guatemala, serie histórica por ENSMI, niños por mujer";?>'
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

    {
        name: 'Sin Educacion',
        data: <?php echo $grafico_sin_educacion;?>
    },
    {
        name: 'Primaria',
        data: <?php echo $grafico_primaria;?>
    },
    {
        name: 'Secundaria',
        data: <?php echo $grafico_secundaria;?>
    },
    {
        name: 'Superior',
        data: <?php echo $grafico_superior;?>
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

</script>