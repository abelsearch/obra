$(document).ready(function(){

//MODAL 
$( "#trigger7" ).click(function(){ 
$('#modal7').modal();
$('#modal7').modal('open');
});
$( "#cancel" ).click(function(){
$('#modal7').modal();
$('#modal7').modal('close');
}); 
//MODAL        

//MODAL SERVICIO
$( "#nuevos" ).click(function(){ 
$('#modal2').modal();
$('#modal2').modal('open');
});
$( "#cancel" ).click(function(){
$('#modal2').modal();
$('#modal2').modal('close');
}); 
//MODAL SERVICIO        


//SELECCIONAR SERVICIO 
//var mydropdown9 = document.getElementById('serv9');
//var costo = document.getElementById('costos');    
//mydropdown9.onchange=function(){   
//costo.value=mydropdown9.options[mydropdown3.selectedIndex].id;
//} 
//SELECCIONAR SERVICIO 


//AGREGAR ADICIONAL 
$('#enviar9').click(function(){ 
var a_folio = document.getElementById('folio');
var a_descripcion = document.getElementById('serv2');  
var a_precio = document.getElementById('costo');   
var a_fecha = document.getElementById('fecha');  
var a_hora = document.getElementById('hora');   
var a_reporte = document.getElementById('reporte_adicional'); 
var a_usuario = document.getElementById('usuario');
var folio = (a_folio.value); 
var descripcion = (a_descripcion.value); 
var precio = (a_precio.value);  
var fecha = (a_fecha.value); 
var hora = (a_hora.value); 
var reporte = (a_reporte.value);  
var usuario = (a_usuario.value); 

if(reporte=='')
{
alert("Por favor llene el REPORTE!!!");
} 
else
{
$.ajax
({
url: 'servicio.php',
data: {"folio":folio, "descripcion": descripcion, "precio": precio, "fecha": fecha, "hora": hora, "reporte":reporte, "usuario":usuario},
type: 'post',
success: function(result)
{
window.location.reload()
}
}); 
}
}); 
//AGREGAR ADICIONAL           


//AGREGAR SERVICIO 
$('#enviar_serv').click(function(){
var s_clave_sat = document.getElementById('clave_sat');
var s_clave_interna = document.getElementById('clave_interna');
var s_descripcion = document.getElementById('descripcion'); 
var s_precio = document.getElementById('precio');
var s_medida = document.getElementById('medida');
var clave_sat =(s_clave_sat.value);
var clave_interna =(s_clave_interna.value); 
var descripcion =(s_descripcion.value); 
var precio =(s_precio.value);
var medida =(s_medida.value); 
if(clave_sat==''||clave_interna==''||descripcion==''||precio==''||medida=='')
{
alert("Por favor llene los campos!!!");
} 
else
{      
$.ajax
({
url: '../crud_catalogo/crear.php',
data: {"clave_sat": clave_sat, "clave_interna": clave_interna, "descripcion": descripcion, "precio": precio ,"medida": medida},
type: 'post',
success: function(result)
{
window.location.reload()
}
});
}
});
//AGREGAR SERVICIO    

}); 