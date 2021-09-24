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

		public function getDatosAsignados($idSolicitud){
			echo json_encode(ControladorSolicitudes::getData('sc_asignaciones JOIN sc_horas ON hor_id_id = asi_hor_id_i ', 'asi_sol_id_i', $idSolicitud));
		}

		public function getAllDatos(){
            $usuarios = ControladorSolicitudes::getData('sc_solicitudes join sc_sucursales on suc_id_id = sol_suc_id_i  join sc_estados ON est_id_i = sol_est_id_i LEFT JOIN sc_asignaciones ON asi_sol_id_i = sol_id_i LEFT JOIN sc_horas ON hor_id_id = asi_hor_id_i LEFT JOIN sc_prioridades ON  sol_prio_id= pri_id_i', null, null);
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
				echo '"'.$value["sol_orden_trabajo"].'",'; 
				echo '"'.$value["est_nombre_v"].'",';
				echo '"'. strtoupper($value["pri_desc_v"]).'",';
				echo '"'.$value["asi_fecha_d"].' '.$value['hor_desc_v'].'",';
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

	