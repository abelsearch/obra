$(document).ready(function(){
//CONTROL DE INSUMOS
$('#loading').hide();
$("#btn-ins").click(function(){ 
var folio = document.getElementById('c_folio'); 
var id_modelo = document.getElementById('c_modelo');
var id =(folio.value);  
var id_modelo =(id_modelo.value); 
//window.location.href='insumo.php?id='+id; 
window.location.href='insumo.php?id='+id+"&id_modelo="+id_modelo;
}); 
//CONTROL DE INSUMOS 


//CONTROL DE CONCEPTOS
$('#con_loading').hide();
$("#btn-con").click(function(){ 
var folio = document.getElementById('c_folio');
var id_modelo = document.getElementById('c_modelo');
var id =(folio.value); 
var id_modelo =(id_modelo.value); 
window.location.href='concepto.php?id='+id+"&id_modelo="+id_modelo;
}); 
//CONTROL DE CONCEPTOS 


//CONTROL DE ESTIMACIONES
$('#con_loading').hide();
$("#btn-est").click(function(){ 
var folio = document.getElementById('c_folio'); 
var id_modelo = document.getElementById('c_modelo');
var id =(folio.value);  
var id_modelo =(id_modelo.value);
//window.location.href='estimacion.php?id='+id;
window.location.href='estimacion.php?id='+id+"&id_modelo="+id_modelo;
}); 
//CONTROL DE ESTIMACIONES 


//CONTROL DE CONCEPTOS ADICIONALES
$('#loading').hide();
$("#btn-adi").click(function(){ 
var folio = document.getElementById('c_folio'); 
var id_modelo = document.getElementById('c_modelo');
var id =(folio.value);  
var id_modelo =(id_modelo.value);
//window.location.href='http://seicolaguna.com/sistema/crud_obra/adicional.php?id='+id;
window.location.href='adicional.php?id='+id+"&id_modelo="+id_modelo;
}); 
//CONTROL DE CONCEPTOS ADICIONALES  

//CONTROL DE FLUJOS 
$('#loading').hide();
$("#btn-flu").click(function(){ 
var folio = document.getElementById('c_folio'); 
var id_modelo = document.getElementById('c_modelo');
var id =(folio.value);  
var id_modelo =(id_modelo.value);
//window.location.href='flujo.php?id='+id; 
window.location.href='flujo.php?id='+id+"&id_modelo="+id_modelo;
}); 
//CONTROL DE FLUJOS


//PÁGINA EVIDENCIA
$("#btn-evi").click(function(){ 
var folio = document.getElementById('c_folio'); 
var id_modelo = document.getElementById('c_modelo');
var id =(folio.value); 
var id_modelo =(id_modelo.value);
window.location.href='evidencia.php?id='+id+"&id_modelo="+id_modelo;
//window.location.href='evidencia.php?id='+id;
});  
//PÁGINA EVIDENCIA 


//PÁGINA AVANCES 
$("#btn-ava").click(function(){ 
var folio = document.getElementById('c_folio'); 
var id_modelo = document.getElementById('c_modelo');
var id =(folio.value); 
var id_modelo =(id_modelo.value); 
//window.location.href='avance.php?id='+id;
window.location.href='avance.php?id='+id+"&id_modelo="+id_modelo;
});  
//PÁGINA AVANCES

//
}); 