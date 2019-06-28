<div id="modal1" class="modal">
          <div class="modal-content"> 
              <div class="form-group">
                <label>Partida<input type="text" name="partida" id="partida" required></label>
              </div>
              
              <div class="form-group">
                 <label>Descripción<input type="text" name="descripcion" id="descripcion" required></label>
              </div>
              
              <div class="form-group">
                <label>Medida<input type="text" name="medida" id="medida" required></label>                
              </div>  

              <div class="col l4 m12 s12">
                <input type="hidden" name="fecha" id="fecha" value="<?php echo date('Y-m-d');?>" readonly>
              </div>
              
              <button class="btn waves-effect orange z-depth-5" type="submit" id="enviar" name="action">CREAR
              <i class="material-icons right">send</i>
              </button>
           
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close btn-flat" id="cancel"><i class="material-icons">close</i></a>
          </div>
</div>
        