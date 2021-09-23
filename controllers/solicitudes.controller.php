<?php
	class ControladorSolicitudes extends ControladorPlantilla
	{
		
			
		public static function insertDatos(){
			if(isset($_POST['sol_ban_id_i'])){ //les coloco i al final para saber que es insercion
				$datos = array(
					'sol_suc_id_i' 					=> $_POST['sol_suc_id_i_i'], 
					'sol_fecha_solicitud_d'  		=> date('Y-m-d'),
					'sol_usu_id_i'					=> $_SESSION['codigo'],
					'sol_requerimiento_t'			=> $_POST['sol_requerimiento_t_i'],
					'sol_observaciones_t'			=> $_POST['sol_observaciones_t_i'],
					'sol_ban_id_i'					=> $_POST['sol_ban_id_i'],
					'sol_est_id_i'					=> 3,
					'sol_prio_id'					=> $_POST['sol_prio_id_i']
				);

				$respuesta = SolicitudesModelo::insertDatos($datos);
				if($respuesta != "error"){
					$orden = SolicitudesModelo::getTotalSolicitudesDay();
					$respuestaX = ModeloAuth:: actualizarUsuarioPostLogin('sc_solicitudes', 'sol_orden_trabajo', date('Ymd').$orden['total'], 'sol_id_i', $respuesta);

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
			if(isset($_POST['sol_ban_id_e'])){ //e de edicion
				$datos = array(
					'sol_suc_id_i' 					=> $_POST['sol_suc_id_i_e'], 
					'sol_requerimiento_t'			=> $_POST['sol_requerimiento_t_e'],
					'sol_observaciones_t'			=> $_POST['sol_observaciones_t_e'],
					'sol_ban_id_i'					=> $_POST['sol_ban_id_e'],
					'sol_id_i'						=> $_POST['sol_id_i_e'],
					'sol_prio_id'					=> $_POST['sol_prio_id_e']
				);

				$respuesta = SolicitudesModelo::UpdateDatos($datos);
				if($respuesta == "ok"){
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
					'asi_sol_id_i'				=> $_POST['sol_id_i_e']
				);

				$respuesta = SolicitudesModelo::insertDatosAsignar($datos);
				if($respuesta == "ok"){
					$respuestaX = ModeloAuth:: actualizarUsuarioPostLogin('sc_solicitudes', 'sol_est_id_i', '4', 'sol_id_i', $_POST['sol_id_i_e']);

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
