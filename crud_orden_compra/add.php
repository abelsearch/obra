<?php
include_once '../db_config.php';
if($_POST['add_id'])
{
$id = $_POST['add_id']; 
$cantidad = $_POST['cantidad'];  
$hora = $_POST['hora']; 

$stmt0=$db_con->prepare("SELECT i.id_orden,i.insumo,i.fecha,c.folio,c.estatus FROM orden_insumo i JOIN orden_compra c ON i.id_orden=c.id WHERE i.id=:id");
if($stmt0->execute(array(':id'=>$id)))
{
	while($row=$stmt0->fetch(PDO::FETCH_ASSOC)){ 
	$id_orden = $row['id_orden'];	
	$insumo = $row['insumo'];  
	$fecha = $row['fecha']; 
	$folio = $row['folio']; 
	$estatus = $row['estatus'];
	
}

$stmt=$db_con->prepare("INSERT INTO salida_insumo(folio,id_insumo,nombre_insumo,unidad,cantidad,
	num_semana,estatus,fecha,hora)VALUES('$folio','$id','$insumo','$unidad','$cantidad',1,'$estatus','$fecha',
	'$hora')");
$stmt->execute(array(':id'=>$id)); 


$stmt2=$db_con->prepare("UPDATE orden_insumo SET cantidad=$cantidad WHERE id = '$id'"); 
$stmt2->execute(); 

/*$stmt3=$db_con->prepare("INSERT INTO avance_insumo (concepto, costo, fecha, folio, num_semana)  
SELECT  tipo_insumo, importe_real, fecha, folio_orden, num_semana FROM lista_insumo WHERE id=:id");
$stmt3->execute(array(':id'=>$id));*/   

/*$stmt4=$db_con->prepare("UPDATE semana SET insumo=insumo+'$importe_real' WHERE folio = '$folio' AND num_semana = '$semana'"); 
$stmt4->execute();

$stmt5=$db_con->prepare("UPDATE obra SET gasto=gasto+'$importe_real' WHERE folio = '$folio'"); 
$stmt5->execute();

*/
}
}
?>