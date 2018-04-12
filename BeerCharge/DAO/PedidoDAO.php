<?php namespace DAO;
	
	Use Modelo\Pedido as Pedido;
	Use DAO\Conexion as Conexion;
	/**
	* 
	*/
	class PedidoDAO implements IDAO
	{
		
		private function __construct()
		{
			
		}
		protected $table= 'pedidos';
		protected static $instance;

		public static function getInstance(){
			if (!isset(self::$instance)) {
				self::$instance = new self;
			}
			return self::$instance;
		}
        
        public function insertar($pedido){
        	try{

        	
        		$idCliente= $pedido->getIdCliente();
        		$idSucursal= $pedido->getIdSucursal();
        		$fecha = $pedido->getFechaPedido();
        		$envio = $pedido->getEnvio();
        		$domicilio = $pedido->getDomicilio();
        		$fechaEnvio = $pedido->getFechaEnvio();
        		$rango = $pedido->getRangoHs();
        		$estado = $pedido->getEstado();




        		$con= new Conexion();
        		$conexion =$con->conectar();

        		$sql= "insert into `pedido` (`idPedido`, `idCliente`, `idSucursal`, `fecha`, `envio`, `domicilio`, `fechaEnvio`, `rangoHs`, `estado`) VALUES (NULL, :idCliente, :idSucursal, :fecha, :envio, :domicilio, :fechaEnvio, :rango, :estado);";
        		$statement= $conexion->prepare($sql);
        		$statement->bindParam(":idCliente", $idCliente);
        		$statement->bindParam(":idSucursal", $idSucursal);
        		$statement->bindParam(":fecha",$fecha);
			    $statement->bindParam(":envio",$envio);
			    $statement->bindParam(":domicilio",$domicilio);
			    $statement->bindParam(":fechaEnvio",$fechaEnvio);
			    $statement->bindParam(":rango",$rango);
			    $statement->bindParam(":estado",$estado);
			    $statement->execute();

        	}catch(PDOException $e) {
				echo "ERROR: " . $e->getMessage();
				
		    }
		    $con = null; 
        }

        public function insertarLineaPedido($linea,$idPedido){
        	try{
        		
        		$idLineaPedido = $linea->getIdLineaPedido();
				$cerveza = $linea->devolverCerveza();
				$envase = $linea->devolverEnvase();
				$precioxenvase=$linea->getPrecioXenvase();
				$idCerveza = $cerveza[0]["idCerveza"];
				$idEnvase = $envase[0]['idEnvase'];
				$cantidad = $linea->getCantidad();
				$precioLn = $linea->getPrecioLinea();

        		$con= new Conexion();
        		$conexion =$con->conectar();

        		$sql= "insert into `lineapedido` (`idPedido`,`idLineaPedido`, `idCerveza`, `idEnvase`, `precioxEnv`, `cantidad`, `precioLinea`) VALUES (:idPedido, :idLineaPedido, :idCerveza, :idEnvase, :precioxenvase, :cantidad, :precioLn)";
        		$statement= $conexion->prepare($sql);
        		$statement->bindParam(":idPedido", $idPedido);
        		$statement->bindParam(":idLineaPedido",$idLineaPedido);
        		$statement->bindParam(":idCerveza", $idCerveza);
			    $statement->bindParam(":idEnvase", $idEnvase);
			    $statement->bindParam(":precioxenvase",$precioxenvase);
			    $statement->bindParam(":cantidad",$cantidad);
			    $statement->bindParam(":precioLn",$precioLn);
			    $statement->execute();

        	}catch(PDOException $e) {
				echo "ERROR: " . $e->getMessage();
				
		    }
		    $con = null; 
        }

        public function listar() {
			$fila = null;
			try {
				$con = new Conexion();
				$conexion = $con->conectar();
				$sql = "select * from pedido where estado= 'Solicitado' 
					union
					select * from pedido where estado= 'En Proceso' 
					union
					select * from pedido where estado= 'Enviado' 
					union
					select * from pedido where estado= 'Finalizado'";
				$statement = $conexion->prepare($sql);
				$statement->execute();
				$resultado = $statement->fetchAll();
			} catch (PDOException $e) {
				echo "ERROR: " . $e->getMessage();
			}
			$con = null;
			return $resultado;		
	   }

	   public function listarPedido($idPedido){
	   		$fila = null;
			try {
				$con = new Conexion();
				$conexion = $con->conectar();
				$sql = "select * from lineapedido where idPedido = :idPedido";
				$statement = $conexion->prepare($sql);
				$statement->bindParam(":idPedido", $idPedido);
				$statement->execute();
				$resultado = $statement->fetchAll();
			} catch (PDOException $e) {
				echo "ERROR: " . $e->getMessage();
			}
			$con = null;
			return $resultado;	

	   }

	   public function listarFiltros($fecha,$clienteNom,$idSucursal){
	   		$fila = null;
				try {
					$con = new Conexion();
					$conexion = $con->conectar();
					$sql = "select *
							from pedido p
							inner join usuario u
							on p.idCliente = u.idUsuario 
							where (u.apellido like concat (:clienteNom,'%') or u.nombre like concat (:clienteNom,'%')) and
							 p.fecha >= :fecha  and p.idSucursal = :idSucursal order by p.fecha asc";
					$statement = $conexion->prepare($sql);
					$statement->bindParam(":fecha", $fecha);
					$statement->bindParam(":clienteNom", $clienteNom);
					$statement->bindParam(":idSucursal", $idSucursal);
					$statement->execute();
					$resultado = $statement->fetchAll();
				} catch (PDOException $e) {
					echo "ERROR: " . $e->getMessage();
				}
				$con = null;
				return $resultado;	
	   }

	   public function listarFiltros1($fecha,$clienteNom){
	   		$fila = null;
				try {
					$con = new Conexion();
					$conexion = $con->conectar();
					$sql = "select *
							from pedido p
							inner join usuario u
							on p.idCliente = u.idUsuario 
							where (u.apellido like concat (:clienteNom,'%') or u.nombre like concat (:clienteNom,'%')) and p.fecha >= :fecha order by p.fecha asc";
					$statement = $conexion->prepare($sql);
					$statement->bindParam(":fecha", $fecha);
					$statement->bindParam(":clienteNom", $clienteNom);
					$statement->execute();
					$resultado = $statement->fetchAll();
				} catch (PDOException $e) {
					echo "ERROR: " . $e->getMessage();
				}
				$con = null;
				return $resultado;	
	   }

	   public function listarFiltros2($fecha,$idSucursal){
	   		$fila = null;
				try {
					$con = new Conexion();
					$conexion = $con->conectar();
					$sql = "select * from pedido where fecha >= :fecha and idSucursal = :idSucursal order by fecha asc";
					$statement = $conexion->prepare($sql);
					$statement->bindParam(":fecha", $fecha);
					$statement->bindParam(":idSucursal", $idSucursal);
					$statement->execute();
					$resultado = $statement->fetchAll();
				} catch (PDOException $e) {
					echo "ERROR: " . $e->getMessage();
				}
				$con = null;
				return $resultado;	
	   }

	   public function listarFiltros3($clienteNom,$idSucursal){
	   		$fila = null;
				try {
					$con = new Conexion();
					$conexion = $con->conectar();
					$sql = "select *
						from pedido p
						inner join usuario u
						on p.idCliente = u.idUsuario 
						where (u.apellido like concat (:clienteNom,'%') or u.nombre like concat (:clienteNom,'%')) and p.idSucursal = :idSucursal order by p.fecha asc";
					$statement = $conexion->prepare($sql);
					$statement->bindParam(":clienteNom", $clienteNom);
					$statement->bindParam(":idSucursal", $idSucursal);
					$statement->execute();
					$resultado = $statement->fetchAll();
				} catch (PDOException $e) {
					echo "ERROR: " . $e->getMessage();
				}
				$con = null;
				return $resultado;	
	   }

	   public function listarxFecha($fecha){
	   		$fila = null;
				try {
					$con = new Conexion();
					$conexion = $con->conectar();
					$sql = "select * from pedido where fecha >= :fecha order by fecha asc";
					$statement = $conexion->prepare($sql);
					$statement->bindParam(":fecha", $fecha);
					$statement->execute();
					$resultado = $statement->fetchAll();
				} catch (PDOException $e) {
					echo "ERROR: " . $e->getMessage();
				}
				$con = null;
				return $resultado;	
	   }

	   public function listarxSucursal($idSucursal){
	   		$fila = null;
				try {
					$con = new Conexion();
					$conexion = $con->conectar();
					$sql = "select * from pedido where idSucursal = :idSucursal order by fecha asc";
					$statement = $conexion->prepare($sql);
					$statement->bindParam(":idSucursal", $idSucursal);
					$statement->execute();
					$resultado = $statement->fetchAll();
				} catch (PDOException $e) {
					echo "ERROR: " . $e->getMessage();
				}
				$con = null;
				return $resultado;	
	   }


	   public function listarPedidosCli($clienteNom){
	   		$fila = null;
			try {
				$con = new Conexion();
				$conexion = $con->conectar();

				$sql = "select *
						from pedido p
						inner join usuario u
						on p.idCliente = u.idUsuario 
						where u.apellido like concat (:clienteNom,'%') or u.nombre like concat (:clienteNom,'%')
						order by p.fecha asc";

				$statement = $conexion->prepare($sql);
				$statement->bindParam(":clienteNom", $clienteNom);
				$statement->execute();
				$resultado = $statement->fetchAll();
			} catch (PDOException $e) {
				echo "ERROR: " . $e->getMessage();
			}
			$con = null;
			return $resultado;	
	   }
	   public function listarRealizadoCli($idCliente){
	   		$fila = null;
			try {
				$con = new Conexion();
				$conexion = $con->conectar();
				$sql = "select * from pedido where idCliente = :idCliente order by idPedido desc";
				$statement = $conexion->prepare($sql);
				$statement->bindParam(":idCliente", $idCliente);
				$statement->execute();
				$resultado = $statement->fetchAll();
			} catch (PDOException $e) {
				echo "ERROR: " . $e->getMessage();
			}
			$con = null;
			return $resultado;	
	   }

	  public function listarLitrosPed($inicio,$fin){
	  	try {	
				$con = new Conexion();
				$conexion = $con->conectar();

				$sql = "select c.nombre,SUM(e.litros*lp.cantidad) as 'Total'
						from lineapedido lp
						inner join pedido p
						on lp.idPedido = p.idPedido and  p.fecha >= :inicio and  p.fecha <= :fin
						inner join cervezas c
						on lp.idCerveza = c.idCerveza
						inner join envases e
						on lp.idEnvase = e.idEnvase
						group by c.idCerveza
						having SUM(e.litros*lp.cantidad)";
						

				$statement = $conexion->prepare($sql);
				$statement->bindParam(":inicio", $inicio);
				$statement->bindParam(":fin", $fin);
				$statement->execute();
				$resultado = $statement->fetchAll();
			} catch (PDOException $e) {
				echo "ERROR: " . $e->getMessage();
			}
			$con = null;
			return $resultado;
	  }

	   public function cambiaEstado($idPedido,$estado){
		   	try {
		
				$con = new Conexion();
				$conexion = $con->conectar();
				$sql = "update pedido set estado = :estado where idPedido = :idPedido";

				$statement = $conexion->prepare($sql);
				$statement->bindParam(':idPedido', $idPedido);
				$statement->bindParam(':estado',$estado);
				$statement->execute();

			} catch (PDOException $e) {
				echo "ERROR: " . $e->getMessage();
			}
			$con = null;
	   }


	   	public function eliminar($pedido) {
		
		}

		public function modificar($pedido,$idPedido) {
		
		}
		
		public function buscar($idPedido){
		
		}
	

		public function buscarUltimo(){
			$resultado = null;
			try {
				$con = new Conexion();
				$conexion = $con->conectar();
				$sql = "select * from pedido order by idPedido desc limit 1";

				$statement = $conexion->prepare($sql);
				$statement->execute();
				$resultado = $statement->fetch();
			} catch (PDOException $e) {
				echo "ERROR: " . $e->getMessage();
			}
			$con = null;
			return $resultado;	
		}

}?>