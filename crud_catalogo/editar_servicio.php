<?php 
require_once '../db_config.php'; 
if($_POST)
{
$id=$_POST['id']; 
$partida=$_POST['partida'];
$descripcion=$_POST['descripcion'];  
$medida=$_POST['medida']; 
try{ 
$stmt=$db_con->prepare("UPDATE catalogo_concepto SET  partida = '$partida', descripcion = '$descripcion', medida = '$medida' WHERE id='$id'"); 
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