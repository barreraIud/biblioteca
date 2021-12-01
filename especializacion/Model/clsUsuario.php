<?php
include('clsConexion.php');

class Usuario{
	
	private $id;
	private $nombre;
	private $conn;

	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function __construct($id,$nombre){
		$this->id = $id;
		$this->nombre = $nombre;
		$this->conn = new Conexion();
		$this->conn->CrearConexion();
	}

	public function Guardar(){
		$sql = "insert into usuario values('".$this->id."','".$this->nombre."') ";
		$result = $this->conn->EjecutarSQL($sql);
		return $result;
	}

	public function Consultar(){
			$sql = "select * from usuario where id='".$this->id."' ";
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