<?php 
require_once '../db_config.php'; 

if($_POST)
{
$id = $_POST['id']; 
$nom_usu=$_POST['nom_usu']; 
$pass=$_POST['pass'];  
$hash=password_hash($pass, PASSWORD_DEFAULT);  
try{ 
	$stmt=$db_con->prepare("UPDATE usuario SET nombre_usuario = '$nom_usu', password = '$pass', hash = '$hash'  WHERE id='$id'"); 

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