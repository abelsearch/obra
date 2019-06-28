<?php 
require_once '../db_config.php'; 
if($_POST)
{
$clave=$_POST['clave']; 
try{ 
$stmt=$db_con->prepare("INSERT INTO clave(clave)
VALUES('$clave')"); 
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