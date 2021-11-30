<?php
class SolicitudesModelo extends ModeloDAO
	{
		public static function insertDatos($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("INSERT INTO 
			 	sc_solicitudes_coolechera(
			 	sol_tip_sol_id_i
			 	,sol_clie_id_i
			 	,sol_fecha_solicitud
			 	,sol_asignado_a_i
			 	,sol_estado_i					
				,sol_equipo_v					
				,sol_equipo_observacion_t		
				,sol_soft_especial_v			
				,sol_configura_imp_v			
				,sol_observacion_software_t	
				,sol_telefonia_fija_v 			
				,sol_celular_v  				
				,sol_vpn_v						
				,sol_observacion_vpn_t			
				,sol_otro_req_v				
				,sol_observacion_otro_r_t		
				,sol_prioridad_i				
				,inc_req_usuario_red_i			
				,inc_req_det_usu_red_i			
				,inc_req_obs_usu_red_observ_v	
				,inc_req_correo_i				
				,inc_req_det_correo_i 			
				,inc_req_det_correo_obse_v		
				,inc_req_biman_i				
				,inc_req_det_obser_biman_v		
				,inc_req_consig_i					
				,inc_req_det_obser_consign_v		
				,inc_req_gil_i						
				,inc_req_det_obser_gil_v			
				,inc_req_query_i					
				,inc_req_det_obser_query_v			
				,inc_req_acceso_in_i				
				,inc_req_det_obser_internet_acc_v
				,inc_req_usuario_sap_i				
				,inc_req_det_sap					
				,inc_req_det_sap_obser_v			
				,inc_req_det_sap_accesos_i			
				,inc_req_det_sap_produc_i			
				,inc_req_det_sap_desarr_i			
				,inc_req_det_sap_cali_i
				,inc_ruta_evi_p_v
				,inc_ruta_evi_s_v
				,sol_tipo_sol_id_i
				,sol_obser_impresora_v
				,sol_obser_telefonia_cel_v
				,sol_obser_telefonia_fija_v
				,sol_asunto_v
				)
				VALUES
				(	
					:sol_tip_sol_id_i
				 	,:sol_clie_id_i
				 	,:sol_fecha_solicitud
				 	,:sol_asignado_a_i
				 	,:sol_estado_i					
					,:sol_equipo_v					
					,:sol_equipo_observacion_t		
					,:sol_soft_especial_v			
					,:sol_configura_imp_v			
					,:sol_observacion_software_t	
					,:sol_telefonia_fija_v 			
					,:sol_celular_v  				
					,:sol_vpn_v						
					,:sol_observacion_vpn_t			
					,:sol_otro_req_v				
					,:sol_observacion_otro_r_t		
					,:sol_prioridad_i				
					,:inc_req_usuario_red_i			
					,:inc_req_det_usu_red_i			
					,:inc_req_obs_usu_red_observ_v	
					,:inc_req_correo_i				
					,:inc_req_det_correo_i 			
					,:inc_req_det_correo_obse_v		
					,:inc_req_biman_i				
					,:inc_req_det_obser_biman_v		
					,:inc_req_consig_i					
					,:inc_req_det_obser_consign_v		
					,:inc_req_gil_i						
					,:inc_req_det_obser_gil_v			
					,:inc_req_query_i					
					,:inc_req_det_obser_query_v			
					,:inc_req_acceso_in_i				
					,:inc_req_det_obser_internet_acc_v
					,:inc_req_usuario_sap_i				
					,:inc_req_det_sap					
					,:inc_req_det_sap_obser_v			
					,:inc_req_det_sap_accesos_i			
					,:inc_req_det_sap_produc_i			
					,:inc_req_det_sap_desarr_i			
					,:inc_req_det_sap_cali_i
					,:inc_ruta_evi_p_v
					,:inc_ruta_evi_s_v
					,:sol_tipo_sol_id_i
					,:sol_obser_impresora_v
					,:sol_obser_telefonia_cel_v
					,:sol_obser_telefonia_fija_v
					,:sol_asunto_v
				) 
			");

			$stmt->bindParam(":sol_tip_sol_id_i", $datos['sol_tip_sol_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_clie_id_i", $datos['sol_clie_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_fecha_solicitud", $datos['sol_fecha_solicitud'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_asignado_a_i", $datos['sol_asignado_a_i'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_equipo_v", $datos['sol_equipo_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_equipo_observacion_t", $datos['sol_equipo_observacion_t'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_soft_especial_v", $datos['sol_soft_especial_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_configura_imp_v", $datos['sol_configura_imp_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_observacion_software_t", $datos['sol_observacion_software_t'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_telefonia_fija_v", $datos['sol_telefonia_fija_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_celular_v",  $datos['sol_celular_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_vpn_v",  $datos['sol_vpn_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_observacion_vpn_t",  $datos['sol_observacion_vpn_t'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_otro_req_v", $datos['sol_otro_req_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_observacion_otro_r_t", $datos['sol_observacion_otro_r_t'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_usuario_red_i", $datos['inc_req_usuario_red_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_usu_red_i", $datos['inc_req_det_usu_red_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_obs_usu_red_observ_v",$datos['inc_req_obs_usu_red_observ_v'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_correo_i", $datos['inc_req_correo_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_correo_i", $datos['inc_req_det_correo_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_correo_obse_v",$datos['inc_req_det_correo_obse_v'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_biman_i", $datos['inc_req_biman_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_obser_biman_v", $datos['inc_req_det_obser_biman_v'],PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_consig_i", $datos['inc_req_consig_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_obser_consign_v", $datos['inc_req_det_obser_consign_v'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_gil_i", $datos['inc_req_gil_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_obser_gil_v", $datos['inc_req_det_obser_gil_v'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_query_i", $datos['inc_req_query_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_obser_query_v", $datos['inc_req_det_obser_query_v'],PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_acceso_in_i", $datos['inc_req_acceso_in_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_obser_internet_acc_v",$datos['inc_req_det_obser_internet_acc_v'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_usuario_sap_i", $datos['inc_req_usuario_sap_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_sap", $datos['inc_req_det_sap'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_sap_obser_v", $datos['inc_req_det_sap_obser_v'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_sap_accesos_i",$datos['inc_req_det_sap_accesos_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_sap_produc_i", $datos['inc_req_det_sap_produc_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_sap_desarr_i", $datos['inc_req_det_sap_desarr_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_sap_cali_i", $datos['inc_req_det_sap_cali_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_ruta_evi_p_v", $datos['inc_ruta_evi_p_v'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_ruta_evi_s_v", $datos['inc_ruta_evi_s_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_prioridad_i", $datos['sol_prioridad_i'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_estado_i", $datos['sol_estado_i'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_tipo_sol_id_i", $datos['sol_tipo_sol_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_obser_impresora_v", $datos['sol_obser_impresora_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_obser_telefonia_fija_v", $datos['sol_obser_telefonia_fija_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_obser_telefonia_cel_v", $datos['sol_obser_telefonia_cel_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_asunto_v", $datos['sol_asunto_v'], PDO::PARAM_STR);

			if($stmt->execute()){
				$stmt = null;
				return $pdo->lastInsertId();
			}else{
				print_r($stmt->errorInfo());
				///self::logError('2404', "Error insertando solicitudes.modelo.php => " + $stmt->errorInfo());
				return 'error';
			}	
		}

		public static function UpdateDatos($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("UPDATE 
					sc_solicitudes_coolechera 
				SET 
					sol_tip_sol_id_i = :sol_tip_sol_id_i
				 	,sol_fecha_solicitud = :sol_fecha_solicitud
				 	,sol_asignado_a_i = :sol_asignado_a_i
				 	,sol_estado_i = :sol_estado_i				
					,sol_equipo_v = :sol_equipo_v			
					,sol_equipo_observacion_t = :sol_equipo_observacion_t		
					,sol_soft_especial_v = :sol_soft_especial_v			
					,sol_configura_imp_v = :sol_configura_imp_v			
					,sol_observacion_software_t	= :sol_observacion_software_t
					,sol_telefonia_fija_v = :sol_telefonia_fija_v		
					,sol_celular_v  = :sol_celular_v			
					,sol_vpn_v	= :sol_vpn_v					
					,sol_observacion_vpn_t	= :sol_observacion_vpn_t		
					,sol_otro_req_v	= :sol_otro_req_v		
					,sol_observacion_otro_r_t = :sol_observacion_otro_r_t	
					,sol_prioridad_i = :sol_prioridad_i			
					,inc_req_usuario_red_i	= :inc_req_usuario_red_i	
					,inc_req_det_usu_red_i	= :inc_req_det_usu_red_i		
					,inc_req_obs_usu_red_observ_v = :inc_req_obs_usu_red_observ_v
					,inc_req_correo_i = :inc_req_correo_i			
					,inc_req_det_correo_i = :inc_req_det_correo_i			
					,inc_req_det_correo_obse_v	= :inc_req_det_correo_obse_v	
					,inc_req_biman_i = :inc_req_biman_i			
					,inc_req_det_obser_biman_v = :inc_req_det_obser_biman_v
					,inc_req_consig_i = :inc_req_consig_i					
					,inc_req_det_obser_consign_v = :inc_req_det_obser_consign_v	
					,inc_req_gil_i	= :inc_req_gil_i					
					,inc_req_det_obser_gil_v = :inc_req_det_obser_gil_v		
					,inc_req_query_i = :inc_req_query_i				
					,inc_req_det_obser_query_v	= :inc_req_det_obser_query_v		
					,inc_req_acceso_in_i = :inc_req_acceso_in_i			
					,inc_req_det_obser_internet_acc_v = :inc_req_det_obser_internet_acc_v
					,inc_req_usuario_sap_i	= :inc_req_usuario_sap_i		
					,inc_req_det_sap = :inc_req_det_sap				
					,inc_req_det_sap_obser_v = :inc_req_det_sap_obser_v			
					,inc_req_det_sap_accesos_i	= :inc_req_det_sap_accesos_i		
					,inc_req_det_sap_produc_i = :inc_req_det_sap_produc_i		
					,inc_req_det_sap_desarr_i = :inc_req_det_sap_desarr_i		
					,inc_req_det_sap_cali_i = :inc_req_det_sap_cali_i
					,inc_ruta_evi_p_v = :inc_ruta_evi_p_v
					,inc_ruta_evi_s_v = :inc_ruta_evi_s_v
					,sol_obser_impresora_v = :sol_obser_impresora_v
					,sol_obser_telefonia_cel_v = :sol_obser_telefonia_cel_v
					,sol_obser_telefonia_fija_v = :sol_obser_telefonia_fija_v
					,sol_asunto_v = :sol_asunto_v
				WHERE 
					sol_id_i = :sol_id_i");

			$stmt->bindParam(":sol_tip_sol_id_i", $datos['sol_tip_sol_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_fecha_solicitud", $datos['sol_fecha_solicitud'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_asignado_a_i", $datos['sol_asignado_a_i'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_equipo_v", $datos['sol_equipo_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_equipo_observacion_t", $datos['sol_equipo_observacion_t'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_soft_especial_v", $datos['sol_soft_especial_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_configura_imp_v", $datos['sol_configura_imp_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_observacion_software_t", $datos['sol_observacion_software_t'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_telefonia_fija_v", $datos['sol_telefonia_fija_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_celular_v",  $datos['sol_celular_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_vpn_v",  $datos['sol_vpn_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_observacion_vpn_t",  $datos['sol_observacion_vpn_t'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_otro_req_v", $datos['sol_otro_req_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_observacion_otro_r_t", $datos['sol_observacion_otro_r_t'], PDO::PARAM_STR);
			
			$stmt->bindParam(":inc_req_usuario_red_i", $datos['inc_req_usuario_red_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_usu_red_i", $datos['inc_req_det_usu_red_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_obs_usu_red_observ_v",$datos['inc_req_obs_usu_red_observ_v'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_correo_i", $datos['inc_req_correo_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_correo_i", $datos['inc_req_det_correo_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_correo_obse_v",$datos['inc_req_det_correo_obse_v'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_biman_i", $datos['inc_req_biman_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_obser_biman_v", $datos['inc_req_det_obser_biman_v'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_consig_i", $datos['inc_req_consig_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_obser_consign_v", $datos['inc_req_det_obser_consign_v'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_gil_i", $datos['inc_req_gil_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_obser_gil_v", $datos['inc_req_det_obser_gil_v'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_query_i", $datos['inc_req_query_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_obser_query_v", $datos['inc_req_det_obser_query_v'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_acceso_in_i", $datos['inc_req_acceso_in_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_obser_internet_acc_v",$datos['inc_req_det_obser_internet_acc_v'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_usuario_sap_i", $datos['inc_req_usuario_sap_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_sap", $datos['inc_req_det_sap'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_sap_obser_v", $datos['inc_req_det_sap_obser_v'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_sap_accesos_i",$datos['inc_req_det_sap_accesos_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_sap_produc_i", $datos['inc_req_det_sap_produc_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_sap_desarr_i", $datos['inc_req_det_sap_desarr_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_req_det_sap_cali_i", $datos['inc_req_det_sap_cali_i'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_ruta_evi_p_v", $datos['inc_ruta_evi_p_v'], PDO::PARAM_STR);
			$stmt->bindParam(":inc_ruta_evi_s_v", $datos['inc_ruta_evi_s_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_id_i", $datos['sol_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_prioridad_i", $datos['sol_prioridad_i'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_estado_i", $datos['sol_estado_i'], PDO::PARAM_STR);
			
			$stmt->bindParam(":sol_obser_impresora_v", $datos['sol_obser_impresora_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_obser_telefonia_fija_v", $datos['sol_obser_telefonia_fija_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_obser_telefonia_cel_v", $datos['sol_obser_telefonia_cel_v'], PDO::PARAM_STR);
			$stmt->bindParam(":sol_asunto_v", $datos['sol_asunto_v'], PDO::PARAM_STR);
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
			$stmt = $pdo->prepare("DELETE FROM sc_solicitudes_coolechera WHERE sol_id_i  = :sol_id_i ");
			$stmt->bindParam(":sol_id_i", $datos, PDO::PARAM_STR);
			if($stmt->execute()){
				$stmt = null;
				return 'ok';
			}else{
				self::logError('2404', "Error borrando solicitudes.modelo.php => " + $stmt->errorInfo());
				return 'error';
			}
		}


		public static function getTotalSolicitudesDay(){
			$stmt = Conexion::conectar()->prepare("SELECT count(*) + 1 as total FROM sc_solicitudes_coolechera WHERE sol_fecha_solicitud ='".date('Y-m-d')."' ");
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
				 	obs_fecha_d,
				 	obs_ruta_evidencia)
				   VALUES(
				   :obs_desc_v,
				   :obs_usu_id_i,
				   :obs_sol_id_i,
				   :obs_fecha_d,
					:obs_ruta_evidencia)");
			$stmt->bindParam(":obs_desc_v", $datos['obs_desc_v'], PDO::PARAM_STR);
			$stmt->bindParam(":obs_usu_id_i", $datos['obs_usu_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":obs_sol_id_i", $datos['obs_sol_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":obs_fecha_d", $datos['obs_fecha_d'], PDO::PARAM_STR);
			$stmt->bindParam(":obs_ruta_evidencia", $datos['obs_ruta_evidencia'], PDO::PARAM_STR);
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