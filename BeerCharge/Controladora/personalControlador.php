<?php namespace Controladora;

if(!isset($_SESSION['user'])){
	header('location: ../login/vistaLogin');
}

use Modelo\Cuenta as Cuenta;
use Modelo\Personal as Personal;
use DAO\CuentaDAO as CuentaDAO;
use DAO\PersonalDAO as PersonalDAO;

class personalControlador
{
	private $personal;
	
	public function __construct()
	{
		$this->personal = PersonalDAO::getInstance();
		$this->cuenta = CuentaDAO::getInstance();
		
	}

	public function index(){
		require_once ROOT . "Vistas/template.php";
	}

	public function ingresarPersonal(){
		$ultimoempleado = $this->personal->buscarUltimo();
		$legajo= $ultimoempleado['legajo'];
		$legajo++;
		//require_once ROOT . "Vistas/template.php";
		require_once ROOT . "Vistas/nuevoEmpleado.php";
	}

	
	public function registrar($legajo,$nombre,$apellido,$direccion,$telefono,$email,$password,$password2,$rol){
			echo $rol;
			if (empty($_POST['nombre'])  || empty($_POST['apellido']) || empty($_POST['direccion']) || empty($_POST['telefono']) || empty($_POST['email']) || empty($_POST['password'])){
					throw new Exception('Complete todos los campos');
			} else{
				$ultimoempleado = $this->personal->buscarUltimo();
				$personal = new Personal($legajo,$nombre,$apellido,$direccion,$telefono,$email);
				$cuenta = new cuenta($email,$password,$rol);
				$this->personal->insertar($personal);
				$this->cuenta->insertar($cuenta);
				header('location: index');
			}
		}

	public function listarPersonal(){
		$personal = $this->personal->listar();
		require_once ROOT . "Vistas/template.php";
		require_once ROOT . "Vistas/listadoCerveza.php";
	}

	public function modificarPersonal($legajo){
			$pers = $this->personal->buscar($legajo);
			require_once ROOT . "Vistas/template.php"; 
			require_once ROOT . "Vistas/editarCerveza.php";	
			
		}

	public function editarPersonal($nombre,$apellido,$direccion,$telefono,$email,$password,$password2,$rol,$legajo){
		$emp = new Personal($legajo,$nombre,$apellido,$direccion,$telefono,$email);
		$cue = new Cuenta($email,$password,$rol);
		$pers = $this->personal->buscar($legajo);
		$emailAnt = $pers['email'];
		$this->personal->modificar($emp);
		$this->cuenta->modificarCuenta($cue,$emailAnt);
		$personal = $this->personal->listar();
		require_once ROOT . "Vistas/template.php";
		require_once ROOT . "Vistas/listadoCerveza.php";
	}

	public function eliminarPersonal($legajo){
	$legajo= null;
	$legajo = $legajo;
	$per = $this->personal->buscar($legajo);
	$this->cuenta->eliminar($per['email']);
	$this->personal->eliminar($legajo);
	header('location: ../listarPersonal');
	}
}
?>