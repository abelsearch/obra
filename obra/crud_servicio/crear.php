<?php 
require_once '../db_config.php'; 

if($_POST)
{
	$clave_sat=$_POST['clave_sat']; 
	$clave_interna=$_POST['clave_interna'];
	$descripcion=$_POST['descripcion']; 
	$precio=$_POST['precio']; 
	$medida=$_POST['medida']; 
	

try{ 
	$stmt=$db_con->prepare("INSERT INTO servicio(
	clave_sat, 
	clave_interna,
	descripcion,
	precio,
	medida
	)VALUES( 
	'$clave_sat', 
	'$clave_interna',
	'$descripcion',
	'$precio',
	'$medida'
	)"); 

if($stmt->execute())
{
	//header("Refresh:0"); 
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