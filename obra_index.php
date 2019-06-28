<?php include('smenu.php'); ?>
<?php 
if($_SESSION['tipo']== 1){
?>  
<?php include('menu.php'); ?>   
<script src="crud_obra/menu_iconos_index_obra.js" type="text/javascript"></script>      
<?php
} 
if($_SESSION['tipo']== 2){ 
?> 
<?php include('menu_operador.php'); ?> 
<script src="crud_obra/menu_iconos_index_obra.js" type="text/javascript"></script>
<?php 
} 
if($_SESSION['tipo']== 3){
?>  
<?php include('menu_invitado.php'); ?>
<?php
} 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>    
    <script src="js/materialize.min.js" type="text/javascript"></script>
    <script src="crud_obra/obra.js" type="text/javascript"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Obras</title>
  </head>
  <body>
    
      <div class="row" style="margin-left: 120px">
        <div class="col m12">
          <div id="title">
            <h2 class="form-signin-heading" style="font: 150% sans-serif;">VISTA GENERAL DE OBRAS</h2>
          </div>
          <table class="striped responsive-table z-depth-5" id="example">
            <thead class="orange">
              <tr>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Folio</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Cliente</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Descripción</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Ciudad</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Zona</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Estado Orden</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Estado Presupuesto</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>EDITAR</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>REPORTE</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>CANCELAR</center></th>
                <!--</tr>-->
              </thead>
              <tbody>
                <?php
                require_once 'db_config.php';
                $stmt=$db_con->prepare("SELECT * FROM obra ORDER BY id DESC");
                $stmt->execute();
                while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                ?>
                <!--<tr>-->
                <td><center><?php echo $row['folio']; ?></center></td>
                <td><center><?php echo $row['cliente']; ?></center></td>
                <td><center><?php echo $row['titulo']; ?></center></td>
                <td><center><?php echo $row['ciudad']; ?></center></td>
                <td><center><?php echo $row['zona']; ?></center></td>
                <?php
                if($row['estado'] == 'TRABAJANDO'){
                ?>
                <td><center><a class="tooltipped" data-position="top" data-tooltip="Trabajando" style="cursor:pointer;"><i class="material-icons blue-text  center">phonelink_ring</i></a></center></td>
                <?php
                }
                ?>
                <?php
                if($row['estado'] == 'TERMINADA' ){
                ?>
                <td><center><font color='blue'><?php echo $row['estado'];  ?></font></center></td>
                <?php
                }
                ?>
                <?php
                if($row['estado'] == 'CANCELADA' ){
                ?>
                <td><center><a class="tooltipped" data-position="top" data-tooltip="Cancelada" style="cursor:pointer;"><i class="material-icons red-text  center">phonelink_erase</i></a></center></td>
                <?php
                }
                ?>
                
                
                <?php
                if($row['gasto'] < $row['presupuesto']){
                ?>
                <td><center><a class="tooltipped" data-position="top" data-tooltip="Disponible Para Agregar Gastos" style="cursor:pointer;"><i class="material-icons green-text center">spellcheck</i></a></center></td>
                <?php
                }
                ?> 

                <?php
                if($row['gasto'] == $row['presupuesto']){
                ?>
                <td><center><a class="tooltipped" data-position="top" data-tooltip="Presupuesto Alcanzado" style="cursor:pointer;"><i class="material-icons light-blue-text center">compare_arrows</i></a></center></td>
                <?php
                }
                ?>
                
                
                <?php 
                $por = (15*$row['gasto']/100);
                $res = $row['gasto']-$por;
                if($row['gasto']>0 && $row['gasto'] == $row['gasto']-$res){
                ?>
                <td><center><a class="tooltipped" data-position="top" data-tooltip="Presupuesto a Punto de ser Alcanzado" style="cursor:pointer;"><i class="material-icons yellow-text center">warning</i></a></center></td>
                <?php
                }
                ?>
                <?php
                if($row['gasto'] > $row['presupuesto']){
                ?>
                <td><center><a class="tooltipped" data-position="top" data-tooltip="Presupuesto Excedido" style="cursor:pointer;"><i class="material-icons red-text center">error</i></a></center></td>
                <?php
                }
                ?>
                
                <?php
                if($row['estado'] == 'TRABAJANDO' ){
                ?>
                <td align="center">
                  <center>
                  <a id="<?php echo $row['folio']; ?>" class="editar tooltipped" data-position="top" data-tooltip="Editar" href="#">
                  <i class="material-icons black-text center">edit</i></a>
                  </center>
                </td>
                <?php
                }
                ?>
                <?php
                if($row['estado'] == 'CANCELADA' ){
                ?>
                <td align="center">
                  <center>
                  </center>
                </td>
                <?php
                }
                ?>
                <?php
                if($row['estado'] == 'TERMINADA' ){
                ?>
                <td align="center">
                  <center>
                  
                  </center>
                </td>
                <?php
                }
                ?>
                <?php
                if($row['estado'] == 'TRABAJANDO' ){
                ?>
                <td align="center">
                  <center>
                  <a id="<?php echo $row['folio']; ?>" class="ver tooltipped" data-position="top" data-tooltip="Ver" style="cursor:pointer;">
                    <i class="material-icons black-text  center">visibility</i>
                  </a>
                  </center>
                </td>
                <?php
                }
                ?>
                <?php
                if($row['estado'] == 'CANCELADA' ){
                ?>
                <td align="center">
                  <center>
                  <a id="<?php echo $row['folio']; ?>" class="ver tooltipped" data-position="top" data-tooltip="Ver" style="cursor:pointer;">
                    <i class="material-icons black-text  center">visibility</i>
                  </a>
                  </center>
                </td>
                <?php
                }
                ?>
                <?php
                if($row['estado'] == 'TERMINADA' ){
                ?>
                <td align="center">
                  <center>
                  <a id="<?php echo $row['folio']; ?>" class="ver tooltipped" data-position="top" data-tooltip="Ver" style="cursor:pointer;">
                    <i class="material-icons black-text  center">visibility</i>
                  </a>
                  </center>
                </td>
                <?php
                }
                ?>
                
                <?php
                if($row['estado'] == 'CANCELADA' ){
                ?>
                <td align="center">
                  <center>
                  <a id="<?php echo $row['folio']; ?>" class="rehacer tooltipped" data-position="top" data-tooltip="Rehacer" href="#">
                  <i class="material-icons green-text center">refresh</i></a>
                  </center>
                </td>
                <?php
                }
                ?>
                <?php
                if($row['estado'] == 'TERMINADA' ){
                ?>
                <td align="center">
                  <center>
                  <i class="material-icons green-text center">check</i>
                  </center>
                </td>
                <?php
                }
                ?>
                
                <?php
                if($row['estado'] == 'TRABAJANDO' ){
                ?>
                <td align="center">
                  <center>
                  <a id="<?php echo $row['folio']; ?>" class="cancelar tooltipped" data-position="top" data-tooltip="Cancelar"  href="#">
                  <i class="material-icons red-text center">cancel</i></a>
                  </center>
                </td>
                <?php
                }
                ?>
              </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    
    <!-- MODAL ZONE!!! -->
    <!-- CREATE MODAL -->
    <div id="modal1" class="modal">
      <div class="modal-content #eeeeee grey lighten-3">
        <div class="row">
          <div class="col l12 m12 s12 #fb8c00 orange darken-1 center white-text">
            <h5>NUEVA OBRA</h5>
          </div>
          <div class="col l4 m12 s12">
            <?php
                  require_once 'db_config.php';
                  $stmt=$db_con->prepare("SELECT MAX(id)+1 AS id FROM obra;");
                  $stmt->execute();
                  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                  { 
                    if ($row['id']=='NULL') {
                      $id=1;
                    }else{
                      $id=$row['id'];
                    }
            ?>
            <label>Folio<input type="text" id="folio" name="folio" value="OBRA-<?php echo $id?>" readonly></label>
            <?php
                  }
            ?>
          </div> 
          <div class="col l4 m12 s12">
            <label>Elige un Proyecto</label>
            <select required  name="cliente" id="cliente" class="browser-default" required>
              <option value="">Selección:</option>
              <?php
              require_once 'db_config.php';
              $stmt=$db_con->prepare("SELECT * FROM proyecto ORDER BY id");
              $stmt->execute();
              while($row=$stmt->fetch(PDO::FETCH_ASSOC))
              {
              ?>
              <option  value="<?php echo$row['proyecto_id'];?>"><?php echo $row['nombre'];?>
                <?php
                }
                ?>
            </select>
          </div>
          <div class="col l4 m12 s12">
            <label>Contrato<input type="text" name="contrato" id="contrato" required></label>
          </div>
          <div class="col l4 m12 s12">
            <label>Título<input type="text" name="titulo" id="titulo" required></label>
          </div>
          <div class="col l4 m12 s12">
            <label>Elige un cliente</label>
            <select required  name="proyecto" id="proyecto" class="browser-default" required>
              <option value="">Selección:</option>
              <?php
              require_once 'db_config.php';
              $stmt=$db_con->prepare("SELECT * FROM cliente ORDER BY id");
              $stmt->execute();
              while($row=$stmt->fetch(PDO::FETCH_ASSOC))
              {
              ?>
              <option  value="<?php echo$row['nombre_comercial'];?>"><?php echo $row['nombre_comercial'];?>
                <?php
                }
                ?>
            </select>
          </div>
          <div class="col l4 m12 s12">
            <label>Presupuesto<input type="number" id="presupuesto" required></label>
          </div>
          <div class="col l4 m12 s12">
            <label>Residente de Obra<input type="text" id="residente" required></label>
          </div>
          <div class="col l4 m12 s12">
            <label>Número de residente<input type="text" id="numero_residente" required></label>
          </div>
          <div class="col l4 m12 s12">
            <label>Contratista<input type="text" id="contratista" required></label>
          </div>
          <div class="col l4 m12 s12">
            <label>Número de contratista<input type="text" id="numero_contratista" required></label>
          </div>
          <div class="col l4 m12 s12">
            <label>Estado<input type="text" id="estado" required></label>
          </div>
          <div class="col l4 m12 s12">
            <label>Ciudad<input type="text" id="ciudad" required></label>
          </div>
          <div class="col l4 m12 s12">
            <label>Zona Ej: Fracc, colonia, sector<input type="text" id="zona" required></label>
          </div>
          <div class="col l4 m12 s12">
            <label>N° Lote<input type="text" id="num_lote" required></label>
          </div>         
          <!-- REporte -->          
          <div class="col l8 m12 s12">
            <label>Reporte / Comentarios<textarea style="overflow:auto;resize:none" name="reporte" id="reporte" class='form-control' required></textarea></label>
            <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario']; ?>" readonly>
          </div> 
          <br>
          <div class="col l12 m12 s12 #fb8c00 orange darken-1 white-text center">SEMANAS DE ESTIMACIÓN</div>
          <div class="col l12 m12 s12 #fb8c00 orange darken-1 white-text center">Crea tus semanas de trabajo e inicializa tu primer semana de estimación...</div>
          <div class="col l4 m12 s12">
            <label>N° semanas de tu obra<input type="number" name="semana" id="semana" required></label>
          </div>
          <div class="col l4 m12 s12">
            <label>Fecha Inicio de tu 1er semana</label> 
            <input type="date" name="inicio" id="fecha_inicio" class='form-control' required>            
          </div>
          <div class="col l4 m12 s12">
            <label>Fecha Final de tu 1er semana</label>
            <input type="date" name="fin" id="fecha_fin" class='form-control' required></div>
          <div class="col l4 m12 s12">
            <input type="hidden" name="fecha" id="fecha" value="<?php echo date('Y-m-d');?>" readonly>
            <input type="hidden" name="hora" id="hora" value="<?php date_default_timezone_set("America/Mexico_City"); echo date('h:i:s a');?>" readonly>
          </div>
          <div class="col l12 m12 s12 center">
            <button style="margin-top: 2em"class=" col l4 m12 s12 btn waves-effect #00695c teal darken-3 z-depth-5" type="submit" id="enviar" name="action">Crear
            <i class="material-icons right">send</i>
            </button>
          </div>
        </div>
        <div class=" col l2 m12 s12 offset-l10 modal-footer red">
          <a href="#!" class=" modal-action modal-close waves-effect btn-flat white-text" id="cancel">Salir<i class="material-icons">close</i></a>
        </div>
      </div>
    </div>
      
      
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