<div class="row">
  <div class="col l11 offset-l1 s12 m12">
    <h2 class="form-signin-heading" style="font: 150% sans-serif;">MÓDELO / PRESUPUESTO</h2>
    <table class="striped responsive-table " id="example">
      <thead class="color-menu">
        <tr>
          <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Modelo</center></th>
          <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>M2</center></th>
          <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Fecha</center></th>
          <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Abrir</center></th>
          <!--<th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Eliminar</center></th>-->
          </tr>
      </thead>
      <tbody>
          <?php
          require_once 'db_config.php';
          $stmt=$db_con->prepare("SELECT * FROM modelo");
          $stmt->execute();
          while($row=$stmt->fetch(PDO::FETCH_ASSOC))
          {
          ?>
          <tr>
            <td class="color-smenu white-text"><center><?php echo $row['titulo']; ?></center></td>
            <td><center><?php echo $row['m2']; ?></center></td>
            <td><center><?php echo $row['fecha']; ?></center></td>
            <td align="center" >
              <center>
              <a id="<?php echo $row['id']; ?>" class='ver modal-trigger trigger tooltipped' data-position="top" data-tooltip="Abrir" href="#">
              <i class="material-icons  black-text  center">visibility</i></a>
              </center>
            </td>
          <!--<td align="center">
            <center>
            <a id="<?php echo $row['id']; ?>" class="eliminar tooltipped" data-position="top" data-tooltip="Eliminar" href="#">
              <i class="material-icons red-text  center">delete</i>
            </a>
            </center>
          </td>-->
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>