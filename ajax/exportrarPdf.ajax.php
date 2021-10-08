<?php
	require_once '../vendor/autoload.php';
	require_once '../controllers/mail.controller.php';
	require_once '../controllers/plantilla.controller.php';
	require_once '../controllers/solicitudes.controller.php';

	require_once '../models/dao.modelo.php';
	require_once '../models/datatables.modelo.php';
	require_once '../models/solicitudes.modelo.php';
	require_once '../models/auth.modelo.php';

	if(isset($_GET['numeroOrden']) && $_GET['numeroOrden'] != '' ){
		//Listo necesitamos hacer todo lo de la consulta SQL para tarer los datos
		$usuarios = ControladorSolicitudes::getDataFromLsql('suc_nombre_v, sol_fecha_solicitud_d, sol_orden_trabajo, est_nombre_v, pri_desc_v, asi_fecha_d, hor_desc_v, sol_id_i, sol_fecha_solucion, asi_fecha_aignacion, sol_requerimiento_t, ban_nombre_v, CONCAT(usu_nombre_v, \' \', usu_apellido_v) as etcnico, suc_direccion_v', 'sc_solicitudes join sc_sucursales on suc_id_id = sol_suc_id_i  join sc_bancos on ban_id_i = sol_ban_id_i  join sc_estados ON est_id_i = sol_est_id_i LEFT JOIN sc_asignaciones ON asi_sol_id_i = sol_id_i LEFT JOIN sc_horas ON hor_id_id = asi_hor_id_i LEFT JOIN sc_prioridades ON  sol_prio_id= pri_id_i LEFT JOIN sc_usuarios ON usu_id_i = asi_usu_tec_id_i', 'sol_id_i = '.$_GET['numeroOrden'], null, null, null);
		//$mpdf = new \Mpdf\Mpdf();
		$cuerpo = '';
	 	foreach($usuarios as $value => $key){
	 		$cuerpo = '
<table width="100%">
    <tr>
        <td width="80%">
            <table style="font-family:tahoma;font-size:11;" width="100%" cellpadding="1px" cellspacing="1px" width="100%">
                <tr>
                    <td style="width:90%; text-align:center; font-size:12px;"><b>DATOS DE LA INCIDENCIA CON ORDEN DE TRABAJO '.$key['sol_orden_trabajo'].'</b></td>
                    <td style="width:10%"></td>
                </tr>
            </table>
            <table style="font-family:tahoma;font-size:11;" width="100%" cellpadding="1px" cellspacing="1px" width="100%">
                <tr>
                    <td style="width:90%;text-align:center;">INFORME INDIVIDUAL</td>
                    <td style="width:30%"></td>
                </tr>
            </table>
        </td>
        <td width="20%">
            <img src="../views/assets/img/theme/logotipo.jpg" width="85px" height="41px">
        </td>
    </tr>
</table>
<br/>
<table style="font-family:tahoma;font-size:11;border:solid 1px black;" width="100%" cellpadding="3px" cellspacing="1px" width="100%">
    <tr>
    	<th style="text-align:justify;">CLIENTE</th>
    	<th style="text-align:justify;">SUCURSAL</th>
    </tr>
    <tr>
    	<td>'.strtoupper($key['ban_nombre_v']).'</td>
    	<td>'.strtoupper($key['suc_nombre_v']).'</td>
    </tr>
    <tr>
    	<th style="text-align:justify;">DIRECCIÓN DEL SERVICIO</th>
    	<th style="text-align:justify;">ESTADO</th>
    </tr>
    <tr>
    	<td>'.strtoupper($key['suc_direccion_v']).'</td>
    	<td>'.strtoupper($key['est_nombre_v']).'</td>
    </tr>
</table>
<br/>
<table style="font-family:tahoma;font-size:11;border:solid 1px black;" width="100%" cellpadding="3px" cellspacing="1px" width="100%">
	<tr>
    	<th>REQUERIMIENTOS DEL SERVICIO</th>
    </tr>
    <tr>
    	<td>'.strtoupper($key['sol_requerimiento_t']).'</td>
    </tr>
</table>
<br/>
<table style="font-family:tahoma;font-size:11;border:solid 1px black;" width="100%" cellpadding="3px" cellspacing="1px" width="100%">
    <tr>
    	<th>FECHA SOLICITUD</th>
    	<th>FECHA ASIGNACIÓN</th>
    	<th>FECHA SOLUCIÓN</th>
    </tr>
    <tr>
    	<td style="text-align:center;">'.$key['sol_fecha_solicitud_d'].'</td>
    	<td style="text-align:center;">'.$key['asi_fecha_aignacion'].'</td>
    	<td style="text-align:center;">'.$key['sol_fecha_solucion'].'</td>
    </tr>
</table>
<br/>
<table style="font-family:tahoma;font-size:11;border:solid 1px black;" width="100%" cellpadding="3px" cellspacing="1px" width="100%">
	<tr>
    	<th>TECNICO DEL SERVICIO</th>
    </tr>
    <tr>
    	<td>'.strtoupper($key['etcnico']).'</td>
    </tr>
</table>
<br/>
<table style="font-family:tahoma;font-size:11;border:solid 1px black;" width="100%" cellpadding="3px" cellspacing="1px" width="100%">
	<tr>
    	<th style="text-align:center;">OBSERVACIONES</th>
    </tr>
</table>
<br/>
<table style="font-family:tahoma;font-size:11;border:solid 1px black;"  width="100%" cellpadding="3px" cellspacing="1px" width="100%">
	<tr>
    	<th style="width: 50%;">OBSERVACIONES</th>
    	<th style="width: 25%;">USUARIO REDACTA</th>
    	<th style="width: 25%;">FECHA</th>
    </tr>';
    	$observaciones = ControladorSolicitudes::getDataFromLsql('*', 'sc_observaciones JOIN sc_usuarios ON usu_id_i = 	obs_usu_id_i', 'obs_sol_id_i = '. $key['sol_id_i'], null, 'ORDER BY obs_fecha_d DESC', null);
    	foreach($observaciones as $newvalue => $newKey){
    		$cuerpo .= '<tr>
		    	<td style="width: 50%;">'.strtoupper($newKey['obs_desc_v']).'</td>
		    	<td style="width: 25%;">'.strtoupper($newKey['usu_nombre_v'].' '.$newKey['usu_apellido_v']).'</td>
		    	<td style="width: 25%;">'.$newKey['obs_fecha_d'].'</td>
		    </tr>';
    	}
 $cuerpo .= '</table>';
	 	}	
	 	

	 	$mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML($cuerpo);
		$mpdf->Output();
	}