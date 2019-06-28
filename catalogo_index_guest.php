<?php include('smenu.php'); ?>
<?php 
if($_SESSION['tipo']== 1){
?>  
<?php include('menu.php'); ?>   
<script src="crud_catalogo/menu_iconos.js" type="text/javascript"></script>      
<?php
} 
if($_SESSION['tipo']== 2){ 
?> 
<?php include('menu_operador.php'); ?> 
<script src="crud_catalogo/menu_iconos.js" type="text/javascript"></script>
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
    <script src="crud_catalogo/catalogo.js" type="text/javascript"></script> 
    
    

  <title>Catálogo Servicios</title>
  </head>
  <body>  
    <div class="container">  
    <div class="row"> 
    <div class="col m12">  
    <div id="title"> 
    <h2 class="form-signin-heading"> CATÁLOGO SERVICIOS</h2> 
    </div> 
    <table class="striped responsive-table " id="example"> 
    <thead>
        <tr>
          <th><center>Clave SAT</center></th> 
          <th><center>Clave Interna</center></th> 
          <th><center>Descripción</center></th> 
          <th><center>Precio</center></th> 
          <th><center>Medida</center></th> 
        <!--</tr>-->
    </thead> 
    <tbody> 
    <?php 
    require_once 'db_config.php'; 
    $stmt=$db_con->prepare("SELECT * FROM catalogo_concepto");
    $stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
    {   
    ?> 
    <!--<tr>-->
      <td><center><?php echo $row['clave_sat']; ?></center></td> 
      <td><center><?php echo $row['clave_interna']; ?></center></td>
      <td><center><?php echo $row['descripcion']; ?></center></td> 
      <td><center><?php echo $row['precio']; ?></center></td>
      <td><center><?php echo $row['medida']; ?></center></td> 
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
                <label>Clave SAT<input type="text" name="clave_sat" id="clave_sat" required></label>
              </div>
              
              <div class="form-group">
                <label>Clave Interna<input type="text" name="clave_interna" id="clave_interna" required></label>
              </div>
              
              <div class="form-group">
                 <label>Descripción<input type="text" name="descripcion" id="descripcion" required></label>
              </div>
              
              <div class="form-group">
                 <label>Precio<input type="number" name="precio" id="precio" required></label>
              </div>
              
              <div class="form-group">
                <label>Medida<input type="text" name="medida" id="medida" required></label>                
              </div> 
              <button class="btn waves-effect waves-light #757575 indigo darken-1 z-depth-5" type="submit" id="enviar" name="action">CREAR
              <i class="material-icons right">send</i>
              </button>
           
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect btn-flat" id="cancel"><i class="material-icons">close</i></a>
          </div>
        </div>
        
        
        <!-- Modal Structure -->
        <div id="modal2" class="modal">
          <div class="modal-content2">  
          
               </div>
              <center><button class="btn waves-effect #757575 indigo darken-1 z-depth-5" type="submit" id="enviar2" name="action">Editar
              <i class="material-icons right">send</i>
              </button></center>  

              <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect btn-flat" id="cancel"><i class="material-icons">close</i></a>
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