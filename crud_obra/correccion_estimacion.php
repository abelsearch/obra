<?php
include "../db_config.php";
if($_POST['id'])
{
$id = $_POST['a_id']; 
$c_folio = $_POST['folio']; 
$c_semana = $_POST['semana'];
$c_cantidad = $_POST['cantidad'];
$c_est_importe = $_POST['est_importe'];
$c_porcentaje_con = $_POST['porcentaje_con']; 
$c_porcentaje_pre = $_POST['porcentaje_pre'];
$c_id_concepto = $_POST['id'];  
$clave = $_POST['clave'];
//try{ 

$stmt=$db_con->prepare("SELECT * FROM clave WHERE clave=:clave");
$stmt->execute(array(':clave'=>$clave));  
$row=$stmt->fetch(PDO::FETCH_ASSOC); 
if($row == 0) {
echo "nada";
?>

<?php    
} 
else { 

$stmt2=$db_con->prepare("UPDATE avance_concepto SET 
	cantidad=cantidad+$cantidad-cantidad, 
	importe=importe+$c_est_importe-importe,  
	p_concepto=p_concepto+$c_porcentaje_con-p_concepto, 
	p_presupuesto=p_presupuesto+$c_porcentaje_pre-p_presupuesto
	WHERE id = '$id'"); 

if($stmt2->execute())
{ 
echo "OK"; 
}
else{
echo "Ocurrio un problema!!!";
} 


/**$stmt2=$db_con->prepare("SELECT * FROM avance_concepto WHERE id=:id");
if($stmt2->execute(array(':c_id'=>$c_id)))
{
	while($row=$stmt2->fetch(PDO::FETCH_ASSOC)){
	$id = $row['id'];
	$etapa=$row['etapa'];
	$concepto=$row['concepto'];
	$unidad=$row['unidad'];
	$importe=$row['importe'];
	$cantidad=$row['cantidad']; 
	$avance_concepto=$row['avance_concepto'];
	$avance_presupuesto=$row['avance_presupuesto'];
	}

	$n_cantidad=$cantidad+$c_cantidad-$cantidad; 
	$n_importe=$importe+$c_est_importe-$importe; 
	$n_con=$avance_concepto+$c_porcentaje_con-$avance_concepto; 
	$n_pre=$avance_presupuesto+$c_porcentaje_pre-$avance_presupuesto; 

	$stmt3=$db_con->prepare("UPDATE avance_concepto SET 
	cantidad=$n_cantidad, 
	importe=$n_importe,  
	p_concepto=$n_con, 
	p_presupuesto=$n_pre
	WHERE id = '$id'");   
}

else{
echo "Ocurrio un problema";
}
**/
}
//}
//catch(PDOException $e){
//echo $e->getMessage();
//}
//
}