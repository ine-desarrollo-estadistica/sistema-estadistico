 <title>INE</title> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://markusslima.github.io/bootstrap-filestyle/js/bootstrap-filestyle.min.js"> </script>


<div class="container">


	<div class="container text-center">
      <h3  class="text-info">INSTITUTO NACIONAL DE ESTADISTICA <small>-INE-</small></h3>  
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">Cargardor Generico</div>
      	<div class="panel-body" style="text-align: center;">


	    <form class="" action="" method="post" enctype="multipart/form-data">
	    	<div class="form-group">
	    		<label  for="tabla">Tabla:</label>
	    		<input type="text" name="tabla"  id="tabla" class="form-control" onblur="igualar()" required="required">
	    	</div>
	    	<div class="form-group">
	    		<label for="campoI">Campo I:</label>	
	    		<input type="text" name="campoI" value="codigo" class="form-control" required="required">
	    	</div>
	    	<div class="form-group">
	    		<label for="campoII">Campo II:</label>	
	    		<input type="text" name="campoII"  id="campoII" class="form-control" required="required">
	    	</div>
	    		<label for="Archivo">Archivo:</label>
	        	<input type="file" name="archivo" class="filestyle" data-btnClass="btn-primary" data-text="Seleccionar Archivo">

	        	<input type="submit" value="Enviar" class="btn btn-primary"/>
	    </form>

    	</div>
	</div>

</div>


<script>
function igualar() {
    var tabla = document.getElementById("tabla");
    var campoII = document.getElementById("campoII");
    campoII.value = tabla.value;
    
}
</script>