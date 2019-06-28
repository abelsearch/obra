<?php include('../smenu.php'); ?> 
<?php include('menu_obra.php'); ?>
<!DOCTYPE html>
<html>
  <head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">  

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../css/estilos.css"  media="screen,projection"/>
    <!--Import Google Icon Font-->
    <script src="../js/materialize.min.js" type="text/javascript"></script>  
    <script src="editar.js" type="text/javascript"></script> 
    <script src="modulo.js" type="text/javascript"></script>
    <script src="menu_iconos.js" type="text/javascript"></script> 
    <script src="semana.js" type="text/javascript"></script>  
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
    <script> 
      // Change the selector if needed
      var $table = $('table.scroll'),
          $bodyCells = $table.find('tbody tr:first').children(),
          colWidth;

      // Adjust the width of thead cells when window resizes
      $(window).resize(function() {
          // Get the tbody columns width array
          colWidth = $bodyCells.map(function() {
              return $(this).width();
          }).get();
          
          // Set the width of thead columns
          $table.find('thead tr').children().each(function(i, v) {
              $(v).width(colWidth[i]);
          });    
      }).resize(); // Trigger resize handler
    </script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  	<title>Orden de construcción</title>
  	<div class="form-group m3">
  </head>
  <body>     
      <div class="row" style="margin-left: 5px">
        <div class="col l8 m12 s12" style="margin-top:1em">
          <div class="row">
            <div class="col l12 s12 m12">           
              <div id="title">    
              </div>
              <?php
                include_once '../db_config.php';
                if($_GET['edit_id'])
                {
                $id = $_GET['edit_id']; 
                $stmt=$db_con->prepare("SELECT * FROM obra WHERE folio=:id");
                $stmt->execute(array(':id'=>$id)); 
                $row=$stmt->fetch(PDO::FETCH_ASSOC);
                }
              ?>
              <!--Elaboración de card para datos de obra general-->
              <div class="row">
                <div class="col l12 s12 m6 center">
                  <div class="card color-smenu">
                    <div class="card-content white-text">
                      <span class="card-title" style="font: 150% sans-serif;"><?php echo $row['titulo'];?></span>
                      <span class="card-title" style="font: 150% sans-serif; color: white">FOLIO DE OBRA <?php echo $row['folio'];?></span>
                      <p style="font: 90% sans-serif;">CLIENTE <?php echo $row['cliente'];?></p></br>
                      <p style="font: 90% sans-serif;">CONTRATISTA <?php echo $row['contratista'];?> N° CONTRATISTA <?php echo $row['num_contratista'] ?></p></br>
                      <p style="font: 90% sans-serif;">RESIDENTE DE OBRA <?php echo $row['residente_obra'];?> N° RESIDENTE <?php echo $row['num_residente'] ?></p></br>
                      <p style="font: 90% sans-serif;"><i class="material-icons white-text">location_on</i></p>
                      <p style="font: 90% sans-serif;"><?php echo $row['zona'] ?> N° Lote <?php echo $row['lote'] ?></p>
                      <p style="font: 90% sans-serif;"><?php echo $row['ciudad'] ?>, <?php echo $row['entidad'] ?></p>
                    </div>
                    <div class="card-action #757575 grey darken-1">
                      <a class="white-text"style="font-size:12px">Presupuesto de la obra <?php echo $row['presupuesto'];?></a>
                    </div>
                  </div>
                </div>
              </div>
              <!--Finaliza card de obra general-->
              <!--Sección de divs ocultos -->
              <div>
                <input type="hidden" id="c_folio"  value="<?php echo $row['folio'];?>" readonly></th> 
                <input type="hidden" id="c_id"     value="<?php echo $row['id'];?>" readonly></th> 
                <input type="hidden" id="c_pres"   value="<?php echo $row['presupuesto'];?>" readonly></th> 
                <input type="hidden" id="c_semana" value="<?php echo $row['num_semana'];?>" readonly></th>
                <input type="hidden" id="c_modelo" value="<?php echo $row['id_modelo'];?>" readonly></th>
                <input type="hidden" name="fecha" id="fecha" value="<?php echo date('Y-m-d');?>" readonly> 
                <input type="hidden" name="hora"  id="hora"  value="<?php date_default_timezone_set("America/Mexico_City"); echo date('h:i:sa');?>" readonly>  
                  <?php
                  include_once '../db_config.php';
                  if($_GET['edit_id'])
                  {
                  $id = $_GET['edit_id']; 
                  $stmt=$db_con->prepare("SELECT * FROM obra WHERE folio=:id");
                  $stmt->execute(array(':id'=>$id)); 
                  $row=$stmt->fetch(PDO::FETCH_ASSOC);
                  }
                  ?>
              </div>
              <!--Termina sección de divs ocultos-->
            </div>
            <div class="col l12 m12 s12 m12 s12">      
              <table class="striped centered" id="crear">
                <thead class="#757575 grey darken-1 white-text" style="font: small-caps 100%/200% serif;"><tr>
                  <center><th style="font: 150% sans-serif; font-size: 14px; color: white">Fecha Inicio</th></center> 
                  <center><th style="font: 150% sans-serif; font-size: 14px; color: white">Fecha Fin</th></center> 
                  <center><th style="font: 150% sans-serif; font-size: 14px; color: white">Num. Semana</th></center> 
                  <center><th style="font: 150% sans-serif; font-size: 14px; color: white">Semanas por Asignar</th></center>
                  <center><th style="font: 150% sans-serif; font-size: 14px; color: white">Crear</th></center></tr>          
                </thead> 
                <tbody class="color-smenu"><tr>    
                  <td><input type="date" name ="inicio" id="inicio" class='form-control center' required></td> 
                  <td><input type="date" name="fin" id="fin" class='form-control center' required></td> 
                  <td><input type="text" id="num_semana" name="num_semana"  class='form-control center' required></td>  
                  <td><input type="text" id="res_semana" class="center"value="<?php echo $row['res_semana'];?>" readonly></td>
                  <td><center><a href="#" id="semana"><i class="material-icons green-text center">date_range</i></a>
                  </center>
                  </td></tr>                         
                </tbody> 
              </table>
            </div>
          </div>
        </div>
        <!-- Card para el listado de semanas-->        
        <div class="col l4 m12 s12" style="margin-top:1em">
          <div class="row">
            <div class="col l12 m12 s12">
              <div class="card color-smenu">
                <div class="card-content white-text">
                  <span class="card-title center" style="font: 150% sans-serif;">Mis Semanas</span>
                  <table class="striped centered scroll" id="sem">          
                    <thead clasS="#757575 grey darken-1 white-text" style="font: small-caps 100%/200% serif;">    
                    <tr>
                      <center><th style="font: 150% sans-serif; font-size: 14px; color: white">N° Semana</th></center>
                      <center><th style="font: 150% sans-serif; font-size: 14px; color: white">Fecha Inicio</th></center> 
                      <center><th style="font: 150% sans-serif; font-size: 14px; color: white">Fecha Fin</th></center>           
                      <center><th style="font: 150% sans-serif; font-size: 14px; color: white">Eliminar</th></center> 
                    </tr>         
                    </thead> 
                    <tbody class="center #f5f5f5 grey lighten-4">   
                     <?php
                      include_once '../db_config.php';
                      if($_GET['edit_id'])
                      {
                      $id = $_GET['edit_id']; 
                      $stmt=$db_con->prepare("SELECT *, DATE_FORMAT(fecha_inicio,'%d/%m/%Y') AS fecha_inicio, DATE_FORMAT(fecha_fin,'%d/%m/%Y') AS fecha_fin FROM semana WHERE folio=:id ORDER BY id");
                      $stmt->execute(array(':id'=>$id)); 
                      while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                      {
                      ?>   
                      <tr class="center">
                        <td class="center"><input class="center"type="text" style="font-size:12px" id="asign" value="<?php echo $row['num_semana'];?>" readonly></td>
                        <td class="center"><input class="center"type="text" style="font-size:12px" id="" value="<?php echo $row['fecha_inicio'];?>" readonly></td> 
                        <td class="center"><input class="center"type="text" style="font-size:12px" id="" value="<?php echo $row['fecha_fin'];?>" readonly></td>               
                        <td class="center"><center><a href="#" id="<?php echo $row['id']; ?>" class="sem_eliminar"><i class="material-icons red-text center">delete</i></a>
                      </center>
                      </td>  
                      </tr> 
                      <?php
                      }
                      }
                      ?>                        
                    </tbody> 
                  </table>
                </div>
              </div>
            </div>
          </div>              
        </div>
        <!-- Card para el listado de semanas-->     
      </div>
      <!-- MODAL ZONE!!! -->
      <!-- CREATE MODAL -->
      <div id="modal1" class="modal">
        <div class="modal-content">  
            <div class="form-group">
                <label>Cliente</label>
                <select required  name="cliente" id="cliente" class="browser-default" required>
                <option value="">Selección:</option> 
                <?php  
                require_once '../db_config.php';
                $stmt=$db_con->prepare("SELECT * FROM cliente");
                $stmt->execute(array(':id'=>$id)); 
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                ?>
                <option value="<?php echo$row['nombre_comercial'];?>"><?php echo $row['nombre_comercial'];?></option>
                <?php
                } 
                ?>
                </select> 
            </div> 
            <br>
            <div class="form-group">
              <label>Reporte<textarea style="overflow:auto;resize:none" name="reporte" id="reporte" class='form-control' required></textarea></label>
              <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario']; ?>" readonly>
            </div>           
            <div class="form-group">
              <input type="text" name="fecha" id="fecha"  value="<?php echo date('Y-m-d');?>" readonly>
            </div>  
            <br>
            <div class="form-group">
              <input type="text" name="hora" id="hora" value="<?php date_default_timezone_set("America/Mexico_City"); echo date('h:i:sa');?>" readonly>
            </div>  
            <br> 
              <input type="text" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario']; ?>" readonly>
            <br>
            <center><button class="btn #757575 indigo darken-1 z-depth-5" type="submit" id="ed_cli" name="action">Agregar
            <i class="material-icons right">send</i>
            </button></center>
        </div>
        <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect btn-flat" id="cancel"><i class="material-icons">close</i></a>
        </div>
      </div>        
      <div id="modal2" class="modal">
        <div class="modal-content">   
          <div class="form-group">
            <label>Presupuesto<input type="number" id="cantidad" name="cantidad"></label>  
          </div>
          <div class="form-group"> 
            <label>Reporte<textarea style="overflow:auto;resize:none" name="reporte_pre" id="reporte_pre" class='form-control' required></textarea></label>    
            <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario']; ?>" readonly>
          </div> 
            <br> 
          <button class="btn #757575 indigo darken-1 z-depth-5" type="submit" id="sumar" name="action">Agregar
            <i class="material-icons right">add</i>
          </button> 
          <button class="btn #757575 indigo darken-1 z-depth-5" type="submit" id="restar" name="action">Quitar
            <i class="material-icons right">remove</i>
          </button> 
          <br> 
          </div> 
        <div class="form-group">
          <input type="hidden" name="fecha" id="fecha" value="<?php echo date('Y-m-d');?>" readonly> 
          <input type="hidden" name="hora" id="hora" value="<?php date_default_timezone_set("America/Mexico_City"); echo date('h:i:s a');?>" readonly>  
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect btn-flat" id="cancel"><i class="material-icons">close</i></a>
      </div>
  </body> 
</html>