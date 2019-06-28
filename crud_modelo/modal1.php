<div id="modal1" class="modal">
  <div class="row modal-content"> 
    <div class="col l12 m12 s12 green white-text center">
      <h5>Nuevo Modelo</h5>
    </div>
    <div class="col l4 m12 s12 offset-l2" style="margin-top:1em">
      <label>Nombre del modelo/presupuesto <input type="text" name="nombre" id="nombre" required></label>
    </div>
    <div class="col l4 m12 s12" style="margin-top:1em">
       <label>Cantidad de m2<input type="text" name="m2" id="m2" required></label>
    </div>
    <div class="col l4 m12 s12" style="margin-top:1em">
      <input type="hidden" name="fecha" id="fecha" value="<?php echo date('Y-m-d');?>" readonly>
    </div>
    <div class="col l12 m12 s12 center" style="margin-top:1em">
      <button class="btn waves-effect green z-depth-5" type="submit" id="enviar" name="action">CREAR
      <i class="material-icons right">send</i>
      </button>
    </div>   
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close btn-flat" id="cancel"><i class="material-icons">close</i></a>
  </div>
</div>