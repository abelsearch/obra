<?php
include "../db_config.php";
if($_POST['ver_id']) 
if($_POST['folio'])	
{
$id = $_POST['ver_id'];
$folio= $_POST['folio'];
try{

$stmt=$db_con->prepare("SELECT SUM(cantidad) as cantidad, SUM(importe) as importe, SUM(avance_concepto) as avance
FROM avance_concepto  WHERE id_concepto = $id AND folio='$folio'");
if($stmt->execute(array(':id'=>$id)))
{
$response .= "<div class='row'>";

$response .= "<div class='col l12 m12 s12 color-smenu center'>";
$response .= "<h5 class='white-text'>Detalles del Avance</h5>";
$response .= "</div>";

	$row=$stmt->fetch(PDO::FETCH_ASSOC);{
	$cantidad=$row['cantidad'];
	$importe=$row['importe'];
	$avance=$row['avance'];
	
	$response .= "<table border='0' width='20%'>";
	$response .= "<thead><tr><th class='center'><label>Cantidad Avanzada (M2)</label></th><th class='center'><label>Importe Avanzado (M2)<label></th><th class='center'><label>% Avance del Concepto<label></th></tr><thead>";
	$response .= "<tr>";
	$response .= "<td class='center'>".$cantidad."</td>";
	$response .= "<td class='center'>".$importe."</td>";
	$response .= "<td class='center'>".$avance."</td>";
	$response .= "</tr>";	}
$response .= "</table>";
$response .= "</div>";
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