<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css">
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js">

	</script>
	<script type="text/javascript" class="init">
		$(document).ready(function() {
			$('#maestros').DataTable(
				{
				    language: {
				        processing:     "Procesando...",
				        search:         "Buscar&nbsp;:",
				        lengthMenu:     "",
				        info:           "Del registro _START_ al _END_ de _TOTAL_ Registros",
				        infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
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
				        },
				        aria: {
				            sortAscending:  ": activer pour trier la colonne par ordre croissant",
				            sortDescending: ": activer pour trier la colonne par ordre décroissant"
				        }
				    }
				}
			);

		} );

	</script>

	<style>
	.menuCSS3 ul {
		display: flex;
		padding: 0;
		margin: 0;
		list-style: none;
	}
	.menuCSS3 a {
		display: block;
		padding: 0.30em;
		background-color: #337ab7;
		text-decoration: none;
		color: white;
	}
	.menuCSS3 a:hover {
		background-color: lightblue;
	}
	.menuCSS3 ul li ul {
		display: none;
	}
	.menuCSS3 ul li a:hover + ul, .menuCSS3 ul li ul:hover {
		display: block;
	}
	</style>

	<script type="text/javascript">
        function editar(idCodigo , idSerie, idPin, idChip, idPuk, id) {
        	document.getElementById("idCodigo").value = idCodigo;
        	document.getElementById("idSerie").value = idSerie;
        	document.getElementById("idPin").value = idPin;
        	document.getElementById("idChip").value = idChip;
        	document.getElementById("idPuk").value = idPuk;
        	document.getElementById("hfiddis").value = id;
        	$("[name=enviar]").val("Editar");
        	$('#idCodigo').attr('readonly', true);
            }

        function nuevo() {
        	document.getElementById("idCodigo").value = "";
        	document.getElementById("idSerie").value = "";
        	document.getElementById("idPin").value = 0;
        	document.getElementById("idChip").value = 0;
        	document.getElementById("idPuk").value = 0;
        	document.getElementById("hfiddis").value = 0;
        	$("[name=enviar]").val("Agregar");
        	$('#idCodigo').attr('readonly', false);
            }

        	function objetoAjax(){
		var xmlhttp = false;
		try {
			xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
 
			try {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (E) {
				xmlhttp = false; }
		}
 
		if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		  xmlhttp = new XMLHttpRequest();
		}
		return xmlhttp;
	}
	
	function enviarDatos(){
 
        //Recogemos los valores introducimos en los campos de texto
		/*codigo = document.formulario.equipo.value;
		serie = document.formulario.dorsal.value;*/

		codigo = document.getElementById("idCodigo").value;
        serie = document.getElementById("idSerie").value;
        pin = document.getElementById("idPin").value;
        chip = document.getElementById("idChip").value;
        puk = document.getElementById("idPuk").value;
        id = document.getElementById("hfiddis").value;
 
         //Aquí será donde se mostrará el resultado
 
		//instanciamos el objetoAjax
		ajax = objetoAjax();
 
		//Abrimos una conexión AJAX pasando como parámetros el método de envío, y el archivo que realizará las operaciones deseadas
		ajax.open("POST", "dispositivo/agregar", true);
 
		//cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
		ajax.onreadystatechange = function() {
 
             //Cuando se completa la petición, mostrará los resultados 
			if (ajax.readyState == 4){
 
				//El método responseText() contiene el texto de nuestro 'consultar.php'. Por ejemplo, cualquier texto que mostremos por un 'echo' 
			}
		} 
 
		//Llamamos al método setRequestHeader indicando que los datos a enviarse están codificados como un formulario. 
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
 
		//enviamos las variables a 'consulta.php' 
		ajax.send("&hfiddis="+id+"&codigo="+codigo+"&serie="+serie+"&pin="+pin+"&chip="+chip+"&puk="+puk);
		nuevo(); 
 
} 

	function listarDispositivos(str) {
                //document.getElementById("InfoPersona").innerHTML = '<div class="loader"></div>';
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("tablita").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "infopersona/" + str, true);
                xmlhttp.send();
        }
    </script>
     	

	</script>

