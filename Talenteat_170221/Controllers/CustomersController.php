<?php 


require_once 'Models/CustomerModel.php';
/**
 * 
 */
class CustomersController extends CustomerModel
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
		echo "<script> window.location='customers' </script>";
	}

	

	public function renderCustomer(){
		$obj_Customer = self::getCustomer();
		//echo var_dump($obj_Customer);		
		
		include_once 'Views/Modules/customers/index.php';

		
	}

	//Agregar
	public function addCustomer($nombre, $apellido, $correo, $telefono, $fecha_creado, $status){

	$this->cli_nombre = $nombre;
	$this->cli_apellido = $apellido;
	$this->cli_correo = $correo;
	$this->cli_telefono = $telefono;
	$this->cli_fecha_creado = $fecha_creado;
	$this->cli_status = $status;
	parent::addCustomerM();
	$this->redirect();

		//inserto el array en las variables del modelo mediante getters y setters, y una vez cargada la información, inserto.
	}

	//Actualizar
	public function updateCustomer($id, $nombre, $apellido, $correo, $telefono, $fecha_modificado, $status){

	$this->cli_id = $id;
	$this->cli_nombre = $nombre;
	$this->cli_apellido = $apellido;
	$this->cli_correo = $correo;
	$this->cli_telefono = $telefono;
	$this->cli_fecha_modificado = $fecha_modificado;
	$this->cli_status = $status;
	parent::updateCustomerM();
	$this->redirect();

	}

	public function deleteCustomer($id){
		$this->id = $id;
		$this->deleteCustomerM();
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
if(isset($_GET['dir']) && $_GET['dir'] == 'customers' && empty($_POST) )
{
	$startCustomer = new CustomersController();
	$startCustomer->renderCustomer();
}


if(isset($_POST['exe']) && $_POST['exe']=='add') {
	
		//echo 'En la Zona! ejecutado post!'.$_POST['nombre'].'<br>';
	date_default_timezone_set('America/Bogota'); // Establece la zona horaria.

	$startCustomer = new CustomersController();
	$startCustomer->addCustomer( //aquí se podría recorrer el post y se guarda en array associativo
		$_POST['nombre'],
		$_POST['apellido'],
		$_POST['correo'],
		$_POST['telefono'],	
		date('Y-m-d H:i:s'),//Fecha actual
		$_POST['status']
	);
}

if(isset($_POST['exe']) && $_POST['exe']=='update'){ // El de insertar también tiene validación de todas las post
	//if((isset($_POST['nombre']) && !empty($_POST['nombre'])) && isset($_POST['correo']) && isset($_POST['telefono']) && isset($_POST['direccion'])             ){//Se deben testear todas las post, aunque si no entra es obvio que falta unas post por enviar, no debe ser tan necesario si enviamos update, el form que las debería tener.
		date_default_timezone_set('America/Bogota');

		$startCustomer = new CustomersController();
		$startCustomer->updateCustomer(
		$_POST['id'],
		$_POST['nombre'],
		$_POST['apellido'],
		$_POST['correo'],
		$_POST['telefono'],
		date('Y-m-d H:i:s'),//Fecha actual en la que se realiza la acción de modificar
		$_POST['status']
		);
	// }else{
	// 	echo 'Ha ocurrido un error al recibir post de update';
	// }
}

if(isset($_POST['ajax']) && $_POST['ajax']=='softdelete' ){
	$startCustomer = new CustomersController();
	$startCustomer->deleteCustomer($_POST['id']);
}





/* Este código solo se aplicará para editar en un nuevo archivo, e igualmente se acompañará con envío post, el array solo es para indicar q es una página aparte.
if(isset($array_url[1]) && $array_url[1]=="edit" && isset($array_url[2])){
	echo "Se está actualizando con el id: ".$array_url[2];

}*/








