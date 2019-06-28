<html>
<div id="modal2" class="modal">
	<div class="modal-content2">
		<div class="row">
			<div class="col l12 m12 s12 center color-menu white-text">
				<h5>Agregar a Modelo</h5>
			</div>
			<div class="col l3 m12 s12" style="margin-top:1em">
				<label>Elige un Modelo</label>
	            <select required  id="selector_modelo" class="browser-default" required>
	              <option value="">Selección:</option>
	              <?php
	              require_once 'db_config.php';
	              $stmt=$db_con->prepare("SELECT * FROM modelo ORDER BY id");
	              $stmt->execute();
	              while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	              {
	              ?>
	              <option value="<?php echo$row['id'];?>"><?php echo $row['titulo'];?>-<?php echo $row['m2']?>
	                <?php
	                }
	                ?>
	            </select>
			</div>
			<div class="col l4 m12 s12" style="margin-top:1em">
				<label>Elige una Etapa</label>
	            <select required  id="selector_etapa" class="browser-default" required>
	              <option value="">Selección:</option>
	              <?php
	              require_once 'db_config.php';
	              $stmt=$db_con->prepare("SELECT * FROM etapa_modelo ORDER BY id");
	              $stmt->execute();
	              while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	              {
	              ?>
	              <option  value="<?php echo$row['id'];?>"><?php echo $row['nombre'];?>
	                <?php
	                }
	                ?>
	            </select>
			</div>
			<div class="col l5 m12 s12" style="margin-top:1em">
				<label>Elige un concepto</label>
	            <select required  id="selector_conceptos" class="browser-default" required>
	              <option value="">Selección:</option>
	              <?php
	              require_once 'db_config.php';
	              $stmt=$db_con->prepare("SELECT * FROM catalogo_concepto ORDER BY id");
	              $stmt->execute();
	              while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	              {
	              ?>
	              <option  value="<?php echo$row['id'];?>" nombre="<?php echo $row['id']; ?>"><?php echo $row['descripcion'];?>
	                <?php
	                }
	                ?>
	            </select>
			</div>
			<div class="col l4 m12 s12">
				<label>Concepto</label>
				<input type="text" id="nombre_concepto">
			</div>
			<div class="col l1 m12 s12">
				<label>Partida</label>
				<input type="text" id="partida_concepto">
			</div>
			<div class="col l1 m12 s12">
				<label>Unidad</label>
				<input type="text" id="unidad_concepto">
			</div>
			<div class="col l1 m12 s12">
				<label>Precio</label>
				<input type="text" id="precio_concepto">
			</div>
			<div class="col l1 m12 s12">
				<label>Cantidad</label>
				<input type="text" id="cantidad_concepto">
			</div>
			<div class="col l2 m12 s12">
				<label>Importe</label>
				<input type="text" id="importe_concepto">
			</div>
			<div class="col l2 m12 s12" style="margin-top: 20px">
				<a class="waves-effect waves-light btn-floating orange"id="agregar_concepto"><i class="material-icons white-text right">add_circle</i>button</a>
			</div>
		</div>
		<div class="row"id="row_modelo_conceptos"></div>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-action modal-close btn-flat" id="cancel"><i class="material-icons">close</i></a>
	</div>
</div>
</html>