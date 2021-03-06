<?php
	class BancosModelo extends ModeloDAO
	{
		public static function insertDatos($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("INSERT INTO 
			 sc_bancos(
					ban_nombre_v,
					ban_est_id_i)
				VALUES(	
					:ban_nombre_v,
					:ban_est_id_i)");
			$stmt->bindParam(":ban_nombre_v", $datos['ban_nombre_v'], PDO::PARAM_STR);
			$stmt->bindParam(":ban_est_id_i", $datos['ban_est_id_i'], PDO::PARAM_STR);
			if($stmt->execute()){
				$stmt = null;
				return $pdo->lastInsertId();
			}else{
				self::logError('2404', "Error insertando bancos.modelo.php => " + $stmt->errorInfo());
				return 'error';
			}	
		}

		public static function UpdateDatos($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("UPDATE 
					sc_bancos 
				SET 
					ban_nombre_v = :ban_nombre_v,
					ban_est_id_i = :ban_est_id_i
				WHERE 
					ban_id_i = :ban_id_i");

			$stmt->bindParam(":ban_nombre_v", $datos['ban_nombre_v'], PDO::PARAM_STR);
			$stmt->bindParam(":ban_est_id_i", $datos['ban_est_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":ban_id_i", $datos['ban_id_i'], PDO::PARAM_STR);
			if($stmt->execute()){
				$stmt = null;
				return 'ok';
			}else{
				self::logError('2404', "Error actualizando bancos.modelo.php => " + $stmt->errorInfo());
				return 'error';
			}
		}

		public static function deleteDatos($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("DELETE FROM sc_bancos WHERE ban_id_i  = :ban_id_i ");
			$stmt->bindParam(":ban_id_i", $datos, PDO::PARAM_STR);
			if($stmt->execute()){
				$stmt = null;
				return 'ok';
			}else{
				self::logError('2404', "Error borrando bancos.modelo.php => " + $stmt->errorInfo());
				return 'error';
			}
		}

	}