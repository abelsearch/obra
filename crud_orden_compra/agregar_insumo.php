<?php
  require_once '../db_config.php';
	 
  if($_POST)
	{ 
	//Se leen los datos del insumo a agregar a la orden de compra
	$folio_orden_insumo = $_POST['folio_orden_insumo'];
	$importe_insumo 	= $_POST['importe_insumo'];
	$cantidad_insumo	= $_POST['cantidad_insumo'];
	$precio_unitario	= $_POST['precio_unitario'];
	$insumo 			= $_POST['insumo'];
	$fecha_insumo		= $_POST['fecha_insumo'];

 	//Se leen los totales de la orden de compra actualizados

 	$subtotal_orden	 = $_POST['total_subtotal'];
	$iva_orden 		 = $_POST['total_iva'];
	$total_orden	 = $_POST['total_final_orden'];

	try{
	$stmt=$db_con->prepare("INSERT INTO orden_insumo(id,id_orden,insumo,precio_unitario,cantidad,importe,fecha)
		VALUES('','$folio_orden_insumo','$insumo','$precio_unitario','$cantidad_insumo','$importe_insumo','$fecha_insumo')");  

		if($stmt->execute())
		{  
			echo "Exito, Insumo Agregado Exitosamente";
			//-------------------------------------------------------------------------------------------
			//-------------------------------------------------------------------------------------------
			//En caso de que el insumo se haya agregado hay que actualizar el total de la orden de compra
			//-------------------------------------------------------------------------------------------



			try{
				$stmt2=$db_con->prepare("UPDATE orden_compra SET subtotal = '$subtotal_orden', iva = '$iva_orden', total = '$total_orden'
				 WHERE id = '$folio_orden_insumo'");

					if($stmt2->execute())
					{  
						echo "Exito, Insumo Actualizado Exitosamente en la orden de compra";

					}
					else{
					echo "El insumo no se pudo actualizar en la orden de compra";
					}

				}
				catch(PDOException $e){
					echo $e->getMessage();
				} 
				//-------------------------------------------------------------------------------------------
			//-------------------------------------------------------------------------------------------
			//Termina la actualización de la orden de compra
			//-------------------------------------------------------------------------------------------
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