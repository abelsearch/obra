<?php
include_once("../db_config.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {	
	$update_cantidad=''; 
	$update_precio='';  
	$update_cantidad_real=''; 
	$update_precio_real=''; 
	if(isset($input['cantidad'])) {
		$update_cantidad.= "cantidad='".$input['cantidad']."'";
	} else if(isset($input['precio_unitario'])) {
		$update_precio.= "precio_unitario='".$input['precio_unitario']."'";
	} else if(isset($input['cantidad_real'])) {
		$update_cantidad_real.= "cantidad_real='".$input['cantidad_real']."'";
	} else if(isset($input['precio_real'])) {
		$update_precio_real.= "precio_real='".$input['precio_real']."'";
	} //else if(isset($input['designation'])) {
	//	$update_field.= "designation='".$input['designation']."'";
	//}	 
		if($update_cantidad && $input['id']) { 
		
		$stmt=$db_con->prepare("UPDATE lista_insumo SET importe=precio_unitario*'".$input['cantidad']."', cruce=importe-importe_real,$update_cantidad WHERE id='" . $input['id'] . "' AND estado='EDITABLE'"); 


		if($stmt->execute())
		{
		echo "OK";
		} 
		else{
		echo "Ocurrio un problema";
		} 
	} 


	if($update_precio && $input['id']) { 
		$stmt2=$db_con->prepare("UPDATE lista_insumo SET importe=cantidad*'".$input['precio_unitario']."', cruce=importe-importe_real, $update_precio WHERE id='" . $input['id'] . "' AND estado='EDITABLE'"); 
		if($stmt2->execute())
		{
		echo "OK";  
		} 
		else{
		echo "Ocurrio un problema";
		} 
		//$sqli_query = "UPDATE lista_insumo SET $update_field WHERE id='" . $input['id'] . "'";	
		//mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));		
	}


	if($update_cantidad_real && $input['id']) { 
		$stmt3=$db_con->prepare("UPDATE lista_insumo SET importe_real=precio_real*'".$input['cantidad_real']."', cruce=importe-importe_real,$update_cantidad_real WHERE id='" . $input['id'] . "' AND estado='EDITABLE'"); 
		if($stmt3->execute())
		{
		echo "OK";
		} 
		else{
		echo "Ocurrio un problema";
		} 
	} 


	if($update_precio_real && $input['id']) { 
		$stmt4=$db_con->prepare("UPDATE lista_insumo SET importe_real=cantidad_real*'".$input['precio_real']."',cruce=importe-importe_real ,$update_precio_real WHERE id='" . $input['id'] . "' AND estado='EDITABLE'");  

		//$stmt5=$db_con->prepare("INSERT INTO semana(folio,fecha,concepto,cantidad)
		//VALUES('$folio_orden','$fecha','INSUMO','$precio_real')");

		if($stmt4->execute())
		{
		echo "OK";  
		} 
		else{
		echo "Ocurrio un problema";
		} 
		//$sqli_query = "UPDATE lista_insumo SET $update_field WHERE id='" . $input['id'] . "'";	
		//mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));		
	}










}