<?php
  require_once '../db_config.php';
	 
  if($_POST)
	{ 
	//Se leen los datos del insumo a agregar a la orden de compra
	$id_insumo = $_POST['id_insumo'];
	$cantidad  = $_POST['cantidad_nueva'];

	try{ 
	$stmt=$db_con->prepare("INSERT INTO almacen(id_insumo,nombre_insumo,stock,entradas,salidas)VALUES(
		$id_insumo,'X',$cantidad,2,0)");  
	//$stmt=$db_con->prepare("UPDATE almacen SET  stock = '$cantidad'WHERE id_insumo = '$nombre_insumo'");  


		if($stmt->execute())
		{  
			echo "Exito, Insumo Agregado Exitosamente a Almacen";
			
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