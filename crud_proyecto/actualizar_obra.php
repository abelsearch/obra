<?php 
require_once '../db_config.php'; 
if($_POST)
{
 	$id_obra   		 = $_POST['id_obra']; 
 	$titulo  		 = $_POST['titulo'];
 	$contrato		 = $_POST['contrato'];
 	$manzana		 = $_POST['manzana'];
 	$lote		     = $_POST['lote'];
 	$residente       = $_POST['residente'];
 	$num_residente   = $_POST['num_residente'];
 	$contratista     = $_POST['contratista'];
 	$num_contratista = $_POST['num_contratista'];
	try{ 
	$stmt=$db_con->prepare("UPDATE obra SET  titulo = '$titulo', contrato = '$contrato', zona = '$manzana', lote = '$lote',
							contratista = '$contratista', num_contratista = '$num_contratista', residente_obra = '$residente',
							num_residente = '$num_residente' WHERE id = '$id_obra'"); 
	if($stmt->execute())
	{
	echo "Obra actualizada correctamente."; 
	}
	else{
	echo "Ocurrio un problema, intentalo de nuevo.";
	}
	}
	catch(PDOException $e){
	echo $e->getMessage();
	}
}
?>