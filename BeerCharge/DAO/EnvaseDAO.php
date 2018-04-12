<?php namespace DAO;
	
	Use Modelo\Envase as Envase;
	Use DAO\Conexion as Conexion;
	/**
	* 
	*/
	class EnvaseDAO implements IDAO
	{
		
		private function __construct()
		{
			
		}
		protected $table= 'envases';
		protected static $instance;

		public static function getInstance(){
			if (!isset(self::$instance)) {
				self::$instance = new self;
			}
			return self::$instance;
		}
        
        public function insertar($envase){
        	try{
        		$descripcion= $envase->getDescripcion();
        		$litros= $envase->getLitros();
        		$coeficiente=$envase->getCoeficiente();
        		$foto = $envase->getFoto();
        		$con= new Conexion();
        		$conexion =$con->conectar();

        		$sql= "insert into envases values(0, :descripcion, :litros, :coeficiente, :foto,1)";
        		$statement= $conexion->prepare($sql);
        		$statement->bindParam(":descripcion", $descripcion);
			    $statement->bindParam(":litros", $litros);
			    $statement->bindParam(":coeficiente",$coeficiente);
			    $statement->bindParam(":foto", $foto);
			    $statement->execute();

			    $message = "Guardado exitosamente!";
			    echo "<script type='text/javascript'>alert('$message');</script>";
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
				$sql = "select * from envases where estado <> 0";
				$statement = $conexion->prepare($sql);
				$statement->execute();
				$resultado = $statement->fetchAll();
			} catch (PDOException $e) {
				echo "ERROR: " . $e->getMessage();
			}
			$con = null;
			return $resultado;		
	   }
	   public function listarTodos() {
			$fila = null;
			try {
				$con = new Conexion();
				$conexion = $con->conectar();
				$sql = "select * from envases";
				$statement = $conexion->prepare($sql);
				$statement->execute();
				$resultado = $statement->fetchAll();
			} catch (PDOException $e) {
				echo "ERROR: " . $e->getMessage();
			}
			$con = null;
			return $resultado;		
	   }
	   	public function eliminar($idEnvase) {
		try {
			$estado = 0;
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "update envases set estado = :estado where idEnvase = :idEnvase";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':estado',$estado);
			$statement->bindParam(':idEnvase', $idEnvase);
			$statement->execute();

			$message = "Guardado exitosamente!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
	}

		public function modificar($envase,$idEnvase) {
		try {
			
			$estado = 1;
			$descripcion = $envase->getDescripcion();
			$litros = $envase->getLitros();
			$coeficiente = $envase->getCoeficiente();
			$foto = $envase->getFoto();

			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "update envases set descripcion = :descripcion, litros = :litros, coeficiente = :coeficiente, foto = :foto, estado = :estado where idEnvase = :idEnvase";
			$statement = $conexion->prepare($sql);
			$statement->bindParam(':idEnvase', $idEnvase);
			$statement->bindParam(':descripcion', $descripcion);
			$statement->bindParam(':litros', $litros);
			$statement->bindParam(':coeficiente',$coeficiente);
			$statement->bindParam(':foto',$foto);
			$statement->bindParam(':estado',$estado);
			$statement->execute();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
	}
		
		public function buscar($idEnvase){
		$resultado = null;
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "select * from envases where idEnvase = :idEnvase";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':idEnvase', $idEnvase);
			$statement->execute();
			$resultado = $statement->fetch();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;

	}
	public function eliminarLogicoEnv($idEnvase,$estado) {
		try {
	
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "update envases set estado = :estado where idEnvase = :idEnvase";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':idEnvase', $idEnvase);
			$statement->bindParam(':estado',$estado);
			$statement->execute();

			$message = "Eliminado exitosamente!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;

	}
	
/*
	public function buscarUltimo(){
		$resultado = null;
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "select * from envases order by idEnvase desc limit 1";

			$statement = $conexion->prepare($sql);
			$statement->execute();
			$resultado = $statement->fetch();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;
		
	}
*/


	}			

















 ?>