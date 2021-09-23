<?php 
	session_start();
	require_once '../controllers/mail.controller.php';
	require_once '../controllers/plantilla.controller.php';
	require_once '../controllers/bancos.controller.php';

	require_once '../models/dao.modelo.php';
	require_once '../models/datatables.modelo.php';
	require_once '../models/bancos.modelo.php';

	class AjaxBancos{
		public function insertDatos(){
			echo ControladorBancos::insertDatos();
		}

		public function deleteDatos(){
			echo ControladorBancos::deleteDatos();
		}

		public function updateDatos(){
			echo ControladorBancos::UpdateDatos();
		}

		public function getDatos($idBancos){
			/*convertir array en JSON*/
			echo json_encode(ControladorBancos::getData('sc_bancos', 'ban_id_i', $idBancos));
		}

		public function getAllDatos(){
			
            $idBancos = ControladorBancos::getData('sc_bancos JOIN sc_estados ON est_id_i = ban_est_id_i', null, null);
echo '{
  	"data" : [';
  			$i = 0;
		 	foreach ($idBancos as $key => $value) {
		 		if($i != 0){
            		echo ",";
            	}
				echo '[';
				echo '"'.($value["ban_nombre_v"]).'",';
				echo '"'.$value["est_nombre_v"].'",';
				echo '"'.$value["ban_id_i"].'"'; 
				echo ']';
            	$i++;
		 	}
		echo ']
}';
		}
	}


	if(isset($_POST['ban_nombre_v_i'])){
		$AjaxBancos = new AjaxBancos();
		$AjaxBancos->insertDatos();
	}

	if(isset($_POST['ban_id_i_e'])){
		$AjaxBancos = new AjaxBancos();
		$AjaxBancos->updateDatos();
	}

	if(isset($_POST['ban_id_i_d'])){
		$AjaxBancos = new AjaxBancos();
		$AjaxBancos->deleteDatos();
	}

	if(isset($_POST['ban_id_i_g'])){
		$AjaxBancos = new AjaxBancos();
		$AjaxBancos->getDatos($_POST['ban_id_i_g']);
	}

	if(isset($_GET['allDatos'])){
		$AjaxBancos = new AjaxBancos();
		$AjaxBancos->getAllDatos();
	}


 ?>