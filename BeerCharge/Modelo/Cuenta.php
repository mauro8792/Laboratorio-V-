<?php namespace Modelo;

class Cuenta 
{
	protected $email;
	protected $password;
	protected $rol;

	public function __construct($email='',$password='',$rol='')
	{
		$this->setEmail($email);
		$this->setPassword($password);
		$this->setRol($rol);
	}

	/*public function __construct($email, $password , $fechaAlta)
	{
		$this->email = $email;
		$this->password = $password;
		$this->fechaAlta = $fechaAlta;
	}*/

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function getRol()
	{
		return $this->rol;
	}

	public function setRol($rol)
	{
		$this->rol = $rol;
	}

}