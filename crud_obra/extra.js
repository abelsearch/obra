$(document).ready(function(){

//MODAL 
$( "#trigger2" ).click(function(){ 
$('#modal3').modal();
$('#modal3').modal('open');
});
$( "#cancel" ).click(function(){
$('#modal3').modal();
$('#modal3').modal('close');
}); 
//MODAL        


//MODAL SERVICIO
$( "#nuevoe" ).click(function(){ 
$('#modal2').modal();
$('#modal2').modal('open');
});
$( "#cancel" ).click(function(){
$('#modal2').modal();
$('#modal2').modal('close');
}); 
//MODAL SERVICIO 


//SELECCIONAR SERVICIO 
//var mydropdown4 = document.getElementById('serv3');
//var costo2 = document.getElementById('costo2');    
//mydropdown4.onchange=function(){   
//costo2.value=mydropdown4.options[mydropdown4.selectedIndex].id;
//} 
//SELECCIONAR SERVICIO 


//AGREGAR EXTRA
$('#enviar3').click(function(){ 
var e_folio = document.getElementById('folio');
var e_descripcion = document.getElementById('serv3');  
var e_precio = document.getElementById('costo2');    
var e_fecha = document.getElementById('fecha');  
var e_hora = document.getElementById('hora');   
var e_reporte = document.getElementById('reporte_extra'); 
var e_usuario = document.getElementById('usuario');
var folio = (e_folio.value); 
var descripcion = (e_descripcion.value); 
var precio = (e_precio.value);   
var fecha = (e_fecha.value); 
var hora = (e_hora.value); 
var reporte = (e_reporte.value);  
var usuario = (e_usuario.value); 
if(reporte=='')
{
alert("Por favor llene el REPORTE!!!");
} 
else
{
$.ajax
({
url: 'extra.php',
data: {"folio":folio, "descripcion": descripcion, "precio": precio, "fecha": fecha, "hora": hora, "reporte":reporte, "usuario":usuario},
type: 'post',
success: function(result)
{
window.location.reload()
}
}); 
}
});
//AGREGAR EXTRA 

});