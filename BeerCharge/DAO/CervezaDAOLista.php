<?php namespace DAO;

Use Modelo\Cerveza as Cerveza;
use DAO\Conexion as Conexion;


class CervezaDAOLista implements IDAO
{	

	private function __construct(){
		if (isset($_SESSION['listadoTipoCerveza'])) {
			$this->listado=$_SESSION['listadoTipoCerveza'];
		}else{
			$_SESSION['listadoTipoCerveza'] = $this->listado;
		}
	}

	protected $table='cervezas';
	protected static $instance;
	private   $listado = array();

	public static function getInstance()
    {
        if (!isset(self::$instance)) {
            //$miclase = __CLASS__;
            self::$instance = new self;//$miclase;
        } 
        return self::$instance;
    }


	public function insertar($cerveza) {
				
				$nuevo= array();
				$nuevo['idCerveza'] = $cerveza->getIdCerveza();
				$nuevo['descripcion'] = $cerveza->getDescripcion();
				$nuevo['precioLitro'] =$cerveza->getPrecioLitro();
				$nuevo['foto']= $cerveza->getFoto();
				
				array_push($this->listado, $nuevo);
				$_SESSION['listadoTipoCerveza']=$this->listado;

			



			/*
			try { $descripcion = $cerveza->getDescripcion();
			$precioLitro = $cerveza->getPrecioLitro();

			$con = new Conexion();
			$conexion = $con->conectar();
			//$sql = "insert into cervezas values(:idCerveza, :descripcion, :precioLitro)";
			$sql = "insert into ". $this->table. " values(:idCerveza, :descripcion, :precioLitro)";
			$statement = $conexion->prepare($sql);
			$statement->bindParam(":idCerveza", $idCerveza);
			$statement->bindParam(":descripcion", $descripcion);
			$statement->bindParam(":precioLitro", $precioLitro);
			$statement->execute();

			$message = "Guardado exitosamente!";
			echo "<script type='text/javascript'>alert('$message');</script>";
	

		} catch(PDOException $e) {
				echo "ERROR: " . $e->getMessage();
				
		}
		$con = null; 
*/
	}

	public function eliminar($idcerveza) {

		for ($i=0; $i < count($this->listado) ; $i++) { 
			if ($this->listado[$i]['idCerveza']==$idcerveza) {
				unset($this->listado[$i]);
			}

		}
		
		$_SESSION['listadoTipoCerveza']=$this->listado;		 
	}

	public function modificar($cerveza,$idcerveza) {
		//$this->listado = $_SESSION['listadoTipoCerveza'];
		//var_dump($this->listado);
		$nuevo= array();
		$nuevo['idCerveza'] = $cerveza->getIdCerveza();
		$nuevo['descripcion'] = $cerveza->getDescripcion();
		$nuevo['precioLitro'] =$cerveza->getPrecioLitro();
		$nuevo['foto']= $cerveza->getFoto();
		//var_dump($this->listado[$i]);

		for ($i=0; $i < count($this->listado) ; $i++) { 
			if ($this->listado[$i]['idCerveza']==$nuevo['idCerveza']) {
				//$this->listado[$i]= $nuevo;
				$this->listado[$i] = $nuevo;
			}

		}
		$_SESSION['listadoTipoCerveza']=$this->listado;	

	}

	public function listar() {
			return $this->listado;





		/* $fila = null;
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
		return $resultado;	*/	
	}

	public function buscar($idCerveza){
		foreach ($this->listado as $i) {
			if ($i['idCerveza']==$idCerveza) {
				return $i;
			}
		}
	}

	public function buscarUltimo(){
		//$this->listado = $_SESSION['listadoTipoCerveza'];
		if(is_null($this->listado))
		{
			$ultimo = array();
			$ultimo['idCerveza'] = 0;
		}
		else
		{
			$ultimo = end($this->listado);
		}
		return $ultimo;
	}
}
?>











