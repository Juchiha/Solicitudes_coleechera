<?php

require_once 'mail.controller.php';

class EnvioCorreoCliente extends Thread{
    public $correo;
    public $numeroOrden;

    public function __construct($_correo, $_numeroOrden){
        $this->correo = $_correo;
        $this->numeroOrden = $_numeroOrden;
    }

    public function run(){
        $para  = $this->correo ;
        $titulo = 'Notificación Proceso / Incidencia #'.$this->numeroOrden;
        $mensaje = '
  <html>
    <head>
      <title>Notificaci&oacute;n Proceso / Incidencia #'.$this->numeroOrden.'</title>
    </head>
    <body style="text-align:justify;">
        <p>Saludos cordiales,</p>
        <p style="text-align:justify;">
          Su solicitud ha sido recibida y se le asignó el numero '.$this->numeroOrden.'. Estaremos en contacto con usted para mantenerle informado lo antes posible.
        </p>
        <p>Cordialmente,</p>
        <p>
          Tecnolog&iacute;a y Transformaci&oacute;n Digital, Coolechera
        </p>
      </body>
  </html>';

        $respueta = ctrMail::EnviarMailWithEmailAndPass('Notificaciones Incidencias Reportadas', $titulo, $mensaje, $para, null, null );
        print_r($respueta);
        sleep(1);
    }
}