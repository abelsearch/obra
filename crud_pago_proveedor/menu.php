<?php  
session_start();
if(isset($_SESSION['usuario'])){
  $usuario = $_SESSION['usuario']; 
  $tipo = $_SESSION['tipo']; 
  $id = $_SESSION['id'];
} 
else
header("Location: http://seicolaguna.com/sistema/logout.php");
?>

<?php require_once 'ti.php' ?> 

<!--<body class="#eceff1 blue-grey lighten-4">Color de fondo del esccritorio-->
  <!--Menú de cabecera de ICONOS-->
  <nav class=" yellow darken-4 nav-extended"><!--Color del menú-->
    <div class="nav-wrapper escritorio">  <!--Se usa la clase escritorio para pintar el menú donde termina el sidenav-->
      <ul class="right hide-on-med-and-down" id="menu_iconos"> 
        <li><a href="javascript:history.back()" id="back"><i class="material-icons">arrow_back</i></a></li>
        <?php 
          if($tipo == 1){
          ?>  
          <li><a href="http://seicolaguna.com/sistema/usuario_index.php"class="tooltipped" data-position="left" data-tooltip="Usuarios"><i class="material-icons white-text">supervised_user_circle</i></a></li> 

          <li><a href="http://seicolaguna.com/sistema/clave.php"class="tooltipped" data-position="left" data-tooltip="Claves"><i class="material-icons white-text">vpn_key</i></a></li> 

          <li><a href="http://seicolaguna.com/sistema/bitacora_obra.php" class="white-text"class="tooltipped" data-position="left" data-tooltip="Bitácora"><i class="material-icons white-text">track_changes</i></a> 
          <?php
          } 
          else{ 
          ?> 
          <?php 
          ?> 
          <?php
            } 
        ?>    
        <li><a href="http://seicolaguna.com/sistema/logout.php" class="tooltipped" data-position="left" data-tooltip="Cerrar Sesión"><i class="material-icons">cancel</i></a></li>
      </ul>
    </div>
    <!--Termina menú cabecera de iconos-->
    <!--Menú de tabs-->
   
   </nav>
           
<!--Estilos para control de contenido-->
<style type="text/css">
 li.menu{
  margin-left: 10px;
 }
 div.escritorio{
  margin-left: 200px;
 }
 a.tabs-font{
  font-size: 10px; 
 }
 li.tabs-font{
  font-size: 10px;
 }
</style>
<!--Scripts para control del contenido-->
<script type="text/javascript">
    $(document).ready(function(){
    $('.sidenav').sidenav(); //Función JS para utilizar sidenav
    $('.tooltipped').tooltip(); //Función js para utilizar tooltipped de iconos
  });
</script> 
