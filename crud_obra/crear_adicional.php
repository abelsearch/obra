<?php
require_once '../db_config.php';
 
if($_POST)
{ 
$folio = $_POST['folio']; 
$descripcion = $_POST['descripcion'];  
$precio = $_POST['precio'];
$semana = $_POST['semana'];
$fecha = $_POST['fecha'];  
$hora = $_POST['hora'];
$usuario = $_POST['usuario']; 

try{
$stmt=$db_con->prepare("INSERT INTO adicional(folio_orden,descripcion,precio,fecha,hora,resta)VALUES('$folio','$descripcion','$precio','$fecha','$hora','$precio')");  

$stmt2=$db_con->prepare("INSERT INTO bitacora_obra(folio_orden,usuario,fecha,hora,reporte,accion)VALUES('$folio','$usuario','$fecha','$hora','$descripcion','ADICIONAL AGREGADO')");  

$stmt3=$db_con->prepare("INSERT INTO avance_adicional(folio,num_semana,fecha,concepto,costo)VALUES('$folio','$semana','$fecha','$descripcion','$precio')");  

$stmt4=$db_con->prepare("UPDATE semana SET adicional=adicional+'$precio'  WHERE folio = '$folio' AND num_semana = '$semana'"); 



if($stmt->execute())
{ 
echo "Adicional Creado!!!"; 
}

else{
  echo "Problema al agregar ADICIONAL!!!";
}

if($stmt2->execute())
{
  echo "Bitacora Creada!!!"; 
}
else{
  echo "Problema al crear BITACORA!!!";
}

if($stmt3->execute())
{
  echo "Avance Creado!!!"; 
}
else{
  echo "Problema al crear avance ADICIONAL!!!";
}

if($stmt4->execute())
{ 
echo "OK";
}
else{
echo "Problemas al agregar Adicional!!!";
}





}
catch(PDOException $e){
echo $e->getMessage();
}

}
?>