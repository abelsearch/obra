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
   <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
   <link type="text/css" rel="stylesheet" href="css/estilos.css"  media="screen,projection"/>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
   <script src="js/materialize.min.js" type="text/javascript"></script>
   <meta charset="utf-8">
   <title>SEICO</title>
</head>
<body class="color-fondo"><!--Color de fondo del esccritorio-->

  <!-- Dropdown Structure -->
  <ul id="dropdown1" class="dropdown-content">
    <li><a href="http://seicolaguna.com/sistema/orden_index.php" class="black-text"style="font-size:12px"><i class="material-icons black-text">shopping_cart</i>Solicitud Compra</a></li>
    <li><a href="http://seicolaguna.com/sistema/orden_index.php" class="black-text"style="font-size:12px"><i class="material-icons black-text">add_shopping_cart</i>Orden de Compra</a></li>
    <li class="divider"></li>
    <li><a href="http://seicolaguna.com/sistema/orden_index.php" class="black-text"style="font-size:12px"><i class="material-icons black-text">attach_money</i>Entradas</a></li>
  </ul>

  <!--Menú de cabecera de ICONOS-->
  <!--Inicia Menú lateral fijo Sidenav-->
    <ul id="slide-out" class="sidenav sidenav-fixed section_item flex-container color-smenu collapsible" ><!--Color del sidenav #263238 grey darken-4--> 
    <!--<li class="center #eceff1 blue-grey lighten-5"><img src="http://seicolaguna.com/sistema/img/sio_logo_letras.png" height="40" width="250" style="margin-top:1px;" class=""></li>-->
      <!--<li class="center"><i class="material-icons white-text large">accessible_forward</i></li>--><!--Icono o LOGO del sistema
      <li class="center"><label>SEICO</label></li>-->
      <li class="center #e0f2f1 teal lighten-5"><label class="text" style="font-size:20px">Bienvenido <?php echo $_SESSION['usuario']; ?></label></li> 
      <li ><a href="http://seicolaguna.com/sistema/index.php" class="white-text"><i class="material-icons white-text">360</i>Inicio</a></li> 
      <li class="#e0f2f1 teal lighten-5 center black-text"style="font-size:12px">HERRAMIENTAS</li><br>
       <?php 
        require_once 'db_config.php';
        if($_GET['id'])
        {
        $id = $_GET['id']; 
        $stmt=$db_con->prepare("SELECT * FROM obra WHERE folio=:id");
        $stmt->execute(array(':id'=>$id)); 
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        }
      ?> 
      <?php  
      if($tipo == 3){
      ?>
      <li><a href="http://seicolaguna.com/sistema/proyecto_index.php" class="white-text"><i class="material-icons white-text">business</i>Proyectos</a></li>
      <li><a href="http://seicolaguna.com/sistema/obra_index_guest.php"     class="white-text"style="font-size:12px"><i class="material-icons white-text">meeting_room</i>Obras</a></li>
      <li><a href="http://seicolaguna.com/sistema/cliente_index_guest.php"  class="white-text"style="font-size:12px"><i class="material-icons white-text">group</i>Clientes</a></li>
      <li><span class="new badge" data-badge-caption="Nuevo Módulo"></span><a href="http://seicolaguna.com/sistema/orden_index.php"class="white-text"style="font-size:12px"><i class="material-icons white-text">add_shopping_cart</i>Compras</a></li>
      <li><span class="new badge" data-badge-caption="Nuevo Módulo"></span><a href="http://seicolaguna.com/sistema/pago_proveedor_index.php"class="white-text"style="font-size:12px"><i class="material-icons white-text">local_atm</i>Pagos</a></li>
      <li><span class="new badge" data-badge-caption="Nuevo Módulo"></span><a href="http://seicolaguna.com/sistema/orden_index.php" class="white-text"style="font-size:12px"><i class="material-icons white-text">store_mall_directory</i>Almacén</a></li>      
      <li><a href="http://seicolaguna.com/sistema/catalogo_index_guest.php" class="white-text"style="font-size:12px"><i class="material-icons white-text">sort</i>Catálogos</a></li>
      <li class="#e0f2f1 teal lighten-5 center white-text"style="font-size:12px">DATOS DE LA OBRA</li><br>
       <li><a class="dropdown-trigger white-text" href="#!"style="font-size:12px" data-target="dropdown1">Dropdown<i class="material-icons white-text right">arrow_drop_down</i></a></li>
      <li><a href="#" class="white-text"style="font-size:10px">CONTRATISTA: <?php echo $row['contratista']; ?></a></li>
      <li><a href="#" class="white-text"style="font-size:10px">RESIDENTE DE OBRA: <?php echo $row['residente_obra']; ?></a></li>
      <li><a href="#" class="white-text"style="font-size:10px">UBICACIÓN: <?php echo $row['zona']; ?> N° Lote <?php echo $row['lote']; ?></a></li>
       <?php
      } 
      else{ 
      ?>
      <li><a href="http://seicolaguna.com/sistema/proyecto_index.php" class="white-text"><i class="material-icons white-text">business</i>Proyectos</a></li>  
      <li><a href="http://seicolaguna.com/sistema/obra_index.php" class="white-text"style="font-size:12px"><i class="material-icons white-text">meeting_room</i>Obras</a></li>
      <!--<li><a href="http://seicolaguna.com/sistema/cliente_index.php" class="white-text"style="font-size:12px"><i class="material-icons white-text">group</i>Clientes</a></li>-->
      <li>
        <div class="collapsible-header white-text" style="font-size:12px"> <i class="material-icons white-text" style="margin-left:15px">add_shopping_cart</i><a href="#"style="font-size:12px;margin-left:10px;color:white">Compras</a></div>
        <div class="collapsible-body #0097a7 cyan darken-2 white-text"><i class="material-icons white-text left"style="margin-left:30px;margin-top:12px">code</i><a style="margin-left:1em; font-size:12px"href="http://seicolaguna.com/sistema/orden_index.php"  class="white-text">Solicitar Compra</a></div>
        <div class="collapsible-body #0097a7 cyan darken-2 white-text"><i class="material-icons white-text left"style="margin-left:30px;margin-top:12px">code</i><a style="margin-left:1em; font-size:12px"href="http://seicolaguna.com/sistema/ordenes_index.php"class="white-text">Orden de Compra</a></div>
        <div class="collapsible-body #0097a7 cyan darken-2 white-text"><i class="material-icons white-text left"style="margin-left:30px;margin-top:12px">code</i><a style="margin-left:1em; font-size:12px"href="http://seicolaguna.com/sistema/compras_index.php"class="white-text">Compras Ejecutadas</a></div>
      </li>
      <li><a href="http://seicolaguna.com/sistema/pago_proveedor_index.php"class="white-text"style="font-size:12px"><i class="material-icons white-text">local_atm</i>Pagos</a></li>
      <li><a href="http://seicolaguna.com/sistema/almacen.php" class="white-text"style="font-size:12px"><i class="material-icons white-text">store_mall_directory</i>Almacén</a></li>
      
      <li>
        <div class="collapsible-header white-text" style="font-size:12px"> <i class="material-icons white-text" style="margin-left:15px">build</i><a href="#"style="font-size:12px;margin-left:10px;color:white">Configuración</a></div>
        <div class="collapsible-body #0097a7 cyan darken-2 white-text"><i class="material-icons white-text left"style="margin-left:30px;margin-top:12px">code</i><a style="margin-left:1em; font-size:12px"href="http://seicolaguna.com/sistema/catalogo_concepto.php" class="white-text">Conceptos</a></div>
        <div class="collapsible-body #0097a7 cyan darken-2 white-text"><i class="material-icons white-text left"style="margin-left:30px;margin-top:12px">code</i><a style="margin-left:1em; font-size:12px"href="http://seicolaguna.com/sistema/catalogo_insumo.php"   class="white-text">Insumos</a></div>
        <div class="collapsible-body #0097a7 cyan darken-2 white-text"><i class="material-icons white-text left"style="margin-left:30px;margin-top:12px">code</i><a style="margin-left:1em; font-size:12px"href="http://seicolaguna.com/sistema/catalogo_modelo.php"   class="white-text">Modelo/Presupuesto</a></div>
        <div class="collapsible-body #0097a7 cyan darken-2 white-text"><i class="material-icons white-text left"style="margin-left:30px;margin-top:12px">code</i><a style="margin-left:1em; font-size:12px"href="http://seicolaguna.com/sistema/catalogo_proveedor.php"class="white-text">Proveedores</a></div>
        <div class="collapsible-body #0097a7 cyan darken-2 white-text"><i class="material-icons white-text left"style="margin-left:30px;margin-top:12px">code</i><a style="margin-left:1em; font-size:12px"href="http://seicolaguna.com/sistema/catalogo_cliente.php"  class="white-text">Clientes</a></div>
      </li>
      <li class="#e0f2f1 teal lighten-5 center black-text"style="font-size:12px">DATOS DE LA OBRA</li><br>
      <li><a href="#" class="white-text"style="font-size:10px">CONTRATISTA: <?php echo $row['contratista']; ?></a></li>
      <li><a href="#" class="white-text"style="font-size:10px">RESIDENTE DE OBRA: <?php echo $row['residente_obra']; ?></a></li>
      <li><a href="#" class="white-text"style="font-size:10px">UBICACIÓN: <?php echo $row['zona']; ?> N° Lote <?php echo $row['lote']; ?></a></li>
      <?php 
      ?> 
      <?php
        } 
      ?>    
    </ul>
    <!--<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>Versión Móvil-->
    <!--Iniciar row del escritorio de trabajo, se usa clase escritorio para pintar todo apartir de terminar el SideNav-->
    <div class="row escritorio"> 

    <div class="col l12 m12 s12"> 
    </div> 

    
    <!--Termina el row del escritorio de trabajo-->
    <script type="text/javascript">
      $(document).ready(function(){
        $(".dropdown-trigger").dropdown();
        $('.collapsible').collapsible();
      })
    </script>    
</body>
</html>