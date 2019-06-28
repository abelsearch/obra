<?php include('smenu.php'); ?> 
<?php include('menu.php'); ?>

/**
<?php 
if($_SESSION['tipo']== 1){
?>  
<script src="crud_orden_compra/menu_iconos.js" type="text/javascript"></script>      
<?php
} 
if($_SESSION['tipo']== 2){ 
include "db_config.php";
$id = $_SESSION['id'];
$stmt=$db_con->prepare("SELECT COUNT(usuario) as acc FROM permiso WHERE usuario=:id AND vista=7");
if($stmt->execute(array(':id'=>$id)))
{
$row=$stmt->fetch(PDO::FETCH_ASSOC);{
$acc = $row['acc']; 
if($acc == 1){ 
?>
<script src="crud_orden_compra/menu_iconos.js" type="text/javascript"></script>
<?php
}
if($acc == 0){
?>
<script>window.location.href = '403.php';</script>
<?php
}
} 
} 
?> 
<?php 
} 
if($_SESSION['tipo']== 3){
?>  
<?php include('crud_orden_compra/menu_invitado.php'); ?>
<?php
} 
?>
**/

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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Pago Proveedores</title>
  </head>
  <body>
    <!--Tabla de ordenes de compra-->  
    <div class="row" style="margin-left: 100px">
      <div class="col m12">
        <div id="title">
          <h2 class="form-signin-heading" style="font: 150% sans-serif;">Pago a Proveedores</h2>
        </div>
        <table class="striped responsive-table z-depth-5" id="example">
          <thead class="orange">
            <tr>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Folio</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Fecha</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Persona Autorizó</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Proovedor</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Comentarios</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Subtotal</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Iva</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Total</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Factura</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Estatus</center></td>              
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Firmar</center></td>
            </tr>
            </thead>
            <tbody>
              <?php
              require_once 'db_config.php';              
              $stmt=$db_con->prepare("SELECT * FROM compras ORDER BY id_orden_compra DESC");
              $stmt->execute();
              while($row=$stmt->fetch(PDO::FETCH_ASSOC))
              {
              ?>
              <tr>
              <td><center><?php echo $row['id_orden_compra']; ?></center></td>
              <td><center><?php echo $row['fecha_registro']; ?></center></td>
              <td><center><?php echo $row['persona_registro']; ?></center></td>
              <td><center><?php echo $row['proveedor']; ?></center></td>
              <td><center><?php echo $row['comentarios']; ?></center></td>
              <td><center><?php echo $row['subtotal']; ?></center></td>
              <td><center><?php echo $row['iva']; ?></center></td>
              <td><center><?php echo $row['total']; ?></center></td>
              <td><center><?php echo $row['factura']; ?></center></td>
              <td><center><?php echo $row['estatus']; ?></center></td>
              <td><center><a class="aestatus modal-trigger tooltipped"data-position="bottom" data-tooltip="Autorizar orden de compra"href="#modal5" folio="<?php echo $row['folio'] ?>"id="<?php echo $row['id_compra'];?>"><i class="material-icons center" style="color:rgb(0,150,136)">border_color</i></a></center></td>
            </tr>
              <?php }; ?>
          </tbody>
        </table>
      </div>
    </div>
    <!--Termina tabla de ordenes de compra-->
    <!--MODAL PARA NUEVA ORDEN DE COMPRA-->
    <div id="modal1" class="modal">
      <div class="modal-content #eeeeee grey lighten-3">
        <div class="row">
          <div class="col l12 m12 s12 #fb8c00 orange darken-1 center white-text">
            <h5>NUEVA ORDEN DE COMPRA</h5>
          </div>
          <div class="col l4 m12 s12">
            <?php
                  require_once 'db_config.php';
                  $stmt=$db_con->prepare("SELECT MAX(id)+1 AS id FROM orden_compra;");
                  $stmt->execute();
                  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                  { 
                    if ($row['id']=='NULL') {
                      $id=1;
                    }else{
                      $id=$row['id'];
                    }
            ?>
            <label>Folio de Compra<input type="text" id="folio_compra" value="<?php echo $id?>-ODC" readonly></label>
            <?php
                  }
            ?>
          </div>
          <div class="col l4 m12 s12">
            <label>Elige un folio de obra</label>
            <select id="folio_obra" class="browser-default" required>
              <option value="">Selección:</option>
              <?php
              require_once 'db_config.php';
              $stmt=$db_con->prepare("SELECT id,folio,titulo,zona,lote FROM obra WHERE estado = 'TRABAJANDO' ORDER BY id DESC");
              $stmt->execute();
              while($row=$stmt->fetch(PDO::FETCH_ASSOC))
              {
              ?>
              <option  value="<?php echo$row['folio'];?>"><?php echo $row['folio'];?> - <?php echo $row['titulo'] ?> - Zona: <?php echo $row['zona'] ?> - Lote: <?php echo $row['lote'] ?></option>
                <?php
                }
                ?>
            </select> 
          </div>
          <div class="col l4 m12 s12">
            <label>Elige un proveedor</label>
            <select required id="proveedor" class="browser-default" required>
              <option value="">Selecciona proveedor</option>
              <?php
              require_once 'db_config.php';
              $stmt=$db_con->prepare("SELECT * FROM proveedor WHERE estatus = 'ACTIVO' ORDER BY id DESC");
              $stmt->execute();
              while($row=$stmt->fetch(PDO::FETCH_ASSOC))
              {
              ?>
              <option  value="<?php echo$row['id'];?>"><?php echo $row['nombre'];?> - <?php echo $row['ciudad'] ?>, <?php echo $row['estado'] ?></option>
                <?php
                }
                ?>
            </select>
          </div>
          <div class="col l3 m12 s12">
            <br>
            <label>Fecha</label>
            <input id="fecha_orden" type="date">
          </div>          
          <!-- REporte -->          
          <div class="col l5 m12 s12" style="margin-top:2em">
            <br>
            <label>Reporte / Comentarios</label><textarea style="overflow:auto;resize:none" id="comentarios"required></textarea>
            <input type="hidden" id="usuario" value="<?php echo $_SESSION['usuario']; ?>" readonly>
          </div> 
             
          <div class="col l12 m12 s12 center">
            <br>
            <button style="margin-top: 2em"class=" btn waves-effect #00695c teal darken-3 z-depth-5" type="submit" id="nueva_orden">Crear
            <i class="material-icons right">send</i>
            </button>
          </div>
        </div>
        <div class=" col l2 m12 s12 offset-l10 modal-footer" style="background-color: rgba(1,1,1,0)">
          <a href="#!" class=" modal-action modal-close waves-effect btn-flat red white-text" id="cancel">Salir<i class="material-icons">close</i></a>
        </div>
      </div>
    </div>      
    <!--TERMINA MODAL DE ORDEN DE COMPRA-->
    <!--MODAL PARA AGREGAR INSUMOS-->
    <div id="modal2" class="modal">
      <div class="modal-content #eeeeee grey lighten-3">
        <div class="row">
          <div class="col l12 m12 s12 #1b5e20 green darken-4 center white-text">
            <h5>NUEVO INSUMO</h5>
          </div>
          <div class="col l4 m12 s12">
            <label>Elige una Orden de Compra</label>
            <select id="folio_orden_insumo" class="browser-default" required>
              <option value="">Selecciona orden...</option>
              <?php
              require_once 'db_config.php';
              $stmt=$db_con->prepare("SELECT id,folio,folio_obra FROM orden_compra WHERE estatus = 'PEDIDO' ORDER BY id DESC");
              $stmt->execute();
              while($row=$stmt->fetch(PDO::FETCH_ASSOC))
              {
              ?>
              <option  value="<?php echo$row['id'];?>" obra="<?php echo $row['folio_obra'] ?>">ORDEN DE COMPRA <?php echo $row['folio'];?> - OBRA<?php echo $row['folio_obra'] ?></option>
                <?php
                }
                ?>
            </select> <br>
          </div><br>
          <div class="col l4 m12 s12">
            <label>Fecha</label>
            <input id="fecha_insumo" type="date"><br>
          </div>
          <div class="col l4 m12 s12">
            <label>Elige un Insumo del catálogo</label>
            <select id="insumo_catalogo" class="browser-default" required onChange="insumos();">
              <option value="">Selecciona insumo...</option>
              <option value="otro">Otro</option>
              <?php
              require_once 'db_config.php';
              $stmt=$db_con->prepare("SELECT * FROM catalogo_insumo ORDER BY id DESC");
              $stmt->execute();
              while($row=$stmt->fetch(PDO::FETCH_ASSOC))
              {
              ?>
              <option  value="<?php echo $row['nombre'];?>"> <?php echo $row['nombre'];?> - Unidad de medida <?php echo $row['unidad'];?></option>
              <?php
              }
              ?>
            </select><br>
          </div>          
          <div class="col l4 m12 s12">
            <label id="label_insumo">Insumo</label>
            <input id="insumo_nuevo_input"type="text">
          </div>
          <div class="col l4 m12 s12">
            <label>Precio Unitario</label>
            <input id="precio_unitario"   type="number">
          </div>
          <div class="col l4 m12 s12">
            <label>Cantidad</label>
            <input id="cantidad_insumo"   type="number">
          </div>
          <div class="col l4 m12 s12">
            <label>Importe</label>
            <input id="importe_insumo"    type="number">
          </div>         
          <div class="col l12 m12 s12 center">
            <button style="margin-top: 2em"class=" btn waves-effect #00695c teal darken-3 z-depth-5" type="submit" id="btn_nuevo_insumo">Añadir
              <i class="material-icons right">send</i>
            </button>
          </div>
        </div>
        <div class=" col l2 m12 s12 offset-l10 modal-footer" style="background-color: rgba(1,1,1,0)">
          <a href="#!" class=" modal-action modal-close waves-effect btn-flat red white-text" id="cancel">Salir<i class="material-icons">close</i></a>
        </div>
      </div>
    </div>
    <!--TERMINA MODAL PARA AGREGAR INSUMOS-->
    <!--MODAL PARA MODIFICAR ORDEN DE COMPRA-->
    <div id="modal3" class="modal">
      <div class="modal-content #eeeeee grey lighten-3">
        <div class="col l12 m12 a12 orange white-text"><h4 id="hmodal3"style="font: 150% sans-serif; font-size: 24px;">Editar Orden Compra</h4></div>
        <div class="row" id="row_editar_orden">

        </div>
        <div class=" col l2 m12 s12 offset-l10 modal-footer"style="background-color: rgba(1,1,1,0)">
          <a href="#!" class=" modal-action modal-close waves-effect btn-flat red white-text" id="cancel">Salir<i class="material-icons">close</i></a>
        </div>
      </div>
    </div>
    <!--TERMINA EL MODAL PARA  MODIFICAR LAS ORDENS DE COMPRA-->
    <!-- INICIA MODAL PARA VER LOS INSUMOS DE LA ORDEN SELECCIONADA-->
    <div id="modal4" class="modal">
      <div class="modal-content #eeeeee grey lighten-3">
        <h4 id="hmodal4"style="font: 150% sans-serif; font-size: 24px;">Insumos de la Orden</h4>
        <div class="row" id="row_editar_insumo">
          <?php/*
            $servername = "192.185.131.25";
            $username   = "seicolag_cadmin";
            $password   = "@seicolagc@@";
            $dbname     = "seicolag_constructora";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM orden_insumo WHERE id_orden = '6'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<label>".$row['insumo']."</label>";
                }
            } else {
                echo "0 results";
            }

            mysqli_close($conn);*/
          ?>
        </div>
        <div class=" col l2 m12 s12 offset-l10 modal-footer"style="background-color: rgba(1,1,1,0)">
          <a href="#!" class=" modal-action modal-close waves-effect btn-flat red white-text" id="cancel">Salir<i class="material-icons">close</i></a>
        </div>
      </div>
    </div>
    <!--TERMINA MODAL PARA VER LOS INSUMOS DE LA ORDEN SELECCIONADA-->
    <!-- INICIA MODAL PARA CONTROLAR ESTATUS DE LA ORDEN SELECCIONADA-->
    <div id="modal5" class="modal">
      <div class="modal-content #00897b teal darken-1">
        <div class="row"><div class="col l12 s12 m12 white center"><h4 id="hmodal4"style="font: 150% sans-serif; font-size: 24px; color: #00897b;">FIRMAR ORDEN</h4></div></div>
        <div class="row">          
          <div class="col l6 m12 s12"><input class="white-text" type="text"id="input_nombre_usuario" value="Luis Alan Castañeda Villalobos" readonly><label for="input_nombre_usuario" class="white-text">Persona que autoriza la orden</label></div>
          <div class="col l4 m12 s12"><input class="white-text" type="text"id="input_orden_estatus"readonly><label for="input_orden_estatus"class="white-text">Folio de la Orden</label></div>
          <div class="col l2 m12 s12"><input class="white-text" type="datetime" id="fecha_estatus"value="<?php echo date("Y-m-d");?>"><label for="fecha_estatus" class="white-text">Fecha de autorización</label></div>
        </div>
        <div class="row" id="row_estatus_orden">
          <div class="col l3 m12 s12 center blue white-text" style="border-radius: 100px;border: 2px"><a class="tooltipped"data-position="bottom" data-tooltip="Regresar a Pedido"href="#" id="a_pedido_orden">  <i class="material-icons white-text large">assignment_return</i></a><br></div>
          <div class="col l3 m12 s12 center green white-text" style="border-radius: 100px;border: 2px"><a class="tooltipped"data-position="bottom" data-tooltip="Aprobar   Orden"href="#" id="a_aprobar_orden">  <i class="material-icons white-text large">playlist_add_check</i></a><br></div>
          <div class="col l3 m12 s12 center orange white-text"style="border-radius: 100px;border: 2px"><a class="tooltipped"data-position="bottom" data-tooltip="Registrar Compra"href="#" id="a_registrar_orden"><i class="material-icons white-text large">local_atm</i></a><br></div>
          <div class="col l3 m12 s12 center red white-text"   style="border-radius: 100px;border: 2px"><a class="tooltipped"data-position="bottom" data-tooltip="Cancelar  Orden"href="#" id="a_cancelar_orden"> <i class="material-icons white-text large">cancel</i></a><br></div>
        </div>
        <div class="row">
          <div class="col l12"><a href="#" class="ayuda"><label class="white-text">¿Necesitas ayuda?</label></a></div>
          </div>
        <div class="row"id="row_ayuda">
          <div class="col l2"><label>Aprobar Orden</label></div>
          <div class="col l10"><label>Al dar click, el estatus de la orden se modificará por "Aprobada", lista para imprimirla.</label></div>
          <div class="col l2"><label>Registrar Compra</label></div>
          <div class="col l10"><label>Al dar click, el estatus de la orden se modificará por "Pagada", esto registrará la cantidad de insumos pedidos en ALMACEN.</label></div>
          <div class="col l2"><label>Cancelar</label></div>
          <div class="col l10"><label>Al dar click, el estatus de la orden se modificará por "Cancelada", desaparecerá del registro y no se podrá ejecutar función sobre ese folio.</label></div>
        </div>
        <div class="col l2 m12 s12 offset-l10 modal-footer" style="background-color: rgba(1,1,1,0)">
          <a href="#!" class=" modal-action modal-close waves-effect btn-flat white-text red" id="cancel">Salir<i class="material-icons">close</i></a>
        </div>
      </div>
    </div>

    <!-- TERMINA MODAL PARA CONTROLAR ESTATUS DE LA ORDEN SELECCIONADA -->

    <!--TERMINA MODAL PARA AGREGAR INSUMOS-->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" src="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"></script>
    <script>
      $(document).ready(function() {
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
    <script type="text/javascript">
      function insumos(){
        var insumo = $('#insumo_catalogo').val();
        $('#insumo_nuevo_input').val(insumo);
      }
    </script>
    <script type="text/javascript">/*
    $(document).ready(function (){
    $('.alink').on('click', function (){
        var mensaje = $(this).attr('id');
        $('#hmodal3').text(mensaje);
    })
})*/
    </script>
  </body>
</html>