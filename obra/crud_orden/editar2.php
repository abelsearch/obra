<?php
include "../db_config.php";

if($_POST['edit_id'])
{
$id = $_POST['edit_id'];
try{ 
$stmt=$db_con->prepare("SELECT * FROM orden WHERE id=:id");
if($stmt->execute(array(':id'=>$id)))
{
$response = "<center><form>";
//while( $row = mysqli_fetch_array($result) )
$row=$stmt->fetch(PDO::FETCH_ASSOC);{
$id = $row['id'];
$presupuesto = $row['presupuesto']; 
$folio = $row['folio'];
 
 //$response .= "<div class=".'form-group'.">";
 $response .= "<input type=".'hidden'." id=".'id2'."  value=".$id.">";
 //$response .= "</div>";  

  //$response .= "<center>";
 $response .= "<b>Folio:</b> <input type=".'text'." id=".'folio2'."  value=".$folio." style=".'border:none;'."".'text-align:center;'.">";
 //$response .= "</center>";

 //$response .= "<center>";
 $response .= "<b>Presupuesto:</b> <input type=".'text'." id=".'presupuesto2'."  value=".$presupuesto." style=".'border:none;'."".'text-align:center;'.">";
 //$response .= "</center>";

}
$response .= "</form></center>";

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

