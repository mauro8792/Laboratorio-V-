<?php namespace DAO;

Use Modelo\Cerveza as Cerveza;
use DAO\Conexion as Conexion;


class CervezaDAO implements IDAO
{	

	private function __construct(){

	}

	protected static $instance;

	public static function getInstance()
    {
        if (!isset(self::$instance)) {
            //$miclase = __CLASS__;
            self::$instance = new self;//$miclase;
        } 
        return self::$instance;
    }


	public function insertar($cerveza) {
		try {
			$nombre= $cerveza->getNombre();
			$descripcion = $cerveza->getDescripcion();
			$precioLitro = $cerveza->getPrecioLitro();
			$foto = $cerveza->getFoto();

			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "insert into cervezas (`idCerveza`, `nombre`, `descripcion`, `precioLitro`, `foto`, `estado`) values (0,:nombre,:descripcion, :precioLitro, :foto,'1')";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(":nombre", $nombre);
			$statement->bindParam(":descripcion", $descripcion);
			$statement->bindParam(":precioLitro", $precioLitro);
			$statement->bindParam(":foto", $foto);
			$statement->execute();

			

	

		} catch(Exception $e) {
			//$error='no conecto por : '.$e->getMessage;
				//echo "ERROR: " . $e->getMessage();
			//throw new Exception("Se rompio todo", 1);
			throw new Exception("se rompio todo");
					
		}catch(PDOException $e){
			//$error='no conecto por pli : '.$e->getMessage;
			throw new Exception("Se rompio todo ");
		}
		$con = null; 

	}

	public function eliminar($idCerveza) {
		try {
	
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "update cervezas set estado = :estado where idCerveza = :idCerveza";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':idCerveza', $idCerveza);
			$statement->bindParam(':estado',$estado);
			$statement->execute();

			$message = "Eliminado exitosamente!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;

	}

	public function eliminarLogico($idCerveza,$estado) {
		try {
	
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "update cervezas set estado = :estado where idCerveza = :idCerveza";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':idCerveza', $idCerveza);
			$statement->bindParam(':estado',$estado);
			$statement->execute();

			$message = "Eliminado exitosamente!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;

	}


	public function modificar($cerveza,$idCerveza) {
		try {
			$estado = 1;
			$nombre = $cerveza->getNombre();
			$descripcion = $cerveza->getDescripcion();
			$precioLitro = $cerveza->getPrecioLitro();
			$foto = $cerveza->getFoto();
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "update cervezas  set nombre = :nombre, descripcion = :descripcion, precioLitro = :precioLitro, foto = :foto, estado = :estado where idCerveza = :idCerveza";
			$statement = $conexion->prepare($sql);
			$statement->bindParam(':idCerveza', $idCerveza);
			$statement->bindParam(':nombre',$nombre);
			$statement->bindParam(':descripcion', $descripcion);
			$statement->bindParam(':precioLitro', $precioLitro);
			$statement->bindParam(':foto',$foto);
			$statement->bindParam(':estado',$estado);
			$statement->execute();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
	}

	public function listar() {
		$fila = null;
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "select * from cervezas";
			$statement = $conexion->prepare($sql);
			$statement->execute();
			$resultado = $statement->fetchAll();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;		
	}

	public function cervEnv($idCerveza){
								  
		$fila = null;
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "select distinct *
					from envases e
				    inner join envasesxcerveza en
				    on  en.fk_idCerveza= :idCerveza and en.fk_idEnvase=e.idEnvase";
				    
			$statement = $conexion->prepare($sql);
			$statement->bindParam(':idCerveza', $idCerveza);
			$statement->execute();
			$resultado = $statement->fetchAll();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;	

	}
	public function eliminarEnvCerv($idCerveza,$idEnvase){
		try{
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "delete from envasesxcerveza  WHERE fk_idEnvase = :idEnvase and fk_idCerveza= :idCerveza";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':idCerveza', $idCerveza);
			$statement->bindParam(':idEnvase', $idEnvase);
			$statement->execute();

			$message = "Eliminado exitosamente!";
				echo "<script type='text/javascript'>alert('$message');</script>";
			} catch (PDOException $e) {
				echo "ERROR: " . $e->getMessage();
			}
			$con = null;
	}

	public function listarParaPed() {
		$fila = null;
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "select * from cervezas where estado <> 0";
			$statement = $conexion->prepare($sql);
			$statement->execute();
			$resultado = $statement->fetchAll();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;		
	}


	public function buscar($idcerveza){
		$resultado = null;
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "select * from cervezas where idCerveza = :idCerveza";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':idCerveza', $idcerveza);
			$statement->execute();
			$resultado = $statement->fetch();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;
	}

	public function buscarEnvases($idCerveza){
		$resultado = null;
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			 //"select fk_idCerveza from envasesxcerveza where idCerveza = :idCerveza";
			 $sql ="select fk_idEnvase FROM envasesxcerveza where fk_idCerveza = :idCerveza ";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':idCerveza', $idCerveza);
			$statement->execute();
			$resultado = $statement->fetchAll();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;

	}

	public function buscarxNombre($nombreCerv){
		$resultado = null;
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "select * from cervezas where nombre = :nombre";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':nombre', $nombreCerv);
			$statement->execute();
			$resultado = $statement->fetch();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;
	}

	public function buscarUltimo(){
		$resultado = null;
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "select * from cervezas order by idCerveza desc limit 1";

			$statement = $conexion->prepare($sql);
			$statement->execute();
			$resultado = $statement->fetch();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;
	}

	public function insertaEnvase($idEnvase,$idCerveza){
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "insert into envasesxcerveza(fk_idEnvase,fk_idCerveza) values (:idEnvase,:idCerveza)";


			$statement = $conexion->prepare($sql);
			$statement->bindParam(":idEnvase", $idEnvase);
			$statement->bindParam(":idCerveza", $idCerveza);
			$statement->execute();

		} catch(Exception $e) {
			//$error='no conecto por : '.$e->getMessage;
				//echo "ERROR: " . $e->getMessage();
			//throw new Exception("Se rompio todo", 1);
			throw new Exception("se rompio todo");
					
		}catch(PDOException $e){
			//$error='no conecto por pli : '.$e->getMessage;
			throw new Exception("Se rompio todo ");
		}
		$con = null; 


	}
	public function verificarEnvaseCerveza($idEnvase,$idCerveza){
		$resultado = null;
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "select * from envasesxcerveza where fk_idEnvase= :idEnvase and fk_idCerveza= :idCerveza";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':idEnvase', $idEnvase);
			$statement->bindParam(':idCerveza', $idCerveza);
			$statement->execute();
			$resultado = $statement->fetch();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;
	}
}
?>











