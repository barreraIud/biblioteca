<?php 


require_once 'Models/RolModel.php';
/**
 * 
 */
class RolesController extends RolModel
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
		echo "<script> window.location='Roles' </script>";
	}

	

	public function renderRol(){
		$obj_rol = parent::getRolM();
		//echo var_dump($obj_rol);		
		
		include_once 'Views/Modules/Roles/index.php';

		
	}

	//Agregar
	public function addRol($nombre, $fecha_creado, $status){

	$this->rol_nombre = $nombre;
	$this->rol_fecha_creado = $fecha_creado;
	$this->rol_status = $status;
	parent::addRolM();
	$this->redirect();

		//inserto el array en las variables del modelo mediante getters y setters, y una vez cargada la información, inserto.
	}

	//Actualizar
        public function updateRol ($id, $nombre, $fecha_modificado, $status){
	$this->rol_id = $id;
	$this->rol_nombre = $nombre;
	$this->rol_fecha_modificado = $fecha_modificado;
	$this->rol_status = $status;
	parent::updateRolM();
	$this->redirect();
	}
        
        public function deleteRok($id){
		$this->id = $id;
		$this->deleteRolM();
		//$this->redirect(); //Como mandé el post por ajax no necesito el redirect.
	}


}



//NOTA: Por la forma de enrutamiento siempre ingresaba aquí, es una carga de datos extra
//si solo queremos usar el controlador para alguna acción diferente a mostrar!,
//por lo que se valida si se envía post, se sabe que no es para mostrar sino para una acción!
//y no va a entrar aquí.
//NOTA2: También se podría usar el vector posición 1 para tomar un parámetro que indique
//que se realizará una acción y no muestre la vista, sería casi lo mismo, solo serviría
// en caso de que sea una "sub" vista, ej: suppliers/vistasecreta y no halla post que impidan su ingreso al if de mostrar base.
if(isset($_GET['dir']) && $_GET['dir'] == 'roles' && empty($_POST) )
{
	$start = new RolesController();
	$start->renderRol();
}


if(isset($_POST['exe']) && $_POST['exe']=='add') {
	
		//echo 'En la Zona! ejecutado post!'.$_POST['nombre'].'<br>';
	date_default_timezone_set('America/Bogota'); // Establece la zona horaria.

	$start = new RolesController();
	$start->addRol( //aquí se podría recorrer el post y se guarda en array associativo
		$_POST['nombre'],
		date('Y-m-d H:i:s'),//Fecha actual
		$_POST['status']
	);
}

if(isset($_POST['exe']) && $_POST['exe']=='update'){ // El de insertar también tiene validación de todas las post
		date_default_timezone_set('America/Bogota');
		$startRol = new RolesController();
		$startRol-> updateRol (
		$_POST['id'],
		$_POST['nombre'],
                       date('Y-m-d H:i:s'),
                       $_POST['status']
		);
	// }else{
	// 	echo 'Ha ocurrido un error al recibir post de update';
	// }
}

if(isset($_POST['ajax']) && $_POST['ajax']=='softdelete' ){
	$start = new RolesController();
	$start->deleteRol($_POST['id']);
}





/* Este código solo se aplicará para editar en un nuevo archivo, e igualmente se acompañará con envío post, el array solo es para indicar q es una página aparte.
if(isset($array_url[1]) && $array_url[1]=="edit" && isset($array_url[2])){
	echo "Se está actualizando con el id: ".$array_url[2];

}*/








