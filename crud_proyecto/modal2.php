<div id="modal2" class="modal">
	<div class="modal-content2"> 

	</div>  
	<div class="col l m12 s12">
            <?php
                  require_once 'db_config.php';
                  $stmt=$db_con->prepare("SELECT MAX(id)+1 AS id FROM obra;");
                  $stmt->execute();
                  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                  { 
                    if ($row['id']=='NULL') {
                      $id=1;
                    }else{
                      $id=$row['id'];
                    }
            ?>
            <input type="text" id="folio" name="folio" value="<?php echo $id?>" readonly>
            <?php
                  }
            ?>
          </div> 
           <div class="col l6 m12 s12">
            <label>Elige un cliente</label>
            <select required  name="cliente" id="cliente" class="browser-default" required>
              <option value="">Selección:</option>
              <?php
              require_once 'db_config.php';
              $stmt=$db_con->prepare("SELECT * FROM cliente ORDER BY id");
              $stmt->execute();
              while($row=$stmt->fetch(PDO::FETCH_ASSOC))
              {
              ?>
              <option  value="<?php echo$row['nombre_comercial'];?>"><?php echo $row['nombre_comercial'];?>
                <?php
                }
                ?>
            </select>
          </div> 
		<div class="col l6 m12 s12 ">
            <label>Elige un Modelo</label>
            <select required  name="modelo" id="modelo" class="browser-default" required>
              <option value="">Selección:</option>
              <?php
              require_once 'db_config.php';
              $stmt=$db_con->prepare("SELECT * FROM modelo WHERE id_empresa=1");
              $stmt->execute();
              while($row=$stmt->fetch(PDO::FETCH_ASSOC))
              {
              ?>
              <option  value="<?php echo$row['id'];?>">
              <?php echo $row['titulo'];?> - <?php echo $row['m2'];?>
                <?php
                }
                ?>
            </select>
          </div>  
          <br>
          <div class="col l4 m12 s12 ">
            <label>Número de obras<input type="number" name="rango" id="rango" required></label>
          </div>  
          <br>
          <div class="col l4 m12 s12 ">
            <label>Número de semanas<input type="number" name="semana" id="semana" required></label>
          </div>  
          <br>
          <div class="col l4 m12 s12 ">
            <label>Presupuesto<input type="number" name="presupuesto" id="presupuesto" required></label>
          </div> 
          <br>
          <div class="col l4 m12 s12 ">
            <label>Entidad<input type="text" name="entidad" id="entidad" required></label>
          </div> 
          <br>
          <div class="col l4 m12 s12 ">
            <label>Ciudad<input type="text" name="ciudad" id="ciudad" required></label>
          </div> 
          <br> 
          <div class="col l4 m12 s12">
            <input type="hidden" name="fecha" id="fecha" value="<?php echo date('Y-m-d');?>" readonly>
            <input type="hidden" name="hora" id="hora" value="<?php date_default_timezone_set("America/Mexico_City"); echo date('h:i:s a');?>" readonly> 
          </div>
          <br> 
          <br>
	<center><button class="btn waves-effect orange z-depth-5" type="submit" id="enviar2" name="action">Generar
	<i class="material-icons right">send</i>
	</button></center>
	<div class="modal-footer">
		<a href="#!" class="modal-action modal-close btn-flat" id="cancel"><i class="material-icons">close</i></a>
	</div>
</div>