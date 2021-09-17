<!-- Page Heading -->
<?php 

?>
<link href="views/assets/StartBoots/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  	<h1 class="h3 mb-0 text-gray-800">Usuarios Registrados</h1>
  	<button class="btn btn-circle btn-default dropdown no-arrow" title="Opciones" 
  		data-toggle="dropdown" 
  		aria-haspopup="true" 
  		aria-expanded="true">
  		<i class="fas fa-ellipsis-v"></i>
  	</button>
  	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -104px, 0px);">
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalIngresarUsarios">
        	Nuevo Usuario
    	</a>
    </div>
</div>
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Datos de los usuarios</h6>
        </div>
        <div class="card-body">
        	<table class="table table-bordered" id="dataTableUsuario" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 10%;">Identificación</th>
                        <th style="width: 40%">Nombres</th>
                        <th style="width: 20%;">Perfil</th>
                        <th style="width: 20%;">Banco</th>
                        <th style="width: 10%;"></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th style="width: 10%;">Identificación</th>
                        <th style="width: 40%">Nombres</th>
                        <th style="width: 20%;">Perfil</th>
                        <th style="width: 20%;">Banco</th>
                        <th style="width: 10%;"></th>
                    </tr>
                </tfoot>
           	</table>
        </div>
    </div>
</div>

<!-- nuevo usuario -->
<div class="modal" tabindex="-1" role="dialog" id="modalIngresarUsarios">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="nuevoUsuario" autocomplete="off" method="post" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title">Ingreso de Usuarios</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="usu_tip_doc_id_i_i">Tipo documento</label>
								<select class="form-control" id="usu_tip_doc_id_i_i" name="usu_tip_doc_id_i_i" placeholder="Tipo documento">
									<?php 
										$tiposDocumentos = ControladorUtilidades::getData('sc_tipo_documento', null, null);
										foreach($tiposDocumentos as $key => $value){
											echo '<option value="'.$value['tipd_id_i'].'">'.$value['tipd_descripcion_v'].'</option>';
										}
									?>
								</select>
							</div>
						</div>

						<div class="col">
							<div class="form-group">
								<label for="usu_documento_v_i">Identificación</label>
								<input type="text" class="form-control" id="usu_documento_v_i" name="usu_documento_v_i" placeholder="Identificación">
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="usu_nombre_v_i">Nombres</label>
								<input type="text" class="form-control" id="usu_nombre_v_i" name="usu_nombre_v_i" placeholder="Nombre">
							</div>
						</div>

						<div class="col">
							<div class="form-group">
								<label for="usu_apellido_v_i">Apellidos</label>
								<input type="text" class="form-control" id="usu_apellido_v_i" name="usu_apellido_v_i" placeholder="Apellido">
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="usu_per_id_i_i">Perfil Usuario</label>
								<select class="form-control" id="usu_per_id_i_i" name="usu_per_id_i_i" placeholder="Tipo documento">
									<?php 
										$perfiles = ControladorUtilidades::getData('sc_perfiles', null, null);
										foreach($perfiles as $key => $value){
											echo '<option value="'.$value['perf_id_i'].'">'.$value['perf_nombre_v'].'</option>';
										}
									?>
								</select>
							</div>
						</div>

						<div class="col">
							<div class="form-group">
								<label for="usu_est_id_i_i">Estado</label>
								<input type="text" class="form-control" id="usu_est_id_i_i" name="usu_est_id_i_i" placeholder="Estado del Usuario">
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="usu_usuario_v_i">Usuario</label>
								<input type="text" class="form-control" id="usu_usuario_v_i"
								 name="usu_usuario_v_i" placeholder="Usuario">
							</div>
						</div>

						<div class="col">
							<div class="form-group">
								<label for="usu_password_v_i">Contraseña</label>
								<input type="password" class="form-control" id="usu_password_v_i" name="usu_password_v_i" placeholder="Contraseña">
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="usu_banco_i_i">Banco</label>
								<select class="form-control" id="usu_banco_i_i" name="usu_banco_i_i" placeholder="Nombre de Banco">
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

