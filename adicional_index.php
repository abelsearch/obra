<?php include('smenu.php'); ?>
<?php include('menu.php'); ?>

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
    

    <title>Adicionales</title>
  </head>
  <body> 
  <?php include('smenu.php'); ?> 
    <div class="container">  
    <div class="row"> 
    <div class="col m12">  
    <div id="title"> 
    <h2 class="form-signin-heading"> CONCEPTOS ADICIONALES</h2> 
    </div>
        <table class="striped responsive-table centered" id="example"> 
    <thead>
        <tr>
          <th>Folio</th> 
          <th>Servicio</th> 
          <th>Costo</th> 
          <th>ELIMINAR</th>
        </tr>
    </thead> 
    <tbody> 
    <?php 
    require_once 'db_config.php'; 
    $stmt=$db_con->prepare("SELECT * FROM adicional");
    $stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
    {   
    ?> 
    <tr>
      <td><?php echo $row['folio_orden']; ?></td> 
      <td><?php echo $row['descripcion']; ?></td>
      <td><?php echo $row['precio']; ?></td> 
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
     
    </body>
  </html> 


 <script>
          $(".eliminar").click(function()
          {
          var id = $(this).attr("id");
          var del_id = id;
          if(confirm('Eliminar?'))
          {
          $.post('crud_adicional/eliminar.php', {'del_id':del_id}, function(data)
          { 
          window.location.reload();
          }); 
          }
          return false;
          });
        </script>


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
