<?php
$usuario = $_POST['username'];
$pass = $_POST['password'];

if(empty($usuario) || empty($pass)){
header("Location: login.php");
exit();
}

mysql_connect('192.185.131.131','cedegmx_adminc','@cedeg@@') or die("Error al conectar " . mysql_error());
mysql_select_db('cedegmx_constructora') or die ("Error al seleccionar la Base de datos: " . mysql_error());

$result = mysql_query("SELECT * from usuario where nombre='" . $usuario . "'");

if($row = mysql_fetch_array($result)){
if($row['password'] == $pass){ 
$id=$row['id'];	 
$tipo=$row['tipo'];
session_start();
$_SESSION['nombre'] = $usuario; 
$_SESSION['id'] = $id; 
$_SESSION['tipo'] = $tipo;
header("Location: http://cedeg.mx/iisac/index.php");
}else{
header("Location: http://cedeg.mx/iisac/login.html");
exit();
}
}else{
header("Location: http://cedeg.mx/iisac/login.html");
exit();
}

?>
