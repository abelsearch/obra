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
<input type="hidden" id="c_folio" value="<?php echo $row['folio'];?>" readonly>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
    <script src="../js/materialize.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../js/jquery.tabledit.js"></script> 
    <script src="../crud_insumo/menu_iconos.js" type="text/javascript"></script>
    <script src="insumo.js" type="text/javascript"></script>  
    <script src="concepto.js" type="text/javascript"></script>
    <script src="adicional.js" type="text/javascript"></script> 
    <script src="flujo.js" type="text/javascript"></script> 
    <script src="evidencia.js" type="text/javascript"></script> 
    <script src="avance.js" type="text/javascript"></script>
    <style type="text/css" media="screen">
    #loading {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 100;
    width: 100vw;
    height: 100vh;
    background-color: rgba(192, 192, 192, 0.5);
    background-image: url("http://i.stack.imgur.com/MnyxU.gif");
    background-repeat: no-repeat;
    background-position: center;
    } 

    input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
    </style>
    
    <title>Insumos</title>
  </head>
  <body>
    <div class="">
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
            $stmt=$db_con->prepare("SELECT ROUND (SUM(importe),2) as importe, ROUND(SUM(importe_real),2) as importe_real FROM lista_insumo WHERE folio_orden=:id");
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
          <div id="loading">
          </div>
          
          <table id="example" class="centered responsive">
            <thead>
              <tr>
                <th></th>
                <th><center>Tipo</center></th>
                <th><center>Descripción</center></th>
                <th><center>Unidad</center></th>
                <th><center>Cantidad</center></th>
                <th><center>Precio Unitario</center></th>
                <th><center>Importe</center></th>
                <th><center>Cantidad Real</center></th>
                <th><center>Precio Real</center></th>
                <th><center>Importe Real</center></th>
                <th><center>Cruce</center></th>
                <th><center>Aceptar</center></th>
                
                <!--</tr>-->
              </thead>
              <tbody>
                <?php
                require_once '../db_config.php';
                if($_GET['id'])
                {
                $id = $_GET['id'];
                $stmt=$db_con->prepare("SELECT * FROM lista_insumo WHERE folio_orden=:id ORDER BY estado DESC");
                $stmt->execute(array(':id'=>$id));
                while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                ?>
                <!--<tr>-->
                <tr id="<?php echo $row ['id']; ?>">
                  <td><center><?php echo $row['id']; ?></center></td>
                  <td><center><?php echo $row['tipo_insumo']; ?></center></td>
                  <td><center><?php echo $row['descripcion']; ?></center></td>
                  <td><center><?php echo $row['unidad']; ?></center></td>
                  <td><center><?php echo $row['cantidad']; ?></center></td>
                  <td><center><?php echo $row['precio_unitario']; ?></center></td>
                  <td><center><?php echo $row['importe']; ?></center></td>
                  <td><center><?php echo $row['cantidad_real']; ?></center></td>
                  <td><center><?php echo $row['precio_real']; ?></center></td>
                  <td><center><?php echo $row['importe_real']; ?></center></td>
                  <td><center><?php echo $row['cruce']; ?></center></td>
                  <td align="center"> 
                  <?php
                  if($row['estado'] == 'ACEPTADO' ){
                  ?>
                  <center>
                  <a href="#" id="<?php echo $row['id']; ?>" class='op'>
                  <i class="material-icons green-text center">check</i></a>
                  </center>
                  <?php
                  }
                  ?>
                  <?php
                  if($row['estado'] == 'EDITABLE' ){
                  ?>
                  <center>
                  <a href="#" id="<?php echo $row['id']; ?>" class='aceptar'>
                  <i class="material-icons  blue-text  center">check</i></a>
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
      </div>
      <!-- MODAL ZONE!!! -->
      <!-- CREATE MODAL -->
      <div id="modal1" class="modal">
        <div class="modal-content">
          <h3>Nuevo Insumo</h3>
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
          <div class="form-group">
            <label>Folio<input type="text" name="folio" id="folio" value="<?php echo$row['folio'];?>" readonly></label>
          </div>
          <?php
          }
          }
          ?>
          <div class="form-group">
            <label>Tipo Insumo</label>
            <select required  name="insumo" id="insumo" class="browser-default" required>
              <option value="">Selección:</option>
              <?php
              require_once '../db_config.php';
              $stmt=$db_con->prepare("SELECT * FROM catalogo_insumo ORDER BY id");
              $stmt->execute();
              while($row=$stmt->fetch(PDO::FETCH_ASSOC))
              {
              ?>
              <option  value="<?php echo$row['descripcion'];?>"><?php echo $row['descripcion'];?>
                <?php
                }
                ?>
              </select>
            </div>
            <br>
            <div class="form-group">
              <label>Descripción<input type="text" name="descripcion" id="descripcion" required></label>
            </div>
            <br>
            <div class="form-group">
              <label>Unidad<input type="text" name="unidad" id="unidad" required></label>
            </div>
            <br>
            <div class="form-group">
              <label>Cantidad<input type="number" name="cantidad" id="cantidad" required></label>
            </div>
            <br>
            <div class="form-group">
              <label>Precio Unitario<input type="number" name="precio_unitario" id="precio_unitario" required></label>
            </div>
            <br> 
            <div class="form-group">
              <input type="hidden" name="fecha" id="fecha"  value="<?php echo date('Y-m-d');?>" readonly>
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
            <div class="form-group">
              <input type="hidden" name="hora" id="hora" value="<?php date_default_timezone_set("America/Mexico_City"); echo date('h:i:sa');?>" readonly>
            </div> 
            <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario']; ?>" readonly>
            <br>
            <center><button class="btn #757575 indigo darken-1 z-depth-5" type="submit" id="lista" name="action">Agregar
            <i class="material-icons right">send</i>
            </button></center>
          </div>
          <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect btn-flat" id="cancel"><i class="material-icons">close</i></a>
          </div>
        </div> 

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
  $('#example').Tabledit({
  deleteButton: false,
  editButton: false,
  columns: {
  identifier: [0, 'id'],
  editable: [[7, 'cantidad_real'], [8, 'precio_real']]
  },
  hideIdentifier: true,
  url: 'live_edit.php'
  });
  });
  </script>
  <script>
  $('#loading').hide();
  document.addEventListener('keyup', function(e){
  if(e.keyCode == 13)
  setTimeout(function() {
  window.location.reload();
  $('#loading').show();
  }, 1000);
  $('#loading').hide();
  })
  </script>
  <!--Función para darle color activo a la opción insumo del menú tabs-->
  <script type="text/javascript">
   $(document).ready(function(){
   $('#nav-ins').attr('style','background-color: rgb(38,50,56); color: white;');
   });
  </script>