<?php 

/**
 * 
 */

require_once 'Models/UserModel.php';

class UsersController extends UserModel
{
        
	function __construct()
	{
		# code...
	}
        
	public function redirect(){		
		//header("location: http://localhost/projects/%5b1%5d%20Interacpedia/15474_vanilla/v1/users"); 
		//Tengo un error de que no puedo modificar headers porque ya han sido enviados, esto por mezclar html o espacios antes o después de cerrar tag php
		//poner todo el html en un echo sería tedioso, y podría habilitar el buffer de salida "ob_start(); <elcódigo> ob_end_flush();" que apaga esta validación, pero no siempre uno tendrá el acceso a servidor
		//ya que el server puede bloquear o no permitir esta característica, en este caso se usa javscript para resolver el problema.
		echo "<script> window.location='users' </script>";
	}
        
            
	public function renderUser(){//v1
		//objeto de datos que retornemos del modelo para meter en la vista. ej $obj=$this->methodShow();
		//se guarda en una variable que llamaremos en la vista cuando recorramos sus datos.

		$obj_users = self::getUserM();	//atención con el self que toma esta clase y no la padre, en caso de que exista ese mismo método aquí se sobreescribe!		
//		var_dump($obj_users);		
		require_once 'Views/Modules/Users/index.php';

            }
//Agregar
            public function addUser($nombre, $apellido, $alias, $password, $foto_ruta, $foto_nombre, $fechaCreado, $status){

	$this->usu_nombre = $nombre;
	$this->usu_apellido = $apellido;
	$this->usu_alias = $alias;
	$this->usu_pass= $password;
	$this->usu_pass= $foto_ruta;
	$this->usu_pass= $foto_nombre;
	$this->usu_fecha_creado = $fechaCreado;
	$this->usu_status = $status;
           parent::addUserM();
	$this->redirect();

		//inserto el array en las variables del modelo mediante getters y setters, y una vez cargada la información, inserto.
	}
	public function UpdateUserSet($nombre, $apellido, $alias, $password, $fotoRuta, $fotoNombre, $fechaCreado, $status)//v1 pasar variables al modelo para que las cargue en sus atributos
	{//deberíamos poner métodos donde se purifique los post y get por seguridad.
		$this->usu_nombre = $nombre;
		$this->usu_apellido = $apellido;
		$this->usu_alias = $alias;
		$this->usu_pass = $password;
		$this->usu_foto_ruta = $fotoRuta;
		$this->usu_foto_ruta = $fotoNombre;
		$this->usu_foto_ruta = $fechaCreado;
		$this->usu_status = $status;
		parent::updateUsersM();
                       $this->redirect();
                
	}
        
        public function deleteUser($id){
		$this->id = $id;
		$this->deleteUserM();
		//$this->redirect(); //Como mandé el post por ajax no necesito el redirect.
	}

}



if(isset($_GET['dir']) && $_GET['dir'] == 'users' )
{
    $startUser = new UsersController();
    if (empty($_POST)) {        
        $startUser->renderUser();
    }else {
        $startUser->getUserM();
    }
    
}
 
if(isset($_POST['exe']) && $_POST['exe']=='add')    {//v1 default acción
		
    
            date_default_timezone_set('America/Bogota'); 
            $startUser= new UsersController();
	$startUser->addUser( //nota: con un row Count()>0 deberíamos tomarlo como que si agregó. ya que el método prepare() devuelve TRUE en caso de éxito o FALSE en caso de error.
		$_POST['nombre'],
		$_POST['apellido'],
		$_POST['alias'],
		$_POST['password'],
		$_POST['foto_ruta'],
		$_POST['foto_nombre'],
		date('Y-m-d H:i:s'),//Fecha actual
		$_POST['status']      
               	);
}
        if (isset($_POST['exe']) && $_POST['exe'] == 'update') { // El de insertar también tiene validación de todas las post
        //if((isset($_POST['nombre']) && !empty($_POST['nombre'])) && isset($_POST['correo']) && isset($_POST['telefono']) && isset($_POST['direccion'])             ){//Se deben testear todas las post, aunque si no entra es obvio que falta unas post por enviar, no debe ser tan necesario si enviamos update, el form que las debería tener.
        date_default_timezone_set('America/Bogota');

        $startUser = new UsersController();
        $startUser->UpdateUserSet(
                $_POST['nombre'],
                $_POST['apellido'],
                $_POST['alias'],
                $_POST['password'],
                $_POST['fotoRuta'],
                $_POST['fotoNombre'],
                date('Y-m-d H:i:s'), //Fecha actual en la que se realiza la acción de modificar
                $_POST['status']                
                );
        // }else{
        // 	echo 'Ha ocurrido un error al recibir post de update';
        // }
    }


if(isset($_POST['ajax']) && $_POST['ajax']=='softdelete' ){
	$startUser = new UsersController();
	$startUser->deleteUser($_POST['id']);
}




 ?>