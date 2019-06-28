<?php
require_once '../db_config.php';
 
if($_POST)
{ 
$folio = $_POST['folio_orden']; 
$tipo_gasto = $_POST['tipo_gasto']; 
$descripcion = $_POST['descripcion'];  
$cantidad = $_POST['cantidad']; 
$estado = $_POST['estado'];  
$fecha = $_POST['fecha']; 
$hora = $_POST['hora'];  
$usuario = $_POST['usuario'];  




try{
$stmt=$db_con->prepare("INSERT INTO flujo(folio_orden,tipo_gasto,descripcion,cantidad,estado,fecha,hora)
	VALUES('$folio','$tipo_gasto','$descripcion','$cantidad','$estado','$fecha','$hora')"); 

$stmt2=$db_con->prepare("INSERT INTO bitacora_orden(folio_orden,usuario,fecha,hora,reporte,accion)VALUES('$folio','$usuario','$fecha','$hora','$descripcion','FLUJO')"); 

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