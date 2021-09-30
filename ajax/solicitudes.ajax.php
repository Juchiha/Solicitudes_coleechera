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

		public function insertDatosAsignacion(){
			echo ControladorSolicitudes::UpdateDatosAsignacion();
		}

		public function deleteDatos(){
			echo ControladorSolicitudes::deleteDatos();
		}

		public function updateDatos(){
			echo ControladorSolicitudes::UpdateDatos();
		}

		public function getDatos($idUsuario){
			echo json_encode(ControladorSolicitudes::getData('sc_solicitudes', 'sol_id_i', $idUsuario));
		}

		public function getObservaciones($idUsuario){
			echo json_encode(ControladorSolicitudes::getDataFromLsql('*', 'sc_observaciones JOIN sc_usuarios ON usu_id_i = 	obs_usu_id_i', 'obs_sol_id_i = '. $idUsuario, null, 'ORDER BY obs_fecha_d DESC', null));

		}

		public function getDatosAsignados($idSolicitud){
			echo json_encode(ControladorSolicitudes::getData('sc_asignaciones JOIN sc_horas ON hor_id_id = asi_hor_id_i ', 'asi_sol_id_i', $idSolicitud));
		}

		public function getAllDatos(){
			$where = null;
			
			if ($_SESSION['perfil'] != '1' && $_SESSION['perfil'] != '2') {
				$where = 'asi_usu_tec_id_i = '.$_SESSION['codigo'];
			}
            $usuarios = ControladorSolicitudes::getDataFromLsql('suc_nombre_v, sol_fecha_solicitud_d, sol_orden_trabajo, est_nombre_v, pri_desc_v, asi_fecha_d, hor_desc_v, sol_id_i', 'sc_solicitudes join sc_sucursales on suc_id_id = sol_suc_id_i  join sc_estados ON est_id_i = sol_est_id_i LEFT JOIN sc_asignaciones ON asi_sol_id_i = sol_id_i LEFT JOIN sc_horas ON hor_id_id = asi_hor_id_i LEFT JOIN sc_prioridades ON  sol_prio_id= pri_id_i', $where, null, 'ORDER BY sol_fecha_solicitud_d DESC', null);
echo '{
  	"data" : [';
  			$i = 0;
		 	foreach ($usuarios as $key => $value) {
		 		if($i != 0){
            		echo ",";
            	}
				echo '[';
				echo '"'.$value["suc_nombre_v"].'",';//viene de sucursales
				echo '"'.$value["sol_fecha_solicitud_d"].'",'; //solicitudes
				echo '"'.$value["sol_orden_trabajo"].'",'; //solicitudes
				echo '"'.$value["est_nombre_v"].'",';//estados
				echo '"'. strtoupper($value["pri_desc_v"]).'",';//prioridades
				echo '"'.$value["asi_fecha_d"].' '.$value['hor_desc_v'].'",';//asignaciones
				echo '"'.$value["sol_id_i"].'"';//solicitudes
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

	if(isset($_POST['sol_tec_usu_id_i'])){
		$AjaxSolicitudes = new AjaxSolicitudes();
		$AjaxSolicitudes->insertDatosAsignacion();
	}

	if(isset($_POST['sol_ban_id_e'])){
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

	if(isset($_POST['getHorasByFecha'])){
		$resultado = ControladorSolicitudes::getDataFromLsql('hor_id_id, hor_desc_v', 'sc_horas', 'hor_id_id NOT IN (SELECT asi_hor_id_i FROM sc_asignaciones WHERE asi_fecha_d = "'.$_POST['getHorasByFecha'].'" AND asi_usu_tec_id_i = '.$_POST['datoTecnico'].')', null, 'ORDER BY hor_id_id ASC', null);
		echo json_encode($resultado);
	}

	if(isset($_POST['getDatosAsignados'])){
		$AjaxSolicitudes = new AjaxSolicitudes();
		$AjaxSolicitudes->getDatosAsignados($_POST['getDatosAsignados']);
	}

	if(isset($_POST['getObservaciones'])){
		$AjaxSolicitudes = new AjaxSolicitudes();
		$AjaxSolicitudes->getObservaciones($_POST['getObservaciones']);
	}
	