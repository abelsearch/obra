<?php
include "../db_config.php";

if($_POST['del_id'])
{
$id = $_POST['del_id'];
try{ 
$stmt=$db_con->prepare("SELECT * FROM catalogo_flujo WHERE id=:id");
if($stmt->execute(array(':id'=>$id)))
{
$response = "<center><form>";
//while( $row = mysqli_fetch_array($result) )
$row=$stmt->fetch(PDO::FETCH_ASSOC);{
$id = $row['id'];
//$folio=$row['folio_orden']; 

 //$response .= "<div class=".'form-group'.">";
 $response .= "<input type=".'hidden'." id=".'id2'."  value=".$id.">";
 //$response .= "</div>"; 

 //$response .= "<tr>";
 //$response .= "<b>Folio:</b> <input type=".'text'." id=".'folio'." value='".$folio."' style=".'border:none;'."".'text-align:center;'." readonly>";
 //$response .= "</tr>"; 


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