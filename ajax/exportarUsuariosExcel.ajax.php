<?php
	session_start();
	require_once '../vendor/autoload.php';
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	
	require_once '../controllers/mail.controller.php';
	require_once '../controllers/plantilla.controller.php';
	require_once '../controllers/usuarios.controller.php';

	require_once '../models/dao.modelo.php';
	require_once '../models/datatables.modelo.php';
	require_once '../models/solicitudes.modelo.php';
	require_once '../models/auth.modelo.php';

	

	if(isset($_GET['descargarDatos']) && $_GET['descargarDatos'] != '' ){


		$usuarios = ControladorUsuarios::getData('sc_usuarios join sc_perfiles ON usu_per_id_i = perf_id_i left join sc_bancos on ban_id_i = usu_banco_i', null, null);


		$objPHPExcel = new Spreadsheet();


		$objPHPExcel->getActiveSheet()
			->getStyle('A1:H1')
			->getAlignment();

		$objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getFont()->setBold( true );


		$objPHPExcel->getActiveSheet()->setTitle('INCIDENCIAS');
		$objPHPExcel->getActiveSheet()->setCellValue("A1", "#"); 
	    $objPHPExcel->getActiveSheet()->setCellValue("B1", "IDENTIFICACION");
	    $objPHPExcel->getActiveSheet()->setCellValue("C1", "NOMBRES"); 
	    $objPHPExcel->getActiveSheet()->setCellValue("D1", "APELLIDOS");    
	    $objPHPExcel->getActiveSheet()->setCellValue("E1", "CORREO"); 
	    $objPHPExcel->getActiveSheet()->setCellValue("F1", "USUARIOS"); 
	    $objPHPExcel->getActiveSheet()->setCellValue("G1", "TIPO USUARIO"); 
	    $objPHPExcel->getActiveSheet()->setCellValue("H1", "BANCO"); 
	    $i = 2;
	    foreach ($usuarios as $key => $value) {
			$objPHPExcel->getActiveSheet()->setCellValue("A".$i, ($key+1)); 
			$objPHPExcel->getActiveSheet()->setCellValue("B".$i, $value['usu_documento_v']);
			$objPHPExcel->getActiveSheet()->setCellValue("C".$i, $value['usu_nombre_v']); 
			$objPHPExcel->getActiveSheet()->setCellValue("D".$i, $value['usu_apellido_v']);    
			$objPHPExcel->getActiveSheet()->setCellValue("E".$i, $value['usu_correo_v']); 
			$objPHPExcel->getActiveSheet()->setCellValue("F".$i, $value['usu_nombre_v']); 
			$objPHPExcel->getActiveSheet()->setCellValue("G".$i, $value['perf_nombre_v']); 
			$objPHPExcel->getActiveSheet()->setCellValue("H".$i, $value['ban_nombre_v']); 
			$i++;
	    }

	    foreach(range('A','H') as $columnID) {
        	$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
            ->setAutoSize(true);
    	}

	 	// Write the Excel file to filename some_excel_file.xlsx in the current directory
	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	    header('Content-Disposition: attachment;filename="Informe_usuarios_registrados.xlsx"');
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