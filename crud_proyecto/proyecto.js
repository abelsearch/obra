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
var emp           = $('#empresa').val();
var nombre        = $('#nombre').val();
var fecha           = $('#fecha').val();  
var usuario         = $('#usuario').val();
  
if(emp==''||nombre==''||fecha==''||usuario=='')
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
		url: 'crud_proyecto/crear.php',
		data: {
			"emp"           : emp,
			"nombre"        : nombre,
			"fecha"           : fecha, 
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

//MODAL 2        
$('.trigger').click(function(){
var id = $(this).attr("id");
var edit_id = id;
$.ajax({
url: 'crud_proyecto/editar.php',
type: 'post',
data: {edit_id: edit_id},
success: function(response){ 
$('.modal-content2').html(response);
$('#modal2').modal(); 
$('#modal2').modal('open');
}
});
});
//MODAL 2 

//Obra
$('#enviar2').click(function(){
var id  = $('#2id').val();
var rango  = $('#rango').val(); 
var modelo  = $('#modelo').val();
var fecha  = $('#fecha').val(); 
var hora  = $('#hora').val();
var folio  = $('#folio').val(); 
var cliente  = $('#cliente').val();
var semana  = $('#semana').val(); 
var presupuesto  = $('#presupuesto').val();
var entidad  = $('#entidad').val(); 
var ciudad  = $('#ciudad').val();

if(rango=='')
{
swal({ 
  title: "Alerta!!!",		
  icon: "warning", 
  text: "Por favor escriba un número de obras!!!",
});
} 
else
{              
$.ajax
({
url: 'crud_proyecto/crear_obra.php',
data: {"id":id, "rango":rango, "modelo":modelo, "fecha":fecha, "hora":hora, "folio":folio, "cliente":cliente,
"semana":semana, "presupuesto":presupuesto, "entidad":entidad, "ciudad":ciudad},
type: 'post',
success: function(result)
{
window.location.reload()
}
});
}
});
//EDITAR        


/**       
$('.ver').click(function(){
var id = $(this).attr("id");
var ver_id = id;
$.ajax({
url: 'crud_proyecto/ver.php',
type: 'post',
data: {ver_id: ver_id},
success: function(response){ 
$('.modal-content3').html(response);
$('#modal3').modal(); 
$('#modal3').modal('open');
}
});
});
 

$(".ve").click(function(){
var id = $(this).attr("id");
var ver_id = id; 
window.location.href="crud_proyecto/ver.php?ver_id="+ver_id; 
return false;
}); 
**/


//IR 
$(".ir").click(function(){
var id = $(this).attr("id");
var ver_id = id; 
window.location.href="crud_obra/ver_obra.php?ver_id="+ver_id; 
return false;
}); 
//IR


//TOOLTIP
 $('.tooltipped').tooltip();
//TOOLTIP
});	