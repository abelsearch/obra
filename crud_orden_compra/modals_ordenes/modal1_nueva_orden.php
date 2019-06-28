<div id="modal1" class="modal">
      <div class="modal-content" style="background-color:c9dddd">
        <div class="row">
          <div class="col l12 m12 s12 center white-text" style="background-color:#ff9955">
            <h5>NUEVA ORDEN DE COMPRA</h5>
          </div>
          <div class="col l12 m12 s12 center">
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
            <label>Folio de Compra<input type="text" class="center" id="folio_compra" value="<?php echo $id?>-ODC" readonly></label>
            <?php
                  }
            ?>
          </div> 
          <div class="col l4 m12 s12" style="margin-top:1em">
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
          <div class="col l4 m12 s12" style="margin-top:1em">
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
          <div class="col l4 m12 s12">
            <br>
            <label>Fecha</label>
            <input id="fecha_orden" type="text" class="datepicker">
          </div>          
          <!-- REporte -->          
          <div class="col l12 m12 s12">
            <br>
            <label>Reporte / Comentarios</label><textarea style="overflow:auto;resize:none" id="comentarios"required></textarea>
            <input type="hidden" id="usuario" value="<?php echo $_SESSION['usuario']; ?>" readonly>
          </div> 
             
          <div class="col l12 m12 s12 center">
            <button style="margin-top: 2em" class=" btn waves-effect z-depth-5 #508d4f" style="background-color:#508d4f" type="submit" id="nueva_orden">Crear
            <i class="material-icons right">send</i>
            </button>
          </div>
        </div>
        <div class=" col l2 m12 s12 offset-l10 modal-footer" style="background-color: rgba(1,1,1,0)">
          <a href="#!" class=" modal-action modal-close waves-effect btn-flat red white-text" id="cancel">Salir<i class="material-icons">close</i></a>
        </div>
      </div>
    </div> 