<div class="modal" tabindex="-1" role="dialog" id="modalActualizarUsuarios">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="editarUsuario" autocomplete="off" method="post" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title">Editar Usuarios</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="usu_tip_doc_id_i_i">Tipo documento</label>
								<select class="form-control" id="usu_tip_doc_id_i_e" name="usu_tip_doc_id_i_e" placeholder="Tipo documento">
									<?php 
										$tiposDocumentos = ControladorUtilidades::getData('sc_tipo_documento', null, null);
										foreach($tiposDocumentos as $key => $value){
											echo '<option value="'.$value['tipd_id_i'].'">'.$value['tipd_descripcion_v'].'</option>';
										}
									?>
								</select>
							</div>
						</div>

						<div class="col">
							<div class="form-group">
								<label for="usu_documento_v_e">Documento</label>
								<input type="text" class="form-control" id="usu_documento_v_e" name="usu_documento_v_e" placeholder="Documento">
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="usu_nombre_v_e">Nombre</label>
								<input type="text" class="form-control" id="usu_nombre_v_e" name="usu_nombre_v_e" placeholder="Nombre">
							</div>
						</div>

						<div class="col">
							<div class="form-group">
								<label for="usu_apellido_v_e">Apellido</label>
								<input type="text" class="form-control" id="usu_apellido_v_e" name="usu_apellido_v_e" placeholder="Apellido">
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="usu_per_id_i_e">Perfil Usuario</label>
								<select class="form-control" id="usu_per_id_i_e" name="usu_per_id_i_e" placeholder="Tipo documento">
									<?php 
										$perfiles = ControladorUtilidades::getData('sc_perfiles', null, null);
										foreach($perfiles as $key => $value){
											echo '<option value="'.$value['perf_id_i'].'">'.$value['perf_nombre_v'].'</option>';
										}
									?>
								</select>
							</div>
						</div>

						<div class="col">
							<div class="form-group">
								<label for="usu_est_id_i_e">Estado</label>
								<input type="text" class="form-control" id="usu_est_id_i_e" name="usu_est_id_i_e" placeholder="Estado del Usuario">
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="usu_usuario_v_e">Usuario</label>
								<input type="text" class="form-control" id="usu_usuario_v_e"
								 name="usu_usuario_v_e" placeholder="Usuario">
							</div>
						</div>

						<div class="col">
							<div class="form-group">
								<label for="usu_id_i_e">Contraseña</label>
								<input type="password" class="form-control" id="usu_id_i_e" name="usu_id_i_e" placeholder="Contraseña">
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="usu_banco_i_e">Banco</label>
								<select class="form-control" id="usu_banco_i_e" name="usu_banco_i_e" placeholder="Nombre de Banco">
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
				</div>
				<div class="modal-footer">
					<input type="hidden" name="usu_id_i_e" id="usu_id_i_e" value="0">
					<input type="hidden" name="usu_password_v_actual_e" id="usu_password_v_actual_e" value="0">
					<button type="button" class="btn btn-primary" id="enviarFormEdicion">Guardar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Page level plugins -->
<script src="views/assets/StartBoots/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="views/assets/StartBoots/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">
	usuarios = {
		insertUsuarios:function(dataTableEmpresas){
			var FormularioRichard = new FormData($("#nuevoUsuario")[0]);
	        $.ajax({
	            url: 'ajax/usuarios.ajax.php',
	            type  : 'post',
	            data: FormularioRichard,
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
	                $("#nuevoUsuario")[0].reset();
	                $("#modalIngresarUsarios").modal('hide');
	            },
	            //si ha ocurrido un error
	            error: function(){
	                alertify.error('Error al realizar el proceso');
	            }
	        });
		},

		updateUsuarios:function(dataTableEmpresas){
			var FormUpdate = new FormData($("#editarUsuario")[0]);
	        $.ajax({
	            url: 'ajax/usuarios.ajax.php',
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
	                    alertify.error('Proceso terminado, '+data.mensaje);
	                }else{
	                    alertify.success('Proceso terminado, '+data.mensaje);
	                }
	                dataTableEmpresas.ajax.reload();
	                $("#editarUsuario")[0].reset();
	                $("#modalActualizarUsuarios").modal('hide');
	            },
	            //si ha ocurrido un error
	            error: function(){
	                alertify.error('Error al realizar el proceso');
	            }
	        });
		},

		deleteUsuarios:function(idUsuario, dataTableEmpresas){
			$.ajax({
	            url: 'ajax/usuarios.ajax.php',
	            type  : 'post',
	            data: { usu_id_i_d : idUsuario},
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
	            },
	            //si ha ocurrido un error
	            error: function(){
	                alertify.error('Error al realizar el proceso');
	            }
	        });
		},

		getUsuario:function(idUsuario){
			$.ajax({
	            url: 'ajax/usuarios.ajax.php',
	            type  : 'post',
	            data: { usu_id_i_g : idUsuario},
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
        edicion += '<li><a class="dropdown-item btnVerUsuario" id_usuario href="#" data-toggle="modal" data-target="#modalEditarrIncapacidadver">VER</a></li>';
        edicion += '<li class="divider"></li>';
        edicion += '<li><a class="dropdown-item btnEditarUsuario" title="Editar" id_usuario data-toggle="modal" data-target="#modalActualizarUsuarios" href="#">EDITAR</a></li>';

        edicion += '<li class="divider"></li>';
        edicion += '<li><a class="dropdown-item btnEliminarUsuario" title="Eliminar" id_usuario href="#">ELIMINAR</a></li>';

     	edicion += '</ul>';
    	edicion += '</div>';

		var dataTableEmpresas = $('#dataTableUsuario').DataTable({
		    "ajax": 'ajax/usuarios.ajax.php?allDatos=true',
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

		$('#dataTableUsuario tbody').on( 'click', 'a', function () {
		    var data = dataTableEmpresas.row( $(this).parents('tr') ).data();
		    $(this).attr("id_usuario", data[4]);
		});

		/* Esta parte es para traer los datos de la edicion */
	    $('#dataTableUsuario tbody').on("click", ".btnEditarUsuario", function(){
	        var x = $(this).attr('id_usuario');
	       	usuarios.getUsuario(x);
	    });


		$("#enviarFormNuevo").click(function(){
			usuarios.insertUsuarios(dataTableEmpresas);
		});

		$("#enviarFormEdicion").click(function(){
			usuarios.updateUsuarios(dataTableEmpresas);
		});

	});
</script>