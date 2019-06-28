<div id="modal5" class="modal">
      <div class="modal-content #00897b teal darken-1">
        <div class="row">
          <div class="col l12 s12 m12 white center"><h4 id="hmodal4"style="font: 150% sans-serif; font-size: 24px; color: #00897b;">FIRMAR ORDEN</h4></div>
          <div class="col l12 s12 m12 center"><a href="#" class="ayuda"><label class="white-text">¿Necesitas ayuda?</label></a></div>
        </div>
        <div class="row">          
          <div class="col l6 m12 s12"><input class="white-text" type="text"id="input_nombre_usuario" value="Luis Alan Castañeda Villalobos" readonly><label for="input_nombre_usuario" class="white-text">Persona que autoriza la orden</label></div>
          <div class="col l4 m12 s12"><input class="white-text" type="text"id="input_orden_estatus"readonly><label for="input_orden_estatus"class="white-text">Folio de la Orden</label></div>
          <div class="col l2 m12 s12"><input class="white-text" type="datetime" id="fecha_estatus"value="<?php echo date("Y-m-d");?>"><label for="fecha_estatus" class="white-text">Fecha de autorización</label></div>
        </div>
        <div class="row" id="row_estatus_orden">
          <div class="col l3 m12 s12 center"><a class="blue white-text btn"  style="border-radius: 100px;border: 2px; font-size:20px"  href="#"    id="a_pedido_orden"><!--<i class="material-icons white-text">assignment_return</i>--> Pedido</a><br></div>
          <div class="col l3 m12 s12 center"><a class="white-text green btn" style="border-radius: 100px;border: 2px; font-size:20px"  href="#"   id="a_aprobar_orden"><!--<i class="material-icons white-text">playlist_add_check</i>--> Aprobar</a><br></div>
          <div class="col l3 m12 s12 center"><a class="white-text orange btn"style="border-radius: 100px;border: 2px; font-size:20px"  href="#" id="a_registrar_orden"><!--<i class="material-icons white-text">local_atm</i>--> Comprar</a><br></div>
          <div class="col l3 m12 s12 center"><a class="red white-text btn"   style="border-radius: 100px;border: 2px; font-size:20px"  href="#"  id="a_cancelar_orden"><!--<i class="material-icons white-text">cancel</i>--> Cancelar</a><br></div>
        </div>
        <div class="row"id="row_ayuda">
          <div class="col l2"><label>Aprobar Orden</label></div>
          <div class="col l10"><label>Al dar click, el estatus de la orden se modificará por "Aprobada", lista para imprimirla.</label></div>
          <div class="col l2"><label>Registrar Compra</label></div>
          <div class="col l10"><label>Al dar click, el estatus de la orden se modificará por "Pagada", esto registrará la cantidad de insumos pedidos en ALMACEN.</label></div>
          <div class="col l2"><label>Cancelar</label></div>
          <div class="col l10"><label>Al dar click, el estatus de la orden se modificará por "Cancelada", desaparecerá del registro y no se podrá ejecutar función sobre ese folio.</label></div>
        </div>
        <div class="row collection" id="row_registrar_compras">
          <div class="col l12 s12 m12 white"><h4 class="black-text">Registrar Compra</h4></div>
          <div class="col l4 m12 s12" style="margin-top:2em"><label class="white-text">Importe<input type="text" id="compra_importe_final" class="white-text"></label></div>
          <div class="col l4 m12 s12" style="margin-top:2em"><label class="white-text">Referencia Factura<input type="text" id="compra_ref_factura" class="white-text"></label></div>
          <div class="col l4 m12 s12" style="margin-top:2em"><label class="white-text">Comentarios<textarea type="text" id="compra_comentarios" class="white-text"></textarea></label></div>
          <div class="col l12 m12 s12"><br><a id="a_registrar_compra_continuar"class="tooltipped orange btn white-text"data-position="bottom" data-tooltip="Registrar Compra"href="#" id="#"><i class="material-icons white-text">local_atm</i> Continuar</a></div>
        </div>
        <div class="row collection" id="row_cancelar_orden">
          <div class="col l12 s12 m12 white"><h4 class="black-text">Cancelar Orden</h4></div>
          <div class="col l12 m12 s12" style="margin-top:2em"><label class="white-text">Reporte<textarea type="text" id="reporte_cancelacion" class="white-text"></textarea></label></div>
          <div class="col l12 m12 s12"><br><a id="a_cancelar_orden_continuar"class="tooltipped red btn white-text"data-position="bottom" data-tooltip="Cancelar Orden"href="#" id="#"><i class="material-icons white-text">cancel</i> Continuar</a></div>
        </div>
        <div class="row collection" id="row_regresar_pedido">
          <div class="col l12 s12 m12 white"><h4 class="black-text">Regresar a Solicitud</h4></div>
          <div class="col l12 m12 s12" style="margin-top:2em"><label class="white-text">Reporte<textarea type="text" id="reporte_pedido" class="white-text"></textarea></label></div>
          <div class="col l12 m12 s12"><br><a id="a_pedido_orden_continuar"class="tooltipped blue btn white-text"data-position="bottom" data-tooltip="Cancelar Orden"href="#" id="#"><i class="material-icons white-text">assignment_return</i> Continuar</a></div>
        </div>
        <div class="col l2 m12 s12 offset-l10 modal-footer" style="background-color: rgba(1,1,1,0)">
          <a href="#!" class=" modal-action modal-close waves-effect btn-flat white-text red" id="cancel">Salir<i class="material-icons">close</i></a>
        </div>
      </div>
    </div>