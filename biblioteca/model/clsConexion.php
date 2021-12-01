<?php

class Conexion{

	private $host;
	private $user;
	private $password;
	private $database;
	private $conn;

  public function __construct(){
       	require_once('../controller/config_BD.php');
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
}
?>
