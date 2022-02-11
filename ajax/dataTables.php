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
	if ($_SESSION['perfil'] == '4'){
		$where = " sol_asignado_a_i = ".$_SESSION['codigo'];
	}
	$valido = " ";

	if(isset($_POST['equipo']) && $_POST['equipo'] != 0){
		if($where != '' && $where != null){
			$valido = " AND ";
		}
		$where .= $valido.'sol_clie_id_i = '.$_POST['equipo'] ;
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
                    <th style="width: 6%;"></th>
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
		}else{
			if(mb_strtoupper($value['pri_desc_v']) == 'ALTA'){
				$color = 'style="color:red;"';
			}
			if(mb_strtoupper($value['pri_desc_v']) == 'MEDIA'){
				$color = 'style="color:orange;"';
			}
			if(mb_strtoupper($value['pri_desc_v']) == 'BAJA'){
				$color = 'style="color:yellow;"';
			}
		}


		echo '<tr '.$color.'>';
			echo '<td>'.($key+1).'</td>';
			echo '<td>'.$value['sol_asunto_v'].'</td>';
			echo '<td>'.$value['cli_nombre_v'].'</td>';
			echo '<td>'.$value['sol_fecha_solicitud'].'</td>';
			echo '<td>'.$value['pri_desc_v'].'</td>';
			echo '<td>'.$value['usu_nombre_v'].'</td>';
			echo '<td>'.$value['sol_orden_trabajo_v'].'</td>';
			echo '<td>';
				echo '<div class="btn-group">';
	       		echo '<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
		        echo '<i class="fa fa-info-circle"></i>';
		        echo '<span class="sr-only">Toggle Dropdown</span>';
		        echo '</button>';
		        echo '<ul class="dropdown-menu" role="menu">';
				if ($_SESSION['perf_upd_i'] == 1) {	
			        echo '<li><a class="dropdown-item btnEditarSolicitudes" title="Editar incidencia" id_solicitud = "'.$value['sol_id_i'].'" data-toggle="modal" data-target="#modalEditarSolicitudes" href="#">EDITAR</a></li>';
			        echo '<li class="divider"></li>';
				}
				if ($_SESSION['perf_del_i'] == 1) {	
			        echo '<li><a class="dropdown-item btnEliminarSolicitudes" title="Eliminar incidencia" id_solicitud = "'.$value['sol_id_i'].'" href="#">ELIMINAR</a></li>';
			        echo '<li class="divider"></li>';
				}
				if ($_SESSION['perfil'] == '4'){
			    	echo '<li><a class="dropdown-item btnEditarSolicitudes" data-toggle="modal" data-target="#modalEditarSolicitudes"  title="Datos de Incidencia" id_solicitud= "'.$value['sol_id_i'].'" href="#">VER INCIDENCIA</a></li>';
			       	echo ' <li class="divider"></li>';	
				}
				if($_SESSION['perfil'] != 4){
			    	echo '<li><a class="dropdown-item btnExportarPDF" title="Exportar PDF" id_solicitud = "'.$value['sol_id_i'].'" href="#">EXPORTAR</a></li>';
			       	echo '<li class="divider"></li>';
				}
	    
	     	echo '</ul>
	     		</div>
	     	</td>';
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
                    <th style="width: 6%;"></th>
	            </tr>
	        </tfoot>
	   	</table>';

	echo '
	<script src="views/assets/StartBoots/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="views/assets/StartBoots/vendor/datatables/dataTables.bootstrap4.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
	<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
	<script type="text/javascript">
		$(function(){
			var dataTableEmpresas = $(\'#dataTableUsuario\').DataTable({
		        "order": [[ 3, "desc" ]],
		    	"language" : {
			        "sProcessing":     "Procesando...",
			        "sLengthMenu":     "Mostrar _MENU_ registros",
			        "sZeroRecords":    "No se encontraron resultados",
			        "sEmptyTable":     "Ningún dato disponible en esta tabla",
			        "sInfo":           "Mostrando de _START_ a _END_ de _TOTAL_",
			        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			        "sInfoPostFix":    "",
			        "sSearch":         "Buscar:",
			        "sUrl":            "",
			        "sInfoThousands":  ",",
			        "sLoadingRecords": "Cargando...",
			        "oPaginate": {
			            "sFirst":    "Primero",
			            "sLast":     "Último",
			            "sNext":     "Siguiente",
			            "sPrevious": "Anterior"
			        },
			        "oAria": {
			            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
			        }
			    }
			});

		
			/* Esta parte es para traer los datos de la edicion */
		    $(\'#dataTableUsuario tbody\').on("click", ".btnVerSolicitudes", function(){
		        var x = $(this).attr(\'id_solicitud\');
		        Solicitudes.getSolicitudAsignada(x);
		       	$("#sol_id_i_eAsi").val(x);
		    });

			/*Activar funcionalidad de boton eliminar*/
		    $(\'#dataTableUsuario tbody\').on("click", ".btnEliminarSolicitudes", function(){
		        var x = $(this).attr(\'id_solicitud\');
				swal({
		            title: \'¿Está seguro de borrar la incidencia?\',
		            text: "¡Si no lo está puede cancelar la accíón!",
		            type: \'warning\',
		            showCancelButton: true,
		            confirmButtonColor: \'#3085d6\',
		            cancelButtonColor: \'#d33\',
		            cancelButtonText: \'Cancelar\',
		            confirmButtonText: \'Si, borrar incidencia!\'
		        },function(isConfirm) {
		            if (isConfirm) {
						Solicitudes.deleteSolicitudes(x,dataTableEmpresas);
					}
				});			
		    });

		    $(\'#dataTableUsuario tbody\').on("click", ".btnEditarSolicitudes", function(){
		        var x = $(this).attr(\'id_solicitud\');
		       	Solicitudes.getSolicitud(x);
		    });

		    $("#dataTableUsuario tbody").on(\'click\', \'.btnExportarPDF\', function(){
		    	var x = $(this).attr(\'id_solicitud\');
		    	window.open(\'ajax/exportrarPdf.ajax.php?numeroOrden=\'+x);
		    });	
		});
	</script>';