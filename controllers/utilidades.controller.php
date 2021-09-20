<?php
	class ControladorUtilidades extends ControladorPlantilla
	{

		public static function getCount($tabla, $condicion)
		{
			return ModeloDAO::mdlGetNumrows_number($tabla, $condicion);
		}
	}