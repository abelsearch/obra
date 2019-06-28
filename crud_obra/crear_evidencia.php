<form>
	<input type="button" value="Hecho!!! Pulse aquí para regresar" onClick="javascript:history.go(-1)" />
</form>
<?php
require_once '../db_config.php'; 
if($_POST)
{ 
if(isset($_FILES['file'])){
$folio = $_POST['folio']; 
$fecha = $_POST['fecha']; 
$hora = $_POST['hora']; 
$usuario = $_POST['usuario'];
$reporte = $_POST['reporte']; 
$semana = $_POST['semana'];
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
$stmt=$db_con->prepare("INSERT INTO evidencia(folio,num_semana,fecha,hora,reporte,img,ext,ruta,nuevo_nombre)VALUES('$folio','$semana','$fecha','$hora','$reporte','$file_name','$ext','$file_destination','$file_name_new')");  

$stmt2=$db_con->prepare("INSERT INTO bitacora_obra(folio_orden,usuario,fecha,hora,reporte,accion)
	VALUES('$folio','$usuario','$fecha','$hora','$reporte','EVIDENCIA DE TRABAJO')"); 

if($stmt->execute())
{ 
//echo "OK";  
//header("Refresh: 1; http://seicolaguna.com/sistema/crud_obra/evidencia.php?id=$folio");
//header("location:javascript://history.go(-1)");
}
else{
  //echo "Ocurrio un problema"; 
  //header("location:javascript://history.go(-1)");
}

if($stmt2->execute())
{ 	
//echo "OK";  
//header("location:javascript://history.go(-1)");
}
else{
  //echo "Ocurrio un problema"; 
  //header("location:javascript://history.go(-1)");
}
}
catch(PDOException $e){
echo $e->getMessage();
}
}
}
?>