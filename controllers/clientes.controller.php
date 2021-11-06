<?php
	/**
	* Clientes
	*/
	class ControladorClientes extends ControladorPlantilla
	{
		/**
		*Desc.  => Mostrar todas los clientes o uno solo depende que se envie en los parametros
		*params => $item campo para buscar, $valor valor a buscar
		*Method => POST, GET
		*Return => array {}
		**/
		static public function ctrMostrarClientes($item, $valor){
			$tabla = "sc_clientes";
			$respuesta = ClientesModelo::getDatos($tabla, $item, $valor);
			return $respuesta;
		}

		/**
		*Desc.  => Mostrar todas los clientes
		*params => $item campo para buscar, $valor valor a buscar
		*Method => POST, GET
		*Return => array {}
		**/
		static public function ctrMostrarClientesExternos($item, $valor){
			$tabla = "sc_clientes";
			$respuesta = ClientesModelo::getDatos($tabla, $item, $valor);
			return $respuesta;
		}

		/**
		*Desc.  => Mostrar info de un cliente
		*params => $item campo para buscar, $valor valor a buscar
		*Method => POST, GET
		*Return => array {}
		**/
		static public function ctrMostrarClientes_Sessions($item, $valor){
			$tabla = "sc_clientes";
			$respuesta = ClientesModelo::getDatos($tabla, $item, $valor);
			return $respuesta;
		}

		/**
		*Desc.  => Mostrar las empresas con mas incapacidades TOP 10
		*params => $item campo para buscar, $valor valor a buscar
		*Method => POST, GET
		*Return => array {}
		**/
		static public function ctrMostrarClientesLimit($item, $valor){
			$tabla = "sc_clientes";
			$respuesta = ClientesModelo::mdlMostrarClientesLimit($tabla, $item, $valor);
			return $respuesta;
		}


		/**
		*Desc.  => Crear datos de cliente
		*params => Llega es un FormData
		*Method => POST
		*Return => array {
		*	code => [exito : 1, Falla : 0, Otro : -1],
		*   desc => 'Mensaje de resultado'	
		*}
		**/
		static public function ctrCrearCliente(){
			if($_POST['cli_nombres_i'] ){

				/*Insertamos el cliente*/
				$datosCliente = array(
					'cli_documento_v' 	=> $_POST['cli_identificacion_v_i'],
					'cli_nombre_v' 			=> $_POST['cli_nombres_i'],
					'cli_fecha_ingreso_d' 	=> $_POST['cli_fecha_ingreso_d_i'],
					'cli_numero_empleado_v' => $_POST['cli_numero_empleado_v_i'],
					'cli_usuario_red_v' 	=> $_POST['cli_usuario_red_v_i'],
					'cli_usuario_sap_v' 	=> $_POST['cli_usuario_sap_v_i'],
					'cli_cargo_v' 			=> $_POST['cli_cargo_v_i'],
					'cli_area_i' 			=> $_POST['cli_area_i_i'],
					'cli_ciu_id_i' 			=> 0,
					'cli_planta_id_i' 		=> $_POST['cli_planta_id_i_i'],
					'cli_direccion_v' 		=> 0,
					'cli_est_id_i' 			=> 1,
					'cli_tip_sol_id_i'		=> 2
				);

				$id_Cliente = ClientesModelo::insertDatos($datosCliente);
				if($id_Cliente == 'error'){
					echo json_encode(array('code' => 0, "Message" => 'No se pudo crear el cliente'));
				}else{
					echo json_encode(array('code' => 1, "Message" => 'Usuario creado con exito'));
				}
			}
		}

		/**
		*Desc.  => Crear datos de cliente
		*params => Llega es un FormData
		*Method => POST
		*Return => array {
		*	code => [exito : 1, Falla : 0, Otro : -1],
		*   desc => 'Mensaje de resultado'	
		*}
		**/
		static public function ctrEditarClientes(){
			if(isset($_POST['cli_identificacion_v_e'])){	

				$datos = array(
					'cli_documento_v'   	=> $_POST['cli_identificacion_v_e'],
					'cli_nombre_v' 			=> $_POST['cli_nombres_e'],
					'cli_fecha_ingreso_d' 	=> $_POST['cli_fecha_ingreso_d_e'],
					'cli_numero_empleado_v' => $_POST['cli_numero_empleado_v_e'],
					'cli_usuario_red_v' 	=> $_POST['cli_usuario_red_v_e'],
					'cli_usuario_sap_v' 	=> $_POST['cli_usuario_sap_v_e'],
					'cli_cargo_v' 			=> $_POST['cli_cargo_v_e'],
					'cli_area_i' 			=> $_POST['cli_area_i_e'],
					'cli_ciu_id_i' 			=> 0,
					'cli_planta_id_i' 		=> $_POST['cli_planta_id_i_e'],
					'cli_direccion_v' 		=> 0,
					'cli_est_id_i' 			=> 1,
					'cli_tip_sol_id_i'		=> 2,
					'cli_id_i'				=> $_POST['cli_id_i_e']
						);
					
				$respuesta = ClientesModelo::UpdateDatos($datos);
				if($respuesta == 'ok'){
					return json_encode( array('code' => 1, 'desc' => " editado correctamente"));
				}else{
					return json_encode( array('code' => 0, 'desc' => " no editado"));
				}
			}
		}


		/**
		*Desc.  => eliminar datos de un cliente
		*params => Llega es un FormData
		*Method => POST
		*Return => array {
		*	code => [exito : 1, Falla : 0, Otro : -1],
		*   desc => 'Mensaje de resultado'	
		*}
		**/
		static public function ctrBorrarCliente(){

			if(isset($_POST['cli_id_del'])){ 
				$datos = $_POST["cli_id_del"];
				$respuesta = ClientesModelo::deleteDatos($datos);
				if($respuesta == "ok"){
					return json_encode(array('code' => 1, 'message' => 'Usuario Eliminado con exito'));
				}else{	
					return json_encode(array('code' => 0, 'message' => 'Usuario no Eliminado'));
				}
			}
		}	
	}