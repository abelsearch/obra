<?php include('smenu.php'); 
require_once 'crud_proyecto/modal1.php';
require_once 'crud_proyecto/modal2.php';
require_once 'crud_proyecto/modal3.php';?>
<?php 
if($_SESSION['tipo']== 1){
?>  
<?php include('menu.php'); ?>   
<script src="crud_proyecto/menu_iconos.js" type="text/javascript"></script>      
<?php
} 
if($_SESSION['tipo']== 2){ 
?> 
<?php include('menu_operador.php'); ?> 
<script src="crud_proyecto/menu_iconos.js" type="text/javascript"></script>
<?php 
} 
if($_SESSION['tipo']== 3){
?>  
<?php include('menu_invitado.php'); ?>
<?php
} 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>    
    <script src="js/materialize.min.js" type="text/javascript"></script>
    <script src="crud_proyecto/proyecto.js" type="text/javascript"></script>  
    <script src="crud_proyecto/modal3.js" type="text/javascript"></script> 
    <!--<script src="crud_proyecto/menu_iconos.js" type="text/javascript"></script>-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Obras</title>
  </head>
  <body>
    
      <div class="row" style="margin-left: 120px">
        <div class="col m12">
          <div id="title">
            <h2 class="form-signin-heading" style="font: 150% sans-serif;">PROYECTOS</h2>
          </div>
          <table class="striped responsive-table z-depth-5" id="example">
            <thead class="orange">
              <tr>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Nombre</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Fecha</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Usuario</center></th> 
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Editar</center></th> 
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Ver</center></th>
                <!--</tr>-->
              </thead>
              <tbody>
                <?php
                require_once 'db_config.php';
                $stmt=$db_con->prepare("SELECT * FROM proyecto ORDER BY id DESC");
                $stmt->execute();
                while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                ?>
                <!--<tr>-->
                <td><center><?php echo $row['nombre']; ?></center></td>
                <td><center><?php echo $row['fecha']; ?></center></td>
                <td><center><?php echo $row['usuario']; ?></center></td> 
                 <td align="center" >
                  <center>
                  <a id="<?php echo $row['id']; ?>" class='modal-trigger trigger tooltipped' data-position="top" data-tooltip="Editar" href="#">
                  <i class="material-icons  black-text  center">edit</i></a>
                  </center>
                </td> 
                 <td align="center" >
                  <center>
                 <a id="<?php echo $row['id']; ?>" class='modal-trigger ver tooltipped' data-position="top" data-tooltip="Editar" href="#">
                  <i class="material-icons  black-text  center">remove_red_eye</i></a>
                  </center>
                </td>
              </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    
        
      <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
      <link rel="stylesheet" src="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"></script>
      <script>
      $(document).ready(function() {
      $('#example').dataTable({
      "iDisplayLength": 5,
      "ordering": false,
      //"searching": true,
      "paging": false,
      "ordering": false,
      "info": false
      });
      })
      </script>