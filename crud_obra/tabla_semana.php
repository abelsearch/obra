<?php
include "../db_config.php";
if($_POST['num'])
{
$id = $_POST['num'];  
$folio = $_POST['folio2']; 
try{
$stmt=$db_con->prepare("SELECT num_semana,unidad,cantidad,importe FROM avance_concepto WHERE id_concepto=:id AND folio='$folio'");
if($stmt->execute(array(':id'=>$id)))
{
//$response = "<tbody>";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){ 
	$num_semana = $row['num_semana'];	
	$unidad = $row['unidad'];
	$cantidad = $row['cantidad'];	
	$importe = $row['importe'];
	$response .= "<tr>";
	//$response .= "<td>".$id."</td>"; 
	$response .= "<td><center>".$num_semana."</center></td>";      
	$response .= "<td><center>".$unidad."</center></td>"; 
	$response .= "<td><center>".$cantidad."</center></td>";      
	$response .= "<td><center>".$importe."</center></td>"; 
	
	$response .="</tr>";
	}
//$response .= "</tbody>";
echo $response; 

}
else{
echo "Ocurrio un problema";
}
}
catch(PDOException $e){
echo $e->getMessage();
}
}