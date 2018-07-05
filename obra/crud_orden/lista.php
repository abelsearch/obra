<?php
require_once '../db_config.php';
 
if($_POST)
{ 
$folio_orden = $_POST['folio_orden']; 
$tipo_insumo = $_POST['tipo_insumo']; 
$descripcion = $_POST['descripcion'];  
$unidad = $_POST['unidad'];
$cantidad = $_POST['cantidad']; 
$precio_unitario = $_POST['precio_unitario']; 
$precio_iva = $_POST['precio_iva'];  
$total = $_POST['total'];  

$stmt=$db_con->prepare("INSERT INTO lista(folio_orden,tipo_insumo,descripcion,unidad,cantidad,precio_unitario,precio_iva,total)
	VALUES('$folio_orden','$tipo_insumo','$descripcion','$unidad','$cantidad','$precio_unitario','$precio_iva','$total')"); 

if($stmt->execute())
{ 
//header("http://127.0.0.1/PHP-AJAX/orden_index.php"); 
}
else{
echo "Query Problem";
}
}
?>