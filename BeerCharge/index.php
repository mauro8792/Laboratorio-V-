<?php
	
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
		
	require_once "Config/Autoload.php";
	require_once "Config/Config.php";
	
	
	use Config\Autoload as Autoload;
	use Config\Request as Request;
	use Config\Router as Router;
	
	//$a = new Config\Autoload();
	//$a->Iniciar();
	//$p = new Config\Request();
	Autoload::Start();
	
	session_start();
	Router::direccionar(Request::getInstance());

?>
