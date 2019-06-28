<?php
require_once '../db_config.php';
 
if($_POST)
{ 
$folio = $_POST['folio']; 
$descripcion = $_POST['descripcion'];  
$precio = $_POST['precio']; 
$fecha = $_POST['fecha'];  
$hora = $_POST['hora'];
$reporte = $_POST['reporte'];
$usuario = $_POST['usuario'];

try{
$stmt=$db_con->prepare("INSERT INTO extra(folio_orden,descripcion,precio,fecha,hora)
	VALUES('$folio','$descripcion','$precio','$fecha','$hora')"); 

$stmt2=$db_con->prepare("INSERT INTO bitacora_orden(folio_orden,usuario,fecha,hora,reporte,accion)VALUES('$folio','$usuario','$fecha','$hora','$reporte','EXTRA')"); 

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