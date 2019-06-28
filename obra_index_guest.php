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
                <th><center>REPORTE</center></th>
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
                  <a id="<?php echo $row['folio']; ?>" class="guest tooltipped" data-position="top" data-tooltip="Ver" style="cursor:pointer;">
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
                  <a id="<?php echo $row['folio']; ?>" class="guest tooltipped" data-position="top" data-tooltip="Ver" style="cursor:pointer;">
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
                  <a id="<?php echo $row['folio']; ?>" class="guest tooltipped" data-position="top" data-tooltip="Ver" style="cursor:pointer;">
                    <i class="material-icons black-text  center">visibility</i>
                  </a>
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