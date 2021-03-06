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

	$where = null;
	$valido = " ";

	if(isset($_POST['equipo']) && $_POST['equipo'] != 0){
		if($where != '' && $where != null){
			$valido = " AND ";
		}
		$where .= $valido.'sol_asignado_a_i = '.$_POST['equipo'] ;
	}

	if(isset($_POST['prioridad']) && $_POST['prioridad'] != 0){
		if($where != '' && $where != null){
			$valido = " AND ";
		}
		$where .= $valido.' sol_prioridad_i = '.$_POST['prioridad'] ;
	}

	if(isset($_POST['estado']) && $_POST['estado'] != 0){
		if($where != '' && $where != null){
			$valido = " AND ";
		}
		$where .= $valido.' sol_estado_i = '.$_POST['estado'] ;
	}

	if(isset($_POST['otrabajo']) && $_POST['otrabajo'] != ""){
		if($where != '' && $where != null){
			$valido = " AND ";
		}
		$where .= $valido." sol_orden_trabajo_v='".$_POST['otrabajo']."'" ;
	}

	if(isset($_POST['fromDate']) && $_POST['fromDate'] != "" && isset($_POST['toDate']) && $_POST['toDate'] != ""){
		if($where != '' && $where != null){
			$valido = " AND ";
		}
		$where .= $valido." sol_fecha_solicitud BETWEEN '".$_POST['fromDate']."' AND '".$_POST['toDate']."'" ;
	}

	if(isset($_POST['fromDate']) && $_POST['fromDate'] != "" && isset($_POST['toDate']) && $_POST['toDate'] == ""){
		if($where != '' && $where != null){
			$valido = " AND ";
		}
		$where .= $valido." sol_fecha_solicitud = '".$_POST['fromDate']."'" ;
	}

	if(isset($_POST['tipo_sol']) && $_POST['tipo_sol'] != 0){
		if($where != '' && $where != null){
			$valido = " AND ";
		}
		$where .= $valido." sol_tipo_sol_id_i = '".$_POST['tipo_sol']."'" ;
	}
	

	$usuarios = ControladorSolicitudes::getDataFromLsql('cli_nombre_v, sol_fecha_solicitud, sol_orden_trabajo_v, sol_estado_i, sol_prioridad_i, sol_asignado_a_i,  est_nombre_v, pri_desc_v, sol_id_i, usu_nombre_v, sol_asunto_v', 'sc_solicitudes_coolechera JOIN sc_clientes ON cli_id_i = sol_clie_id_i JOIN sc_estados ON est_id_i = sol_estado_i LEFT JOIN sc_prioridades ON  sol_prioridad_i = pri_id_i LEFT JOIN sc_usuarios ON usu_id_i = sol_asignado_a_i', $where, null, 'ORDER BY sol_fecha_solicitud DESC', null);


	echo '<table class="table table-bordered" id="dataTableUsuario" width="100%" cellspacing="0">
            <thead>
                <tr>
                	<th style="width: 3%;">#</th>
                	<th style="width: 20%;">Asunto</th>
            		<th style="width: 20%;">Quien solicita</th>
                    <th style="width: 12%;">Fecha Sol.</th>
                    <th style="width: 7%;">Prioridad</th>
                    <th style="width: 14%;">Asignado A</th>
                    <th style="width: 10%;">OT</th>
                    <th style="width: 6%;">ESTADO</th>
                </tr>
            </thead>
            <tbody>';
            if($usuarios == false){
            	echo '<tr>
                	<th colspan="8" style="text-align:center;"><b>No hay datos con esos criterios de busqueda</b></th>
                </tr>';
            }
	foreach($usuarios as $key => $value){
		$color = '';
		if($value['sol_estado_i'] == 5){
			$color = 'style="color:green;"';
		}
		echo '<tr '.$color.'>';
			echo '<td>'.($key+1).'</td>';
			echo '<td>'.$value['sol_asunto_v'].'</td>';
			echo '<td>'.$value['cli_nombre_v'].'</td>';
			echo '<td>'.$value['sol_fecha_solicitud'].'</td>';
			echo '<td>'.$value['pri_desc_v'].'</td>';
			echo '<td>'.$value['usu_nombre_v'].'</td>';
			echo '<td>'.$value['sol_orden_trabajo_v'].'</td>';
			echo '<td>'.$value['est_nombre_v'].'</td>';
		echo '</tr>';
	}

	echo '	</tbody>
			<tfoot>
	             <tr>
	        		<th style="width: 3%;">#</th>
                	<th style="width: 20%;">Asunto</th>
            		<th style="width: 20%;">Quien solicita</th>
                    <th style="width: 12%;">Fecha Sol.</th>
                    <th style="width: 7%;">Prioridad</th>
                    <th style="width: 14%;">Asignado A</th>
                    <th style="width: 10%;">OT</th>
                    <th style="width: 6%;">OT</th>
	            </tr>
	        </tfoot>
	   	</table>';