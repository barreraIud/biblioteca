<?php

class Conexion{

	private $host;
	private $user;
	private $password;
	private $database;
	private $conn;

	public function __construct(){
		require_once("../Controller/config_BD.php");
		$this->host = HOST;
		$this->user = USER;
		$this->password = PASSWORD;
		$this->database = DATABASE;
	}

	public function CrearConexion(){

		$this->conn = new mysqli($this->host,$this->user,$this->password,$this->database);

		if ($this->conn->connect_errno) {
	    	echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}else{
			echo "Conexión Exitosa";
		}
	}

	public function CerrarConexion(){
		$this->conn->close();
	}

	public function EjecutarSQL($sql){
		$result = $this->conn->query($sql);
		return $result;
	}

	public function ObtenerFilasAfectadas(){
		return $this->conn->affected_rows;
	}

	public function ObtenerFilas($result){
		return $result->fetch_row();
	}

}

?>