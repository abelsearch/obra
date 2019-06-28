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
$fecha=$_POST['fecha']; 
$hora=$_POST['hora']; 

$stmt=$db_con->prepare("INSERT INTO cotizacion(folio_cot,folio_orden,servicio,presupuesto,gasto,cliente,fecha,hora,estado)VALUES('$cotizacion','$folio','$servicio','$presupuesto','$gasto','$cliente','$fecha','$hora','TRABAJANDO')ON DUPLICATE KEY UPDATE estado='TRABAJANDO'"); 

if($stmt->execute())
{
	echo "Cotizacion creada!!!";
}
else{
	echo "Query Problem";
}

}
?>