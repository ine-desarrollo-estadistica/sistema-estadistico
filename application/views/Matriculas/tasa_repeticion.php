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
      <h3  class="text-info">TASA DE REPITENCIA<small>-Educacion-</small></h3>  
    </div>

    <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                  <!--<a data-toggle="collapse" href="#collapse1">-->
                    <i class="fa fa-info-circle" aria-hidden="true"></i> INFORMACION</a>
                </h4>
            </div>
             <!--<div id="collapse1" class="panel-collapse collapse">-->
            <div class="panel-body" style="text-align: left;">

                 <div class="row">  
                    <div class="col-sm-12">
                        <p>
                            <b>La tasa de repitencia,</b> establece una
                            relación entre la cantidad inicial de alumnos inscritos y la cantidad de alumnos que repiten determinado grado.
                        </p>
                    </div>
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
                       <select class="form-control text-capitalize" name="periodo[]" id="periodo_id" required>
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
                         <select class="form-control text-capitalize" id="nivel_id" name="nivel[]" required>
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
                        <select class="form-control text-capitalize" id="departamento_id" style="width:100%;" name="departamento[]"  required>
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
                                        <th>Grado</th>
                                        <th>Periodo</th>
                                        <th>Inscritos</th>
                                        <th>Repitentes</th>
                                        <th>Tasa de Repitencia</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                                        <th>Departamento</th>
                                        <th>Nivel</th>
                                        <th>Grado</th>
                                        <th>Periodo</th>
                                        <th>Inscritos</th>
                                        <th>Repitentes</th>
                                        <th>Tasa de Repitencia</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
                                    //print_r($dispositivos);
                                    $registros = json_decode($registros, true);
                                    $grafico_grado= '[';
                                    $grafico_tasa= '[';

                                    $grafico_final="";



                                    /*$grafico_hombres= '[';
                                    $grafico_mujeres= '[';*/
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
                                        <td><?php echo $row['grado']; ?></td>
                                        <td><?php echo $row['periodo']; ?></td>
                                        <td><?php echo number_format($row['inscritos']); ?></td>
                                        <td><?php echo number_format($row['repitentes']); ?></td>
                                        <td><?php echo number_format($row['tasa_repeticion'],2); ?></td>
                                        <?php 

                                           
                                            
                                            if ($cont==0){
                                                //$grafico_depto.='"'.$row['departamento'].'"';
                                                /*$grafico_depto.='"'.$row['abDep']."-".$row['abNiv'].'"';
                                                $grafico_total.=''.$row['Total'].'';
                                                $grafico_hombres.=''.$row['Total_hombres'].'';
                                                $grafico_mujeres.=''.$row['Total_mujeres'].'';*/
                                                $grafico_grado.= '"'.$row['grado'].'"';
                                                $grafico_tasa.= ''.$row['tasa_repeticion'].'';

                                                $grafico_final.="{name: '".$row['grado']."', y: ".$row['tasa_repeticion']."}";

                                               /* {
                                                    name: 'IE',
                                                    y: 56.33
                                                },*/




                                            }else{
                                                //$grafico_depto.=', "'.$row['departamento'].'"';
                                                /*$grafico_depto.=', "'.$row['abDep']."-".$row['abNiv'].'"';
                                                $$grafico_total.=', '.$row['Total'].'';
                                                $grafico_hombres.=', '.$row['Total_hombres'].'';
                                                $grafico_mujeres.=', '.$row['Total_mujeres'].'';*/
                                                $grafico_grado.= ', "'.$row['grado'].'"';
                                                $grafico_tasa.= ', '.$row['tasa_repeticion'].'';

                                                $grafico_final.=",{name: '".$row['grado']."', y: ".$row['tasa_repeticion']."}";



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
                                        /*$grafico_depto.=']';
                                        $grafico_total.=']';
                                        $grafico_hombres.=']';
                                        $grafico_mujeres.=']';*/
                                        $grafico_grado.= ']';
                                        $grafico_tasa.= ']';
                                        //$grafico_inscritos.=']';

                                        //print_r($grafico_depto);
                                        //print_r($grafico_bruta);

                                        /*var_dump($grafico_grado);
                                        var_dump($grafico_tasa);*/

                                        //print_r($grafico_final);

                                        $graphP = $this->Matricula_model->ConvertirTexto($grafico_perido);
                                        $graphP = str_replace(",0", "", $graphP);
                                        $graphN = $this->Matricula_model->ConvertirTexto($grafico_nivel);
                                        $graphN = str_replace(",0", "", $graphN);

                                    ?>
        </tbody>
    </table>

<!--<div class="btn-group">
    <div class="btn-group">
        <button id="columna" class="btn btn-primary"><i class="fa fa-bar-chart" aria-hidden="true"></i></button>
    </div>
    <div class="btn-group">
        <button id="lineal" class="btn btn-primary"><i class="fa fa-line-chart" aria-hidden="true"></i></button>
    </div>
    <div class="btn-group">
        <button id="temp" class="btn btn-primary"><i class="fa fa-area-chart" aria-hidden="true"></i></button>
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
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: '<?php echo $graphP;?>'
    },
    subtitle: {
        text: '<?php echo $graphN;?>'
    },

    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [<?php echo $grafico_final; ?>]
    }]
});

</script>