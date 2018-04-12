<?php namespace Modelo;

	 class Sucursal
	 {	
	 	private $idSucursal;
	 	private $direccion;
	 	private $localidad;
	 	private $provincia;
	 	private $telefono;
	 	private $ubicacion;
	 	private $latitud;
	 	private $longitud;
	 	private $foto;
	 	
	 	function __construct($direccion='',$telefono='',$localidad='',$provincia='',$ubicacion='',$latitud='',$longitud='',$foto='')
	 	{
	 		$this->setDireccion($direccion);
	 		$this->setTelefono($telefono);
	 		$this->setLocalidad($localidad);
	 		$this->setProv($provincia);
	 		$this->setUbicacion($ubicacion);
	 		$this->setLatitud($latitud);
	 		$this->setLongitud($longitud);
	 		$this->setFoto($foto);
	 		
	 	}
	 	public function getIdSucursal(){
			return $this->idSucursal;
		}
		public function setIdSucursal($idSucursal){
			 $this->idSucursal= $idSucursal;
		}


	 	public function getDireccion(){
			return $this->direccion;
		}

		public function setDireccion($direccion){
			$this->direccion = $direccion;   
		}
		
		public function getLocalidad(){
			return $this->localidad;
		}

		public function setLocalidad($localidad){
			$this->localidad = $localidad;   
		}

		public function getTelefono(){
			return $this->telefono;
		}
		public function setTelefono($telefono){
			$this->telefono=$telefono;
		}
		
		public function getProv(){
			return $this->provincia;
		}
		public function setProv($provincia){
			$this->provincia=$provincia;
		}
		public function setFoto($foto){
		$this->foto = $foto;
		}

		public function getFoto(){
			return $this->foto;
		}

		public function setUbicacion($ubicacion){
		$this->ubicacion = $ubicacion;
		}

		public function getUbicacion(){
			return $this->ubicacion;
		}
		public function setLatitud($latitud){
		$this->latitud = $latitud;
		}

		public function getLatitud(){
			return $this->latitud;
		}
		public function setLongitud($longitud){
		$this->longitud = $longitud;
		}

		public function getLongitud(){
			return $this->longitud;
		}

	 } 







 ?>