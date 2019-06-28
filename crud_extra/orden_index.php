<?php include('smenu.php'); ?>
<?php include('menu.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
    <script src="js/materialize.min.js" type="text/javascript"></script> 
    <script src="crud_orden/orden.js" type="text/javascript"></script>
    <script src="crud_orden/menu_iconos_index_orden.js" type="text/javascript"></script> 
    
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Obras</title>
  </head>
  <body>  
    <div class="container">  
    <div class="row"> 
    <div class="col m12">  
    <div id="title"> 
    <h2 class="form-signin-heading "> OBRAS</h2> 
    </div>
    <!--<div id="buttons">
    <button class="btn modal-trigger #757575 indigo darken-1 z-depth-5 tooltipped" data-position="top" data-tooltip="Crear Nueva Orden" id="trigger"  href="#modal1">
    <i class="material-icons black-text left">add_circle</i>Nuevo</button> 
    </div>-->
        <table class="striped responsive-table z-depth-5" id="example"> 
    <thead>
        <tr>
          <th><center>Folio</center></th> 
          <th><center>Cliente</center></th> 
          <th><center>Descripción</center></th> 
          <th><center>Monto Contratado</center></th> 
          <th><center>Gasto</center></th>  
          <th><center>Estado Orden</center></th> 
          <th><center>Estado Presupuesto</center></th> 
          <th><center>EDITAR</center></th>
          <th><center>REPORTE</center></th>     
          <th><center>CANCELAR</center></th> 
        <!--</tr>-->
    </thead> 
    <tbody> 
    <?php 
    require_once 'db_config.php'; 
    $stmt=$db_con->prepare("SELECT * FROM orden ORDER BY id");
    $stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
    {   
    ?> 
    <!--<tr>-->
      <td><center><?php echo $row['folio']; ?></center></td> 
      <td><center><?php echo $row['cliente']; ?></center></td>
      <td><center><?php echo $row['titulo']; ?></center></td> 
      <td><center><?php echo $row['presupuesto']; ?></center></td> 
      <td><center><?php echo $row['gasto']; ?></center></td> 
      
     

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
      <td><center><a class="tooltipped" data-position="top" data-tooltip="Presupuesto Alcanzado" style="cursor:pointer;"><i class="material-icons yellow-text center">warning</i></a></center></td> 
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
      <a id="<?php echo $row['folio']; ?>" class="aceptar tooltipped" data-position="top" data-tooltip="Rehacer" href="#">
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
    </div>
          <!-- MODAL ZONE!!! -->
        <!-- CREATE MODAL -->
        <div id="modal1" class="modal">
        <div class="modal-content"> 
          
              <div class="form-group">
                <?php 
      			     require_once 'db_config.php'; 
      			     $stmt=$db_con->prepare("SELECT MAX(id)+1 AS id FROM orden;");
      			     $stmt->execute();
      			     while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
      			     {
      			     ?> 
          		  <label>Folio<input type="text" id="folio" name="folio" value="<?php echo$row['id'];?>-ODC" readonly></label>
          		  <?php
      			     }
      			     ?> 
                </div>
              
              <div class="form-group">
                <label>Nombre del cliente</label>
                <select required  name="cliente" id="cliente" class="browser-default" required>
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
              
              <div class="form-group">
                <label>Servicio</label>
                <select required  name="servicio" id="servicio" class="browser-default" required>
                <option value="">Selección:</option>
                <?php
                require_once 'db_config.php';
                $stmt=$db_con->prepare("SELECT * FROM catalogo_concepto ORDER BY id");
                $stmt->execute();
                while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                ?>
                <option id="<?php echo$row['precio'];?>"  value="<?php echo$row['descripcion'];?>"> <?php echo $row['descripcion'];?> </option>
                <?php
                }
                ?>
                </select> 
                <input type="text" name="precio" id="precio" readonly>
              </div>  

              <div class="form-group">
                 <label>Clave Referencia<input type="text" name="referencia" id="referencia" required></label>
              </div>

              <div class="form-group">
                 <label>Titulo<input type="text" name="titulo" id="titulo" required></label>
              </div> 
              
              <div class="form-group">
                 <label>Presupuesto<input type="number" name="presupuesto" id="presupuesto" required></label>
              </div>  
              
              <div class="form-group">
              <input type="hidden" name="fecha" id="fecha" value="<?php echo date('Y-m-d');?>" readonly> 
              <input type="hidden" name="hora" id="hora" value="<?php date_default_timezone_set("America/Mexico_City"); echo date('h:i:s a');?>" readonly> 
              </div>  

              <!-- REporte -->  
              
              <div class="form-group">
              <label>Reporte<textarea style="overflow:auto;resize:none" name="reporte" id="reporte" class='form-control' required></textarea></label>   
              <label>Usuario Actual<input type="text" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario']; ?>" readonly></label>
              </div> 

              <button class="btn waves-effect #757575 indigo darken-1 z-depth-5" type="submit" id="enviar" name="action">Crear
              <i class="material-icons right">send</i>
              </button>
            
          </div>
          <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect btn-flat" id="cancel"><i class="material-icons">close</i></a>
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