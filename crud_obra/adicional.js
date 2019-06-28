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


//INFO SERVICIO    
//var adi_mydropdown = document.getElementById('descripcion'); 
//var precio = document.getElementById('precio');
//adi_mydropdown.onchange=function(){   
//precio.value=adi_mydropdown.options[adi_mydropdown.selectedIndex].id;
//}  
//INFO SERVICIO        



//AGREGAR ADICIONAL 
$('#crear').click(function(){ 
var c_folio = document.getElementById('folio');
var c_descripcion = document.getElementById('descripcion');  
var c_precio = document.getElementById('precio');  
var c_semana = document.getElementById('semana');
var c_fecha = document.getElementById('fecha');
var c_hora = document.getElementById('hora');  
var c_usuario = document.getElementById('usuario');
var folio = (c_folio.value); 
var descripcion = (c_descripcion.value); 
var precio = (c_precio.value);  
var semana = (c_semana.value);
var fecha = (c_fecha.value); 
var hora = (c_hora.value);  
var usuario = (c_usuario.value);
if(descripcion==''||precio=='')
{
alert("Por favor llene los campos!!!");
} 
else
{
$.ajax
({
url: 'crear_adicional.php',
data: {"folio":folio, "descripcion":descripcion, "precio":precio, "semana":semana, "fecha":fecha, "hora":hora, "usuario":usuario},
type: 'post',
success: function(result)
{
window.location.reload()
}
}); 
}
}); 
//AGREGAR ADICIONAL           

//BTN REGRESAR 
$("#btn-back").click(function(){
$("body").fadeOut('fast',function()
{ 
window.history.back();	 
});
});  
//BTN REGRESAR 



}); 