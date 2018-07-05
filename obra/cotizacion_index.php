<?php 
session_start(); 
?> 

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <script src="js/materialize.min.js" type="text/javascript"></script>
    
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    

    <title>Cotizaciones</title>
  </head>
  <body> 
  <?php include('menu.php'); ?> 
    <div class="container">  
    <div class="row"> 
    <div class="col m12">  
    <div id="title"> 
    <h2 class="form-signin-heading "> COTIZACIONES</h2> 
    </div>
    
        <table class="striped responsive-table z-depth-5" id="example"> 
    <thead>
        <tr>
          <th><center>Folio</center></th> 
          <th><center>Folio Orden</center></th> 
          <th><center>Servicio</center></th> 
          <th><center>Presupuesto</center></th>    
          <th><center>Gasto</center></th> 
          <th><center>Cliente</center></th>     
          <th><center>CANCELAR</center></th>
          <th><center>ELIMINAR</center></th> 
        <!--</tr>-->
    </thead> 
    <tbody> 
    <?php 
    require_once 'db_config.php'; 
    $stmt=$db_con->prepare("SELECT * FROM cotizacion");
    $stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
    {   
    ?> 
    <!--<tr>-->
      <td><center><?php echo $row['folio_cot']; ?></center></td> 
      <td><center><?php echo $row['folio_orden']; ?></center></td>
      <td><center><?php echo $row['servicio']; ?></center></td> 
      <td><center><?php echo $row['presupuesto']; ?></center></td> 
      <td><center><?php echo $row['gasto']; ?></center></td> 
      <td><center><?php echo $row['cliente']; ?></center></td>
     
      <td align="center">  
      <center> 
      <a id="<?php echo $row['id']; ?>" class="cancelar" href="#">
      <i class="material-icons red-text center">close</i></a> 
      </center>
      </td>  

  
      <td align="center">  
      <center>
      <a id="<?php echo $row['id']; ?>" class="eliminar" href="#" title="Eliminar">
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
          <!-- MODAL ZONE!!! -->
        <!-- CREATE MODAL -->
        <div id="modal1" class="modal">
        <div class="modal-content"> 
        
          </div>
          <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect btn-flat" id="cancel"><i class="material-icons">close</i></a>
          </div>
        </div> 
        <!--
        <script> 
        $(document).ready(function(){
        $( "#trigger" ).click(function(){ 
          $('#modal1').modal();
        $('#modal1').modal('open');
        });
        $( "#cancel" ).click(function(){
          $('#modal1').modal();
        $('#modal1').modal('close');
        });
        });
        </script>   
        -->
      </div> 
      <script>
          $(".eliminar").click(function()
          {
          var id = $(this).attr("id");
          var del_id = id;
          if(confirm('Eliminar?'))
          {
          $.post('crud_cotizacion/eliminar.php', {'del_id':del_id}, function(data)
          { 
          window.location.reload();
          }); 
          }
          return false;
          });
        </script>
    </body>
  </html>   
<!--
<script> 
        $(".editar").click(function(){
        var id = $(this).attr("id");
        var edit_id = id; 
        window.location.href="crud_orden/editar_orden.php?edit_id="+edit_id; 
      return false;
    });
      </script>  

<script> 
        $(".ver").click(function(){
        var id = $(this).attr("id");
        var edit_id = id; 
        window.location.href="crud_orden/ver_orden.php?edit_id="+edit_id; 
      return false;
    });
      </script>       
-->
 <!-- Buscador 
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
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