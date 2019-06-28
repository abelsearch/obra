<?php
  require_once '../db_config.php';
	 
  if($_POST)
	{ 
	//Se leen los datos del insumo a agregar a la orden de compra
	$folio   = $_POST['folio_orden_estatus'];
	$fecha 	 = $_POST['fecha_estatus'];
	$nombre	 = $_POST['nombre_usuario'];
	$reporte = $_POST['reporte'];

	try{
	$stmt=$db_con->prepare("INSERT INTO orden_pedido(id,id_orden_compra,fecha_pedido,persona_pedido,reporte)
		VALUES('','$folio','$fecha','$nombre','$reporte')");  

		if($stmt->execute())
		{  
			echo "Exito, La orden fué regresada a estatus de pedido!";
			try{
				$stmt2=$db_con->prepare("UPDATE orden_compra SET estatus = 'PEDIDO' WHERE folio = '$folio'");

					if($stmt2->execute())
					{  
						echo " Puedes Continuar...";

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