<?php   
session_start(); 
session_destroy();
header("Location: http://seicolaguna.com/sistema/login.html"); 
exit();
?>