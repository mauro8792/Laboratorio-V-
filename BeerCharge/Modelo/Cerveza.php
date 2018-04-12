<?php namespace Modelo;

class Cerveza
{
	private $idCerveza;
	private $nombre;
	private $descripcion;
	private $precioLitro;
	private $foto;
	private $envase= array();

	function __construct($nombre='',$descripcion='', $precioLitro='', $foto='')
	{		

		$this->setNombre($nombre);
		$this->setDescripcion($descripcion);
		$this->setPrecioLitro($precioLitro);
		$this->setFoto($foto);
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getNombre(){
		return $this->nombre;
	}
	public function setIdCerveza($idCerveza){
		$this->idCerveza = $idCerveza;
	}

	public function getIdCerveza(){
		return $this->idCerveza;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setPrecioLitro($precioLitro){
		$this->precioLitro = $precioLitro;
	}

	public function getPrecioLitro(){
		return $this->precioLitro;
	}

	public function setFoto($foto){
		$this->foto = $foto;
	}

	public function getFoto(){
		return $this->foto;
	}

	public function Listar(){
		return $this->cerveza;
	}
	function agregarEnvase(Envase $envase){
			array_push($this->envase, $envase);
		}
}




?>