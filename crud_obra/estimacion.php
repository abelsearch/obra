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
<input type="hidden" id="c_presupuesto" value="<?php echo $row['presupuesto'];?>" readonly> 
<input type="hidden" id="c_modelo" value="<?php echo $row['id_modelo'];?>" readonly>

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
    <script src="../crud_estimacion/menu_iconos.js" type="text/javascript"></script> 
    <script type="text/javascript" src="../js/jquery.tabledit.js"></script>    
    <script src="modulo.js" type="text/javascript"></script>
    <script src="estimacion.js" type="text/javascript"></script> 
    <script src="correccion_estimacion.js" type="text/javascript"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Conceptos</title>  
          <script type="text/javascript">
            $(document).ready(function(){
              $('#ul_iconos').prepend('<li>&nbsp$'+ $('#c_presupuesto').val() +'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</li> ').prepend('<li>&nbspPresupuesto Obra: </li> '); 
              $('#ul_iconos').prepend('<li>&nbsp <b>FOLIO ' + $('#c_folio').val() + '</b>&nbsp&nbsp</li>');                
            });
          </script>
  </head>
  <body>
    <!--Inicia la vista de totales ejecutados, ejecutandose y por ejecutar_____________--> 
    <div class="row" style="margin-top:1em">      
      <div class="col l12 m12 s12">
        <div class="row color-li-menu">
          <div class="col l3 m12 s12">
            <div class="row">
              <div class="col l12 m12 s12" height="5px">
                <label class="white-text">Importe Ejecutado:<input style="font-size:12px"type="text" class="white-text" disabled id="exe" required></label>
              </div> 
              <div class="col l12 m12 s12">
                <label class="white-text">% Presupuesto Ejecutado:<input style="font-size:12px"type="text" class="white-text"  disabled id="exe2" required></label>
              </div>
            </div>
          </div>
          <div class="col l3 m12 s12">
            <div class="row">
              <div class="col l12 m12 s12">
                <label class="white-text">Importe Ejecutando:<input style="font-size:12px"type="text" class="white-text" disabled id="tot" required></label>
              </div> 
              <div class="col l12 m12 s12">
                <label class="white-text">% Presupuesto Ejecutando:<input style="font-size:12px"type="text" class="white-text"  disabled id="por" required></label>
              </div>
            </div>
          </div>
          <div class="col l3 m12 s12">
            <div class="row">
              <div class="col l12 m12 s12">
                <label class="white-text">Importe Por Ejecutar:<input style="font-size:12px" type="text" class="white-text" disabled id="exe3" required></label>
              </div> 
              <div class="col l12 m12 s12">
                <label class="white-text">% Presupuesto Por Ejecutar:<input style="font-size:12px" type="text" class="white-text"  disabled id="exe4" required></label>
              </div>
            </div>
          </div>
          <div class="col l3 m12 s12">
            <select id="select_semana" class="browser-default" required style="font-size:18px">
               <option value="">Selecciona una semana:</option> 
                  <?php  
                  require_once '../db_config.php';
                  if($_GET['id'])
                  {
                  $id = $_GET['id']; 
                  $stmt=$db_con->prepare("SELECT 
                    SUM(CASE WHEN s.folio=:id THEN a.importe END) as ejecutado, 
                    SUM(CASE WHEN s.folio=:id THEN a.avance_presupuesto END) as ejecutado2,
                    s.folio,s.num_semana,s.avance_total,s.avance_porcentaje,s.fecha_inicio,s.fecha_fin,
                    o.presupuesto-o.gasto as restante, 
                    100-SUM(a.avance_presupuesto) as presupuesto
                    FROM semana s JOIN avance_concepto a ON s.folio=a.folio  
                    JOIN obra o ON o.folio=s.folio
                    WHERE s.folio=:id GROUP BY s.num_semana");
                  $stmt->execute(array(':id'=>$id)); 
                  while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <option value="<?php echo$row['num_semana'];?>" class="<?php echo $row['folio'];?>" 
                      data-e="<?php echo $row['ejecutado'];?>" 
                      data-e2="<?php echo $row['ejecutado2'];?>"    
                      data-t="<?php echo $row['avance_total'];?>" 
                      data-p="<?php echo $row['avance_porcentaje'];?>" 
                      data-r="<?php echo $row['restante'];?>" 
                      data-rp="<?php echo $row['presupuesto'];?>"    
                  >Semana <?php echo $row['num_semana'];?> <?php echo $row['fecha_inicio'];?> - <?php echo $row['fecha_fin'];?> 
                        
                  </option>
                  <?php
                  } 
                  }
                  ?>  
            </select>
          </div>
        </div>       
      </div>
    <!--Termina la vista de totales____________________________________________________-->
    <!--Inicia vista de select semanas ________________________________________________--> 
      <!--<div class="col l6 m12 s12">
        <select id="select_semana" class="browser-default" required style="font-size:18px">
         <option value="">Selecciona una semana:</option> 
            <?php /* 
            require_once '../db_config.php';
            if($_GET['id'])
            {
            $id = $_GET['id']; 
            $stmt=$db_con->prepare("SELECT 
              SUM(CASE WHEN s.folio=:id THEN a.importe END) as ejecutado, 
              SUM(CASE WHEN s.folio=:id THEN a.avance_presupuesto END) as ejecutado2,
              s.folio,s.num_semana,s.avance_total,s.avance_porcentaje,s.fecha_inicio,s.fecha_fin,
              o.presupuesto-o.gasto as restante, 
              100-SUM(a.avance_presupuesto) as presupuesto
              FROM semana s JOIN avance_concepto a ON s.folio=a.folio  
              JOIN obra o ON o.folio=s.folio
              WHERE s.folio=:id GROUP BY s.num_semana");
            $stmt->execute(array(':id'=>$id)); 
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
            <option value="<?php echo$row['num_semana'];?>" class="<?php echo $row['folio'];?>" 
                data-e="<?php echo $row['ejecutado'];?>" 
                data-e2="<?php echo $row['ejecutado2'];?>"    
                data-t="<?php echo $row['avance_total'];?>" 
                data-p="<?php echo $row['avance_porcentaje'];?>" 
                data-r="<?php echo $row['restante'];?>" 
                data-rp="<?php echo $row['presupuesto'];?>"    
            >Semana <?php echo $row['num_semana'];?> <?php echo $row['fecha_inicio'];?> - <?php echo $row['fecha_fin'];?> 
                  
            </option>
            <?php
            } 
            }*/
            ?>  
        </select>
      </div>
      -->
      <table id="example" class="centered responsive"> 
        <thead clasS="color-menu white-text" style="font: small-caps 100%/200% serif;">
            <tr>  
            <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Etapa</center></th>
            <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Partida</center></th>  
            <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Concepto</center></th>    
            <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Unidad</center></th>
            <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Cantidad</center></th>
            <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Importe</center></th>
            <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>% Concepto</center></th>
            <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>% Presupuesto</center></th>  
        </thead>  
        <tbody class="concepto">
        </tbody>
      </table>
    </div>
    <!-- Empiezan los modals___________________________________________________________-->
    <!-- Empieza Modal que crea una estimación_________________________________________-->
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
              
              <div class="col l6 m12 s12 orange"> 
              <!--<label class="white-text">Presupuesto--><input class="white-text" type="text" name="presupuesto" id="presupuesto" value="<?php echo$row['presupuesto'];?>" readonly><!--</label>--> 
              </div>
              
                             
              <div class="col l6 m12 s12 orange"> 
              <!--<label class="white-text">Folio--><input class="white-text" type="text" name="folio" id="foliox" value="<?php echo$row['folio'];?>" readonly><!--</label>-->
              </div> 
              <!--
              <div class="col l3 m12 s12 orange"> 
              <label class="white-text">Estimado:<input class="white-text" type="text" name="estim" id="estim" readonly></label>
              </div>               
              <div class="col l3 m12 s12 orange"> 
              <label class="white-text">Por Estimar:<input class="white-text" type="text" name="pestim" id="pestim" readonly></label>
              </div> 
              <br>-->
               <?php
              }  
              }
          ?> 
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
                if($_GET['id_modelo']) 
                {
                //$id = $_GET['id']; 
                $id_modelo = $_GET['id_modelo']; 
                $stmt=$db_con->prepare("SELECT * FROM modelo_concepto WHERE id_modelo=$id_modelo");
                $stmt->execute(array(':id'=>$id)); 
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                ?>
                <option value="<?php echo $row['unidad'];?>" id="<?php echo $row['importe'];?>" 
                name="<?php echo $row['precio_unitario'];?>" class="<?php echo $row['id'];?>" 
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
              <label>Precio Unitario</label>
              <input type="text" id="pre" readonly>
            </div> 
            <div class="col l2 m12 s12">
              <label>Partida</label>
              <input type="text" id="par" readonly>
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
            <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario']; ?>" readonly>
            <div class="col l12 m12 s12" style="margin-top: 2em">
              <button class="btn waves-effect orange z-depth-5" type="submit" id="estimacion" name="Submit">Agregar
                <i class="material-icons right">send</i>
              </button> 
              <br> 
            <br>
            </div> 

            <div> 
            <table id="sem"> 
            <thead clasS="#e65100 orange darken-4 white-text" style="font: small-caps 100%/200% serif;">
              <tr>  
              <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Semana</center></th>
              <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Unidad</center></th> 
              <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Cantidad</center></th>
              <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Importe</center></th> 
            </thead>  
            <tbody class="semana"> 

            </tbody>
            </table> 
            </div> 
            <br> 
            <br>
          </div>
        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close btn-flat #00897b teal darken-1" id="cancel"><i class="material-icons">close</i></a>
        </div>
      </div>   
    </div>
    <!-- Termina Modal que crea una estimación_________________________________________-->
    <!-- Empieza Modal que corrige una estimación______________________________________-->
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
            <label>Precio Unitario</label>
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
    <!-- Termina Modal que corrige una estimación______________________________________-->
  </body>
</html>
<!--Función para darle color activo a la opción insumo del menú tabs___________________-->
<script type="text/javascript">
 $(document).ready(function(){
 $('#nav-est').attr('style','background-color: rgb(38,50,56); color: white;');
 });
</script>