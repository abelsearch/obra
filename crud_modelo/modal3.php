<div id="modal3" class="modal">
        <div class="modal-content">
          <div class="row">
            <div class="col l12 center">
              <h2 style="font: small-caps 100%/200% serif;font-size:30px">Nueva Etapa</h2>
              <hr color="blue" align="center">
            </div>
            <div class="col l6 m12 s12">
            	<label>Selecciona un modelo</label>
              <select required  name="concepto" id="concepto" class="browser-default" required>
	              <option value="">Selección:</option>
	              <?php
	              require_once 'db_config.php';
	              $stmt=$db_con->prepare("SELECT * FROM modelo ORDER BY id");
	              $stmt->execute();
	              while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	              {
	              ?>
	              <option  value="<?php echo$row['id'];?>"><?php echo $row['titulo'];?>-<?php echo $row['m2']?>
	                <?php
	                }
	                ?>
	            </select>
            </div>            
            <div class="col l6 m12 s12">
              <label class="">Nombre de la Etapa</label>
              <input type="text" id="nombre_etapa">
            </div>
            <div class="col l6 m12 s12" style="margin-top:4em">
              <button class="btn white black-text z-depth-5" type="submit" id="btn_nueva_etapa" name="action">Agregar Etapa
              <i class="material-icons right blue-text">send</i>
              </button>
            </div>
          </div>
        </div>
        <div class="modal-footer #0d47a1 blue darken-4">
          <a href="#!" class=" modal-action modal-close waves-effect white btn-flat" id="cancel"><i class="material-icons">close</i></a>
        </div>
      </div>