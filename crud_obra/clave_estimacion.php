<?php  
include_once '../db_config.php';
if($_POST)
{  
$clave = $_POST['clave'];  
$id = $_POST['edit_id'];

$stmt=$db_con->prepare("SELECT * FROM clave WHERE clave=:clave");
$stmt->execute(array(':clave'=>$clave));  
$row=$stmt->fetch(PDO::FETCH_ASSOC); 
if($row == 0) {
echo "nada";
?>

<?php    
} 
else {

echo "si";
}
} 
?>
