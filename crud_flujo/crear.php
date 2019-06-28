<?php 
require_once '../db_config.php'; 
if($_POST)
{
$descripcion=$_POST['descripcion']; 
try{ 
$stmt=$db_con->prepare("INSERT INTO catalogo_flujo(descripcion)
VALUES('$descripcion')"); 
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