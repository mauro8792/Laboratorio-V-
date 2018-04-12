<?php namespace Modelo; 
	
	class Pedido
	{	
		private $idPedido;
		private $idCliente;
		private $idSucursal;
		private $fechaPedido;
		private $envio;
		private $domicilio;
		private $fechaEnvio;
		private $rangoHs;
		private $estado;
		private $totalPedido;
		private $lineaPedido = array();
		
		public function __construct()
		{
			
			
		}

		public function setIdPedido($idPedido){
			$this->idPedido=$idPedido;
		}
		public function getIdPedido(){
			return $this->idPedido;

		}

		public function setIdCliente($idCliente){
			$this->idCliente=$idCliente;
		}
		public function getIdCliente(){
			return $this->idCliente;

		}

		public function setIdSucursal($idSucursal){
			$this->idSucursal=$idSucursal;
		}
		public function getIdSucursal(){
			return $this->idSucursal;

		}

		public function getFechaPedido(){
			return $this->fechaPedido;
		}

		public function setFechaPedido($fechaPedido){
			$this->fechaPedido = $fechaPedido;   
		}

		public function setEnvio($envio){
			$this->envio=$envio;
		}
		public function getEnvio(){
			return $this->envio;
		}

		public function setDomicilio($domicilio){
			$this->domicilio = $domicilio;
		}
		public function getDomicilio(){
			return $this->domicilio;
		}

		public function setFechaEnvio($fechaEnvio){
			$this->fechaEnvio = $fechaEnvio;
		}
		public function getFechaEnvio(){
			return $this->fechaEnvio;

		}

		public function setRangoHs($rangoHs){
			$this->rangoHs=$rangoHs;
		}
		public function getRangoHs(){
			return $this->rangoHs;

		}
	
		
		public function getEstado(){
			return $this->estado;
		}

		public function setEstado($estado){
			$this->estado = $estado;   
		}

		public function getTotalPedido(){
			return $this->totalPedido;
		}

		public function setTotalPedido($totalPedido){
			$this->totalPedido = $totalPedido;   
		}
		

		public function listar(){
			return $this;
		}

		public function agregarLineaPedido($lnPedido){
			
			array_push($this->lineaPedido, $lnPedido);	
		
			
		}

		public function devolverLineaPedido(){
			return $this->lineaPedido;
		}

		public function setLineaPedido($linea){
			if(!is_null($linea)){
				$this->lineaPedido = $linea;
			}
		}

	}







 ?>