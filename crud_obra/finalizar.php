<?php
require_once '../db_config.php';
 
if($_POST)
{ 
	
	$folio=$_POST['folio'];  

	
	
	$stmt=$db_con->prepare("UPDATE orden SET estado = 'TERMINADA' WHERE folio=:folio"); 

	$stmt2=$db_con->prepare("UPDATE cotizacion SET estado='TERMINADA' WHERE folio_orden=:folio"); 

if($stmt->execute())
{
	echo "Listo!!!";
}
else{
	echo "Query Problem";
}

if($stmt2->execute())
{
	echo "Orden Aceptada!!!";
}
else{
	echo "Query Problem";
}


}
?>