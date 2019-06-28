<?php   
include_once '../db_config.php';
if($_GET['id'])
{
$id = $_GET['id']; 
$stmt=$db_con->prepare("SELECT * FROM evidencia WHERE id=:id");
$stmt->execute(array(':id'=>$id)); 
$row=$stmt->fetch(PDO::FETCH_ASSOC);
} 
$file = './Archivos/' . $row['folio'];
header("Content-type: $mimeType");
header('Content-Disposition: attachment;filename="descarga.jpg"'); 
header('Content-type: application/force-download'); 
readfile('./Archivos/' . $row['nuevo_nombre']);
?>