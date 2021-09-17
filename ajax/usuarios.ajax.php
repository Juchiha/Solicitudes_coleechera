<?php
	session_start();
	require_once '../controllers/mail.controller.php';
	require_once '../controllers/plantilla.controller.php';
	require_once '../controllers/usuarios.controller.php';

	require_once '../models/dao.modelo.php';
	require_once '../models/datatables.modelo.php';
	require_once '../models/usuario.modelo.php';

	class AjaxUsuarios{
		public function insertDatos(){
			echo ControladorUsuarios::insertDatos();
		}

		public function deleteDatos(){
			echo ControladorUsuarios::deleteDatos();
		}

		public function updateDatos(){
			echo ControladorUsuarios::UpdateDatos();
		}

		public function getDatos($idUsuario){
			echo json_encode(ControladorUsuarios::getData('sc_usuarios', 'usu_id_i', $idUsuario));
		}

		public function getAllDatos(){
            $usuarios = ControladorUsuarios::getData('sc_usuarios join sc_perfiles ON usu_per_id_i = perf_id_i join sc_bancos on ban_id_i = usu_banco_i', null, null);
echo '{
  	"data" : [';
  			$i = 0;
		 	foreach ($usuarios as $key => $value) {
		 		if($i != 0){
            		echo ",";
            	}
				echo '[';
				echo '"'.$value["usu_documento_v"].'",';
				echo '"'.$value["usu_nombre_v"].' '.$value["usu_apellido_v"].'",';
				echo '"'.$value["perf_nombre_v"].'",'; 
				echo '"'.$value["ban_nombre_v"].'",'; 
				echo '"'.$value["usu_id_i"].'"';
				echo ']';
            	$i++;
		 	}
		echo ']
}';
		}
	}


	if(isset($_POST['usu_documento_v_i'])){
		$AjaxUsuarios = new AjaxUsuarios();
		$AjaxUsuarios->insertDatos();
	}

	if(isset($_POST['usu_documento_v_e'])){
		$AjaxUsuarios = new AjaxUsuarios();
		$AjaxUsuarios->updateDatos();
	}

	if(isset($_POST['usu_id_i_d'])){
		$AjaxUsuarios = new AjaxUsuarios();
		$AjaxUsuarios->deleteDatos();
	}

	if(isset($_POST['usu_id_i_g'])){
		$AjaxUsuarios = new AjaxUsuarios();
		$AjaxUsuarios->getDatos($_POST['usu_id_i_g']);
	}

	if(isset($_GET['allDatos'])){
		$AjaxUsuarios = new AjaxUsuarios();
		$AjaxUsuarios->getAllDatos();
	}