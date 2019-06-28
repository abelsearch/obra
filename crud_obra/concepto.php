<?php include('../smenu.php'); ?> 
<?php include('menu_obra.php'); 
?> 

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
<input type="hidden" id="c_folio" value ="<?php echo $row['folio'];?>" readonly>
<input type="hidden" id="o_contratista" value ="<?php echo $row['contratista'];?>" readonly>
<input type="hidden" id="o_num_contratista" value ="<?php echo $row['num_contratista'];?>" readonly>
<input type="hidden" id="o_residente" value ="<?php echo $row['residente_obra'];?>" readonly>
<input type="hidden" id="o_num_residente" value ="<?php echo $row['num_residente'];?>" readonly>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="../js/materialize.min.js" type="text/javascript"></script> 
    <script src="../crud_concepto/menu_iconos.js" type="text/javascript"></script>
    <script type="text/javascript" src="../js/jquery.tabledit.js"></script>    
    <script src="concepto.js" type="text/javascript"></script>
    <script src="modulo.js" type="text/javascript"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style type="text/css" media="screen">
      #loading {
      display: block;
      position: absolute;
      top: 0;
      left: 0;
      z-index: 100;
      width: 100vw;
      height: 100vh;
      background-image: url("http://i.stack.imgur.com/MnyxU.gif");
      background-repeat: no-repeat;
      background-position: center;  
      } 
    </style>
    <title>Conceptos</title>
  </head>
  <body> 
   
    <!--Diseño de buscador, select y tabla de cconcetos-->
      <div class="row"> 
        <div class="col m12">
          <div>
            <?php 
              require_once '../db_config.php';  
              if($_GET['id'])
              {
              $id = $_GET['id']; 
              $stmt=$db_con->prepare("SELECT  ROUND (SUM(importe),2) as total_conceptos FROM concepto WHERE folio=:id");
              $stmt->execute(array(':id'=>$id));    
              $row=$stmt->fetch(PDO::FETCH_ASSOC); 
              {   
              ?>
              <script type="text/javascript">
                $(document).ready(function(){
                  $('#ul_iconos').prepend('<li>&nbsp$'+ <?php echo$row['total_conceptos'];?> +'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</li> ').prepend('<li>&nbspPresupuesto Total: </li> ');        
                  $('#ul_iconos').prepend('<li>&nbsp <b>FOLIO ' + $('#c_folio').val() + '</b>&nbsp&nbsp</li>');             
                });
              </script>
               <?php
              }   
             }
            ?>    
          </div> 
          <br> 
          <div id="con_loading">
          
          </div> 
          <table id="example" class="centered responsive"> 
            <thead clasS="color-menu white-text" style="font: small-caps 100%/200% serif;">
                <tr> 
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Etapa</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Partida</center></th>  
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Descripción</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Unidad</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Cantidad</center></th>  
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Avance</center></th>
                <!--</tr>-->
            </thead> 
            <tbody> 
              <?php  
              $servername = "192.185.131.25";
    $username   = "seicolag_cadmin";
    $password   = "@seicolagc@@";
    $dbname     = "seicolag_constructora";
               $id_modelo = $_GET['id_modelo']; 
               $id = $_GET['id'];
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
//-
    $sql = ("SELECT c.id as id,c.partida as partida, c.descripcion as descripcion, c.unidad as unidad,
                  c.cantidad as cantidad,c.precio_unitario as precio_unitario, c.importe as importe, e.nombre as etapa
                  FROM modelo_concepto c INNER JOIN etapa_modelo e ON c.etapa=e.id WHERE c.id_modelo = '$id_modelo'");
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      
        while($row = mysqli_fetch_assoc($result)) { 
          ?>
        
              <td class="#00838f cyan darken-3 white-text"style="font: small-caps 100%/200% serif;font-size:10px"><center><?php echo $row['etapa']; ?></center></td> 
              <td><center><?php echo $row['partida']; ?></center></td> 
                <td><center><?php echo $row['descripcion']; ?></center></td> 
                <td><center><?php echo $row['unidad']; ?></center></td>
                <td><center><?php echo $row['cantidad']; ?></center></td> 
                <td align="center" class="color-smenu">
                  <center>
                  <a id="<?php echo $row['id']; ?>" class="ver tooltipped" data-position="top" data-tooltip="Ver" href="#modal9">
                    <i class="material-icons white-text  center">add_to_home_screen</i>
                  </a>
                  </center>
                </td>
                
              
               </tr>
          <?    
        }
    } else {  

        echo "0 resultados para este folio";
    }
    
    mysqli_close($conn);          
              ?> 
              <!--<tr> --> 
              
              
            </tbody>
          </table> 
        </div>
      </div>
    <!--Modal para agregar un nuevo concepto a la obra-->
      <div id="modal1" class="modal">
        <div class="modal-content">
          <div class="row">
            <div class="col l12 center">
              <h2 style="font: small-caps 100%/200% serif;font-size:30px">Nuevo Concepto</h2>
              <hr color="orange" align="center">
            </div>
            <!--Select que muestra las fases de la obra asignada al folio actual-->
            <div class="col l6 m12 s12">
              <select id="select_fase" class="browser-default" required>
                 <option value="">Selecciona una Etapa</option> 
                    <?php  
                    require_once '../db_config.php';
                    if($_GET['id'])
                    {
                    $id = $_GET['id']; 
                    $stmt=$db_con->prepare("SELECT * FROM fases WHERE id_folio=:id");
                    $stmt->execute(array(':id'=>$id)); 
                    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <option value="<?php echo$row['id'];?>">Fase :  <?php echo $row['nombre'];?></option>
                    <?php
                    } 
                    }
                    ?>  
                </select>
            </div>
            <div class="col l6 m12 s12">
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
                    <label class="">Folio<input type="text" name="folio" id="folio" value="<?php echo$row['folio'];?>" readonly></label> 
                                
                     <?php
                    }  
                }
            ?>
            </div>
            <br> 
            <br> 
            <div class="col l5 m12 s12">
              <label>Selecciona un concepto</label>
              <select required id="concepto" class="browser-default"> 
                <option value="">Selección:</option> 
                <?php  
                require_once '../db_config.php';
                if($_GET['id_modelo']) 
                {
                //$id = $_GET['id']; 
                $id_modelo = $_GET['id_modelo']; 
                $stmt=$db_con->prepare("SELECT * FROM modelo_concepto WHERE id_modelo=$id_modelo");
                $stmt->execute(array(':id'=>$id)); 
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                ?>
                <option value="<?php echo $row['unidad'];?>" id="<?php echo $row['importe'];?>" 
                name="<?php echo $row['precio_unitario'];?>" class="<?php echo $row['id_modelo'];?>" 
                data-phase="<?php echo $row['etapa'];?>" 
                data-pe="<?php echo $row['res_cantidad'];?>" 
                data-es="<?php echo $row['est_cantidad'];?>" 
                data-fo="<?php echo $row['folio'];?>" 
                data-par="<?php echo $row['partida'];?>"    
                ><?php echo $row['etapa'];?> - <?php echo $row['descripcion'];?></option>
                <?php
                } 
                }
                ?>
              </select>
            </div>
        <div class="col l4 m12 s12">
                <label class="">Modelo<input type="text" name="modelo" id="modelo" required></label>
            </div> 
            <div class="col l4 m12 s12">
                <label class="">Partida<input type="text" name="partida" id="partida" required></label>
            </div> 
            <div class="col l4 m12 s12">
                <label class="">Descripción<input type="text" name="descripcion" id="descripcion" required></label>
            </div>   
            <br> 
            <div class="col l2 m12 s12">
                 <label class="">Unidad<input type="text" name="unidad" id="unidad" required></label>
              </div> 
            <br> 
            <div class="col l2 m12 s12">
                 <label class="">Cantidad<input type="text" name="cantidad" id="cantidad" required></label>
              </div> 
            <br> 
            <div class="col l2 m12 s12">
              <label class="">Precio Unitario<input type="text" name="precio" id="precio" required></label>
            </div> 
            <br>
             <div class="form-group">
              <input type="hidden" name="fecha" id="fecha"  value="<?php echo date('Y-m-d');?>" readonly>
            </div>  
            <br>
            <div class="form-group">
            <input type="hidden" name="hora" id="hora" value="<?php date_default_timezone_set("America/Mexico_City"); echo date('h:i:sa');?>" readonly>
            </div>  
            <br> 
            <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario']; ?>" readonly>
            <div class="col l4 m12 s12" style="margin-top:4em">
              <button class="btn white black-text z-depth-5" type="submit" id="con_crear" name="action">Agregar
              <i class="material-icons right">send</i>
              </button>
            </div>
          </div>
        </div>
        <div class="modal-footer orange">
          <a href="#!" class=" modal-action modal-close waves-effect white btn-flat" id="cancel"><i class="material-icons">close</i></a>
        </div>
      </div>
    <!--Termina modal de nuevo concepto-->
    <!--Inicia Modal para adjuntar excel con conceptos-->
      <div id="modal2" class="modal">
        <div class="modal-content"> 
          <form method="POST" action='concepto_excel.php' enctype="multipart/form-data"> 
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
            <th>concepto</th>
            <th>costo</th>
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
    <!--Termina modal para adjuntar excel de conceptos-->
    <!--Modal para agregar una etapa al presupuesto-->
      <div id="modal3" class="modal">
        <div class="modal-content">
          <div class="row">
            <div class="col l12 center">
              <h2 style="font: small-caps 100%/200% serif;font-size:30px">Nueva Etapa</h2>
              <hr color="blue" align="center">
            </div>
            <div class="col l6 m12 s12">
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
                      <label class="white-text">Folio<input type="text" name="folio" id="folio" value="<?php echo$row['folio'];?>" readonly></label>
                                  
                       <?php
                      }  
                  }
              ?>
            </div>            
            <div class="col l6 m12 s12">
              <label class="">Nombre de la Etapa</label>
              <input type="text" id="nombre_etapa">
            </div>
            <div class="col l6 m12 s12" style="margin-top:4em">
              <button class="btn white black-text z-depth-5" type="submit" id="btn_nueva_etapa" name="action">Agregar Etapa
              <i class="material-icons right blue-text">send</i>
              </button>
            </div>
          </div>
        </div>
        <div class="modal-footer #0d47a1 blue darken-4">
          <a href="#!" class=" modal-action modal-close waves-effect white btn-flat" id="cancel"><i class="material-icons">close</i></a>
        </div>
      </div> 
      <!----> 
      <div id="modal9" class="modal">
        <div class="modal-content9">
          <div class="row">
                        
            
            
          </div>
        </div>
        <div class="modal-footer">
          <a href="#!" class=" modal-action modal-close waves-effect red btn-flat" id="cancel"><i class="material-icons">close</i></a>
        </div>
      </div>
    <!--Termina modal para agregar una etapa-->
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
       $('#nav-con').attr('style','background-color: rgb(38,50,56); color: white;');
       });
    </script>