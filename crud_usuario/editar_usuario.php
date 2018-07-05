<?php 
require_once '../db_config.php'; 

if($_POST)
{
$id = $_POST['id']; 
$nombre=$_POST['nombre']; 
$password=$_POST['password'];  
 
try{ 
	$stmt=$db_con->prepare("UPDATE usuario SET nombre = '$nombre', password = '$password' WHERE id='$id'"); 

if($stmt->execute())
{
	echo "OK"; 
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