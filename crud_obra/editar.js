$(document).ready(function(){ 
/*
//MODAL
$( "#btnE" ).click(function(){ 
$('#modal1').modal();
$('#modal1').modal('open');
});
$( "#cancel" ).click(function(){
$('#modal1').modal();
$('#modal1').modal('close');
});
//MODAL        

//MODAL
$( "#btnP" ).click(function(){ 
$('#modal2').modal();
$('#modal2').modal('open');
});
$( "#cancel" ).click(function(){
$('#modal2').modal();
$('#modal2').modal('close');
});
//MODAL        
*/

//FINALIZAR ORDEN 
$('#finalizar').click(function(){ 
if(confirm('Finalizar?'))
{
var f_folio = document.getElementById('c_folio');
var folio =(f_folio.value); 
$.ajax
({
url: 'finalizar.php',
data: {"folio":folio},
type: 'post',
success: function(result)
{
window.location.reload()
}
});
}
}); 
//FINALIZAR ORDEN 


//SELECCIONAR CLIENTE 
//var edi_mydropdown = document.getElementById('cli');
//var cliente = document.getElementById('cliente');    
//edi_mydropdown.onchange=function(){   
//cliente.value=edi_mydropdown.options[edi_mydropdown.selectedIndex].value;
//} 
//SELECCIONAR CLIENTE 



//EDITAR 
//AGREGAR INSUMO 
$('#ed_cli').click(function(){  
if(confirm('Editar?'))
{	
var e_folio_orden = document.getElementById('c_folio');
var e_cliente = document.getElementById('cliente');  
var e_fecha = document.getElementById('fecha');  
var e_hora = document.getElementById('hora');
var e_usuario = document.getElementById('usuario');
var e_reporte = document.getElementById('reporte');
var folio_orden = (e_folio_orden.value); 
var cliente = (e_cliente.value); 
var fecha = (e_fecha.value); 
var hora = (e_hora.value);  
var usuario = (e_usuario.value); 
var reporte = (e_reporte.value);
if(cliente=='')
{
alert("Por favor seleccione un cliente!!!");
} 
else
{
$.ajax
({
url: 'editar.php',
data: {"folio_orden":folio_orden, "cliente":cliente,"fecha":fecha, "hora":hora,"usuario":usuario,"reporte":reporte},
type: 'post',
success: function(result)
{
window.location.reload()
}
}); 
} 
}
}); 
//AGREGAR INSUMO        






























/**var e_id = document.getElementById('c_id'); 
var e_folio = document.getElementById('c_folio');
var e_cliente = document.getElementById('cliente');
var e_presupuesto = document.getElementById('c_pres');  
var e_fecha = document.getElementById('fecha'); 
var e_hora = document.getElementById('hora'); 
var e_reporte = document.getElementById('reporte'); 
var e_usuario = document.getElementById('usuario');
var id =(e_id.value); 
var folio =(e_folio.value); 
var cliente =(e_cliente.value); 
var presupuesto =(e_presupuesto.value);  
var fecha =(e_fecha.value);  
var hora =(e_hora.value); 
var reporte =(e_reporte.value);  
var usuario =(e_usuario.value);  
if(reporte=='')
{
alert("Por favor llene el reporte!!!");
}
else
{
$.ajax
({
url: 'editar.php',
data: {"id":id, "folio":folio, "cliente": cliente, "presupuesto": presupuesto, 
"fecha":fecha, "hora":hora, "reporte":reporte, "usuario":usuario},
type: 'post',
success: function(result)
{
window.location.reload()
}
}); 
}**/
//});
//EDITAR 

/*
//SUMAR 
$('#sumar').click(function(){
var s_id = document.getElementById('id'); 
var s_folio = document.getElementById('c_folio');
var s_cantidad = document.getElementById('cantidad');  
var s_fecha = document.getElementById('fecha'); 
var s_hora = document.getElementById('hora'); 
var s_reporte = document.getElementById('reporte_pre'); 
var s_usuario = document.getElementById('usuario');
var id =(s_id.value); 
var folio =(s_folio.value); 
var cantidad =(s_cantidad.value);  
var fecha =(s_fecha.value);  
var hora =(s_hora.value); 
var reporte =(s_reporte.value);  
var usuario =(s_usuario.value);  
if(cantidad==''||reporte=='')
{
alert("Por favor llene los campos!!!");
}
else
{
$.ajax
({
url: 'suma.php',
data: {"id":id, "folio":folio,"cantidad":cantidad,"fecha":fecha,"hora":hora,"reporte":reporte,"usuario":usuario},
type: 'post',
success: function(result)
{
window.location.reload()
}
}); 
}
});
//SUMAR 


//RESTAR 
$('#restar').click(function(){
var s_id = document.getElementById('id'); 
var s_folio = document.getElementById('c_folio');
var s_cantidad = document.getElementById('cantidad');  
var s_fecha = document.getElementById('fecha'); 
var s_hora = document.getElementById('hora'); 
var s_reporte = document.getElementById('reporte_pre'); 
var s_usuario = document.getElementById('usuario');
var id =(s_id.value); 
var folio =(s_folio.value); 
var cantidad =(s_cantidad.value);  
var fecha =(s_fecha.value);  
var hora =(s_hora.value); 
var reporte =(s_reporte.value);  
var usuario =(s_usuario.value);  
if(presupuesto==''||reporte=='')
{
alert("Por favor llene los campos!!!");
}
else
{
$.ajax
({
url: 'resta.php',
data: {"id":id, "folio":folio,"cantidad":cantidad,"fecha":fecha,"hora":hora,"reporte":reporte,"usuario":usuario},
type: 'post',
success: function(result)
{
window.location.reload()
}
}); 
}
});
//RESTAR 
*/

});