<?php
  require_once '../db_config.php'; 
  if($_POST)
	{ 
	//Se leen los datos del registro de la compra
	$folio  = $_POST['folio_orden_estatus'];
	$fecha 	= $_POST['fecha_estatus'];
	$nombre	= $_POST['nombre_usuario'];
	//Se leen los totales de la orden de compra
	$subtotal = $_POST['subtotal_orden'];
	$iva	  = $_POST['iva_orden'];
	$total	  = $_POST['total_orden'];

	try{
	$stmt=$db_con->prepare("INSERT INTO compras(id,id_orden_compra,fecha_registro,persona_registro,subtotal,iva,total)
		VALUES('','$folio','$fecha','$nombre','$subtotal','$iva','$total')");  

		if($stmt->execute())
		{  
			echo "Exito, Compra Registrada Exitosamente";
			//-------------------------------------------------------------------------------------------
			//-------------------------------------------------------------------------------------------
			//En caso de que el insumo se haya agregado hay que actualizar el total de la orden de compra
			//-------------------------------------------------------------------------------------------
			try{
				$stmt2=$db_con->prepare("UPDATE orden_compra SET estatus = 'COMPRA' WHERE folio = '$folio'");

					if($stmt2->execute())
					{  
						echo "Puedes Continuar...";
					}
					else{
					echo "Error, al actualizar el estatus de la orden";
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