<?php
require_once '../db_config.php';
 
if($_POST)
{ 
$folio = $_POST['folio']; 
$descripcion = $_POST['descripcion'];  
$precio = $_POST['precio'];

$stmt=$db_con->prepare("INSERT INTO extra(folio_orden,descripcion,precio)VALUES('$folio','$descripcion','$precio')"); 

if($stmt->execute())
{ 
//header("http://consultoriaiisac.com/obra/orden_index.php"); 
}
else{
echo "Query Problem";
}
}
?>