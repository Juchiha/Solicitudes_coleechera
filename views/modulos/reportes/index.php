<!-- Page Heading -->
<link href="views/assets/StartBoots/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  	<h1 class="h3 mb-0 text-gray-800">Generar filtros y Reportes</h1>
  	<?php 
  		if ($_SESSION['perfil'] == 1 || $_SESSION['perfil'] == 2) {	
	?>
  	<button class="btn btn-circle btn-default dropdown no-arrow" title="Opciones" 
  		data-toggle="dropdown" 
  		aria-haspopup="true" 
  		aria-expanded="true">
  		<i class="fas fa-ellipsis-v"></i>
  	</button>
  	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -104px, 0px);">
  		
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#">
        	Nueva Incidencia
    	</a>
    	<a class="dropdown-item" href="ajax/exportarExcel.ajax.php?descargarDatos=true">
        	Exportar Incidencias
    	</a>
    </div>
    <?php
		}
	?>
</div>
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
        	<!---Aqui tabla principal-->
       
        	<div class="row">
	        	<div class="col-md-3">
					<div class="form-group">
						<label for="sol_cli_correo_v">Equipo Informatico</label>
						<select class="form-control cliente" id="equipo"
						placeholder="Ciudad">
						<option value="0">Seleccione</option>
						<?php 
							$tecnicos = ControladorUtilidades::getDataFromLsql('usu_id_i, CONCAT(usu_nombre_v, \' \', usu_apellido_v) as nombres', 'sc_usuarios', 'usu_per_id_i = 4', null, 'ORDER BY usu_nombre_v ASC', null);
							foreach($tecnicos as $key => $value){
								echo '<option value="'.$value['usu_id_i'].'">'.$value['nombres'].'</option>';
							}
						?>
						</select>
					</div>
	    		</div>
	    		<div class="col-md-3">
					<div class="form-group">
						<label for="sol_cli_correo_v">Prioridad</label>
						<select class="form-control cliente" id="prioridad"
						placeholder="Ciudad">
						<option value="0">Seleccione</option>
						<?php 
							$prioridades = ControladorUtilidades::getData('sc_prioridades', null, null);
							foreach($prioridades as $key => $value){
								echo '<option value="'.$value['pri_id_i'].'">'.$value['pri_desc_v'].'</option>';
							}
						?>
						</select>
					</div>
	    		</div>

	    		<div class="col-md-3">
					<div class="form-group">
						<label for="sol_cli_correo_v">Estado</label>
						<select class="form-control cliente" id="estado"
						placeholder="Ciudad">
						<option value="0">Seleccione</option>
						<option value="1">Pendiente</option>
						<option value="2">Asignado</option>
						<option value="3">En curso</option>
						<option value="4">Solucionado</option>
						<option value="5">Cerrado sin Solución</option>
						</select>
					</div>
	    		</div>
	    		<div class="col-md-3">
					<div class="form-group">
						<label for="sol_tipo_soli">Tipo de Solicitud</label>
						<select class="form-control cliente" id="tipo_sol"
						placeholder="Ciudad">
						<option value="0">Seleccione</option>
						<?php 
							$bancos = ControladorUtilidades::getData('sc_tipo_solicitud', null, null);
							foreach($bancos as $key => $value){
								echo '<option value="'.$value['tipo_sol_id_i'].'">'.$value['tipo_desc_v'].'</option>';
							}
						?>
						</select>
					</div>
	    		</div>
	    	</div>
	    	<div class="row">
	    		<div class="col-md-3">
					<div class="form-group">
						<label for="">Orden de Trabajo</label>
						<input type="text" name="" id="otrabajo" class="form-control cliente" placeholder="Orden de Trabajo">
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label for="">Fecha inicio</label>
						<input type="text" name="" id="fromDate" class="form-control cliente" placeholder="Fecha inicio">
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label for="">Fecha final</label>
						<input type="text" name="" id="toDate" class="form-control cliente" placeholder="Fecha final">
					</div>
				</div>
			</div>
			
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" id="Exportar">Exportar</button>
			<button type="button" class="btn btn-primary" id="enviarFormNuevo">Ejecutar</button>
		</div>
	</div>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body" id="resultadoTabla">

        </div>
	</div>
<!-- nuevo usuario -->

</div>

<!--modal editar-->


