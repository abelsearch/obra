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
		echo "M.toast({html: 'Exito, Orden Creada Exitosamente: ".$folio_obra."', classes: 'rounded'})";
		}
		else{
		echo " M.toast({html: 'Error, hubo un problema en el servidor, contactar al admin o recarga la página y vuelve a intentar', classes: 'rounded'});";
		}

	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
 }
?>s