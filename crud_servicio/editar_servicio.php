<?php 
require_once '../db_config.php'; 

if($_POST)
{
	$id=$_POST['id'];
	$clave_sat=$_POST['clave_sat']; 
	$clave_interna=$_POST['clave_interna'];
	$descripcion=$_POST['descripcion']; 
	$precio=$_POST['precio']; 
	$medida=$_POST['medida']; 
	

try{ 
	$stmt=$db_con->prepare("UPDATE concepto SET
	clave_sat = '$clave_sat', 
	clave_interna = '$clave_interna',
	descripcion = '$descripcion',
	precio = '$precio',
	medida = '$medida'
	WHERE 
	id='$id'"); 

if($stmt->execute())
{
	//header("Refresh:0"); 
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