<?php 
require_once '../db_config.php'; 
if($_POST)
{
$id=$_POST['id'];
$descripcion=$_POST['descripcion']; 
try{ 
$stmt=$db_con->prepare("UPDATE catalogo_flujo SET descripcion = '$descripcion' WHERE id='$id'"); 
if($stmt->execute())
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