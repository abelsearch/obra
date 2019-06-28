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
<style>
  .section_item {/*
  height: auto;
  z-index: 1;
  position: relative;
  text-align: center;*/
 }
.flex-container {/*
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  -webkit-flex-direction: column;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-flex-wrap: nowrap;
  -ms-flex-wrap: nowrap;
  flex-wrap: nowrap;
  /*-webkit-justify-content: center;*//*
  -ms-flex-pack: center;
  /*justify-content: center;*//*
  -webkit-align-content: space-around;
  -ms-flex-line-pack: distribute;
  align-content: space-around;
  /*-webkit-align-items: center;
  -ms-flex-align: center;
  align-items: center;*/
 }
.flex-item {/*
  -webkit-order: 0;
  -ms-flex-order: 0;
  order: 0;
  -webkit-flex: 0 1 auto;
  -ms-flex: 0 1 auto;
  flex: 0 1 auto;
  -webkit-align-self: auto;
  -ms-flex-item-align: auto;
  align-self: auto;
 }
.section_item p {/*
  font-size: 18px;
  font-size: 1rem;
  color: #fff;
  max-width: 100%;
  line-height: 1.5;*/
 }

/* Background colors */

.color-menu-index {
  background: -webkit-linear-gradient(90deg, #ffba75 10%, #ff7514 90%);
  background:    -moz-linear-gradient(90deg, #ffba75 10%, #ff7514 90%);
  background:     -ms-linear-gradient(90deg, #ffba75 10%, #ff7514 90%);
  background:      -o-linear-gradient(90deg, #ffba75 10%, #ff7514 90%);
  background:         linear-gradient(90deg, #ffba75 10%, #ff7514 90%);
}
</style>
<!--<body class="#eceff1 blue-grey lighten-4">Color de fondo del esccritorio-->
  <!--Menú de cabecera de ICONOS-->
  <nav class=" section_item flex-container color-menu-index nav-extended"><!--Color del men yellow darken-4ú-->
    <div class="nav-wrapper escritorio">  <!--Se usa la clase escritorio para pintar el menú donde termina el sidenav-->
      <ul class="right hide-on-med-and-down">
        <ul class="right hide-on-med-and-down"> 
        <li><a href="#" id="back"><i class="material-icons">arrow_back</i></a></li>
        
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
      </ul>
    </div>
    <!--Termina menú cabecera de iconos-->
    <!--Menú de tabs-->

  <div class="nav-content escritorio"><!--Se usa la clase escritorio para pintar los tabs donde termina el sidenav-->
      <!--<ul class="tabs tabs-transparent">                   
        <li class="tab"><a href="http://seicolaguna.com/sistema/cliente_index.php" class="tabs-font">Cliente</a></li>
        <li class="tab"><a href="http://seicolaguna.com/sistema/orden_index.php" class="tabs-font">Orden</a></li>
        <li class="tab"><a href="http://seicolaguna.com/sistema/adicional_index.php" class="tabs-font">Adicional</a></li>
        <li class="tab"><a href="http://seicolaguna.com/sistema/extra_index.php" class="tabs-font">Extra</a></li> 
      </ul>-->
    </div>
   </nav>           
</body>
<!--Estilos para control de contenido-->
<style type="text/css"> 
 div.escritorio{  
  margin-left: 300px;
 } 
</style>
<!--Scripts para control del contenido-->
<script type="text/javascript">
    $(document).ready(function(){
    $('.sidenav').sidenav(); //Función JS para utilizar sidenav
    $('.tooltipped').tooltip(); //Función js para utilizar tooltipped de iconos
  });
</script>
</html>