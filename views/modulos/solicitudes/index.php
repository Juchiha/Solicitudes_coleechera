<!-- Page Heading -->
<link href="views/assets/StartBoots/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  	<h1 class="h3 mb-0 text-gray-800">Incidencias reportadas en el sistema</h1>
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
  		
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalIngresarSolicitudes">
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
            <h6 class="m-0 font-weight-bold text-primary">Datos de las Incidencias</h6>
        </div>
        <div class="card-body">
        	<table class="table table-bordered" id="dataTableUsuario" width="100%" cellspacing="0">
                <thead>
                    <tr>
                		<th style="width: 27%;">Quien solicita</th>
                        <th style="width: 12%;">Fecha Sol.</th>
                        <th style="width: 10%;"># OT</th>
                        <th style="width: 9%;">Estado</th>
                        <th style="width: 10%;">Prioridad</th>
                        <th style="width: 24%;">Asignado A</th>
                        <th style="width: 8%;"></th>
                    </tr>
                </thead>
                <tfoot>
                     <tr>
                		<th style="width: 27%;">Quien solicita</th>
                        <th style="width: 12%;">Fecha Sol.</th>
                        <th style="width: 10%;"># OT</th>
                        <th style="width: 9%;">Estado</th>
                        <th style="width: 10%;">Prioridad</th>
                        <th style="width: 24%;">Asignado A</th>
                        <th style="width: 8%;"></th>
                    </tr>
                </tfoot>
           	</table>
        </div>
    </div>
</div>

