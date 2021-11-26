<?php
	session_start();
	require_once '../controllers/mail.controller.php';
	require_once '../controllers/plantilla.controller.php';
	require_once '../controllers/clientes.controller.php';

	require_once '../models/dao.modelo.php';
	require_once '../models/datatables.modelo.php';

	require_once '../models/clientes.modelo.php';

	class AjaxClientes{

		public function insertDatos(){
			echo ControladorClientes::ctrCrearCliente();
		}

		public function updateDatos(){
			echo ControladorClientes::ctrEditarClientes();
		}

		public function deleteDatos(){
			echo ControladorClientes::ctrBorrarCliente();
		}

		public function getDatos($idClientes){
			echo json_encode(ControladorClientes::getData('sc_clientes', 'cli_id_i', $idClientes));
		}

		public function getDatosByCorreo($cc){
			echo json_encode(ControladorClientes::getData('sc_clientes', 'cli_correo_v', $cc));
		}

		public function getDatosByCc($cc){
			echo json_encode(ControladorClientes::getData('sc_clientes', 'cli_documento_v', $cc));
		}

		public function validarUsuarioSap($sap){
			echo json_encode(ControladorClientes::getData('sc_clientes', 'cli_usuario_sap_v', $sap));
		}

		public function getDatosAll(){
			$clientes = ControladorClientes::getData('sc_clientes LEFT JOIN sc_areas_cool ON are_id_i = cli_area_i ', null, null);
			echo '{
  	"data" : [';
  			$i = 0;
		 	foreach ($clientes as $key => $value) {
		 		if($i != 0){
            		echo ",";
            	}
				echo '[';
				echo '"'.$value["cli_documento_v"].'",';
				echo '"'.$value["cli_nombre_v"].'",';
				echo '"'.$value["cli_numero_empleado_v"].'",'; 
				echo '"'.$value["are_desc_v"].'",'; 
				echo '"'.$value["cli_id_i"].'"'; 
				echo ']';
            	$i++;
		 	}
		echo ']
}';
		}
	}

	if(isset($_POST['cedulaCliente']) && $_POST['cedulaCliente'] != ''){
		$ajax = new AjaxClientes();
		$ajax->getDatosByCc($_POST['cedulaCliente']);
	}

	if(isset($_POST['correoCliente']) && $_POST['correoCliente'] != ''){
		$ajax = new AjaxClientes();
		$ajax->getDatosByCorreo($_POST['correoCliente']);
	}

	if(isset($_GET['allDatos'])){
		$ajax = new AjaxClientes();
		$ajax->getDatosAll();
	}

	if(isset($_POST['ban_id_i_g'])){
		$ajax = new AjaxClientes();
		$ajax->getDatos($_POST['ban_id_i_g']);
	}

	if(isset($_POST['cli_id_del']) && $_POST['cli_id_del'] != ''){
		$ajax = new AjaxClientes();
		$ajax->deleteDatos($_POST['cli_id_del']);
	}

	if(isset($_POST['cli_nombres_i']) && $_POST['cli_nombres_i'] != ''){
		$ajax = new AjaxClientes();
		$ajax->insertDatos();
	}

	if(isset($_POST['cli_identificacion_v_e']) && $_POST['cli_identificacion_v_e'] != ''){
		$ajax = new AjaxClientes();
		$ajax->updateDatos();
	}
	if(isset($_POST['cli_usuario_sap_v_i_vL']) && $_POST['cli_usuario_sap_v_i_vL'] != ''){
		$ajax = new AjaxClientes();
		$ajax->validarUsuarioSap($_POST['cli_usuario_sap_v_i_vL']);
	}