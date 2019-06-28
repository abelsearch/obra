<?php
require_once '../db_config.php';
 
if($_POST)
{ 
$folio = $_POST['folio']; 
$semana = $_POST['semana'];
$fecha = $_POST['fecha'];  
$concepto = $_POST['concepto'];  
$unidad = $_POST['unidad'];
$cantidad = $_POST['cantidad'];
$importe = $_POST['importe'];
$porcentaje_con = $_POST['porcentaje_con']; 
$porcentaje_pre = $_POST['porcentaje_pre'];
$hora = $_POST['hora'];
$usuario = $_POST['usuario'];
$id = $_POST['id']; 
$a_id = $_POST['a_id']; 
$etapa = $_POST['etapa'];
$est_importe = $_POST['est_importe'];
$cantidad_n = $_POST['cantidad_n'];
$importe_n = $_POST['importe_n']; 
$presu_n = $_POST['presu_n'];
$conce_n = $_POST['conce_n'];


try{
$stmt=$db_con->prepare("UPDATE avance_concepto SET cantidad=$cantidad,
	importe=$est_importe,  
	avance_concepto=$porcentaje_con, 
	avance_presupuesto=$porcentaje_pre
	WHERE id='$a_id'");  

$stmt2=$db_con->prepare("INSERT INTO bitacora_obra(folio,usuario,fecha,hora,reporte,accion)
	VALUES('$folio','$usuario','$fecha','$hora','$concepto','ESTIMACIÓN MODIFICADA')"); 

$stmt3=$db_con->prepare("UPDATE concepto SET res_cantidad=res_cantidad+$cantidad_n-$cantidad, 
	est_cantidad=est_cantidad-$cantidad_n+$cantidad, 
	est_importe=est_importe-$importe_n+$est_importe,  
	p_concepto=p_concepto-$conce_n+$porcentaje_con, 
	p_presupuesto=p_presupuesto-$presu_n+$porcentaje_pre
	WHERE id = '$id'");  

$stmt4=$db_con->prepare("UPDATE semana SET concepto=concepto-$importe_n+$est_importe,  
	avance_total=avance_total-$importe_n+$est_importe,
	avance_porcentaje=avance_porcentaje-$presu_n+$porcentaje_pre 
	WHERE folio = '$folio' AND num_semana = '$semana'"); 


$stmt5=$db_con->prepare("UPDATE obra SET gasto=gasto-$importe_n+$est_importe
	WHERE folio = '$folio'");  


if($stmt->execute())
{ 
echo "OK"; 
}
else{
echo "Ocurrio un problema al insertar Estimación!!!";
}

if($stmt2->execute())
{ 
echo "OK"; 
}
else{
echo "Ocurrio un problema al crear Bitacora!!!";
} 

if($stmt3->execute())
{ 
echo "OK";
}
else{
echo "Problemas al actualizar Concepto!!!";
}

if($stmt4->execute())
{ 
echo "OK";
}
else{
echo "Problemas al actualizar Semana!!!";
}

if($stmt5->execute())
{ 
echo "OK";
}
else{
echo "Problemas al actualizar Gasto!!!";
}


}
catch(PDOException $e){
echo $e->getMessage();
}

}
?>