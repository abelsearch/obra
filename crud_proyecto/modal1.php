<div id="modal1" class="modal">
      <div class="modal-content #eeeeee grey lighten-3">
        <div class="row">
          <div class="col l12 m12 s12 #fb8c00 orange darken-1 center white-text">
            <h5>NUEVO PROYECTO</h5>
          </div> 
           <div class="col l4 m12 s12">
            <?php
                  require_once 'db_config.php';
                  $stmt=$db_con->prepare("SELECT MAX(id)+1 AS id FROM proyecto;");
                  $stmt->execute();
                  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                  { 
                    if ($row['id']=='NULL') {
                      $id=1;
                    }else{
                      $id=$row['id'];
                    }
            ?>
            <label>Folio<input type="text" id="" name="folio" value="PRO-<?php echo $id?>" readonly></label>
            <?php
                  }
            ?>
          </div>
          <div class="col l4 m12 s12">
            <label>Empresa<input type="number" name="empresa" id="empresa" required></label>
          </div>
          <div class="col l4 m12 s12">
            <label>Nombre<input type="text" name="nombre" id="nombre" required></label>
          </div>
          <div class="col l4 m12 s12">
            <input type="text" name="fecha" id="fecha" value="<?php echo date('Y-m-d');?>" readonly>
            <input type="text" name="hora" id="hora" value="<?php date_default_timezone_set("America/Mexico_City"); echo date('h:i:s a');?>" readonly> 
            <input type="text" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario']; ?>" readonly>
          </div>
          <div class="col l12 m12 s12 center">
            <button style="margin-top: 2em"class=" col l4 m12 s12 btn waves-effect #00695c teal darken-3 z-depth-5" type="submit" id="enviar" name="action">Crear
            <i class="material-icons right">send</i>
            </button>
          </div>
        </div>
        <div class=" col l2 m12 s12 offset-l10 modal-footer red">
          <a href="#!" class=" modal-action modal-close waves-effect btn-flat white-text" id="cancel">Salir<i class="material-icons">close</i></a>
        </div>
      </div>
    </div>