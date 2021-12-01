<?php
include('clsConexion.php');

class Libros{
	
	private $codL;
	private $titulo;
	private $autor;
	private $isbn;
	private $paginas;



	public function setcodL($codL){
		$this->codL = $codL;
	}

	public function getcodL(){
		return $this->codL;
	}

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function getTitulo(){
		return $this->titulo;
	}
	public function setAutor($autor){
		$this->autor = $autor;
	}

	public function getAutor(){
		return $this->autor;
	}
	
	public function setISBN($isbn){
		$this->isbn = $isbn;
	}

	public function getISBN(){
		return $this->isbn;
	}
	public function setPag($paginas){
		$this->paginas = $paginas;
	}

	public function getPag(){
		return $this->paginas;
	}


	public function __construct($id,$nombre){
		$this->codL = $codL;
		$this->titulo = $titulo;
		$this->autor = $autor;
		$this->isbn = $isbn;
		$this->paginas = $paginas;
		$this->conn = new Conexion();
		$this->conn->CrearConexion();
	}

	public function Guardar(){
		$sql = "insert into usuario values('".$this->id."','".$this->nombre."') ";
		$result = $this->conn->EjecutarSQL($sql);
		return $result;
	}

	public function Consultar(){
			$sql = "SELECT libros.lib_codigo, libros.lib_titulo, autores.aut_nombre, libros.lib_ISBN, libros.lib_Editorial, libros.lib_paginas FROM libros JOIN autores ON libros.lib_codigo=autores.aut_codigo where libros.lib_codigo ='".$this->codL."' ";
			#$sql = "select * from usuario where id='".$this->id."' ";
			$result = $this->conn->EjecutarSQL($sql);
			$row = $this->conn->ObtenerFilas($result);
			return $row;
	}

	public function Eliminar(){
		$sql = "delete from usuario where id='".$this->id."' ";
		$result = $this->conn->EjecutarSQL($sql);
		return $result;
	}

	public function Actualizar(){

	}

}

?>