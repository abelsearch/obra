<?php
include "../db_config.php";

if($_POST['edit_id'])
{
$id = $_POST['edit_id'];
try{ 
$stmt=$db_con->prepare("SELECT * FROM lista WHERE id=:id");
if($stmt->execute(array(':id'=>$id)))
{
$response = "<center>";
$row=$stmt->fetch(PDO::FETCH_ASSOC);{
$id = $row['id'];
$folio_orden=$row['folio_orden'];   
$tipo_insumo=$row['tipo_insumo'];
$descripcion=$row['descripcion']; 
$unidad=$row['unidad']; 
$cantidad=$row['cantidad']; 
$precio_unitario = $row['precio_unitario'];


//$response .= "<div class=".'form-group'.">";
 $response .= "<input type=".'hidden'." id=".'folio_orden'."  value='".$folio_orden."'>";
 //$response .= "</div>"; 

//$response .= "<div class=".'form-group'.">";
 $response .= "<input type=".'hidden'." id=".'id'."  value=".$id.">";
 //$response .= "</div>"; 

 //$response .= "<center>";
 $response .= "<b>Descripción:</b> <input type=".'text'." id=".'descripcion'."  value='".$descripcion."' style=".'border:none;'."".'text-align:center;'.">";
 //$response .= "</center>";

 //$response .= "<tr>";
 $response .= "<b>Unidad:</b> <input type=".'text'." id=".'unidad'." value='".$unidad."' style=".'border:none;'."".'text-align:center;'.">";
 //$response .= "</tr>";

 //$response .= "<tr>";
 $response .= "<b>Cantidad</b> <input type=".'text'." id=".'cantidad'." value='".$cantidad."' style=".'border:none;'."".'text-align:center;'.">";
 //$response .= "</tr>";

 //$response .= "<tr>";
 $response .= "<b>Precio Unitario:</b> <input type=".'text'." id=".'precio_unitario'."  value='".$precio_unitario."' style=".'border:none;'."".'text-align:center;'.">";
 //$response .= "</tr>";


 //$response .= "<div class=".'form-group'.">";
 $response .= "<input type=".'text'." id=".'tipo_insumo'."  value='".$tipo_insumo."'>";
 //$response .= "</div>"; 


}
$response .= "</center>";

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

