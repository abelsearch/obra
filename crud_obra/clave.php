<?php  
include_once '../db_config.php';
if($_POST)
{  
$clave = $_POST['clave'];  
$id = $_POST['edit_id'];

$stmt=$db_con->prepare("SELECT * FROM clave  WHERE clave=:clave");
$stmt->execute(array(':clave'=>$clave));  
$row=$stmt->fetch(PDO::FETCH_ASSOC);
//$numfilas = $stmt->num_rows; 
if($row == 0) {
echo "nada";
?>

<?php    
} 
else {
$stmt2=$db_con->prepare("UPDATE lista_insumo SET estado = 'EDITABLE'  WHERE id=:id");
$stmt2->execute(array(':id'=>$id)); 

echo "si";
}
} 
?>
