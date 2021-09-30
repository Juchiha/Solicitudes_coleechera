<?php
	/**
	* Este archivo se encarga de controlar el inicio de sessiones
	*/
	class ControladorAuth
	{
		
		public static function inicoSession(){
			//Validamos que vengan los campos
			if(isset($_POST['usu_usuario_v']) && isset($_POST['usu_password_v'])){
				/*Validamos que no intenten hacer Inyeccion sql o meter caracteres extraños */
				if($_POST['usu_usuario_v'] != '' && $_POST['usu_password_v'] != ''){
						
						$item 	= "usu_usuario_v";
						$valor	= $_POST['usu_usuario_v'];
						//Encriptamos la contraseña
						$pass = md5($_POST['usu_password_v']);
						//Mandamos a preguntar la información
						$respuesta = ModeloAuth::getDatosUsuarioLogin($item, $valor);
						
						if($respuesta['usu_usuario_v'] == $_POST['usu_usuario_v'] && $respuesta['usu_password_v'] == $pass){

							//$imagen = 'views/assets/img/usuarios/default/anonymous.png';
							$_SESSION['SessionSeguimientos'] 		= 'ok';
							$_SESSION['codigo']						= $respuesta['usu_id_i'];
							$_SESSION['nombres'] 					= $respuesta['usu_nombre_v'].' '.$respuesta['usu_apellido_v'];
							$_SESSION['perfil']						= $respuesta['usu_per_id_i'];
							//$_SESSION['correo'] 					= $respuesta['usu_usuario_v'];
							$_SESSION['bnco_id']					= $respuesta['usu_banco_i'];
							$_SESSION['perf_asig_i']				= $respuesta['perf_asig_i'];
							$_SESSION['perf_add_i']				    = $respuesta['perf_add_i'];
							$_SESSION['perf_upd_i']				    = $respuesta['perf_upd_i'];
							$_SESSION['perf_del_i']				    = $respuesta['perf_del_i'];
							$_SESSION['idSession'] 					= Time().rand();


							/*=============================================
								REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN, AUDIORIA
							=============================================*/
							/*date_default_timezone_set('America/Bogota');
							$fecha = date('Y-m-d');
							$hora = date('H:i:s');
							$fechaActual = $fecha.' '.$hora;
							$_SESSION['ultimaSession'] = $fechaActual;
							$item1 = "user_ultimo_login";
							$valor1 = $fechaActual;
							$item2 = "user_id";
							$valor2 = $respuesta["user_id"];
							/*Enviamos la carga de informacion para guardar la ultima vez que esta persona se logeo en el sistema */
							/*$ultimoLogin = ModeloAuth::actualizarUsuarioPostLogin('sc_usuarios', $item1, $valor1, $item2, $valor2);
							if($ultimoLogin == "ok"){
								/*No paso nada y guardo todo bien, la mandamos al inicio*/
								echo '<script>
										window.location = "incidencias";
									</script>';
							/*}else{
								var_dump($ultimoLogin);
								/*ALgo paso y no actualizo el campo de fecha del ultimo login*/
							//}
							
						}else{
							echo "<br>";
							echo "<div class='alert alert-danger'>Error al ingresar, correo y/o contraseña incorrectos</div>";
						}

					
				}else{
					echo "<br>";
					echo "<div class='alert alert-danger'>Error al ingresar, se enviaron caracteres extraños</div>";
				}
			}
		}

	}	