<!-- nuevo usuario -->
<div class="modal" tabindex="-1" role="dialog" id="modalIngresarSolicitudes">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form id="nuevoUsuario" autocomplete="off" method="post" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title">Nueva Incidencia</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				  	<div class="card shadow mb-4">
				        <div class="card-header py-3">
				            <h6 class="m-0 font-weight-bold text-primary">Para quien es el servicio</h6>
				        </div>
        				<div class="card-body">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="sol_tip_sol_id_i">Para quién es el requerimiento</label>
										<select class="form-control" id="sol_tip_sol_id_i" name="sol_tip_sol_id_i" placeholder="Para quién es el requerimiento">
											<option value="0">Seleccione</option>
											<?php 
												$bancos = ControladorUtilidades::getData('sc_tipo_solicitante', null, null);
												foreach($bancos as $key => $value){
													echo '<option value="'.$value['tip_sol_id'].'">'.$value['tip_sol_descripcion'].'</option>';
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_identificacion_v">Identificación</label>
										<input type="text" name="cli_identificacion_v" id="cli_identificacion_v" class="form-control" placeholder="Identificación">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_nombres">Nombre Completo</label>
										<input type="text" name="cli_nombres" disabled id="cli_nombres" class="form-control cliente" placeholder="Nombre Completo">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_fecha_ingreso_d">Fecha de Ingreso</label>
										<input type="text" disabled name="cli_fecha_ingreso_d" id="cli_fecha_ingreso_d" class="form-control cliente" placeholder="YYYY-MM-DD">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_numero_empleado_v">Numero de Empleado</label>
										<input type="text" disabled name="cli_numero_empleado_v" id="cli_numero_empleado_v" class="form-control cliente" placeholder="Numero de Empleado">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_usuario_red_v">Usuario de Red</label>
										<input type="text" disabled name="cli_usuario_red_v" id="cli_usuario_red_v" class="form-control cliente" placeholder="Usuario de Red">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_usuario_sap_v">Usuario de SAP</label>
										<input type="text" disabled name="cli_usuario_sap_v" id="cli_usuario_sap_v" class="form-control cliente" placeholder="Usuario de SAP">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_cargo_v">Nombre del Cargo</label>
										<input type="text" disabled name="cli_cargo_v" id="cli_cargo_v" class="form-control cliente" placeholder="Nombre del Cargo">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_area_i">Area/Dirección</label>
										<select class="form-control cliente" disabled id="cli_area_i" name="cli_area_i" placeholder="Area/Dirección">
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
										<label for="cli_planta_id_i">Planta/Sucursal</label>
										<select class="form-control cliente" disabled id="cli_planta_id_i" name="cli_planta_id_i" placeholder="Ciudad">
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
										<label for="sol_cli_correo_v">Correo Electronico</label>
										<input type="text" disabled name="sol_cli_correo_v" id="sol_cli_correo_v" class="form-control cliente" placeholder="Correo Electronico">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card shadow mb-4">
				        <div class="card-header py-3">
				            <h6 class="m-0 font-weight-bold text-primary">
				            	QUE NECESITA
				            </h6>
				        </div>
        				<div class="card-body">
        					<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="serv_id_i">
											<input type="checkbox" value="1" id="che_usuario_R" 	name="che_usuario_R"> Usuario de red
										</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="serv_id_i">
											<input type="checkbox" value="2" id="che_correo" 	name="che_correo"> Correo
										</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="serv_id_i">
											<input type="checkbox" value="3" id="che_usuario_S" 	name="che_usuario_S"> Usuario SAP
										</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="serv_id_i">
											<input type="checkbox" value="4" id="che_Biman" name="che_Biman"> Biman
										</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="serv_id_i">
											<input type="checkbox" value="1" id="che_acceso_inter" 	name="che_acceso_inter"> Acceso a Internet
										</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="serv_id_i">
											<input type="checkbox" value="1" id="che_acceso_consignates" 	name="che_acceso_consignates"> Consignantes
										</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="serv_id_i">
											<input type="checkbox" value="1" id="che_acceso_gil" 	name="che_acceso_gil"> GIL
										</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="serv_id_i">
											<input type="checkbox" value="1" id="che_acceso_query" 	name="che_acceso_query"> Query
										</label>
									</div>
								</div>
        					</div>
        					<div class="row" id="DetalleUsuarioRed" style="display:none;">
        						<div class="col-md-3">
									<div class="form-group">
										<label for="detalle_usu_red">Detalle Usu Red.</label>
										<select class="form-control" id="detalle_usu_red" name="detalle_usu_red" placeholder="Detalle Requerimiento">
											<option value="0">Seleccione</option>
											<?php 
												$bancos = ControladorUtilidades::getData('sc_tipo_servicio', null, null);
												foreach($bancos as $key => $value){
													echo '<option value="'.$value['id_tps_i'].'">'.$value['desc_tps_v'].'</option>';
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<label for="detalle_obse_usu_re">Observacion Usuario de Red</label>
										<input type="text" class="form-control" id="detalle_obse_usu_re" name="detalle_obse_usu_re" placeholder="Observacion Usuario de Red">
									</div>
								</div>
        					</div>
        					<div class="row" id="DetalleCorreo" style="display:none;">
        						<div class="col-md-3">
									<div class="form-group">
										<label for="detalle_correo">Detalle Correo</label>
										<select class="form-control" id="detalle_correo" name="detalle_correo" placeholder="Detalle Requerimiento">
											<option value="0">Seleccione</option>
											<?php 
												$bancos = ControladorUtilidades::getData('sc_tipo_servicio', null, null);
												foreach($bancos as $key => $value){
													echo '<option value="'.$value['id_tps_i'].'">'.$value['desc_tps_v'].'</option>';
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<label for="detalle_obse_correo">Grupos de correo en los que debe darse de alta:</label>
										<input type="text" class="form-control" id="detalle_obse_correo" name="detalle_obse_correo" placeholder="Grupos de correo en los que debe darse de alta:">
									</div>
								</div>
        					</div>
        					<div class="row" id="DetalleSAP" style="display:none;">
        						<div class="col-md-3">
									<div class="form-group">
										<label for="detalle_Sap">Detalle SAP</label>
										<select class="form-control" id="detalle_Sap" name="detalle_Sap" placeholder="Detalle Requerimiento">
											<option value="0">Seleccione</option>
											<?php 
												$bancos = ControladorUtilidades::getData('sc_tipo_servicio', null, null);
												foreach($bancos as $key => $value){
													echo '<option value="'.$value['id_tps_i'].'">'.$value['desc_tps_v'].'</option>';
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<label for="detalle_obse_sap">Transacciones requeridas:</label>
										<input type="text" class="form-control" id="detalle_obse_sap" name="detalle_obse_sap" placeholder="Transacciones requeridas:">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="detalle_Sap_acc">Accesos SAP:</label>
										<select class="form-control" id="detalle_Sap_acc" name="detalle_Sap_acc" placeholder="Accesos SAP">
											<option value="0">Seleccione</option>
											<?php 
												$bancos = ControladorUtilidades::getData('sc_tipo_servicio_sap', null, null);
												foreach($bancos as $key => $value){
													echo '<option value="'.$value['tip_ser_sap_id_i'].'">'.$value['tip_desc_sap_v'].'</option>';
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="serv_id_i">
											<input type="checkbox" value="1" id="che_sap_prod" 	name="che_sap_prod"> SAP Productivo
										</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="serv_id_i">
											<input type="checkbox" value="2" id="che_sap_des" 	name="che_sap_des"> SAP Desarrollo
										</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="serv_id_i">
											<input type="checkbox" value="3" id="che_sap_cal" 	name="che_sap_cal"> SAP Calidad
										</label>
									</div>
								</div>
        					</div>
        					<div class="row" id="DetalleAccesoInternet" style="display:none;">
								<div class="col-md-12">
									<div class="form-group">
										<label for="detalle_obse_accesoIn">Observaciones Acceso Internet:</label>
										<input type="text" class="form-control" id="detalle_obse_accesoIn" name="detalle_obse_accesoIn" placeholder="Observaciones:">
									</div>
								</div>
        					</div>
        					<div class="row" id="DetalleBiman" style="display:none;">
								<div class="col-md-12">
									<div class="form-group">
										<label for="detalle_obse_Biman">Observaciones Biman:</label>
										<input type="text" class="form-control" id="detalle_obse_Biman" name="detalle_obse_Biman" placeholder="Observaciones:">
									</div>
								</div>
        					</div>
        					<div class="row" id="DetalleGil" style="display:none;">
								<div class="col-md-12">
									<div class="form-group">
										<label for="detalle_obse_Gil">Observaciones GIL:</label>
										<input type="text" class="form-control" id="detalle_obse_Gil" name="detalle_obse_Gil" placeholder="Observaciones:">
									</div>
								</div>
        					</div>
        					<div class="row" id="DetalleConsignates" style="display:none;">
								<div class="col-md-12">
									<div class="form-group">
										<label for="detalle_obse_Consignates">Observaciones Consignantes:</label>
										<input type="text" class="form-control" id="detalle_obse_Consignates" name="detalle_obse_Consignates" placeholder="Observaciones:">
									</div>
								</div>
        					</div>
        					<div class="row" id="DetalleQuery" style="display:none;">
								<div class="col-md-12">
									<div class="form-group">
										<label for="detalle_obse_Query">Observaciones Query:</label>
										<input type="text" class="form-control" id="detalle_obse_Query" name="detalle_obse_Query" placeholder="Observaciones:">
									</div>
								</div>
        					</div>
        				</div>
        			</div>

        			<div class="card shadow mb-4">
				        <div class="card-header py-3">
				            <h6 class="m-0 font-weight-bold text-primary">
				            	ACTIVOS REQUERIDOS
				            </h6>
				        </div>
        				<div class="card-body">
        					<div class="row">
        						<div class="col-md-3">
									<div class="form-group">
										<label for="detalle_equipo_C">Equipo de cómputo</label>
										<select class="form-control" id="detalle_equipo_C" name="detalle_equipo_C" placeholder="Detalle Requerimiento">
											<option value="0">Seleccione</option>
											<option value="ESCRITORIO">Escritorio</option>
											<option value="PORTATIL">Portatil</option>
										</select>
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<label for="detalle_obse_equipo_C">Equipo de cómputo Observación</label>
										<input type="text" class="form-control" id="detalle_obse_equipo_C" disabled name="detalle_obse_equipo_C" placeholder="Equipo de cómputo Observación">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="detalle_soft_espe">Software especial: </label>
										<select class="form-control" id="detalle_soft_espe" name="detalle_soft_espe" placeholder="Software especial: ">
											<option value="0">Seleccione</option>
											<option value="SI">Si</option>
											<option value="NO">No</option>
										</select>
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<label for="detalle_obse_soft_espe">Justificación Software Especial</label>
										<input type="text" class="form-control" id="detalle_obse_soft_espe" disabled name="detalle_obse_soft_espe" placeholder="Justificación Software Especial">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="detalle_vpn">VPN: </label>
										<select class="form-control" id="detalle_vpn" name="detalle_vpn" placeholder="Software especial: ">
											<option value="0">Seleccione</option>
											<option value="SI">Si</option>
											<option value="NO">No</option>
										</select>
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<label for="detalle_obse_vpn">Justificación VPN</label>
										<input type="text" class="form-control" id="detalle_obse_vpn" name="detalle_obse_vpn" disabled placeholder="Justificación VPN">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="detalle_Otro">Otros requerimientos: </label>
										<select class="form-control" id="detalle_Otro" name="detalle_Otro" placeholder="Software especial: ">
											<option value="0">Seleccione</option>
											<option value="SI">Si</option>
											<option value="NO">No</option>
										</select>
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<label for="detalle_obse_Otro">Justificación Otros Requerimientos</label>
										<input type="text" class="form-control" disabled id="detalle_obse_Otro" name="detalle_obse_Otro" placeholder="Justificación Otros Requerimientos">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="detalle_telefonia">Telefonía fija:</label>
										<select class="form-control" id="detalle_telefonia" name="detalle_telefonia" placeholder="Telefonía fija:">
											<option value="0">Seleccione</option>
											<option value="LOCAL">Llamadas Local</option>
											<option value="CELULAR">Llamadas a Celular</option>
											<option value="INTERNACIONAL">Llamadas Internacionales</option>
											<option value="TODAS">Todas</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="detalle_celular_">Celular:</label>
										<select class="form-control" id="detalle_celular_" name="detalle_celular_" placeholder="Celular">
											<option value="0">Seleccione</option>
											<option value="NUEVO">Nuevo</option>
											<option value="REPOSICION">Reposición</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="detalle_impr">Configuracion Impresora:</label>
										<select class="form-control" id="detalle_impr" name="detalle_impr" placeholder="Configuracion Impresora:">
											<option value="0">Seleccione</option>
											<option value="BLAYNEG">Blanco y Negro</option>
											<option value="COLOR">Color</option>
											<option value="AMBAS">Ambas</option>
										</select>
									</div>
								</div>
							</div>
        				</div>
        			</div>

        			<div class="card shadow mb-4">
				        <div class="card-header py-3">
				            <h6 class="m-0 font-weight-bold text-primary">
				            	OTROS DETALLES
				            </h6>
				        </div>
        				<div class="card-body">
        					<div class="row">
								<div class="col">
									<div class="form-group">
										<label for="sol_imagen_datos">Imagen Evidencia 1</label>
										<input type="file" class="form-control NuevaFoto" id="sol_imagen_datos" name="sol_imagen_datos" placeholder="Imagen Evidencia 1">
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label for="sol_imagen_datos_evidencia">Imagen Evidencia 2</label>
										<input type="file" class="form-control NuevaFoto" id="sol_imagen_datos_evidencia" name="sol_imagen_datos_evidencia" placeholder="Imagen Evidencia 2">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3"> 
									<div class="form-group">
										<label for="sol_prio_id_i">Prioridad</label>
										<select class="form-control" id="sol_prio_id_i" name="sol_prio_id_i" placeholder="Prioridad">
											<?php 
												$prioridades = ControladorUtilidades::getData('sc_prioridades', null, null);
												foreach($prioridades as $key => $value){
													echo '<option value="'.$value['pri_id_i'].'">'.$value['pri_desc_v'].'</option>';
												}
											?>

										</select>
									</div>
								</div>
								<div class="col-md-6"> 
									<div class="form-group">
										<label for="sol_tec_usu_id_i_i">Asignar A</label>
										<select class="form-control" id="sol_tec_usu_id_i_i" name="sol_tec_usu_id_i_i" placeholder="Tecnico">
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
										<label for="sol_estado_e">Estado</label>
										<select class="form-control" id="sol_estado_e" name="sol_estado_e" placeholder="Estado">
											<option value="3">Pendiente</option>
											<option value="4">Asignado</option>
											<option value="7">En curso</option>
											<option value="5">Solucionado</option>
											<option value="6">Cerrado sin Solución</option>

										</select>
									</div>
								</div>
							</div>
        				</div>
        			</div>
        			<?php if($_SESSION['perfil'] == '4'){ ?>
        			<div class="card shadow mb-4">
				        <div class="card-header py-3">
				            <h6 class="m-0 font-weight-bold text-primary">
				            	Observaciones
				            </h6>
				        </div>
        				<div class="card-body">
        					<div class="row">
        						<div class="col">
        							<div class="form-group">
										<label for="observaciones_usuarios_finales">Documentación Caso</label>
										<textarea class="form-control" id="observaciones_usuarios_finales" disabled name="observaciones_usuarios_finales" placeholder="Documentación Caso"></textarea>
									</div>
        						</div>
        					</div>
        				</div>
        			</div>
        			<?php } ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="enviarFormNuevo">Guardar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- editar usuario -->
<div class="modal" tabindex="-1" role="dialog" id="modalEditarSolicitudes">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form id="editarSolicitud" autocomplete="off" method="post" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title">Nueva Incidencia</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				  	<div class="card shadow mb-4">
				        <div class="card-header py-3">
				            <h6 class="m-0 font-weight-bold text-primary">Para quien es el servicio</h6>
				        </div>
        				<div class="card-body">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="e_sol_tip_sol_id_i">Para quién es el requerimiento</label>
										<select class="form-control" disabled  id="e_sol_tip_sol_id_i" name="e_sol_tip_sol_id_i" placeholder="Para quién es el requerimiento">
											<option value="0">Seleccione</option>
											<?php 
												$bancos = ControladorUtilidades::getData('sc_tipo_solicitante', null, null);
												foreach($bancos as $key => $value){
													echo '<option value="'.$value['tip_sol_id'].'">'.$value['tip_sol_descripcion'].'</option>';
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="e_cli_identificacion_v">Identificación</label>
										<input type="text" disabled name="e_cli_identificacion_v" id="e_cli_identificacion_v" class="form-control" placeholder="Identificación">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="e_cli_nombres">Nombre Completo</label>
										<input type="text" name="e_cli_nombres" disabled id="e_cli_nombres" class="form-control cliente" placeholder="Nombre Completo">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="e_cli_fecha_ingreso_d">Fecha de Ingreso</label>
										<input type="text" disabled name="e_cli_fecha_ingreso_d" id="e_cli_fecha_ingreso_d" class="form-control cliente" placeholder="YYYY-MM-DD">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="e_cli_numero_empleado_v">Numero de Empleado</label>
										<input type="text" disabled name="e_cli_numero_empleado_v" id="e_cli_numero_empleado_v" class="form-control cliente" placeholder="Numero de Empleado">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="e_cli_usuario_red_v">Usuario de Red</label>
										<input type="text" disabled name="e_cli_usuario_red_v" id="e_cli_usuario_red_v" class="form-control cliente" placeholder="Usuario de Red">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="e_cli_usuario_sap_v">Usuario de SAP</label>
										<input type="text" disabled name="e_cli_usuario_sap_v" id="e_cli_usuario_sap_v" class="form-control cliente" placeholder="Usuario de SAP">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="e_cli_cargo_v">Nombre del Cargo</label>
										<input type="text" disabled name="e_cli_cargo_v" id="e_cli_cargo_v" class="form-control cliente" placeholder="Nombre del Cargo">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="e_cli_area_i">Area/Dirección</label>
										<select class="form-control cliente" disabled id="e_cli_area_i" name="e_cli_area_i" placeholder="Area/Dirección">
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
										<label for="e_cli_planta_id_i">Planta/Sucursal</label>
										<select class="form-control cliente" disabled id="e_cli_planta_id_i" name="e_cli_planta_id_i" placeholder="Ciudad">
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
					<div class="card shadow mb-4">
				        <div class="card-header py-3">
				            <h6 class="m-0 font-weight-bold text-primary">
				            	QUE NECESITA
				            </h6>
				        </div>
        				<div class="card-body">
        					<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="serv_id_i">
											<input type="checkbox" value="1" id="e_che_usuario_R" 	name="e_che_usuario_R"> Usuario de red
										</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="serv_id_i">
											<input type="checkbox" value="2" id="e_che_correo" 	name="e_che_correo"> Correo
										</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="serv_id_i">
											<input type="checkbox" value="3" id="e_che_usuario_S" 	name="e_che_usuario_S"> Usuario SAP
										</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="serv_id_i">
											<input type="checkbox" value="4" id="e_che_Biman" name="e_che_Biman"> Biman
										</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="serv_id_i">
											<input type="checkbox" value="1" id="e_che_acceso_inter" 	name="e_che_acceso_inter"> Acceso a Internet
										</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="serv_id_i">
											<input type="checkbox" value="1" id="e_che_acceso_consignates" 	name="e_che_acceso_consignates"> Consignantes
										</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="serv_id_i">
											<input type="checkbox" value="1" id="e_che_acceso_gil" 	name="e_che_acceso_gil"> GIL
										</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="serv_id_i">
											<input type="checkbox" value="1" id="e_che_acceso_query" 	name="e_che_acceso_query"> Query
										</label>
									</div>
								</div>
        					</div>
        					<div class="row" id="e_DetalleUsuarioRed" style="display:none;">
        						<div class="col-md-3">
									<div class="form-group">
										<label for="e_detalle_usu_red">Detalle Usu Red.</label>
										<select class="form-control" id="e_detalle_usu_red" name="e_detalle_usu_red" placeholder="Detalle Requerimiento">
											<option value="0">Seleccione</option>
											<?php 
												$bancos = ControladorUtilidades::getData('sc_tipo_servicio', null, null);
												foreach($bancos as $key => $value){
													echo '<option value="'.$value['id_tps_i'].'">'.$value['desc_tps_v'].'</option>';
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<label for="e_detalle_obse_usu_re">Observacion Usuario de Red</label>
										<input type="text" class="form-control" id="e_detalle_obse_usu_re" name="e_detalle_obse_usu_re" placeholder="Observacion Usuario de Red">
									</div>
								</div>
        					</div>
        					<div class="row" id="e_DetalleCorreo" style="display:none;">
        						<div class="col-md-3">
									<div class="form-group">
										<label for="e_detalle_correo">Detalle Correo</label>
										<select class="form-control" id="e_detalle_correo" name="e_detalle_correo" placeholder="Detalle Requerimiento">
											<option value="0">Seleccione</option>
											<?php 
												$bancos = ControladorUtilidades::getData('sc_tipo_servicio', null, null);
												foreach($bancos as $key => $value){
													echo '<option value="'.$value['id_tps_i'].'">'.$value['desc_tps_v'].'</option>';
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<label for="e_detalle_obse_correo">Grupos de correo en los que debe darse de alta:</label>
										<input type="text" class="form-control" id="e_detalle_obse_correo" name="e_detalle_obse_correo" placeholder="Grupos de correo en los que debe darse de alta:">
									</div>
								</div>
        					</div>
        					<div class="row" id="e_DetalleSAP" style="display:none;">
        						<div class="col-md-3">
									<div class="form-group">
										<label for="e_detalle_Sap">Detalle SAP</label>
										<select class="form-control" id="e_detalle_Sap" name="e_detalle_Sap" placeholder="Detalle Requerimiento">
											<option value="0">Seleccione</option>
											<?php 
												$bancos = ControladorUtilidades::getData('sc_tipo_servicio', null, null);
												foreach($bancos as $key => $value){
													echo '<option value="'.$value['id_tps_i'].'">'.$value['desc_tps_v'].'</option>';
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<label for="detalle_obse_sap">Transacciones requeridas:</label>
										<input type="text" class="form-control" id="e_detalle_obse_sap" name="e_detalle_obse_sap" placeholder="Transacciones requeridas:">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="detalle_Sap_acc">Accesos SAP:</label>
										<select class="form-control" id="e_detalle_Sap_acc" name="e_detalle_Sap_acc" placeholder="Accesos SAP">
											<option value="0">Seleccione</option>
											<?php 
												$bancos = ControladorUtilidades::getData('sc_tipo_servicio_sap', null, null);
												foreach($bancos as $key => $value){
													echo '<option value="'.$value['tip_ser_sap_id_i'].'">'.$value['tip_desc_sap_v'].'</option>';
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="serv_id_i">
											<input type="checkbox" value="1" id="e_che_sap_prod" 	name="e_che_sap_prod"> SAP Productivo
										</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="serv_id_i">
											<input type="checkbox" value="2" id="e_che_sap_des" 	name="e_che_sap_des"> SAP Desarrollo
										</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="serv_id_i">
											<input type="checkbox" value="3" id="e_che_sap_cal" 	name="e_che_sap_cal"> SAP Calidad
										</label>
									</div>
								</div>
        					</div>
        					<div class="row" id="e_DetalleAccesoInternet" style="display:none;">
								<div class="col-md-12">
									<div class="form-group">
										<label for="e_detalle_obse_accesoIn">Observaciones Acceso Internet:</label>
										<input type="text" class="form-control" id="e_detalle_obse_accesoIn" name="e_detalle_obse_accesoIn" placeholder="Observaciones:">
									</div>
								</div>
        					</div>
        					<div class="row" id="e_DetalleBiman" style="display:none;">
								<div class="col-md-12">
									<div class="form-group">
										<label for="e_detalle_obse_Biman">Observaciones Biman:</label>
										<input type="text" class="form-control" id="e_detalle_obse_Biman" name="e_detalle_obse_Biman" placeholder="Observaciones:">
									</div>
								</div>
        					</div>
        					<div class="row" id="e_DetalleGil" style="display:none;">
								<div class="col-md-12">
									<div class="form-group">
										<label for="e_detalle_obse_Gil">Observaciones GIL:</label>
										<input type="text" class="form-control" id="e_detalle_obse_Gil" name="e_detalle_obse_Gil" placeholder="Observaciones:">
									</div>
								</div>
        					</div>
        					<div class="row" id="e_DetalleConsignates" style="display:none;">
								<div class="col-md-12">
									<div class="form-group">
										<label for="e_detalle_obse_Consignates">Observaciones Consignantes:</label>
										<input type="text" class="form-control" id="e_detalle_obse_Consignates" name="e_detalle_obse_Consignates" placeholder="Observaciones:">
									</div>
								</div>
        					</div>
        					<div class="row" id="e_DetalleQuery" style="display:none;">
								<div class="col-md-12">
									<div class="form-group">
										<label for="e_detalle_obse_Query">Observaciones Query:</label>
										<input type="text" class="form-control" id="e_detalle_obse_Query" name="e_detalle_obse_Query" placeholder="Observaciones:">
									</div>
								</div>
        					</div>
        				</div>
        			</div>

        			<div class="card shadow mb-4">
				        <div class="card-header py-3">
				            <h6 class="m-0 font-weight-bold text-primary">
				            	ACTIVOS REQUERIDOS
				            </h6>
				        </div>
        				<div class="card-body">
        					<div class="row">
        						<div class="col-md-3">
									<div class="form-group">
										<label for="e_detalle_equipo_C">Equipo de cómputo</label>
										<select class="form-control" id="e_detalle_equipo_C" name="e_detalle_equipo_C" placeholder="Detalle Requerimiento">
											<option value="0">Seleccione</option>
											<option value="ESCRITORIO">Escritorio</option>
											<option value="PORTATIL">Portatil</option>
										</select>
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<label for="e_detalle_obse_equipo_C">Equipo de cómputo Observación</label>
										<input type="text" class="form-control" id="e_detalle_obse_equipo_C" disabled name="e_detalle_obse_equipo_C" placeholder="Equipo de cómputo Observación">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="e_detalle_soft_espe">Software especial: </label>
										<select class="form-control" id="e_detalle_soft_espe" name="e_detalle_soft_espe" placeholder="Software especial: ">
											<option value="0">Seleccione</option>
											<option value="SI">Si</option>
											<option value="NO">No</option>
										</select>
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<label for="e_detalle_obse_soft_espe">Justificación Software Especial</label>
										<input type="text" class="form-control" id="e_detalle_obse_soft_espe" disabled name="e_detalle_obse_soft_espe" placeholder="Justificación Software Especial">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="e_detalle_vpn">VPN: </label>
										<select class="form-control" id="e_detalle_vpn" name="e_detalle_vpn" placeholder="Software especial: ">
											<option value="0">Seleccione</option>
											<option value="SI">Si</option>
											<option value="NO">No</option>
										</select>
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<label for="e_detalle_obse_vpn">Justificación VPN</label>
										<input type="text" class="form-control" id="e_detalle_obse_vpn" name="e_detalle_obse_vpn" disabled placeholder="Justificación VPN">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="e_detalle_Otro">Otros requerimientos: </label>
										<select class="form-control" id="e_detalle_Otro" name="e_detalle_Otro" placeholder="Software especial: ">
											<option value="0">Seleccione</option>
											<option value="SI">Si</option>
											<option value="NO">No</option>
										</select>
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<label for="e_detalle_obse_Otro">Justificación Otros Requerimientos</label>
										<input type="text" class="form-control" disabled id="e_detalle_obse_Otro" name="e_detalle_obse_Otro" placeholder="Justificación Otros Requerimientos">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="e_detalle_telefonia">Telefonía fija:</label>
										<select class="form-control" id="e_detalle_telefonia" name="e_detalle_telefonia" placeholder="Telefonía fija:">
											<option value="0">Seleccione</option>
											<option value="LOCAL">Llamadas Local</option>
											<option value="CELULAR">Llamadas a Celular</option>
											<option value="INTERNACIONAL">Llamadas Internacionales</option>
											<option value="TODAS">Todas</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="e_detalle_celular_">Celular:</label>
										<select class="form-control" id="e_detalle_celular_" name="e_detalle_celular_" placeholder="Celular">
											<option value="0">Seleccione</option>
											<option value="NUEVO">Nuevo</option>
											<option value="REPOSICION">Reposición</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="e_detalle_impr">Configuracion Impresora:</label>
										<select class="form-control" id="e_detalle_impr" name="e_detalle_impr" placeholder="Configuracion Impresora:">
											<option value="0">Seleccione</option>
											<option value="BLAYNEG">Blanco y Negro</option>
											<option value="COLOR">Color</option>
											<option value="AMBAS">Ambas</option>
										</select>
									</div>
								</div>
							</div>
        				</div>
        			</div>

        			<div class="card shadow mb-4">
				        <div class="card-header py-3">
				            <h6 class="m-0 font-weight-bold text-primary">
				            	OTROS DETALLES
				            </h6>
				        </div>
        				<div class="card-body">
        					<div class="row">
								<div class="col">
									<div class="form-group">
										<label for="e_sol_imagen_datos">Imagen Evidencia 1</label>
										<input type="file" class="form-control NuevaFoto" id="e_sol_imagen_datos" name="e_sol_imagen_datos" placeholder="Imagen Evidencia 1">
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label for="e_sol_imagen_datos_evidencia">Imagen Evidencia 2</label>
										<input type="file" class="form-control NuevaFoto" id="e_sol_imagen_datos_evidencia" name="e_sol_imagen_datos_evidencia" placeholder="Imagen Evidencia 2">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group">
										<a href="#" id="hrefVerEvidencia" >Ver Evidencia Cargada</a>
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<a href="#" id="hrefVerEvidencia2" >Ver Evidencia Cargada</a>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3"> 
									<div class="form-group">
										<label for="e_sol_prio_id_i">Prioridad</label>
										<select class="form-control" id="e_sol_prio_id_i" name="e_sol_prio_id_i" placeholder="Prioridad">
											<?php 
												$prioridades = ControladorUtilidades::getData('sc_prioridades', null, null);
												foreach($prioridades as $key => $value){
													echo '<option value="'.$value['pri_id_i'].'">'.$value['pri_desc_v'].'</option>';
												}
											?>

										</select>
									</div>
								</div>
								<div class="col-md-6"> 
									<div class="form-group">
										<label for="e_sol_tec_usu_id_i_i">Asignar A</label>
										<select class="form-control" id="e_sol_tec_usu_id_i_i" name="e_sol_tec_usu_id_i_i" placeholder="Tecnico">
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
										<label for="e_sol_estado_e">Estado</label>
										<select class="form-control" id="e_sol_estado_e" name="e_sol_estado_e" placeholder="Estado">
											<option value="3">Pendiente</option>
											<option value="4">Asignado</option>
											<option value="7">En curso</option>
											<option value="5">Solucionado</option>
											<option value="6">Cerrado sin Solución</option>

										</select>
									</div>
								</div>
							</div>
        				</div>
        			</div>

        			<?php if($_SESSION['perfil'] == '4'){ ?>
        			<div class="card shadow mb-4">
				        <div class="card-header py-3">
				            <h6 class="m-0 font-weight-bold text-primary">
				            	OBSERVACIONES
				            </h6>
				        </div>
        				<div class="card-body">
        					<div class="row">
        						<div class="col">
        							<div class="form-group">
										<label for="e_observaciones_usuarios_finales">Documentación Caso</label>
										<textarea class="form-control" id="e_observaciones_usuarios_finales" name="e_observaciones_usuarios_finales" placeholder="Documentación Caso"></textarea>
									</div>
        						</div>
        					</div>
        				</div>
        			</div>
        			<?php } ?>
        			<div class="card shadow mb-4">
				        <div class="card-header py-3">
				            <h6 class="m-0 font-weight-bold text-primary">
				            	SEGUIMIENTO
				            </h6>
				        </div>
        				<div class="card-body">
        					<div class="row">
        						<div class="col">
        							<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<td>#</td>
												<td>Observación</td>
												<td>Realizada Por</td>
												<td>Fecha</td>
											</tr>
										</thead>
										<tbody id="cuerpoObservaciones">
											
										</tbody>
									</table>
        						</div>
        					</div>
        				</div>
        			</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="sol_id_i_e" id="sol_id_i_e">
					<button type="button" class="btn btn-primary" id="e_enviarFormNuevo">Guardar</button>
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
	Solicitudes = {
		insertSolicitudes:function(dataTableEmpresas){
			var FormularioRichard = new FormData($("#nuevoUsuario")[0]);
	        $.ajax({
	            url: 'ajax/solicitudes.ajax.php',
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
	                    alertify.error('Proceso terminado, '+data.message);
	                }else{
	                    alertify.success('Proceso terminado, '+data.message);
	                }
	                dataTableEmpresas.ajax.reload();
	                $("#nuevoUsuario")[0].reset();
	                $("#modalIngresarSolicitudes").modal('hide');
	            },
	            //si ha ocurrido un error
	            error: function(){
	                alertify.error('Error al realizar el proceso');
	            }
	        });
		},

		updateSolicitudes:function(dataTableEmpresas){
			var FormUpdate = new FormData($("#editarSolicitud")[0]);
	        $.ajax({
	            url: 'ajax/solicitudes.ajax.php',
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
	                $("#editarSolicitud")[0].reset();
	                $("#modalEditarSolicitudes").modal('hide');
	            },
	            //si ha ocurrido un error
	            error: function(){
	                alertify.error('Error al realizar el proceso');
	            }
	        });
		},

		deleteSolicitudes:function(idUsuario, dataTableEmpresas){
			$.ajax({
	            url: 'ajax/solicitudes.ajax.php',
	            type  : 'post',
	            data: { usu_id_i_d : idUsuario},
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

		getSolicitud:function(idUsuario){
			$.ajax({
	            url: 'ajax/solicitudes.ajax.php',
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
	            	if(data != false){
	            
		                $("#e_sol_tip_sol_id_i").val(2);
		                $("#e_cli_identificacion_v").val(data.cli_documento_v);
		                $("#e_cli_nombres").val(data.cli_nombre_v);
		                $("#e_cli_fecha_ingreso_d").val(data.cli_fecha_ingreso_d);
		                $("#e_cli_numero_empleado_v").val(data.cli_numero_empleado_v);
		                $("#e_cli_usuario_red_v").val(data.cli_usuario_red_v);
		                $("#e_cli_usuario_sap_v").val(data.cli_usuario_sap_v);
		                $("#e_cli_cargo_v").val(data.cli_cargo_v);
		                $("#e_cli_area_i").val(data.cli_area_i);
		                $("#e_cli_planta_id_i").val(data.cli_planta_id_i);

		                /*Parte de otros Requerimientos*/
		                $("#e_detalle_equipo_C").val(data.sol_equipo_v).change();
		                $("#e_detalle_obse_equipo_C").val(data.sol_equipo_observacion_t);
		                $("#e_detalle_soft_espe").val(data.sol_soft_especial_v).change();
		                $("#e_detalle_obse_soft_espe").val(data.sol_observacion_software_t);

		                $("#e_detalle_vpn").val(data.sol_vpn_v).change();
		                $("#e_detalle_obse_vpn").val(data.sol_observacion_vpn_t);
		                $("#e_detalle_Otro").val(data.sol_otro_req_v).change();
		                $("#e_detalle_obse_Otro").val(data.sol_observacion_otro_r_t);

		                $("#e_detalle_telefonia").val(data.sol_telefonia_fija_v).change();
		                $("#e_detalle_celular_").val(data.sol_celular_v).change();
		                $("#e_detalle_impr").val(data.sol_configura_imp_v).change();

		                /*Prioriodad y asigancion*/
	                 	$("#e_sol_prio_id_i").val(data.sol_prioridad_i).change();
		                $("#e_sol_tec_usu_id_i_i").val(data.sol_asignado_a_i).change();
		                $("#e_sol_estado_e").val(data.sol_estado_i).change();

		                if(data.inc_ruta_evi_p_v != null && data.inc_ruta_evi_p_v != ''){
		                	$("#hrefVerEvidencia").attr('href', data.inc_ruta_evi_p_v);
		                }else{
		                	$("#hrefVerEvidencia").attr('href', '#');
		                }

		                if(data.inc_ruta_evi_s_v != null && data.inc_ruta_evi_s_v != ''){
		                	$("#hrefVerEvidencia2").attr('href', data.inc_ruta_evi_s_v);
		                }else{
		                	$("#hrefVerEvidencia2").attr('href', '#');
		                }

		                if(data.inc_req_usuario_red_i != 0){
		                	$("#e_che_usuario_R").attr('checked', true);
		                	$("#e_DetalleUsuarioRed").show();
		                	$("#e_detalle_usu_red").val(data.inc_req_det_usu_red_i);
		                	$("#e_detalle_obse_usu_re").val(data.inc_req_obs_usu_red_observ_v);
		                }else{
		                	$("#e_che_usuario_R").attr('checked', false);
		                	$("#e_DetalleUsuarioRed").hide();
		                	$("#e_detalle_usu_red").val(0);
		                	$("#e_detalle_obse_usu_re").val('');
		                }

		                if(data.inc_req_correo_i != 0){
		                	$("#e_che_correo").attr('checked', true);
		                	$("#e_DetalleCorreo").show();
		                	$("#e_detalle_correo").val(data.inc_req_det_correo_i);
		                	$("#e_detalle_obse_correo").val(data.inc_req_det_correo_obse_v);
		                }else{
		                	$("#e_che_correo").attr('checked', false);
		                	$("#e_DetalleCorreo").hide();
		                	$("#e_detalle_correo").val(0);
		                	$("#e_detalle_obse_correo").val('');
		                }

		                if(data.inc_req_biman_i != 0){
		                	$("#e_che_Biman").attr('checked', true);
		                	$("#e_DetalleBiman").show();
		                	$("#e_detalle_obse_Biman").val(data.inc_req_det_obser_biman_v);
		                }else{
		                	$("#e_che_Biman").attr('checked', false);
		                	$("#e_DetalleBiman").hide();
		                	$("#e_detalle_obse_Biman").val('');
		                }

		                if(data.inc_req_consig_i != 0){
		                	$("#e_che_acceso_consignates").attr('checked', true);
		                	$("#e_DetalleConsignates").show();
		                	$("#e_detalle_obse_Consignates").val(data.inc_req_det_obser_consign_v);
		                }else{
		                	$("#e_che_acceso_consignates").attr('checked', false);
		                	$("#e_DetalleConsignates").hide();
		                	$("#e_detalle_obse_Consignates").val('');
		                }

		                if(data.inc_req_gil_i != 0){
		                	$("#e_che_acceso_gil").attr('checked', true);
		                	$("#e_DetalleGil").show();
		                	$("#e_detalle_obse_Gil").val(data.inc_req_det_obser_gil_v);
		                }else{
		                	$("#e_che_acceso_gil").attr('checked', false);
		                	$("#e_DetalleGil").hide();
		                	$("#e_detalle_obse_Gil").val('');
		                }

		                if(data.inc_req_query_i != 0){
		                	$("#e_che_acceso_query").attr('checked', true);
		                	$("#e_DetalleQuery").show();
		                	$("#e_detalle_obse_Query").val(data.inc_req_det_obser_query_v);
		                }else{
		                	$("#e_che_acceso_query").attr('checked', false);
		                	$("#e_DetalleQuery").hide();
		                	$("#e_detalle_obse_Query").val('');
		                }

		                if(data.inc_req_acceso_in_i != 0){
		                	$("#e_che_acceso_inter").attr('checked', true);
		                	$("#E_DetalleAccesoInternet").show();
		                	$("#e_detalle_obse_accesoIn").val(data.inc_req_det_obser_internet_acc_v);
		                }else{
		                	$("#e_che_acceso_inter").attr('checked', false);
		                	$("#E_DetalleAccesoInternet").hide();
		                	$("#e_detalle_obse_accesoIn").val('');
		                }

		                if(data.inc_req_usuario_sap_i != 0){
		                	$("#e_che_usuario_S").attr('checked', true);
		                	$("#e_DetalleSAP").show();
		                	$("#e_detalle_Sap").val(data.inc_req_det_sap)
		                	$("#e_detalle_obse_sap").val(data.inc_req_det_sap_obser_v);
		                	$("#e_detalle_Sap_acc").val(data.inc_req_det_sap_accesos_i);

		                	if(data.inc_req_det_sap_produc_i == 1){
		                		$("#e_che_sap_prod").attr('checked', true);
		                	}else{
		                		$("#e_che_sap_prod").attr('checked', false);
		                	}
		                	if(data.inc_req_det_sap_desarr_i == 1){
		                		$("#e_che_sap_des").attr('checked', true);
		                	}else{
		                		$("#e_che_sap_des").attr('checked', false);
		                	}
		                	if(data.inc_req_det_sap_cali_i == 1){
		                		$("#e_che_sap_cal").attr('checked', true);
		                	}else{
		                		$("#e_che_sap_cal").attr('checked', false);
		                	}
		                }else{
		                	$("#e_che_usuario_S").attr('checked', false);
		                	$("#e_DetalleSAP").hide();
		                	$("#e_detalle_Sap").val(0)
		                	$("#e_detalle_obse_sap").val('');
		                	$("#e_detalle_Sap_acc").val(0);
	                		$("#e_che_sap_prod").attr('checked', false);
	                		$("#e_che_sap_des").attr('checked', false);
	                		$("#e_che_sap_cal").attr('checked', false);
		                }
		                Solicitudes.getObservaciones(data.sol_id_i);    
		                $("#sol_id_i_e").val(data.sol_id_i);
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
	            url: 'ajax/sucursales.ajax.php',
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
	               		if(sucursal != 0){
		               		$("#sol_suc_id_i_e").val(sucursal);
		               	} 
	               	} 
	        
	            },
	            //si ha ocurrido un error
	            error: function(){
	                alertify.error('Error al realizar el proceso');
	            }
	        });
		},

		getFechasDisponibles:function(fecha, tecnico, horas, descHora = 0){
			$.ajax({
	            url: 'ajax/solicitudes.ajax.php',
	            type  : 'post',
	            data: { getHorasByFecha : fecha, datoTecnico: tecnico, horas: horas},
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
	            	var option = '';
	            	if(horas != 0){
                		option = "<option value='"+horas+"'>"+descHora+"</option>";
	                } else {
	                	option = "<option value='0'> Seleccione </option>";
	                }
	           
	                $.each(data, function(item, i){
	               		option += "<option value='"+i.hor_id_id+"'> "+i.hor_desc_v+" </option>";
	                });	  
	                $("#sol_hora_cita_v").html(option); 
	                $("#sol_hora_cita_v_i").html(option);  
	                $("#sol_hora_cita_v_e").html(option);       
	                      
	            },
	            //si ha ocurrido un error
	            error: function(){
	                alertify.error('Error al realizar el proceso');
	            }
	        });
		},

		insertSolicitudesAsignacion:function(dataTableEmpresas){
			var FormularioRichard = new FormData($("#nuevaAsignacion")[0]);
	        $.ajax({
	            url: 'ajax/solicitudes.ajax.php',
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
	                    alertify.error('Proceso terminado, '+data.message);
	                }else{
	                    alertify.success('Proceso terminado, '+data.message);
	                }
	                dataTableEmpresas.ajax.reload();
	                $("#nuevaAsignacion")[0].reset();
	                $("#modalAsignarSolicitudes").modal('hide');
	            },
	            //si ha ocurrido un error
	            error: function(){
	                alertify.error('Error al realizar el proceso');
	            }
	        });
		},

		getSolicitudAsignada:function(idSolicitud, edicion = 0){
			$.ajax({
	            url: 'ajax/solicitudes.ajax.php',
	            type  : 'post',
	            data: { getDatosAsignados : idSolicitud},
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
	            		if(edicion == '0'){
	            			$("#sol_tec_usu_id_i").val(data.asi_usu_tec_id_i);
			            	$("#sol_fecha_cita_d").val(data.asi_fecha_d);
			            	Solicitudes.getFechasDisponibles(data.asi_fecha_d , data.asi_usu_tec_id_i, data.asi_hor_id_i, data.hor_desc_v);
	            		}else{
	            			$("#sol_tec_usu_id_i_e").val(data.asi_usu_tec_id_i);
			            	$("#sol_fecha_cita_d_e").val(data.asi_fecha_d);
			            	Solicitudes.getFechasDisponibles(data.asi_fecha_d , data.asi_usu_tec_id_i, data.asi_hor_id_i, data.hor_desc_v);
	            		}
	            	}
	            	
	            },
	            //si ha ocurrido un error
	            error: function(){
	                alertify.error('Error al realizar el proceso');
	            }
	        });
		},

		getObservaciones:function(idUsuario){
			$.ajax({
	            url: 'ajax/solicitudes.ajax.php',
	            type  : 'post',
	            data: { getObservaciones : idUsuario},
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
	            		var tabla = '';
	    				
	            		$.each(data, function(item, i){
	            			console.log(i);
		               		tabla += '<tr>';
		               		tabla += '<td>'+(Number(item)+1)+'</td>';
		               		tabla += '<td>'+i.obs_desc_v+'</td>';
		               		tabla += '<td>'+i.usu_nombre_v+' '+ i.usu_apellido_v +'</td>';
		               		tabla += '<td>'+i.obs_fecha_d+'</td>';
		               		tabla += '</tr>';
		                });	
		                $("#cuerpoObservaciones").html(tabla);
	            	}else{
	            		$("#cuerpoObservaciones").html('<tr><td colspan="4" style="text-align:center;"><b>No hay Observaciones</b></td></tr>');
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
        edicion += '<li><a class="dropdown-item btnEditarSolicitudes" title="Editar incidencia" id_solicitud data-toggle="modal" data-target="#modalEditarSolicitudes" href="#">EDITAR</a></li>';
        edicion += '<li class="divider"></li>';
        <?php
        	}
  			if ($_SESSION['perf_del_i'] == 1) {	
  		?>
        edicion += '<li><a class="dropdown-item btnEliminarSolicitudes" title="Eliminar incidencia" id_solicitud href="#">ELIMINAR</a></li>';
        edicion += '<li class="divider"></li>';
        <?php
        	}
    		if ($_SESSION['perfil'] == '4'){
    	?>
    	edicion += '<li><a class="dropdown-item btnEditarSolicitudes" data-toggle="modal" data-target="#modalEditarSolicitudes"  title="Datos de Incidencia" id_solicitud href="#">VER INCIDENCIA</a></li>';
        edicion += '<li class="divider"></li>';
        <?php
        	}
        	if($_SESSION['perfil'] != 4){
    	?>
    	edicion += '<li><a class="dropdown-item btnExportarPDF" title="Exportar PDF" id_solicitud href="#">EXPORTAR</a></li>';
        edicion += '<li class="divider"></li>';
        <?php
        	}
    	?>
     	edicion += '</ul>';
    	edicion += '</div>';

		var dataTableEmpresas = $('#dataTableUsuario').DataTable({
		    "ajax": 'ajax/solicitudes.ajax.php?allDatos=true',
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
		        },
		        {
	        	 	"targets": -3,
            		"data": null,
        			"className": "text-center",
            		 render: {
                		display: function (data, type, row) {
                			if ( row[3] !== 'SOLUCIONADO' ){
	            				if ( row[4] === 'ALTA' ) {
	                     			return '<span style="text-align:center; color:red;">ALTA</span>';
	                         	}else if(row[4] === 'MEDIA'){
	                         		return '<span style="text-align:center; color:orange;">MEDIA</span>';
	                         	}else if(row[4] === 'BAJA'){
	                         		return '<span style="text-align:center; color:yellow;">BAJA</span>';
	                         	}else{
	                         		return '<span style="text-align:center; color:yellow;"></span>';
	                         	}	
                         	}else{
                         		return '<span style="text-align:center; color:green;">'+ row[4] +'</span>';
                         	}
            			}
                		
                	}
		        },
		        {
	        	 	"targets": -4,
            		"data": null,
        			"className": "text-center",
            		 render: {
                		display: function (data, type, row) {
                			if ( row[3] !== 'SOLUCIONADO' ){
	            				if ( row[4] === 'ALTA' ) {
	                     			return '<span style="text-align:center; color:red;">'+row[3]+'</span>';
	                         	}else if(row[4] === 'MEDIA'){
	                         		return '<span style="text-align:center; color:orange;">'+row[3]+'</span>';
	                         	}else if(row[4] === 'BAJA'){
	                         		return '<span style="text-align:center; color:yellow;">'+row[3]+'</span>';
	                         	}else{
	                         		return '<span></span>';
	                         	}	
                         	}else{
                         		return '<span style="text-align:center; color:green;">'+row[3]+'</span>';
                         	}
            			}
                		
                	}
		        }
	        ],
	        "order": [[ 3, "desc" ]],
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
		    $(this).attr("id_solicitud", data[6]);
		});

		/* Esta parte es para traer los datos de la edicion */
	    $('#dataTableUsuario tbody').on("click", ".btnVerSolicitudes", function(){
	        var x = $(this).attr('id_solicitud');
	        Solicitudes.getSolicitudAsignada(x);
	       	$("#sol_id_i_eAsi").val(x);
	    });
		/*Activar funcionalidad de boton eliminar*/
	    $('#dataTableUsuario tbody').on("click", ".btnEliminarSolicitudes", function(){
	        var x = $(this).attr('id_solicitud');
			swal({
	            title: '¿Está seguro de borrar la incidencia?',
	            text: "¡Si no lo está puede cancelar la accíón!",
	            type: 'warning',
	            showCancelButton: true,
	            confirmButtonColor: '#3085d6',
	            cancelButtonColor: '#d33',
	            cancelButtonText: 'Cancelar',
	            confirmButtonText: 'Si, borrar incidencia!'
	        },function(isConfirm) {
	            if (isConfirm) {
					Solicitudes.deleteSolicitudes(x,dataTableEmpresas);
				}
			});			
	    });

	    $('#dataTableUsuario tbody').on("click", ".btnEditarSolicitudes", function(){
	        var x = $(this).attr('id_solicitud');
	       	Solicitudes.getSolicitud(x);
	    });

	    $("#dataTableUsuario tbody").on('click', '.btnExportarPDF', function(){
	    	var x = $(this).attr('id_solicitud');
	    	window.open('ajax/exportrarPdf.ajax.php?numeroOrden='+x);
	    });

		$("#enviarFormNuevo").click(function(){
			Solicitudes.insertSolicitudes(dataTableEmpresas);
		});

		$("#e_enviarFormNuevo").click(function(){
			Solicitudes.updateSolicitudes(dataTableEmpresas);
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

		$("#cli_fecha_ingreso_d").datepicker({
	        language: "es",
	        autoclose: true,
	        todayHighlight: true
	    }) 

	    $("#sol_fecha_cita_d_i").datepicker({
	        language: "es",
	        autoclose: true,
	        todayHighlight: true
	    }).on('changeDate', function (selected) {
	        var minDate = new Date(selected.date.valueOf());
	        Solicitudes.getFechasDisponibles( moment(minDate).format('YYYY-MM-DD') , $("#sol_tec_usu_id_i_i").val(), 0, 0);
	    }); 

	    $("#sol_fecha_cita_d_e").datepicker({
	        language: "es",
	        autoclose: true,
	        todayHighlight: true
	    }).on('changeDate', function (selected) {
	        var minDate = new Date(selected.date.valueOf());
	        Solicitudes.getFechasDisponibles( moment(minDate).format('YYYY-MM-DD') , $("#sol_tec_usu_id_i_e").val(), 0, 0);
	    });
	    

	    $(".NuevaFoto").change(function(){
		    var imax = $(this).attr('valor');
		    var imagen = this.files[0];
		    console.log(imagen);
		    /* Validar el tipo de imagen */
		    if(imagen['type'] != 'image/jpeg' && imagen['type'] != 'image/png' && imagen['type'] != "application/pdf" ){
		        $(".NuevaFoto").val('');
		        swal({
		            title : "Error al subir el archivo",
		            text  : "El archivo debe estar en formato PNG , JPG, PDF",
		            type  : "error",
		            confirmButtonText : "Cerrar"
		        });
		    }else if(imagen['size'] > 2000000 ) {
		        $(".NuevaFoto").val('');
		        swal({
		            title : "Error al subir el archivo",
		            text  : "El archivo no debe pesar mas de 2MB",
		            type  : "error",
		            confirmButtonText : "Cerrar"
		        });
		    }else{

		        if(imagen['type'] == 'image/jpeg' || imagen['type'] == 'image/png' || imagen['type'] != "application/pdf"){
		            var datosImagen = new FileReader();
		            datosImagen.readAsDataURL(imagen);

		            $(datosImagen).on("load", function(event){
		                var rutaimagen = event.target.result;
		                if(imax == '0'){
		                    $(".previsualizar").attr('src', rutaimagen);
		                }else{
		                    $(".previsualizar"+imax).attr('src', rutaimagen);
		                }
		                
		                
		            }); 
		        }
		        
		    }   
		});

		$("#che_usuario_R").on('change', function(){
			if($(this).is(':checked')){
				$("#DetalleUsuarioRed").show();
			}else{
				$("#DetalleUsuarioRed").hide();
			}
		});

		$("#che_correo").on('change', function(){
			if($(this).is(':checked')){
				$("#DetalleCorreo").show();
			}else{
				$("#DetalleCorreo").hide();
			}
		});

		$("#che_usuario_S").on('change', function(){
			if($(this).is(':checked')){
				$("#DetalleSAP").show();
			}else{
				$("#DetalleSAP").hide();
			}
		});

		$("#che_Biman").on('change', function(){
			if($(this).is(':checked')){
				$("#DetalleBiman").show();
			}else{
				$("#DetalleBiman").hide();
			}
		});

		$("#che_acceso_consignates").on('change', function(){
			if($(this).is(':checked')){
				$("#DetalleConsignates").show();
			}else{
				$("#DetalleConsignates").hide();
			}
		});

		$("#che_acceso_gil").on('change', function(){
			if($(this).is(':checked')){
				$("#DetalleGil").show();
			}else{
				$("#DetalleGil").hide();
			}
		});

		$("#che_acceso_query").on('change', function(){
			if($(this).is(':checked')){
				$("#DetalleQuery").show();
			}else{
				$("#DetalleQuery").hide();
			}
		});

		$("#che_acceso_inter").on('change', function(){
			if($(this).is(':checked')){
				$("#DetalleAccesoInternet").show();
			}else{
				$("#DetalleAccesoInternet").hide();
			}
		});

		$("#detalle_equipo_C").on('change', function(){
			if($(this).val() != '0'){
				$("#detalle_obse_equipo_C").attr('disabled', false);
			}else{
				$("#detalle_obse_equipo_C").attr('disabled', true);
			}
		});

		$("#detalle_soft_espe").on('change', function(){
			if($(this).val() == 'SI'){
				$("#detalle_obse_soft_espe").attr('disabled', false);
			}else{
				$("#detalle_obse_soft_espe").attr('disabled', true);
			}
		});

		$("#detalle_vpn").on('change', function(){
			if($(this).val() == 'SI'){
				$("#detalle_obse_vpn").attr('disabled', false);
			}else{
				$("#detalle_obse_vpn").attr('disabled', true);
			}
		});

		$("#detalle_Otro").on('change', function(){
			if($(this).val() == 'SI'){
				$("#detalle_obse_Otro").attr('disabled', false);
			}else{
				$("#detalle_obse_Otro").attr('disabled', true);
			}
		});

		$("#sol_tip_sol_id_i").on('change', function(){
			if($(this).val() == '1' || $(this).val() == '3'){
				$(".cliente").attr('disabled', false);
			}else{
				$(".cliente").attr('disabled', true);
			}
		});

		/*Para capturar la cedula y validarla*/
		$("#cli_identificacion_v").on('change', function(){
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
                      	$("#cli_nombres").val(respuesta.cli_nombre_v);
                      	$("#cli_fecha_ingreso_d").val(respuesta.cli_fecha_ingreso_d);                 
                      	$("#cli_numero_empleado_v").val(respuesta.cli_numero_empleado_v);
                       	$("#cli_usuario_red_v").val(respuesta.cli_usuario_red_v);
                       	$("#cli_usuario_sap_v").val(respuesta.cli_usuario_sap_v);
                       	$("#cli_cargo_v").val(respuesta.cli_cargo_v);
                       	$("#cli_area_i").val(respuesta.cli_area_i);
                       	$("#cli_area_i").val(respuesta.cli_area_i).change();
                       	$("#cli_planta_id_i").val(respuesta.cli_planta_id_i);
                       	$("#cli_planta_id_i").val(respuesta.cli_planta_id_i).change();
                       	$("#sol_cli_correo_v").val(respuesta.cli_correo_v);
                       	if(respuesta.cli_tip_sol_id_i == 1){
                       	 	$("#sol_tip_sol_id_i").val(2).change();
                       	}else{
                       		$("#sol_tip_sol_id_i").val(4).change();
                       	}
                    }else{
                    	/*Cliente no registrado*/
                    	console.log("cliente no registrado");
                       	$("#sol_tip_sol_id_i").val(1).change();
                       	
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


		$("#e_che_usuario_R").on('change', function(){
			if($(this).is(':checked')){
				$("#e_DetalleUsuarioRed").show();
			}else{
				$("#e_DetalleUsuarioRed").hide();
			}
		});

		$("#e_che_correo").on('change', function(){
			if($(this).is(':checked')){
				$("#e_DetalleCorreo").show();
			}else{
				$("#e_DetalleCorreo").hide();
			}
		});

		$("#e_che_usuario_S").on('change', function(){
			if($(this).is(':checked')){
				$("#e_DetalleSAP").show();
			}else{
				$("#e_DetalleSAP").hide();
			}
		});

		$("#e_che_Biman").on('change', function(){
			if($(this).is(':checked')){
				$("#e_DetalleBiman").show();
			}else{
				$("#e_DetalleBiman").hide();
			}
		});

		$("#e_che_acceso_consignates").on('change', function(){
			if($(this).is(':checked')){
				$("#e_DetalleConsignates").show();
			}else{
				$("#e_DetalleConsignates").hide();
			}
		});

		$("#e_che_acceso_gil").on('change', function(){
			if($(this).is(':checked')){
				$("#e_DetalleGil").show();
			}else{
				$("#e_DetalleGil").hide();
			}
		});

		$("#e_che_acceso_query").on('change', function(){
			if($(this).is(':checked')){
				$("#e_DetalleQuery").show();
			}else{
				$("#e_DetalleQuery").hide();
			}
		});

		$("#e_che_acceso_inter").on('change', function(){
			if($(this).is(':checked')){
				$("#e_DetalleAccesoInternet").show();
			}else{
				$("#e_DetalleAccesoInternet").hide();
			}
		});

		$("#e_detalle_equipo_C").on('change', function(){
			if($(this).val() != '0'){
				$("#e_detalle_obse_equipo_C").attr('disabled', false);
			}else{
				$("#e_detalle_obse_equipo_C").attr('disabled', true);
			}
		});

		$("#e_detalle_soft_espe").on('change', function(){
			if($(this).val() == 'SI'){
				$("#e_detalle_obse_soft_espe").attr('disabled', false);
			}else{
				$("#e_detalle_obse_soft_espe").attr('disabled', true);
			}
		});

		$("#e_detalle_vpn").on('change', function(){
			if($(this).val() == 'SI'){
				$("#e_detalle_obse_vpn").attr('disabled', false);
			}else{
				$("#e_detalle_obse_vpn").attr('disabled', true);
			}
		});

		$("#e_detalle_Otro").on('change', function(){
			if($(this).val() == 'SI'){
				$("#e_detalle_obse_Otro").attr('disabled', false);
			}else{
				$("#e_detalle_obse_Otro").attr('disabled', true);
			}
		});

	});
</script>