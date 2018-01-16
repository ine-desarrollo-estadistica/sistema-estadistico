<?php //echo "Test"; ?>
<?php //print_r($mensaje);?>

<html>
  <head> 
  <title> :: Prueba :: </title> 
      <meta name= "viewport" content="width=device-width, user-scalable=no, initial-scalable=no, initial-scala=1.0, maximum-scale=1.0, minimun-scale=1.0"> 
      <link rel="stylesheet" type="text/css" href="<?php echo "http://localhost/CensoRRHH/";  ?>theme/css/bootstrap.min.css" />
      <link rel="stylesheet" type="text/css" href="<?php echo "http://localhost/CensoRRHH/";  ?>theme/css/font-awesome.min.css" />
      <link rel="stylesheet" type="text/css" href="<?php echo "http://localhost/CensoRRHH/";  ?>theme/css/login.css" />
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  </head> 

  <body> 
    <div class="container text-center">
      <h4  class="text-info">INSTITUTO NACIONAL DE ESTADISTICA <small>-INE-</small></h4> 
      <h4  class="text-info">OFICINA NACIONAL DEL SERVICIO CIVIL <small>-ONSEC-</small></h4> 
      <h4  class="text-info">CENSO NACIONAL DEL RECURSO HUMANO </h4> 
      <h4  class="text-muted">FORMULARIO DE VISITAS PENDIENTES <small>FC02</small></h4> 
    </div>
    <div class="container">
      <!--<form action="" class="form-horizontal">-->
      <?php echo form_open('formularios/crear'); ?>
        <div class="form-group form-control"> <!--  -->
          <label for="nombre_id" class="control-label">Nombre del servicio no localizado y/o reciente ingreso</label>
          <input type="text" class="form-control" id="nombre_id" name="Nombre" placeholder="Nombre del servicio no localizado y/o reciente ingreso">
              
          <label for="dpi_id" class="control-label">Numero de DPI</label>
          <input type="text" class="form-control" id="dpi_id" name="DPI" placeholder="DPI">
        </div>
        <button type="aceptar" class="btn btn-primary">Aceptar</button>
      </form>
  	</div>
  	<script src="http://localhost/CensoRRHH/theme/js/jquery.js"></script>
    <script src="http://localhost/CensoRRHH/theme/js/bootstrap.min.js"></script>
  </body>
</html>