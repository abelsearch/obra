<?php
require_once '../db_config.php';
if($_POST)
{
	$emp=$_POST['emp'];
	$nombre=$_POST['nombre'];
	$fecha=$_POST['fecha']; 
	$usuario=$_POST['usuario'];
	
try{
$stmt=$db_con->prepare("INSERT INTO proyecto(id_emp,nombre,fecha,usuario)VALUES('$emp','$nombre','$fecha','$usuario')");

if($stmt->execute())
{
header("Refresh: 1; http://seicolaguna.com/sistema/proyecto_index.php");
}
else{
echo "Ocurrio un problema al insertar el Proveedor!!!";
}
}
catch(PDOException $e){
	echo $e->getMessage();
}
}
?>