<?php 
require_once '../db_config.php'; 
if($_POST)
{ 
$nombre=$_POST['nombre'];
$m2    =$_POST['m2'];
$fecha=$_POST['fecha']; 

try{ 
$stmt=$db_con->prepare("INSERT INTO modelo(id,id_empresa,titulo,m2,fecha)
VALUES('','1','$nombre','$m2','$fecha')"); 
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