<!-- Page level plugins -->
<script src="views/assets/StartBoots/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="views/assets/StartBoots/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="views/assets/StartBoots/vendor/datapicket/js/bootstrap-datepicker.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
<link href="views/assets/StartBoots/vendor/datapicket/css/bootstrap-datepicker.min.css">

<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>

<script type="text/javascript">
	$(function(){
		$.fn.datepicker.dates['es'] = {
		    days: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
		    daysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
		    daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
		    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
		    monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
		    today: "Today",
		    clear: "Clear",
		    format: "yyyy-mm-dd",
		    weekStart: 0
		};
		$("#fromDate").datepicker({
	        language: "es",
	        autoclose: true,
	        todayHighlight: true
	    }).on('changeDate', function (selected) {
	        $('#toDate').val('');
	        var minDate = new Date(selected.date.valueOf());
	        $('#toDate').datepicker('setStartDate', minDate);
	    });

	    $("#toDate").datepicker({
	        language: "es",
	        autoclose: true,
	        todayHighlight: true
	    });

	    $("#enviarFormNuevo").click(function () {
	    	$.ajax({
	            url: 'ajax/reporte.ajax.php',
	            type  : 'post',
	            data: { 
	            	equipo 		: $("#equipo").val(), 
	            	prioridad 	: $("#prioridad").val(), 
	            	estado 		: $("#estado").val(), 
	            	otrabajo 	: $("#otrabajo").val(), 
	            	fromDate 	: $("#fromDate").val(), 
	            	toDate 		: $("#toDate").val(), 
	            	tipo_sol    : $("#tipo_sol").val()
	            },
	            dataType : 'html',
	            beforeSend:function(){
	                $.blockUI({ 
	                    message : '<h3>Un momento por favor....</h3>',
	                    baseZ: 2000,
	                    css: { 
	                        border: 'none', 
	                        padding: '1px', 
	                        backgroundColor: '#000', 
	                        '-webkit-border-radius': '10px', 
	                        '-moz-border-radius': '10px', 
	                        opacity: .5, 
	                        color: '#fff' 
	                    } 
	                }); 
	            },
	            complete:function(){
	                $.unblockUI();
	            },
	            //una vez finalizado correctamente
	            success: function(data){
	            	$("#resultadoTabla").html(data);	            	
	            },
	            //si ha ocurrido un error
	            error: function(){
	                alertify.error('Error al realizar el proceso');
	            }
	        });
	    });

	    $("#Exportar").click(function () {
	    	$.ajax({
	            url: 'ajax/reporteExcel.ajax.php',
	            type  : 'post',
	            data: { 
	            	equipo 		: $("#equipo").val(), 
	            	prioridad 	: $("#prioridad").val(), 
	            	estado 		: $("#estado").val(), 
	            	otrabajo 	: $("#otrabajo").val(), 
	            	fromDate 	: $("#fromDate").val(), 
	            	toDate 		: $("#toDate").val(), 
	            	tipo_sol    : $("#tipo_sol").val()
	            },
	            dataType : 'json',
	            beforeSend:function(){
	                $.blockUI({ 
	                    message : '<h3>Un momento por favor....</h3>',
	                    baseZ: 2000,
	                    css: { 
	                        border: 'none', 
	                        padding: '1px', 
	                        backgroundColor: '#000', 
	                        '-webkit-border-radius': '10px', 
	                        '-moz-border-radius': '10px', 
	                        opacity: .5, 
	                        color: '#fff' 
	                    } 
	                }); 
	            },
	            complete:function(){
	                $.unblockUI();
	            },
	            //una vez finalizado correctamente
	            success: function(data){
	            	var currentdate = new Date();
	                var fecha_hora = currentdate.getFullYear() + rellenar((currentdate.getMonth()+1), 2) +  rellenar(currentdate.getDate(), 2) + "_" + rellenar(currentdate.getHours(), 2) +  rellenar(currentdate.getMinutes(), 2) + rellenar(currentdate.getSeconds(), 2);
	                var $a = $("<a>");
	                $a.attr("href",data.file);
	                $("body").append($a);
	                $a.attr("download","consolidado_casos_reportados"+fecha_hora+".xlsx");
	                $a[0].click();
	                $a.remove();            	
	            },
	            //si ha ocurrido un error
	            error: function(){
	                alertify.error('Error al realizar el proceso');
	            }
	        });
	    });

	})

	function rellenar (str, max) {
        str = str.toString();
        return str.length < max ? rellenar("0" + str, max) : str;
    }
</script>
