<?php
require_once '../db_config.php';
if($_POST)
{
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
	$fecha=$_POST['fecha'];
	
try{
	$stmt=$db_con->prepare("INSERT INTO proveedor( 
	rfc,	
	razon_social,
	nombre,
	domicilio, 
	contacto, 
	correo, 
	telefono, 
	ciudad,
	estado,
	estatus,
	fecha
	)VALUES( 
	'$rfc',	
	'$razon_social',
	'$nombre',
	'$domicilio', 
	'$contacto', 
	'$correo', 
	'$telefono', 
	'$ciudad',
	'$estado',
	'$estatus',
	'$fecha'
	)");

if($stmt->execute())
{
header("Refresh: 1; http://seicolaguna.com/sistema/catalogo_proveedor.php");
}
else{
echo "Ocurrio un problema al insertar el Proveedor!!!";
}
}
catch(PDOException $e){
	echo $e->getMessage();
}
}
?>