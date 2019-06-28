<?php 
require_once '../db_config.php'; 

if($_POST)
{
$clave=$_POST['clave']; 
$nombre=$_POST['nombre'];
$paterno=$_POST['paterno']; 
$materno=$_POST['materno']; 
$nacimiento=$_POST['nacimiento'];
$tipo=$_POST['tipo']; 
$nombreu=$_POST['nombreu']; 
$correo=$_POST['correo'];
$telefono=$_POST['telefono']; 
$depto=$_POST['depto']; 
$password=$_POST['password'];
$tipo=$_POST['tipo']; 
$fecha=$_POST['fecha'];
$hora=$_POST['hora']; 

$hash=password_hash($password, PASSWORD_DEFAULT);
	
try{ 
	$stmt=$db_con->prepare("INSERT INTO usuario(clave, nombre, paterno, materno, fecha_nac, nombre_usuario, 
		correo, telefono, departamento, password, hash, tipo, fecha, hora)
		VALUES('$clave', '$nombre', '$paterno','$materno', '$nacimiento', '$nombreu', 
		'$correo', '$telefono', '$depto', '$password', '$hash', '$tipo', '$fecha', '$hora')"); 

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