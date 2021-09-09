<?php
	class Conexion 
	{
		static public function conectar()
		{	
			$link = new PDO("mysql:host=localhost;dbname=seguimiento_casos", "root", "");
			//seteamos los caracteres latinos
			$link->exec("set names utf8");
			return $link;
		}
	}