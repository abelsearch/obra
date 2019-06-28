<?php 
require_once '../db_config.php'; 
if($_POST)
{ 
$partida=$_POST['partida'];
$descripcion=$_POST['descripcion'];  
$medida=$_POST['medida']; 
$fecha=$_POST['fecha']; 

try{ 
$stmt=$db_con->prepare("INSERT INTO catalogo_concepto(partida,descripcion,medida,fecha)
VALUES('$partida','$descripcion','$medida','$fecha')"); 
if($stmt->execute())
{ 
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