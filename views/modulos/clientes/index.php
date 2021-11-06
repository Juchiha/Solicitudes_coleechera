<!-- Page Heading -->
<?php 

?>
<link href="views/assets/StartBoots/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  	<h1 class="h3 mb-0 text-gray-800">Registrar Clientes</h1>

  	<!--<a href="#" data-toggle="modal" data-target="#modalEmpresaNueva" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    	<i class="fas fa-plus fa-sm text-white-50"></i> 
    	Nuevo Cargue
  	</a>-->
  	<?php 
  		if ($_SESSION['perf_add_i']==1) {	
  	?>
  	<button class="btn btn-circle btn-default dropdown no-arrow" title="Opciones" 
  		data-toggle="dropdown" 
  		aria-haspopup="true" 
  		aria-expanded="true">
  		<i class="fas fa-ellipsis-v"></i>
  	</button>
  	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -104px, 0px);">
       <!-- <a class="dropdown-item eliminarDoc" href="#" data-toggle="modal" data-target="#modalCarpetaNueva">
        Nueva Carpeta-->
    	</a>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalIngresarClientes">
        	Ingresar Colaborador
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
            <h6 class="m-0 font-weight-bold text-primary">Datos de los Colaboradoress</h6>
        </div>
        <div class="card-body">
        	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 12%;">Identificacion</th>
                        <th style="width: 36%">Nombre Clientes</th>
                        <th style="width: 12%;"># Empleado</th>
                        <th style="width: 30%;">Area</th>
                        <th style="width: 10%;"></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                         <th style="width: 12%;">Identificacion</th>
                        <th style="width: 36%">Nombre Clientes</th>
                        <th style="width: 12%;"># Empleado</th>
                        <th style="width: 30%;">Area</th>
                        <th style="width: 10%;"></th>
                    </tr>
                   
                </tfoot>
           	</table>
        </div>
    </div>
</div>

