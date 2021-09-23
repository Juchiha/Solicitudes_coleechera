<?php
	class ControladorBancos extends ControladorPlantilla
	{
		public static function insertDatos(){
			if(isset($_POST['ban_nombre_v_i'])){ 
				$datos = array(
					'ban_nombre_v' 		=> $_POST['ban_nombre_v_i'], 
					'ban_est_id_i' 		=> 1,
					
				);

				$respuesta = BancosModelo::insertDatos($datos);
				if($respuesta != "error"){
					return json_encode(array('code' => 1, 'message' => 'Banco guardadado con exito'));
				}else{	
					return json_encode(array('code' => 0, 'message' => 'Banco no guardadado'));
				}
			}
		}

		public static function UpdateDatos(){
			if(isset($_POST['ban_id_i_e'])){ //e de edicion
				$datos = array(
					'ban_nombre_v' 					=> $_POST['ban_nombre_v_e'], 
					'ban_est_id_i'			        => 1,
					'ban_id_i'			            => $_POST['ban_id_i_e'],
					
				);

				$respuesta = BancosModelo::UpdateDatos($datos);
				if($respuesta == "ok"){
					return json_encode(array('code' => 1, 'message' => 'Banco actualizado con exito'));
				}else{	
					return json_encode(array('code' => 0, 'message' => 'Banco no actualizado'));
				}
			}
		}

		public static function deleteDatos(){
		    if(isset($_POST['ban_id_i_d'])){ 
			    $datos = $_POST["ban_id_i_d"];
			    $respuesta = BancosModelo::deleteDatos($datos);
				if($respuesta == "ok"){
					return json_encode(array('code' => 1, 'message' => 'Banco Eliminada con exito'));
			    }else{	
					return json_encode(array('code' => 0, 'message' => 'Banco no Eliminada'));
				}
			}
		}
	}