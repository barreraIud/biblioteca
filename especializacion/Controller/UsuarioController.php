<?php
include('../Model/clsUsuario.php');

$id = $_POST['id'];
$nombre = $_POST['nombre'];

$usuario = new Usuario($id,$nombre);

if($_POST['Registrar']){
	$result = $usuario->Guardar();
	if($result){
		echo '<script type="text/javascript">
				alert("Registro guardado con éxito");
				window.location.href="../View/Usuario.php";
				</script>';
	}else{
		echo '<script type="text/javascript">
				alert("Error Guardando usuario");
				window.location.href="../View/Usuario.php";
				</script>';
	}

}else if($_POST['Eliminar']){
	$result = $usuario->Eliminar();
	if($result){
		echo '<script type="text/javascript">
				alert("Registro eliminado con éxito");
				window.location.href="../View/Usuario.php";
				</script>';
	}else{
		echo '<script type="text/javascript">
				alert("Error eliminando usuario");
				window.location.href="../View/Usuario.php";
				</script>';
	}
}else if($_POST['Consultar']){
	$result = $usuario->Consultar();
	if($result){
		header("Location: ../View/Usuario.php?id=".$result[0]."&nombre=".$result[1]);
	}else{
		echo '<script type="text/javascript">
				alert("Usuario no existe");
				window.location.href="../View/Usuario.php";
				</script>';
	}
}


?>