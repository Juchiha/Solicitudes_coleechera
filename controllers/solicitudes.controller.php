<?php
	class ControladorSolicitudes extends ControladorPlantilla
	{
		
			
		public static function insertDatos(){
			if(isset($_POST['usu_documento_v_i'])){ //les coloco i al final para saber que es insercion
				$datos = array(
					'sol_suc_id_i' 					=> $_POST['sol_suc_id_i_i'], 
					'sol_tec_usu_id_i' 				=> $_POST['sol_tec_usu_id_i_i'],
					'sol_fecha_solicitud_d'  		=> $_POST['sol_fecha_solicitud_d_i'],
					'sol_nombre_solicitante_v'		=> $_POST['sol_nombre_solicitante_v_i'],
					'sol_hora_cita_v' 				=> $_POST['sol_hora_cita_v_i'],//pendiente
					'sol_requerimiento_t'			=> $_POST['sol_requerimiento_t_i'],
					'sol_orden_trabajo'				=> $_POST['sol_orden_trabajo_i'],
					'sol_observaciones_t'			=> $_POST['sol_observaciones_t_i'],
					'sol_est_id_i'					=> $_POST['sol_est_id_i']
				);

				$respuesta = SolicitudesModelo::insertDatos($datos);
				if($respuesta == "ok"){
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
			if(isset($_POST['usu_documento_v_e'])){ //e de edicion
				$password = $_POST['usu_password_v_actual_e'];
				//aqui te dejo que valides si el campo password viene vacion o no
				//si tiene datos se lo asignas a password si no no
				//md5($_POST['usu_password_v_e'])
				$datos = array(
					'sol_suc_id_i' 					=> $_POST['sol_suc_id_i_e'], 
					'sol_tec_usu_id_i' 				=> $_POST['sol_tec_usu_id_i_e'],
					'sol_fecha_solicitud_d'  		=> $_POST['sol_fecha_solicitud_d_e'],
					'sol_nombre_solicitante_v'		=> $_POST['sol_nombre_solicitante_v_e'],
					'sol_hora_cita_v' 				=> $_POST['sol_hora_cita_v_e'],
					'sol_requerimiento_t'			=> $_POST['sol_requerimiento_t_e'],
					'sol_orden_trabajo'				=> $_POST['sol_orden_trabajo_e'],
					'sol_observaciones_t'			=> $_POST['sol_observaciones_t_e'],
					'sol_est_id_i'					=> $_POST['sol_est_id_e'],
					'sol_id_i'						=> $_POST['sol_id_i_e']
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
		*Desc.  => borrar un usuario se solicitan lops campos que llegan por metodo post usu_id_i
		*Method => POST
		*Return => array {
		*	code => [exito : 1, Falla : 0, Otro : -1],
		*   desc => 'Mensaje de resultado'	
		*}
		**/	
		public static function deleteDatos(){
		    if(isset($_POST['sol_id_i'])){ 
			    $datos = $_POST["sol_id_i"];
			    $respuesta = SolicitudesModelo::deleteDatos($datos);
				if($respuesta == "ok"){
					return json_encode(array('code' => 1, 'message' => 'Solicitud Eliminada con exito'));
			    }else{	
					return json_encode(array('code' => 0, 'message' => 'Solicitud no Eliminada'));
				}
			}
		}
		
	}
