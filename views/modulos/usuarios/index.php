<!-- Page Heading -->
<?php 

?>
<link href="views/assets/StartBoots/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  	<h1 class="h3 mb-0 text-gray-800">Usuarios Registrados</h1>

  	<!--<a href="#" data-toggle="modal" data-target="#modalEmpresaNueva" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    	<i class="fas fa-plus fa-sm text-white-50"></i> 
    	Nuevo Cargue
  	</a>-->
  	<button class="btn btn-circle btn-default dropdown no-arrow" title="Opciones" 
  		data-toggle="dropdown" 
  		aria-haspopup="true" 
  		aria-expanded="true">
  		<i class="fas fa-ellipsis-v"></i>
  	</button>
  	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -104px, 0px);">
        <a class="dropdown-item eliminarDoc" href="#" data-toggle="modal" data-target="#modalCarpetaNueva">
        	Nueva Carpeta
    	</a>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalEmpresaNueva">
        	Subir Archivo
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
        	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 43%;">Identificación</th>
                        <th style="width: 7%">Nombres</th>
                        <th style="width: 20%;">Perfil</th>
                        <th style="width: 20%;">Banco</th>
                        <th style="width: 10%;"></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th style="width: 43%;">Identificación</th>
                        <th style="width: 7%">Nombres</th>
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
			<form id="nuevaEmpresa" autocomplete="off" method="post" enctype="multipart/form-data">
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
								<input type="text" class="form-control" id="usu_tip_doc_id_i_i" name="usu_tip_doc_id_i_i" placeholder="Tipo documento">
							</div>
						</div>

						<div class="col">
							<div class="form-group">
								<label for="usu_documento_v_i">Documento</label>
								<input type="text" class="form-control" id="usu_documento_v_i" name="usu_documento_v_i" placeholder="Documento">
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="usu_nombre_v_i">Nombre</label>
								<input type="text" class="form-control" id="usu_nombre_v_i" name="usu_nombre_v_i" placeholder="Nombre">
							</div>
						</div>

						<div class="col">
							<div class="form-group">
								<label for="usu_apellido_v_i">Apellido</label>
								<input type="text" class="form-control" id="usu_apellido_v_i" name="usu_apellido_v_i" placeholder="Apellido">
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="usu_per_id_i_i">Perfil Usuario</label>
								<input type="text" class="form-control" id="usu_per_id_i_i" name="usu_per_id_i_i" placeholder="Perfil Usuario">
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
								<input type="text" class="form-control" id="usu_banco_i_i" name="usu_banco_i_i" placeholder="Nombre de Banco">
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
			<form id="nuevaEmpresa" autocomplete="off" method="post" enctype="multipart/form-data">
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
								<input type="text" class="form-control" id="usu_tip_doc_id_i_i" name="usu_tip_doc_id_i_i" placeholder="Tipo documento">
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
								<input type="text" class="form-control" id="usu_per_id_i_e" name="usu_per_id_i_e" placeholder="Perfil Usuario">
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
								<input type="text" class="form-control" id="usu_banco_i_e" name="usu_banco_i_e" placeholder="Nombre de Banco">
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


<!-- nueva Carpeta -->
<div class="modal" tabindex="-1" role="dialog" id="modalCarpetaNueva">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="nuevaCarpeta" autocomplete="off" method="post" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title">Nueva Carpeta</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="I_doc_tipo_v">Nombre de la Carpeta</label>
								<input type="text" class="form-control" id="I_doc_tipo_v" name="I_doc_tipo_v" placeholder="Nombre de la Carpeta">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="idCarpetaPadre" value="0">
					<button type="button" class="btn btn-primary" id="enviarFormNuevaCarpet">Guardar</button>
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