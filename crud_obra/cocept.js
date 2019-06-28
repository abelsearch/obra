$(document).ready(function(){ 

    
//AGREGAR CONCEPTO
$('#concept_crear').click(function(){ 
var c_folio = document.getElementById('folio');
var c_descripcion = document.getElementById('descripcion');  
var c_unidad = document.getElementById('unidad');  
var c_cantidad = document.getElementById('cantidad');
var c_precio = document.getElementById('precio');  
var c_semana = document.getElementById('semana');
var c_fecha = document.getElementById('fecha');
var c_hora = document.getElementById('hora');    
var c_usuario = document.getElementById('usuario');
var folio = (c_folio.value); 
var descripcion = (c_descripcion.value); 
var unidad = (c_unidad.value);  
var cantidad = (c_cantidad.value);  
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
url: 'crear_concepto.php',
data: {"folio":folio, "descripcion":descripcion, "unidad":unidad, "cantidad":cantidad, "precio":precio, "semana":semana, "fecha":fecha, "hora":hora, "usuario":usuario},
type: 'post',
success: function(result)
{
window.location.reload()
}
}); 
}
}); 
//AGREGAR CONCEPTO            

//BTN REGRESAR 
$("#btn-back").click(function(){
$("body").fadeOut('fast',function()
{ 
window.history.back();	 
});
});  
//BTN REGRESAR 
        


});