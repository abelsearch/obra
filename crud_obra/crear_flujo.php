<?php
require_once '../db_config.php';
 
if($_POST)
{ 
$folio = $_POST['folio']; 
$semana = $_POST['semana'];
$tipo = $_POST['tipo']; 
$descripcion = $_POST['descripcion'];  
$cantidad = $_POST['cantidad'];
$fecha = $_POST['fecha'];  
$hora = $_POST['hora'];
$usuario = $_POST['usuario'];

try{
$stmt=$db_con->prepare("INSERT INTO flujo(folio_orden,tipo_gasto,descripcion,cantidad,acumulado,resta,fecha,hora)
	VALUES('$folio','$tipo','$descripcion','$cantidad',0,'$cantidad','$fecha','$hora')");  

$stmt2=$db_con->prepare("INSERT INTO avance_flujo(folio,num_semana,fecha,concepto,costo)VALUES('$folio','$semana','$fecha','$descripcion','$cantidad')");  

$stmt3=$db_con->prepare("INSERT INTO bitacora_obra(folio_orden,usuario,fecha,hora,reporte,accion)VALUES('$folio','$usuario','$fecha','$hora','$descripcion','FLUJO AGREGADO')");   

$stmt4=$db_con->prepare("UPDATE semana SET flujo=flujo+'$cantidad'  WHERE folio = '$folio' AND num_semana = '$semana'"); 




if($stmt->execute())
{ 
echo "OK"; 
}
else{
echo "Ocurrio un problema";
}

if($stmt2->execute())
{ 
echo "OK"; 
}
else{
echo "Ocurrio un problema al insertar Avance!!!";
}

if($stmt3->execute())
{ 
echo "OK"; 
}
else{
echo "Ocurrio un problema al insertar Bitacora!!!";
} 

if($stmt4->execute())
{ 
echo "OK";
}
else{
echo "Problemas al agregar Flujo!!!";
}



}
catch(PDOException $e){
echo $e->getMessage();
}

}
?>