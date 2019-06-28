<?php
require_once '../db_config.php';
 
if($_POST)
{ 
$folio = $_POST['folio']; 
$num_semana = $_POST['num_semana'];  
$fecha_inicio = $_POST['fecha_inicio'];  
$fecha_fin = $_POST['fecha_fin'];
//try{ 

$stmt0=$db_con->prepare("SELECT COUNT(*) FROM semana WHERE num_semana=$num_semana AND folio='$folio'");  

$stmt0->execute();
//$stmt0->fetchAll();  
//$counts = $stmt0->fetch(); 
//echo $counts;
//if($stmt0->execute(array(':num_semana'=>$num_semana)))
//{
//	while($row=$stmt0->fetch(PDO::FETCH_ASSOC)){ 
	//$s_folio = $row['folio'];	
	//$semana = $row['num_semana']; 
//	$counts = $count+1;
//}

//if($counts < 1)
if ($stmt0->fetchColumn() < 1)
{
$stmt=$db_con->prepare("INSERT INTO semana(folio,num_semana,fecha_inicio,fecha_fin)VALUES('$folio','$num_semana','$fecha_inicio','$fecha_fin')");  

$stmt2=$db_con->prepare("UPDATE obra SET res_semana=res_semana-1 WHERE folio='$folio'");  

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
  echo "Ocurrio un problema";
}

} 
else{
echo "FATAL ERROR!!!";	
}


//}
//catch(PDOException $e){
//echo $e->getMessage();
//}


//}

}
?>