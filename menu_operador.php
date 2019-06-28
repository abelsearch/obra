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
<html>
<head>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  
   <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
   <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
   <script src="js/materialize.min.js" type="text/javascript"></script> 
   <script src="js/menu.js" type="text/javascript"></script> 
   <meta charset="utf-8">
   <title>SEICO</title>
</head>
  <!--Menú de cabecera de ICONOS-->
  <nav class=" yellow darken-4 nav-extended"><!--Color del menú-->
    <div class="nav-wrapper escritorio"><!--Se usa la clase escritorio para pintar el menú donde termina el sidenav-->
      <ul class="right hide-on-med-and-down" id="menu_iconos"> 
        <li><a href="javascript:history.back()" id="back"><i class="material-icons">arrow_back</i></a></li>

        <li><a href="http://seicolaguna.com/sistema/logout.php" class="tooltipped" data-position="left" data-tooltip="Cerrar Sesión"><i class="material-icons">cancel</i></a></li>
      </ul>
    </div>
    <!--Termina menú cabecera de iconos-->
    <!--Menú de tabs-->
   </nav>
           
</body>
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
</html>