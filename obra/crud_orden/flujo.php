<?php
require_once '../db_config.php';
 
if($_POST)
{ 
$folio_orden = $_POST['folio_orden']; 
$tipo_gasto = $_POST['tipo_gasto']; 
$descripcion = $_POST['descripcion'];  
$cantidad = $_POST['cantidad']; 
$estatus = $_POST['estatus'];  

$stmt=$db_con->prepare("INSERT INTO flujo(folio_orden,tipo_gasto,descripcion,cantidad,estatus)
	VALUES('$folio_orden','$tipo_gasto','$descripcion','$cantidad','$estatus')"); 

if($stmt->execute())
{ 
//header("http://127.0.0.1/PHP-AJAX/orden_index.php"); 
}
else{
echo "Query Problem";
}
}
?>