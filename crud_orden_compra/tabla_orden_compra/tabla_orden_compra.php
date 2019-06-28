<div class="row" style="margin-left: 100px">
      <div class="col m12">
        <div id="title">
          <h2 class="form-signin-heading" style="font: 150% sans-serif;">Mis Solicitudes de Compra</h2>
        </div>
        <table class="striped responsive-table z-depth-5" id="example">
          <thead class=""style="background-color:#ff9955">
            <tr>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Folio</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Fecha</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Folio Obra</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Proveedor</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Total</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Comentarios</center></th>                
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>Estatus</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>CONSULTAR</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>INSUMOS</center></td>
              <td style="font: 150% sans-serif; font-size: 14px; color: white"><center>IMPRIMIR</center></td>
              <!--<td style="font: 150% sans-serif; font-size: 14px; color: white"><center>FIRMAR</center></td>-->
            </tr>
              <!--</tr>-->
            </thead>
            <tbody>
              <?php
              require_once 'db_config.php';
              //$stmt=$db_con->prepare("SELECT * FROM orden_compra ORDER BY id DESC");
              $stmt=$db_con->prepare("SELECT orden_compra.id_proveedor, proveedor.nombre AS nombre, orden_compra.folio AS folio,
                 orden_compra.total AS total, orden_compra.comentarios AS comentarios, orden_compra.estatus AS estatus, 
                 orden_compra.fecha AS fecha, orden_compra.folio_obra AS folio_obra, orden_compra.id AS id_compra 
                 FROM orden_compra INNER JOIN proveedor ON orden_compra.id_proveedor=proveedor.id WHERE orden_compra.estatus = 'PEDIDO' OR orden_compra.estatus = 'APROBADA' ORDER BY id_compra DESC");
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
              <td><center><a class="alink    modal-trigger tooltipped"data-position="bottom" data-tooltip="Consulta los datos generales de la orden"href="#modal3"id="<?php echo $row['folio'];?>"><i class="material-icons orange-text center">pageview</i></a></center></td>
              <td><center><a class="ainsumos modal-trigger tooltipped"data-position="bottom" data-tooltip="Consulta los insumos de la orden"href="#modal4"id="<?php echo $row['id_compra'];?>"href=""><i class="material-icons green-text center">view_list</i></a></center></td>
              <?php 
                if($row['estatus'] == 'APROBADA'){
                  echo '<td><center><a class="tooltipped"data-position="bottom" data-tooltip="Disponible para imprimir"href=""><i class="material-icons red-text center">picture_as_pdf</i></a></center></td>';
                }
                else{
                  echo '<td><center><a class="tooltipped"data-position="bottom" data-tooltip="Orden no autorizada"href=""><i class="material-icons black-text center">picture_as_pdf</i></a></center></td>';
                }
              ?>
              <!--<td><center><a class="tooltipped"data-position="bottom" data-tooltip="Imprime en pdf la orden de compra"href=""><i class="material-icons red-text center">picture_as_pdf</i></a></center></td>-->
              <!--<td><center><a class="aestatus modal-trigger tooltipped"data-position="bottom" data-tooltip="Autorizar orden de compra"href="#modal5" folio="<?php //echo $row['folio'] ?>"id="<?php //echo $row['id_compra'];?>"><i class="material-icons center" style="color:rgb(0,150,136)">border_color</i></a></center></td>-->
            </tr>
              <?php }; ?>
          </tbody>
        </table>
      </div>
    </div>