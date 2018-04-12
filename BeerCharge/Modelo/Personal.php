<?php namespace Modelo;

Use \Modelo\Cuenta as Cuenta;


class Personal
{
	private $legajo;
	private $nombre;
	private $apellido;
	private $dni;
	private $direccion;
	private $telefono;
	private $email;
	public $cuenta;

	
	 function __construct($nombre='',$apellido='', $dni='',$direccion='',$telefono='',$email)
	{
		$this->setNombre($nombre);
		$this->setApellido($apellido);
		$this->setDni($dni);
		$this->setDireccion($direccion);
		$this->setTelefono($telefono);
		$this->setEmail($email);
	}

	public function getLegajo()
	{
		return $this->legajo;
	}

	public function setLegajo($legajo)
	{
		$this->legajo = $legajo;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

	public function getApellido()
	{
		return $this->apellido;
	}

	public function setApellido($apellido)
	{
		$this->apellido = $apellido;
	}

	
	public function getDireccion()
	{
		return $this->direccion;
	}

	public function setDireccion($direccion)
	{
		$this->direccion= $direccion;
	}

	public function getTelefono()
	{
		return $this->telefono;
	}

	public function setTelefono($telefono)
	{
		$this->telefono= $telefono;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getDni()
	{
		return $this->dni;
	}

	public function setDni($dni)
	{
		$this->dni = $dni;
	}

	public function getCuenta()
	{
		return $this->$cuenta;
	}

	public function setCuenta(Cuenta $cuenta)
	{
		$this->cuenta = $cuenta;
	}

}