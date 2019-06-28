<?php require_once '../ti.php' ?>
<html> 
<style> 
  .tab:hover {
    background-color: #666;
    color: white;
  }
  .active {
    background-color: #666;
    color: white;
  }
  a:local-link {
    background-color: #666;
    color: white;
  }
</style>
<!--<body class="#eceff1 blue-grey lighten-4">Color de fondo del esccritorio-->
    <!--Menú de tabs--> 
  <?php 
    if($_SESSION['tipo']== 3){
    ?>   
    <nav class="color-fondo nav-extended"><!--Color del menú-->
      <div class="nav-wrapper escritorio">  <!--Se usa la clase escritorio para pintar el menú donde termina el sidenav-->
        <ul class="right hide-on-med-and-down" id="ul_iconos"> 
          <li><a href="javascript:history.back()" id="back"><i class="material-icons">arrow_back</i></a></li>
          <li><a href="http://seicolaguna.com/sistema/logout.php" class="tooltipped" data-position="left" data-tooltip="Cerrar Sesión"><i class="material-icons">cancel</i></a></li>
        </ul>
      </div>
       <div class="nav-content escritorio" id="myDIV"><!--Se usa la clase escritorio para pintar los tabs donde termina el sidenav--> 
       </div>
    </nav>

  <?php
    } 
    if($_SESSION['tipo']== 2){ 
    ?>   
    <nav class="color-fondo nav-extended"><!--Color del menú-->
      <div class="nav-wrapper escritorio">  <!--Se usa la clase escritorio para pintar el menú donde termina el sidenav-->
        <ul class="right hide-on-med-and-down" id="ul_iconos"> 
          <li><a href="javascript:history.back()" id="back"><i class="material-icons">arrow_back</i></a></li>
          <li><a href="http://seicolaguna.com/sistema/logout.php" class="tooltipped" data-position="left" data-tooltip="Cerrar Sesión"><i class="material-icons">cancel</i></a></li>
        </ul>
      </div>
      <div class="nav-content escritorio" id="myDIV"><!--Se usa la clase escritorio para pintar los tabs donde termina el sidenav--> 
        <!--<ul class="tabs tabs-transparent">    
          <li class="tab" id="nav-con"><a id="btn-con" href="#" class="tabs-font">Conceptos</a></li>
          <li class="tab" id="nav-ins"><a id="btn-ins2" href="#" class="tabs-font">Insumos</a></li>
          <li class="tab" id="nav-est"><a id="btn-est" href="#" class="tabs-font">Estimaciones</a></li>
          <li class="tab" id="nav-evi"><a id="btn-evi" href="#" class="tabs-font">Evidencias</a></li>
          <li class="tab" id="nav-ava"><a id="btn-ava" href="#" class="tabs-font">Avances</a></li>
        </ul> -->
      </div>
    </nav>    
    <?php 
    ?> 
    <?php
      }  
      if($_SESSION['tipo']== 1){
    ?>    
     <nav class="color-fondo section_item flex-container nav-extended"><!--Color del menú-->
    <div class="nav-wrapper escritorio">  <!--Se usa la clase escritorio para pintar el menú donde termina el sidenav-->
      <ul class="right hide-on-med-and-down" id="ul_iconos"> 
        <li><a href="javascript:history.back()" id="back"><i class="material-icons">arrow_back</i></a></li>
        <li><a href="http://seicolaguna.com/sistema/logout.php" class="tooltipped" data-position="left" data-tooltip="Cerrar Sesión"><i class="material-icons">cancel</i></a></li>
      </ul>
    </div>
    <div class="nav-content escritorio" id="myDIV"><!--Se usa la clase escritorio para pintar los tabs donde termina el sidenav--> 
      <!--<ul class="tabs tabs-transparent">   
        <li class="tab" id="nav-con"><a id="btn-con" href="#" class="tabs-font">Conceptos</a></li>
        <li class="tab" id="nav-ins"><a id="btn-ins" href="#" class="tabs-font">Insumos</a></li>
        <li class="tab" id="nav-est"><a id="btn-est" href="#" class="tabs-font">Estimaciones</a></li>
        <li class="tab" id="nav-evi"><a id="btn-evi" href="#" class="tabs-font">Evidencias</a></li>
        <li class="tab" id="nav-ava"><a id="btn-ava" href="#" class="tabs-font">Avances</a></li>
      </ul> -->
    </div>
  </nav>  
   <?php 
    ?> 
    <?php
      }  
    ?>
</body>
<script>
function delayedRedirect()
{
  window.location="http://seicolaguna.com/sistema/logout.php"
}
</script>
<!--Estilos para control de contenido-->
<style type="text/css">
 li.menu{
  margin-left: 10px;
 }
 div.escritorio{
  margin-left: 300px;
 }
 a.tabs-font{
  font-size: 10px; 
 }
 li.tabs-font{
  font-size: 10px;
 }
</style>
</html>