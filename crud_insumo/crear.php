<?php 
require_once '../db_config.php'; 
if($_POST)
{
$nombre=$_POST['nombre']; 
$unidad=$_POST['unidad']; 
$saldo=$_POST['saldo']; 
$fecha=$_POST['fecha']; 

try{ 
$stmt=$db_con->prepare("INSERT INTO catalogo_insumo(nombre,unidad,saldo_inicial,stock,fecha)
VALUES('$nombre','$unidad','$saldo','$saldo','$fecha')"); 

if($stmt->execute())
{ 
echo "Hecho!!!";
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