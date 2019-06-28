<?php 
require_once '../db_config.php'; 

if($_POST)
{
$id = $_POST['id']; 
$vista =$_POST['vista']; 
try{ 
$stmt=$db_con->prepare("INSERT INTO permiso(usuario,vista)VALUES($id,$vista)"); 
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