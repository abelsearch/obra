<?php require_once 'ti.php' ?> 

<!DOCTYPE html>

<html>
<head>

<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css" rel="stylesheet" />	
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>	
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
</head>
<body> 

<ul id="slide-out" class="side-nav #424242 grey darken-3" style="position:fixed;">  

<li class="center"><img src="img/logo_menu.PNG" style=" margin-top:9px;" class="circle"></li>

<li class="#e0e0e0 grey lighten-2"><a href="http://127.0.0.1/obra/index.php" class="-textblack"><i class="material-icons" style="color:black;"></i>HOME</a></li> 

<li><a href="http://127.0.0.1/obra/orden_index.php" class="white-text"><i class="material-icons" style="color:white;">create</i> Orden</a></li>    

<li><a href="http://127.0.0.1/obra/cotizacion_index.php" class="white-text"><i class="material-icons" style="color:white;">attach_money</i> Cotizaciones</a></li>    

<li><a href="http://127.0.0.1/obra/renta_index.php" class="white-text"><i class="material-icons" style="color:white;">folder</i> Renta</a></li>    


<li><a href="http://127.0.0.1/obra/servicio_index.php" class="white-text"><i class="material-icons" style="color:white;">sort</i>Catálogo Servicios</a></li>

<li><a href="http://127.0.0.1/obra/cliente_index.php" class="white-text"><i class="material-icons" style="color:white;">face</i>Cliente</a></li>  

<li><a href="http://127.0.0.1/obra/adicional_index.php" class="white-text"><i class="material-icons" style="color:white;">build</i>Servicios Adicionales</a></li>  

<li><a href="http://127.0.0.1/obra/extra_index.php" class="white-text"><i class="material-icons" style="color:white;">build</i>Servicios Extra</a></li>   

<li><a href="http://127.0.0.1/obra/lista_index.php" class="white-text"><i class="material-icons" style="color:white;">sort</i>Lista de insumos</a></li>


<li><a href="http://127.0.0.1/obra/usuario_index.php" class="white-text"><i class="material-icons" style="color:white;">person</i>Usuarios</a></li>


<li><a href="http://127.0.0.1/obra/logout.php" class="white-text"><i class="material-icons" style="color:red;">power_settings_new</i>Cerrar Sesión</a></li>
<!--     
<li><a href="http://consultoriaiisac.com/obra/reporte_index.php"><i class="material-icons" style="color:black;"></i>Reporte</a></li> 
<li><a href="http://consultoriaiisac.com/obra/lista_index.php"><i class="material-icons" style="color:black;"></i>Lista de insumos</a></li>  

<li><a href="#"><i class="material-icons" style="color:black;">add_circle</i>Catálogo Materiales</a></li>         
   
<li><a href="#"><i class="material-icons" style="color:black;">person</i>Administrador</a></li>    
-->
</ul> 
<div class="row black z-depth-5" >
<div>
<div class="row black z-depth-5" > 
<div class="col l1 " id="menu" > 
<a href="#" data-activates="slide-out" class="button-collapse" id="menu"> 
<img src="img/logo_menu.PNG" style="width:50px; height:50px; margin-top:9px; position:fixed;" class="circle"> 
</a> 
</div> 



<div class="col l2 white-text" style="margin-top: 1em; font-size: 18px">  
<?php //session_start(); echo 'Usuario: '. $_SESSION['usuario']; ?>
</div>



<div class="col l2 white-text" style="margin-top: 1em; font-size: 18px">  
<?php //session_start(); echo 'ID: '. $_SESSION['id']; ?>
</div>


</div> 
</div> 
</div>
</body>
</html>  
<script>  
$(".dropdown-button").dropdown();
$(".button-collapse").sideNav();
$(document).ready(function(){    
});
</script> 

