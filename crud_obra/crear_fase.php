<?php
require_once '../db_config.php';
 
if($_POST)
{ 
	$folio       = $_POST['folio']; 
	$nombre_fase = $_POST['nombre_fase'];

	try{
		$stmt=$db_con->prepare("INSERT INTO fases(id,id_folio,nombre)VALUES('','$folio','$nombre_fase')");  

		if($stmt->execute())
		{ 
		echo "Fase registrada exitosamente para la obra ".$folio; 
		}
		else{
		echo "Ocurrió un error al registrar la nueva fase, recarge la página y vuelva a intentar";
		}

	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
}
?>