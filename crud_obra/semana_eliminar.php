<?php
include_once '../db_config.php';
if($_POST['del_id'])
{
$id = $_POST['del_id']; 
$stmt=$db_con->prepare("DELETE FROM semana WHERE id=:id");
$stmt->execute(array(':id'=>$id));  

$stmt2=$db_con->prepare("UPDATE obra SET res_semana=res_semana+1"); 

if($stmt2->execute())
{ 
echo "OK"; 
}
else{
  echo "Ocurrio un problema";
}



//if($stmt2->execute())
//{ 
//echo "OK"; 
//}
//else{
//  echo "Ocurrio un problema";
//}

}
?>