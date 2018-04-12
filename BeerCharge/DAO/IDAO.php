<?php namespace DAO;


Interface IDAO 
{
	public function insertar($dato);

	public function modificar($dato,$id);

	public function eliminar($dato);

	public function listar();

	public function buscar($dato);

}