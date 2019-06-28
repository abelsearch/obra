<?php
include "../db_config.php";

if($_POST['edit_id'])
{
$id = $_POST['edit_id'];
try{ 
$stmt=$db_con->prepare("SELECT * FROM catalogo_flujo WHERE id=:id");
if($stmt->execute(array(':id'=>$id)))
{
$response = "<center><form>";
$row=$stmt->fetch(PDO::FETCH_ASSOC);{
$id = $row['id'];
$descripcion=$row['descripcion']; 
 
 $response .= "<input type=".'hidden'." id=".'2id'."  value=".$id.">";
 
 $response .= "<b>Descripción</b> <input type=".'text'." id=".'2descripcion'." value='".$descripcion."' style=".'border:none;'."".'text-align:center;'.">";
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