<div class="container">
		<?php echo form_open("/dispositivo/agregar/", array('class' => 'form-horizontal')) ?>
			
			<input type="hidden" id="hfiddis" name="hfiddis" value="0">			
			<div class="container text-center">
				<h4  class="text-info">Censo Nacional del Recurso Humano </h4> 
				<h3  class="text-info">Dispositivos</h3> 
			</div>
			
			<div class="form-group">
				<div class="col-sm-2 text-right">
					<label for="codigo">Código</label>
				</div>
				<div class="col-sm-10 input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-qrcode"></i></span>
					<input id="idCodigo" type="number" class="form-control" name="codigo" placeholder="Código del dispositivo" required="autofocus">
				</div>
				<br />
				<div class="col-sm-2 text-right">
					<label for="serie">No. Serie</label>
				</div>
				<div class="col-sm-10 input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
					<input id="idSerie" type="text" class="form-control" name="serie" placeholder="Número de serie del dispositivo" required="autofocus">
				</div>
				<br />
				<div class="col-sm-2 text-right">
					<label for="pin">PIN</label>
				</div>
				<div class="col-sm-10 input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
					<input id="idPin" type="number" class="form-control" name="pin" placeholder="PIN del chip" value="0">
				</div>
				<br />
				<div class="col-sm-2 text-right">
					<label for="chip">No. CHIP</label>
				</div>
				<div class="col-sm-10 input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
					<input id="idChip" type="number" class="form-control" name="chip" placeholder="Número de chip" value="0">
				</div>
				<br />
				<div class="col-sm-2 text-right">
					<label for="puk">PUK</label>
				</div>
				<div class="col-sm-10 input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
					<input id="idPuk" type="number" class="form-control" name="puk" placeholder="Número PUK del chip" value="0">
				</div>
				<br />
				<div class="col-sm-2">
				</div>
				<div class="col-sm-10 input-group">
					<?php
						$clase_css = 'class="btn btn-default btn-lg"';
						echo form_submit('enviar','Agregar',$clase_css); 				
					?>
					<!--<input type="button" name="enviar" value="Agregar" class="btn btn-default btn-lg" onclick= "enviarDatos();">-->
					<button type="button" class="btn btn-default btn-lg" onclick='nuevo();'>Nuevo</button>
				</div>
			</div>
		<?php echo form_close() ?>

<span id = "tablita">
<h4>Se puede realizar busquedas por codigo, numero de serie...:</h4>

<table id="maestros" class="table table-striped table-bordered" >
	<thead>
		<tr>
			<th>Código</th>
									<th>No. Serie</th>
									<th>PIN</th>
									<th>No. CHIP</th>
									<th>PUK</th>
									<th>Acciones</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>Código</th>
									<th>No. Serie</th>
									<th>PIN</th>
									<th>No. CHIP</th>
									<th>PUK</th>
									<th>Acciones</th>
		</tr>
	</tfoot>
	<tbody>
		<?php
								//print_r($dispositivos);
								$dispositivos = json_decode($dispositivos, true);
								//print_r($dispositivos);
									/*if (isset($dispositivos) && $dispositivos != '') {*/
									foreach ($dispositivos as $row ) { 
								?>
								<tr>
									<td><?php echo $row['codigo']; ?></td>
									<td><?php echo $row['no_serie']; ?></td>
									<td><?php echo $row['no_pin']; ?></td>
									<td><?php echo $row['no_chip']; ?></td>
									<td><?php echo $row['no_puk']; ?></td>
									<td class="dt-center">
									<nav class="menuCSS3">
										<ul>
											<li><a href="#">Acciones</i></a>
												<ul>
													<li><a href="#" title="Eliminar registro" onclick="location.href='/CensoRRHHC/index.php/dispositivo/eliminarDispositivo/<?php echo $row['id_tablet']; ?>'">
																			Eliminar <i class="fa fa-eraser" aria-hidden="true"></i>
																		</a></li>
													<li><a href="#" title="Editar registro" onclick="editar('<?php echo $row['codigo']; ?>','<?php echo $row['no_serie']; ?>','<?php echo $row['no_pin']; ?>','<?php echo $row['no_chip']; ?>','<?php echo $row['no_puk']; ?>','<?php echo $row['id_tablet']; ?>')">
																			Editar <i class="fa fa-eraser" aria-hidden="true"></i>
																		</a></li>
												</ul>
											</li>
										</ul>
									</nav>
										
									</td>
								</tr>
								<?php  } ?>
	</tbody>
</table>
</span>



</div>