<?php 
require_once '../db_config.php'; 

if($_POST)
{
$id = $_POST['id']; 
$folio_orden=$_POST['folio_orden']; 
$tipo_insumo=$_POST['tipo_insumo'];  
$descripcion=$_POST['descripcion']; 
$unidad=$_POST['unidad']; 
$cantidad=$_POST['cantidad']; 
$precio_unitario = $_POST['precio_unitario'];
$importe=$_POST['importe']; 
$cantidad_real=$_POST['cantidad_real']; 
$precio_real=$_POST['precio_real']; 
$importe_real=$_POST['importe_real']; 	
	
try{ 
	$stmt=$db_con->prepare("UPDATE lista SET
	folio_orden = '$folio_orden', 
	tipo_insumo = '$tipo_insumo',
	descripcion = '$descripcion',
	unidad = '$unidad',
	cantidad = '$cantidad',
	precio_unitario = '$precio_unitario', 
	importe = '$importe',
	cantidad_real = '$cantidad_real',
	precio_real = '$precio_real',
	importe_real = '$importe_real'
	WHERE 
	id='$id'"); 

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