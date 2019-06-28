<?php
include "../db_config.php";

if($_POST['edit_id'])
{
$id = $_POST['edit_id'];
try{ 
$stmt=$db_con->prepare("SELECT * FROM catalogo_insumo WHERE id=:id");
if($stmt->execute(array(':id'=>$id)))
{
$response = "<center><form>";
$row=$stmt->fetch(PDO::FETCH_ASSOC);{
$id = $row['id'];
$nombre=$row['nombre']; 
$unidad=$row['unidad']; 
$saldo=$row['saldo_inicial']; 

 
 $response .= "<br><input type=".'hidden'." id=".'2id'."  value=".$id.">";
 
 
 $response .= "<b>Nombre</b> <input type=".'text'." id=".'2nombre'." value='".$nombre."' style=".'border:none;'."".'text-align:center;'.">";

 $response .= "<b>Unidad</b> <input type=".'text'." id=".'2unidad'." value='".$unidad."' style=".'border:none;'."".'text-align:center;'.">"; 

 $response .= "<b>Saldo Inicial</b> <input type=".'number'." id=".'2saldo'." value='".$saldo."' style=".'border:none;'."".'text-align:center;'.">";



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