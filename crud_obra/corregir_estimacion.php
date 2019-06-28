<?php
require_once '../db_config.php';
 
if($_POST)
{  
$clave = $_POST['clave'];
$id = $_POST['id'];
$cantidad = $_POST['cantidad'];
$porcentaje_con = $_POST['porcentaje_con']; 
$porcentaje_pre = $_POST['porcentaje_pre']; 
$est_importe = $_POST['est_importe'];
$folio = $_POST['folio'];
$semana = $_POST['semana'];
try{  

$stmt0=$db_con->prepare("SELECT * FROM avance_concepto WHERE id_concepto=:id");
if($stmt0->execute(array(':id'=>$id)))
{
$row=$stmt0->fetch(PDO::FETCH_ASSOC);{
$last_cant = $row['last_cant'];
$last_imp = $row['last_imp']; 
$last_av_con = $row['last_av_con'];
$last_av_pre = $row['last_av_pre'];
}


$stmt=$db_con->prepare("SELECT * FROM clave WHERE clave=:clave");
$stmt->execute(array(':clave'=>$clave));  
$row=$stmt->fetch(PDO::FETCH_ASSOC); 
if($row == 0) {
echo "nada";
?>

<?php    
} 
else { 

$stmt=$db_con->prepare("UPDATE avance_concepto  
	SET 
	cantidad=cantidad-'$last_cant'+'$cantidad',  
	avance_concepto=avance_concepto-'$last_av_con'+'$porcentaje_con', 
	avance_presupuesto=avance_presupuesto-'$last_av_pre'+'$porcentaje_pre', 
	importe=importe-'$last_imp'+'$est_importe' 
	WHERE id_concepto = '$id'
	");  

$stmt2=$db_con->prepare("UPDATE concepto SET res_cantidad=res_cantidad+'$last_cant'-'$cantidad', 
	est_importe=est_importe-'$last_imp'+'$est_importe',   
	p_concepto=p_concepto-'$last_av_con'+'$porcentaje_con', 
	p_presupuesto=p_presupuesto-'$last_av_pre'+'$porcentaje_pre' 
	WHERE id = '$id'");      

$stmt3=$db_con->prepare("UPDATE semana SET concepto=concepto-'$last_imp'+'$est_importe' 
	WHERE folio = '$folio' AND num_semana = '$semana'");  


if($stmt->execute())
{ 
echo "OK"; 
}
else{
echo "Ocurrio un problema al actualizar Avance Concepto!!!";
}

if($stmt2->execute())
{ 
echo "OK"; 
}
else{
echo "Ocurrio un problema al actualizar Concepto!!!";
} 

if($stmt3->execute())
{ 
echo "OK";
}
else{
echo "Problemas al actualizar Semana!!!";
}


echo "si";
}



} 
else{
	echo "Ocurrio un problema";
} 




}
catch(PDOException $e){
echo $e->getMessage();
}



}
?>