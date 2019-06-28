<div id="modal6" class="modal">
      <div class="modal-content">
        <div class="form-group">
          <label>Nombre<input type="text" name="nombre" id="Nnombre" required></label>
        </div>
        <div class="form-group">
          <label>Unidad<input type="text" name="unidad" id="Nunidad" required></label>
        </div>
        <div class="form-group">
          <label>Saldo Inicial<input type="number" name="saldo" id="Nsaldo" required></label>
        </div>
        <div class="col l4 m12 s12">
          <input type="hidden" name="fecha" id="Nfecha" value="<?php echo date('Y-m-d');?>" readonly>
        </div>
        <button class="btn waves-effect orange z-depth-5" type="submit" id="enviarN" name="action">CREAR
        <i class="material-icons right">send</i>
        </button> 
        <br> 
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close btn-flat" id="cancelN"><i class="material-icons">close</i></a>
          </div>
      </div>
    </div>