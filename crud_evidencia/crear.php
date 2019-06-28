<?php 
require_once '../db_config.php'; 

if($_POST)
{
	$folio_orden=$_POST['folio']; 
	$descripcion=$_POST['descripcion'];
	$costo=$_POST['costo']; 
	
try{ 
	$stmt=$db_con->prepare("INSERT INTO renta(folio_orden, descripcion, costo)VALUES('$folio_orden', '$descripcion', '$costo')"); 

if($stmt->execute())
{ 
header("Refresh: 1; http://cedeg.mx/iisac/renta_index.php"); 
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