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
      <h3  class="text-info">TASA DE COBERTURA ESTUDIANTIL<small> -Educación- </small></h3>  
    </div>

    <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <!--<a data-toggle="collapse" href="#collapse1">-->
                    <i class="fa fa-info-circle" aria-hidden="true"></i> INFORMACION<!--</a>-->
                </h4>
            </div>
             <!--<div id="collapse1" class="panel-collapse collapse">-->
            <div>    
            <div class="panel-body" style="text-align: left;">

                 <div class="row">  
                    <div class="col-sm-4">
                        <p>
                            <b>La tasa bruta,</b> establece una
                            relación entre la inscripción inicial total sin distinción
                            de edad y la población comprendida en la edad correspondiente.
                        </p>
                    </div>
                    <div class="col-sm-4">
                        <p>
                            <b>La tasa neta</b>, es la relación que existe entre
                            la parte de la inscripción inicial que se encuentra
                            en la edad escolar hasta la edad correspondiente y la población
                            en edad escolar correspondiente.
                        </p>    
                    </div>
                    <div class="col-sm-4">
                        <b>Edades esperadas de la poblacion</b>
                        <ul>
                            <li>Preprimaria: 5 y 6 años</li>
                            <li>Primaria: 7 a 12 años</li>
                            <li>Basico: 13 a 15 años</li>
                            <li>Diversificado: 16 a 18 años</li>
                        </ul>    
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
                                        <th>Inscritos</th>
                                        <th>Inscritos en edad esperada</th>
                                        <th>Poblacion en edad esperada</th>
                                        <th>Tasa Bruta</th>
                                        <th>Tasa Neta</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                                        <th>Departamento</th>
                                        <th>Nivel</th>
                                        <th>Periodo</th>
                                        <th>Inscritos</th>
                                        <th>Inscritos en edad esperada</th>
                                        <th>Poblacion en edad esperada</th>
                                        <th>Tasa Bruta</th>
                                        <th>Tasa Neta</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
                                    //print_r($dispositivos);
                                    $registros = json_decode($registros, true);
                                    $grafico_depto= '[';
                                    $grafico_bruta= '[';
                                    $grafico_poblacion= '[';
                                    $grafico_neta= '[';
                                    $grafico_inscritos= '[';
                                    $grafico_inscritos_edad= '[';
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
                                        <td><?php echo number_format($row['inscritos']); ?></td>
                                        <td><?php echo number_format($row['inscritos_edad']); ?></td>
                                        <td><?php echo number_format($row['poblacion']); ?></td>
                                        <td><?php echo number_format($row['bruta'], 2); ?></td>
                                        <td><?php echo number_format($row['neta'],2); ?></td>
                                        <?php 
                                            
                                            if ($cont==0){
                                                //$grafico_depto.='"'.$row['departamento'].'"';
                                                $grafico_depto.='"'.$row['abDep']."-".$row['abNiv'].'"';
                                                $grafico_bruta.=''.$row['bruta'].'';
                                                $grafico_poblacion.=''.$row['poblacion'].'';
                                                $grafico_neta.=''.$row['neta'].'';
                                                $grafico_inscritos.=''.$row['inscritos'].'';
                                                $grafico_inscritos_edad.=''.$row['inscritos_edad'].'';
                                            }else{
                                                //$grafico_depto.=', "'.$row['departamento'].'"';
                                                $grafico_depto.=', "'.$row['abDep']."-".$row['abNiv'].'"';
                                                $grafico_bruta.=', '.$row['bruta'].'';
                                                $grafico_poblacion.=', '.$row['poblacion'].'';
                                                $grafico_neta.=', '.$row['neta'].'';
                                                $grafico_inscritos.=', '.$row['inscritos'].'';
                                                $grafico_inscritos_edad.=', '.$row['inscritos_edad'].'';

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
                                        $grafico_bruta.=']';
                                        $grafico_poblacion.=']';
                                        $grafico_neta.=']';
                                        $grafico_inscritos.=']';
                                        $grafico_inscritos_edad.=']';

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
  <ul class="dropdown-menu">
    <!--<li class="dropdown-header">Graficar:</li>-->
    <li>&nbsp;&nbsp;Tasa Bruta  <button id="tasa_bruta" class="btn btn-success btn-xs" type="button">+</button> 
                                <button id="eliminar_bruta" class="btn btn-danger btn-xs" type="button">-</button></li>
    <li class="divider"></li>
    <li>&nbsp;&nbsp;Tasa Neta  <button id="tasa_neta" class="btn btn-success btn-xs" type="button">+</button> 
                                <button id="eliminar_neta" class="btn btn-danger btn-xs" type="button">-</button></li>

    <li class="divider"></li>
        <li>&nbsp;&nbsp;Inscritos/Edad <button id="inscritos_edad" class="btn btn-success btn-xs" type="button">+</button> 
                                    <button id="eliminar_inscritos_edad" class="btn btn-danger btn-xs" type="button">-</button></li>


    <li class="divider"></li>
    <li>&nbsp;&nbsp;Inscritos  <button id="inscritos" class="btn btn-success btn-xs" type="button">+</button> 
                                <button id="eliminar_inscritos" class="btn btn-danger btn-xs" type="button">-</button></li>
    <li class="divider"></li>
    <li>&nbsp;&nbsp;Poblacion/Edad  <button id="poblacion" class="btn btn-success btn-xs" type="button">+</button> 
                                <button id="eliminar_poblacion" class="btn btn-danger btn-xs" type="button">-</button></li>
  </ul>


</div>

<!--<div class="btn-group">
    <div class="btn-group">
        <button id="graphI" class="btn btn-primary">Tasa Neta / Tasa Bruta</button>
    </div>
    <div class="btn-group">
        <button id="graphII" class="btn btn-primary">Poblacion / Inscritos</button>
    </div>
</div>-->



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

$('#eliminar_bruta').prop('disabled', false);
$('#tasa_bruta').prop('disabled', true);

$('#eliminar_neta').prop('disabled', false);
$('#tasa_neta').prop('disabled', true);

$('#eliminar_inscritos').prop('disabled', true);

$('#eliminar_inscritos_edad').prop('disabled', true);
//$('#inscritos').prop('disabled', true);

$('#eliminar_poblacion').prop('disabled', true);

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
        id: 'bruta',
        name: 'Tasa Bruta',
        data: <?php echo $grafico_bruta;?>
    },

    {
        id: 'neta',
        name: 'Tasa Neta',
        data: <?php echo $grafico_neta;?>
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

$('#area').click(function () {
    chart.update({
        chart: {    
            type: 'area'
        }
    });
});

$('#tasa_bruta').click(function () {
    $('#tasa_bruta').prop('disabled', true);
    $('#eliminar_bruta').prop('disabled', false);
    chart.addSeries({
        id: 'bruta',                        
        name: 'Tasa Bruta',
        data: <?php echo $grafico_bruta;?>
    });
});

$('#eliminar_bruta').click(function () {
    $('#eliminar_bruta').prop('disabled', true);
    $('#tasa_bruta').prop('disabled', false);
    chart.get('bruta').remove();
});

$('#tasa_neta').click(function () {
    $('#tasa_neta').prop('disabled', true);
    $('#eliminar_neta').prop('disabled', false);
    chart.addSeries({
        id: 'neta',                        
        name: 'Tasa Neta',
        data: <?php echo $grafico_neta;?>
    });
});

$('#eliminar_neta').click(function () {
    $('#eliminar_neta').prop('disabled', true);
    $('#tasa_neta').prop('disabled', false);
    chart.get('neta').remove();
});

$('#inscritos_edad').click(function () {
    $('#inscritos_edad').prop('disabled', true);
    $('#eliminar_inscritos_edad').prop('disabled', false);
    chart.addSeries({
        id: 'inscritos_edad',                        
        name: 'Inscritos/Edad',
        data: <?php echo $grafico_inscritos_edad;?>
    });
});

$('#eliminar_inscritos_edad').click(function () {
    $('#eliminar_inscritos_edad').prop('disabled', true);
    $('#inscritos_edad').prop('disabled', false);
    chart.get('inscritos_edad').remove();
});


$('#inscritos').click(function () {
    $('#inscritos').prop('disabled', true);
    $('#eliminar_inscritos').prop('disabled', false);
    chart.addSeries({
        id: 'inscritos',                        
        name: 'Inscritos',
        data: <?php echo $grafico_inscritos;?>
    });
});

$('#eliminar_inscritos').click(function () {
    $('#eliminar_inscritos').prop('disabled', true);
    $('#inscritos').prop('disabled', false);
    chart.get('inscritos').remove();
});

$('#poblacion').click(function () {
    $('#poblacion').prop('disabled', true);
    $('#eliminar_poblacion').prop('disabled', false);
    chart.addSeries({
        id: 'poblacion',                        
        name: 'Poblacion/Edad',
        data: <?php echo $grafico_poblacion;?>
    });
});

$('#eliminar_poblacion').click(function () {
    $('#eliminar_poblacion').prop('disabled', true);
    $('#poblacion').prop('disabled', false);
    chart.get('poblacion').remove();
});

/*$('#graphI').click(function () {

    var series
    chart.update({
         series: [

   {    
        id: 'bruta',
        name: 'Tasa Bruta',
        data: <?php echo $grafico_bruta;?>
    },

    {
        id: 'neta',
        name: 'Tasa Neta',
        data: <?php echo $grafico_neta;?>
    }]
    });
});*/

/*$('#graphII').click(function () {
chart.addSeries({
    id: 'inscritos',                        
    name: 'Incritos',
    data: <?php echo $grafico_inscritos;?>
});
});

$('#eliminar').click(function () {
    chart.get('inscritos').remove();
});*/

//https://stackoverflow.com/questions/21979476/remove-series-by-name-or-id-in-highcharts
</script>