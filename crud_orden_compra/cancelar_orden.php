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
	$stmt=$db_con->prepare("INSERT INTO orden_cancelada(id,id_orden_compra,fecha_cancelada,persona_cancelo,reporte)
		VALUES('','$folio','$fecha','$nombre','$reporte')");  

		if($stmt->execute())
		{  
			echo "Exito, Orden Cancelada Exitosamente";
			try{
				$stmt2=$db_con->prepare("UPDATE orden_compra SET estatus = 'CANCELADA' WHERE folio = '$folio'");

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