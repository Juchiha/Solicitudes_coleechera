<?php 
	session_start();
	require_once '../controllers/mail.controller.php';
	require_once '../controllers/plantilla.controller.php';
	require_once '../controllers/sucursales.controller.php';

	require_once '../models/dao.modelo.php';
	require_once '../models/datatables.modelo.php';
	require_once '../models/usuario.modelo.php';

	class AjaxSucursales{
		public function insertDatos(){
			echo ControladorSucursales::insertDatos();
		}

		public function deleteDatos(){
			echo ControladorSucursales::deleteDatos();
		}

		public function updateDatos(){
			echo ControladorSucursales::UpdateDatos();
		}

		public function getDatos($idSucursales){
			echo ControladorSucursales::getData('sc_sucursales', 'suc_id_id', $idSucursales);
		}

		public function getAllDatos(){
            $sucursales = ControladorSucursales::getData('sc_sucursales join sc_bancos on ban_id_i = suc_ban_id_i', null, null);
echo '{
  	"data" : [';
  			$i = 0;
		 	foreach ($sucursales as $key => $value) {
		 		if($i != 0){
            		echo ",";
            	}
				echo '[';
				echo '"'.$value["ban_nombre_v"].'",'; 
				echo '"'.($value["suc_nombre_v"]).'",';
				echo '"'.$value["suc_codigo_v"].'",';
				echo '"'.$value["suc_ciu_id_i"].'",'; 
				echo '"'.$value["suc_direccion_v"].'",';
				echo '"'.$value["usu_id_i"].'"';
				echo ']';
            	$i++;
		 	}
		echo ']
}';
		}
	}


	if(isset($_POST['usu_documento_v_i'])){
		$AjaxSucursales = new AjaxSucursales();
		$AjaxSucursales->insertDatos();
	}

	if(isset($_POST['usu_documento_v_e'])){
		$AjaxSucursales = new AjaxSucursales();
		$AjaxSucursales->updateDatos();
	}

	if(isset($_POST['usu_id_i_d'])){
		$AjaxSucursales = new AjaxSucursales();
		$AjaxSucursales->deleteDatos();
	}

	if(isset($_POST['usu_id_i_g'])){
		$AjaxSucursales = new AjaxSucursales();
		$AjaxSucursales->getDatos($_POST['usu_id_i_g']);
	}

	if(isset($_GET['allDatos'])){
		$AjaxSucursales = new AjaxSucursales();
		$AjaxSucursales->getAllDatos();
	}

 ?>