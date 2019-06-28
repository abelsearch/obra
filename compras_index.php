<?php include('smenu.php'); ?>
<?php 
if($_SESSION['tipo']== 1){
?>  
<?php include('crud_orden_compra/menu.php'); ?>   
<script src="crud_orden_compra/menu_iconos.js" type="text/javascript"></script>      
<?php
} 
if($_SESSION['tipo']== 2){ 
?> 
<?php include('crud_orden_compra/menu_operador.php'); ?> 
<script src="crud_orden_compra/menu_iconos.js" type="text/javascript"></script>
<?php 
} 
if($_SESSION['tipo']== 3){
?>  
<?php include('crud_orden_compra/menu_invitado.php'); ?>
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
    <script src="crud_orden_compra/orden.js" type="text/javascript"></script>    
    <script type="text/javascript" src="js/jquery.tabledit.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Orden de Compra</title>
  </head>
  <body>
    <!--Tabla de ordenes de compra-->  
    <div class="row" style="margin-left: 100px">
      <div class="col m12">
        <div id="title">
          <h2 class="form-signin-heading" style="font: 150% sans-serif;">VISTA GENERAL DE COMPRAS REGISTRADAS</h2>
        </div>
        <table class="striped responsive-table z-depth-5" id="example">
          <thead class="" style="background-color:#ff9955">
            <tr>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Folio</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Fecha</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Folio Obra</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Proveedor</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Total</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Comentarios</center></th>                
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Estatus</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>CONSULTAR</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>ALMACEN</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>PDF</center></td>
              <!--<td style="font: 150% sans-serif; font-size: 14px; color: white"><center>FIRMAR</center></td>-->
            </tr>
            </thead>
            <tbody>
              <?php
              require_once 'db_config.php';              
              $stmt=$db_con->prepare("SELECT orden_compra.id_proveedor, proveedor.nombre AS nombre, orden_compra.folio AS folio,
                 orden_compra.total AS total, orden_compra.comentarios AS comentarios, orden_compra.estatus AS estatus, 
                 orden_compra.fecha AS fecha, orden_compra.folio_obra AS folio_obra, orden_compra.id AS id_compra 
                 FROM orden_compra INNER JOIN proveedor ON orden_compra.id_proveedor=proveedor.id WHERE orden_compra.estatus = 'COMPRA' ORDER BY id_compra DESC");
              $stmt->execute();
              while($row=$stmt->fetch(PDO::FETCH_ASSOC))
              {
              ?>
              <tr>
              <td><center><?php echo $row['folio']; ?></center></td>
              <td><center><?php echo $row['fecha']; ?></center></td>
              <td><center><?php echo $row['folio_obra']; ?></center></td>
              <td><center><?php echo $row['nombre']; ?></center></td>
              <td><center><?php echo $row['total']; ?></center></td>
              <td><center><?php echo $row['comentarios']; ?></center></td>
              <td><center><?php echo $row['estatus']; ?></center></td>
              <td><center><a class="alink   modal-trigger tooltipped"data-position="bottom" data-tooltip="Consulta los datos generales de la orden"href="#modal3"id="<?php echo $row['folio'];?>"><i class="material-icons orange-text center">pageview</i></a></center></td>
              
              <td><center><a class="ainsumostock modal-trigger tooltipped"data-position="bottom" data-tooltip="Ingresar a Almacén"href="#modal4"id="<?php echo $row['id_compra'];?>"href=""><i class="material-icons green-text center">playlist_add_check</i></a></center></td>
              
              <td><center><a class="tooltipped"data-position="bottom" data-tooltip="Imprime en pdf el formato de compra"href=""><i class="material-icons red-text center">picture_as_pdf</i></a></center></td>
              <!--<td><center><a class="aestatus modal-trigger tooltipped"data-position="bottom" data-tooltip="Autorizar orden de compra"href="#modal5" folio="<?php/* echo $row['folio'] ?>"id="<?php echo $row['id_compra']; */?>"><i class="material-icons center" style="color:rgb(0,150,136)">border_color</i></a></center></td>-->
            </tr>
              <?php }; ?>
          </tbody>
        </table>
      </div>
    </div>
    <!--Termina tabla de ordenes de compra-->
    <div id="modal4" class="modal">
      <div class="modal-content #eeeeee grey lighten-3">
        <h4 id="hmodal4"style="font: 150% sans-serif; font-size: 24px;">Insumos de la Orden</h4>
        <div class="row" id="row_editar_insumo_stock">
         
        </div>
        <div class=" col l2 m12 s12 offset-l10 modal-footer"style="background-color: rgba(1,1,1,0)">
          <a href="#!" class=" modal-action modal-close waves-effect btn-flat red white-text" id="cancel">Salir<i class="material-icons">close</i></a>
        </div>
      </div>
    </div>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" src="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"></script>
    <script>
      $(document).ready(function() {
      $('.tooltipped').tooltip();
      $('#row_ayuda').hide();
      $('.modal').modal();
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
  </body>
</html>