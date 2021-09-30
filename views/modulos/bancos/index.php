<!-- Page Heading -->
<?php 

?>
<link href="views/assets/StartBoots/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  	<h1 class="h3 mb-0 text-gray-800">Registrar Bancos</h1>

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
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalIngresarBancos">
        	Ingresar Bancos
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
            <h6 class="m-0 font-weight-bold text-primary">Datos de los Bancos</h6>
        </div>
        <div class="card-body">
        	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 40%;">Nombre entidad bancaria</th>
                        <th style="width: 40%">Estado</th>
                        <th style="width: 10%;"></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th style="width: 40%;">Nombre entidad bancaria</th>
                        <th style="width: 40%">Estado</th>
                        <th style="width: 10%;"></th>
                    </tr>
                </tfoot>
           	</table>
        </div>
    </div>
</div>

<!-- nuevo usuario -->
<div class="modal" tabindex="-1" role="dialog" id="modalIngresarBancos">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="crearBancos" autocomplete="off" method="post" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title">Ingreso de Bancos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="ban_nombre_v_i">Nombre Banco</label>
								<input type="text" class="form-control" id="ban_nombre_v_i" name="ban_nombre_v_i" placeholder="Nombre de Banco">
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

					

<!--edicion de bancos-->

<div class="modal" tabindex="-1" role="dialog" id="modalActulizarBancos">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="nuevobanco" autocomplete="off" method="post" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title">Actualizar Bancos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="ban_nombre_v_e">Nombre Banco</label>
								<input type="text" class="form-control" id="ban_nombre_v_e" name="ban_nombre_v_e" placeholder="Nombre Banco">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="ban_id_i_e" id="ban_id_i_e" value="0">
					<button type="button" class="btn btn-primary" id="enviarForEdicion">Guardar</button>
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
	Bancos = {
		insertBancos:function(dataTableEmpresas){
			var FormInsert = new FormData($("#crearBancos")[0]);
	        $.ajax({
	            url: 'ajax/bancos.ajax.php',
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
	                $("#crearBancos")[0].reset();
	                $("#modalIngresarBancos").modal('hide');
	            },
	            //si ha ocurrido un error
	            error: function(){
	                alertify.error('Error al realizar el proceso');
	            }
	        });
		},

		updateBancos:function(dataTableEmpresas){
			var FormUpdate = new FormData($("#nuevobanco")[0]);
	        $.ajax({
	            url: 'ajax/bancos.ajax.php',
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
	                    alertify.error('Proceso terminado, '+data.message);
	                }else{
	                    alertify.success('Proceso terminado, '+data.message);
	                }
	                dataTableEmpresas.ajax.reload();
	                $("#nuevobanco")[0].reset();
	                $("#modalActulizarBancos").modal('hide');
	            },
	            //si ha ocurrido un error
	            error: function(){
	                alertify.error('Error al realizar el proceso');
	            }
	        });
		},

		deleteBanco:function(idBancos, dataTableEmpresas){
			$.ajax({
	            url: 'ajax/bancos.ajax.php',
	            type  : 'post',
	            data: { ban_id_i_d : idBancos},
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

		getBancos:function(idBancos){
			$.ajax({
	            url: 'ajax/bancos.ajax.php',
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
	            		$("#ban_nombre_v_e").val(data.ban_nombre_v)
		                $("#ban_id_i_e").val(data.ban_id_i);
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
        edicion += '<li><a class="dropdown-item btnEditarBancos" title="Editar" id_bancos data-toggle="modal" data-target="#modalActulizarBancos" href="#">EDITAR</a></li>';
        edicion += '<li class="divider"></li>';
        <?php
        	}
  			if ($_SESSION['perf_del_i'] == 1) {	
  		?>
        edicion += '<li><a class="dropdown-item btnEliminarBancos" title="Eliminar" id_bancos href="#">ELIMINAR</a></li>';
        edicion += '<li class="divider"></li>';
        <?php
        	}
    	?>
     	edicion += '</ul>';
    	edicion += '</div>';

		var dataTableEmpresas = $('#dataTable').DataTable({
		    "ajax": 'ajax/bancos.ajax.php?allDatos=true',
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
		    $(this).attr("id_bancos", data[2]);
		});

		/*Activar funcionalidad de boton eliminar*/
	    $('#dataTable tbody').on("click", ".btnEliminarBancos", function(){
	        var x = $(this).attr('id_bancos');
			swal({
	            title: '¿Está seguro de borrar el banco?',
	            text: "¡Si no lo está puede cancelar la accíón!",
	            type: 'warning',
	            showCancelButton: true,
	            confirmButtonColor: '#3085d6',
	            cancelButtonColor: '#d33',
	            cancelButtonText: 'Cancelar',
	            confirmButtonText: 'Si, borrar banco!'
	        },function(isConfirm) {
	            if (isConfirm) {
					Bancos.deleteBanco(x,dataTableEmpresas);
				}
			});			
	    });

	    $('#dataTable tbody').on("click", ".btnEditarBancos", function(){
	        var x = $(this).attr('id_bancos');
	       	Bancos.getBancos(x);
	    });

		$("#enviarFormNuevo").click(function(){
			Bancos.insertBancos(dataTableEmpresas);
		});

		$("#enviarForEdicion").click(function(){
			Bancos.updateBancos(dataTableEmpresas);
		});

		$("#enviarFormNuevoAsignacion").click(function(){
			Solicitudes.insertSolicitudesAsignacion(dataTableEmpresas);
		});

		$("#sol_ban_id_i").on('change', function(){
			Solicitudes.getDatosSucursales($(this).val(), 0);
		});

		$("#sol_ban_id_e").on('change', function(){
			Solicitudes.getDatosSucursales($(this).val(), 0);
		});
	});
</script>
