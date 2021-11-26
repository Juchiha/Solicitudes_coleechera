<?php
	session_start();
	require_once '../controllers/mail.controller.php';
	require_once '../controllers/plantilla.controller.php';
	require_once '../controllers/solicitudes.controller.php';

	require_once '../models/dao.modelo.php';
	require_once '../models/datatables.modelo.php';
	require_once '../models/solicitudes.modelo.php';
	require_once '../models/clientes.modelo.php';
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
			echo json_encode(ControladorSolicitudes::getData('sc_solicitudes_coolechera JOIN sc_clientes ON cli_id_i=sol_clie_id_i', 'sol_id_i', $idUsuario));
		}

		public function getObservaciones($idUsuario){
			echo json_encode(ControladorSolicitudes::getDataFromLsql('*', 'sc_observaciones JOIN sc_usuarios ON usu_id_i = 	obs_usu_id_i', 'obs_sol_id_i = '. $idUsuario, null, 'ORDER BY obs_fecha_d DESC', null));

		}

		public function getDatosAsignados($idSolicitud){
			echo json_encode(ControladorSolicitudes::getData('sc_asignaciones JOIN sc_horas ON hor_id_id = asi_hor_id_i ', 'asi_sol_id_i', $idSolicitud));
		}

		public function getAllDatos(){
			$where = null;
			
			if ($_SESSION['perfil'] == '4') {
				$where = 'sol_asignado_a_i = '.$_SESSION['codigo'];
			}else if($_SESSION['perfil'] == '3'){
				//$where = 'sol_ban_id_i = '.$_SESSION['bnco_id'];
			}else{
				$where = null;
			}

            $usuarios = ControladorSolicitudes::getDataFromLsql('cli_nombre_v, sol_fecha_solicitud, sol_orden_trabajo_v, sol_estado_i, sol_prioridad_i, sol_asignado_a_i,  est_nombre_v, pri_desc_v, sol_id_i, usu_nombre_v', 'sc_solicitudes_coolechera JOIN sc_clientes ON cli_id_i = sol_clie_id_i JOIN sc_estados ON est_id_i = sol_estado_i LEFT JOIN sc_prioridades ON  sol_prioridad_i = pri_id_i LEFT JOIN sc_usuarios ON usu_id_i = sol_asignado_a_i', $where, null, 'ORDER BY sol_fecha_solicitud DESC', null);
echo '{
  	"data" : [';
  			$i = 0;
		 	foreach ($usuarios as $key => $value) {
		 		if($i != 0){
            		echo ",";
            	}
				echo '[';
				echo '"'.$value["cli_nombre_v"].'",';//viene de sucursales
				echo '"'.$value["sol_fecha_solicitud"].'",'; //solicitudes
				echo '"'.$value["sol_orden_trabajo_v"].'",'; //solicitudes
				echo '"'.$value["est_nombre_v"].'",';//estados
				echo '"'.mb_strtoupper($value["pri_desc_v"]).'",';//prioridades
				echo '"'.mb_strtoupper($value['usu_nombre_v']).'",';//asignaciones
				echo '"'.$value["sol_id_i"].'"';//solicitudes
				echo ']';
            	$i++;
		 	}
		echo ']
}';
		}

		
	}


	if(isset($_POST['insertarR'])){
		$AjaxSolicitudes = new AjaxSolicitudes();
		$AjaxSolicitudes->insertDatos();
	}

	if(isset($_POST['sol_tec_usu_id_i'])){
		$AjaxSolicitudes = new AjaxSolicitudes();
		$AjaxSolicitudes->insertDatosAsignacion();
	}

	if(isset($_POST['editarR'])){
		$AjaxSolicitudes = new AjaxSolicitudes();
		$AjaxSolicitudes->updateDatos();
	}

	if(isset($_POST['eliminarR'])){
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
	