<?php namespace DAO;

class SingletonDAO
{
	protected static $instance;

	public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $miclase = __CLASS__;
            self::$instance = new $miclase;
        } 
        return self::$instance;
    }
}




?>