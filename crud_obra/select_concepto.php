<?php
include "../db_config.php";
if($_POST['edit_id'])
{
$id = $_POST['edit_id']; 
$folio = $_POST['folio'];
try{
 $stmt=$db_con->prepare("SELECT c.descripcion,c.unidad,c.importe,c.precio_unitario,c.id,c.etapa,
                  ac.importe,ac.cantidad as cant,ac.id AS acid FROM concepto c JOIN avance_concepto ac ON c.id=ac.id_concepto WHERE ac.num_semana=:id ");
                //$stmt->execute(array(':id'=>$id));
 if($stmt->execute(array(':id'=>$id))){
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){            
    $descripcion = $row['descripcion'];
	$unidad=$row['unidad'];
	$importe=$row['importe'];
	$precio_unitario=$row['precio_unitario'];
	$id=$row['id'];
	$etapa=$row['etapa']; 
	$importe=$row['importe'];
	$cantidad=$row['cant']; 
	$acid=$row['acid']; 
    $response.="<option value=".$unidad." 
    id=".$importe." 
    name=".$precio_unitario." 
    class=".$id." 
    data-phase=".$etapa."    
    data-acid=".$acid." 
    data-cant=".$cant."    
    data-impo=".importe."
    >".$descripcion."</option>";
    }  
echo $response; 
//echo $descripcion;
}
else{
echo "Ocurrio un problema";
}
}
catch(PDOException $e){
echo $e->getMessage();
}
}