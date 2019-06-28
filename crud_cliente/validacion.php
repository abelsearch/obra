<?php
if($_SESSION['tipo']== 1){
?>
<?php include('menu.php'); ?>
<script src="crud_cliente/menu_iconos.js" type="text/javascript"></script>
<?php
}
if($_SESSION['tipo']== 2){
?>
<?php include('menu_operador.php'); ?>
<script src="crud_cliente/menu_iconos.js" type="text/javascript"></script>
<?php
}
if($_SESSION['tipo']== 3){
?>
<?php include('menu_invitado.php'); ?>
<?php
}
?>