<?php namespace DAO;

class CervezaLista extends SingletonDAO implements IDAO
{	

	public $arreglo;

	private function __construct()
	{
		$arreglo=array();
	}

	public function insertar($cerveza) {
		$json_string = json_encode($cerveza);
		$file = '..\BeerCharge\cerveza.json';
		file_put_contents($file, $json_string);
	}

	public function eliminar($cerveza) {
		$json_string = json_encode($cerveza);
		$file = '..\BeerCharge\cerveza.json';
		file_put_contents($file, $json_string);
	}

	public function modificar($cerveza) {

	}

	public function listar() {
		
	}


	public function buscar($cerveza){
		
	}
}
?>