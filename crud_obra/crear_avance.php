<?php
require_once '../db_config.php';
 
if($_POST)
{ 
if(isset($_FILES['file'])){
$folio = $_POST['folio']; 
$fecha = $_POST['fecha']; 
$reporte = $_POST['reporte'];
$file=$_FILES['file'];  
$file_name=$file['name']; 
$file_tmp=$file['tmp_name'];  
$info = pathinfo($_FILES['file']['name']);
$ext = $info['extension']; 
$file_ext=explode('.', $file_name); 
$file_ext=strtolower(end($file_ext));
$file_name_new=uniqid('folio',true) . '.' . $file_ext;
$file_destination='./Archivos/' . $file_name_new; 
move_uploaded_file($file_tmp, $file_destination);


try{
$stmt=$db_con->prepare("INSERT INTO avance(folio_orden,fecha,reporte,img,ext,ruta,nuevo_nombre)VALUES('$folio','$fecha','$reporte','$file_name','$ext','$file_destination','$file_name_new')");  

if($stmt->execute())
{ 
echo "OK";  
header("location:javascript://history.go(-1)");
}

else{
  echo "Ocurrio un problema";
}

}

catch(PDOException $e){
echo $e->getMessage();
}




}
}
?>