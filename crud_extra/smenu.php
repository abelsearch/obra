<?php  
session_start();
if(isset($_SESSION['usuario'])){
  $usuario = $_SESSION['usuario']; 
  $tipo = $_SESSION['tipo']; 
  $id = $_SESSION['id'];
} 
else 
header("Location: login.html");
?> 
<?php require_once 'ti.php' ?>
<html>
<head> 
   <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
   <script src="js/materialize.min.js" type="text/javascript"></script>
   <meta charset="utf-8">
   <title>SEICO</title>
</head>
<body class="#eceff1 blue-grey lighten-4"><!--Color de fondo del esccritorio-->
  <!--Menú de cabecera de ICONOS-->
  <!--Inicia Menú lateral fijo Sidenav-->
    <ul id="slide-out" class="sidenav sidenav-fixed #263238 grey darken-4 z-depth-5" ><!--Color del sidenav--> 
    <li class="center"><img src="img/seico.jpg" height="90" width="250" style="margin-top:2px;" class=""></li>
      <!--<li class="center"><i class="material-icons white-text large">accessible_forward</i></li>--><!--Icono o LOGO del sistema
      <li class="center"><label>SEICO</label></li>-->
      <li class="center"><label>Usuario Activo: </label></li>
      <li class="center"><label><?php echo $_SESSION['usuario']; ?></label></li>
      <li><a href="http://seicolaguna.com/sistema/index.php" class="white-text"><i class="material-icons white-text">360</i>Inicio</a></li>
      <li class="#455a64 blue-grey darken-2 center grey-text">HERRAMIENTAS</li><br> 
      <li><a href="http://seicolaguna.com/sistema/obra_index.php" class="white-text"><i class="material-icons white-text">meeting_room</i>Obras</a></li>
      <li><a href="http://seicolaguna.com/sistema/cliente_index.php" class="white-text"><i class="material-icons white-text">group</i>Clientes</a></li>      
      <li><a href="http://seicolaguna.com/sistema/catalogo_index.php" class="white-text"><i class="material-icons white-text">sort</i>Catálogo Servicios</a></li>
      <li><a href="http://seicolaguna.com/sistema/catalogo_insumo.php" class="white-text"><i class="material-icons white-text">sort</i>Catálogo de Insumos</a></li>
      <li><a href="http://seicolaguna.com/sistema/catalogo_flujo.php" class="white-text"><i class="material-icons white-text">sort</i>Catálogo de Flujos</a></li>
    <?php /* 
      if($tipo == 1){
      ?> 
      <li><a href="http://seicolaguna.com/sistema/bitacora_orden.php" class="white-text"><i class="material-icons" style="color:white;">schedule</i>Orden</a> 
      <?php
      } 
      else{ 
      ?> 
      <?php 
      ?> 
      <?php
        } */
      ?>    
    </ul>
    <!--<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>Versión Móvil-->
    <!--Iniciar row del escritorio de trabajo, se usa clase escritorio para pintar todo apartir de terminar el SideNav-->
    <div class="row escritorio"> 

    <div class="col l12 m12 s12"> 
    </div> 

    
    <!--Termina el row del escritorio de trabajo-->        
</body>
</html>