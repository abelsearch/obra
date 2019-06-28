<?php
require_once '../db_config.php';
 
if($_POST)
{ 
	$id = $_POST['id'];
	$rfc=$_POST['rfc'];
	$razon_social=$_POST['razon_social'];
	$nombre=$_POST['nombre'];
	$domicilio=$_POST['domicilio']; 
	$contacto=$_POST['contacto'];
	$correo=$_POST['correo']; 
	$telefono=$_POST['telefono']; 
	$ciudad=$_POST['ciudad'];
	$estado=$_POST['estado'];
	$estatus=$_POST['estatus'];
	
	$stmt=$db_con->prepare("UPDATE proveedor SET 
	rfc='$rfc',
	razon_social='$razon_social', 
	nombre='$nombre',
	domicilio='$domicilio',
	contacto='$contacto',
	correo='$correo', 
	telefono='$telefono',
	ciudad='$ciudad',
	estado='$estado',
	estatus='$estatus'
	WHERE 
	id='$id'"); 


	if($stmt->execute())
	{
	header("Refresh: 1; http://seicolaguna.com/sistema/catalogo_proveedor.php"); 
	}
	else{
		echo "Ocurrio un problema al editar al Proveedor!!!";
	}
}
?>