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
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalIngresarSucursales">
        	Ingresar Sucursales
    	</a>
    </div>
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
			<form id="nuevaEmpresa" autocomplete="off" method="post" enctype="multipart/form-data">
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
								<label for="suc_codigo_v_i">Codigo</label>
								<input type="text" class="form-control" id="suc_codigo_v_i" name="suc_codigo_v_i" placeholder="Codigo Sucursal">
							</div>
						</div>

						<div class="col">
							<div class="form-group">
								<label for="suc_ciu_id_i_i">Ciudad</label>
								<input type="text" class="form-control" id="suc_ciu_id_i_i" name="suc_ciu_id_i_i" placeholder="Ciudad de Sucursal">
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="suc_direccion_v_i">Dirección</label>
								<input type="text" class="form-control" id="suc_direccion_v_i" name="suc_direccion_v_i" placeholder="Dirección Sucursal">
							</div>
						</div>

						<div class="col">
							<div class="form-group">
								<label for="suc_est_id_i_i">Estado</label>
								<input type="text" class="form-control" id="suc_est_id_i_i" name="suc_est_id_i_i" placeholder="Estado Sucursal">
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
			<form id="nuevaEmpresa" autocomplete="off" method="post" enctype="multipart/form-data">
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
								<label for="suc_codigo_v_e">Codigo</label>
								<input type="text" class="form-control" id="suc_codigo_v_e" name="suc_codigo_v_e" placeholder="Codigo Sucursal">
							</div>
						</div>

						<div class="col">
							<div class="form-group">
								<label for="suc_ciu_id_i_e">Ciudad</label>
								<input type="text" class="form-control" id="suc_ciu_id_i_e" name="suc_ciu_id_i_e" placeholder="Ciudad de Sucursal">
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="suc_direccion_v_e">Dirección</label>
								<input type="text" class="form-control" id="suc_direccion_v_e" name="suc_direccion_v_e" placeholder="Dirección Sucursal">
							</div>
						</div>

						<div class="col">
							<div class="form-group">
								<label for="suc_est_id_i_e">Estado</label>
								<input type="text" class="form-control" id="suc_est_id_i_e" name="suc_est_id_i_e" placeholder="Estado Sucursal">
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