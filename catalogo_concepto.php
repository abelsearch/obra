<?php
include('smenu.php');
require_once 'crud_catalogo/validacion.php';
require_once 'crud_catalogo/modal1.php';
require_once 'crud_catalogo/modal2.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/materialize.min.js" type="text/javascript"></script>
    <script src="crud_catalogo/catalogo.js" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" src="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"></script> 
   <script src="crud_catalogo/buscador.js" type="text/javascript"></script>

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <title>Catálogo Conceptos</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col m12">
          <div id="title">
            <h2 class="form-signin-heading" style="font: 150% sans-serif;"> CATÁLOGO CONCEPTOS</h2>
          </div>
          <table class="striped responsive-table " id="example">
            <thead class="orange">
              <tr>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Partida</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Descripción</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Medida</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Fecha Registro</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>EDITAR</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>ELIMINAR</center></th>
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
                <td><center><?php echo $row['partida']; ?></center></td>
                <td><center><?php echo $row['descripcion']; ?></center></td>
                <td><center><?php echo $row['medida']; ?></center></td>
                <td><center><?php echo $row['fecha']; ?></center></td>
                <td align="center" >
                  <center>
                  <a id="<?php echo $row['id']; ?>" class='ver modal-trigger trigger tooltipped' data-position="top" data-tooltip="Editar" href="#">
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
  </div>
</body>
</html>

<!-- Buscador 
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
Buscador -->