<?php 
require_once '../db_config.php'; 

if($_POST)
{
$id = $_POST['id']; 
$vista =$_POST['vista']; 
$stmt=$db_con->prepare("DELETE FROM permiso WHERE usuario=:id AND vista=$vista)"); 
$stmt->execute(array(':id'=>$id));


}
?>