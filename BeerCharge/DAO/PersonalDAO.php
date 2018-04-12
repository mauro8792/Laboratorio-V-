<?php namespace DAO;

use Modelo\Personal as Personal;
use DAO\Conexion as Conexion;

class PersonalDAO extends Conexion implements IDAO{
	
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

    

	public function insertar($personal) {
	try {
		var_dump($personal);
			$nombre = $personal->getNombre();
		 	$apellido = $personal->getApellido();
		 	$dni = $personal->getDni();
		 	$direccion = $personal->getDireccion();
		 	$telefono = $personal->getTelefono();
		 	$email = $personal->getEmail();

			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "insert into personal (`legajo`, `nombre`, `apellido`, `dni`, `direccion`, `telefono`, `email`) values(null, :nombre, :apellido, :dni, :direccion, :telefono, :email)";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':nombre', $nombre);
			$statement->bindParam(':apellido', $apellido);
			$statement->bindParam(':dni',$dni);
			$statement->bindParam(':direccion',$direccion);
			$statement->bindParam(':telefono',$telefono);
			$statement->bindParam(':email',$email);
			$statement->execute();

		} catch(PDOException $e) {
				echo "ERROR: " . $e->getMessage();
				
		}
		$con = null; 

	}

	public function insertarPersonal($personal,$idCuenta) {
	try {
			$nombre = $personal->getNombre();
		 	$apellido = $personal->getApellido();
		 	$dni = $personal->getDni();
		 	$direccion = $personal->getDireccion();
		 	$telefono = $personal->getTelefono();
		 	$email = $personal->getEmail();

			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "insert into personal (`legajo`, `nombre`, `apellido`, `dni`, `direccion`, `telefono`, `email`, `idCuenta`) values(null, :nombre, :apellido, :dni, :direccion, :telefono, :email, :idCuenta)";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':nombre', $nombre);
			$statement->bindParam(':apellido', $apellido);
			$statement->bindParam(':dni',$dni);
			$statement->bindParam(':direccion',$direccion);
			$statement->bindParam(':telefono',$telefono);
			$statement->bindParam(':email',$email);
			$statement->bindParam(':idCuenta',$idCuenta);
			$statement->execute();

		} catch(PDOException $e) {
				echo "ERROR: " . $e->getMessage();
				
		}
		$con = null; 

	}

	public function eliminar($legajo) {
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "delete from personal where legajo = :legajo";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':legajo', $legajo);
			$statement->execute();

			$message = "Eliminado exitosamente!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		 
	}

	public function modificar($personal,$legajo) {
		try {

			$nombre = $personal->getNombre();
		 	$apellido = $personal->getApellido();
		 	$dni = $personal->getDni();
		 	$direccion = $personal->getDireccion();
		 	$telefono = $personal->getTelefono();
		 	$email = $personal->getEmail();
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "update personal set nombre = :nombre, apellido = :apellido, dni = :dni, direccion = :direccion, telefono = :telefono, email = :email where legajo = :legajo";
			$statement = $conexion->prepare($sql);

			$statement->bindParam(':legajo', $legajo);
			$statement->bindParam(':nombre', $nombre);
			$statement->bindParam(':apellido', $apellido);
			$statement->bindParam(':dni',$dni);
			$statement->bindParam(':direccion',$direccion);
			$statement->bindParam(':telefono',$telefono);
			$statement->bindParam(':email',$email);
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
			$sql = "select *,rol from personal inner join cuenta where personal.idCuenta = cuenta.idCuenta";
			$statement = $conexion->prepare($sql);
			$statement->execute();
			$resultado = $statement->fetchAll();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;		
	
	}


	public function buscar($dni){
		$resultado = null;
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "select * from personal where dni = :dni";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':dni', $dni);
			$statement->execute();
			$resultado = $statement->fetch();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;
	
	}

	public function buscarxLegajo($legajo){
			$resultado = null;
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "select * from personal where legajo = :legajo";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':legajo', $legajo);
			$statement->execute();
			$resultado = $statement->fetch();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;
	}

	public function buscarxemail($email){
			$resultado = null;
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "select * from personal where email = :email";

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

	public function buscarUltimo(){
		$resultado = null;
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "select * from personal order by legajo desc limit 1";

			$statement = $conexion->prepare($sql);
			$statement->execute();
			$resultado = $statement->fetch();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;
	}


}