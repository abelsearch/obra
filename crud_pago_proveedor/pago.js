$(document).ready(function(){
	//MODAL
	$( "#trigger" ).click(function(){ 
	$('#modal1').modal();
	$('#modal1').modal('open');
	});

	$( "#cancel" ).click(function(){
	$('#modal1').modal();
	$('#modal1').modal('close');
	$('.tooltipped').tooltip();
	});

//MODAL

//INICIA ACCION DE ICONO FIRMA DE ESTATUS DE LA ORDEN DE COMPRA
$(document).ready(function(){
	$('.aestatus').on('click',function(){
		var folio_orden_estatus = $(this).attr('folio');
		var id_compra = $(this).attr('id');
		$('#input_orden_estatus').val(folio_orden_estatus);
		$('#input_id_compra').val(id_compra);
	});
});
//TERMINA ACCION DEL ICONO FIRMA DE ESTATUS DE LA ORDEN DE COMPRA

//----------------INICIAN ACCIONES DE BOTONES ESTATUS------------------------------------
//----------------Botón para mostrar el fomurlario de pago pendiente---------------------
$('#a_pago_pendiente').on('click',function(){
	$('#row_regresar_pago').show();
	$('#row_cancelar_pago').hide();
	$('#row_anticipo_pago').hide();
	$('#row_finalizar_pago').hide();
});
///---------------Botón para mostrar el formulario de pago cancelado---------------------
$('#a_pago_cancelado').on('click',function(){
	$('#row_cancelar_pago').show();
	$('#row_regresar_pago').hide();
	$('#row_anticipo_pago').hide();
	$('#row_finalizar_pago').hide();
});
///---------------Botón para mostrar el formulario de pago cancelado---------------------
$('#a_pago_anticipo').on('click',function(){
	$('#row_anticipo_pago').show();
	$('#row_cancelar_pago').hide();
	$('#row_regresar_pago').hide();
	$('#row_finalizar_pago').hide();
});
///---------------Botón para mostrar el formulario de pago finalizado--------------------
$('#a_pago_finalizado').on('click',function(){
	$('#row_finalizar_pago').show();
	$('#row_anticipo_pago').hide();
	$('#row_cancelar_pago').hide();
	$('#row_regresar_pago').hide();
});
//-----------------TERMINAN ACCIONES DE BOTONES ESTATUS----------------------------------
//-----------------INICIAN LISTENERS DE ACCIONES ESTATUS --------------------------------
//-----------------Listener to change status to pending payment--------------------------
$('#a_regresar_pago').on('click',function(){
	var bool=confirm($('#input_nombre_usuario').val()+ "¿Seguro que deseas regresar el estatus de este pago a PENDIENTE DE PAGO? Foilo "+ $('#input_orden_estatus').val());
    if(bool){
	    var folio_orden     = $('#input_orden_estatus').val();
		var fecha_pago      = $('#fecha_estatus').val();
		var nombre_usuario  = $('#input_nombre_usuario').val();
		var id_compra 		= $('#input_id_compra').val();
		var reporte			= $('#reporte_regresar_pago').val();

		if(folio_orden==''||fecha_estatus==''||nombre_usuario==''||id_compra==''||reporte=='')
			{
				//M.toast({html: 'Error, llenar todos los campos para continuar', classes: 'rounded'}); 
				swal({ 
  				title: "Alerta!!!",		
  				icon: "warning", 
  				text: "Por favor llene los campos!!!",
				});
			}

		else
			{             
		        //inicia ajax para ingresar insumo y actualizar orden de compra
		        $.ajax
					({
						url: 'crud_pago_proveedor/pago_pendiente.php',
						data: {
							"folio_orden"    : folio_orden,
							"fecha_estatus"  : fecha_pago,
							"nombre_usuario" : nombre_usuario,
							"reporte"		 : reporte,
							"id_compra" 	 : id_compra
						},
						type: 'post',
						success: function(data)
						{ 
							M.toast({html: data, classes: 'rounded'}); 
							window.location.reload();
						}
					});            
   			}
    }
    else{
    	//alert("El pago cambio a PENDIENTE"); 
    	swal({ 
  title: "Alerta!!!",		
  icon: "warning", 
  text: "El pago cambió a PENDIENTE",
});
    }
});
//-----------------Listener to change status to advance payment--------------------------
$('#a_pago_anticipo2').on('click',function(){
	var bool=confirm($('#input_nombre_usuario').val()+ "¿Seguro que deseas regresar el estatus de este pago a ANTICIPO DE PAGO? Foilo "+ $('#input_orden_estatus').val());
    if(bool){
	    var folio_orden      = $('#input_orden_estatus').val();
		var fecha_estatus    = $('#fecha_estatus').val();
		var fecha_pago	     = $('#pago_fecha').val();
		var nombre_usuario   = $('#input_nombre_usuario').val();
		var id_compra 		 = $('#input_id_compra').val();
		var pago_monto		 = $('#pago_monto').val();
		var pago_comentarios = $('#pago_comentarios').val();


		if(folio_orden==''||fecha_estatus==''||nombre_usuario==''||id_compra==''||pago_monto==''||pago_comentarios=='')
			{
				//M.toast({html: 'Error, llenar todos los campos para continuar', classes: 'rounded'}); 
				swal({ 
  				title: "Alerta!!!",		
  				icon: "warning", 
  				text: "Por favor llene los campos!!!",
				});
			}

		else
			{    
		        
		        $.ajax
					({
						url: 'crud_pago_proveedor/pago_anticipo.php',
						data: {
							"folio_orden"      : folio_orden,
							"fecha_estatus"    : fecha_estatus,
							"nombre_usuario"   : nombre_usuario,
							"fecha_pago"       : fecha_pago,
							"id_compra" 	   : id_compra,
							"pago_monto"	   : pago_monto,
							"pago_comentarios" : pago_comentarios
						},
						type: 'post',
						success: function(data)
						{ 
							M.toast({html: data, classes: 'rounded'}); 
							window.location.reload();
						}
					});            
   			}
    }
    else{
    	//alert("El pago cambio a ANTICIPO"); 
    	swal({ 
  title: "Alerta!!!",		
  icon: "warning", 
  text: "El pago cambió a ANTICIPO",
});
    }
});
//-----------------Listener to change status to cancel payment--------------------------
$('#a_cancelar_pago').on('click',function(){
	var bool=confirm($('#input_nombre_usuario').val()+ "¿Seguro que deseas CANCELAR el pago? Foilo "+ $('#input_orden_estatus').val());
    if(bool){
	    var folio_orden     = $('#input_orden_estatus').val();
		var fecha_pago      = $('#fecha_estatus').val();
		var nombre_usuario  = $('#input_nombre_usuario').val();
		var id_compra 		= $('#input_id_compra').val();
		var reporte			= $('#reporte_cancelacion').val();

		if(folio_orden==''||fecha_estatus==''||nombre_usuario==''||id_compra==''||reporte=='')
			{
				//M.toast({html: 'Error, llenar todos los campos para continuar', classes: 'rounded'}); 
				swal({ 
  				title: "Alerta!!!",		
  				icon: "warning", 
  				text: "Por favor llene los campos!!!",
				});
			}

		else
			{             
		        //inicia ajax para ingresar insumo y actualizar orden de compra
		        $.ajax
					({
						url: 'crud_pago_proveedor/pago_cancelado.php',
						data: {
							"folio_orden"    : folio_orden,
							"fecha_estatus"  : fecha_pago,
							"nombre_usuario" : nombre_usuario,
							"reporte"		 : reporte,
							"id_compra" 	 : id_compra
						},
						type: 'post',
						success: function(data)
						{ 
							M.toast({html: data, classes: 'rounded'}); 
							window.location.reload();
						}
					});            
   			}
    }
    else{ 
    	swal({ 
  title: "Alerta!!!",		
  icon: "warning", 
  text: "El pago cambió a PENDIENTE",
});
    	//alert("El pago cambio a PENDIENTE");
    }
});
//-----------------Listener to change status to complete payment--------------------------
$('#a_finalizar_pago').on('click',function(){
	var bool=confirm($('#input_nombre_usuario').val()+ "¿Seguro que deseas FINALIZAR el pago? Foilo "+ $('#input_orden_estatus').val());
    if(bool){
	    var folio_orden     = $('#input_orden_estatus').val();
		var fecha_pago      = $('#fecha_estatus').val();
		var nombre_usuario  = $('#input_nombre_usuario').val();
		var id_compra 		= $('#input_id_compra').val();

		if(folio_orden==''||fecha_estatus==''||nombre_usuario==''||id_compra=='')
			{
				//M.toast({html: 'Error, llenar todos los campos para continuar', classes: 'rounded'}); 
				swal({ 
  				title: "Alerta!!!",		
  				icon: "warning", 
  				text: "Por favor llene los campos!!!",
				});
			}

		else
			{             
		        //inicia ajax para ingresar insumo y actualizar orden de compra
		        $.ajax
					({
						url: 'crud_pago_proveedor/pago_finalizado.php',
						data: {
							"folio_orden"    : folio_orden,
							"fecha_estatus"  : fecha_pago,
							"nombre_usuario" : nombre_usuario,
							"id_compra" 	 : id_compra
						},
						type: 'post',
						success: function(data)
						{ 
							M.toast({html: data, classes: 'rounded'}); 
							window.location.reload();
						}
					});            
   			}
    }
    else{
    	//alert("El pago cambio a FINALIZADO"); 
    	swal({ 
  		title: "Alerta!!!",		
  		icon: "warning", 
  		text: "El pago cambió a FINALIZADO",
		});
    }
});
}); 