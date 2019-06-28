<?php
require_once '../db_config.php';
 
if($_POST)
{ 
$proyecto      	 = $_POST['proyecto'];
$folio      	 = $_POST['folio'];
$contrato 		 = $_POST['contrato'];
$titulo			 = $_POST['titulo'];
$cliente		 = $_POST['cliente'];
$presupuesto 	 = $_POST['presupuesto']; 
$residente 	     = $_POST['residente'];
$num_residente 	 = $_POST['num_residente'];
$contratista 	 = $_POST['contratista'];
$num_contratista = $_POST['num_contratista'];
$estado 		 = $_POST['estado'];
$ciudad 		 = $_POST['ciudad'];
$zona 			 = $_POST['zona'];
$lote 			 = $_POST['lote'];
$reporte		 = $_POST['reporte'];
$semana 		 = $_POST['semana'];
$fecha_inicio	 = $_POST['fecha_inicio'];  
$fecha_fin 		 = $_POST['fecha_fin'];   
$fecha 			 = $_POST['fecha'];  
$hora			 = $_POST['hora'];  
$usuario 		 = $_POST['usuario'];  

 
try{
$stmt=$db_con->prepare("INSERT INTO obra(proyecto_id,folio,cliente,contrato,titulo,presupuesto,contratista,num_contratista,residente_obra,
									num_residente,entidad,ciudad,zona, num_semana,res_semana,gasto,estado,fecha,hora)VALUES
	('$proyecto','$folio','$cliente','$contrato','$titulo','$presupuesto','$contratista','$num_contratista','$residente',
	 '$num_residente','$estado','$ciudad','$zona','$semana','$semana',0,
	'TRABAJANDO','$fecha','$hora')");  

$stmt2=$db_con->prepare("INSERT INTO bitacora_obra(folio,usuario,fecha,hora,reporte,accion)
	VALUES('$folio','$usuario','$fecha','$hora','$reporte','ORDEN CREADA')");  

$stmt3=$db_con->prepare("INSERT INTO semana(folio,num_semana,fecha_inicio,fecha_fin)VALUES('$folio',1,'$fecha_inicio','$fecha_fin')");   

$stmt4=$db_con->prepare("UPDATE obra SET res_semana=res_semana-1 WHERE folio='$folio'");   


if($stmt->execute())
{  
echo "Obra Creada!!!";	
}
else{
echo "Problemas al crear Obra!!!";
}

if($stmt2->execute())
{  
echo "Bitacora Creada!!!";	
}
else{
echo "Problemas al crear Bitacora!!!";
}

if($stmt3->execute())
{  
echo "Semana Creada!!!";	
}
else{
echo "Problemas al crear Semana!!!";
}

if($stmt4->execute())
{  
echo "Obra Editada!!!";	
}
else{
echo "Problemas al Editar Obra!!!";
}


}
catch(PDOException $e){
echo $e->getMessage();
}
}
?>