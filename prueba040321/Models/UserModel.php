<?php 

/**
 * 
 */
require_once 'Config/db_connection/Connection.php'; //solo lo llama si no ha sido invicado.


class UserModel extends Connection
{
	//pendiente pasar las variables protegidas a privadas con metodos públicos getters y setters.
	protected $usu_id;
            protected $usu_nombre;
	protected $usu_apellido;
	protected $usu_alias;
	protected $usu_pass;
	protected $usu_foto_ruta;
	protected $usu_foto_nombre;
            protected $usu_fecha_creado;
            protected $usu_fecha_modificado;
            protected $usu_status;
            protected $usu_rol_id;
        
	protected $connect;
	
	function getUserM() //v1
	{		
		$conn = (new Connection())->startConnection();
		$sql = "SELECT usuarios.usu_id, usuarios.usu_nombre, usuarios.usu_apellido, usuarios.usu_alias, 
usuarios.usu_pass, usuarios.usu_foto_ruta , usuarios.usu_foto_nombre, usuarios.usu_fecha_creado,
usuarios.usu_fecha_modificado, usuarios.usu_fecha_login, usuarios.usu_status, roles.rol_id, 
roles.rol_nombre FROM usuarios
INNER JOIN roles ON usuarios.usu_rol_id=roles.rol_id
ORDER BY usuarios.usu_nombre";
		$exe = $conn->prepare($sql);
		$exe->execute();
		$getUser_response = $exe->FetchALL(PDO::FETCH_OBJ); //me devuelve un array de objetos del volcado de prepare
		//return $getUser_response
		return $getUser_response;
                        
	}
            
        
        

	
	function addUserM(){           
                       try {
		$conn = (new Connection())->startConnection();
		$sql = 'INSERT INTO usuarios 
                       (usu_nombre, usu_apellido, usu_alias, usu_pass, usu_foto_ruta, usu_foto_nombre, usu_fecha_creado, usu_status, usu_rol_id) 
		values (:nombre, :apellido, :alias, :password, :foto_ruta, :foto_nombre, :fecha_creado, :status, :fk_rol_id)';
		$exe = $conn->prepare($sql);
		$exe->bindParam(':nombre', $this->usu_nombre);
		$exe->bindParam(':apellido', $this->usu_apellido);
		$exe->bindParam(':alias', $this->usu_alias);
		$exe->bindParam(':password', $this->usu_pass);
		$exe->bindParam(':foto_ruta', $this->usu_foto_ruta);
		$exe->bindParam(':foto_nombre', $this->usu_foto_nombre);
		$exe->bindParam(':fecha_creado', $this->usu_fecha_creado);
                	$exe->bindParam(':status', $this->usu_status);
                       $exe->bindParam(':fk_rol_id', $this->usu_rol_id);
                       $validate = $exe->execute();

		if($validate){
			echo "Ingresado correctamente!, devolvió: ".$validate;
		}else {
			echo "Ha ocurrido un error al ejecutar, revisa la consulta!, devolvió: false".var_dump($this->usu_status);
		}
		return $validate;

		} catch (Exception $e) {
			die("Error UserModel->add v3 : ".$e->getMessage());
		}

	}


	protected function updateUsersM(){
	try{

		echo "ENTRAMOS UPDATE!";
		$conn = (new Connection())->startConnection();
		$sql = "UPDATE usuarios
				SET usu_nombre = :nombre, 
				usu_apellido = :apellido, 
				usu_alias = :alias, 
				usu_pass = :password,
				usu_foto_ruta = :fotoRuta,
				usu_foto_nombre = :fotoNombre,
				prv_fecha_modificado = :fecha_modificado, 
				prv_status = :status
				WHERE usu_id = :id";

		$exe = $conn->prepare($sql);
		$exe->bindParam(':nombre', $this->usu_nombre);
		$exe->bindParam(':apellido', $this->usu_apellido);
		$exe->bindParam(':alias', $this->usu_alias);
		$exe->bindParam(':password', $this->usu_pass);
		$exe->bindParam(':fotoRuta', $this->usu_foto_ruta);
		$exe->bindParam(':fotoNombre', $this->usu_foto_nombre);
		$exe->bindParam(':fecha_modificado', $this->usu_fecha_modificado);
		$exe->bindParam(':status', $this->usu_status);
		$exe->bindParam(':id', $this->usu_id);
		$exe->execute();

		if($validate){
			echo "Actualizado correctamente!, devolvió: ".$validate;
		}else {
			echo "Ha ocurrido un error al ejecutar Actualizar, revisa la consulta y su ejecución!, devolvió: false".var_dump($this->usu_status);

		}
		return $validate;

		} catch (Exception $e) {
			die("Error SupplierModel->update v1 : ".$e->getMessage());
		}


	}
        Protected function deleteUserM(){
		$conn = (new Connection())->startConnection();
		$sql = "UPDATE usuarios
				SET usu_status=0
				WHERE usu_id=? AND usu_status='1'";
		$exe = $conn->prepare($sql);
		$exe->bindParam(1, $this->id);

		$exe->execute();
		$validate = $exe->rowCount(); //retorna la cantidad de filas afectadas después del update

		echo $validate;


	}





}




 ?>