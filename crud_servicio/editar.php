<?php
include "../db_config.php";

if($_POST['edit_id'])
{
$id = $_POST['edit_id'];
try{ 
$stmt=$db_con->prepare("SELECT * FROM concepto WHERE id=:id");
if($stmt->execute(array(':id'=>$id)))
{
$response = "<center><form>";
//while( $row = mysqli_fetch_array($result) )
$row=$stmt->fetch(PDO::FETCH_ASSOC);{
$id = $row['id'];
$clave_sat=$row['clave_sat']; 
$clave_interna=$row['clave_interna']; 
$descripcion=$row['descripcion']; 
$precio=$row['precio']; 
$medida=$row['medida']; 
 
 //$response .= "<div class=".'form-group'.">";
 $response .= "<input type=".'hidden'." id=".'2id'."  value=".$id.">";
 //$response .= "</div>"; 

 //$response .= "<center>";
 $response .= "<b>Clave SAT:</b> <input type=".'text'." id=".'2clave_sat'."  value='".$clave_sat."' style=".'border:none;'."".'text-align:center;'.">";
 //$response .= "</center>";

 //$response .= "<tr>";
 $response .= "<b>Clave Interna:</b> <input type=".'text'." id=".'2clave_interna'." value='".$clave_interna."' style=".'border:none;'."".'text-align:center;'.">";
 //$response .= "</tr>";

 //$response .= "<tr>";
 $response .= "<b>Descripción</b> <input type=".'text'." id=".'2descripcion'." value='".$descripcion."' style=".'border:none;'."".'text-align:center;'.">";
 //$response .= "</tr>";

 //$response .= "<tr>";
 $response .= "<b>Precio:</b> <input type=".'text'." id=".'2precio'."  value='".$precio."' style=".'border:none;'."".'text-align:center;'.">";
 //$response .= "</tr>";

 //$response .= "<tr>";
 $response .= "<b>Medida:</b> <input type=".'text'." id=".'2medida'."  value='".$medida."' style=".'border:none;'."".'text-align:center;'.">";
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

