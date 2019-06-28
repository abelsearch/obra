$(document).ready(function(){
	//MODAL
	$( "#trigger" ).click(function(){ 
	$('#modal1').modal();
	$('#modal1').modal('open');
	});
	$( "#cancel" ).click(function(){
	$('#modal1').modal();
	$('#modal1').modal('close');
});
//MODAL 

//MODAL3 
$( "#trigger6" ).click(function(){  
$('#modal1').modal();
$('#modal1').modal('close');
$('#modal6').modal();
$('#modal6').modal('open');
});
//MODAL3       


//INICIA ACCION DE ICONO EDITAR INFO DE ORDEN      
$(document).ready(function(){
	$('.alink').on('click', function (){
	    var folio_orden_editar = $(this).attr('id');
	    /*----------------------------------------------------------
	    ------------------------------------------------------------
	    -----------------------------------------------------------*/

	        $.ajax({
	            type:'POST',
	            url:'crud_orden_compra/mostrar_orden.php',
	            dataType: "json",
	            data:{folio:folio_orden_editar},
	            success:function(data){
	            if(data.status == 'ok'){
	                $('#row_editar_orden').html("");	                
	                var folio = input('Folio Orden','text',data.result.folio_orden,4);      
	                var folio_obra = input('Folio Obra','text',data.result.folio_obra,4);   
	                var proveedor= input('Proveedor','text',data.result.nombre_proveedor,4);  
	                var total = input('Total','text',data.result.total,4);     
	                var iva = input('IVA','text',data.result.iva,4);    
	                var sub = input('Subtotal','text',data.result.subtotal,4);  
	                var comentarios = input('Comentarios','text',data.result.comentarios,4); 
	                var usuario = input('Usuario','text',data.result.usuario,4);    
	                var estatus = input('Estatus','text',data.result.estatus,4); 
	                var fecha = input('Fecha','text',data.result.fecha_orden,4);
	                $('#row_editar_orden').append(folio).append(folio_obra).append(proveedor).append(total).append(iva).append(sub).append(comentarios).append(usuario).append(estatus).append(fecha); 
	                
	            }else{
	                //M.toast({html: 'Orden no encontrada', classes: 'rounded'}); 
	                swal({ 
  					title: "Alerta!!!",		
  					icon: "warning", 
  					text: "ORDEN NO ENCONTRDA",
					});
	            } 
	            }
	        });


	    /*-----------------------------------------------------------
	    -------------------------------------------------------------
	    ------------------------------------------------------------*/
	});
})
//TERMINA ACCION DE ICONO EDITAR ORDEN
//INICIA ACCION DE ICONO VER INSUMO     
$(document).ready(function(){
	$('.ainsumos').on('click', function (){
	    var folio_orden_insumos = $(this).attr('id');
	    $('#row_editar_insumo').empty();
	    /*----------------------------------------------------------
	    ------------------------------------------------------------
	    -----------------------------------------------------------*/

	        $.ajax({
	            type:'POST',
	            url:'crud_orden_compra/mostrar_insumos.php',
	            dataType: "json",
	            data:{folio:folio_orden_insumos},
	            success:function(data){

	            if(data!=''){
	                var arreglo = data;
	                
	                $('#row_editar_insumo').html(arreglo);
	                
	            }else{
	                //M.toast({html: 'Insumos no encontrados', classes: 'rounded'}); 
	                swal({ 
  title: "Alerta!!!",		
  icon: "warning", 
  text: "INSUMOS NO ENCONTRADOS",
});
	            } 
	            }
	        });
	    /*-----------------------------------------------------------
	    -------------------------------------------------------------
	    ------------------------------------------------------------*/
	});
});
//TERMINA ACCION DE ICONO VER INSUMO
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//INICIA ACCION DE ICONO VER INSUMO     
$(document).ready(function(){
	$('.ainsumostock').on('click', function (){
	    var folio_orden_insumos = $(this).attr('id');
	    $('#row_editar_insumo_stock').empty();
	    /*----------------------------------------------------------
	    ------------------------------------------------------------
	    -----------------------------------------------------------*/

	        $.ajax({
	            type:'POST',
	            url:'crud_orden_compra/mostrar_insumos_stock.php',
	            dataType: "json",
	            data:{folio:folio_orden_insumos},
	            success:function(data){

	            if(data!=''){
	                var arreglo = data;
	                
	                $('#row_editar_insumo_stock').html(arreglo);
	                
	            }else{
	                //M.toast({html: 'Insumos no encontrados', classes: 'rounded'}); 
	                swal({ 
  title: "Alerta!!!",		
  icon: "warning", 
  text: "INSUMOS NO ENCINTRADOS",
});
	            } 
	            } 
	            	            
	            
	        });
	    /*-----------------------------------------------------------
	    -------------------------------------------------------------
	    ------------------------------------------------------------*/
	});
});
//TERMINA ACCION DE ICONO VER INSUMO 
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//INICIA ACCION DE ICONO VER INSUMO     
$(document).ready(function(){
	$('.a_agregar_a_stock').on('click', function (){
	    alert('true action');
	 });
});
//TERMINA ACCION DE ICONO VER INSUMO
//INICIA ACCION DE ICONO FIRMA DE ESTATUS DE LA ORDEN DE COMPRA
$(document).ready(function(){
	$('.aestatus').on('click',function(){
		var folio_orden_estatus = $(this).attr('folio');
		$('#input_orden_estatus').val(folio_orden_estatus);
	});
});
//TERMINA ACCION DEL ICONO FIRMA DE ESTATUS DE LA ORDEN DE COMPRA
//INICIA ACCION DEL "A" DE AYUDA, MUESTRA LA AYUDA EN UN ALERT
$(document).ready(function(){
	$('.ayuda').on('click',function(){
		//$('#row_ayuda').show();
		alert($('#row_ayuda').text());
	})
});
//TERMINA ACCION DEL "A" DE AYUDA
//INICIA FUNCION PARA CREAR INPUTS DE FORMA DINÁMICA
function input(etiqueta,tipo,valor,columnas){
	
	var nuevo = '<div class="col l'+columnas+' m12 s12"><label>'+etiqueta+'</label><input disabled type="'+tipo+'" value="'+valor+'"></div>';
	return nuevo;
}
//TERMINA FUNCION PARA CREAR INPUTS
//INICIA EVENTO PARA CREAR ORDEN 
$('#nueva_orden').click(function(){
	var folio_orden  = $('#folio_compra').val();
	var folio_obra	 = $('#folio_obra').val();
	var proveedor	 = $('#proveedor').val();
	var comentarios	 = $('#comentarios').val();
	var usuario		 = $('#usuario').val();
	var fecha_orden	 = $('#fecha_orden').val();


	if(folio_orden==''||folio_obra==''||proveedor==''||comentarios==''||fecha_orden==''||usuario=='')
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
			url: 'crud_orden_compra/crear_orden.php',
			data: {
				"folio_orden" : folio_orden,
				"folio_obra"  : folio_obra,
				"proveedor"   : proveedor,
				"comentarios" : comentarios,
				"usuario"	  : usuario,
				"fecha_orden" : fecha_orden
			},
			type: 'post',
			success: function(result)
			{ 
			M.toast({html: result, classes: 'rounded'}); 
			window.location.reload();
			}
		});
	}
});     
//TERMINA EVENTO PARA CREAR ORDEN 
//INICIA EVENTO PARA AGREGAR UN NUEVO INSUMO A LA ORDEN SELECCIONADA
$('#btn_nuevo_insumo').click(function(){
	var folio_orden_insumo = $('#folio_orden_insumo').val();
	var fecha_insumo       = $('#fecha_insumo').val();
	var insumo             = $('#insumo_nuevo_input').val();
	var precio_unitario	   = $('#precio_unitario').val();
	var cantidad_insumo	   = $('#cantidad_insumo').val();
	var importe_insumo	   = $('#importe_insumo').val();
	var total_nuevo_insummo = parseFloat(importe_insumo);

	if(folio_orden_insumo==''||fecha_insumo==''||insumo==''||precio_unitario==''||cantidad_insumo==''||importe_insumo=='')
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
		 $.ajax({
	            type:'POST',
	            url:'crud_orden_compra/obtener_totales.php',
	            dataType: "json",
	            data:{id_orden:folio_orden_insumo},
	            success:function(data){
		            if(data.status == 'ok'){                
		                var folio_orden    = data.result.folio;
		                var subtotal_orden = data.result.subtotal;
		                var iva_orden      = data.result.iva;
		                var total_orden    = data.result.total;
		                //valos totales para actualizar en la orden de compra
		                var total_subtotal    = parseFloat(subtotal_orden) + total_nuevo_insummo;
		                var total_iva         = parseFloat(total_subtotal) * 0.16;	
		                var total_final_orden = total_subtotal + total_iva;
		                console.log(total_subtotal);
		                console.log(total_iva);
		                console.log(total_final_orden);	                
		                //inicia ajax para ingresar insumo y actualizar orden de compra
		                $.ajax
							({
								url: 'crud_orden_compra/agregar_insumo.php',
								data: {
									"folio_orden_insumo" : folio_orden_insumo,
									"fecha_insumo"       : fecha_insumo,
									"insumo"             : insumo,
									"precio_unitario"    : precio_unitario,
									"cantidad_insumo"    : cantidad_insumo,
									"importe_insumo"     : importe_insumo,
									"total_subtotal"     : total_subtotal,
									"total_iva"			 : total_iva,
									"total_final_orden"  : total_final_orden
								},
								type: 'post',
								success: function(result)
								{ 
									M.toast({html: result, classes: 'rounded'}); 
									window.location.reload();
								}
							});            
					    }
		                //Termina ajax para actualizar orden de compra e ingresar insumos
		                //Iniciar Else para terminar el ajax de selecccionar los datos de la orden de compra
		                else{
		                //M.toast({html: 'Orden no encontrada', classes: 'rounded'}); 
		                swal({ 
  title: "Alerta!!!",		
  icon: "warning", 
  text: "ORDEN NO ENCONTRADA",
});
		            	}
	            }

	        })//Termina ajax principal de seleccionar datos de la orden de compra
	}
});     
//TERMINA EL EVENTO PARA AGREGAR UN NUEVO INSUMO A LA ORDEN SELECCIONADA
//INICIA EVENTO PARA ACTUALIZAR ESTATUS DE ORDEN
$('#a_aprobar_orden').click(function(){
	var bool=confirm($('#input_nombre_usuario').val()+ "¿Seguro que deseas autorizar la orden de compra? Foilo "+ $('#input_orden_estatus').val());
    if(bool){
	    var folio_orden_estatus = $('#input_orden_estatus').val();
		var fecha_estatus       = $('#fecha_estatus').val();
		var nombre_usuario      = $('#input_nombre_usuario').val();

		if(folio_orden_estatus==''||fecha_estatus==''||nombre_usuario=='')
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
						url: 'crud_orden_compra/aprobar_orden.php',
						data: {
							"folio_orden_estatus" : folio_orden_estatus,
							"fecha_estatus"       : fecha_estatus,
							"nombre_usuario"      : nombre_usuario
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
    	alert("Solicitud Cancelada");
    }
});
//TERMINA EL EVENTO PARA ACTUALIZAR ESTATUS DE ORDEN
//INICIA EVENTO PARA ACTUALIZAR ESTATUS DE ORDEN a CANCELADA
$('#a_cancelar_orden').click(function(){
	$('#row_registrar_compras').hide();
	$('#row_regresar_pedido').hide();
	$('#row_cancelar_orden').show();
});
//TERMINA EL EVENTO PARA ACTUALIZAR ESTATUS DE ORDEN A CANCELADA
//INICIA EVENTO PARA ACTUALIZAR ESTATUS DE ORDEN A COMPRA
$('#a_registrar_orden').click(function(){
	$('#row_cancelar_orden').hide();
	$('#row_regresar_pedido').hide();
	$('#row_registrar_compras').show();
});
//TERMINA EL EVENTO PARA ACTUALIZAR ESTATUS DE ORDEN A COMPRA
//INICIA BOTON DE CONTINUAR COMPRA
$('#a_registrar_compra_continuar').click(function(){
	var bool=confirm($('#input_nombre_usuario').val()+ "¿Seguro que deseas registrar la compra de la orden? Foilo "+ $('#input_orden_estatus').val());
    if(bool){
	    var folio_orden_estatus = $('#input_orden_estatus').val();
		var fecha_estatus       = $('#fecha_estatus').val();
		var nombre_usuario      = $('#input_nombre_usuario').val();
		var importe_compra		= $('#compra_importe_final').val();
		var ref_factura			= $('#compra_ref_factura').val();
		var comentarios         = $('#compra_comentarios').val();

		if(folio_orden_estatus==''||fecha_estatus==''||nombre_usuario==''||importe_compra == '' || ref_factura == '')
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
			$.ajax({
	            type:'POST',
	            url:'crud_orden_compra/obtener_totales_folio.php',
	            dataType: "json",
	            data:{id_orden:folio_orden_estatus},
	            success:function(data){
		            if(data.status == 'ok'){                
		                var folio_orden    = data.result.folio;
		                var subtotal_orden = data.result.subtotal;
		                var iva_orden      = data.result.iva;
		                var total_orden    = data.result.total; 
		                var proveedor      = data.result.nombre;           
		                //inicia ajax para registrar la compra y actualizar el estatus de la orden de compra
		                 $.ajax
							({
								url: 'crud_orden_compra/registrar_compra.php',
								data: {
									"folio_orden_estatus" : folio_orden_estatus,
									"fecha_estatus"       : fecha_estatus,
									"nombre_usuario"      : nombre_usuario,
									"subtotal_orden"	  : subtotal_orden,
									"iva_orden"			  : iva_orden,
									"total_orden"		  : total_orden,
									"importe_compra"	  : importe_compra,
									"factura"			  : ref_factura,
									"comentarios"		  : comentarios,
									"proveedor"			  : proveedor
								},
								type: 'post',
								success: function(data)
								{ 
									M.toast({html: data, classes: 'rounded'}); 
									window.location.reload();
								}
							});     
					    }
		                //Termina ajax para actualizar orden de compra e ingresar insumos
		                //Iniciar Else para terminar el ajax de selecccionar los datos de la orden de compra
		                else{
		                //M.toast({html: 'Orden no encontrada', classes: 'rounded'}); 
		                swal({ 
  title: "Alerta!!!",		
  icon: "warning", 
  text: "ORDEN NO ENCONTRADA",
});
		            	}
	            }

	        })//Termina ajax principal de seleccionar datos de la orden de compra       
		        //inicia ajax para ingresar insumo y actualizar orden de compra
		                
   			}
    }
    else{
    	alert("Solicitud Cancelada");
    }
});
//TERMINA BOTON DE CONTINUAR COMPRA
//INICIA BOTON DE CONTINUAR CANCELAR
$('#a_cancelar_orden_continuar').click(function(){
	var bool=confirm($('#input_nombre_usuario').val()+ "¿Seguro que deseas cancelar la orden de compra? Foilo "+ $('#input_orden_estatus').val());
    if(bool){
	    var folio_orden_estatus = $('#input_orden_estatus').val();
		var fecha_estatus       = $('#fecha_estatus').val();
		var nombre_usuario      = $('#input_nombre_usuario').val();
		var reporte				= $('#reporte_cancelacion').val();

		if( folio_orden_estatus == '' || fecha_estatus == '' || nombre_usuario == '' || reporte == '' )
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
						url: 'crud_orden_compra/cancelar_orden.php',
						data: {
							"folio_orden_estatus" : folio_orden_estatus,
							"fecha_estatus"       : fecha_estatus,
							"nombre_usuario"      : nombre_usuario,
							"reporte"			  : reporte
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
    	alert("Solicitud Cancelada");
    }
});
//TERMINA BOTON DE CONTINUAR CANCELAR
//INICIAR BOTON PARA REGRESAR A PEDIDO UNA ORDEN
$('#a_pedido_orden_continuar').click(function(){
	var bool=confirm($('#input_nombre_usuario').val()+ "¿Seguro que deseas regresar a PEDIDO la orden de compra? Foilo "+ $('#input_orden_estatus').val());
    if(bool){
	    var folio_orden_estatus = $('#input_orden_estatus').val();
		var fecha_estatus       = $('#fecha_estatus').val();
		var nombre_usuario      = $('#input_nombre_usuario').val();
		var reporte				= $('#reporte_pedido').val();

		if( folio_orden_estatus == '' || fecha_estatus == '' || nombre_usuario == '' || reporte == '' )
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
						url: 'crud_orden_compra/pedido_orden.php',
						data: {
							"folio_orden_estatus" : folio_orden_estatus,
							"fecha_estatus"       : fecha_estatus,
							"nombre_usuario"      : nombre_usuario,
							"reporte"			  : reporte
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
    	alert("Solicitud Cancelada");
    }
});
//TERMINA EL BOTON PARA REGRESAR A PEDIDO UNA ORDEN
//INICIA BOTON PARA REGRESAR A PEDIDO LAS ORDENES ACEPTADAS
$('#a_pedido_orden').click(function(){
	$('#row_cancelar_orden').hide();	
	$('#row_registrar_compras').hide();
	$('#row_regresar_pedido').show();
});
//TOOLTIP
 $('.tooltipped').tooltip();
//TOOLTIP 
$("body").on("click",".edit",function(event){
   $('#stock').Tabledit({
        deleteButton: false,
        editButton: true,          
        columns: {
          identifier: [0, 'id'],                    
          editable: [[4, 'cantidad']]
        },
        hideIdentifier: true,
        url: 'crud_orden_compra/editar.php'        
    }); 
    });

});
function agregar_stock(nombre,id_orden,cantidad,id){
	alert('Nombre Insumo: '+nombre+' ID ORDEN: '+id_orden+ ' Cantida de Insumos: '+cantidad);
	var insumo = nombre;
	alert(insumo);
	var stock_precio_unitario   = $('#stock_precio_unitario_'+id).val();
	var stock_cantidad 			= $('#stock_cantidad_'+id).val();
	var stock_importe  			= $('#stock_importe_'+id).val();

	if(stock_precio_unitario == '' || stock_cantidad == '' || stock_importe == '' || nombre == '' || id_orden == '' || cantidad == ''){
		//M.toast({html: 'Error, llenar todos los campos para continuar', classes: 'rounded'}); 
		swal({ 
  title: "Alerta!!!",		
  icon: "warning", 
  text: "Por favor llene los campos!!!",
});
	}
	else{

		$.ajax
					({
						url: 'crud_orden_compra/ingresar_stock.php',
						data: {
							"id_orden" 		  : id_orden,
							"nombre_insumo"   : nombre,
							"cantidad_insumo" : cantidad,
							"precio_unitario" : stock_precio_unitario,
							"stock_cantidad"  : stock_cantidad,
							"stock_importe"	  : stock_importe
						},
						type: 'post',
						success: function(data)
						{ 
							M.toast({html: data, classes: 'rounded'}); 
							window.location.reload();
						}
					});
		alert(stock_precio_unitario+' '+stock_cantidad+' '+stock_importe);
	}
}