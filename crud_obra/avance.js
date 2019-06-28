$(document).ready(function(){ 
//PÁGINA AVANCES 
//$("#btn-ava").click(function(){ 
//var folio = document.getElementById('c_folio');
//var id =(folio.value); 
//window.location.href='avance.php?id='+id;
//});  
//PÁGINA AVANCES 

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

//AGREGAR SERVICIO 
$('#ava_crear').click(function(){
var c_folio = document.getElementById('folio');
var c_semanas = document.getElementById('num_semana');
var c_fecha_inicio = document.getElementById('fecha_inicio'); 
var c_fecha_fin = document.getElementById('fecha_fin');
var folio =(c_folio.value);
var num_semana =(c_semanas.value);
var fecha_inicio =(c_fecha_inicio.value);   
var fecha_fin =(c_fecha_fin.value);
if(num_semana=='')
{
alert("Por favor indique un numero de Semana!!!");
} 
else
{      
$.ajax
({
url: 'crear_semana.php',
data: {"folio":folio, "num_semana": num_semana, "fecha_inicio":fecha_inicio, "fecha_fin":fecha_fin},
type: 'post',
success: function(result)
{
window.location.reload()
}
});
}
});
//AGREGAR SERVICIO      

//GRAFICA CONCEPTOS
/*
var c_folio = document.getElementById('c_folio'); 
var id =(c_folio.value);
 $(document).ready(function() {
 $.ajax
({
url: 'http://seicolaguna.com/sistema/crud_obra/show2.php',
data: {"id":id},
type: 'post',
success: function(result)
{
//window.location.reload()
console.log('GOOD!!!');
}
});  
 });
 */
//GRAFICA CONCEPTOS      



















// 
});