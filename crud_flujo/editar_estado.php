<?php 
require_once '../db_config.php'; 

if($_POST)
{
$id = $_POST['id']; 
$folio = $_POST['folio'];
$estado =$_POST['estado']; 
$usuario = $_POST['usuario'];    
$fecha = $_POST['fecha'];  
$hora = $_POST['hora'];
 
try{ 
$stmt=$db_con->prepare("UPDATE flujo SET estado = '$estado' WHERE id='$id'");  

$stmt2=$db_con->prepare("INSERT INTO bitacora_orden(folio_orden,usuario,fecha,hora,reporte,accion)VALUES('$folio','$usuario','$fecha','$hora','$estado','FLUJO/EDITAR')");

if($stmt->execute())
{
	echo "OK"; 
}
else{
	echo "Ocurrio un problema";
}

if($stmt2->execute())
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