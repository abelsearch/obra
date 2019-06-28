<?php
  require_once '../db_config.php';
	 
  if($_POST)
	{ 
	//Se leen los datos del insumo a agregar a la orden de compra
	$folio   = $_POST['folio_orden'];
	$fecha 	 = $_POST['fecha_estatus'];
	$nombre	 = $_POST['nombre_usuario'];
	$id		 = $_POST['id_compra'];
	$reporte = $_POST['reporte'];

	try{
	$stmt=$db_con->prepare("INSERT INTO compra_pendiente(id,id_orden,fecha,nombre,comentarios)
		VALUES('','$folio','$fecha','$nombre','$reporte')");  

		if($stmt->execute())
		{  
			echo "Exito, Orden Aprobada Exitosamente";
			//-------------------------------------------------------------------------------------------
			//-------------------------------------------------------------------------------------------
			//En caso de que el insumo se haya agregado hay que actualizar el total de la orden de compra
			//-------------------------------------------------------------------------------------------



			try{
				$stmt2=$db_con->prepare("UPDATE compras SET estatus = 'PENDIENTE' WHERE id = '$id'");

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