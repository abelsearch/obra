<?php
$usuario = $_POST['username'];
$pass = $_POST['password'];

if(empty($usuario) || empty($pass)){
header("Location: login.html");
exit();
}
$con=mysqli_connect('192.185.131.25','seicolag_cadmin','@seicolagc@@','seicolag_constructora'); 
$query=mysqli_query($con,"SELECT * from usuario where nombre_usuario='" . $usuario . "'"); 
if($row = mysqli_fetch_array($query)){
//if($row['password'] == $pass){
//if($row['hash'] == ($pass))
//password_verify($pass,$hash){ 
if((isset($row['hash']) && password_verify($pass, $row['hash'])) || $row['password'] == $pass) {	
$tipo=$row['tipo']; 
$id=$row['id'];
session_start();
$_SESSION['usuario'] = $usuario; 
$_SESSION['id'] = $id; 
$_SESSION['tipo'] = $tipo; 
header("Location: http://seicolaguna.com/sistema/index.php");
}

else{
header("Location: http://seicolaguna.com/sistema/login.html");
exit();
}
}else{
header("Location: http://seicolaguna.com/sistema/login.html"); 
echo "Ocurrio un problema";	
exit();
}
?>