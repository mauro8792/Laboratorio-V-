<?php namespace Controladora;

	use Dao\EnvaseDAO as EnvaseDAO;
	use Modelo\Envase as Envase;

	/**
	* 
	*/
	class envaseControlador
	{
		private $envase;

		function __construct()
		{
			$this->envase= EnvaseDAO::getInstance();
		}

		public  function ingresarEnvase(){
			require_once ROOT . "Vistas/template.php";
			require_once ROOT . "Vistas/gestionEnvase.php";
		}

		public function nuevoEnvase($descripcion,$litros,$coeficiente){
		

			try{
				$imageDirectory = 'Vistas/images/';
				$message = null;
				$file = $imageDirectory . 'sinfoto.png';
				
				if(!file_exists($imageDirectory))
					mkdir($imageDirectory);

				if($_FILES)
					{
					if((isset($_FILES['fileToUpload'])) && ($_FILES['fileToUpload']['name'] != ''))
					{
						$file = $imageDirectory . basename($_FILES['fileToUpload']['name']);		

						$fileExtension = pathinfo($file, PATHINFO_EXTENSION);
				
						$imageInfo = getimagesize($_FILES['fileToUpload']['tmp_name']);
						
						
						if($imageInfo !== false)
						{
							if($_FILES['fileToUpload']['size'] < 5000000) //Menor a 5 MB
							{
								if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file))
								{
			        				$message = "No se pudo subir el archivo";
			        			}	
							}
							else
								$message = "el archivo es demasiado grande";
							}
						else
							$message = "el archivo no es un archivo de imagen";
					}		
				}

			if(!is_null($message)){
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
			
			$envase= new Envase($descripcion,$litros,$coeficiente,$file);
			//$existe = $this->cerveza->buscarxNombre($nombre);
			//if(empty($existe))
				$this->envase->insertar($envase);
				echo "<script type='text/javascript'>alert('$message');</script>";
				$this->ingresarEnvase();	
			
			
			
			} catch (PDOException $e){
				
				echo $e->getMessage();
			}catch(Exception $e){
				echo $e->getMessage();
			}

		}

		public function listarEnvases(){
			$envases= $this->envase->listarTodos();
			
			require_once ROOT . "Vistas/template.php";
			require_once ROOT . "Vistas/listadoEnvase.php";
			
		}

		


		public function eliminarEnvase($idEnv){
		$idEnvase=null;
		$idEnvase=$idEnv;	
		$env=$this->envase->buscar($idEnvase);
		$estado=1;
		if ($env['estado']==1) {
			$estado=0;
		}
		$this->envase->eliminarLogicoEnv($idEnvase,$estado);
		header('location: ../listarEnvases');
		}

		public function modificarEnvase($idEnv){
			$recipiente = $this->envase->buscar($idEnv);
			require_once ROOT . "Vistas/template.php"; 
			require_once ROOT . "Vistas/editarEnvase.php";	
			
		}

		public function editarEnvase($descripcion,$litros,$coeficiente,$foto,$id){
		
		$imageDirectory = 'Vistas/images/';
		$message = null;
		$file=null;		

			if(!file_exists($imageDirectory))
				mkdir($imageDirectory);

			if($_FILES)
			{
				if((isset($_FILES['fileToUpload'])) && ($_FILES['fileToUpload']['name'] != ''))
				{
					$file = $imageDirectory . basename($_FILES['fileToUpload']['name']);			

					$fileExtension = pathinfo($file, PATHINFO_EXTENSION);
			
					$imageInfo = getimagesize($_FILES['fileToUpload']['tmp_name']);
					
					if($imageInfo !== false)
					{	
						if($_FILES['fileToUpload']['size'] < 5000000) //Menor a 5 MB
						{
							if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file))
							{
		        				$message = "No se pudo subir el archivo";
		        			}	
						}
						else
							$message = "el archivo es demasiado grande";
						}
					else
						$message = "el archivo no es un archivo de imagen";
				}		
			}

			if (is_null($file)) {
				$file =  $_POST['foto'];
			}
			
			if(!is_null($message)){
				echo "<script type='text/javascript'>alert('$message');</script>";
				$env = $this->envase->buscar($id);
				require_once ROOT . "Vistas/template.php"; //!!ver porque no anda el boostrap
				require_once ROOT . "Vistas/editarEnvase.php";	
			}
			else{

				$env = new Envase($descripcion,$litros,$coeficiente,$file);

				$this->envase->modificar($env,$id);
				$envases = $this->envase->listarTodos();
				require_once ROOT . "Vistas/template.php";
				require_once ROOT . "Vistas/listadoEnvase.php";
			}
			

		
	}
}

?>