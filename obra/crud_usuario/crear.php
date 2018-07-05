<?php 
require_once '../db_config.php'; 

if($_POST)
{
	$nombre=$_POST['nombre']; 
	$password=$_POST['password'];
	$tipo=$_POST['tipo']; 
	

try{ 
	$stmt=$db_con->prepare("INSERT INTO usuario(nombre, password, tipo)VALUES( '$nombre', '$password', '$tipo')"); 

if($stmt->execute())
{ 

}
else{
	echo "Ocurrio un problema";
}
}
catch(PDOException $e){
	echo $e->getMessage();
}
}
?>