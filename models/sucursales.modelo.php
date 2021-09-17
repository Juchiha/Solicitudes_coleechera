<?php

class SucursalModelo extends ModeloDao{

	public static function insertDatos($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("INSERT INTO 
			 sc_sucursales(
					suc_nombre_v,
					suc_ban_id_i,
					suc_codigo_v, 
					suc_ciu_id_i,
					suc_direccion_v,
					suc_est_id_i)
				VALUES(	
					:suc_nombre_v,
					:suc_ban_id_i,
					:suc_codigo_v, 
					:suc_ciu_id_i,
					:suc_direccion_v,
					:suc_est_id_i)");
			$stmt->bindParam(":suc_nombre_v", $datos['suc_nombre_v'], PDO::PARAM_STR);
			$stmt->bindParam(":suc_ban_id_i", $datos['suc_ban_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":suc_codigo_v", $datos['suc_codigo_v'], PDO::PARAM_STR);
			$stmt->bindParam(":suc_ciu_id_i", $datos['suc_ciu_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":suc_est_id_i", $datos['suc_est_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":suc_direccion_v", $datos['suc_direccion_v'], PDO::PARAM_STR);
			if($stmt->execute()){
				$stmt = null;
				return 'ok';//$pdo->lastInsertId();
			}else{
				//self::logError('2404', "Error insertando sucursales.modelo.php => " + $stmt->errorInfo());
				return 'error';
			}	
		}

			public static function UpdateDatos($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("UPDATE 
					sc_sucursales 
				SET 
					suc_nombre_v = :suc_nombre_v,
					suc_ban_id_i = :suc_ban_id_i,
					suc_codigo_v = :suc_codigo_v,
					suc_ciu_id_i = :suc_ciu_id_i,
					suc_direccion_v = :suc_direccion_v,
					suc_est_id_i = :suc_est_id_i
				WHERE 
					suc_id_id = :suc_id_id");

			$stmt->bindParam(":suc_nombre_v", $datos['suc_nombre_v'], PDO::PARAM_STR);
			$stmt->bindParam(":suc_ban_id_i", $datos['suc_ban_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":suc_codigo_v", $datos['suc_codigo_v'], PDO::PARAM_STR);
			$stmt->bindParam(":suc_ciu_id_i", $datos['suc_ciu_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":suc_direccion_v", $datos['suc_direccion_v'], PDO::PARAM_STR);
			$stmt->bindParam(":suc_est_id_i", $datos['suc_est_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":suc_id_id", $datos['suc_id_id'], PDO::PARAM_STR);
			if($stmt->execute()){
				$stmt = null;
				return 'ok';
			}else{
				self::logError('2404', "Error actualizando sucursales.modelo.php => " + $stmt->errorInfo());
				return 'error';
			}
		}

		public static function deleteDatos($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("DELETE FROM sc_sucursales WHERE suc_id_id  = :suc_id_id ");
			$stmt->bindParam(":suc_id_id", $datos, PDO::PARAM_STR);
			if($stmt->execute()){
				$stmt = null;
				return 'ok';
			}else{
				self::logError('2404', "Error borrando sucursales.modelo.php => " + $stmt->errorInfo());
				return 'error';
			}
		}

}


?>