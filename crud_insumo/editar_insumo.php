<?php 
require_once '../db_config.php'; 
if($_POST)
{
$id=$_POST['id'];
$nombre=$_POST['nombre']; 
$unidad=$_POST['unidad']; 
$saldo=$_POST['saldo']; 

try{ 
$stmt=$db_con->prepare("UPDATE catalogo_insumo SET nombre = '$nombre', unidad = '$unidad', saldo_inicial = '$saldo' WHERE id='$id'"); 
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