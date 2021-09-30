<!-- Page Heading -->
<?php 

?>
<link href="views/assets/StartBoots/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  	<h1 class="h3 mb-0 text-gray-800">Registrar Sucursales</h1>

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
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalIngresarSucursales">
        	Ingresar Sucursales
    	</a>
    </div>
	}
</div>
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Datos de las sucursales</h6>
        </div>
        <div class="card-body">
        	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 18%;">Banco</th>
                        <th style="width: 18%;">Nombre</th>
                        <th style="width: 18%">Codigo</th>
                        <th style="width: 18%;">Ciudad</th>
                        <th style="width: 18%;">Dirección</th>
                        <th style="width: 10%;"></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th style="width: 18%;">Banco</th>
                        <th style="width: 18%;">Nombre</th>
                        <th style="width: 18%">Codigo</th>
                        <th style="width: 18%;">Ciudad</th>
                        <th style="width: 18%;">Dirección</th>
                        <th style="width: 10%;"></th>
                    </tr>
                </tfoot>
           	</table>
        </div>
    </div>
</div>

<!-- nuevo usuario -->
<div class="modal" tabindex="-1" role="dialog" id="modalIngresarSucursales">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="nuevoSucursales" autocomplete="off" method="post" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title">Ingreso de Sucursales</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="suc_nombre_v_i">Nombre Sucursal</label>
								<input type="text" class="form-control" id="suc_nombre_v_i" name="suc_nombre_v_i" placeholder="Nombre de Sucursal">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="suc_ban_id_i_i">Banco</label>
								<select class="form-control" id="suc_ban_id_i_i" name="suc_ban_id_i_i" placeholder="Tipo documento">
									<?php 
										$bancos = ControladorUtilidades::getData('sc_bancos', null, null);
										foreach($bancos as $key => $value){
											echo '<option value="'.$value['ban_id_i'].'">'.$value['ban_nombre_v'].'</option>';
										}
									?>
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="suc_ciu_id_i_i">Ciudad</label>
								<select class="form-control" id="suc_ciu_id_i_i" name="suc_ciu_id_i_i" placeholder="Ciudad">
									<?php 
										$ciudades = ControladorUtilidades::getData('ciudades', null, null);
										foreach($ciudades as $key => $value){
											echo '<option value="'.$value['ciu_id_i'].'">'.$value['ciu_ciu_v'].'</option>';
										}
									?>
								</select>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="suc_direccion_v_i">Dirección</label>
								<input type="text" class="form-control" id="suc_direccion_v_i" name="suc_direccion_v_i" placeholder="Dirección Sucursal">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="suc_codigo_v_i">Codigo</label>
								<input type="text" class="form-control" id="suc_codigo_v_i" name="suc_codigo_v_i" placeholder="Codigo Sucursal">
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="suc_est_id_i_i">Estado</label>
								<select class="form-control" id="suc_est_id_i_i" name="suc_est_id_i_i" placeholder="Estado Sucursal">
									<option value="1">Activo</option>
									<option value="0">No activo</option>
								</select>
							</div>
						</div>
						
					</div>					
				</div>
				<div class="modal-footer">
					<input type="hidden" name="idCarpetaPadre" value="0">
					<button type="button" class="btn btn-primary" id="enviarFormNuevo">Guardar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!--edicion de usuarios-->

