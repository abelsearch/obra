<?php include('../smenu.php'); ?> 
<?php include('menu_obra.php'); ?>
<?php 
require_once '../db_config.php';
if($_GET['id'])
{
$id = $_GET['id']; 
$stmt=$db_con->prepare("SELECT * FROM obra WHERE folio=:id");
$stmt->execute(array(':id'=>$id)); 
$row=$stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<input type="hidden" id="c_folio" value="<?php echo $_GET['id'];?>" readonly> 
<input type="hidden" id="c_modelo" value="<?php echo $_GET['id_modelo'];?>" readonly>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../css/estilos.css"  media="screen,projection"/> 
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>--> 
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../js/materialize.min.js" type="text/javascript"></script>  
    <script src="../crud_evidencia/menu_iconos.js" type="text/javascript"></script>
    <script src="img.js" type="text/javascript"></script> 
    <script src="evidencia.js" type="text/javascript"></script>
    <script src="modulo.js" type="text/javascript"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>    
    <title>Avance</title>
  </head>
  <body>  
    <div class="row"> 
      <div class="col l12 m12 s12 ">
        <table class="striped responsive-table" id="example"> 
          <thead clasS="color-menu white-text" style="font: small-caps 100%/200% serif;">
            <tr>
              <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Folio</center></th>  
              <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Fecha</center></th> 
              <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Reporte</center></th> 
              <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Archivo</center></th>  
              <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Descargar</center></th>  
            </tr>
          </thead> 
          <tbody> 
            <?php 
            require_once '../db_config.php';  
            if($_GET['id'])
            {
            $id = $_GET['id']; 
            $stmt=$db_con->prepare("SELECT *, DATE_FORMAT(fecha,'%d/%m/%Y') AS fecha FROM evidencia WHERE folio=:id ORDER BY id DESC");
            $stmt->execute(array(':id'=>$id));
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
            {   
            ?> 
            <tr>
              <td><center><?php echo $row['folio']; ?></center></td>  
              <td><center><?php echo $row['fecha']; ?></center></td>
              <td><center><?php echo $row['reporte']; ?></center></td> 
              <td><center><?php echo $row['img']; ?></center></td>
              <td><center><a href="descargar.php?id=+<?php echo $row['id']; ?>">
              <i class="material-icons orange-text center">cloud_download</i>
              </center></td> 
            </tr>
            <?php
            }  
             }
            ?>   
          </tbody>
        </table> 
      </div>
    </div>
    </body>
  </html>   
  <!--Modal de agregar evidencia-->
  <div id="modal1" class="modal">
    <div class="modal-content"> 
      <form method='post' action='crear_evidencia.php' enctype="multipart/form-data">
        <div class="form-group">
         <?php
          include_once '../db_config.php';
         if($_GET['id'])
          {
          $id = $_GET['id']; 
          $stmt=$db_con->prepare("SELECT * FROM obra WHERE folio=:id");
          $stmt->execute(array(':id'=>$id)); 
          $row=$stmt->fetch(PDO::FETCH_ASSOC);
          }
          ?> 
          <label>Folio<input type="text" id="folio" name="folio" value="<?php echo$row['folio'];?>" readonly></label> 
          </div> 

          <div class="form-group"> 
           <input type="hidden" name="fecha" id="fecha" value="<?php echo date('Y-m-d');?>" readonly>
          </div> 
          
          <div class="form-group">
            <input type="hidden" name="hora" id="hora" value="<?php date_default_timezone_set("America/Mexico_City"); echo date('h:i:sa');?>" readonly>
          </div>  
          <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario']; ?>" readonly>   
          <br>          
          <div class="form-group"> 
          <input type="file" id="file" name="file" multiple="multiple" onchange="return imgValidation()"> 
          </div>  
          <br>
          <div class="form-group">
          <label>Reporte<textarea style="overflow:auto;resize:none" name="reporte" id="reporte" class='form-control' required></textarea></label>   
        </div>  
        <br> 
        <div class="form-group">
          <label>Semana</label>
          <select required  name="semana" id="semana" class="browser-default" required>
          <option value="">Selección:</option> 
          <?php  
          require_once '../db_config.php';
          if($_GET['id'])
          {
          $id = $_GET['id']; 
          $stmt=$db_con->prepare("SELECT *, DATE_FORMAT(fecha_inicio,'%d/%m/%Y') AS fecha_inicio, DATE_FORMAT(fecha_fin,'%d/%m/%Y') AS fecha_fin FROM semana WHERE folio=:id");
          $stmt->execute(array(':id'=>$id)); 
          while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
          ?>
          <option value="<?php echo$row['num_semana'];?>">Semana <?php echo $row['num_semana'];?>: <?php echo $row['fecha_inicio'];?> - <?php echo $row['fecha_fin'];?> </option>
          <?php
          } 
          }
          ?>
          </select> 
        </div>         
        <br>
        <button class="btn waves-effect #757575 indigo darken-1 z-depth-5" type="submit" id="evi_crear" name="action">Agregar
        <i class="material-icons right">send</i>
        </button>
      </form>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect btn-flat" id="cancel"><i class="material-icons">close</i></a>
    </div>
  </div>  
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
  <!--Función para darle color activo a la opción evidencia del menú tabs-->
  <script type="text/javascript">
   $(document).ready(function(){
   $('#nav-evi').attr('style','background-color: rgb(38,50,56); color: white;');
   $('#ul_iconos').prepend('<li>&nbsp <b>FOLIO '+$('#c_folio').val()+'</b>&nbsp&nbsp</li>');
   });
  </script>