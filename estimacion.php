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
    <script src="../crud_estimacion/menu_iconos.js" type="text/javascript"></script> 
    <script type="text/javascript" src="../js/jquery.tabledit.js"></script>    
    <script src="modulo.js" type="text/javascript"></script>
    <script src="estimacion.js" type="text/javascript"></script> 
    <script src="correccion_estimacion.js" type="text/javascript"></script>
    <title>Conceptos</title>
  </head>
  <body>    
    <div class="row" style="margin-top:1em">
      <div>
        <?php 
          require_once '../db_config.php';  
          if($_GET['id'])
          {
          $id = $_GET['id']; 
          $stmt=$db_con->prepare("SELECT ROUND (SUM(importe),2) as total_conceptos FROM concepto WHERE folio=:id");
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
      <div class="col l3 m12 s12 #00897b teal darken-1 white-text">
        Importe Ejecutado:<input type="text" class="white-text" disabled id="tot"></label>
      </div>
      <div class="col l3 m12 s12 #00897b teal darken-1 white-text">
        % Avance Presupuesto:<input type="text" class="white-text"  disabled id="por"></label>
      </div>
      <div class="col l6 m12 s12">
        <select id="select_semana" class="browser-default" required style="font-size:18px">
         <option value="">Selecciona una semana:</option> 
            <?php  
            require_once '../db_config.php';
            if($_GET['id'])
            {
            $id = $_GET['id']; 
            $stmt=$db_con->prepare("SELECT * FROM semana WHERE folio=:id");
            $stmt->execute(array(':id'=>$id)); 
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
            <option value="<?php echo$row['num_semana'];?>" class="<?php echo $row['folio'];?>"
                data-t="<?php echo $row['avance_total'];?>" 
                data-p="<?php echo $row['avance_porcentaje'];?>"    
                
            >Semana <?php echo $row['num_semana'];?> <?php echo $row['fecha_inicio'];?> - <?php echo $row['fecha_fin'];?> 
                  
            </option>
            <?php
            } 
            }
            ?>  
        </select>
      </div>
        <table id="example" class="centered responsive"> 
          <thead clasS="#e65100 orange darken-4 white-text" style="font: small-caps 100%/200% serif;">
              <tr>  
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Etapa</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Descripción</center></th>   
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Unidad</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Importe</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Cantidad</center></th> 
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>% Concepto</center></th> 
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>% Presupuesto</center></th>  
          </thead>  
          <tbody class="body">
          </tbody>
        </table>
    </div>
    <!-- Empiezan los modals-->
    <!-- Empieza Modal que crea una estimación-->
    <div id="modal1" class="modal">
      <div class="modal-content">  
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
              <div class="col l3 m12 s12 orange"> 
              <label class="white-text">Presupuesto<input class="white-text" type="text" name="presupuesto" id="presupuesto" value="<?php echo$row['presupuesto'];?>" readonly></label>
              </div>               
              <div class="col l3 m12 s12 orange"> 
              <label class="white-text">Folio<input class="white-text" type="text" name="folio" id="folio" value="<?php echo$row['folio'];?>" readonly></label>
              </div> 
              <div class="col l3 m12 s12 orange"> 
              <label class="white-text">Estimado:<input class="white-text" type="text" name="estim" id="estim" readonly></label>
              </div>               
              <div class="col l3 m12 s12 orange"> 
              <label class="white-text">Por Estimar:<input class="white-text" type="text" name="pestim" id="pestim" readonly></label>
              </div> 
              <br>
               <?php
              }  
              }
          ?> 
          <br>
          <div class="row" style="margin-top:6em">
            <div class="col l5 m12 s12">
              <label>Selecciona una semana</label>
              <select required  name="semana" id="semana" class="browser-default" required>
              <option value="">Selección:</option> 
              <?php  
              require_once '../db_config.php';
              if($_GET['id'])
              {
              $id = $_GET['id']; 
              $stmt=$db_con->prepare("SELECT *, DATE_FORMAT(fecha_inicio,'%d/%m/%Y') AS fecha_inicio, DATE_FORMAT(fecha_fin,'%d/%m/%Y') AS fecha_fin FROM semana WHERE folio=:id");
              $stmt->execute(array(':id'=>$id)); 
              //$row=$stmt->fetch(PDO::FETCH_ASSOC);
              while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
              ?>
              <option value="<?php echo$row['num_semana'];?>">Semana <?php echo $row['num_semana'];?>: <?php echo $row['fecha_inicio'];?> - <?php echo $row['fecha_fin'];?> </option>
              <?php
              } 
              }
              ?>
              </select> 
            </div>
            <div class="col l5 m12 s12">
              <label>Selecciona un concepto</label>
              <select required id="concepto" class="browser-default"> 
                <option value="">Selección:</option> 
                <?php  
                require_once '../db_config.php';
                if($_GET['id'])
                {
                $id = $_GET['id']; 
                $stmt=$db_con->prepare("SELECT * FROM concepto WHERE folio=:id");
                $stmt->execute(array(':id'=>$id)); 
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                ?>
                <option value="<?php echo $row['unidad'];?>" id="<?php echo $row['importe'];?>" 
                name="<?php echo $row['precio_unitario'];?>" class="<?php echo $row['id'];?>" 
                data-phase="<?php echo $row['etapa'];?>" 
                data-pe="<?php echo $row['res_cantidad'];?>" 
                data-es="<?php echo $row['est_cantidad'];?>"    
                
                ><?php echo $row['descripcion'];?></option>
                <?php
                } 
                }
                ?>
              </select>
            </div> 
            <div class="col l2 m12 s12">
              <label>Cantidad</label>
              <input type="text" id="cant" name="cant">
            </div>  
            <br>
            <div class="col l2 m12 s12">
              <label>Unidad</label>
              <input type="text" id="uni" name="uni" readonly>
            </div>
            <div class="col l2 m12 s12">
              <label>Costo</label>
              <input type="text" id="pre" readonly>
            </div>  
             <div class="col l2 m12 s12">
              <label>Importe</label>
              <input type="text" id="est_imp" readonly>
            </div> 
            <div class="col l2 m12 s12">
              <label>% Concepto</label>
              <input type="text" id="con" readonly>
            </div> 
            <div class="col l2 m12 s12">
              <label>% Presupuesto</label>
              <input type="text" id="pres" readonly>
            </div>     
            <div class="col l2 m12 s12">
              <input type="hidden" id="imp" readonly>
            </div> 
             <div class="col l1 m12 s12">
              <input type="hidden" id="id_con" name="id_con">
            </div> 
              <div class="form-group">
              <input type="hidden" name="fecha" id="fecha"  value="<?php echo date('Y-m-d');?>" readonly>
            </div> 
            <div class="col l1 m12 s12">
              <input type="hidden" id="desc" name="desc" readonly>
            </div>  
             <div class="col l2 m12 s12">
              <input type="hidden" id="eta" readonly>
            </div>  
            <div class="form-group">
            <input type="hidden" name="hora" id="hora" value="<?php date_default_timezone_set("America/Mexico_City"); echo date('h:i:sa');?>" readonly>
            </div>
            <br> 
            <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario']; ?>" readonly>
            <div class="col l12 m12 s12" style="margin-top: 2em">
              <button class="btn waves-effect orange z-depth-5" type="submit" id="estimacion" name="Submit">Agregar
                <i class="material-icons right">send</i>
              </button>
            </div>
          </div>
        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close btn-flat #00897b teal darken-1" id="cancel"><i class="material-icons">close</i></a>
        </div>
      </div>   
    </div>
    <!-- Termina Modal que crea una estimación-->
    <!-- Empieza Modal que corrige una estimación-->
    <div id="modal2" class="modal">
      <div class="modal-content">  
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
            <div class="col l3 m12 s12 light-green"> 
            <label class="white-text">Presupuesto<input class="white-text" type="text" name="presupuesto" id="presupuesto_c" value="<?php echo$row['presupuesto'];?>" readonly></label>
            </div>               
            <div class="col l3 m12 s12 light-green"> 
            <label class="white-text">Folio<input class="white-text" type="text" name="folio" id="folio_c" value="<?php echo$row['folio'];?>" readonly></label>
            </div>  
            <div class="col l3 m12 s12 light-green"> 
            <label class="white-text">Estimado:<input class="white-text" type="text" name="estim" id="c_estim" readonly></label>
            </div>               
            <div class="col l3 m12 s12 light-green"> 
            <label class="white-text">Por Estimar:<input class="white-text" type="text" name="pestim" id="c_pestim" readonly></label>
            </div>
            <br>
             <?php
            }  
            }
        ?> 
        <br>
        <div class="row" style="margin-top:6em">             
          <div class="col l12 m12 s12">
            <label>Selecciona un concepto</label>
            <select required id="concepto_c" name="concepto_c" class="browser-default"> 
            <option value="">Selección:</option> 
             <?php  
            require_once '../db_config.php';
            if($_GET['id'])
            {
            $id = $_GET['id']; 
            $stmt=$db_con->prepare("SELECT c.res_cantidad as res_cantidad, c.est_cantidad as est_cantidad, ac.importe,ac.avance_concepto,ac.avance_presupuesto,DATE_FORMAT(ac.fecha,'%d/%m/%Y') AS fecha, ac.num_semana,c.descripcion,c.unidad,c.importe AS imp,c.precio_unitario,c.id,c.etapa,
              ac.importe,ac.cantidad as cant,ac.id AS acid FROM concepto c JOIN avance_concepto ac ON c.id=ac.id_concepto WHERE c.folio=:id");
            $stmt->execute(array(':id'=>$id)); 
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
            <option value="<?php echo $row['unidad'];?>" id="<?php echo $row['imp'];?>" 
            name="<?php echo $row['precio_unitario'];?>" class="<?php echo $row['id'];?>" 
            data-phase="<?php echo $row['etapa'];?>"    
            data-acid="<?php echo $row['acid'];?>" 
            data-cant="<?php echo $row['cant'];?>"    
            data-impo="<?php echo $row['importe'];?>"
            data-fecha="<?php echo $row['fecha'];?>"
            data-num="<?php echo $row['num_semana'];?>" 
            data-con="<?php echo $row['avance_concepto'];?>" 
            data-pre="<?php echo $row['avance_presupuesto'];?>" 
            data-cpe="<?php echo $row['res_cantidad'];?>" 
            data-ces="<?php echo $row['est_cantidad'];?>"    
            
            ><?php echo $row['descripcion'];?> - FECHA: <?php echo $row['fecha'];?> 
            - CANTIDAD: <?php echo $row['cant'];?>  </option>
            <?php
            } 
            }
            ?>
            </select>
          </div>              
          <div class="col l1 m12 s12">
            <label>Unidad</label>
            <input type="text" id="uni_c" name="uni" readonly>
          </div>
          <div class="col l1 m12 s12">
            <label>Cantidad</label>
            <input type="text" id="cant_c" name="cant">
          </div> 
          <div class="col l2 m12 s12">
            <label>Costo</label>
            <input type="text" id="pre_c" readonly>
          </div>
          <div class="col l2 m12 s12">
            <label>Importe</label>
            <input type="text" id="est_imp_c" readonly>
          </div> 
          <div class="col l2 m12 s12">
            <label>% Concepto</label>
            <input type="text" id="con_c" readonly>
          </div>
          <div class="col l2 m12 s12">
            <label>% Presupuesto</label>
            <input type="text" id="pres_c" readonly>
          </div>  
          <div class="col l2 m12 s12">
            <label>Etapa</label>
            <input type="text" id="eta_c" readonly>
          </div>   
          <div class="col l2 m12 s12"> 
            <label>Cantidad</label>
            <input type="text" id="can" readonly>
          </div> 
          <div class="col l2 m12 s12"> 
            <label>Importe</label>
            <input type="text" id="impo" readonly>
          </div> 
          <div class="col l2 m12 s12"> 
            <label>P.Concepto</label>
            <input type="text" id="pcon" readonly>
          </div> 
          <div class="col l2 m12 s12"> 
            <label>P. Presupuesto</label>
            <input type="text" id="ppre" readonly>
          </div> 
          <div class="col l2 m12 s12"> 
            <label>Fecha</label>
            <input type="text" id="fech" readonly>
          </div> 
          <div class="col l2 m12 s12"> 
            <label>Semana</label>
            <input type="text" id="c_semana" readonly>
          </div> 
          <div class="col l2 m12 s12"> 
            <input type="hidden" id="ac_id" readonly>
          </div>
          <div class="col l2 m12 s12">
            <input type="hidden" id="imp_c" readonly>
          </div> 
          <div class="form-group">
            <input type="hidden" name="fecha" id="fecha"  value="<?php echo date('Y-m-d');?>" readonly>
          </div> 
           <div class="form-group">
          <input type="hidden" name="hora" id="hora" value="<?php date_default_timezone_set("America/Mexico_City"); echo date('h:i:sa');?>" readonly>
          </div>   
             <div class="col l1 m12 s12">
            <input type="hidden" id="id_con_c" name="id_con">
          </div> 
          <div class="col l1 m12 s12">
            <input type="hidden" id="desc_c" name="desc" readonly>
          </div>  
          <br> 
          <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario']; ?>" readonly>
          <div class="col l12 m12 s12" style="margin-top: 2em">
            <button class="btn waves-effect orange z-depth-5" type="submit" id="correccion2" name="Submit">Agregar
              <i class="material-icons right">send</i>
            </button></div>
        </div>
      <div class="modal-footer">
        <a href="#!" class="modal-action modal-close btn-flat #00897b teal darken-1" id="cancel"><i class="material-icons">close</i></a>
      </div>
      </div>   
    </div>
    <!-- Termina Modal que corrige una estimación-->
  </body>
</html>
<!--Función para darle color activo a la opción insumo del menú tabs-->
<script type="text/javascript">
 $(document).ready(function(){
 $('#nav-est').attr('style','background-color: rgb(38,50,56); color: white;');
 });
</script>