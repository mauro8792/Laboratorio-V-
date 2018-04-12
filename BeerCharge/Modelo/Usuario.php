<?php namespace Modelo;

use Modelo\Cuenta as Cuenta;


class Usuario 
{
	private $nombre;
	private $apellido;
	private $direccion;
	private $localidad;
	private $provincia;
	private $telefono;
	private $cuenta;


	
	public function __construct($nombre='',$apellido='',$direccion='',$localidad='',$provincia='',$telefono='',$email='')
	{
		$this->setNombre($nombre);
		$this->setApellido($apellido);
		$this->setDireccion($direccion);
		$this->setLocalidad($localidad);
		$this->setProvincia($provincia);
		$this->setTelefono($telefono);
		$this->setEmail($email);
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

	public function getLocalidad()
	{
		return $this->localidad;
	}

	public function setLocalidad($localidad)
	{
		$this->localidad = $localidad;
	}

	public function getProvincia()
	{
		return $this->provincia;
	}

	public function setProvincia($provincia)
	{
		$this->provincia= $provincia;
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

	public function agregarCuenta(Cuenta $cuenta){
			$this->cuenta = $cuenta;
		}
}