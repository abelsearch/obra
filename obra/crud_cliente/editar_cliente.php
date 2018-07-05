<?php
include "../db_config.php";

if($_POST['edit_id'])
{
$id = $_POST['edit_id'];
try{ 
$stmt=$db_con->prepare("SELECT * FROM cliente WHERE id=:id");

if($stmt->execute(array(':id'=>$id)))
{
$response = "<table border='0' width='40%'>";
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
$id = $row['id'];
$razon_social=$row['razon_social']; 
$nombre_comercial=$row['nombre_comercial']; 
$rfc=$row['rfc']; 
$calle=$row['calle']; 
$colonia=$row['colonia']; 
$numero=$row['numero']; 
$codigo_postal=$row['codigo_postal']; 
$ciudad=$row['ciudad']; 
$estado=$row['estado']; 
$telefono=$row['telefono']; 
$nombre_contacto=$row['nombre_contacto']; 
$correo=$row['correo'];  



 $response .= "<h5>Detalles del Cliente</h5>";

$response .= "<input type=".'hidden'." id=".'id2'."  value=".$id.">";

 $response .= "<tr>";
 $response .= "<td>Razón Social : </td><td><input type=".'text'." id=".'razon_social2'." value='".$razon_social."' style=".'border:none;'."".'text-align:center;'."></td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Nombre Comercial : </td><td><input type=".'text'." id=".'nombre_comercial2'." value='".$nombre_comercial."' style=".'border:none;'."".'text-align:center;'."></td>";
 $response .= "</tr>"; 

  $response .= "<tr>";
 $response .= "<td>RFC : </td><td><input type=".'text'." id=".'rfc2'." value='".$rfc."' style=".'border:none;'."".'text-align:center;'."></td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Calle : </td><td><input type=".'text'." id=".'calle2'." value='".$calle."' style=".'border:none;'."".'text-align:center;'."></td>";
 $response .= "</tr>"; 

 $response .= "<tr>";
 $response .= "<td>Colonia : </td><td><input type=".'text'." id=".'colonia2'." value='".$colonia."' style=".'border:none;'."".'text-align:center;'."></td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Numero : </td><td><input type=".'text'." id=".'numero2'." value='".$numero."' style=".'border:none;'."".'text-align:center;'."></td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Código Postal : </td><td><input type=".'text'." id=".'codigo_postal2'." value='".$codigo_postal."' style=".'border:none;'."".'text-align:center;'."></td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Ciudad : </td><td><input type=".'text'." id=".'ciudad2'." value='".$ciudad."' style=".'border:none;'."".'text-align:center;'."></td>";
 $response .= "</tr>"; 

 $response .= "<tr>";
 $response .= "<td>Estado : </td><td><input type=".'text'." id=".'estado2'." value='".$estado."' style=".'border:none;'."".'text-align:center;'."></td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Telefono : </td><td><input type=".'text'." id=".'telefono2'." value='".$telefono."' style=".'border:none;'."".'text-align:center;'."></td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Nombre Contacto : </td><td><input type=".'text'." id=".'nombre_contacto2'." value='".$nombre_contacto."' style=".'border:none;'."".'text-align:center;'."></td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Correo : </td><td><input type=".'text'." id=".'correo2'." value='".$correo."' style=".'border:none;'."".'text-align:center;'."></td>";
 $response .= "</tr>"; 

}
$response .= "</table>";

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