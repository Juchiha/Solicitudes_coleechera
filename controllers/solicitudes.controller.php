<?php
	class ControladorSolicitudes extends ControladorPlantilla
	{
		
			
		public static function insertDatos(){
			if(isset($_POST['sol_tip_sol_id_i'])){ //les coloco i al final para saber que es insercion
				$tecnico = 0;
				$estado = 3;
				$ruta = '';
				$ruta_2 = '';
				if(isset($_FILES['sol_imagen_datos']['tmp_name']) && !empty($_FILES['sol_imagen_datos']['tmp_name']) ){
	                $ruta = self::putImage($_FILES['sol_imagen_datos']['tmp_name'], $_FILES["sol_imagen_datos"]["type"] , __DIR__."/../views/inicidencias_img/", 'views/inicidencias_img/');
	            }

	            if(isset($_FILES['sol_imagen_datos_evidencia']['tmp_name']) && !empty($_FILES['sol_imagen_datos_evidencia']['tmp_name']) ){
	                $ruta_2 = self::putImage($_FILES['sol_imagen_datos_evidencia']['tmp_name'], $_FILES["sol_imagen_datos_evidencia"]["type"] , __DIR__."/../views/evidencias_img/", 'views/evidencias_img/');
	            }

				if(isset($_POST['sol_tec_usu_id_i_i'])){
					$tecnico = $_POST['sol_tec_usu_id_i_i'] ;
					$estado = 4;
				}
				$palica = 0;
				if(isset($_POST['sol_aplica_i_i'])){
					$palica = 1;
				}

				$id_Cliente = 0;
				if($_POST['sol_tip_sol_id_i'] == '1' || $_POST['sol_tip_sol_id_i'] == '3' ){
					/*Insertamos el cliente*/
					$datosCliente = array(
						'cli_documento_v' 	=> $_POST['cli_identificacion_v'],
						'cli_nombre_v' 			=> $_POST['cli_nombres'],
						'cli_fecha_ingreso_d' 	=> $_POST['cli_fecha_ingreso_d'],
						'cli_numero_empleado_v' => $_POST['cli_numero_empleado_v'],
						'cli_usuario_red_v' 	=> $_POST['cli_usuario_red_v'],
						'cli_usuario_sap_v' 	=> $_POST['cli_usuario_sap_v'],
						'cli_cargo_v' 			=> $_POST['cli_cargo_v'],
						'cli_area_i' 			=> $_POST['cli_area_i'],
						'cli_ciu_id_i' 			=> 0,
						'cli_planta_id_i' 		=> $_POST['cli_planta_id_i'],
						'cli_direccion_v' 		=> 0,
						'cli_est_id_i' 			=> 1
					);

					$id_Cliente = ClientesModelo::insertDatos($datosCliente);
					if($id_Cliente == 'error'){
						echo json_encode(array('code' => -1, "Message" => 'No se pudo crear el cliente'));
					}
				}else{
					$resp = ClientesModelo::getDatos('sc_clientes', 'cli_documento_v', $_POST['cli_identificacion_v']);
					$id_Cliente = $resp['cli_id_i'];
				}

				$che_usuario_R = 0;
				$che_correo = 0;
				$che_usuario_S = 0;
				$che_Biman = 0;
				$che_acceso_inter = 0;
				$che_acceso_consignates = 0;
				$che_acceso_gil = 0;
				$che_acceso_query = 0;

				if(isset($_POST['che_usuario_R'])){
					$che_usuario_R = 1;
				}
				if(isset($_POST['che_correo'])){
					$che_correo = 1;
				}
				if(isset($_POST['che_usuario_S'])){
					$che_usuario_S = 1;
				}
				if(isset($_POST['che_Biman'])){
					$che_Biman = 1;
				}
				if(isset($_POST['che_acceso_inter'])){
					$che_acceso_inter = 1;
				}
				if(isset($_POST['che_acceso_consignates'])){
					$che_acceso_consignates = 1;
				}
				if(isset($_POST['che_acceso_gil'])){
					$che_acceso_gil = 1;
				}
				if(isset($_POST['che_acceso_query'])){
					$che_acceso_query = 1;
				}


				$detalle_usu_red = null;
				$detalle_obse_usu_re = null;
				$detalle_correo = null;
				$detalle_obse_correo = null;
				$detalle_Sap = null;
				$detalle_obse_sap = null;
				$detalle_Sap_acc = null;
				$che_sap_prod = 0;
				$che_sap_des = 0;
				$che_sap_cal = 0;
				$detalle_obse_accesoIn = null;
				$detalle_obse_Biman = null;
				$detalle_obse_Gil = null;
				$detalle_obse_Consignates = null;
				$detalle_obse_Query = null;

				if(isset($_POST['detalle_usu_red'])){
					$detalle_usu_red = $_POST['detalle_usu_red'];	
				}
				if(isset($_POST['detalle_obse_usu_re'])){
					$detalle_obse_usu_re = $_POST['detalle_obse_usu_re'];	
				}
				if(isset($_POST['detalle_correo'])){
					$detalle_correo = $_POST['detalle_correo'];	
				}
				if(isset($_POST['detalle_obse_correo'])){
					$detalle_obse_correo = $_POST['detalle_obse_correo'];	
				}
				if(isset($_POST['detalle_Sap'])){
					$detalle_Sap = $_POST['detalle_Sap'];	
				}
				if(isset($_POST['detalle_obse_sap'])){
					$detalle_obse_sap = $_POST['detalle_obse_sap'];	
				}
				if(isset($_POST['detalle_Sap_acc'])){
					$detalle_Sap_acc = $_POST['detalle_Sap_acc'];	
				}
				if(isset($_POST['che_sap_prod'])){
					$che_sap_prod = 1;	
				}
				if(isset($_POST['che_sap_des'])){
					$che_sap_des = 1;	
				}
				if(isset($_POST['che_sap_cal'])){
					$che_sap_cal = 1;	
				}
				if(isset($_POST['detalle_obse_accesoIn'])){
					$detalle_obse_accesoIn = $_POST['detalle_obse_accesoIn'];	
				}
				if(isset($_POST['detalle_obse_Biman'])){
					$detalle_obse_Biman = $_POST['detalle_obse_Biman'];	
				}
				if(isset($_POST['detalle_obse_Gil'])){
					$detalle_obse_Gil = $_POST['detalle_obse_Gil'];	
				}
				if(isset($_POST['detalle_obse_Query'])){
					$detalle_obse_Query = $_POST['detalle_obse_Query'];	
				}
				if(isset($_POST['detalle_obse_Consignates'])){
					$detalle_obse_Consignates = $_POST['detalle_obse_Consignates'];	
				}

				$detalle_obse_equipo_C = null;
				$detalle_obse_soft_espe = null;
				$detalle_obse_vpn = null;
				$detalle_obse_Otro = null;

				if(isset($_POST['detalle_obse_equipo_C'])){
					$detalle_obse_equipo_C = $_POST['detalle_obse_equipo_C'];	
				}
				if(isset($_POST['detalle_obse_soft_espe'])){
					$detalle_obse_soft_espe = $_POST['detalle_obse_soft_espe'];	
				}
				if(isset($_POST['detalle_obse_vpn'])){
					$detalle_obse_vpn = $_POST['detalle_obse_vpn'];	
				}
				if(isset($_POST['detalle_obse_Otro'])){
					$detalle_obse_Otro = $_POST['detalle_obse_Otro'];	
				}

				/*Validacion usuario red*/
				$_usuarioRed = 0;
				$_detalle_usu_red = null;
				$_detalle_obse_usu_re = null;
				if(isset($_POST['che_usuario_R'])){
					$_usuarioRed = 1;
				}
				if(isset($_POST['detalle_obse_usu_re'])){
					$_detalle_obse_usu_re = $_POST['detalle_obse_usu_re'];
				}
				if(isset($_POST['detalle_usu_red'])){
					$_detalle_usu_red = $_POST['detalle_usu_red'];
				}

				/*Validacion Correo*/
				$_che_correo = 0;
				$_detalle_correo = null;
				$_detalle_obse_correo = null;
				if(isset($_POST['che_correo'])){
					$_che_correo = 1;
				}
				if(isset($_POST['detalle_obse_correo'])){
					$_detalle_obse_correo = $_POST['detalle_obse_correo'];
				}
				if(isset($_POST['detalle_correo'])){
					$_detalle_correo = $_POST['detalle_correo'];
				}

				/*Validacion Usuario SAP*/
				$_che_usuario_S = 0;
				$_detalle_Sap = null;
				$_detalle_obse_sap = null;
				$_detalle_Sap_acc = 0;
				$_che_sap_prod = 0;
				$_che_sap_des = 0;
				$_che_sap_cal = 0;
				if(isset($_POST['che_usuario_S'])){
					$_che_usuario_S = 1;
				}
				if(isset($_POST['detalle_Sap'])){
					$_detalle_Sap = $_POST['detalle_Sap'];
				}
				if(isset($_POST['detalle_obse_sap'])){
					$_detalle_obse_sap = $_POST['detalle_obse_sap'];
				}
				if(isset($_POST['detalle_Sap_acc'])){
					$_detalle_Sap_acc = 1;
				}
				if(isset($_POST['che_sap_prod'])){
					$_che_sap_prod = 1;
				}
				if(isset($_POST['che_sap_des'])){
					$_che_sap_des = $_POST['che_sap_des'];
				}
				if(isset($_POST['che_sap_cal'])){
					$_che_sap_cal = $_POST['che_sap_cal'];
				}

				/*Validacion Biman*/
				$_che_Biman = 0;
				$_detalle_obse_Biman = null;
				if(isset($_POST['che_Biman'])){
					$_che_Biman = 1;
				}
				if(isset($_POST['detalle_obse_Biman'])){
					$_detalle_obse_Biman = $_POST['detalle_obse_Biman'];
				}
				
				/*Validacion cceso a Internet*/
				$_che_acceso_inter = 0;
				$_detalle_obse_accesoIn = null;
				if(isset($_POST['che_acceso_inter'])){
					$_che_acceso_inter = 1;
				}
				if(isset($_POST['detalle_obse_accesoIn'])){
					$_detalle_obse_accesoIn = $_POST['detalle_obse_accesoIn'];
				}

				/*Validacion Consignante*/
				$_che_acceso_consignates = 0;
				$_detalle_obse_Consignates = null;
				if(isset($_POST['che_acceso_consignates'])){
					$_che_acceso_consignates = 1;
				}
				if(isset($_POST['detalle_obse_Consignates'])){
					$_detalle_obse_Consignates = $_POST['detalle_obse_Consignates'];
				}

				/*Validacion GIL*/
				$_che_acceso_gil = 0;
				$_detalle_obse_Gil = null;
				if(isset($_POST['che_acceso_gil'])){
					$_che_acceso_gil = 1;
				}
				if(isset($_POST['detalle_obse_Gil'])){
					$_detalle_obse_Gil = $_POST['detalle_obse_Gil'];
				}

				/*Validacion Query*/
				$_che_acceso_query = 0;
				$_detalle_obse_Query = null;
				if(isset($_POST['che_acceso_query'])){
					$_che_acceso_query = 1;
				}
				if(isset($_POST['detalle_obse_Query'])){
					$_detalle_obse_Query = $_POST['detalle_obse_Query'];
				}


				$datos = array(
					'sol_tip_sol_id_i' 				=> $_POST['sol_tip_sol_id_i'], 
					'sol_clie_id_i'  				=> $id_Cliente,
					'sol_fecha_solicitud'			=> date('Y-m-d'),
					'sol_asignado_a_i'				=> $_POST['sol_tec_usu_id_i_i'],
					'sol_estado_i'					=> $_POST['sol_estado_e'],
					'sol_equipo_v'					=> $_POST['detalle_equipo_C'],
					'sol_equipo_observacion_t'		=> $detalle_obse_equipo_C,
					'sol_soft_especial_v'			=> $_POST['detalle_soft_espe'],
					'sol_configura_imp_v'			=> $_POST['detalle_impr'],
					'sol_observacion_software_t'	=> $detalle_obse_soft_espe,
					'sol_telefonia_fija_v' 			=> $_POST['detalle_telefonia'], 
					'sol_celular_v'  				=> $_POST['detalle_celular_'],
					'sol_vpn_v'						=> $_POST['detalle_vpn'],
					'sol_observacion_vpn_t'			=> $detalle_obse_vpn,
					'sol_otro_req_v'				=> $_POST['detalle_Otro'],
					'sol_observacion_otro_r_t'		=> $detalle_obse_Otro,
					'sol_prioridad_i'				=> $_POST['sol_prio_id_i'],
					'inc_req_usuario_red_i'			=> $_usuarioRed,
					'inc_req_det_usu_red_i'			=> $_detalle_usu_red,
					'inc_req_obs_usu_red_observ_v'	=> $_detalle_obse_usu_re,
					'inc_req_correo_i'				=> $_che_correo,
					'inc_req_det_correo_i' 			=> $_detalle_correo,
					'inc_req_det_correo_obse_v'		=> $_detalle_obse_correo,
					'inc_req_biman_i'				=> $_che_Biman,
					'inc_req_det_obser_biman_v'		=> $_detalle_obse_Biman,
					'inc_req_consig_i'					=> $_che_acceso_consignates,
					'inc_req_det_obser_consign_v'		=> $_detalle_obse_Consignates,
					'inc_req_gil_i'						=> $_che_acceso_gil,
					'inc_req_det_obser_gil_v'			=> $_detalle_obse_Gil,
					'inc_req_query_i'					=> $_che_acceso_query,
					'inc_req_det_obser_query_v'			=> $_detalle_obse_Query,
					'inc_req_acceso_in_i'				=> $_che_acceso_inter,
					'inc_req_det_obser_internet_acc_v'	=> $_detalle_obse_accesoIn,
					'inc_req_usuario_sap_i'				=> $_che_usuario_S,
					'inc_req_det_sap'					=> $_detalle_Sap,
					'inc_req_det_sap_obser_v'			=> $_detalle_obse_sap,
					'inc_req_det_sap_accesos_i'			=> $_detalle_Sap_acc,
					'inc_req_det_sap_produc_i'			=> $_che_sap_prod,
					'inc_req_det_sap_desarr_i'			=> $_che_sap_des,
					'inc_req_det_sap_cali_i'			=> $_che_sap_cal,
					'inc_ruta_evi_p_v'					=> $ruta,
					'inc_ruta_evi_s_v'					=> $ruta_2
				);

				$respuesta = SolicitudesModelo::insertDatos($datos);
				if($respuesta != "error"){
					$orden = SolicitudesModelo::getTotalSolicitudesDay();

					$respuestaX = ModeloAuth:: actualizarUsuarioPostLogin('sc_solicitudes_coolechera', 'sol_orden_trabajo_v', date('Ymd').$orden['total'], 'sol_id_i', $respuesta);

					return json_encode(array('code' => 1, 'message' => 'Solicitud guardadada con exito'));
				}else{	
					return json_encode(array('code' => 0, 'message' => 'Solicitud no guardadado'));
				}
			}
		}


		/**
		*Desc.  => editar un usuario se solicitan lops campos que llegan por metodo post usu_tip_doc_id_i_i, usu_documento_v_i, usu_per_id_i_i, usu_est_id_i_i, usu_banco_i_i, usu_usuario_v_i, usu_password_v_i, usu_id_i
		*Method => POST
		*Return => array {
		*	code => [exito : 1, Falla : 0, Otro : -1],
		*   desc => 'Mensaje de resultado'	
		*}
		**/	
		public static function UpdateDatos(){
			if(isset($_POST['sol_id_i_e'])){ 
				$tecnico = 0;
				if(isset($_POST['sol_tec_usu_id_i_e'])){
					$tecnico = $_POST['sol_tec_usu_id_i_e'] ;
				}//e de edicion
				$inicidencia = self::getData('sc_solicitudes', 'sol_id_i', $_POST['sol_id_i_e']);
				$estado = $inicidencia['sol_est_id_i'];
				$prioridad = $inicidencia['sol_prio_id'];
				$banco = $inicidencia['sol_ban_id_i'];
				$sucursal = $inicidencia['sol_suc_id_i'];

				$ruta = $inicidencia['sol_ruta_ev_v'];
				$ruta_2 = $inicidencia['sol_ruta_ot_v'];
				$tipoIni = $inicidencia['sol_id_tps_i'];
				if(isset($_FILES['sol_imagen_datos_e']['tmp_name']) && !empty($_FILES['sol_imagen_datos_e']['tmp_name']) ){
	                $ruta = self::putImage($_FILES['sol_imagen_datos_e']['tmp_name'], $_FILES["sol_imagen_datos_e"]["type"] , __DIR__."/../views/inicidencias_img/", 'views/inicidencias_img/');
	            }

	            if(isset($_FILES['sol_imagen_datos_e_evidencia']['tmp_name']) && !empty($_FILES['sol_imagen_datos_e_evidencia']['tmp_name']) ){
	                $ruta_2 = self::putImage($_FILES['sol_imagen_datos_e_evidencia']['tmp_name'], $_FILES["sol_imagen_datos_e_evidencia"]["type"] , __DIR__."/../views/evidencias_img/", 'views/evidencias_img/');
	            }

				if(isset($_POST['sol_estado_e'])){
					$estado = $_POST['sol_estado_e'];
				}

				if(isset($_POST['sol_prio_id_e'])){
					$prioridad = $_POST['sol_prio_id_e'];
				}

				if(isset($_POST['sol_ban_id_e'])){
					$banco = $_POST['sol_ban_id_e'];
				}

				if(isset($_POST['sol_suc_id_i_e'])){
					$sucursal = $_POST['sol_suc_id_i_e'];
				}

				$palica = 0;
				if(isset($_POST['sol_aplica_i_e'])){
					$palica = 1;
				}

				$datos = array(
					'sol_suc_id_i' 					=> $sucursal, 
					'sol_requerimiento_t'			=> $_POST['sol_requerimiento_t_e'],
					'sol_observaciones_t'			=> $_POST['sol_observaciones_t_e'],
					'sol_tec_usu_id_i'			    => $tecnico,
					'sol_ban_id_i'					=> $banco,
					'sol_id_i'						=> $_POST['sol_id_i_e'],
					'sol_prio_id'					=> $prioridad,
					'sol_est_id_i'					=> $estado,
					'sol_ruta_ot_v'					=> $ruta,
					'sol_ruta_ev_v'					=> $ruta_2,
					'sol_id_tps_i'					=> $tipoIni,
					'sol_aplica_i'					=> $palica 
				);

				$respuesta = SolicitudesModelo::UpdateDatos($datos);
				if($respuesta == "ok"){
					//Aqui vamos a hacer una validacion de si viene o no la observacion
					if(isset($_POST['sol_observaciones_t_e']) && $_POST['sol_observaciones_t_e'] != ''){
						$datos = array (
							'obs_desc_v'      => $_POST['sol_observaciones_t_e'], //observacion
							'obs_usu_id_i'      => $_SESSION['codigo'],//quien hace la observacion
							'obs_sol_id_i'      => $_POST['sol_id_i_e'], //codigo solicitud
							'obs_fecha_d'      => date('Y-m-d H:i:s') //fecha Observacion
						);
						$observacion = SolicitudesModelo::insertObservaciones($datos);	
					}

					if(isset($_POST['sol_estado_e']) && $_POST['sol_estado_e'] == '5'){
						//Solucionado
						$respuestaX = SolicitudesModelo::mdlEditar('sc_solicitudes', 'sol_fecha_solucion=\''.date('Y-m-d').'\'', 'sol_id_i='.$_POST['sol_id_i_e']); 
					}

					if($tecnico != 0 && $_POST['sol_fecha_cita_d_e'] != '' && $_POST['sol_fecha_cita_d_e'] != 0 ){
						$eliminar = SolicitudesModelo::deleteDatosAsignacion($_POST['sol_id_i_e']);
						$datos = array(
							'asi_usu_tec_id_i' 			=> $tecnico, 
							'asi_fecha_d' 				=> $_POST['sol_fecha_cita_d_e'],
							'asi_hor_id_i'  			=> $_POST['sol_hora_cita_v_e'],
							'asi_observacion_v'		    => $_POST['sol_observaciones_t_e'],
							'asi_sol_id_i'				=> $_POST['sol_id_i_e'],
							'asi_fecha_aignacion'		=> date('Y-m-d')
						);
						$respuesta = SolicitudesModelo::insertDatosAsignar($datos);
					}

					return json_encode(array('code' => 1, 'message' => 'Solicitud actualizada con exito'));
				}else{	
					return json_encode(array('code' => 0, 'message' => 'Solicitud no actualizada'));
				}
			}
		}
		

		/**
		*Desc.  => editar un usuario se solicitan lops campos que llegan por metodo post usu_tip_doc_id_i_i, usu_documento_v_i, usu_per_id_i_i, usu_est_id_i_i, usu_banco_i_i, usu_usuario_v_i, usu_password_v_i, usu_id_i
		*Method => POST
		*Return => array {
		*	code => [exito : 1, Falla : 0, Otro : -1],
		*   desc => 'Mensaje de resultado'	
		*}
		**/	
		public static function UpdateDatosAsignacion(){
			if(isset($_POST['sol_tec_usu_id_i'])){ //e de edicion
				$eliminar = SolicitudesModelo::deleteDatosAsignacion($_POST['sol_id_i_e']);

				$datos = array(
					'asi_usu_tec_id_i' 			=> $_POST['sol_tec_usu_id_i'], 
					'asi_fecha_d' 				=> $_POST['sol_fecha_cita_d'],
					'asi_hor_id_i'  			=> $_POST['sol_hora_cita_v'],
					'asi_observacion_v'		    => $_POST['sol_observaciones_t_i'],
					'asi_sol_id_i'				=> $_POST['sol_id_i_e'],
					'asi_fecha_aignacion'		=> date('Y-m-d')
				);

				$respuesta = SolicitudesModelo::insertDatosAsignar($datos);
				if($respuesta == "ok"){
					$respuestaX = ModeloAuth:: actualizarUsuarioPostLogin('sc_solicitudes', 'sol_est_id_i', '4', 'sol_id_i', $_POST['sol_id_i_e']);

					//Aqui vamos a hacer una validacion de si viene o no la observacion
					if(isset($_POST['sol_observaciones_t_i']) && $_POST['sol_observaciones_t_i'] != ''){
						$datos = array (
							'obs_desc_v'      => $_POST['sol_observaciones_t_i'], //observacion
							'obs_usu_id_i'      => $_SESSION['codigo'],//quien hace la observacion
							'obs_sol_id_i'      => $_POST['sol_id_i_e'], //codigo solicitud
							'obs_fecha_d'      => date('Y-m-d H:i:s') //fecha Observacion
						);
						$observacion = SolicitudesModelo::insertObservaciones($datos);	
					}

					return json_encode(array('code' => 1, 'message' => 'Solicitud actualizada con exito'));
				}else{	
					return json_encode(array('code' => 0, 'message' => 'Solicitud no actualizada'));
				}
			}
		}

		/**
		*Desc.  => borrar un usuario se solicitan lops campos que llegan por metodo post usu_id_i
		*Method => POST
		*Return => array {
		*	code => [exito : 1, Falla : 0, Otro : -1],
		*   desc => 'Mensaje de resultado'	
		*}
		**/	
		public static function deleteDatos(){
		    if(isset($_POST['usu_id_i_d'])){ 
			    $datos = $_POST["usu_id_i_d"];
			    $respuesta = SolicitudesModelo::deleteDatos($datos);
				if($respuesta == "ok"){
					return json_encode(array('code' => 1, 'message' => 'Solicitud Eliminada con exito'));
			    }else{	
					return json_encode(array('code' => 0, 'message' => 'Solicitud no Eliminada'));
				}
			}
		}
		
	}
