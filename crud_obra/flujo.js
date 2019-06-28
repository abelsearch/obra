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


//CREAR FLUJO 
$('#crear_flux').click(function(){  
var c_folio = document.getElementById('folio');
var c_semana = document.getElementById('semana');
var c_tipo = document.getElementById('tipo');  
var c_descripcion = document.getElementById('descripcion');  
var c_cantidad = document.getElementById('cantidad');    
var c_fecha = document.getElementById('fecha');  
var c_hora = document.getElementById('hora');  
var c_usuario = document.getElementById('usuario');
var folio = (c_folio.value); 
var semana = (c_semana.value);
var tipo = (c_tipo.value); 
var descripcion = (c_descripcion.value);   
var cantidad = (c_cantidad.value);   
var fecha = (c_fecha.value); 
var hora = (c_hora.value);   
var usuario = (c_usuario.value);
if(tipo==''||descripcion==''||cantidad==''||semana=='')
{
alert("Por favor llene los campos!!!");
} 
else
{
$.ajax
({
url: 'crear_flujo.php',
data: {"folio":folio, "semana":semana, "tipo":tipo, "descripcion":descripcion, "cantidad":cantidad, "fecha":fecha, "hora":hora, "usuario":usuario},
type: 'post',
success: function(result)
{
window.location.reload()
}
}); 
}
}); 
//CREAR FLUJO

//BTN REGRESAR 
$("#btn-back").click(function(){
$("body").fadeOut('fast',function()
{ 
window.history.back();	 
});
});  
//BTN REGRESAR 


});