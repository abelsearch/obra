<?php 
require_once '../db_config.php'; 
if($_POST)
{ 
	$id_modelo = $_POST['id_modelo'];
	$id_etapa  = $_POST['id_etapa'];
	$concepto  = $_POST['concepto'];
	$partida   = $_POST['partida'];
	$unidad    = $_POST['unidad'];
	$precio    = $_POST['precio'];
	$cantidad  = $_POST['cantidad'];
	$importe   = $_POST['importe']; 

	try{ 
		$stmt=$db_con->prepare("INSERT INTO modelo_concepto (id,id_modelo,etapa,partida,descripcion,unidad,cantidad,precio_unitario,importe)
		VALUES('','$id_modelo','$id_etapa','$partida','$concepto','$unidad','$cantidad','$precio','$importe')"); 
		if($stmt->execute()){
			echo "Alta exitosa!";
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