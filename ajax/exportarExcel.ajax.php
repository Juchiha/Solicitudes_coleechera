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
	require_once '../models/auth.modelo.php';

	

	if(isset($_GET['descargarDatos']) && $_GET['descargarDatos'] != '' ){

		$where = null;
		if ($_SESSION['perfil'] == '4') {
			$where = 'asi_usu_tec_id_i = '.$_SESSION['codigo'];
		}else if($_SESSION['perfil'] == '3'){
			$where = 'sol_ban_id_i = '.$_SESSION['bnco_id'];
		}else{
			$where = null;
		}

		$usuarios = ControladorSolicitudes::getDataFromLsql('suc_nombre_v, sol_fecha_solicitud_d, sol_orden_trabajo, est_nombre_v, pri_desc_v, asi_fecha_d, hor_desc_v, sol_id_i, sol_fecha_solucion, asi_fecha_aignacion, sol_requerimiento_t, ban_nombre_v, CONCAT(usu_nombre_v, \' \', usu_apellido_v) as etcnico, suc_direccion_v', 'sc_solicitudes join sc_sucursales on suc_id_id = sol_suc_id_i  join sc_bancos on ban_id_i = sol_ban_id_i  join sc_estados ON est_id_i = sol_est_id_i LEFT JOIN sc_asignaciones ON asi_sol_id_i = sol_id_i LEFT JOIN sc_horas ON hor_id_id = asi_hor_id_i LEFT JOIN sc_prioridades ON  sol_prio_id= pri_id_i LEFT JOIN sc_usuarios ON usu_id_i = asi_usu_tec_id_i', $where, null, 'ORDER BY sol_orden_trabajo DESC', null);


		$objPHPExcel = new Spreadsheet();


		$objPHPExcel->getActiveSheet()
			->getStyle('A1:K1')
			->getAlignment();

		$objPHPExcel->getActiveSheet()->getStyle('A1:K1')->getFont()->setBold( true );


		$objPHPExcel->getActiveSheet()->setTitle('INCIDENCIAS');
		$objPHPExcel->getActiveSheet()->setCellValue("A1", "#"); 
	    $objPHPExcel->getActiveSheet()->setCellValue("B1", "BANCO");
	    $objPHPExcel->getActiveSheet()->setCellValue("C1", "SUCURSAL"); 
	    $objPHPExcel->getActiveSheet()->setCellValue("D1", "# ORDEN");    
	    $objPHPExcel->getActiveSheet()->setCellValue("E1", "PRIORIDAD"); 
	    $objPHPExcel->getActiveSheet()->setCellValue("F1", "ESTADO"); 
	    $objPHPExcel->getActiveSheet()->setCellValue("G1", "TECNICO"); 
	    $objPHPExcel->getActiveSheet()->setCellValue("H1", "FECHA SOLICITUD"); 
	    $objPHPExcel->getActiveSheet()->setCellValue("I1", "FECHA ASIGNACION"); 
	    $objPHPExcel->getActiveSheet()->setCellValue("J1", "FECHA SOLUCION"); 
	    $objPHPExcel->getActiveSheet()->setCellValue("K1", "DATOS DE LA INCIDENCIA");

	    $i = 2;
	    foreach ($usuarios as $key => $value) {
			$objPHPExcel->getActiveSheet()->setCellValue("A".$i, ($key+1)); 
			$objPHPExcel->getActiveSheet()->setCellValue("B".$i, $value['ban_nombre_v']);
			$objPHPExcel->getActiveSheet()->setCellValue("C".$i, $value['suc_nombre_v']); 
			$objPHPExcel->getActiveSheet()->setCellValue("D".$i, $value['sol_orden_trabajo']);    
			$objPHPExcel->getActiveSheet()->setCellValue("E".$i, $value['pri_desc_v']); 
			$objPHPExcel->getActiveSheet()->setCellValue("F".$i, $value['est_nombre_v']); 
			$objPHPExcel->getActiveSheet()->setCellValue("G".$i, $value['etcnico']); 
			$objPHPExcel->getActiveSheet()->setCellValue("H".$i, $value['sol_fecha_solicitud_d']); 
			$objPHPExcel->getActiveSheet()->setCellValue("I".$i, $value['asi_fecha_aignacion']); 
			$objPHPExcel->getActiveSheet()->setCellValue("J".$i, $value['sol_fecha_solucion']); 
			$objPHPExcel->getActiveSheet()->setCellValue("K".$i, $value['sol_requerimiento_t']);
			$i++;
	    }

	    foreach(range('A','K') as $columnID) {
        	$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
            ->setAutoSize(true);
    	}

	 	// Write the Excel file to filename some_excel_file.xlsx in the current directory
	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	    header('Content-Disposition: attachment;filename="Informe_consolidado_incidencias.xlsx"');
	    header('Cache-Control: max-age=0');
	    // If you're serving to IE 9, then the following may be needed
	    header('Cache-Control: max-age=1');

	    // If you're serving to IE over SSL, then the following may be needed
	    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
	    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	    header ('Pragma: public'); // HTTP/1.0
	    $writer = new Xlsx($objPHPExcel);
    	$writer->save("php://output");
	}