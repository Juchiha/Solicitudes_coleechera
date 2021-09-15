<?php
	session_start();
	require_once '../controllers/mail.controller.php';
	require_once '../controllers/plantilla.controller.php';
	require_once '../controllers/solicitudes.controller.php';

	require_once '../models/dao.modelo.php';
	require_once '../models/datatables.modelo.php';
	require_once '../models/solicitudes.modelo.php';
	require_once '../models/auth.modelo.php';

	class AjaxSolicitudes{
		public function insertDatos(){
			echo ControladorSolicitudes::insertDatos();
		}

		public function deleteDatos(){
			echo ControladorSolicitudes::deleteDatos();
		}

		public function updateDatos(){
			echo ControladorSolicitudes::UpdateDatos();
		}

		public function getDatos($idUsuario){
			echo ControladorSolicitudes::getData('sc_usuarios', 'usu_id_i', $idUsuario);
		}

		public function getAllDatos(){
            $usuarios = ControladorSolicitudes::getData('sc_solicitudes join sc_sucursales on suc_id_id = sol_suc_id_i join sc_usuarios ON usu_id_i = sol_usu_id_i ', null, null);
echo '{
  	"data" : [';
  			$i = 0;
		 	foreach ($usuarios as $key => $value) {
		 		if($i != 0){
            		echo ",";
            	}
				echo '[';
				echo '"'.$value["suc_nombre_v"].'",';
				echo '"'.$value["sol_fecha_solicitud_d"].'",';
				echo '"'.$value["usu_nombre_v"].' '.$value['usu_apellido_v'].'",'; 
				echo '"'.$value["sol_orden_trabajo"].'",'; 
				echo '"'.$value["sol_fecha_cita_d"].' '.$value['sol_hora_cita_v'].'",';
				echo '"'.$value["sol_id_i"].'"';
				echo ']';
            	$i++;
		 	}
		echo ']
}';
		}
	}


	if(isset($_POST['sol_ban_id_i'])){
		$AjaxSolicitudes = new AjaxSolicitudes();
		$AjaxSolicitudes->insertDatos();
	}

	if(isset($_POST['usu_documento_v_e'])){
		$AjaxSolicitudes = new AjaxSolicitudes();
		$AjaxSolicitudes->updateDatos();
	}

	if(isset($_POST['usu_id_i_d'])){
		$AjaxSolicitudes = new AjaxSolicitudes();
		$AjaxSolicitudes->deleteDatos();
	}

	if(isset($_POST['usu_id_i_g'])){
		$AjaxSolicitudes = new AjaxSolicitudes();
		$AjaxSolicitudes->getDatos($_POST['usu_id_i_g']);
	}

	if(isset($_GET['allDatos'])){
		$AjaxSolicitudes = new AjaxSolicitudes();
		$AjaxSolicitudes->getAllDatos();
	}