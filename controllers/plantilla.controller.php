<?php
	/**
	* 
	*/
	class ControladorPlantilla extends ctrMail
	{
		
		static public function ctrPlantilla(){
            if(isset($_SESSION['SessionSeguimientos']) && $_SESSION['SessionSeguimientos'] == 'ok')
            {
                include "views/plantilla.php";
            }else{
                include "views/modulos/login/login.php";
            }
			
		}

        static public function getData($table, $item, $value){
            return ModeloDAO::getDatos($table, $item, $value);
        }

        static public function getDataFromLsql($campos, $tabla, $where = null, $group = null, $order = null, $limit = null){
                return ModeloDAO::mdlMostrarGroupAndOrder($campos, $tabla, $where, $group, $order, $limit);
        }

		static public function putImage($fila, $typo, $ruta, $rutaReal, $extension = null){
            if($typo == "image/jpeg" || $typo == "image/png"){
                list($ancho, $alto) = getimagesize($fila);
                $nuevoAncho = $ancho;
                $nuevoAlto  = $alto;
            }
            //echo $typo ;
            
            if (!file_exists($ruta)) {
                mkdir($ruta, 0755);
            }

            if($typo == "image/jpeg"){
                $aleatorio = mt_rand(1000, 9999).date('YmdHis');
                $ruta =  $ruta.$aleatorio.".jpg";
                $rutaReal =  $rutaReal.$aleatorio.".jpg";
                $origen  = imagecreatefromjpeg($fila);
                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                imagejpeg($destino, $ruta);
            }elseif($typo == "image/png"){
                $aleatorio = mt_rand(1000, 9999).date('YmdHis');
                $ruta = $ruta.$aleatorio.".png";
                $rutaReal =  $rutaReal.$aleatorio.".png";
                $origen  = imagecreatefrompng($fila);
                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                imagepng($destino, $ruta);
            }else{
                $extecion = "";
                if($typo == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'){
                    $extecion = ".docx";
                }else if($typo == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'){
                    $extecion = ".xlsx";
                }else if($typo == 'application/pdf'){
                    $extecion = ".pdf";
                }else if($typo == 'message/rfc822'){
                    $extecion = ".eml";
                }
                $aleatorio = mt_rand(100, 9999).date('YmdHis');
                $rutaReal =  $rutaReal.$aleatorio.$extecion;
                $ruta =  $ruta.$aleatorio.$extecion;
                copy($fila, $ruta);
            }
            return $rutaReal;
        }


        
        public static function getBrowser($user_agent){

            if(strpos($user_agent, 'MSIE') !== FALSE)
                   return 'Internet explorer';
                elseif(strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge
                   return 'Microsoft Edge';
                elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11
                    return 'Internet explorer';
                elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
                   return "Opera Mini";
                elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
                   return "Opera";
                elseif(strpos($user_agent, 'Firefox') !== FALSE)
                   return 'Mozilla Firefox';
                elseif(strpos($user_agent, 'Chrome') !== FALSE)
                   return 'Google Chrome';
                elseif(strpos($user_agent, 'Safari') !== FALSE)
                   return "Safari";
                else
                   return 'No hemos podido detectar su navegador';
        }

	}