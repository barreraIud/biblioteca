<?php 

require_once 'Config/db_connection/Connection.php';

Class SupplierModel extends Connection
{
	protected $prv_id;
	protected $prv_nombre;
	protected $prv_correo;
	protected $prv_telefono;
	protected $prv_direccion;
	protected $prv_fecha_creado;
	protected $prv_fecha_modificado;
	protected $prv_status;


	protected function getSupplier()
	{
		$conn = (new Connection())->startConnection();

		$sql = 'SELECT * FROM proveedores'; //  WHERE prv_status=1 para no superadmins
		$exe = $conn->prepare($sql);
		$exe->execute();

		$getSupplier_response = $exe->FetchALL(PDO::FETCH_OBJ);
		return $getSupplier_response;

	}

	protected function addSupplierM(){
		
		try{

		echo "ENTRAMOS!";
		$conn = (new Connection())->startConnection();
		$sql = 'INSERT INTO proveedores(prv_nombre, prv_correo, prv_telefono, prv_direccion, prv_fecha_creado, prv_status) 
			values(:nombre, :correo, :telefono, :direccion, :fecha_creado, :status)';
		$exe = $conn->prepare($sql);

		$exe->bindParam(':nombre', $this->prv_nombre);
		$exe->bindParam(':correo', $this->prv_correo);
		$exe->bindParam(':telefono', $this->prv_telefono);
		$exe->bindParam(':direccion', $this->prv_direccion);
		$exe->bindParam(':fecha_creado', $this->prv_fecha_creado);
		$exe->bindParam(':status', $this->prv_status);
		$validate = $exe->execute();

		if($validate){
			echo "Ingresado correctamente!, devolvió: ".$validate;
		}else {
			echo "Ha ocurrido un error al ejecutar, revisa la consulta!, devolvió: false".var_dump($this->prv_status);
		}
		return $validate;

		} catch (Exception $e) {
			die("Error UserModel->add v3 : ".$e->getMessage());
		}

	}


	protected function updateSupplierM(){
	try{

		echo "ENTRAMOS UPDATE!";
		$conn = (new Connection())->startConnection();
		$sql = "UPDATE proveedores
				SET prv_nombre = :nombre, 
				prv_correo = :correo, 
				prv_telefono = :telefono, 
				prv_direccion = :direccion,
				prv_fecha_modificado = :fecha_modificado, 
				prv_status = :status
				WHERE prv_id = :id";

		$exe = $conn->prepare($sql);
		$exe->bindParam(':nombre', $this->prv_nombre);
		$exe->bindParam(':correo', $this->prv_correo);
		$exe->bindParam(':telefono', $this->prv_telefono);
		$exe->bindParam(':direccion', $this->prv_direccion);
		$exe->bindParam(':fecha_modificado', $this->prv_fecha_modificado);
		$exe->bindParam(':status', $this->prv_status);		
		$exe->bindParam(':id', $this->prv_id);
		$validate = $exe->execute();

		if($validate){
			echo "Actualizado correctamente!, devolvió: ".$validate;
		}else {
			echo "Ha ocurrido un error al ejecutar Actualizar, revisa la consulta y su ejecución!, devolvió: false".var_dump($this->prv_status);

		}
		return $validate;

		} catch (Exception $e) {
			die("Error SupplierModel->update v1 : ".$e->getMessage());
		}


	}


	Protected function deleteSupplierM(){
		$conn = (new Connection())->startConnection();
		$sql = "UPDATE proveedores
				SET prv_status=0
				WHERE prv_id=? AND prv_status='1'";
		$exe = $conn->prepare($sql);
		$exe->bindParam(1, $this->id);

		$exe->execute();
		$validate = $exe->rowCount(); //retorna la cantidad de filas afectadas después del update

		echo $validate;


	}



















}



//Por recomendaciones de estandar, en archivos de solo php, es recomendable no cerrar la etiqueta de php ?>