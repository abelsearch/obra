<?php
include_once '../db_config.php';
if($_POST['edit_id'])
{
$id = $_POST['edit_id'];  
$stmt0=$db_con->prepare("SELECT * FROM salida_insumo WHERE id=:id");
if($stmt0->execute(array(':id'=>$id)))
{
	while($row=$stmt0->fetch(PDO::FETCH_ASSOC)){ 
	$folio = $row['folio_orden'];	
	$cantidad = $row['cantidad']; 
	$id_insumo = $row['id_insumo'];
	
}


$stmt=$db_con->prepare("UPDATE salida_insumo SET estatus = 'PENDIENTE'  WHERE id=:id");
$stmt->execute(array(':id'=>$id)); 

$stmt2=$db_con->prepare("UPDATE catalogo_insumo SET salidas=salidas-$cantidad, stock=stock+$cantidad WHERE id = '$id_insumo'"); 
$stmt2->execute(); 




/**
$stmt2=$db_con->prepare("DELETE FROM avance_insumo WHERE insumo=:id");
$stmt2->execute(array(':id'=>$id));    

$stmt3=$db_con->prepare("UPDATE semana SET insumo=insumo-'$importe_real' WHERE folio = '$folio' AND num_semana = '$semana'"); 
$stmt3->execute(); 

$stmt4=$db_con->prepare("UPDATE obra SET gasto=gasto-'$importe_real' WHERE folio = '$folio'"); 
$stmt4->execute();

*/
}

}
?>