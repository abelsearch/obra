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
    <!--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
    <script src="../js/materialize.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../js/jquery.tabledit.js"></script> 
    <script src="../crud_insumo/menu_iconos.js" type="text/javascript"></script>  
    <script src="insumo.js" type="text/javascript"></script>
    <script src="modulo.js" type="text/javascript"></script>     
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body class="color-fondo">
    <div class="row">
      <div class="col m12">
        <div id="title">
        </div>
        <div>
          <?php
          require_once '../db_config.php';
          if($_GET['id'])
          {
          $id = $_GET['id'];
          $stmt=$db_con->prepare("SELECT ROUND (SUM(importe),2) as importe, ROUND(SUM(importe_real),2) as importe_real FROM salida_insumo WHERE folio_orden=:id");
          $stmt->execute(array(':id'=>$id));
          $row=$stmt->fetch(PDO::FETCH_ASSOC);
          {
          ?>
          <script type="text/javascript">
            $(document).ready(function(){
              $('#ul_iconos').prepend('<li>&nbsp$'+<?php echo$row['importe_real'];?>+'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</li> ').prepend('<li>&nbspReal: </li> ');
              $('#ul_iconos').prepend('<li>&nbsp$'+<?php echo$row['importe'];?>+'</li>').prepend('<li>Proyectado: </li> ');
              $('#ul_iconos').prepend('<li>&nbsp <b>FOLIO '+$('#c_folio').val()+'</b>&nbsp&nbsp</li>');                
            });
          </script>
          <b></b>
          <br>
          <b></b>
          <?php
          }
          }
          ?>
        </div>
        <br>          
        <table id="example" class="responsive">
          <thead class="color-menu">
            <tr>
            <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Nombre</center></th>
            <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Unidad</center></th>
            <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Cantidad</center></th>
            <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>N° Semana</center></th> 
            <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Registrar Salida</center></th>                
            <!--</tr>-->
          </thead>
          <tbody class="collection">
            <?php
            require_once '../db_config.php';
            if($_GET['id'])
            {
            $id = $_GET['id'];
            $stmt=$db_con->prepare("SELECT * FROM salida_insumo WHERE folio=:id");
            $stmt->execute(array(':id'=>$id));
            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
            {
            ?>
            <tr>
              <td class="black-text"><center><?php echo $row['nombre_insumo']; ?></center></td>
              <td class="black-text"><center><?php echo $row['unidad']; ?></center></td>
              <td class="black-text"><center><?php echo $row['cantidad']; ?></center></td>
              <td class="black-text"><center><?php echo $row['num_semana']; ?></center></td>  
              <td align="center"> 
              <?php
              if($row['estatus'] == 'ACEPTADO' ){
              ?>
              <center>
              <a href="#" id="<?php echo $row['id']; ?>" class='admin'>
              <i class="material-icons green-text center tooltipped" data-position="top" data-tooltip="Cancelar Salida">done_all</i></a>
              </center>
              <?php
              }
              ?>
              <?php
              if($row['estatus'] == 'PENDIENTE' ){
              ?>
              <center>
              <a href="#" id="<?php echo $row['id']; ?>" class='aceptar'>
              <i class="material-icons  blue-text  center tooltipped" data-position="top" data-tooltip="Registrar Salida">check</i></a>
              </center> 
              <?php
              }
              ?>
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
    <!--INICIA MODAL PARA AGREGAR UN INSUMO-->
    <div id="modal1" class="modal">
      <div class="modal-content">
        <div class="col l12 m12 s12 white-text"style="background-color:#10ac84">
          <h3 class="center"style="font: 150% sans-serif;">Nuevo Insumo</h3>
        </div>
        <div class="col l12 m12 s12 center">
          <?php
            require_once '../db_config.php';
            if($_GET['id'])
            {
            $id = $_GET['id'];
            $stmt=$db_con->prepare("SELECT * FROM obra WHERE folio=:id");
            $stmt->execute(array(':id'=>$id));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            {
            ?>
              <label>Folio<input class="center"type="text" name="folio" id="folio" value="<?php echo$row['folio'];?>" readonly></label>
            <?php
            }
            }
          ?>
        </div>  
        <br> 
        <br> 
        <br> 
        <br>
        <div class="col l1 m12 s12">
        <a class="tooltipped" id="trigger3" data-tooltip="Nuevo Insumo"><i class="material-icons">add_circle</i></a>
        </div>
        <div class="col l4 m12 s12">
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
        <div class="col l4 m12 s12">
          <label>Material</label>
          <select required  name="insumo" id="insumo" class="browser-default" required>
            <option value="">Selección:</option>
            <?php
            require_once '../db_config.php';
            $stmt=$db_con->prepare("SELECT * FROM catalogo_insumo ORDER BY id");
            $stmt->execute();
            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
            {
            ?>
            <option  value="<?php echo$row['id'];?>"
            data-s="<?php echo $row['stock'];?>"
            data-u="<?php echo $row['unidad'];?>"
            >
            <?php echo $row['nombre'];?>
            <?php
            }
            ?>
          </select>
        </div>
        <div class="col l4 m12 s12">
          <input type="hidden" name="nombre" id="nombre" required>
        </div>
        <div class="col l4 m12 s12">
          <label>Stock<input type="text" name="stock" id="stock" required></label>
        </div>
        <div class="col l4 m12 s12">
          <label>Unidad<input type="text" name="unidad" id="unidad" readonly></label>
        </div>
        <div class="col l4 m12 s12">
          <label>Cantidad<input type="number" name="cantidad" id="cantidad" required></label>
        </div>          
        <div class="col l4 m12 s12">
          <input type="hidden" name="fecha" id="fecha"  value="<?php echo date('Y-m-d');?>" readonly>
        </div> 
        <div class="col l4 m12 s12">  
          <label>Hora<input type="text" name="hora" id="hora" class="timepicker" ></label>
        </div> 

        <div class="col l4 m12 s12">
          <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario']; ?>" readonly>
        </div>
        <div class="col l12 m12 s12" style="margin-top:1em">
          <center><button class="btn z-depth-5" style="background-color:#10ac84"type="submit" id="lista" name="action">Agregar
          <i class="material-icons right">send</i>
          </button></center>
        </div>        
      </div>
      <div class="modal-footer col l12 m12 s12">
        <a href="#!" class="red modal-action modal-close waves-effect btn-flat" id="cancel"><i class="material-icons">close</i></a>
      </div>    
    </div>

    <!--TERMINA MODAL PARA AGREGAR UN INSUMO-->
    <!--INICIA MODAL PARA ADJUNTAR EXCEL-->
    <div id="modal2" class="modal">
      <div class="modal-content"> 
        <form method="POST" action='insumo_excel.php' enctype="multipart/form-data"> 
          <div class="form-group">
            <label>Adjuntar Archivo Excel</label>
            <input type="file" name="file" class="form-control">
          </div>  
            <br> 
            <br>
            NOTA: El archivo excel no debe contener encabezados, solo los valores en 
            el siguiente orden: 
            <br>  
            <br>
          <table>
          <thead>
          <tr>
          <th>folio de la orden</th>
          <th>tipo del insumo</th>
          <th>descripción</th>
          <th>unidad</th>
          <th>cantidad</th>
          <th>precio unitario</th>
          <th>número de la semana(1,2,3,etc..)</th>               
          </tr>
          </thead>
          </table>
          <div class="form-group"> 
           <input type="hidden" name="fecha" id="fecha" value="<?php echo date('Y-m-d');?>" readonly>
          </div>           
          <div class="form-group">
            <input type="hidden" name="hora" id="hora" value="<?php date_default_timezone_set("America/Mexico_City"); echo date('h:i:sa');?>" readonly>
          </div>
          <div class="form-group">
            <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario']; ?>" readonly>   
          </div>
          <br>          
          <button class="btn waves-effect #757575 indigo darken-1 z-depth-5" type="submit" name="Submit">Agregar
          <i class="material-icons right">send</i>
          </button>
        </form>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect btn-flat" id="cancel"><i class="material-icons">close</i></a>
      </div>
    </div>
    <!--TERMINA MODAL PARA ADJUNTAR EXCEL--> 
    <!-- AGREGAR OTRO INSUMO -->
    <div id="modal3" class="modal">
      <div class="modal-content">
        <div class="form-group">
          <label>Nombre<input type="text" name="nombre" id="Nnombre" required></label>
        </div>
        <div class="form-group">
          <label>Unidad<input type="text" name="unidad" id="Nunidad" required></label>
        </div>
        <div class="form-group">
          <label>Saldo Inicial<input type="number" name="saldo" id="Nsaldo" required></label>
        </div>
        <div class="col l4 m12 s12">
          <input type="hidden" name="fecha" id="Nfecha" value="<?php echo date('Y-m-d');?>" readonly>
        </div>
        <button class="btn waves-effect orange z-depth-5" type="submit" id="enviarN" name="action">CREAR
        <i class="material-icons right">send</i>
        </button>
      </div>
    </div>
  </body>
</html>
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

  <script> 
  $(document).ready(function(){
    $('.timepicker').timepicker();
  });
  </script>
  
  <!--Función para darle color activo a la opción insumo del menú tabs-->
  <script type="text/javascript">
   $(document).ready(function(){
   $('#nav-ins').attr('style','background-color: rgb(38,50,56); color: white;');
   });
  </script>