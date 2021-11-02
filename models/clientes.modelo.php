<?php

class ClientesModelo extends ModeloDAO
	{
		public static function insertDatos($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("INSERT INTO 
			 sc_clientes(
					cli_documento_v,
					cli_nombre_v,
					cli_fecha_ingreso_d, 
					cli_numero_empleado_v,
					cli_usuario_red_v,
					cli_usuario_sap_v,
					cli_cargo_v, 
					cli_area_i,
					cli_ciu_id_i,
					cli_planta_id_i,
					cli_direccion_v,
					cli_est_id_i,
					cli_tip_sol_id_i)
				VALUES(	
					:cli_documento_v,
					:cli_nombre_v,
					:cli_fecha_ingreso_d, 
					:cli_numero_empleado_v,
					:cli_usuario_red_v,
					:cli_usuario_sap_v,
					:cli_cargo_v, 
					:cli_area_i,
					:cli_ciu_id_i,
					:cli_planta_id_i,
					:cli_direccion_v,
					:cli_est_id_i,
					:cli_tip_sol_id_i)");
			$stmt->bindParam(":cli_documento_v", $datos['cli_documento_v'], PDO::PARAM_STR);
			$stmt->bindParam(":cli_nombre_v", $datos['cli_nombre_v'], PDO::PARAM_STR);
			$stmt->bindParam(":cli_fecha_ingreso_d", $datos['cli_fecha_ingreso_d'], PDO::PARAM_STR);
			$stmt->bindParam(":cli_numero_empleado_v",$datos['cli_numero_empleado_v'],PDO::PARAM_STR);
			$stmt->bindParam(":cli_usuario_red_v", $datos['cli_usuario_red_v'], PDO::PARAM_STR);
			$stmt->bindParam(":cli_usuario_sap_v", $datos['cli_usuario_sap_v'], PDO::PARAM_STR);
			$stmt->bindParam(":cli_cargo_v", $datos['cli_cargo_v'], PDO::PARAM_STR);
			$stmt->bindParam(":cli_area_i", $datos['cli_area_i'], PDO::PARAM_STR);
			$stmt->bindParam(":cli_ciu_id_i", $datos['cli_ciu_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":cli_planta_id_i", $datos['cli_planta_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":cli_direccion_v", $datos['cli_direccion_v'], PDO::PARAM_STR);
			$stmt->bindParam(":cli_est_id_i", $datos['cli_est_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":cli_tip_sol_id_i", $datos['cli_tip_sol_id_i'], PDO::PARAM_STR);
			
			if($stmt->execute()){
				$stmt = null;
				return $pdo->lastInsertId();
			}else{
				print_r( $stmt->errorInfo());
				//self::logError('2404', "Error insertando clientes.modelo.php => " + $stmt->errorInfo());
				return 'error';
			}	
		}

		public static function UpdateDatos($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("UPDATE 
					sc_clientes 
				SET 
					cli_documento_v = :cli_documento_v,
					cli_nombre_v = :cli_nombre_v ,
					cli_fecha_ingreso_d = :cli_fecha_ingreso_d , 
					cli_numero_empleado_v = :cli_numero_empleado_v ,
					cli_usuario_red_v = :cli_usuario_red_v ,
					cli_usuario_sap_v = :cli_usuario_sap_v ,
					cli_cargo_v = :cli_cargo_v , 
					cli_area_i = :cli_area_i ,
					cli_ciu_id_i = :cli_ciu_id_i ,
					cli_planta_id_i = :cli_planta_id_i,
					cli_direccion_v = :cli_direccion_v ,
					cli_est_id_i = :cli_est_id_i
				WHERE 
					cli_id_i = :cli_id_i");

			$stmt->bindParam(":cli_documento_v", $datos['cli_documento_v'], PDO::PARAM_STR);
			$stmt->bindParam(":cli_nombre_v", $datos['cli_nombre_v'], PDO::PARAM_STR);
			$stmt->bindParam(":cli_fecha_ingreso_d", $datos['cli_fecha_ingreso_d'], PDO::PARAM_STR);
			$stmt->bindParam(":cli_numero_empleado_v",$datos['cli_numero_empleado_v'],PDO::PARAM_STR);
			$stmt->bindParam(":cli_usuario_red_v", $datos['cli_usuario_red_v'], PDO::PARAM_STR);
			$stmt->bindParam(":cli_usuario_sap_v", $datos['cli_usuario_sap_v'], PDO::PARAM_STR);
			$stmt->bindParam(":cli_cargo_v", $datos['cli_cargo_v'], PDO::PARAM_STR);
			$stmt->bindParam(":cli_area_i", $datos['cli_area_i'], PDO::PARAM_STR);
			$stmt->bindParam(":cli_ciu_id_i", $datos['cli_ciu_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":cli_planta_id_i", $datos['cli_planta_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":cli_direccion_v", $datos['cli_direccion_v'], PDO::PARAM_STR);
			$stmt->bindParam(":cli_est_id_i", $datos['cli_est_id_i'], PDO::PARAM_STR);
			$stmt->bindParam(":cli_id_i", $datos['cli_id_i'], PDO::PARAM_STR);
			if($stmt->execute()){
				$stmt = null;
				return 'ok';
			}else{
				self::logError('2404', "Error actualizando clientes.modelo.php => " + $stmt->errorInfo());
				return 'error';
			}
		}

		public static function deleteDatos($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("DELETE FROM sc_clientes WHERE cli_id_i  = :cli_id_i ");
			$stmt->bindParam(":cli_id_i", $datos, PDO::PARAM_STR);
			if($stmt->execute()){
				$stmt = null;
				return 'ok';
			}else{
				self::logError('2404', "Error borrando clientes.modelo.php => " + $stmt->errorInfo());
				return 'error';
			}
		}
	}