<?php 
	/*
	ARCHIVO PARA AGREGAR LOS INSUMOS DE UNA COMPRA A ALMACEN
	*/ 
	include_once '../db_config.php';
	if($_POST)
	{
		$id_orden = $_POST['id_orden']; 
		$id = $_POST['nombre_insumo']; 
		$cantidad_insumo = $_POST['cantidad_insumo']; 
		$precio_unitario = $_POST['precio_unitario'];   
		$stock_cantidad = $_POST['stock_cantidad'];  
		$stock_importe = $_POST['stock_importe'];  
		$fecha = date('Y-m-d');  
		//$id = 6; 
		
  
		
		//$stmt0=$db_con->prepare("SELECT * FROM orden_insumo WHERE id_orden=:id_orden"); 
		$stmt0=$db_con->prepare("SELECT * FROM catalogo_insumo WHERE id=:id");
		if($stmt0->execute(array(':id'=>$id)))
		{
			while($row=$stmt0->fetch(PDO::FETCH_ASSOC)){ 
				$entradas = $row['entradas'];	 
				$stock = $row['stock'];
				}    

				$entrada = $entradas + $cantidad_insumo; 
				$stock = $stock + $cantidad_insumo;
			
			$stmt=$db_con->prepare("UPDATE orden_insumo o SET 
			 o.precio_unitario_compra = $precio_unitario,  
			 o.cantidad_compra = $cantidad_insumo,
			 o.importe_compra = $cantidad_insumo * $precio_unitario, 
			 o.icono = 'beenhere', 
			 o.color = 'green', 
			 o.permiso = 'disabled', 
			 o.fecha_stock = '$fecha' 
			WHERE o.id_orden = $id_orden AND o.insumo = '$id'");
			//$stmt->execute(array(':id'=>$id));  
			$stmt->execute();   

			$stmt2=$db_con->prepare("UPDATE catalogo_insumo SET 
			 entradas = $entrada,
			 stock = $stock
			 WHERE id=$id");
			//$stmt->execute(array(':id'=>$id));  
			//$stmt2->execute(); 

			
			if($stmt->execute())
			{
				echo "Hecho!!!";  
				$stmt2->execute();
			}
			else{
				echo "Ocurrio un problema al insertar!!!";
			} 

			if($stmt2->execute())
			{
				echo "Hecho!!!";
			}
			else{
				echo "Ocurrio un problema al insertar!!!";
			}

			

		}
	}

?>