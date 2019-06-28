<?php
require_once '../db_config.php';
if($_POST)
{
	$razon_social=$_POST['razon_social'];
	$nombre_comercial=$_POST['nombre_comercial'];
	$rfc=$_POST['rfc'];
	$calle=$_POST['calle'];
	$colonia=$_POST['colonia'];
	$numero=$_POST['numero'];
	$codigo_postal=$_POST['codigo_postal'];
	$ciudad=$_POST['ciudad'];
	$estado=$_POST['estado'];
	$telefono=$_POST['telefono'];
	$nombre_contacto=$_POST['nombre_contacto'];
	$correo=$_POST['correo'];
try{
	$stmt=$db_con->prepare("INSERT INTO cliente(
	razon_social,
	nombre_comercial,
	rfc,
	calle,
	colonia,
	numero,
	codigo_postal,
	ciudad,
	estado,
	telefono,
	nombre_contacto,
	correo
	)VALUES(
	'$razon_social',
	'$nombre_comercial',
	'$rfc',
	'$calle',
	'$colonia',
	'$numero',
	'$codigo_postal',
	'$ciudad',
	'$estado',
	'$telefono',
	'$nombre_contacto',
	'$correo'
	)");
if($stmt->execute())
{
header("Refresh: 1; http://seicolaguna.com/sistema/cliente_index.php");
}
else{
echo "Ocurrio un problema al insertar el Cliente!!!";
}
}
catch(PDOException $e){
	echo $e->getMessage();
}
}
?>