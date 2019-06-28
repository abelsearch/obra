<div id="modal1" class="modal">
      <div class="modal-content">
        <div class="form-group">
          <label>Nombre<input type="text" name="nombre" id="nombre" required></label>
        </div>
        <div class="form-group">
          <label>Unidad<input type="text" name="unidad" id="unidad" required></label>
        </div>
        <div class="form-group">
          <label>Saldo Inicial<input type="number" name="saldo" id="saldo" required></label>
        </div>
        <div class="col l4 m12 s12">
          <input type="hidden" name="fecha" id="fecha" value="<?php echo date('Y-m-d');?>" readonly>
        </div>
        
        <button class="btn waves-effect orange z-depth-5" type="submit" id="enviar" name="action">CREAR
        <i class="material-icons right">send</i>
        </button>
        
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close btn-flat" id="cancel"><i class="material-icons">close</i></a>
      </div>
    </div>