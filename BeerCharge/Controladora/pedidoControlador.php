<?php namespace Controladora;

	use DAO\CervezaDAO as CervezaDAO;
	use DAO\EnvaseDAO as EnvaseDAO;
	use DAO\PedidoDAO as PedidoDAO;
	use DAO\LineaPedidoDAO as LineaPedidoDAO;
	use DAO\SucursalDAO as SucursalDAO;
	use DAO\CuentaDAO as CuentaDAO;
	use DAO\UsuarioDAO as UsuarioDAO;

	use Modelo\Cerveza as Cerveza;
	use Modelo\Envase as Envase;
	use Modelo\Pedido as Pedido;
	use Modelo\LineaPedido as LineaPedido;
	use Modelo\Sucursal as Sucursal;
	use Modelo\Usuario as Usuario;
	
	class pedidoControlador
	{
		protected $cerveza;
		protected $envase;
		protected $pedido;
		protected $lineaPedido;
		protected $sucursales;
		protected $cuenta;


		public function __construct()
		{
			$this->cerveza 		= CervezaDAO::getInstance();
			$this->envase  		= EnvaseDAO::getInstance();
			$this->pedido  		= PedidoDAO::getInstance();
			$this->sucursales   = SucursalDAO::getInstance();
			$this->usuario   	= usuarioDAO::getInstance();
			$this->cuenta 		= CuentaDAO::getInstance();	
		}



		public function elegirCerveza(){
			$cervezas=$this->cerveza->listarParaPed();


			require_once ROOT . "Vistas/template.php";
			require_once ROOT . "Vistas/elegirCerveza.php";
		}

		public function elegirEnvase($idCerveza){
			$message = null;
			if(isset($_SESSION['user'])){
				$cerv = $this->cerveza->buscar($idCerveza);
				$envasesPedido=$this->cerveza->buscarEnvases($idCerveza);
				$envaseCerv=array();
				$envases= $this->envase->listar();
				for ($i=0; $i < count($envasesPedido); $i++) { 
					foreach ($envases as $j) {
						if($j['idEnvase']==$envasesPedido[$i]['fk_idEnvase']){
							array_push($envaseCerv, $j);
						}
					}
				}

			require_once ROOT . "Vistas/template.php";
			require_once ROOT . "Vistas/elegirEnvase.php";
			}else{
				$message = "Para hacer un pedido debe estar Logueado!";
				$cervezas=$this->cerveza->listarParaPed();
			
				require_once ROOT . "Vistas/template.php";
				require_once ROOT . "Vistas/elegirCerveza.php";
			}
			
			
		}


		public function agregarAlCarrito($idEnvase,$cantidad,$idCerveza)
		{
			//$cliente = $this->Usuario->buscar($_SESSION['usuario']);
			//session_unset($_SESSION['pedido']);
			
			$totalPedido = 0;

			if(!isset($_SESSION['pedido'])){
				$pedido = new Pedido();
				$cerv = $this->cerveza->buscar($idCerveza);   //array de cervezas
				$env = $this->envase->buscar($idEnvase);	  //array de envases
				$precioxenvase=($cerv['precioLitro'])*(1-$env['coeficiente']);
				$precioLn = (($cerv['precioLitro'] * $env['litros'])*$cantidad)*(1-$env['coeficiente']); // falta Coeficiente() 
				
				$idLinea = $this->buscarUltimoIdLinea();
				$idLinea++; 
				$lnPedido = new LineaPedido($cantidad,$precioLn);
				$lnPedido->setPrecioXenvase($precioxenvase);
				$lnPedido->setIdLineaPedido($idLinea);
				$lnPedido->agregarCerveza($cerv);
				$lnPedido->agregarEnvase($env);
				$pedido->setTotalPedido($totalPedido);
				$pedido->agregarLineaPedido($lnPedido);

				$_SESSION['pedido'] = $pedido->listar();
			}else{

				$pedido = $_SESSION['pedido'];
				$cerv = $this->cerveza->buscar($idCerveza);   //array de cervezas
				$env = $this->envase->buscar($idEnvase);	  //array de envases
				
				$precioxenvase=($cerv['precioLitro'] )*(1-$env['coeficiente']);
				$precioLn = (($cerv['precioLitro'] * $env['litros'])*$cantidad)*(1-$env['coeficiente']);
				 
				$idLinea= $this->buscarUltimoIdLinea();
				$idLinea++; 
				$lnPedido = new LineaPedido($cantidad,$precioLn);
				$lnPedido->setIdLineaPedido($idLinea);
				$lnPedido->setPrecioXenvase($precioxenvase);
				$lnPedido->agregarCerveza($cerv);
				$lnPedido->agregarEnvase($env);
				$pedido->setTotalPedido($totalPedido);
				$pedido->agregarLineaPedido($lnPedido);

				
				
			}

			$this->elegirCerveza();
		}

		public function verPedido(){
			
			if(isset($_SESSION['pedido'])){
					$pedido = $_SESSION['pedido'];
					$lnPedido = $pedido->devolverLineaPedido();
			}
			require_once ROOT . "Vistas/template.php";
			require_once ROOT . 'Vistas/verPedido.php';
		}
		public function buscarUltimoIdLinea(){
			$id=0;
			if(isset($_SESSION['pedido'])){
					$pedido = $_SESSION['pedido'];
					$lnPedido = $pedido->devolverLineaPedido();
			
					foreach ($lnPedido as $linea) 
				    {
				    	$id=$linea->getIdLineaPedido();
				    }
				   
				    return $id;
		    }
		}
		public function eliminarDePedido($LineaPedido){
			if(isset($_SESSION['pedido'])){
					$pedido = $_SESSION['pedido'];
					$lnPedido = $pedido->devolverLineaPedido();
			
					foreach ($lnPedido as $key => $linea) 
				    {
				    	if($linea->getIdLineaPedido() == $LineaPedido)
				    {
				    	//echo "string" . $linea->getIdLineaPedido();
						unset($lnPedido[$key]);
						//$lnPedido->pisar($linea[$key]);
						$pedido->setLineaPedido($lnPedido);
				    }
				    }
				   

					$_SESSION['pedido'] = $pedido;
		    }
		    $this->verPedido();
		}

		public function elegirSucursal(){
			$sucursales=$this->sucursales->listar();
			
			require_once ROOT . "Vistas/template.php";
			require_once ROOT . "Vistas/elegirSucursal.php";
		}
		public function retiroPedido($idSucursal){   //si retira, cargar sucursal - si es envio cargar domicilio, fecha, rango horario.
			if(isset($_SESSION['pedido'])){
				$sucursal=$this->sucursales->buscar($idSucursal);
				
				// usuario
				$usuario= $_SESSION['user'];
				$cabecera=$this->cuenta->buscarCuenta($usuario); //buscarUsuario en usuarioDAO
				//pedido
				$pedido= $_SESSION['pedido'];

				$pedido->setIdCliente($cabecera[0]['idUsuario']);
				$pedido->setIdSucursal($sucursal['idSucursal']);
				$fecha = date("d/m/Y");;
				$pedido->setFechaPedido($fecha);
				$envio = 'No';
				$pedido->setEnvio($envio);
				$domicilio=null;
				$pedido->setDomicilio($domicilio);
				$rango = null;
				$pedido->setRangoHs($rango);
				$estado = 'Solicitado';
				$pedido->setEstado($estado);

				$_SESSION['pedido'] = $pedido;

				$lnPedido =$pedido->devolverLineaPedido();
				require_once ROOT . "Vistas/template.php";
				require_once ROOT . "Vistas/finPedido.php";
			}else{
				$this->elegirCerveza();
			}
		}

		public function elegirEnvio(){
	
			$usuario= $_SESSION['user'];
			$cliente = $this->cuenta->buscarCuenta($usuario);

			$sucursales=$this->sucursales->listar();
			
			require_once ROOT . "Vistas/template.php";
			require_once ROOT . "Vistas/elegirEnvio.php";
		}

		public function envioPedido($domicilio,$localidad,$provincia,$fechaEnvio,$rangoHs){
			$usuario= $_SESSION['user'];
			$cabecera=$this->cuenta->buscarCuenta($usuario); //buscarUsuario en usuarioDAO
				

			$pedido= $_SESSION['pedido'];

			$pedido->setIdCliente($cabecera[0]['idUsuario']);
			$fecha = date("d/m/Y");
			$pedido->setFechaPedido($fecha);


			$fechaEnv2=date("d/m/Y",strtotime($fechaEnvio));

			$pedido->setFechaEnvio($fechaEnv2);
			$envio = 'Si';
			$pedido->setEnvio($envio);

			$direccionEnvio = $domicilio.','.$localidad.','.$provincia;
			$pedido->setDomicilio($direccionEnvio);

			//calcula la menor distancia entre el domicilio y las sucursales
			$sucursales=$this->sucursales->listar();
			$distancia= 100000.0000000000000;
			foreach ($sucursales as $i) {
				$addressTo = $direccionEnvio;
				$addressFrom = $i['direccion'].','.$i['localidad'].','.$i['provincia'];

				$distance = $this->getDistance($addressFrom,$addressTo, "K");
				if($distance < $distancia ){
					$distancia = $distance;
					$idSuc = $i['idSucursal'];
				}

				//echo $i['idSucursal'].' - '. $distance;
				//echo '<br>';				
			}
			//

			$pedido->setIdSucursal($idSuc);
			$rango = $rangoHs;
			$pedido->setRangoHs($rango);
			$estado = 'Solicitado';
			$pedido->setEstado($estado);

			$_SESSION['pedido'] = $pedido;

			$envio = $pedido->getEnvio();
			$domicilio = $pedido->getDomicilio();
			$dom = explode(",", $domicilio);

			$dir = array_shift($dom);
			$loc = array_shift($dom);
			$prov = array_shift($dom);

			$lnPedido = $pedido->devolverLineaPedido();
			$sucursal=$this->sucursales->buscar($idSuc);
			require_once ROOT . "Vistas/template.php";
			require_once ROOT . "Vistas/finPedido.php";

		}

		public function confirmarPedido(){
			If(isset($_SESSION['pedido'])){
				$pedido = $_SESSION['pedido'];

				$this->pedido->insertar($pedido);
				$ped = $this->pedido->buscarUltimo();
				$lnPedido =$pedido->devolverLineaPedido();
				$id=1;
				foreach ($lnPedido as $lineas) {
					$lineas->setIdLineaPedido($id);
					$linea = $lineas->listar();
					$this->pedido->insertarLineaPedido($linea,$ped['idPedido']);
					$id++;
				}
				
				if(isset($_SESSION['pedido'])){
					unset($_SESSION['pedido']);
					$message = 'Su pedido ha sido enviado!';
					echo "<script type='text/javascript'>alert('$message');</script>";
				}
					
			}
			
			$this->elegirCerveza();			
		}

		public function listarPedidos(){
			$pedidos = $this->pedido->listar();
			$sucursales= $this->sucursales->listar();
			$clientes = $this->usuario->listar();
			//var_dump($sucursales);
			require_once ROOT . "Vistas/template.php";
			require_once ROOT . "Vistas/listadoPedidos.php"; 
		}

		public function listarPedidosFiltro($fechaPed,$clienteNom,$idSucursal){

			$sucursales= $this->sucursales->listar();
			$clientes = $this->usuario->listar();

			$fecha='';
			if(!empty($fechaPed)){
				$fecha=date("d/m/Y",strtotime($fechaPed));;
			}

			$idCliente=0;
			if(!empty($clienteNom)){
				$cli = $this->usuario->buscarxNombre($clienteNom);
				$idCliente = $cli['idUsuario'];
			}

			if(!empty($fecha) && !empty($idCliente) && $idSucursal<>'')  //los tres llenos*
			{
				$pedidos = $this->pedido->listarFiltros($fecha,$clienteNom,$idSucursal);
			}

			if(empty($fecha) && empty($idCliente) && $idSucursal=='')  //los tres vacios*
			{
				$pedidos = $this->pedido->listar();
			}
			else
			{
				if(!empty($fecha) && !empty($idCliente) && $idSucursal=='') //fecha y cliente*
				{
					$pedidos = $this->pedido->listarFiltros1($fecha,$clienteNom);
				} 
				if(!empty($fecha) && empty($idCliente) && $idSucursal<>'') //fecha y sucursal*
				{
					$pedidos = $this->pedido->listarFiltros2($fecha,$idSucursal);
				}
				if(empty($fecha) && !empty($idCliente) && $idSucursal<>'') //idCliente y sucursal*
				{
					$pedidos = $this->pedido->listarFiltros3($clienteNom,$idSucursal);
				}
				if(!empty($fecha) && empty($idCliente) && $idSucursal=='')	//fecha*
				{
					$pedidos = $this->pedido->listarxFecha($fecha);
				}
				if(empty($fecha) && !empty($idCliente) && $idSucursal=='') //idCliente*
				{
					$pedidos = $this->pedido->listarPedidosCli($clienteNom);
				}
				if(empty($fecha) && empty($idCliente) && $idSucursal<>'') //sucursal
				{
					$pedidos = $this->pedido->listarxSucursal($idSucursal);	
				}
			}


			require_once ROOT . "Vistas/template.php";
			require_once ROOT . "Vistas/listadoPedidos.php";
		}

		public function listarLitrosPedidos(){
	   	 $cervezas = $this->cerveza->listar();
	   	 require_once ROOT . "Vistas/template.php";
	   	 require_once ROOT . "Vistas/consultaLitrosPed.php"; 
	   }

	   public function consultaLitros($fechaDesde,$fechaHasta){

	   		$fechaInic='';
			if(!empty($fechaDesde)){
				$fechaInic=date("d/m/Y",strtotime($fechaDesde));;
			}

			$fechaFin='';
			if(!empty($fechaHasta)){
				$fechaFin=date("d/m/Y",strtotime($fechaHasta));;
			}
			
	   		$litrosPedidos = $this->pedido->listarLitrosPed($fechaInic,$fechaFin);
	   		//var_dump($litrosPedidos);
	   		$cervezas = $this->cerveza->listar();
	   	 	require_once ROOT . "Vistas/template.php";
	   	 	require_once ROOT . "Vistas/consultaLitrosPed.php";	
	   }

		public function pedidosCliente(){
			$email = $_SESSION['user'];
			$cliente = $this->usuario->buscar($email);
			$pedidos = $this->pedido->listarRealizadoCli($cliente['idUsuario']);
			//var_dump($pedidos);
			require_once ROOT . "Vistas/template.php";
			require_once ROOT . "Vistas/pedidosCliente.php"; 
		}

		public function detallePedido($idPedido){
			$pedido = $this->pedido->listarPedido($idPedido);
			require_once ROOT . "Vistas/template.php";
			require_once ROOT . "Vistas/detallePedido.php";  
		}

		public function detallePedidoCli($idPedido){
			$pedido = $this->pedido->listarPedido($idPedido);
			$cervezas = $this->cerveza->listar();
			$envases = $this->envase->listar();
			require_once ROOT . "Vistas/template.php";
			require_once ROOT . "Vistas/detallePedidoCli.php";  
		}

		public function detalleCliente($idCliente){
			$cliente = $this->usuario->buscarxId($idCliente);
			require_once ROOT . "Vistas/template.php";
			require_once ROOT . "Vistas/detalleCliente.php"; 
		}

		public function detalleSucursal($idSucursal){
			$sucursal = $this->sucursales->buscarxId($idSucursal);
			require_once ROOT . "Vistas/template.php";
			require_once ROOT . "Vistas/detalleSucursal.php"; 
		}

		public function detalleSucursalCli($idSucursal){
			$sucursal = $this->sucursales->buscarxId($idSucursal);
			require_once ROOT . "Vistas/template.php";
			require_once ROOT . "Vistas/detalleSucursalCli.php"; 
		}

		public function estadoPedido($idPedido,$estado){
			
			require_once ROOT . "Vistas/template.php";
			require_once ROOT . "Vistas/estadoPedido.php"; 	
		}

		public function modificarEstado($estado,$idPedido){
			$this->pedido->cambiaEstado($idPedido,$estado);
			$this->listarPedidos();
		}

		private function getDistance($addressFrom, $addressTo, $unit){
			

		    //Change address format
		    $formattedAddrFrom = str_replace(' ','+',$addressFrom);
		    $formattedAddrTo = str_replace(' ','+',$addressTo);
		    
		    //Send request and receive json data
		    $geocodeFrom = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false');
		    $outputFrom = json_decode($geocodeFrom);
		    $geocodeTo = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false');
		    $outputTo = json_decode($geocodeTo);
		    
		    
		    //Get latitude and longitude from geo data
		    $latitudeFrom = $outputFrom->results[0]->geometry->location->lat;
		    $longitudeFrom = $outputFrom->results[0]->geometry->location->lng;
		    $latitudeTo = $outputTo->results[0]->geometry->location->lat;
		    $longitudeTo = $outputTo->results[0]->geometry->location->lng;



		    
		    //Calculate distance from latitude and longitude
		    $theta = $longitudeFrom - $longitudeTo;
		    $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
		    $dist = acos($dist);
		    $dist = rad2deg($dist);
		    $miles = $dist * 60 * 1.1515;
		    $unit = strtoupper($unit);
		    if ($unit == "K") {
		        return ($miles * 1.609344).' km';
		    } else if ($unit == "N") {
		        return ($miles * 0.8684).' nm';
		    } else {
		        return $miles.' mi';
		    }
			
		}

}

?>