<?php
$usuario = $_POST['username'];
$pass = $_POST['password'];

if(empty($usuario) || empty($pass)){
header("Location: login.html");
exit();
}
$con=mysqli_connect('localhost','constructora','','root'); 
$query=mysqli_query($con,"SELECT * from usuario where nombre='" . $usuario . "'"); 
if($row = mysqli_fetch_array($query)){
if($row['password'] == $pass){
//if($row['password'] == md5($pass)){
//$tipo=$row['tipo']; 
$id=$row['id'];
session_start();
$_SESSION['usuario'] = $usuario; 
$_SESSION['id'] = $id; 
//$_SESSION['tipo'] = $tipo; 
header("Location: http://127.0.0.1/obra/index.php");
}else{
header("Location: http://127.0.0.1/obra/login.html");
exit();
}
}else{
header("Location: http://127.0.0.1/obra/login.html"); 
echo "Ocurrio un problema";	
exit();
}
?>