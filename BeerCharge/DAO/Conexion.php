<?php namespace DAO;
	require 'parametros.php';
	
	class Conexion {
	
		public function conectar() {
			try{
				return new \PDO("mysql:host=" . HOST . "; dbname=" . DB, USER, PASS);
			} catch(PDOException $e) {
				echo "ERROR: " . $e->getMessage();
			}
		}
	}


