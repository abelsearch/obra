<div id="modal2" class="modal">
      <div class="modal-content #eeeeee grey lighten-3">
        <div class="row">
          <div class="col l12 m12 s12 center white-text" style="background-color:#10ac84">
            <h5>NUEVO INSUMO</h5>
          </div>
          <div class="col l12 m12 s12">
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
            </select>
          </div>
          <div class="col l4 m12 s12">
            <label>Fecha</label>
            <input id="fecha_insumo" type="text" class="datepicker">
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
            </select>
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