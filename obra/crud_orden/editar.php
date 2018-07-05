<?php 
require_once '../db_config.php'; 

if($_POST)
{
  $id=$_POST['id'];
  $folio=$_POST['folio']; 
  $cliente=$_POST['cliente'];
  $servicio=$_POST['servicio']; 
  $presupuesto=$_POST['presupuesto']; 
  

try{ 
  $stmt=$db_con->prepare("UPDATE orden SET
  folio = '$folio', 
  cliente = '$cliente',
  servicio = '$servicio',
  presupuesto = '$presupuesto'
  WHERE 
  id='$id'"); 

if($stmt->execute())
{
  //header("Refresh:0"); 
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