<div class="modal" tabindex="-1" role="dialog" id="modalActualizarSucursales">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="edicionSucursales" autocomplete="off" method="post" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title">Modificar Sucursales</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="suc_nombre_v_e">Nombre Sucursal</label>
								<input type="text" class="form-control" id="suc_nombre_v_e" name="suc_nombre_v_e" placeholder="Nombre de Sucursal">
							</div>
						</div>

						<div class="col">
							<div class="form-group">
								<label for="suc_ban_id_i_e">Banco</label>
								<select class="form-control" id="suc_ban_id_i_e" name="suc_ban_id_i_e" placeholder="Tipo documento">
									<?php 
										$bancos = ControladorUtilidades::getData('sc_bancos', null, null);
										foreach($bancos as $key => $value){
											echo '<option value="'.$value['ban_id_i'].'">'.$value['ban_nombre_v'].'</option>';
										}
									?>
								</select>
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="suc_ciu_id_i_e">Ciudad</label>
								<select class="form-control" id="suc_ciu_id_i_e" name="suc_ciu_id_i_e" placeholder="Tipo documento">
									<?php 
										$ciudades = ControladorUtilidades::getData('ciudades', null, null);
										foreach($ciudades as $key => $value){
											echo '<option value="'.$value['ciu_id_i'].'">'.$value['ciu_ciu_v'].'</option>';
										}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="suc_direccion_v_e">Dirección</label>
								<input type="text" class="form-control" id="suc_direccion_v_e" name="suc_direccion_v_e" placeholder="Dirección Sucursal">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="suc_codigo_v_e">Codigo</label>
								<input type="text" class="form-control" id="suc_codigo_v_e" name="suc_codigo_v_e" placeholder="Codigo Sucursal">
							</div>
						</div>

						<div class="col">
							<div class="form-group">
								<label for="suc_est_id_i_e">Estado</label>
								<select class="form-control" id="suc_est_id_i_e" name="suc_est_id_i_e" placeholder="Estado Sucursal">
									<option value="1">Activo</option>
									<option value="0">No activo</option>
								</select>
							</div>
						</div>

					</div>

					
				</div>
				<div class="modal-footer">
					<input type="hidden" name="suc_id_id_e" id="suc_id_id_e" value="0">
					<button type="button" class="btn btn-primary" id="enviarFormEdicion">Guardar</button>
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
sucursales = {
		insertSucursales:function(dataTableEmpresas){
			var FormInsertSuc = new FormData($("#nuevoSucursales")[0]);
	        $.ajax({
	            url: 'ajax/sucursales.ajax.php',
	            type  : 'post',
	            data: FormInsertSuc,
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
	                    alertify.error('Proceso terminado, '+data.mensaje);
	                }else{
	                    alertify.success('Proceso terminado, '+data.mensaje);
	                }
	                dataTableEmpresas.ajax.reload();
	                $("#nuevoSucursales")[0].reset();
	                $("#modalIngresarSucursales").modal('hide');
	            },
	            //si ha ocurrido un error
	            error: function(){
	                alertify.error('Error al realizar el proceso');
	            }
	        });
		},

		updateSucursales:function(dataTableEmpresas){
			var FormUpdateSuc = new FormData($("#edicionSucursales")[0]);
	        $.ajax({
	            url: 'ajax/sucursales.ajax.php',
	            type  : 'post',
	            data: FormUpdateSuc,
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
	                    alertify.error('Proceso terminado, '+data.mensaje);
	                }else{
	                    alertify.success('Proceso terminado, '+data.mensaje);
	                }
	                dataTableEmpresas.ajax.reload();
	                $("#edicionSucursales")[0].reset();
	                $("#modalActualizarSucursales").modal('hide');
	            },
	            //si ha ocurrido un error
	            error: function(){
	                alertify.error('Error al realizar el proceso');
	            }
	        });
		},

		deleteSucursales:function(idSucursales, dataTableEmpresas){
			$.ajax({
	            url: 'ajax/sucursales.ajax.php',
	            type  : 'post',
	            data: { suc_id_id : idSucursales},
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
	                    alertify.error('Proceso terminado, '+data.mensaje);
	                }else{
	                    alertify.success('Proceso terminado, '+data.mensaje);
	                }
	                dataTableEmpresas.ajax.reload();
	            },
	            //si ha ocurrido un error
	            error: function(){
	                alertify.error('Error al realizar el proceso');
	            }
	        });
		},

		getSucursales:function(idSucursales){
			$.ajax({
	            url: 'ajax/sucursales.ajax.php',
	            type  : 'post',
	            data: { suc_id_id_g : idSucursales},
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
					$("#suc_nombre_v_e").val(data.suc_nombre_v);
					$("#suc_ban_id_i_e").val(data.suc_ban_id_i);
					$("#suc_ciu_id_i_e").val(data.suc_ciu_id_i).change();
					$("#suc_direccion_v_e").val(data.suc_direccion_v);
					$("#suc_codigo_v_e").val(data.suc_codigo_v);
					$("#suc_est_id_i_e").val(data.suc_est_id_i);
					$("#suc_id_id_e").val(data.suc_id_id);
	               
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
        edicion += '<li><a class="dropdown-item btnEditarSucursales" title="Editar" id_sucursal data-toggle="modal" data-target="#modalActualizarSucursales" href="#">EDITAR</a></li>';
        edicion += '<li class="divider"></li>';
        edicion += '<li><a class="dropdown-item btnEliminarSucursales" title="Eliminar" id_sucursal href="#">ELIMINAR</a></li>';
        edicion += '<li class="divider"></li>';
     	edicion += '</ul>';
    	edicion += '</div>';

		var dataTableEmpresas = $('#dataTable').DataTable({
		    "ajax": 'ajax/sucursales.ajax.php?allDatos=true',
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
		    $(this).attr("id_sucursal", data[5]);
		});

		/* Esta parte es para traer los datos de la edicion */
	    $('#dataTable tbody').on("click", ".btnEditarSucursales", function(){
	        var x = $(this).attr('id_sucursal');
	       	sucursales.getSucursales(x);
	    });
		/*Activar funcionalidad de boton eliminar*/
	    $('#dataTable tbody').on("click", ".btnEliminarSucursales", function(){
	        var x = $(this).attr('id_sucursal');
			swal({
	            title: '¿Está seguro de borrar la sucursal?',
	            text: "¡Si no lo está puede cancelar la accíón!",
	            type: 'warning',
	            showCancelButton: true,
	            confirmButtonColor: '#3085d6',
	            cancelButtonColor: '#d33',
	            cancelButtonText: 'Cancelar',
	            confirmButtonText: 'Si, borrar sucursal!'
	        },function(isConfirm) {
	            if (isConfirm) {
					sucursales.deleteSucursales(x,dataTableEmpresas);
				}
			});			
	    });


		$("#enviarFormNuevo").click(function(){
			sucursales.insertSucursales(dataTableEmpresas);
		});

		$("#enviarFormEdicion").click(function(){
			sucursales.updateSucursales(dataTableEmpresas);
		});

	});
</script>