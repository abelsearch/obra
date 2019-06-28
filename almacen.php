<?php include('smenu.php'); ?>
<?php 
if($_SESSION['tipo']== 1){
?>  
<?php include('menu.php'); ?>   
<script src="crud_insumo/menu_iconos_almacen.js" type="text/javascript"></script>      
<?php
} 
if($_SESSION['tipo']== 2){ 
?> 
<?php include('menu_operador.php'); ?> 
<script src="crud_insumo/menu_iconos_almacen.js" type="text/javascript"></script>
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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>    
    <script src="js/materialize.min.js" type="text/javascript"></script>
    <script src="crud_insumo/insumo.js" type="text/javascript"></script>    
    <title>Almacen | SIO</title>
  </head>
  <body>  
    <div class="">  
    <div class="row" style="margin-left:100px"> 
    <div class="col m12">  
    <div id="title"> 
    <h2 class="form-signin-heading" style="font: 150% sans-serif;">ALMACEN</h2> 
    </div>   
    <table class="striped responsive-table" id="example"> 
      <thead class="orange">
          <tr>
            <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Insumo</center></th> 
            <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Unidad</center></th>
            <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Saldo Inicial</center></th>
            <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Entradas</center></th>
            <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Salidas</center></th>
            <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Stock</center></th>
            <!--<th style="font: 150% sans-serif; font-size: 14px; color: white"><center>EDITAR</center></th> 
            <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>ELIMINAR</center></th>-->
          <!--</tr>-->
      </thead> 
      <tbody> 
        <?php 
        require_once 'db_config.php'; 
        $stmt=$db_con->prepare("SELECT * FROM catalogo_insumo");
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
        {   
        ?>
          <td class="#00897b teal darken-1 white-text"><center><?php echo $row['nombre']; ?></center></td> 
          <td><center><?php echo $row['unidad']; ?></center></td>
          <td><center><?php echo $row['saldo_inicial']; ?></center></td>
          <td><center><?php echo $row['entradas']; ?></center></td> 
          <td><center><?php echo $row['salidas']; ?></center></td>
            <?php 
              if($row['stock'] > 10){
                echo '<td class="white-text #1b5e20 green darken-4"><center><strong>'.$row['stock'].'</strong></center></td>';
              }
              else if($row['stock'] > 5 && $row['stock'] <= 10 ){
                echo '<td class="white-text #f57f17 yellow darken-4"><center><strong>'.$row['stock'].'</strong></center></td>';
              }
              else{
                echo '<td class="white-text #b71c1c red darken-4"><center><strong>'.$row['stock'].'</strong></center></td>';
              }
              ?>
          <!--<td align="center">  
          <center>
          <a id="<?php //echo $row['id']; ?>" class='ver modal-trigger trigger tooltipped' data-position="top" data-tooltip="Editar" href="#">
          <i class="material-icons  black-text  center">edit</i></a> 
          </center>
          </td>  

          <td align="center">  
          <center>
          <a id="<?php // echo $row['id']; ?>" class="eliminar tooltipped" data-position="top" data-tooltip="Eliminar" href="#">
          <i class="material-icons red-text  center">delete</i> 
          </a>
          </center>
          </td> -->
        </tr>
        <?php
        } 
        ?>   
      </tbody>
    </table> 
    </div>
    </div> 
    </div>
    <!-- Modal Zone -->
    <!-- Modal Structure -->
    <div id="modal1" class="modal">
      <div class="modal-content"> 
         <div class="row">
          <div class="col l8 m12 s12 center"><h3>Reporte de Almacén</h3></div>
          <div class="col l4 m12 s12"><input class="black-text" type="datetime" id="fecha_reporte"value="<?php echo date("Y-m-d");?>"><label for="fecha_reporte" class="black-text">Fecha de autorización</label></div>
          <div class="col l12 m12 s12" style="margin-top:4em">
            <h4>¿Estás seguro que quieres imprimir el reporte de almacén?</h4>
            <label>Tienes que ser usuario autorizado para poder completar la tareea.</label>
          </div>
         </div>
          
          <button class="btn waves-effect waves-light red z-depth-5" type="submit" id="enviar" name="action">Continuar
          <i class="material-icons white-text right">picture_as_pdf</i>
          </button>
       
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect btn-flat" id="cancel"><i class="material-icons">close</i></a>
      </div>
    </div>        
    <!-- Modal Structure -->
    <div id="modal2" class="modal">
      <div class="modal-content2">  
      
           </div>
          <center><button class="btn waves-effect waves-light #757575 indigo darken-1 z-depth-5" type="submit" id="enviar2" name="action">Editar
          <i class="material-icons right">send</i>
          </button></center>  

          <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect btn-flat" id="cancel"><i class="material-icons">close</i></a>
      </div> 

      </div>
    </div> 
  </body>
</html> 
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" src="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"></script>
<!-- Buscador -->
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