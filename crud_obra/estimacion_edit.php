<?php
include_once("../db_config.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {	
	$update_concepto='';  
	if(isset($input['est_cantidad'])) {
		$update_concepto.= "est_cantidad='".$input['est_cantidad']."'";
	} 
		if($update_concepto && $input['id']) { 
		$stmt=$db_con->prepare("UPDATE concepto SET res_cantidad=res_cantidad-'".$input['est_cantidad']."' WHERE id='" . $input['id'] . "'  AND '".$input['est_cantidad']."'>0 OR '".$input['est_cantidad']."'<=cantidad  
			 "); 
		if($stmt->execute())
		{
		echo "OK";
		} 
		else{
		echo "Ocurrio un problema";
		} 
	}  

	if($update_concepto && $input['id']) { 
		$stmt=$db_con->prepare("UPDATE concepto SET est_importe=est_importe+precio_unitario*'".$input['est_cantidad']."'WHERE id='" . $input['id'] . "' AND res_cantidad>0 AND '".$input['est_cantidad']."'<=cantidad"); 
		if($stmt->execute())
		{
		echo "OK";
		} 
		else{
		echo "Ocurrio un problema";
		} 
	} 

	if($update_concepto && $input['id']) { 
		$stmt=$db_con->prepare("UPDATE concepto SET p_concepto=p_concepto+
			(precio_unitario*'".$input['est_cantidad']."'*100)/importe WHERE id='" . $input['id'] . "' AND res_cantidad>0 AND '".$input['est_cantidad']."'<=cantidad"); 
		if($stmt->execute())
		{
		echo "OK";
		} 
		else{
		echo "Ocurrio un problema";
		} 
	} 





}