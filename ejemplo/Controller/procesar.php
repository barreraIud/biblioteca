<?php
include("../Model/clsConexion.php");

$miconexion = new Conexion();

$miconexion->CrearConexion();

$numero = $_POST['num'];
echo $numero;
$sumar=1;
for ($i = 2; $i <= $numero; $i++) {
    if ($i % 2 == 0){
    	$sumar = $sumar - 1/$i;
    }else{
    	$sumar = $sumar + 1/$i;
    }
}
echo "El valor de la suma de la serie es ".$sumar;
?>