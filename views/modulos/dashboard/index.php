
<link href="views/assets/StartBoots/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  	<h1 class="h3 mb-0 text-gray-800">Estadisticas</h1>
</div>
<div class="container-fluid">
	<div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Solicitudes Pendientes</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                        	<?php
$solicitudesPendient = ControladorUtilidades::getCount('sc_solicitudes_coolechera', 'sol_estado_i = 3');
echo $solicitudesPendient;
                        	?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-question-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                             	Solicitudes Asignadas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            	<?php
$solicitudesAsig = ControladorUtilidades::getCount('sc_solicitudes_coolechera', 'sol_estado_i = 4');
echo $solicitudesAsig;
                            	?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Clientes
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    <?php
$clients = ControladorUtilidades::getCount('sc_clientes', null);
echo $clients;
                            	?>	
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                             	Tecnicos Activos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                        	<?php
$tecnicosActivos = ControladorUtilidades::getCount('sc_usuarios', 'usu_per_id_i = 4 AND usu_est_id_i = 1');
echo $tecnicosActivos;
                        	?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
    	<div class="col-lg-12">
    		<table class="table table-hover table-bordered" style="width:100%">
    			<thead>
    				<tr>
    					<th colspan="5" style="text-align: center;">
    						DATOS DE LOS TECNICOS
    					</th>
    				</tr>
    				<tr>
    					<th style="width:10px; text-align: center;">#</th>
    					<th style="width:50%; text-align: center;">TECNICO</th>
    					<th style="width:18%; text-align: center;"># ASIGNACIONES</th>
    					<th style="width:18%; text-align: center;"># SOLUCIONADAS</th>
    					<th style="width:14%; text-align: center;">%</th>
    				</tr>
    			</thead>
    			<tbody>
    				<?php
                        $tecnicos = ControladorUtilidades::getDataFromLsql('usu_id_i, CONCAT(usu_nombre_v, \' \', usu_apellido_v) as nombres', 'sc_usuarios', 'usu_per_id_i = 4', null, 'ORDER BY usu_nombre_v ASC', null);

                        foreach($tecnicos as $key => $value){
                            $asignadas = 0;
                            $terminadas = 0;
                            
                            $revisarAsignadas = ControladorUtilidades::getDataFromLsql('sol_estado_i', 'sc_solicitudes_coolechera', 'sol_asignado_a_i = '.$value['usu_id_i'], null, null, null);
                            foreach($revisarAsignadas as $newKey => $newValue){
                                $asignadas++;
                                if($newValue['sol_estado_i'] == '5'){
                                    $terminadas++;
                                }
                            }
                            $promedio = 0;
                            if($asignadas > 0){
                                $promedio = ($terminadas*100/$asignadas);
                            }
                            echo '<tr>
                                    <td style="width:10px; text-align: center;">'.($key+1).'</td>
                                    <td style="width:50%; text-align: center;">'.mb_strtoupper($value['nombres']).'</td>
                                    <td style="width:18%; text-align: center;">'.$asignadas.'</td>
                                    <td style="width:18%; text-align: center;">'.$terminadas.'</td>
                                    <td style="width:14%; text-align: center;">'.number_format($promedio, 2).' %</td>
                                </tr>';
                        }
    				?>
    			</tbody>
    		</table>
    	</div>
    </div>


</div>