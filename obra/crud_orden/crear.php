<?php
require_once '../db_config.php';
 
if($_POST)
{ 
$folio = $_POST['folio']; 
$cliente = $_POST['cliente']; 
$servicio = $_POST['servicio'];  
$presupuesto = $_POST['presupuesto'];


$stmt=$db_con->prepare("INSERT INTO orden(folio,cliente,servicio,presupuesto)VALUES('$folio','$cliente','$servicio','$presupuesto')"); 


if($stmt->execute())
{ 
	header("http://127.0.0.1/PHP-AJAX/orden_index.php"); 

}
else{
echo "Query Problem";
}
}
?>