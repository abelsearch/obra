<?php 
require_once '../db_config.php'; 

if($_POST)
{
$id = $_POST['id']; 
$tipo =$_POST['tipo']; 
 
try{ 
	$stmt=$db_con->prepare("UPDATE usuario SET tipo = '$tipo' WHERE id='$id'"); 

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