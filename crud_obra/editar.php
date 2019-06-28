<?php
require_once '../db_config.php';
if($_POST)
{
$folio=$_POST['folio'];
$cliente=$_POST['cliente'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$reporte = $_POST['reporte'];
$usuario = $_POST['usuario'];
//try{
$stmt=$db_con->prepare("UPDATE obra SET cliente = '$cliente' WHERE folio='$folio'"); 

$stmt2=$db_con->prepare("INSERT INTO bitacora_obra(folio_orden,usuario,fecha,hora,reporte,accion)VALUES('$folio','$usuario','$fecha','$hora','$reporte','ORDEN EDITADA')");

if($stmt->execute())
{
echo "OK";
}
else{
echo "Problemas al editar Obra!!!";
}
if($stmt2->execute())
{
echo "OK";
}
else{
echo "Problemas al crear Bitacora!!!";
}
//}
//catch(PDOException $e){
//echo $e->getMessage();
//}
}
?>