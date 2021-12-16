<?php
	session_start();
	require_once '../vendor/autoload.php';
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	require_once '../controllers/mail.controller.php';
	require_once '../controllers/plantilla.controller.php';
	require_once '../controllers/solicitudes.controller.php';

	require_once '../models/dao.modelo.php';
	require_once '../models/datatables.modelo.php';
	require_once '../models/solicitudes.modelo.php';
	require_once '../models/clientes.modelo.php';
	require_once '../models/auth.modelo.php';

	$where = ' 1 = 1 ';

	if(isset($_POST['equipo']) && $_POST['equipo'] != 0){
		$where .= ' AND sol_asignado_a_i='.$_POST['equipo'] ;
	}

	if(isset($_POST['prioridad']) && $_POST['prioridad'] != 0){
		$where .= ' AND sol_prioridad_i='.$_POST['prioridad'] ;
	}

	if(isset($_POST['estado']) && $_POST['estado'] != 0){
		$where .= ' AND sol_estado_i='.$_POST['estado'] ;
	}

	if(isset($_POST['otrabajo']) && $_POST['otrabajo'] != ""){
		$where .= " AND sol_orden_trabajo_v='".$_POST['otrabajo']."'" ;
	}

	if(isset($_POST['fromDate']) && $_POST['fromDate'] != "" && isset($_POST['toDate']) && $_POST['toDate'] != ""){
		$where .= " AND sol_fecha_solicitud BETWEEN '".$_POST['fromDate']."' AND '".$_POST['toDate']."'" ;
	}

	if(isset($_POST['fromDate']) && $_POST['fromDate'] != "" && isset($_POST['toDate']) && $_POST['toDate'] == ""){
		$where .= " AND sol_fecha_solicitud = '".$_POST['fromDate']."'" ;
	}

	if(isset($_POST['tipo_sol']) && $_POST['tipo_sol'] != 0){
		$where .= " AND sol_tipo_sol_id_i = '".$_POST['tipo_sol']."'" ;
	}

	$usuarios = ControladorSolicitudes::getDataFromLsql('cli_nombre_v, sol_fecha_solicitud, sol_orden_trabajo_v, sol_estado_i, sol_prioridad_i, sol_asignado_a_i,  est_nombre_v, pri_desc_v, sol_id_i, usu_nombre_v, sol_asunto_v', 'sc_solicitudes_coolechera JOIN sc_clientes ON cli_id_i = sol_clie_id_i JOIN sc_estados ON est_id_i = sol_estado_i LEFT JOIN sc_prioridades ON  sol_prioridad_i = pri_id_i LEFT JOIN sc_usuarios ON usu_id_i = sol_asignado_a_i', $where, null, 'ORDER BY sol_fecha_solicitud DESC', null);

	$objPHPExcel = new Spreadsheet();


	$objPHPExcel->getActiveSheet()
		->getStyle('A1:H1')
		->getAlignment();

	$objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getFont()->setBold( true );


	$objPHPExcel->getActiveSheet()->setTitle('INCIDENCIAS');
	$objPHPExcel->getActiveSheet()->setCellValue("A1", "#"); 
    $objPHPExcel->getActiveSheet()->setCellValue("B1", "ASUNTO");
    $objPHPExcel->getActiveSheet()->setCellValue("C1", "QUIEN SOLICITA"); 
    $objPHPExcel->getActiveSheet()->setCellValue("D1", "FECHA SOLICITUD");    
    $objPHPExcel->getActiveSheet()->setCellValue("E1", "PRIORIDAD"); 
    $objPHPExcel->getActiveSheet()->setCellValue("F1", "ASIGNADO A"); 
    $objPHPExcel->getActiveSheet()->setCellValue("G1", "OT"); 
    $objPHPExcel->getActiveSheet()->setCellValue("H1", "ESTADO"); 

    $i = 2;
    foreach ($usuarios as $key => $value) {
		$objPHPExcel->getActiveSheet()->setCellValue("A".$i, ($key+1)); 
		$objPHPExcel->getActiveSheet()->setCellValue("B".$i, $value['sol_asunto_v']);
		$objPHPExcel->getActiveSheet()->setCellValue("C".$i, $value['cli_nombre_v']); 
		$objPHPExcel->getActiveSheet()->setCellValue("D".$i, $value['sol_fecha_solicitud']);    
		$objPHPExcel->getActiveSheet()->setCellValue("E".$i, $value['pri_desc_v']); 
		$objPHPExcel->getActiveSheet()->setCellValue("F".$i, $value['usu_nombre_v']); 
		$objPHPExcel->getActiveSheet()->setCellValue("G".$i, $value['sol_orden_trabajo_v']); 
		$objPHPExcel->getActiveSheet()->setCellValue("H".$i, $value['est_nombre_v']); 
		$i++;
    }

    foreach(range('A','H') as $columnID) {
    	$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
        ->setAutoSize(true);
	}

 	
	ob_start();
    //$writer->save("php://output");
    $writer = new Xlsx($objPHPExcel);
    $writer->save("php://output");
    $xlsData = ob_get_contents();
    ob_end_clean(); 

    $response =  array(
        'op' => 'ok',
        'file' => "data:application/vnd.ms-excel;base64,".base64_encode($xlsData)
    );

    echo json_encode($response);