<?php
include "../db_config.php";
if($_POST['ver_id'])
{
$id = $_POST['ver_id'];
try{
$stmt=$db_con->prepare("SELECT * FROM proveedor WHERE id=:id");
if($stmt->execute(array(':id'=>$id)))
{
$response = "<table border='0' width='20%'>";
	$row=$stmt->fetch(PDO::FETCH_ASSOC);{
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
	
	$response .= "<h5>Detalles del Proveedor</h5>";
	
	$response .= "<tr>";
		$response .= "<td>RFC : </td><td>".$rfc."</td>";
	$response .= "</tr>";
	
	$response .= "<tr>";
		$response .= "<td>Razón Social : </td><td>".$razon_social."</td>";
	$response .= "</tr>";
	
	$response .= "<tr>";
		$response .= "<td>Nombre : </td><td>".$nombre."</td>";
	$response .= "</tr>";
	
	$response .= "<tr>";
		$response .= "<td>Domicilio : </td><td>".$domicilio."</td>";
	$response .= "</tr>"; 

	$response .= "<tr>";
		$response .= "<td>Contacto : </td><td>".$contacto."</td>";
	$response .= "</tr>";
	
	$response .= "<tr>";
		$response .= "<td>Correo : </td><td>".$correo."</td>";
	$response .= "</tr>"; 

	$response .= "<tr>";
		$response .= "<td>Teléfono : </td><td>".$telefono."</td>";
	$response .= "</tr>"; 

	$response .= "<tr>";
		$response .= "<td>Ciudad : </td><td>".$ciudad."</td>";
	$response .= "</tr>";
	
	$response .= "<tr>";
		$response .= "<td>Estado : </td><td>".$estado."</td>";
	$response .= "</tr>";
	
	$response .= "<tr>";
		$response .= "<td>Estatus : </td><td>".$estatus."</td>";
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