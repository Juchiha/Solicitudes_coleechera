<?php
	class ControladorSucursales extends ControladorPlantilla
	{
			
		public static function insertDatos(){
			if(isset($_POST['suc_nombre_v_i '])){ 
				$datos = array(
					'suc_nombre_v' 		=> $_POST['suc_nombre_v_i'], 
					'suc_ban_id_i' 		=> $_POST['suc_ban_id_i_i'],
					'suc_codigo_v'  		=> $_POST['suc_codigo_v_i'],
					'suc_ciu_id_i'			=> $_POST['suc_ciu_id_i_i'],
					'suc_direccion_v' 			=> $_POST['suc_direccion_v_i'],
					'suc_est_id_i'			=> $_POST['suc_est_id_i_i'],
				);

				$respuesta = SucursalModelo::insertDatos($datos);
				if($respuesta == "ok"){
					return json_encode(array('code' => 1, 'message' => 'Sucursal guardadado con exito'));
				}else{	
					return json_encode(array('code' => 0, 'message' => 'Sucursal no guardadado'));
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
			if(isset($_POST['suc_id_id_e'])){ //e de edicion
				//$password = $_POST['usu_password_v_actual_e'];
				//aqui te dejo que valides si el campo password viene vacion o no
				//si tiene datos se lo asignas a password si no no
				//md5($_POST['usu_password_v_e'])
			$datos = array(
					'suc_nombre_v' 		=> $_POST['suc_nombre_v_e'], 
					'suc_ban_id_i' 		=> $_POST['suc_ban_id_i_e'],
					'suc_codigo_v'  		=> $_POST['suc_codigo_v_e'],
					'suc_ciu_id_i'			=> $_POST['suc_ciu_id_i_e'],
					'suc_direccion_v' 			=> $_POST['suc_direccion_v_e'],
					'suc_est_id_i'			=> $_POST['suc_est_id_i_e'],
					'suc_id_id'			=> $_POST['suc_id_id_e'],
				);

				$respuesta = SucursalModelo::UpdateDatos($datos);
				if($respuesta == "ok"){
					return json_encode(array('code' => 1, 'message' => 'Sucursal Actualizada con exito'));
				}else{	
					return json_encode(array('code' => 0, 'message' => 'Sucursal no Actualizada'));
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
			if(isset($_POST['suc_id_id'])){ 
				$datos = $_POST["suc_id_id"];
				$respuesta = SucursalModelo::deleteDatos($datos);
					if($respuesta == "ok"){
						return json_encode(array('code' => 1, 'message' => 'Usuario Eliminado con exito'));
					}else{	
						return json_encode(array('code' => 0, 'message' => 'Usuario no Eliminado'));
					}
				}
			}
		}
		