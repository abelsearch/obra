<?php
include_once("../db_config.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit'){	
	$update_cantidad=''; 
	if(isset($input['cantidad'])) {
		$update_cantidad.= "cantidad='".$input['cantidad']."'";
	} 


		if($update_cantidad && $input['id']){   
			$id = $input['id']; 
			$cantidad = $input['cantidad'];
			$stmt0=$db_con->prepare("SELECT i.unidad,i.id_orden,i.insumo,i.fecha,c.folio,c.estatus FROM orden_insumo i JOIN orden_compra c ON i.id_orden=c.id WHERE i.id=:id");
			if($stmt0->execute(array(':id'=>$id))){
				while($row=$stmt0->fetch(PDO::FETCH_ASSOC)){ 
				$id_orden = $row['id_orden'];	
				$insumo = $row['insumo'];  
				$fecha = $row['fecha']; 
				$folio = $row['folio']; 
				$estatus = $row['estatus']; 
				$unidad = $row['unidad'];   

				echo $id_orden;	
				echo $insumo;  
				echo $fecha; 
				echo $folio; 
				echo $estatus; 
				echo $unidad;   


				} 

$stmt=$db_con->prepare("INSERT INTO salida_insumo(folio,id_insumo,nombre_insumo,unidad,cantidad,
	num_semana,estatus,fecha)VALUES('$folio','$id','$insumo','$unidad','$cantidad',1,'$estatus','$fecha')"); 
	//$stmt=$db_con->prepare("UPDATE salida_insumo SET cantidad=$cantidad WHERE id_insumo = '$id'"); 
			$stmt->execute();
			

				$stmt2=$db_con->prepare("UPDATE orden_insumo SET cantidad=$cantidad WHERE id = '$id'"); 
				$stmt2->execute(); 

				if($stmt->execute())
				{
				echo "OK";
				} 
				else{
				echo "Ocurrio un problema";
				}  

				if($stmt2->execute())
				{
				echo "OK";
				} 
				else{
				echo "Ocurrio un problema";
				} 
	


	}  
}

//
}