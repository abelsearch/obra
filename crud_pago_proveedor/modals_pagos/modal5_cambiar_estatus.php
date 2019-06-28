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
          <div class="col l2 m12 s12" style="display:none"><input type="text" id="input_id_compra"></div>
        </div>
        <div class="row" id="row_estatus_orden">
          <div class="col l3 m12 s12 center"><a class="blue white-text btn"  style="border-radius: 100px;border: 2px; font-size:20px"  href="#"     id="a_pago_pendiente" > Pendiente</a><br></div>
          <div class="col l3 m12 s12 center"><a class="white-text green btn" style="border-radius: 100px;border: 2px; font-size:20px"  href="#"     id="a_pago_anticipo"  > Anticipo</a><br></div>
          <div class="col l3 m12 s12 center"><a class="white-text orange btn"style="border-radius: 100px;border: 2px; font-size:20px"  href="#"     id="a_pago_finalizado"> Finalizar</a><br></div>
          <div class="col l3 m12 s12 center"><a class="red white-text btn"   style="border-radius: 100px;border: 2px; font-size:20px"  href="#"     id="a_pago_cancelado" > Cancelar</a><br></div>
        </div>        
        <div class="row collection" id="row_anticipo_pago">
          <div class="col l12 s12 m12 white"><h5 class="black-text">Registrar Anticipo de Pago</h5></div>
          <div class="col l4 m12 s12" style="margin-top:2em"><label class="white-text">Monto<input type="text" id="pago_monto" class="white-text"></label></div>
          <div class="col l4 m12 s12" style="margin-top:2em"><label class="white-text">Fecha<input type="datetime" id="pago_fecha" class="white-text"value="<?php echo date("Y-m-d");?>"></label></div>
          <div class="col l4 m12 s12" style="margin-top:2em"><label class="white-text">Comentarios<textarea type="text" id="pago_comentarios" class="white-text"></textarea></label></div>
          <div class="col l12 m12 s12"><br><a id="a_pago_anticipo2"class="tooltipped green btn white-text"data-position="bottom" data-tooltip="Registrar Compra"href="#" id="#"><i class="material-icons white-text">local_atm</i> Continuar</a></div>
        </div>
        <div class="row collection" id="row_cancelar_pago">
          <div class="col l12 s12 m12 white"><h5 class="black-text">Cancelar Pago</h5></div>
          <div class="col l12 m12 s12" style="margin-top:2em"><label class="white-text">Reporte<textarea type="text" id="reporte_cancelacion" class="white-text"></textarea></label></div>
          <div class="col l12 m12 s12"><br><a id="a_cancelar_pago"class="tooltipped red btn white-text"data-position="bottom" data-tooltip="Cancelar Orden"href="#" id="#"><i class="material-icons white-text">cancel</i> Continuar</a></div>
        </div>
        <div class="row collection" id="row_finalizar_pago">
          <div class="col l12 s12 m12 white"><h5 class="black-text">Finalizar Pago</h5></div>          
          <div class="col l12 m12 s12"><br><a id="a_finalizar_pago"class="tooltipped green btn white-text"href="#" id="#"><i class="material-icons white-text">done_outline</i> Continuar</a></div>
        </div>
        <div class="row collection" id="row_regresar_pago">
          <div class="col l12 s12 m12 white"><h5 class="black-text">Regresar a Pago Pendiente</h5></div>
          <div class="col l12 m12 s12" style="margin-top:2em"><label class="white-text">Reporte<textarea type="text" id="reporte_regresar_pago" class="white-text"></textarea></label></div>
          <div class="col l12 m12 s12"><br><a id="a_regresar_pago"class="blue btn white-text" href="#"><i class="material-icons white-text">assignment_return</i> Continuar</a></div>
        </div>
        <div class="col l2 m12 s12 offset-l10 modal-footer" style="background-color: rgba(1,1,1,0)">
          <a href="#!" class=" modal-action modal-close waves-effect btn-flat white-text red" id="cancel">Salir<i class="material-icons">close</i></a>
        </div>
      </div>
    </div>