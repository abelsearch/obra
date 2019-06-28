<?php
include "../db_config.php";

if($_POST['edit_id'])
{
$id = $_POST['edit_id'];
try{ 
$stmt=$db_con->prepare("SELECT * FROM proyecto WHERE id=:id");
if($stmt->execute(array(':id'=>$id)))
{
$response = "<center><form>";
$row=$stmt->fetch(PDO::FETCH_ASSOC);{
$id = $row['id']; 
$nombre=$row['nombre']; 
 
 $response .= "<br><input type=".'hidden'." id=".'2id'."  value=".$id.">";
 

 $response .= "<b>Nombre del Proyecto:</b> <input type=".'text'." id=".'2nombre'." value='".$nombre."' style=".'border:none;'."".'text-align:center;'." readonly>";
 
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