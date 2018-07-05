<?php
require_once '../db_config.php';
 
if($_POST)
{ 
	$id = $_POST['id'];
	$razon_social=$_POST['razon_social']; 
	$nombre_comercial=$_POST['nombre_comercial']; 
	$rfc=$_POST['rfc']; 
	$calle=$_POST['calle']; 
	$colonia=$_POST['colonia']; 
	$numero=$_POST['numero']; 
	$codigo_postal=$_POST['codigo_postal']; 
	$telefono=$_POST['telefono']; 
	$nombre_contacto=$_POST['nombre_contacto']; 
	$estado=$_POST['estado']; 
	$ciudad=$_POST['ciudad']; 
	$correo=$_POST['correo']; 

	$stmt=$db_con->prepare("UPDATE cliente SET 
	razon_social='$razon_social', 
	nombre_comercial='$nombre_comercial',
	rfc='$rfc',
	calle='$calle',
	colonia='$colonia',
	numero='$numero',
	codigo_postal='$codigo_postal',
	telefono='$telefono',
	nombre_contacto='$nombre_contacto',
	estado='$estado',
	ciudad='$ciudad',
	correo='$correo'
	WHERE 
	id='$id'"); 


	if($stmt->execute())
	{
		//header("http://127.0.0.1/PHP-AJAX/cliente_index.php"); 

	}
	else{
		echo "Query Problem";
	}
}
?>