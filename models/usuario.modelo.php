<?php
	class UsuarioModelo extends ModeloDAO
	{
		public static function insertDatos($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("INSERT INTO 
			 sc_usuarios(
					usu_tip_doc_id_i,
					usu_documento_v,
					usu_nombre_v,
					usu_apellido_v,
					usu_per_id_i, 
					usu_est_id_i,
					usu_fecha_registro_d, 
					usu_usuario_v,
					usu_password_v,
					usu_correo_v)
				VALUES(	
					:usu_tip_doc_id_i,
					:usu_documento_v,
					:usu_nombre_v,
					:usu_apellido_v,
					:usu_per_id_i, 
					:usu_est_id_i,
					:usu_fecha_registro_d, 
					:usu_usuario_v,
					:usu_password_v,
					:usu_correo_v)");
			$stmt->bindParam(":usu_tip_doc_id_i", $datos['usu_tip_doc_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":usu_documento_v", $datos['usu_documento_v'], PDO::PARAM_STR);
			$stmt->bindParam(":usu_per_id_i", $datos['usu_per_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":usu_nombre_v", $datos['usu_nombre_v'], PDO::PARAM_STR);
			$stmt->bindParam(":usu_apellido_v", $datos['usu_apellido_v'], PDO::PARAM_STR);
			$stmt->bindParam(":usu_est_id_i", $datos['usu_est_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":usu_fecha_registro_d", $datos['usu_fecha_registro_d'], PDO::PARAM_STR);
			$stmt->bindParam(":usu_usuario_v", $datos['usu_usuario_v'], PDO::PARAM_STR);
			$stmt->bindParam(":usu_password_v", $datos['usu_password_v'], PDO::PARAM_STR);
			$stmt->bindParam(":usu_correo_v", $datos['usu_correo_v'], PDO::PARAM_STR);
			if($stmt->execute()){
				$stmt = null;
				return 'ok';
			}else{
				print_r($stmt->errorInfo());
				//self::logError('43', "Error insertando usuario.modelo.php => " + $stmt->errorInfo());
				return 'error';
			}	
		}
		
		public static function UpdateDatos($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("UPDATE 
					sc_usuarios 
				SET 
					usu_tip_doc_id_i = :usu_tip_doc_id_i,
					usu_documento_v = :usu_documento_v,
					usu_nombre_v = :usu_nombre_v,
					usu_apellido_v = :usu_apellido_v,
					usu_per_id_i = :usu_per_id_i,
					usu_est_id_i = :usu_est_id_i,
					usu_fecha_registro_d = :usu_fecha_registro_d,
					usu_usuario_v = :usu_usuario_v,
					usu_password_v = :usu_password_v,
					usu_correo_v =  :usu_correo_v
				WHERE 
					usu_id_i = :usu_id_i");

			$stmt->bindParam(":usu_tip_doc_id_i", $datos['usu_tip_doc_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":usu_documento_v", $datos['usu_documento_v'], PDO::PARAM_STR);
			$stmt->bindParam(":usu_nombre_v", $datos['usu_nombre_v'], PDO::PARAM_STR);
			$stmt->bindParam(":usu_apellido_v", $datos['usu_apellido_v'], PDO::PARAM_STR);
			$stmt->bindParam(":usu_per_id_i", $datos['usu_per_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":usu_est_id_i", $datos['usu_est_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":usu_fecha_registro_d", $datos['usu_fecha_registro_d'], PDO::PARAM_STR);
			$stmt->bindParam(":usu_usuario_v", $datos['usu_usuario_v'], PDO::PARAM_STR);
			$stmt->bindParam(":usu_password_v", $datos['usu_password_v'], PDO::PARAM_STR);
			$stmt->bindParam(":usu_correo_v", $datos['usu_correo_v'], PDO::PARAM_STR);
			$stmt->bindParam(":usu_id_i", $datos['usu_id_i'], PDO::PARAM_STR);
			if($stmt->execute()){
				$stmt = null;
				return 'ok';
			}else{
				self::logError('2404', "Error acttualizando usuario.modelo.php => " + $stmt->errorInfo());
				return 'error';
			}
		}

		public static function deleteDatos($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("DELETE FROM sc_usuarios WHERE usu_id_i  = :usu_id_i ");
			$stmt->bindParam(":usu_id_i", $datos, PDO::PARAM_STR);
			if($stmt->execute()){
				$stmt = null;
				return 'ok';
			}else{
				self::logError('2404', "Error borrando usuario.modelo.php => " + $stmt->errorInfo());
				return 'error';
			}
		}


	}


?>	