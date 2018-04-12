<?php namespace Modelo; 
/**
* 
*/
class Envase
{	
	private $idEnvase;
	private $descripcion;
	private $litros;
	private $coeficiente;
	private $foto;

	function __construct($descripcion='',$litros='',$coeficiente='',$foto='')
	{
		$this->setDescripcion($descripcion);
		$this->setLitros($litros);
		$this->setCoeficiente($coeficiente);
		$this->setFoto($foto);
	}
	

	function getDescripcion(){
		return $this->descripcion;
	}
	function setDescripcion($descripcion){
		$this->descripcion=$descripcion;
	}
	function getLitros(){
		return $this->litros;
	}
	function setLitros($litros){
		$this->litros=$litros;
	}
	function getCoeficiente(){
		return $this->coeficiente;
	}
	function setCoeficiente($coeficiente){
		$this->coeficiente=$coeficiente;
	}
	function getIdEnvase(){
		return $this->idEnvase;
	}
	function setIdEnvase($idEnvase){
		$this->idEnvase=$idEnvase;
	}
	public function setFoto($foto){
		$this->foto = $foto;
	}

	public function getFoto(){
		return $this->foto;
	}
}













 ?>