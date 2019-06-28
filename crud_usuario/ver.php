<?php
include "../db_config.php";
if($_POST['ver_id'])
{
$id = $_POST['ver_id'];
try{
$stmt=$db_con->prepare("SELECT 
	u.nombre as nombre,
	u.paterno as paterno,
	u.materno as materno,
	u.departamento as depto,
	u.tipo as tipo,
	p.vista as vista FROM usuario u JOIN permiso p ON u.id=p.usuario WHERE u.id=:id");
if($stmt->execute(array(':id'=>$id)))
{
$response = "<table border='0' width='20%'>";
	$row=$stmt->fetch(PDO::FETCH_ASSOC);{
	$nombre=$row['nombre'];
	$paterno=$row['paterno'];
	$materno=$row['materno'];
	$depto=$row['depto'];
	$tipo=$row['tipo'];

	$response .= "<h5>Detalles del Usuario</h5>";
	$response .= "<tr>";
		$response .= "<td>Nombre : </td><td>".$nombre."</td>";
	$response .= "</tr>";
	$response .= "<tr>";
		$response .= "<td>Apellido Paterno : </td><td>".$paterno."</td>";
	$response .= "</tr>";
	$response .= "<tr>";
		$response .= "<td>Apellido Materno : </td><td>".$materno."</td>";
	$response .= "</tr>";
	$response .= "<tr>";
		$response .= "<td>Departamento : </td><td>".$depto."</td>";
	$response .= "</tr>";
	$response .= "<tr>";
		$response .= "<td>Tipo : </td><td>".$tipo."</td>";
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