<?php
include_once '../db_config.php';

if($_POST['del_id'])
{
$id = $_POST['del_id']; 
$stmt=$db_con->prepare("UPDATE cotizacion SET estado = 'CANCELADA'  WHERE id=:id");
$stmt->execute(array(':id'=>$id)); 
}
?>