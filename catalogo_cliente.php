<?php include('smenu.php'); 
require_once 'crud_cliente/validacion.php';
require_once 'crud_cliente/modal1.php';
require_once 'crud_cliente/modal2.php'; 
require_once 'crud_cliente/modal3.php';
require_once 'crud_cliente/modal4.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/> 

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <script src="js/materialize.min.js" type="text/javascript"></script>
    <script src="crud_cliente/cliente.js" type="text/javascript"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  
    <script src="crud_cliente/buscador.js" type="text/javascript"></script>  
   

   <link rel="stylesheet" src="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"></script> 
      
  <title>Clientes</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col m12">
          <div id="title">
            <h2 class="form-signin-heading" style="font: 150% sans-serif;"> CLIENTES</h2>
          </div>
          <table class="striped responsive-table centered" id="example">
            <thead class="orange">
              <tr>
                <th style="font: 150% sans-serif; font-size: 14px; color: white">Nombre Comercial</th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white">Estado</th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white">Ciudad</th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white">Teléfono</th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white">Correo</th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white">Contacto</th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white">VER</th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white">EDITAR</th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white">ELIMINAR</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require_once 'db_config.php';
              $stmt=$db_con->prepare("SELECT * FROM cliente ORDER BY nombre_comercial");
              $stmt->execute();
              while($row=$stmt->fetch(PDO::FETCH_ASSOC))
              {
              ?>
              <tr>
                <td><?php echo $row['nombre_comercial']; ?></td>
                <td><?php echo $row['estado']; ?></td>
                <td><?php echo $row['ciudad']; ?></td>
                <td><?php echo $row['telefono']; ?></td>
                <td><?php echo $row['correo']; ?></td>
                <td><?php echo $row['nombre_contacto']; ?></td>
                <td align="center">
                  <center>
                  <a id="<?php echo $row['id']; ?>" class="ver modal-trigger tooltipped" data-position="top" data-tooltip="Ver" href="#">
                  <i class="material-icons  black-text  center">visibility</i></a>
                  </center>
                </td>
                <td align="center">
                  <center>
                  <a id="<?php echo $row['id']; ?>" class="editar modal-trigger tooltipped" data-position="top" data-tooltip="Editar" href="#">
                    <i class="material-icons black-text  center">edit</i>
                  </a>
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
  </body>
</html>