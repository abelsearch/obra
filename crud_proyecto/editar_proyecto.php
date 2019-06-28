<?php 
require_once '../db_config.php'; 
if($_POST)
{
$id=$_POST['id']; 
$nombre=$_POST['nombre'];
try{ 
$stmt=$db_con->prepare("UPDATE proyecto SET  nombre = '$nombre' WHERE id='$id'"); 
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