<?php 

require_once 'Config/db_connection/Connection.php';

Class CustomerModel extends Connection
{
	protected $cli_id;
	protected $cli_nombre;
	protected $cli_apellido;
	protected $cli_correo;
	protected $cli_telefono;
	protected $cli_fecha_creado;
	protected $cli_fecha_modificado;
	protected $cli_status;


	protected function getCustomer()
	{
		$conn = (new Connection())->startConnection();

		$sql = 'SELECT * FROM clientes'; //  WHERE cli_status=1 para no superadmins
		$exe = $conn->prepare($sql);
		$exe->execute();

		$getCustomer_response = $exe->FetchALL(PDO::FETCH_OBJ);
		return $getCustomer_response;

	}

	protected function addCustomerM(){
		
		try{

		echo "ENTRAMOS!";
		$conn = (new Connection())->startConnection();
		$sql = 'INSERT INTO proveedores(cli_nombre, cli_apellido, cli_correo, cli_telefono, cli_fecha_creado, cli_status) 
			values(:nombre, :apellido, :correo, :telefono, :fecha_creado, :status)';
		$exe = $conn->prepare($sql);

		$exe->bindParam(':nombre', $this->cli_nombre);
		$exe->bindParam(':apellido', $this->cli_apellido);
		$exe->bindParam(':correo', $this->cli_correo);
		$exe->bindParam(':telefono', $this->cli_telefono);
		$exe->bindParam(':fecha_creado', $this->cli_fecha_creado);
		$exe->bindParam(':status', $this->cli_status);
		$validate = $exe->execute();

		if($validate){
			echo "Ingresado correctamente!, devolvió: ".$validate;
		}else {
			echo "Ha ocurrido un error al ejecutar, revisa la consulta!, devolvió: false".var_dump($this->cli_status);
		}
		return $validate;

		} catch (Exception $e) {
			die("Error UserModel->add v3 : ".$e->getMessage());
		}

	}


	protected function updateCustomerrM(){
	try{

		echo "ENTRAMOS UPDATE!";
		$conn = (new Connection())->startConnection();
		$sql = "UPDATE proveedores
				SET cli_nombre = :nombre, 
				cli_apellido = :apellido, 
				cli_correo = :correo, 
				cli_telefono = :telefono,
				cli_fecha_modificado = :fecha_modificado, 
				cli_status = :status
				WHERE cli_id = :id";

		$exe = $conn->prepare($sql);
		$exe->bindParam(':nombre', $this->cli_nombre);
		$exe->bindParam(':apellido', $this->cli_apellido);
		$exe->bindParam(':correo', $this->cli_correo);
		$exe->bindParam(':telefono', $this->cli_telefono);
		$exe->bindParam(':fecha_modificado', $this->cli_fecha_modificado);
		$exe->bindParam(':status', $this->cli_status);		
		$exe->bindParam(':id', $this->cli_id);
		$validate = $exe->execute();

		if($validate){
			echo "Actualizado correctamente!, devolvió: ".$validate;
		}else {
			echo "Ha ocurrido un error al ejecutar Actualizar, revisa la consulta y su ejecución!, devolvió: false".var_dump($this->cli_status);

		}
		return $validate;

		} catch (Exception $e) {
			die("Error CustomerModel->update v1 : ".$e->getMessage());
		}


	}


	Protected function deleteCustomerrM(){
		$conn = (new Connection())->startConnection();
		$sql = "UPDATE proveedores
				SET cli_status=0
				WHERE cli_id=? AND cli_status='1'";
		$exe = $conn->prepare($sql);
		$exe->bindParam(1, $this->id);

		$exe->execute();
		$validate = $exe->rowCount(); //retorna la cantidad de filas afectadas después del update

		echo $validate;


	}



















}



//Por recomendaciones de estandar, en archivos de solo php, es recomendable no cerrar la etiqueta de php ?>