<?php 
header('Content-Type: application/json');
require_once '../db_config.php';
//if($_POST['folio'])
//{
//$id = $_POST['folio']; 
$stmt=$db_con->prepare("SELECT folio,concepto,costo FROM avance_insumo WHERE folio=:id");
$stmt->execute(array(':id'=>$id)); 

$result = $mysqli->query($stmt);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

print json_encode($data);
//}
?>