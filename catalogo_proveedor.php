<?php include('smenu.php'); ?>
<?php 
if($_SESSION['tipo']== 1){
?>  
<?php include('menu.php'); 
require_once 'crud_proveedor/modal4.php';
?>   
<script src="crud_proveedor/menu_iconos.js" type="text/javascript"></script>      
<?php
} 
if($_SESSION['tipo']== 2){ 
?> 
<?php include('menu_operador.php'); ?> 
<script src="crud_proveedor/menu_iconos.js" type="text/javascript"></script>
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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <script src="js/materialize.min.js" type="text/javascript"></script> 
    <script src="crud_proveedor/proveedor.js" type="text/javascript"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    

  <title>Catálogo Proveedoesr</title>
  </head>
  <body>  
    <div class="container">  
    <div class="row"> 
    <div class="col m12">  
    <div id="title"> 
    <h2 class="form-signin-heading" style="font: 150% sans-serif;"> CATÁLOGO PROVEEDORES</h2> 
    </div> 
    <table class="striped responsive-table " id="example"> 
    <thead class="orange">
        <tr>
          <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Nombre</center></th> 
          <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Domicilio</center></th> 
          <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Contacto</center></th> 
          <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Correo</center></th> 
          <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Telefono</center></th> 
          <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>VER</center></th>  
          <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>EDITAR</center></th> 
          <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>ELIMINAR</center></th>
        <!--</tr>-->
    </thead> 
    <tbody> 
    <?php 
    require_once 'db_config.php'; 
    $stmt=$db_con->prepare("SELECT * FROM proveedor");
    $stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
    {   
    ?> 
    <!--<tr>-->
      <td><center><?php echo $row['nombre']; ?></center></td> 
      <td><center><?php echo $row['domicilio']; ?></center></td>
      <td><center><?php echo $row['contacto']; ?></center></td> 
      <td><center><?php echo $row['correo']; ?></center></td>
      <td><center><?php echo $row['telefono']; ?></center></td>  
      <td align="center">
      <center>
      <a id="<?php echo $row['id']; ?>" class="ver modal-trigger tooltipped" data-position="top" data-tooltip="Ver" href="#">
      <i class="material-icons  black-text  center">visibility</i></a>
      </center>
      </td>
      <td align="center" >  
      <center>
      <a id="<?php echo $row['id']; ?>" class='editar modal-trigger tooltipped' data-position="top" data-tooltip="Editar" href="#">
      <i class="material-icons  black-text  center">edit</i></a> 
      </center>
      </td>  

      <td align="center">  
      <center>
      <a id="<?php echo $row['id']; ?>" class="eliminar tooltipped" data-position="top" data-tooltip="Eliminar" href="#">
      <i class="material-icons red-text  center">delete</i> 
      </a>
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
    </div>
          <!-- Modal Zone -->
        <!-- Modal Structure -->
        <div id="modal1" class="modal">
          <div class="modal-content">  

          <div class="form-group">
          <label>RFC<input type="text" name="rfc" id="rfc" required></label>
        </div>
        
            <div class="form-group">
          <label>Razón Social<input type="text" name="razon_social" id="razon_social" required></label>
        </div>
        
        <div class="form-group">
          <label>Nombre Comercial<input type="text" name="nombre" id="nombre" required></label>
        </div>
        
        <div class="form-group">
          <label>Domicilio<input type="text" name="domicilio" id="domicilio" required></label>
        </div> 

        <div class="form-group">
          <label>Contacto<input type="text" name="contacto" id="contacto" required></label>
        </div> 

        <div class="form-group">
          <label>Correo<input type="text" name="correo" id="correo" required></label>
        </div> 

        <div class="form-group">
          <label>Teléfono<input type="text" name="telefono" id="telefono" required></label>
        </div> 

        <div class="form-group">
          <label>Ciudad<input type="text" name="ciudad" id="ciudad" required></label>
        </div>

        <div class="form-group">
          <label>Estado<input type="text" name="estado" id="estado" required></label>
        </div>
        
        <div class="form-group">
          <label>Estatus<input type="text" name="estatus" id="estatus" required></label> 
        </div>
          <br>
              <button class="btn waves-effect orange z-depth-5" type="submit" id="enviar" name="action">CREAR
              <i class="material-icons right">send</i>
              </button>
           
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect btn-flat" id="cancel"><i class="material-icons">close</i></a>
          </div>
        </div>
        
        
        <!-- Modal Structure -->
        <div id="modal2" class="modal bottom-sheet #e0e0e0 grey lighten-2">
          <div class="modal-content2">  
          

               </div> 
               <br>
              <center><button class="btn waves-effect orange z-depth-5" type="submit" id="enviar2" name="action">Editar
              <i class="material-icons right">send</i>
              </button></center>  

              <div class="modal-footer">
            <a href="#!" class="modal-action modal-close btn-flat" id="cancel"><i class="material-icons">close</i></a>
          </div> 
          </div>  

        <!-- Modal Structure -->
    <div id="modal3" class="modal bottom-sheet #e0e0e0 grey lighten-2">
      <div class="modal-content3">
        
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect btn-flat" id="cancel"><i class="material-icons">close</i></a>
      </div>
    </div>

      </div> 
    </body>
  </html> 

 <!-- Buscador -->
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
    <!-- Buscador --> 