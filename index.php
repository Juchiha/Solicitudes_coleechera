<?php
	session_start();
	ini_set('display_errors', 'On');
    ini_set('display_errors', 1);
	
	
	require_once 'controllers/mail.controller.php';
	require_once 'controllers/plantilla.controller.php';
	require_once 'controllers/auth.controller.php';
	require_once 'controllers/empresa.controller.php';
	require_once 'controllers/solicitudes.controller.php';
	require_once 'controllers/sucursales.controller.php';
	require_once 'controllers/usuarios.controller.php';




	require_once 'models/dao.modelo.php';
	require_once 'models/auth.modelo.php';
	require_once 'models/empresa.modelo.php';
	require_once 'models/bancos.modelo.php';
	require_once 'models/solicitudes.modelo.php';
	require_once 'models/sucursales.modelo.php';
	require_once 'models/usuario.modelo.php';
	

	/* ==== ZONA PARA EXTENSIONES ==== */

	$plantilla = new ControladorPlantilla();
	$plantilla->ctrPlantilla();