<!-- nuevo usuario -->
<div class="modal" tabindex="-1" role="dialog" id="modalIngresarClientes">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form id="nuevoCliente" autocomplete="off" method="post" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title">Nuevo Colaborador</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				  	<div class="card shadow mb-4">
				        <div class="card-header py-3">
				            <h6 class="m-0 font-weight-bold text-primary">Datos del Colaborador</h6>
				        </div>
        				<div class="card-body">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_identificacion_v_i">Identificación</label>
										<input type="text" name="cli_identificacion_v_i" id="cli_identificacion_v_i" class="form-control" placeholder="Identificación">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_nombres_i">Nombre Completo</label>
										<input type="text" name="cli_nombres_i"  id="cli_nombres_i" class="form-control cliente" placeholder="Nombre Completo">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_fecha_ingreso_d_i">Fecha de Ingreso</label>
										<input type="text"  name="cli_fecha_ingreso_d_i" id="cli_fecha_ingreso_d_i" class="form-control cliente fecha" placeholder="YYYY-MM-DD">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_numero_empleado_v_i">Numero de Empleado</label>
										<input type="text"  name="cli_numero_empleado_v_i" id="cli_numero_empleado_v_i" class="form-control cliente" placeholder="Numero de Empleado">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_usuario_red_v_i">Usuario de Red</label>
										<input type="text"  name="cli_usuario_red_v_i" id="cli_usuario_red_v_i" class="form-control cliente" placeholder="Usuario de Red">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_usuario_sap_v_i">Usuario de SAP</label>
										<input type="text"  name="cli_usuario_sap_v_i" id="cli_usuario_sap_v_i" class="form-control cliente" placeholder="Usuario de SAP">
									</div>
									</div>
							
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_cargo_v_i">Nombre del Cargo</label>
										<input type="text"  name="cli_cargo_v_i" id="cli_cargo_v_i" class="form-control cliente" placeholder="Nombre del Cargo">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_area_i_i">Area/Dirección</label>
										<select class="form-control cliente"  id="cli_area_i_i" name="cli_area_i_i" placeholder="Area/Dirección">
											<?php 
												$bancos = ControladorUtilidades::getData('sc_areas_cool', null, null);
												foreach($bancos as $key => $value){
													echo '<option value="'.$value['are_id_i'].'">'.$value['are_desc_v'].'</option>';
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_planta_id_i_i">Planta/Sucursal</label>
										<select class="form-control cliente"  id="cli_planta_id_i_i" name="cli_planta_id_i_i" placeholder="Ciudad">
											<option value="0">Seleccione</option>
											<?php 
												$bancos = ControladorUtilidades::getData('sc_oficinas', null, null);
												foreach($bancos as $key => $value){
													echo '<option value="'.$value['ofi_id_i'].'">'.$value['ofi_direccion_v'].'</option>';
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="enviarFormNuevo">Guardar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
			</form>
		</div>
	</div>
</div>
					

<!--edicion de bancos-->

<div class="modal" tabindex="-1" role="dialog" id="modalEditarClientesXaver">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form id="editarCliente" autocomplete="off" method="post" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title">Editar Colaborador</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				  	<div class="card shadow mb-4">
				        <div class="card-header py-3">
				            <h6 class="m-0 font-weight-bold text-primary">Datos del Colaborador</h6>
				        </div>
        				<div class="card-body">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_identificacion_v_e">Identificación</label>
										<input type="text" name="cli_identificacion_v_e" readonly="true" id="cli_identificacion_v_e" class="form-control" placeholder="Identificación">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_nombres_e">Nombre Completo</label>
										<input type="text" name="cli_nombres_e"  id="cli_nombres_e" class="form-control cliente" placeholder="Nombre Completo">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_fecha_ingreso_d_e">Fecha de Ingreso</label>
										<input type="text"  name="cli_fecha_ingreso_d_e" id="cli_fecha_ingreso_d_e" class="form-control cliente fecha" placeholder="YYYY-MM-DD">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_numero_empleado_v_e">Numero de Empleado</label>
										<input type="text"  name="cli_numero_empleado_v_e" id="cli_numero_empleado_v_e" class="form-control cliente" placeholder="Numero de Empleado">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_usuario_red_v_e">Usuario de Red</label>
										<input type="text"  name="cli_usuario_red_v_e" id="cli_usuario_red_v_e" class="form-control cliente" placeholder="Usuario de Red">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_usuario_sap_v_e">Usuario de SAP</label>
										<input type="text"  name="cli_usuario_sap_v_e" id="cli_usuario_sap_v_e" class="form-control cliente" placeholder="Usuario de SAP">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_cargo_v_e">Nombre del Cargo</label>
										<input type="text"  name="cli_cargo_v_e" id="cli_cargo_v_e" class="form-control cliente" placeholder="Nombre del Cargo">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_area_i_e">Area/Dirección</label>
										<select class="form-control cliente"  id="cli_area_i_e" name="cli_area_i_e" placeholder="Area/Dirección">
											<?php 
												$bancos = ControladorUtilidades::getData('sc_areas_cool', null, null);
												foreach($bancos as $key => $value){
													echo '<option value="'.$value['are_id_i'].'">'.$value['are_desc_v'].'</option>';
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_planta_id_i_e">Planta/Sucursal</label>
										<select class="form-control cliente"  id="cli_planta_id_i_e" name="cli_planta_id_i_e" placeholder="Ciudad">
											<option value="0">Seleccione</option>
											<?php 
												$bancos = ControladorUtilidades::getData('sc_oficinas', null, null);
												foreach($bancos as $key => $value){
													echo '<option value="'.$value['ofi_id_i'].'">'.$value['ofi_direccion_v'].'</option>';
												}
											?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>
				<div class="modal-footer">
					<input type="hidden" name="cli_id_i_e" id="cli_id_i_e" value="0">
					<button type="button" class="btn btn-primary" id="btnActualizarUsuarios">Guardar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- nueva Carpeta -->


<!-- Page level plugins -->
<script src="views/assets/StartBoots/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="views/assets/StartBoots/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">
	Clientes = {
		insertClientes:function(dataTableEmpresas){
			var FormInsert = new FormData($("#nuevoCliente")[0]);
	        $.ajax({
	            url: 'ajax/clientes.ajax.php',
	            type  : 'post',
	            data: FormInsert,
	            dataType : 'json',
	            cache: false,
	            contentType: false,
	            processData: false,
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
	                if(data.code == 0){
	                    alertify.error('Proceso terminado, '+data.message);
	                }else{
	                    alertify.success('Proceso terminado, '+data.message);
	                }
	                dataTableEmpresas.ajax.reload();
	                $("#nuevoCliente")[0].reset();
	                $("#modalIngresarClientes").modal('hide');
	            },
	            //si ha ocurrido un error
	            error: function(){
	                alertify.error('Error al realizar el proceso');
	            }
	        });
		},

		updateClientes:function(dataTableEmpresas){
			var FormUpdate = new FormData($("#editarCliente")[0]);
	        $.ajax({
	            url: 'ajax/clientes.ajax.php',
	            type  : 'post',
	            data: FormUpdate,
	            dataType : 'json',
	            cache: false,
	            contentType: false,
	            processData: false,
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
	                if(data.code == 0){
	                    alertify.error('Proceso terminado, '+data.desc);
	                }else{
	                    alertify.success('Proceso terminado, '+data.desc);
	                }
	                dataTableEmpresas.ajax.reload();
	                $("#editarCliente")[0].reset();
	                $("#modalEditarClientesXaver").modal('hide');
	            },
	            //si ha ocurrido un error
	            error: function(){
	                alertify.error('Error al realizar el proceso');
	            }
	        });
		},

		deleteClientes:function(idBancos, dataTableEmpresas){
			$.ajax({
	            url: 'ajax/clientes.ajax.php',
	            type  : 'post',
	            data: { cli_id_del : idBancos},
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
	                if(data.code == 0){
	                    alertify.error('Proceso terminado, '+data.message);
	                }else{
	                    alertify.success('Proceso terminado, '+data.message);
	                }
	                dataTableEmpresas.ajax.reload();
	            },
	            //si ha ocurrido un error
	            error: function(){
	                alertify.error('Error al realizar el proceso');
	            }
	        });
		},

		getClientes:function(idBancos){
			$.ajax({
	            url: 'ajax/clientes.ajax.php',
	            type  : 'post',
	            data: { ban_id_i_g : idBancos},
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
	            	if(data != false){
	            		$("#cli_nombres_e").val(data.cli_nombre_v);
		                $("#cli_numero_empleado_v_e").val(data.cli_numero_empleado_v);
		                $("#cli_area_i_e").val(data.cli_area_i)
		                $("#cli_id_i_e").val(data.cli_id_i);
		                $("#cli_identificacion_v_e").val(data.cli_documento_v);
		                $("#cli_fecha_ingreso_d_e").val(data.cli_fecha_ingreso_d);
		                $("#cli_identificacion_v_e").val(data.cli_documento_v);
		                $("#cli_usuario_red_v_e").val(data.cli_usuario_red_v);
		                $("#cli_usuario_sap_v_e").val(data.cli_usuario_sap_v);
		                $("#cli_cargo_v_e").val(data.cli_cargo_v);
		                $("#cli_usuario_red_v_e").val(data.cli_usuario_red_v);
		                $("#cli_planta_id_i_e").val(data.cli_planta_id_i)
	            	}
	            },
	            //si ha ocurrido un error
	            error: function(){
	                alertify.error('Error al realizar el proceso');
	            }
	        });
		},

		getDatosSucursales:function(banco, sucursal, editar = 0){
			$.ajax({
	            url: 'ajax/bancos.ajax.php',
	            type  : 'post',
	            data: { getDatosByBanco : banco},
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
	            	var option = "<option value='0'> Seleccione </option>";
	               	$.each(data, function(item, i){
	               		option += "<option value='"+i.suc_id_id+"'> "+i.suc_nombre_v+" </option>";
	               	});	  
	               	if(editar == '0'){
	               		$("#sol_suc_id_i_i").html(option); 	
	               	}else{
	               		$("#sol_suc_id_i_e").html(option); 
	               		if(bancos != 0){
		               		$("#sol_suc_id_i_e").val(bancos);
		               	} 
	               	} 
	        
	            },
	            //si ha ocurrido un error
	            error: function(){
	                alertify.error('Error al realizar el proceso');
	            }
	        });
		}
		
	}

	$(function(){

		let edicion = '<div class="btn-group">';
        edicion += '<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
        edicion += '<i class="fa fa-info-circle"></i>';
        edicion += '<span class="sr-only">Toggle Dropdown</span>';
        edicion += '</button>';
        edicion += '<ul class="dropdown-menu" role="menu">';
     	<?php 
  			if ($_SESSION['perf_upd_i'] == 1) {		
  		?>
        edicion += '<li><a class="dropdown-item btnActualUsuarios" title="Editar" id_bancos data-toggle="modal" data-target="#modalEditarClientesXaver" href="#">EDITAR</a></li>';
        edicion += '<li class="divider"></li>';
        <?php
        	}
  			if ($_SESSION['perf_del_i'] == 1) {	
  		?>
        edicion += '<li><a class="dropdown-item btnEliminarUsuarios" title="Eliminar" id_bancos href="#">ELIMINAR</a></li>';
        edicion += '<li class="divider"></li>';
        <?php
        	}
    	?>
     	edicion += '</ul>';
    	edicion += '</div>';

		var dataTableEmpresas = $('#dataTable').DataTable({
		    "ajax": 'ajax/clientes.ajax.php?allDatos=true',
		    "columnDefs": [
		        {
	        	 	"targets": -1,
            		"data": null,
        			"className": "text-center",
            		 render: {
                		display: function (data, type, row) {
                         	return edicion;
                		}
                	}
		        }
	        ],
	    	"language" : {
		        "sProcessing":     "Procesando...",
		        "sLengthMenu":     "Mostrar _MENU_ registros",
		        "sZeroRecords":    "No se encontraron resultados",
		        "sEmptyTable":     "Ningún dato disponible en esta tabla",
		        "sInfo":           "Mostrando de _START_ a _END_ de _TOTAL_",
		        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		        "sInfoPostFix":    "",
		        "sSearch":         "Buscar:",
		        "sUrl":            "",
		        "sInfoThousands":  ",",
		        "sLoadingRecords": "Cargando...",
		        "oPaginate": {
		            "sFirst":    "Primero",
		            "sLast":     "Último",
		            "sNext":     "Siguiente",
		            "sPrevious": "Anterior"
		        },
		        "oAria": {
		            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
		        }
		    }
		});

		$('#dataTable tbody').on( 'click', 'a', function () {
		    var data = dataTableEmpresas.row( $(this).parents('tr') ).data();
		    $(this).attr("id_bancos", data[4]);
		});

		/* Esta parte es para traer los datos de la edicion */
	    $('#dataTable tbody').on("click", ".btnActualUsuarios", function(){
	        var x = $(this).attr('id_bancos');
	       	Clientes.getClientes(x);
	    });

		/*Activar funcionalidad de boton eliminar*/
	    $('#dataTable tbody').on("click", ".btnEliminarUsuarios", function(){
	        var x = $(this).attr('id_bancos');
			swal({
	            title: '¿Está seguro de borrar el banco?',
	            text: "¡Si no lo está puede cancelar la accíón!",
	            type: 'warning',
	            showCancelButton: true,
	            confirmButtonColor: '#3085d6',
	            cancelButtonColor: '#d33',
	            cancelButtonText: 'Cancelar',
	            confirmButtonText: 'Si, Eliminar Registro!'
	        },function(isConfirm) {
	            if (isConfirm) {
					Clientes.deleteClientes(x,dataTableEmpresas);
				}
			});			
	    });


		$("#enviarFormNuevo").click(function(){
			Clientes.insertClientes(dataTableEmpresas);
		});

		$("#btnActualizarUsuarios").click(function(){
			Clientes.updateClientes(dataTableEmpresas);
		});

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

		$(".fecha").datepicker({
	        language: "es",
	        autoclose: true,
	        todayHighlight: true
	    });


	    /*Para capturar la cedula y validarla*/
		$("#cli_identificacion_v_i").on('change', function(){
			var cedula = $(this).val();
            var datos = new FormData();
            datos.append('cedulaCliente', cedula);
            $.ajax({
                url   : 'ajax/clientes.ajax.php',
                method: 'post',
                data  : datos,
                cache : false,
                contentType : false,
                processData : false,
                dataType    : 'json',
                success     : function(respuesta){
                    if(respuesta != false){
                       /*El cliente existe*/ 
                       alertify.error("Colaborador registrado");
                       $("#cli_identificacion_v_i").val('');
                    }
                },
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
            });
		});

		/*Para capturar el usuario sap y validarlo*/
		$("#cli_usuario_sap_v_i").on('change', function(){
			var cedula = $(this).val();
            var datos = new FormData();
            datos.append('cli_usuario_sap_v_i_vL', cedula);
            $.ajax({
                url   : 'ajax/clientes.ajax.php',
                method: 'post',
                data  : datos,
                cache : false,
                contentType : false,
                processData : false,
                dataType    : 'json',
                success     : function(respuesta){
                    if(respuesta != false){
                       /*El cliente existe*/ 
                       alertify.error("El usuario de SAP ya esta Asignado");
                       $("#cli_usuario_sap_v_i").val('');
                    }
                },
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
            });
		});
	});
</script>
