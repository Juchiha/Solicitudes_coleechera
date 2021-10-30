<?php
	class ControladorUsuarios extends ControladorPlantilla
	{
		/**
		*Desc.  => Crear un nuevo usuario se solicitan lops campos que llegan por metodo post usu_tip_doc_id_i_i, usu_documento_v_i, usu_per_id_i_i, usu_est_id_i_i, usu_banco_i_i, usu_usuario_v_i, usu_password_v_i
		*Method => POST
		*Return => array {
		*	code => [exito : 1, Falla : 0, Otro : -1],
		*   desc => 'Mensaje de resultado'	
		*}
		**/		
		public static function insertDatos(){
			if(isset($_POST['usu_documento_v_i'])){ //les coloco i al final para saber que es insercion
				$datos = array(
					'usu_tip_doc_id_i' 		=> $_POST['usu_tip_doc_id_i_i'], 
					'usu_documento_v' 		=> $_POST['usu_documento_v_i'],
					'usu_nombre_v' 			=> $_POST['usu_nombre_v_i'],
					'usu_apellido_v' 		=> $_POST['usu_apellido_v_i'],
					'usu_per_id_i'  		=> $_POST['usu_per_id_i_i'],
					'usu_est_id_i'			=> $_POST['usu_est_id_i_i'],
					'usu_fecha_registro_d'  => date('Y-m-d'), //Con esta funciona obtyengo la fecha actual
					'usu_usuario_v'			=> $_POST['usu_usuario_v_i'],
					'usu_password_v'		=> md5($_POST['usu_password_v_i']),
					'usu_correo_v'			=> $_POST['usu_correo_v_i']
				);

				$respuesta = UsuarioModelo::insertDatos($datos);
				if($respuesta == "ok"){
					return json_encode(array('code' => 1, 'message' => 'Usuario guardadado con exito'));
				}else{	
					return json_encode(array('code' => 0, 'message' => 'Usuario no guardadado'));
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
				if($_POST['usu_password_v_e'] != ''){
					$password = md5($_POST['usu_password_v_e']);
				}

				$datos = array(
					'usu_tip_doc_id_i' 		=> $_POST['usu_tip_doc_id_i_e'], 
					'usu_documento_v' 		=> $_POST['usu_documento_v_e'],
					'usu_nombre_v' 			=> $_POST['usu_nombre_v_e'],
					'usu_apellido_v' 		=> $_POST['usu_apellido_v_e'],
					'usu_per_id_i'  		=> $_POST['usu_per_id_i_e'],
					'usu_est_id_i'			=> $_POST['usu_est_id_i_e'],
					'usu_fecha_registro_d'  => date('Y-m-d'), //COn esta funciona obtyengo la fecha actual
					'usu_usuario_v'			=> $_POST['usu_usuario_v_e'],
					'usu_password_v'		=> $password,  //Con MD5 encripto lo que llegue en ese campo
					'usu_id_i'				=> $_POST['usu_id_i_e'],
					'usu_correo_v'			=> $_POST['usu_correo_v_e']	
				);

				$respuesta = UsuarioModelo::UpdateDatos($datos);
				if($respuesta == "ok"){
					return json_encode(array('code' => 1, 'message' => 'Usuario Editado con exito'));
				}else{	
					return json_encode(array('code' => 0, 'message' => 'Usuario no Editado'));
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
				$respuesta = UsuarioModelo::deleteDatos($datos);
				if($respuesta == "ok"){
					return json_encode(array('code' => 1, 'message' => 'Usuario Eliminado con exito'));
				}else{	
					return json_encode(array('code' => 0, 'message' => 'Usuario no Eliminado'));
				}
			}
		}
		
	}

	
