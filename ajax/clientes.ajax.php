<?php
	session_start();
	require_once '../controllers/mail.controller.php';
	require_once '../controllers/plantilla.controller.php';

	require_once '../models/dao.modelo.php';
	require_once '../models/datatables.modelo.php';

	require_once '../models/clientes.modelo.php';

	class AjaxSolicitudes{
		public function getDatosByCc($cc){
			echo json_encode(ControladorPlantilla::getData('sc_clientes', 'cli_documento_v', $cc));
		}
	}

	if(isset($_POST['cedulaCliente']) && $_POST['cedulaCliente'] != ''){
		$ajax = new AjaxSolicitudes();
		$ajax->getDatosByCc($_POST['cedulaCliente']);
	}
