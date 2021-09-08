<?php
class SolicitudesModelo extends ModeloDAO
	{
		public static function insertDatos($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("INSERT INTO 
			 sc_solicitudes(
					sol_suc_id_i,
					sol_tec_usu_id_i,
					sol_fecha_solicitud_d, 
					sol_nombre_solicitante_v,
					sol_hora_cita_v,
					sol_requerimiento_t, 
					sol_orden_trabajo,
					sol_observaciones_t,
					sol_est_id_i)
				VALUES(	
					:sol_suc_id_i,
					:sol_tec_usu_id_i,
					:sol_fecha_solicitud_d, 
					:sol_nombre_solicitante_v,
					:sol_hora_cita_v,
					:sol_requerimiento_t, 
					:sol_orden_trabajo,
					:sol_observaciones_t,
					:sol_est_id_i)");
			$stmt->bindParam(":sol_suc_id_i", $datos['sol_suc_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_tec_usu_id_i", $datos['sol_tec_usu_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_fecha_solicitud_d", $datos['sol_fecha_solicitud_d'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_nombre_solicitante_v", $datos['sol_nombre_solicitante_v'], PDO::PARAM_STR);
			$stmt->bindParam(":usu_est_id_i", $datos['usu_est_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_hora_cita_v", $datos['sol_hora_cita_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_requerimiento_t", $datos['sol_requerimiento_t'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_orden_trabajo", $datos['sol_orden_trabajo'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_observaciones_t", $datos['sol_observaciones_t'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_est_id_i", $datos['sol_est_id_i'], PDO::PARAM_STR);
			if($stmt->execute()){
				$stmt = null;
				return $pdo->lastInsertId();
			}else{
				self::logError('2404', "Error insertando solicitudes.modelo.php => " + $stmt->errorInfo());
				return 'error';
			}	
		}

		public static function UpdateDatos($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("UPDATE 
					sc_solicitudes 
				SET 
					sol_suc_id_i = :sol_suc_id_i,
					sol_tec_usu_id_i = :sol_tec_usu_id_i,
					sol_fecha_solicitud_d = :sol_fecha_solicitud_d,
					sol_nombre_solicitante_v = :sol_nombre_solicitante_v,
					sol_hora_cita_v = :sol_hora_cita_v,
					sol_requerimiento_t = :sol_requerimiento_t,
					sol_orden_trabajo = :sol_orden_trabajo,
					sol_observaciones_t = :sol_observaciones_t 
				WHERE 
					sol_est_id_i = :sol_est_id_i");

			$stmt->bindParam(":sol_suc_id_i", $datos['sol_suc_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_tec_usu_id_i", $datos['sol_tec_usu_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_fecha_solicitud_d", $datos['sol_fecha_solicitud_d'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_nombre_solicitante_v", $datos['sol_nombre_solicitante_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_hora_cita_v", $datos['sol_hora_cita_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_requerimiento_t", $datos['sol_requerimiento_t'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_orden_trabajo", $datos['sol_orden_trabajo'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_observaciones_t", $datos['sol_observaciones_t'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_est_id_i", $datos['sol_est_id_i'], PDO::PARAM_STR);
			if($stmt->execute()){
				$stmt = null;
				return 'ok';
			}else{
				self::logError('2404', "Error actualizando solicitudes.modelo.php => " + $stmt->errorInfo());
				return 'error';
			}
		}

			public static function deleteDatos($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("DELETE FROM sc_solicitudes WHERE sol_est_id_i  = :sol_est_id_i ");
			$stmt->bindParam(":sol_est_id_i", $datos, PDO::PARAM_STR);
			if($stmt->execute()){
				$stmt = null;
				return 'ok';
			}else{
				self::logError('2404', "Error borrando solicitudes.modelo.php => " + $stmt->errorInfo());
				return 'error';
			}
		}
	}
?>