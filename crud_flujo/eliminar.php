<?php
include_once '../db_config.php';
if($_POST['del_id'])
{
$id = $_POST['del_id']; 
$stmt=$db_con->prepare("DELETE FROM catalogo_flujo WHERE id=:id");
$stmt->execute(array(':id'=>$id)); 
}
?>