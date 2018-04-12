<?php namespace Controladora;


use Modelo\Cuenta as Cuenta;
use Modelo\Personal as Personal;
use Modelo\Usuario as Usuario;
use DAO\CuentaDAO as CuentaDAO;
use DAO\PersonalDAO as PersonalDAO;
Use DAO\UsuarioDAO as UsuarioDAO;

class adminControlador
{
	private $personal;
	private $cuenta;
	private $cliente;
	
	public function __construct()
	{
		$this->personal = PersonalDAO::getInstance();
		$this->cuenta = CuentaDAO::getInstance();
		$this->cliente = UsuarioDAO::getInstance();
	}

	public function index(){

		/*if(!isset($_SESSION['user'])){
			header('location: admin/vistaLogin');
		}else
		{
			if($_SESSION['rol']=='Cliente'){
				header('location: login');
			}
			else{*/
				header('location: admin/home');	
			//}
		//}
	}

	public function vistaLogin(){
		require_once ROOT . "Vistas/loginP.php";
	}

	public function home(){
		require_once ROOT . "Vistas/template.php";
	}

	public function ingresarPersonal(){
		$ultimoempleado = $this->personal->buscarUltimo();
		$legajo= $ultimoempleado['legajo'];
		$legajo++;
		require_once ROOT . "Vistas/template.php";
		require_once ROOT . "Vistas/nuevoEmpleado.php";
	}

	
	public function registrar($nombre,$apellido,$dni,$direccion,$telefono,$email,$password,$password2,$rol){
			if ($password!=$password2){
					$message = "La confirmacion del password es incorrecta!";
					echo "<script type='text/javascript'>alert('$message');</script>";
					$this->ingresarPersonal();
			} else{
				$existe  = $this->personal->buscar($dni);
				$existe2 = $this->personal->buscarxemail($email);
				if(empty($existe) && empty($existe2)){
					$personal = new Personal($nombre,$apellido,$dni,$direccion,$telefono,$email);
					$cuenta = new cuenta($email,$password,$rol);

					$this->cuenta->insertar($cuenta);
					$cuenta = $this->cuenta->buscarUltimo();
					$this->personal->insertarPersonal($personal,$cuenta['idCuenta']);

					$message = "Registracion correcta!";
					echo "<script type='text/javascript'>alert('$message');</script>";
					$this->ingresarPersonal();
				}else{
					if(!empty($existe)){
						$message = "El Nro. de DNI ya se encuentra registrado!";	
					}else{
						$message = "El Email ya se encuentra registrado!";
					}
					echo "<script type='text/javascript'>alert('$message');</script>";
					$this->ingresarPersonal();
				}
			}
		}

	public function listarPersonal(){
		$personal = $this->personal->listar();
		require_once ROOT . "Vistas/template.php";
		require_once ROOT . "Vistas/listadoPersonal.php";
	}

	public function listarClientes(){
		$cliente = $this->cliente->listar();
		require_once ROOT . "Vistas/template.php";
		require_once ROOT . "Vistas/listadoCliente.php";
	}

	public function modificarPersonal($legajo){
			$pers = $this->personal->buscarxLegajo($legajo);
			require_once ROOT . "Vistas/template.php"; 
			require_once ROOT . "Vistas/editarPersonal.php";	
			
		}

	public function editarPersonal($nombre,$apellido,$dni,$direccion,$telefono,$email,$password,$password2,$rol,$legajo){
		if ($password!=$password2){
					$message = "La confirmacion del password es incorrecta!";
					echo "<script type='text/javascript'>alert('$message');</script>";
					$this->ingresarPersonal();
			} else{
				$emp = new Personal($nombre,$apellido,$dni,$direccion,$telefono,$email);
				$cue = new Cuenta($email,$password,$rol);
				$pers = $this->personal->buscarxLegajo($legajo);
				$emailAnt = $pers['email'];

				$this->personal->modificar($emp,$legajo);
				$this->cuenta->modificar($cue,$emailAnt);
				$personal = $this->personal->listar();
				require_once ROOT . "Vistas/template.php";
				require_once ROOT . "Vistas/listadoPersonal.php";
				$this->listarPersonal();
			}
	}

	public function eliminarPersonal($legajo){
	$per = $this->personal->buscarxLegajo($legajo);
	$idCuenta = $per['idCuenta'];
	$this->personal->eliminar($legajo);
	$this->cuenta->eliminar($idCuenta);
	
	$this->listarPersonal();
	}


	/*public function logueo(){

		//if (isset($_POST['login'])){

			if (empty($_POST['email'])  || empty($_POST['password'])){
					throw new Exception('Complete todos los campos');
			} else{
				$email= $_POST['email'];
				$password= $_POST['password'];
				$cuenta = array(
					'email' => $email,
					'password' => $password
					);

				try {
					$user = $this->cuenta->buscar($cuenta);
					if($user){


						$e = $user[0]['email'];
						$p = $user[0]['pass'];
						$r = $user[0]['rol'];
					
						if($r=='Cliente'){
							$message = "No puede ingresar al Sistema!";
							echo "<script type='text/javascript'>alert('$message');</script>";
							require_once ROOT . "/Vistas/loginP.php";
						}
						else{
							$_SESSION['user'] = $e;
							$_SESSION['pass'] = $p;
							$_SESSION['rol'] = $r;
					
		
							//$this->index();
							$message = "Usuario Ingresado correctamente!";
							echo "<script type='text/javascript'>alert('$message');</script>";
							require_once ROOT . "/Vistas/template.php";

						}

						

					}else{
						$message = "cuenta o Contraseña incorrecta!";
						echo "<script type='text/javascript'>alert('$message');</script>";
						require_once ROOT . "/Vistas/login.php";

					}
						
				}catch (PDOException $e) {
						require_once ROOT . "/Vistas/login.php";
				}

				}
		//}
	}*/
}
?>