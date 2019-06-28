<?php 
require_once '../db_config.php'; 

if($_POST)
{
  $id=$_POST['id'];
  $folio=$_POST['folio']; 
  $cantidad=$_POST['cantidad']; 
  $fecha = $_POST['fecha'];  
  $hora = $_POST['hora'];
  $reporte = $_POST['reporte'];  
  $usuario = $_POST['usuario']; 


  try{
  $stmt=$db_con->prepare("INSERT INTO bitacora_presupuesto_suma(folio_orden,usuario,fecha,hora,accion,cantidad)VALUES('$folio','$usuario','$fecha','$hora','SUMAR','$cantidad')"); 


  $stmt2=$db_con->prepare("INSERT INTO bitacora_obra(folio_orden,usuario,fecha,hora,reporte,accion)VALUES('$folio','$usuario','$fecha','$hora','$reporte','EDITAR')"); 

  
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