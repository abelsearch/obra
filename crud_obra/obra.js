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


//CREAR ORDEN 
$('#enviar').click(function(){
var proyecto        = $('#proyecto').val();
var folio           = $('#folio').val();
var contrato        = $('#contrato').val();
var titulo	        = $('#titulo').val();
var cliente         = $('#cliente').val();
var presupuesto     = $('#presupuesto').val(); 
var residente 	    = $('#residente').val();
var num_residente   = $('#numero_residente').val();
var contratista     = $('#contratista').val();
var num_contratista = $('#numero_contratista').val();
var estado 			= $('#estado').val();
var ciudad 			= $('#ciudad').val(); 
var zona 		    = $('#zona').val();
var lote			= $('#num_lote').val();
var reporte         = $('#reporte').val();
var semana          = $('#semana').val();
var fecha_inicio    = $('#fecha_inicio').val(); 
var fecha_fin       = $('#fecha_fin').val(); 
var fecha           = $('#fecha').val();  
var hora            = $('#hora').val();
var usuario         = $('#usuario').val();
  
if(proyecto==''||
	folio==''||
	contrato==''||
	titulo==''||
	cliente==''||
	presupuesto==''|| 
	residente==''|| 
	num_residente==''|| 
	contratista==''||
	num_contratista==''|| 
	estado==''|| 
	ciudad==''|| 
	zona==''|| 
	lote==''|| 
	reporte==''||
	semana==''||
	fecha_inicio==''||
	fecha_fin==''||
	fecha==''||
	hora==''||
	usuario=='')
{
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
		url: 'crud_obra/crear_obra.php',
		data: { 
			"proyecto"           : proyecto,
			"folio"           : folio,
			"contrato"        : contrato,
			"titulo"          : titulo,
			"cliente"         : cliente,			 
			"presupuesto"     : presupuesto,
			"residente"       : residente,
			"num_residente"   : num_residente,
			"contratista" 	  : contratista,
			"num_contratista" : num_contratista,
			"estado"          : estado,
			"ciudad"          : ciudad, 
			"zona"            : zona,
			"lote"            : lote,
			"reporte"         : reporte,
			"semana"          : semana,
			"fecha_inicio"    : fecha_inicio, 
			"fecha_fin"       : fecha_fin,
			"fecha"           : fecha, 
			"hora"            : hora,			 
			"usuario"         : usuario			
		},
		type: 'post',
		success: function(result)
		{ 
		window.location.reload()
		}
	});
}
});     
// CREAR ORDEN 


//EDITAR
$(".editar").click(function(){
var id = $(this).attr("id");
var edit_id = id; 
window.location.href="crud_obra/editar_obra.php?edit_id="+edit_id; 
return false;
});
//EDITAR 


//VER 
$(".ver").click(function(){
var id = $(this).attr("id");
var edit_id = id; 
window.location.href="crud_obra/ver_obra.php?edit_id="+edit_id; 
return false;
}); 
//VER


//GUEST 
$(".guest").click(function(){
var id = $(this).attr("id");
var edit_id = id; 
window.location.href="crud_obra/ver_obra_guest.php?edit_id="+edit_id; 
return false;
}); 
//GUEST


//CANCELAR 
$(".cancelar").click(function()
{
var id = $(this).attr("id");
var del_id = id;
swal({
  title: 'Cancelar?',
  text: "El elemento seleccionado se cancelará!!!",
  icon: "warning", 
  buttons: [
        'No!!!',
        'Sí, Estoy deacuerdo!!!'
      ], 
      dangerMode: true,
  //showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  //confirmButtonText: 'Eliminar'
}).then(function(isConfirm) {  
	if (isConfirm) {
$.post('crud_obra/cancelar.php', {'del_id':del_id}, function(data){	
  swal(
    'Cancelado!!!',
    'La obra se canceló',
    'success'
  ); 
  //window.location.reload(); 
      window.setTimeout(function(){window.location.reload()}, 2000);
}); 
} 
else {
        swal("AVISO", "Cancelación Interrumpida", "error");
      }
});

return false;
});
//CANCELAR 


//REHACER
$(".rehacer").click(function()
{
var id = $(this).attr("id");
var del_id = id;
swal({
  title: 'Rehacer?',
  text: "El elemento seleccionado se rehará!!!",
  icon: "warning", 
  buttons: [
        'No, Cancelar!!!',
        'Sí, Estoy deacuerdo!!!'
      ], 
      dangerMode: true,
  //showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  //confirmButtonText: 'Eliminar'
}).then(function(isConfirm) {  
	if (isConfirm) {
$.post('crud_obra/aprobar.php', {'del_id':del_id}, function(data){	
  swal(
    'Hecho!!!',
    'El elemento se restauró',
    'success'
  ); 
  //window.location.reload(); 
      window.setTimeout(function(){window.location.reload()}, 2000);
}); 
} 
else {
        swal("AVISO", "Se canceló la restauración", "error");
      }
});

return false;
});
//REHACER


//TOOLTIP
 $('.tooltipped').tooltip();
//TOOLTIP
});	