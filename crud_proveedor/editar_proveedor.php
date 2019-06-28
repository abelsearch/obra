<?php
include "../db_config.php";
if($_POST['edit_id'])
{
$id = $_POST['edit_id'];
try{
$stmt=$db_con->prepare("SELECT * FROM proveedor WHERE id=:id");
if($stmt->execute(array(':id'=>$id)))
{
$response = "<table border='0' width='40%'>";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
	$id = $row['id'];
	$rfc=$row['rfc'];
	$razon_social=$row['razon_social'];
	$nombre=$row['nombre'];
	$domicilio=$row['domicilio']; 
	$contacto=$row['contacto'];
	$correo=$row['correo']; 
	$telefono=$row['telefono']; 
	$ciudad=$row['ciudad'];
	$estado=$row['estado'];
	$estatus=$row['estatus'];
	
	$response .= "<h5>Editar Proveedor</h5>";
	$response .= "<input type=".'hidden'." id=".'id2'."  value=".$id.">";
	$response .= "<tr>";
		$response .= "<td>RFC : </td><td><input type=".'text'." id=".'rfc2'." value='".$rfc."' style=".'border:none;'."".'text-align:center;'."></td>";
	$response .= "</tr>";
	$response .= "<tr>";
		$response .= "<td>Razón Social : </td><td><input type=".'text'." id=".'razon_social2'." value='".$razon_social."' style=".'border:none;'."".'text-align:center;'."></td>";
	$response .= "</tr>";
	$response .= "<tr>";
		$response .= "<td>Nombre : </td><td><input type=".'text'." id=".'nombre2'." value='".$nombre."' style=".'border:none;'."".'text-align:center;'."></td>";
	$response .= "</tr>";
	$response .= "<tr>";
		$response .= "<td>Domicilio : </td><td><input type=".'text'." id=".'domicilio2'." value='".$domicilio."' style=".'border:none;'."".'text-align:center;'."></td>";
	$response .= "</tr>";
	$response .= "<tr>";
		$response .= "<td>Contacto : </td><td><input type=".'text'." id=".'contacto2'." value='".$contacto."' style=".'border:none;'."".'text-align:center;'."></td>";
	$response .= "</tr>";
	$response .= "<tr>";
		$response .= "<td>Correo : </td><td><input type=".'text'." id=".'correo2'." value='".$correo."' style=".'border:none;'."".'text-align:center;'."></td>";
	$response .= "</tr>";
	$response .= "<tr>";
		$response .= "<td>Telefono : </td><td><input type=".'text'." id=".'telefono2'." value='".$telefono."' style=".'border:none;'."".'text-align:center;'."></td>";
	$response .= "</tr>";
	$response .= "<tr>";
		$response .= "<td>Ciudad : </td><td><input type=".'text'." id=".'ciudad2'." value='".$ciudad."' style=".'border:none;'."".'text-align:center;'."></td>";
	$response .= "</tr>";
	$response .= "<tr>";
		$response .= "<td>Estado : </td><td><input type=".'text'." id=".'estado2'." value='".$estado."' style=".'border:none;'."".'text-align:center;'."></td>";
	$response .= "</tr>";
	$response .= "<tr>";
		$response .= "<td>Estatus : </td><td><input type=".'text'." id=".'estatus2'." value='".$estatus."' style=".'border:none;'."".'text-align:center;'."></td>";
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