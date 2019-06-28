<?php require_once 'ti.php' ?>
 
<html>
<head>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
   <script src="js/materialize.min.js" type="text/javascript"></script>
   <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
   <meta charset="utf-8">
   <title>SEICO</title>
</head>
<!--<body class="#eceff1 blue-grey lighten-4">Color de fondo del esccritorio-->
  <!--Menú de cabecera de ICONOS-->
  <nav class=" yellow darken-4 nav-extended"><!--Color del menú-->
    <div class="nav-wrapper escritorio">  <!--Se usa la clase escritorio para pintar el menú donde termina el sidenav-->
      <ul class="right hide-on-med-and-down">
        <li><a href="sass.html"><i class="material-icons">search</i></a></li>
        <li><a href="badges.html"><i class="material-icons">view_module</i></a></li>
        <li><a href="collapsible.html"><i class="material-icons">refresh</i></a></li>
        <li><a href="http://seicolaguna.com/sistema/logout.php" class="tooltipped" data-position="left" data-tooltip="Cerrar Sesión"><i class="material-icons">cancel</i></a></li>
      </ul>
    </div>
    <!--Termina menú cabecera de iconos-->
    <!--Menú de tabs-->
    <div class="nav-content escritorio"><!--Se usa la clase escritorio para pintar los tabs donde termina el sidenav-->
      <ul class="tabs tabs-transparent">   
        <!--<li class="tab"> 
        <a href="http://seicolaguna.com/sistema/cliente_index.php" class="tabs-font"><i class="material-icons" style="color:white;">face</i></a>Clientes</li> 

        <li class="tab">
        <a href="http://seicolaguna.com/sistema/orden_index.php" class="white-text"><i class="material-icons" style="color:white;">create</i></a></li> 

        <li class="tab">
        <a href="http://seicolaguna.com/sistema/adicional_index.php" class="white-text"><i class="material-icons" style="color:white;">build</i></a></li>  

        <li class="tab">
        <a href="http://seicolaguna.com/sistema/extra_index.php" class="white-text"><!--<i class="material-icons" style="color:white;">build</i></a></li>-->   

        
        <li class="tab"><a href="http://seicolaguna.com/sistema/cliente_index.php" class="tabs-font">Cliente</a></li>
        <li class="tab"><a href="http://seicolaguna.com/sistema/orden_index.php" class="tabs-font">Orden</a></li>
        <li class="tab"><a href="http://seicolaguna.com/sistema/adicional_index.php" class="tabs-font">Adicional</a></li>
        <li class="tab"><a href="http://seicolaguna.com/sistema/extra_index.php" class="tabs-font">Extra</a></li> 
        <!--
        <li class="tab"><a href="#test4" class="tabs-font">Citas</a></li>
        <li class="tab"><a href="#test4" class="tabs-font">Incapacidad</a></li>
        <li class="tab"><a href="#test4" class="tabs-font">Antecedente</a></li> 
        -->
      </ul>
    </div>
   </nav>
           
</body>
<!--Estilos para control de contenido-->
<style type="text/css">
 li.menu{
  margin-left: 10px;
 }
 div.escritorio{
  margin-left: 300px;
 }
 a.tabs-font{
  font-size: 40px; 
 }
 li.tabs-font{
  font-size: 20px;
 }
</style>
<!--Scripts para control del contenido
<script type="text/javascript">
    $(document).ready(function(){
    $('.sidenav').sidenav(); //Función JS para utilizar sidenav
    $('.tooltipped').tooltip(); //Función js para utilizar tooltipped de iconos
  });
</script>-->
</html>