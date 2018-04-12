<?php namespace Config;


	class Autoload {

		public static function Start() {

			spl_autoload_register(function($clase)
			{
				$ruta = dirname(__DIR__) . "/" . str_replace("\\", "/", $clase) . ".php";
			
				if(is_readable($ruta))
				 	require_once($ruta); 	
				else 
					 echo "No Existe la Ruta: " . $ruta;
			});
		}

	}

?>