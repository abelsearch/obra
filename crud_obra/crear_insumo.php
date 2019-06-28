<?php
require_once '../db_config.php';
 
if($_POST)
{ 
$folio = $_POST['folio']; 
$insumo = $_POST['insumo']; 
$nombre = $_POST['nombre'];  
$unidad = $_POST['unidad'];
$cantidad = $_POST['cantidad']; 
$semana = $_POST['semana'];
$fecha = $_POST['fecha']; 
$hora = $_POST['hora']; 
$usuario = $_POST['usuario']; 

$stmt=$db_con->prepare("INSERT INTO salida_insumo(folio,
	id_insumo,
	nombre_insumo,
	unidad,
	cantidad, 
	num_semana,
	estatus,
	fecha,
	hora)
	VALUES('$folio',
	'$insumo',
	'$nombre',
	'$unidad',
	'$cantidad',
	'$semana',
	'PENDIENTE',
	'$fecha',
	'$hora')"); 

$stmt2=$db_con->prepare("INSERT INTO bitacora_obra(folio,usuario,fecha,hora,reporte,accion)
	VALUES('$folio_orden','$usuario','$fecha','$hora','$nombre','INSUMO CREADO')");  




if($stmt->execute())
{ 
echo "OK";
}
else{
echo "Problemas al agregar Insumo!!!";
}

if($stmt2->execute())
{ 
echo "OK";
}
else{
echo "Problemas al agregar Bitacora!!!";
}


//
}
?>