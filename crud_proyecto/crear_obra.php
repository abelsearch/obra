<?php 
require_once '../db_config.php';
 
if($_POST)
{ 
$id      	 = $_POST['id'];
$rango      	 = $_POST['rango'];
$modelo 		 = $_POST['modelo'];
$fecha 			 = $_POST['fecha'];  
$hora			 = $_POST['hora'];    
$folio			 = $_POST['folio'];    
$cliente      	 = $_POST['cliente'];
$semana 		 = $_POST['semana'];
$presupuesto 	 = $_POST['presupuesto'];  
$entidad		 = $_POST['entidad'];    
$ciudad			 = $_POST['ciudad'];    



$stmt=$db_con->prepare("INSERT INTO obra(proyecto_id,folio,cliente,presupuesto,entidad,ciudad,fecha,hora,estado,id_modelo,num_semana,res_semana,gasto)VALUES
	($id,'OBRA-$folio','$cliente','$presupuesto','$entidad','$ciudad','$fecha','$hora','TRABAJANDO','$modelo','$semana','$semana',0)");  

if($stmt->execute())
{  
echo "Obra Creada!!!";	
}
else{
echo "Problemas al crear Obra!!!";
}

$rango=$rango-1;
 
try{
for ($i=0; $i < $rango  ; $i++) { 

$folio=$folio+1;

$stmt2=$db_con->prepare("INSERT INTO obra(proyecto_id,folio,cliente,presupuesto,entidad,ciudad,fecha,hora,estado,id_modelo,num_semana,res_semana)VALUES
	($id,'OBRA-$folio','$cliente','$presupuesto','$entidad','$ciudad','$fecha','$hora','TRABAJANDO','$modelo','$semana', '$semana')");  


if($stmt2->execute())
{  
echo "Obra Creada!!!";	
}
else{
echo "Problemas al crear Obra!!!";
}
}

}
catch(PDOException $e){
echo $e->getMessage();
}
}


?>	