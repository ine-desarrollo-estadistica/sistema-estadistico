	<?php //$this->load->view('header_facturacion'); ?>
	<meta charset='UTF-8' />
	<title>INE - Censo de Recurso Humano</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>theme/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>theme/css/datepicker/datepicker3.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>theme/css/daterangepicker/daterangepicker-bs3.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>theme/css/datatables/dataTables.bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>theme/css/menu.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>theme/font-awesome/css/font-awesome.min.css" />
	
	<script type="text/javascript" src="<?php echo base_url();  ?>theme/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();  ?>theme/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();  ?>theme/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="<?php echo base_url();  ?>theme/js/dataTables.bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url();  ?>theme/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url();  ?>theme/js/daterangepicker.js"></script>
	<div class="container">
		<?php echo form_open("/asignacion_dispositivo/agregar", array('class' => 'form-horizontal')) ?>
			
			<input type="hidden" id="hfidasig" name="hfidasig" value="0">
			
			<div class="form-group">
				<input type="hidden" id="hfiddis" name="hfiddis" value="0">
				<div class="col-sm-2 text-right">
					<label for="tablet">Tablet</label>
				</div>
				<div class="col-sm-10 input-group">
					<span id="spanTablet" class="input-group-addon"><i class="glyphicon glyphicon-phone" required="autofocus"></i></span>
					<input id="idTablet" type="text" class="form-control" disabled name="tablet" placeholder="Elegir tablet">
				</div>
				<br />
				<input type="hidden" id="hfperid" name="hfperid" value="0">
				<div class="col-sm-2 text-right">
					<label for="nombrePersona">Persona</label>
				</div>
				<div class="col-sm-10 input-group">
					<span id="spanPersona" class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input id="idPersona" type="text" class="form-control" disabled name="nombrePersona" placeholder="Elegir persona">
				</div>
				<br />
				<div class="col-sm-2 text-right">
					<label for="comentarios">Comentarios</label>
				</div>
				<div class="col-sm-10 input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
					<textarea id="idComentarios" name="comentarios" class="form-control" rows="5" required="autofocus" placeholder="Comentarios" ></textarea>
				</div>
				<br />
				<div class="col-sm-2">
				</div>
				<div class="col-sm-10 input-group">
					<?php
						$clase_css = 'class="btn btn-default btn-lg"';
						echo form_submit('','Agregar',$clase_css); 
					?>
				</div>
			</div>
		<?php echo form_close() ?>
	</div>
	
	<div class="container">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row-fluid">
						<table id="tblDispositivos" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>Código tablet</th>
									<th>Estado tablet</th>
									<th>Código empadronador</th>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Teléfono</th>
									<th>Fecha</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php

									if (isset($asignaciones) && $asignaciones != '') {
										$asignaciones = json_decode($asignaciones, true);
										foreach ($asignaciones as $row ) {
								?>
								<tr>
									<td><?php echo $row['codigo_tablet'] ?></td>
									<td><?php if ($row['estado'] == 0) echo 'NO Entregada'; else echo 'Entregada'; ?></td>
									<td><?php echo $row['dpi'] ?></td>
									<td><?php echo $row['pnombre'] ?></td>
									<td><?php echo $row['papellido'] ?></td>
									<td><?php echo $row['telefono'] ?></td>
									<td><?php echo $row['fecha'] ?></td>
									<td class="dt-center">
										<a href="#" title="Cambiar estado" onclick="location.href='<?php echo base_url(); ?>index.php/asignacion_dispositivo/cambiarEstado/<?php echo $row['id_asignacion']; ?>'">
											Editar<i class="fa fa-exchange" aria-hidden="true"></i>
										</a>
									</td>
									<td class="dt-center">
										<a href="#" title="Eliminar registro" onclick="location.href='<?php echo base_url(); ?>index.php/asignacion_dispositivo/eliminarAsignacion/<?php echo $row['id_asignacion']; ?>'">
											Eliminar<i class="fa fa-eraser" aria-hidden="true"></i>
										</a>
									</td>
								</tr>
								<?php  } } ?>
							</tbody>
							<tfoot>
								<tr>
									<th>Código tablet</th>
									<th>Estado tablet</th>
									<th>Código empadronador</th>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Teléfono</th>
									<th>Fecha</th>
									<th></th>
									<th></th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	
	<?php //$this->load->view('footer'); ?>
	
	<div class="modal fade" id="modalTablet" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Listado de dispositivos</h4>
				</div>
				<div class="modal-body">
					<form>
						<div class="row-fluid">
							<div class="col-sm-6 input-group text-right">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-map-marker"></i>
								</span>
							  <input type="text" id="idBuscarTablet" name="BuscarTablet" class="form-control" placeholder="Buscar por codigo...">
							</div>
						</div>
					</form>

					<br />
					<div id="idTblTablets" class="row-fluid">
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="modalPersona" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Listado de personas</h4>
				</div>
				<div class="modal-body">
					<form>
						<div class="row-fluid">
							<div class="col-sm-6 input-group text-right">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-map-marker"></i>
								</span>
							  <input type="text" id="idBuscarPersona" name="BuscarPersona" class="form-control" placeholder="Buscar por nombre...">
							</div>
						</div>
					</form>

					<br />
					<div id="idTblPersonas" class="row-fluid">
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
		$(document).ready(function() {
			//$(":input").inputmask();
			
			$('#tblDispositivos').DataTable( {
				"language": {
								"lengthMenu": "Mostrar _MENU_ registros por página",
								"zeroRecords": "No se encontraron registros - disculpas",
								"info": "Página _PAGE_ de _PAGES_",
								"infoEmpty": "No existen registros",
								"infoFiltered": "(Filtrados de _MAX_ registros en total)"
							},
				"paging": true,
				"lengthChange": true,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": true
			} );
			
			$( "#spanTablet" ).click(function() {
				$('#modalTablet').modal('show');
			});
			
			$( "#spanPersona" ).click(function() {
				$('#modalPersona').modal('show');
			});
			
			$("#idBuscarTablet").keyup(function(){
				valor = $("#idBuscarTablet").val();
				mostrarTablet(valor);
			});
			
			$("#idBuscarPersona").keyup(function(){
				valor = $("#idBuscarPersona").val();
				mostrarPersona(valor);
			});
		});
		
		function limpiarDatos(){
			document.getElementById("idBuscarPersona").value = "";
			document.getElementById("idBuscarTablet").value = "";
		}
		
		function recibirDatosTablet(id, nombre){
			$('#modalTablet').modal('hide');
			limpiarDatos();
			document.getElementById("idTablet").value = nombre;
			document.getElementById("hfiddis").value = id;
		}
		
		function recibirDatosPersona(id, nombre){
			$('#modalPersona').modal('hide');
			limpiarDatos();
			document.getElementById("idPersona").value = nombre;
			document.getElementById("hfperid").value = id;
			alert('persona ' + document.getElementById("hfperid").value);
		}
		
		function mostrarTablet(valor){
			$.ajax({
				url: '<?php echo base_url().'index.php/dispositivo/listadoDispositivos';?>',
				type:'POST',
				dataType: 'json',
				data: {valorBuscado:valor},
				success: function(output_string){
					var output_string = eval(output_string);
					html = "<table class='table table-responsive table-bordered'><thead>";
					html += "<tr><th>Código</th><th>No. Serie</th><th></th></tr>";
					html += "</thead><tbody>";
					
					for (var i = 0; i < output_string.length; i++){
						html += '<tr><td>'+output_string[i]['codigo']+
								'</td><td>'+output_string[i]["no_serie"]+
								'</td><td><a href="#" title="Seleccionar tablet" onclick="recibirDatosTablet(' + 
								output_string[i]["id_tablet"] + ',\''+ 
								output_string[i]["codigo"]+' - '+
								output_string[i]["no_serie"]+'\')"><i class="fa fa-check-square-o" aria-hidden="true"></i>Seleccionar</a></td></tr>';
					};
					
					html += "</tbody></table>";
					
					$("#idTblTablets").html(html);
					
				}, // End of success function of ajax form
				error: function(data){
					alert('Se produjo un error al recuperar los datos!!');
				}
			});
		}
		
		function mostrarPersona(valor){
			$.ajax({
				url: '<?php echo base_url().'index.php/dispositivo/listadoPersonas';?>',
				type:'POST',
				dataType: 'json',
				data: {valorBuscado:valor},
				success: function(output_string){
					var output_string = eval(output_string);
					html = "<table class='table table-responsive table-bordered'><thead>";
					html += "<tr><th>Código</th><th>Persona</th><th></th></tr>";
					html += "</thead><tbody>";

					for (var i = 0; i < output_string.length; i++){
						html += '<tr><td>'+output_string[i]['dpi'] +
									'</td><td>'+output_string[i]["pnombre"]+ ' ' + output_string[i]["papellido"] +
									'</td><td><a href="#" title="Seleccionar persona" onclick="recibirDatosPersona(' + 
										output_string[i]["id_persona"] + ',\''+ 
										output_string[i]["pnombre"]+' '+
										output_string[i]["papellido"]+'\')"><i class="fa fa-check-square-o" aria-hidden="true"></i>Seleccionar</a></td></tr>';
					};
					
					html += "</tbody></table>";
					
					$("#idTblPersonas").html(html);
					
				}, // End of success function of ajax form
				error: function(data){
					alert('Se produjo un error al recuperar los datos!!');
				}
			});
		}
	</script>
	
</body>
</html>