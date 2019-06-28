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
          <td><center><a class="aestatus modal-trigger tooltipped"data-position="bottom" data-tooltip="Autorizar orden de compra"href="#modal5" folio="<?php echo $row['id_orden_compra'] ?>"id="<?php echo $row['id'];?>"><i class="material-icons center" style="color:rgb(0,150,136)">border_color</i></a></center></td>
        </tr>
          <?php }; ?>
      </tbody>
    </table>
  </div>
</div>
<!--Termina tabla de ordenes de compra-->