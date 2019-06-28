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
    

    <title>Bitacora Orden</title>
  </head>
  <body> 
   
    <div class="container">  
    <div class="row"> 
    <div class="col m12">  
    <div id="title"> 
    <h2 class="form-signin-heading"> BITACORA OBRA</h2> 
    </div>
        <table class="striped responsive-table " id="example"> 
    <thead>
        <tr>
          <th><center>Folio Obra</center></th> 
          <th><center>Usuario</center></th> 
          <th><center>Fecha</center></th> 
          <th><center>Hora</center></th> 
          <th><center>Reporte</center></th> 
          <th><center>Acción</center></th> 
        <!--</tr>-->
    </thead> 
    <tbody> 
    <?php 
    require_once 'db_config.php'; 
    $stmt=$db_con->prepare("SELECT * FROM bitacora_obra ORDER BY id DESC");
    $stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
    {   
    ?> 
    <!--<tr>-->
      <td><center><?php echo $row['folio']; ?></center></td> 
      <td><center><?php echo $row['usuario']; ?></center></td> 
      <td><center><?php echo $row['fecha']; ?></center></td> 
      <td><center><?php echo $row['hora']; ?></center></td> 
      <td><center><?php echo $row['reporte']; ?></center></td> 
      <td><center><?php echo $row['accion']; ?></center></td> 
    </tr>
  <?php
  } 
  ?>   
    </tbody>
    </table> 
    </div>
    </div> 
    </div>       
      </div>
    </body>
  </html> 

 
 
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" src="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"></script>
    <script>
        $(document).ready(function() {
            $('#example').dataTable({
                "iDisplayLength": 5,
                "ordering": false,
                "searching": true, 
                "paging": true,
                "ordering": false,
                "info": false
            });
        })
    </script>
    <!-- Buscador --> 


   

