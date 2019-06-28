<?php
  require_once '../db_config.php';
	 
  if($_POST)
	{ 
	$folio_orden      	 = $_POST['folio_orden'];
	$folio_obra 		 = $_POST['folio_obra'];
	$proveedor			 = $_POST['proveedor'];
	$comentarios		 = $_POST['comentarios'];
	$usuario 			 = $_POST['usuario'];
	$fecha_orden		 = $_POST['fecha_orden'];
 
	try{
	$stmt=$db_con->prepare("INSERT INTO orden_compra(id,folio,folio_obra,id_proveedor,comentarios,usuario,fecha)
		VALUES('','$folio_orden','$folio_obra','$proveedor','$comentarios','$usuario','$fecha_orden')");  

		if($stmt->execute())
		{  
		echo "Exito, Orden Creada Exitosamente: ".$folio_obra;	
		}
		else{
		echo "Error, hubo un problema en el servidor, contactar al admin o recarga la página y vuelve a intentar";
		}

	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
 }
?>