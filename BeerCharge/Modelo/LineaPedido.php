<?php namespace Modelo; 
	
	class LineaPedido
	{	
		private $idLineaPedido;
		private $idPedido;
		private $cerveza = array();
		private $envase = array();
		private $cantidad;
		private $precioLinea;
		private $precioXenvase;

		
		public function __construct($cantidad='',$precioLinea='')
		{
			$this->setCantidad($cantidad);
			$this->setPrecioLinea($precioLinea);
		}

		public function getPrecioXenvase(){
			return $this->precioXenvase;
		}

		public function setPrecioXenvase($precioXenvase){
			$this->precioXenvase = $precioXenvase;   
		}
		public function getIdLineaPedido(){
			return $this->idLineaPedido;
		}

		public function setIdLineaPedido($idLineaPedido){
			$this->idLineaPedido = $idLineaPedido;   
		}

		public function getCantidad(){
			return $this->cantidad;
		}

		public function setCantidad($cantidad){
			$this->cantidad = $cantidad;   
		}

		public function getPrecioLinea(){
			return $this->precioLinea;
		}

		public function setPrecioLinea($precioLinea){
			$this->precioLinea = $precioLinea;   
		}

		public function listar(){
			return $this;
		}

		public function agregarCerveza($cerveza){
			
			array_push($this->cerveza, $cerveza);	
		}

		public function devolverCerveza(){
			return $this->cerveza;
		}

		public function agregarEnvase($envase){
			
			array_push($this->envase, $envase);	
		}

		public function devolverEnvase(){
			return $this->envase;
		}



}