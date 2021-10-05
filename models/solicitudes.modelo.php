<?php
class SolicitudesModelo extends ModeloDAO
	{
		public static function insertDatos($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("INSERT INTO 
			 sc_solicitudes(
					sol_suc_id_i,
					sol_fecha_solicitud_d, 
					sol_requerimiento_t, 
					sol_observaciones_t,
					sol_tec_usu_id_i,
					sol_usu_id_i,
					sol_ban_id_i,
					sol_est_id_i,
					sol_prio_id,
					sol_ruta_evidencia)
				VALUES(	
					:sol_suc_id_i,
					:sol_fecha_solicitud_d, 
					:sol_requerimiento_t, 
					:sol_observaciones_t,
					:sol_tec_usu_id_i,
					:sol_usu_id_i,
					:sol_ban_id_i,
					:sol_est_id_i,
					:sol_prio_id,
					:sol_ruta_evidencia) ");
			$stmt->bindParam(":sol_suc_id_i", $datos['sol_suc_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_fecha_solicitud_d", $datos['sol_fecha_solicitud_d'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_requerimiento_t",   $datos['sol_requerimiento_t'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_observaciones_t",   $datos['sol_observaciones_t'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_est_id_i",          $datos['sol_est_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_tec_usu_id_i",      $datos['sol_tec_usu_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_usu_id_i",          $datos['sol_usu_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_ban_id_i",          $datos['sol_ban_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_prio_id",           $datos['sol_prio_id'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_ruta_evidencia",    $datos['sol_ruta_evidencia'], PDO::PARAM_STR);
			
			if($stmt->execute()){
				$stmt = null;
				return $pdo->lastInsertId();
			}else{
				print_r($stmt->errorInfo());
				///self::logError('2404', "Error insertando solicitudes.modelo.php => " + $stmt->errorInfo());
				return 'error';
			}	
		}

		public static function insertDatosAsignar($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("INSERT INTO 
			 sc_asignaciones(
					asi_usu_tec_id_i,
					asi_fecha_d, 
					asi_hor_id_i, 
					asi_est_id_i,
					asi_observacion_v,
					asi_sol_id_i,
					asi_fecha_aignacion)
				VALUES(	
					:asi_usu_tec_id_i,
					:asi_fecha_d, 
					:asi_hor_id_i, 
					1,
					:asi_observacion_v,
					:asi_sol_id_i,
					:asi_fecha_aignacion) ");
			$stmt->bindParam(":asi_usu_tec_id_i", $datos['asi_usu_tec_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":asi_fecha_d", $datos['asi_fecha_d'], PDO::PARAM_STR);
			$stmt->bindParam(":asi_hor_id_i", $datos['asi_hor_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":asi_observacion_v", $datos['asi_observacion_v'], PDO::PARAM_STR);
			$stmt->bindParam(":asi_sol_id_i", $datos['asi_sol_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":asi_fecha_aignacion", $datos['asi_fecha_aignacion'], PDO::PARAM_STR);

			if($stmt->execute()){
				$stmt = null;
				return 'ok';
			}else{
				print_r($stmt->errorInfo());
				///self::logError('2404', "Error insertando solicitudes.modelo.php => " + $stmt->errorInfo());
				return 'error';
			}	
		}

		public static function UpdateDatos($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("UPDATE 
					sc_solicitudes 
				SET 
					sol_suc_id_i = :sol_suc_id_i,
					sol_requerimiento_t = :sol_requerimiento_t,
					sol_observaciones_t = :sol_observaciones_t ,
					sol_tec_usu_id_i = :sol_tec_usu_id_i ,
					sol_ban_id_i = :sol_ban_id_i,
					sol_prio_id = :sol_prio_id,
					sol_est_id_i = :sol_est_id_i,
					sol_ruta_evidencia = :sol_ruta_evidencia
				WHERE 
					sol_id_i = :sol_id_i");

			$stmt->bindParam(":sol_suc_id_i",        $datos['sol_suc_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_requerimiento_t", $datos['sol_requerimiento_t'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_observaciones_t", $datos['sol_observaciones_t'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_tec_usu_id_i", $datos['sol_tec_usu_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_id_i",     $datos['sol_id_i'],     PDO::PARAM_STR);
			$stmt->bindParam(":sol_ban_id_i", $datos['sol_ban_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_prio_id",  $datos['sol_prio_id'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_est_id_i",  $datos['sol_est_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_ruta_evidencia",    $datos['sol_ruta_evidencia'], PDO::PARAM_STR);
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
			$stmt = $pdo->prepare("DELETE FROM sc_solicitudes WHERE sol_id_i  = :sol_est_id_i ");
			$stmt->bindParam(":sol_est_id_i", $datos, PDO::PARAM_STR);
			if($stmt->execute()){
				$stmt = null;
				return 'ok';
			}else{
				self::logError('2404', "Error borrando solicitudes.modelo.php => " + $stmt->errorInfo());
				return 'error';
			}
		}

		public static function deleteDatosAsignacion($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("DELETE FROM sc_asignaciones WHERE asi_sol_id_i  = :sol_est_id_i ");
			$stmt->bindParam(":sol_est_id_i", $datos, PDO::PARAM_STR);
			if($stmt->execute()){
				$stmt = null;
				return 'ok';
			}else{
				self::logError('2404', "Error borrando solicitudes.modelo.php => " + $stmt->errorInfo());
				return 'error';
			}
		}

		public static function getTotalSolicitudesDay(){
			$stmt = Conexion::conectar()->prepare("SELECT count(*) + 1 as total FROM sc_solicitudes WHERE sol_fecha_solicitud_d ='".date('Y-m-d')."' ");
			$stmt->execute();
			return $stmt->fetch();
		}

		//desde aqui crud observaciones
		public static function insertObservaciones($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("INSERT INTO 
				sc_observaciones(
					obs_desc_v,
				 	obs_usu_id_i,
				 	obs_sol_id_i,
				 	obs_fecha_d)
				   VALUES(
				   :obs_desc_v,
				   :obs_usu_id_i,
				   :obs_sol_id_i,
				   :obs_fecha_d)");
			$stmt->bindParam(":obs_desc_v", $datos['obs_desc_v'], PDO::PARAM_STR);
			$stmt->bindParam(":obs_usu_id_i", $datos['obs_usu_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":obs_sol_id_i", $datos['obs_sol_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":obs_fecha_d", $datos['obs_fecha_d'], PDO::PARAM_STR);

			if($stmt->execute()){
				$stmt = null;
				return 'ok';
			}else{
				print_r($stmt->errorInfo());
				///self::logError('2404', "Error insertando solicitudes.modelo.php => " + $stmt->errorInfo());
				return 'error';
			}	
		}

       
	}
?>