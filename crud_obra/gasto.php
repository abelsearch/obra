<?php
require_once '../db_config.php';
 
if($_POST)
{ 
$tipo = $_POST['tipo']; 

$stmt=$db_con->prepare("INSERT INTO gasto(tipo)VALUES('$tipo')"); 

if($stmt->execute())
{ 
//header("http://127.0.0.1/PHP-AJAX/orden_index.php"); 
}
else{
echo "Query Problem";
}
}
?>