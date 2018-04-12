<?php namespace Controladora;


use Modelo\Cuenta as Cuenta;
use Modelo\Usuario as Usuario;
use DAO\CuentaDAO as CuentaDAO;
use DAO\UsuarioDAO as UsuarioDAO;
use DAO\cervezaDAO as cervezaDAO;

class loginControlador{

	protected $listacuenta;
	protected $listausuario;
	public $usuario;
	public $cuenta;
	protected $cervezaDAO;

	public function __construct(){
		$this->listacuenta = CuentaDAO::getInstance();
		$this->listausuario = UsuarioDAO::getInstance();
		$this->cervezaDAO = cervezaDAO::getInstance();

	}

	public function index(){
		$cervezas=$this->cervezaDAO->listarParaPed();
			
			require_once ROOT . "Vistas/template.php";
			require_once ROOT . "Vistas/elegirCerveza.php";
		/*if(!isset($_SESSION['user'])){
			header('location: login/vistaLogin');
		}else{
			header('location: login/home');
		}*/
		//header('location: pedido/elegirCerveza');
	}

	public function home(){
		require_once ROOT . "Vistas/template.php";
	}

	public function vistaLogin(){
		require_once ROOT . "Vistas/login.php";
	}

	public function vistaRegistro(){
		require_once ROOT . "Vistas/registro.php";
	}


	public function registrar($nombre,$apellido,$direccion,$localidad,$provincia,$telefono,$email,$password,$password2){

			if ($password!=$password2){
					$message = "La confirmacion del password es incorrecta!";
					echo "<script type='text/javascript'>alert('$message');</script>";
					$this->vistaRegistro();
			} else{
			
				$existe = $this->listausuario->buscar($email);
				
				if(empty($existe)){
					$rol = 'Cliente';
					$usuario = new usuario($nombre,$apellido,$direccion,$localidad,$provincia,$telefono,$email);
					$cuenta = new cuenta($email,$password,$rol);

					$this->listacuenta->insertar($cuenta);
					$cuenta = $this->listacuenta->buscarUltimo();
					$this->listausuario->insertarUsuario($usuario,$cuenta['idCuenta']);
					$this->vistaLogin();
				}else{
					$message = "El email ya se encuentra registrado!";
					echo "<script type='text/javascript'>alert('$message');</script>";
					$this->vistaRegistro();
				}	
			}
		}

	public function ingresar(){
		if (isset($_SESSION['user']))
		{
			header('location: home');
			
		}else {
			header('location: vistaLogin');
		}
		

	}


	public function logueo(){

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
					$user = $this->listacuenta->buscar($cuenta);
					if($user){

						$i = $user[0]['idCuenta'];
						$e = $user[0]['email'];
						$p = $user[0]['pass'];
						$r = $user[0]['rol'];
					
						$_SESSION['id']	= $i;
						$_SESSION['user'] = $e;
						$_SESSION['pass'] = $p;
						$_SESSION['rol'] = $r;
				
	
						//$this->index();
						$message = "Usuario Ingresado correctamente!";
						echo "<script type='text/javascript'>alert('$message');</script>";
						//require_once ROOT . "/Vistas/template.php";
						if($_SESSION['rol']=='Cliente'){
							header('location: ../login/index');
						}else{
							header('location: ../login/home');
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
	}


	public function logout(){
		
		session_destroy();
		header('location: index');
		
		
	}
 	
 	public function editarDatos(){
 		
 		$datos=$_SESSION['user'];
 		$cuenta=$this->listacuenta->buscarCuenta($datos);
 		

 		require_once ROOT . "Vistas/template.php";
 		require_once ROOT . "Vistas/editarDatos.php";

 	}
 	public function updateDatos($nombre,$apellido,$direccion,$localidad,$provincia,$telefono,$email,$idUsuario){

 		$usuario= new Usuario($nombre,$apellido,$direccion,$localidad,$provincia,$telefono,$email);
 		$this->listausuario->updateDatos($usuario,$idUsuario);

 		$message = "Datos actualizados!";
		echo "<script type='text/javascript'>alert('$message');</script>";
		$this->index();
 	}
}
?>