<?php
include_once("db_config.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {	
	$update_field='';
	if(isset($input['cantidad_real'])) {
		$update_field.= "cantidad_real='".$input['cantidad_real']."'";
	} else if(isset($input['precio_real'])) {
		$update_field.= "precio_real='".$input['precio_real']."'";
	} //else if(isset($input['address'])) {
		//$update_field.= "address='".$input['address']."'";
	//} else if(isset($input['age'])) {
	//	$update_field.= "age='".$input['age']."'";
	//} else if(isset($input['designation'])) {
	//	$update_field.= "designation='".$input['designation']."'";
	//}	
	if($update_field && $input['id']) { 
		$stmt=$db_con->prepare("UPDATE lista_insumo SET $update_field WHERE id='" . $input['id'] . "'"); 
		if($stmt->execute())
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