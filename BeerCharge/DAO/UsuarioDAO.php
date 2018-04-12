<?php namespace DAO;

use Modelo\Usuario as Usuario;
use DAO\Conexion as Conexion;

class UsuarioDAO extends Conexion implements IDAO{
	
	public $con;
	protected static $instance;

	private function __construct(){

	}


	public static function getInstance()
    {
        if (!isset(self::$instance)) {
            //$miclase = __CLASS__;
            self::$instance = new self;//$miclase;
        } 
        return self::$instance;
    }

    

	public function insertar($Usuario) {
		try {

			$nombre		= $Usuario->getNombre();
			$apellido 	= $Usuario->getApellido();
			$direccion 	= $Usuario->getDireccion();
			$telefono 	= $Usuario->getTelefono();
			$email		= $Usuario->getEmail();
			
	//		$nombre		= $Usuario['nombre'];
	//		$apellido 	= $Usuario['apellido'];
	//		$direccion 	= $Usuario['direccion'];
	//		$telefono 	= $Usuario['telefono'];
	//		$email		= $usuario['email'];
			

		$con = new Conexion();
		$conexion = $con->conectar();
		$sql = "insert into usuario values(0,:nombre, :apellido, :direccion, :telefono, :email)";

		$statement = $conexion->prepare($sql);
		$statement->bindParam(":nombre", $nombre);
		$statement->bindParam(":apellido", $apellido);
		$statement->bindParam(":direccion", $direccion);
		$statement->bindParam(":telefono", $telefono);
		$statement->bindParam(":email", $email);
		$statement->execute();

		$message = "Guardado exitosamente!";
			echo "<script type='text/javascript'>alert('$message');</script>";
	

		} catch(PDOException $e) {
				echo "ERROR: " . $e->getMessage();
				
		}
		$con = null; 

	}

	public function insertarUsuario($Usuario,$idCuenta) {
		try {

			$nombre		= $Usuario->getNombre();
			$apellido 	= $Usuario->getApellido();
			$direccion 	= $Usuario->getDireccion();
			$localidad	= $Usuario->getLocalidad();
			$provincia  = $Usuario->getProvincia();
			$telefono 	= $Usuario->getTelefono();
			$email		= $Usuario->getEmail();
			

		$con = new Conexion();
		$conexion = $con->conectar();
		$sql = "insert into usuario values(0,:nombre, :apellido, :direccion, :localidad, :provincia, :telefono, :email, :idCuenta)";

		$statement = $conexion->prepare($sql);
		$statement->bindParam(":nombre", $nombre);
		$statement->bindParam(":apellido", $apellido);
		$statement->bindParam(":direccion", $direccion);
		$statement->bindParam(":localidad",$localidad);
		$statement->bindParam(":provincia",$provincia);
		$statement->bindParam(":telefono", $telefono);
		$statement->bindParam(":email", $email);
		$statement->bindParam(":idCuenta", $idCuenta);
		$statement->execute();

		$message = "Guardado exitosamente!";
			echo "<script type='text/javascript'>alert('$message');</script>";
	

		} catch(PDOException $e) {
				echo "ERROR: " . $e->getMessage();
				
		}
		$con = null; 

	}

	public function eliminar($Usuario) {
		 
	}

	public function modificar($Usuario,$id) {
		
	}

	public function listar() {
		$fila = null;
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "select * from usuario";
			$statement = $conexion->prepare($sql);
			$statement->execute();
			$resultado = $statement->fetchAll();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;		
	}


	public function buscar($email){
			$resultado = null;
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "select * from usuario where email = :email";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':email', $email);
			$statement->execute();
			$resultado = $statement->fetch();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;
	}


	public function buscarxId($idUsuario){
			$resultado = null;
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "select * from usuario where idUsuario = :idUsuario";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':idUsuario', $idUsuario);
			$statement->execute();
			$resultado = $statement->fetch();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;
	}

	public function buscarxNombre($apellido){
			$resultado = null;
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "select * from usuario where apellido like '$apellido%' or nombre like '$apellido%'";

			$statement = $conexion->prepare($sql);
			//$statement->bindParam(':apellido', $apellido);
			$statement->execute();
			$resultado = $statement->fetch();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;
	}

	public function updateDatos($datos,$idUsuario){
		try{
			$nombre=$datos->getNombre();
			$apellido=$datos->getApellido();
			$direccion=$datos->getDireccion();
			$localidad=$datos->getLocalidad();
			$provincia=$datos->getProvincia();
			$telefono=$datos->getTelefono();
			

			$con = new Conexion();
			$conexion = $con->conectar();

			$sql = "update usuario set nombre = :nombre, apellido = :apellido, direccion = :direccion, localidad = :localidad, provincia = :provincia, telefono = :telefono where idUsuario = :idUsuario";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':nombre', $nombre);
			$statement->bindParam(':apellido', $apellido);
			$statement->bindParam(':direccion', $direccion);
			$statement->bindParam(':localidad', $localidad);
			$statement->bindParam(':provincia', $provincia);
			$statement->bindParam(':telefono', $telefono);
			$statement->bindParam(':idUsuario', $idUsuario);
			
			$statement->execute();
		} catch(PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
	}


}