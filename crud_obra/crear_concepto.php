<?php
require_once '../db_config.php';
 
if($_POST)
{ 
$folio       = $_POST['folio']; 
$etapa       = $_POST['etapa'];
$descripcion = $_POST['descripcion'];  
$unidad      = $_POST['unidad'];
$cantidad    = $_POST['cantidad'];
$precio      = $_POST['precio'];
$semana      = $_POST['semana'];
$fecha       = $_POST['fecha'];  
$hora        = $_POST['hora'];
$usuario     = $_POST['usuario']; 
$modelo     = $_POST['modelo']; 
$partida     = $_POST['partida'];

try{
$stmt=$db_con->prepare("INSERT INTO concepto(id,
	etapa,
	folio,
	descripcion,
	unidad,
	cantidad,
	res_cantidad,
	est_cantidad,
	precio_unitario,
	importe, 
	est_importe, 
	p_concepto, 
	p_presupuesto,
	fecha,
	hora)
	VALUES('','$etapa','$folio','$descripcion','$unidad','$cantidad','$cantidad',0,'$precio','$cantidad'*'$precio',
	0,
	0,
	0,
	'$fecha',
	'$hora')");  


$stmt3=$db_con->prepare("INSERT INTO bitacora_obra(folio_orden,usuario,fecha,hora,reporte,accion)
	VALUES('$folio','$usuario','$fecha','$hora','$descripcion','CONCEPTO AGREGADO')"); 



if($stmt->execute())
{ 
echo "Concepto registrado exitosamente"; 
}
else{
echo "Error, refresca la página y vuelve a intentar";
}


if($stmt3->execute())
{ 
echo "Tu registro ya está listo en la bitacora";
}
else{
echo "Error en bitácora, hubo un error, refresca la página y vuelve a intentar";
}


}
catch(PDOException $e){
echo $e->getMessage();
}

}
?>