<?php
include "../db_config.php";
if($_POST['id'])
{
$id = $_POST['id']; 
$folio = $_POST['folio'];
try{
$stmt=$db_con->prepare("SELECT * FROM avance_concepto WHERE num_semana=:id AND folio='$folio'");
if($stmt->execute(array(':id'=>$id)))
{
//$response = "<tbody>";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
	$id = $row['id']; 
	$partida=$row['partida'];
	$etapa=$row['etapa'];
	$concepto=$row['concepto'];
	$unidad=$row['unidad'];
	$importe=$row['importe'];
	$cantidad=$row['cantidad']; 
	$avance_concepto=$row['avance_concepto'];
	$avance_presupuesto=$row['avance_presupuesto'];
	$response .= "<tr id=$id>";
	//$response .= "<td>".$id."</td>"; 
	$response .= "<td style='font-size:12px'><center>".$etapa."</center></td>";
	$response .= "<td style='font-size:12px'><center>".$partida."</center></td>"; 
	$response .= "<td style='font-size:12px'><center>".$concepto."</center></td>";
	$response .= "<td style='font-size:12px'><center>".$unidad."</center></td>";
	$response .= "<td style='font-size:12px'><center>".$cantidad."</center></td>";      
	$response .= "<td style='font-size:12px'><center>".$importe."</center></td>";
    $response .= "<td style='font-size:12px' class=".'#00897b teal darken-1 white-text'."><center>
    ".$avance_concepto." %</center></td>";      
    $response .=  "<td style='font-size:12px' class=".'#00897b teal darken-1 white-text'."><center>
    ".$avance_presupuesto." %</center></td>"; 
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