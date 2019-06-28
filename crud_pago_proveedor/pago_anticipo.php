<?php
  require_once '../db_config.php';
	 
  if($_POST)
	{ 
	//Se leen los datos del insumo a agregar a la orden de compra
	$folio       = $_POST['folio_orden'];
	$fecha 	     = $_POST['fecha_estatus'];
	$fecha_pago  = $_POST['fecha_pago'];
	$nombre	     = $_POST['nombre_usuario'];
	$id_pago	 = $_POST['id_compra'];
	$monto       = $_POST['pago_monto'];
	$comentarios = $_POST['pago_comentarios'];

	try{
	$stmt=$db_con->prepare("INSERT INTO compra_anticipo(id,id_pago,folio,fecha,fecha_pago,nombre,monto,comentarios)
		VALUES('','$id','$folio','$fecha','$fecha_pago','$nombre','$monto','$comentarios')");  

		if($stmt->execute())
		{  
			echo "Exito, Orden Aprobada Exitosamente";
			//-------------------------------------------------------------------------------------------
			//-------------------------------------------------------------------------------------------
			//En caso de que el insumo se haya agregado hay que actualizar el total de la orden de compra
			//-------------------------------------------------------------------------------------------



			try{
				$stmt2=$db_con->prepare("UPDATE compras SET estatus = 'ANTICIPO' WHERE id = '$id_pago'");

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