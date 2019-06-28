<?php
include_once("../db_config.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {	
	$update_pago=''; 
	if(isset($input['cantidad'])) {
		$update_pago.= "cantidad='".$input['cantidad']."'";
	} 
		if($update_pago && $input['id']) { 
		$stmt=$db_con->prepare("UPDATE concepto SET resta=resta-'".$input['cantidad']."', acumulado=acumulado+'".$input['cantidad']."' WHERE id='" . $input['id'] . "'"); 
		if($stmt->execute())
		{
		echo "OK";
		} 
		else{
		echo "Ocurrio un problema";
		} 
	} 


}