<?php 
$db_host="192.185.131.25";
$db_name="seicolag_constructora"; 
$db_user="seicolag_cadmin";
$db_pass="@seicolagc@@";
try{ 
$db_con=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
} 
catch(PDOException $e){ 
echo $e->getMessage();
}
?>