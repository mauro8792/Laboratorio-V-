<?php namespace DAO;

use Modelo\Cuenta as Cuenta;
use DAO\Conexion as Conexion;

class CuentaDAO  implements IDAO{
	
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



	public function insertar($cuenta) {
		try {
			$email = $cuenta->getEmail();
			$password = $cuenta->getPassword();
			$rol = $cuenta->getRol();

		$con = new Conexion();
		$conexion = $con->conectar();
		$sql = "insert into cuenta values(0,:email, :pass, :rol)";

		$statement = $conexion->prepare($sql);
		$statement->bindParam(":email", $email);
		$statement->bindParam(":pass", $password);
		$statement->bindParam(":rol", $rol);
		$statement->execute();

		$message = "Guardado exitosamente!";
			echo "<script type='text/javascript'>alert('$message');</script>";
	

		} catch(PDOException $e) {
				//echo "ERROR: " . $e->getMessage();
				throw new Exception("Se rompio todo", 1);
				
		}
		$con = null; 

	}

	public function eliminar($idCuenta) {
		try {


			$con = new Conexion();
			$conexion = $con->conectar();
			$sql = "delete from cuenta where idCuenta = :idCuenta";
			
			$statement = $conexion->prepare($sql);
			$statement->bindParam(':idCuenta', $idCuenta);
			$statement->execute();
		} catch(PDOException $e) {
				echo "ERROR: " . $e->getMessage();
		}

		$con = null; 
	}

	public function modificar($cuenta,$emailAnt){ ///// ver!!!
		try{
			$email= $cuenta->getEmail();
			$pass = $cuenta->getPassword();
			$rol  = $cuenta->getRol();


 
			$con = new Conexion();
			$conexion = $con->conectar();

			$sql = "update cuenta set email = :email, pass = :pass, rol = :rol where email = :emailAnt";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':email', $email);
			$statement->bindParam(':emailAnt',$emailAnt);
			$statement->bindParam(':pass', $pass);
			$statement->bindParam(':rol', $rol);
			$statement->execute();
		} catch(PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
	}


	public function listar() {
			$fila = null;
			try{
				$con = new Conexion();
				$conexion = $con->conectar();
				$sql="select * from cuenta";
				$statement = $conexion->prepare($sql);
				$statement->execute();
				while($resultado = $statement->fetch()){
				$fila[] = $resultado; 
			}
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $fila;
	}


	public function buscar($cuenta){
		try{
			$email = $cuenta['email'];
			$pass  = $cuenta['password'];
			$con = new Conexion();
			$conexion = $con->conectar();
			$resultado=null;
			$email = $cuenta['email'];
			$pass = $cuenta['password'];
			$sql = "select * from cuenta where email = :email and pass = :pass";
			$statement = $conexion->prepare($sql);
			$statement->bindParam(':email', $email);
			$statement->bindParam(':pass', $pass);
			$statement->execute();
			$resultado = $statement->fetchAll(); 
			
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;
	}

	public function buscarUltimo(){
		try{

			$con = new Conexion();
			$conexion = $con->conectar();
			$resultado=null;
			$sql = "select idCuenta from cuenta order by idCuenta desc Limit 1";
			$statement = $conexion->prepare($sql);
			$statement->execute();
			$resultado = $statement->fetch(); 
			
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;
	}

	public function buscarCuenta($email){
		
		$resultado = null;
		try {
			$con = new Conexion();
			$conexion = $con->conectar();
			 //"select fk_idCerveza from envasesxcerveza where idCerveza = :idCerveza";
			 $sql ="select * FROM usuario where email = :email ";

			$statement = $conexion->prepare($sql);
			$statement->bindParam(':email', $email);
			$statement->execute();
			$resultado = $statement->fetchAll();
		} catch (PDOException $e) {
			echo "ERROR: " . $e->getMessage();
		}
		$con = null;
		return $resultado;

	}

	





}
?>