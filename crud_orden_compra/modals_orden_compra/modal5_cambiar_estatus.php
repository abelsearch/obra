<!-- INICIA MODAL PARA CONTROLAR ESTATUS DE LA ORDEN SELECCIONADA-->
    <div id="modal5" class="modal">
      <div class="modal-content #00897b teal darken-1">
        <div class="row"><div class="col l12 s12 m12 white center"><h4 id="hmodal4"style="font: 150% sans-serif; font-size: 24px; color: #00897b;">FIRMAR ORDEN</h4></div></div>
        <div class="row">          
          <div class="col l6 m12 s12"><input class="white-text" type="text"id="input_nombre_usuario" value="Luis Alan Castañeda Villalobos" readonly><label for="input_nombre_usuario" class="white-text">Persona que autoriza la orden</label></div>
          <div class="col l4 m12 s12"><input class="white-text" type="text"id="input_orden_estatus"readonly><label for="input_orden_estatus"class="white-text">Folio de la Orden</label></div>
          <div class="col l2 m12 s12"><input class="white-text" type="datetime" id="fecha_estatus"value="<?php echo date("Y-m-d");?>"><label for="fecha_estatus" class="white-text">Fecha de autorización</label></div>
        </div>
        <div class="row" id="row_estatus_orden">
          <div class="col l4 m12 s12 center green white-text" style="border-radius: 100px;border: 2px"><a class="tooltipped"data-position="bottom" data-tooltip="Aprobar   Orden"href="#" id="a_aprobar_orden">  <i class="material-icons white-text large">playlist_add_check</i></a><br></div>
          <div class="col l4 m12 s12 center orange white-text"style="border-radius: 100px;border: 2px"><a class="tooltipped"data-position="bottom" data-tooltip="Registrar Orden"href="#" id="a_registrar_orden"><i class="material-icons white-text large">local_atm</i></a><br></div>
          <div class="col l4 m12 s12 center red white-text"   style="border-radius: 100px;border: 2px"><a class="tooltipped"data-position="bottom" data-tooltip="Cancelar  Orden"href="#" id="a_cancelar_orden"> <i class="material-icons white-text large">cancel</i></a><br></div>
        </div>
        <div class="row">
          <div class="col l12"><a href="#" class="ayuda"><label class="white-text">¿Necesitas ayuda?</label></a></div>
          </div>
        <div class="row"id="row_ayuda">
          <div class="col l2"><label>Aprobar Orden</label></div>
          <div class="col l10"><label>Al dar click, el estatus de la orden se modificará por "Aprobada", lista para imprimirla.</label></div>
          <div class="col l2"><label>Registrar Compra</label></div>
          <div class="col l10"><label>Al dar click, el estatus de la orden se modificará por "Pagada", esto registrará la cantidad de insumos pedidos en ALMACEN.</label></div>
          <div class="col l2"><label>Cancelar</label></div>
          <div class="col l10"><label>Al dar click, el estatus de la orden se modificará por "Cancelada", desaparecerá del registro y no se podrá ejecutar función sobre ese folio.</label></div>
        </div>
        <div class="col l2 m12 s12 offset-l10 modal-footer" style="background-color: rgba(1,1,1,0)">
          <a href="#!" class=" modal-action modal-close waves-effect btn-flat white-text red" id="cancel">Salir<i class="material-icons">close</i></a>
        </div>
      </div>
    </div>

    <!-- TERMINA MODAL PARA CONTROLAR ESTATUS DE LA ORDEN SELECCIONADA -->