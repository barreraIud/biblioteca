<?php 

/**
 * 
 */
require_once 'Config/db_connection/Connection.php'; //solo lo llama si no ha sido invicado.


class RolModel extends Connection
{
	//pendiente pasar las variables protegidas a privadas con metodos públicos getters y setters.
	protected $rol_id;
            protected $rol_nombre;
	protected $rol_fecha_creado;
	protected $rol_fecha_modificado;
            protected $rol_status;
	protected $connect;
	
	function getRolM() //v1
	{		
		$conn = (new Connection())->startConnection();
		$sql = 'SELECT * FROM roles' ;
		$exe = $conn->prepare($sql);
		$exe->execute();
		$getRol_response = $exe->FetchALL(PDO::FETCH_OBJ); //me devuelve un array de objetos del volcado de prepare
		//return $getRol_response
		return $getRol_response;
                        
	}
            
        
        

	
	function addRolM(){           
                       try {
		$conn = (new Connection())->startConnection();
		$sql = 'INSERT INTO roles 
                       (rol_nombre, rol_fecha_creado, rol_status) 
		values (:nombre, :fecha_creado, :status)';
		$exe = $conn->prepare($sql);
		$exe->bindParam(':nombre', $this->rol_nombre);
		$exe->bindParam(':fecha_creado', $this->rol_fecha_creado);
                	$exe->bindParam(':status', $this->rol_status);
                       $validate = $exe->execute();

		if($validate){
			echo "Ingresado correctamente!, devolvió: ".$validate;
		}else {
			echo "Ha ocurrido un error al ejecutar, revisa la consulta!, devolvió: false".var_dump($this->rol_status);
		}
		return $validate;

		} catch (Exception $e) {
			die("Error RolModel->add v3 : ".$e->getMessage());
		}

	}


	protected function updateRolM(){
	try{

		echo "ENTRAMOS UPDATE!";
		$conn = (new Connection())->startConnection();
		$sql = "UPDATE roles
				SET rol_nombre = :nombre, 
				rol_fecha_modificado = :fecha_modificado, 
				rol_status = :status
				WHERE rol_id = :id";

		$exe = $conn->prepare($sql);
		$exe->bindParam(':nombre', $this->rol_nombre);
		$exe->bindParam(':fecha_modificado', $this->rol_fecha_modificado);
		$exe->bindParam(':status', $this->rol_status);
		$exe->bindParam(':id', $this->rol_id);
		$exe->execute();

		if($validate){
			echo "Actualizado correctamente!, devolvió: ".$validate;
		}else {
			echo "Ha ocurrido un error al ejecutar Actualizar, revisa la consulta y su ejecución!, devolvió: false".var_dump($this->rol_status);

		}
		return $validate;

		} catch (Exception $e) {
			die("Error SupplierModel->update v1 : ".$e->getMessage());
		}


	}
        Protected function deleteRolM(){
		$conn = (new Connection())->startConnection();
		$sql = "UPDATE roles
				SET rol_status=0
				WHERE rol_id=? AND rol_status='1'";
		$exe = $conn->prepare($sql);
		$exe->bindParam(1, $this->id);

		$exe->execute();
		$validate = $exe->rowCount(); //retorna la cantidad de filas afectadas después del update

		echo $validate;


	}





}




 ?>