<?php
include_once("../db_config.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {	
	$update_pago=''; 
	if(isset($input['pago'])) {
		$update_pago.= "pago='".$input['pago']."'";
	} 
		if($update_pago && $input['id']) { 
		$stmt=$db_con->prepare("UPDATE flujo SET resta=resta-'".$input['pago']."', acumulado=acumulado+'".$input['pago']."' WHERE id='" . $input['id'] . "'"); 
		if($stmt->execute())
		{
		echo "OK";
		} 
		else{
		echo "Ocurrio un problema";
		} 
	} 


}