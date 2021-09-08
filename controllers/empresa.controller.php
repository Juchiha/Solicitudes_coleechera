<?php
	class ControladorEmpresa extends ControladorPlantilla
	{
		public static function subirArchivos(){
			if(isset($_POST['I_emp_nit_v'])){

				$ruta = __DIR__."/../views/documentos/";
				$ruta_2 = "views/documentos/";
				if(isset($_FILES['I_emp_razon_social_v']['tmp_name']) && !empty($_FILES['I_emp_razon_social_v']['tmp_name']) ){

					$fileName = $_FILES['I_emp_razon_social_v']['name'];
					$fileNameCmps = explode(".", $fileName);
					$fileExtension = strtolower(end($fileNameCmps));
				
            		$aleatorio = mt_rand(100, 999);
	                $ruta = $ruta.$aleatorio.'.'.$fileExtension;
	                $ruta_2 = $ruta_2.$aleatorio.'.'.$fileExtension;
	                copy($_FILES['I_emp_razon_social_v']['tmp_name'], $ruta);
		 		}
		 		date_default_timezone_set('America/Bogota');
		 		$datos = array(
					'doc_descripcion_v' 			=> $_POST['I_emp_nit_v'], 
					'doc_fecha_d' 					=> date('Y-m-d'),
					'doc_user_registrador_i' 		=> $_SESSION['codigo'],
					'doc_ruta_v'					=> $ruta_2,
					'doc_tipo_v'					=> 'Archivo',
					'doc_carp_id_i'					=> $_POST['idCarpetaPadre']
				);

				$resp = EmpresaModelo::insertDatos($datos);
				if($resp != 'error'){
					/*Notificamos del cargue de la informacion*/
					$titulo = 'Notificación de cargue Documento fecha '.date('d/m/Y');
        			$mensaje = '
<html>
  <head>
    <title>Notificación de cargue Documento</title>
  </head>
  <body style="text-align:justify;">
      <p>Hola equipo de incapacidades,</p>
      <p>Este mensaje ha sido enviado debido a que el usuario '.$_SESSION['nombres'].', a cargado un archivo con la siguiente descripci&oacute;n:</p>
      <p>'.$_POST['I_emp_nit_v'].'</p>
      <p>Saludos! pongamos el proceso a funcionar en virtud de este nuevo cargue!</p>
  </body>
</html>';
					self::EnviarMail($titulo, $mensaje, 'jgiron9001@gmail.com,incapacidades@gmail.com', null, null, $usuario = null);
					return json_encode(array('code' => '1', 'mensaje' => 'Archivo subido con exito') );
				}else{
					return json_encode(array('code' => '0', 'mensaje' => 'No se pudo ingresar el archivo'));
				}
			}		 
		 	
		}

		public static function deleteDatos(){
			if(isset($_POST['D_emp_id_i'])){
				$resp = EmpresaModelo::deleteDatos($_POST['D_emp_id_i']);
				if($resp != 'error'){
					return json_encode(array('code' => '1', 'mensaje' => 'Archivo borrado con exito') );
				}else{
					return json_encode(array('code' => '0', 'mensaje' => 'No se pudo borrar el Archivo'));
				}
			}
		}

		public static function createCarpeta(){
			if(isset($_POST['I_doc_tipo_v'])){
				date_default_timezone_set('America/Bogota');
		 		$datos = array(
					'doc_descripcion_v' 			=> $_POST['I_doc_tipo_v'], 
					'doc_fecha_d' 					=> date('Y-m-d'),
					'doc_user_registrador_i' 		=> $_SESSION['codigo'],
					'doc_ruta_v'					=> null,
					'doc_tipo_v'					=> 'Carpeta',
					'doc_carp_id_i'					=> $_POST['idCarpetaPadre']
				);

				$resp = EmpresaModelo::insertDatos($datos);
				if($resp != 'error'){
					return json_encode(array('code' => '1', 'mensaje' => 'Carpeta Creada con exito') );
				}else{
					return json_encode(array('code' => '0', 'mensaje' => 'No se pudo crear la carpeta'));
				}
			}
		}


	}