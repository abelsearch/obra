<?php
require_once '../db_config.php';
 
if($_POST)
{   
$cotizacion=$_POST['cotizacion'];
$folio=$_POST['folio'];
$servicio=$_POST['servicio']; 
$presupuesto=$_POST['presupuesto'];  
$gasto=$_POST['gasto']; 
$cliente=$_POST['cliente']; 

$stmt=$db_con->prepare("INSERT INTO cotizacion(folio_cot,folio_orden,servicio,presupuesto,gasto,cliente)VALUES('$cotizacion','$folio','$servicio','$presupuesto','$gasto','$cliente')"); 


if($stmt->execute())
{
	echo "Cotizacion creada!!!";
}
else{
	echo "Query Problem";
}

}
?>