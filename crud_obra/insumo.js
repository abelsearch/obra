$(document).ready(function(){ 

//CONTROL DE INSUMOS OPERADOR
$('#loading').hide();
$("#btn-ins2").click(function(){ 
var folio = document.getElementById('c_folio');
var id =(folio.value); 
window.location.href='insumo_op.php?id='+id;
}); 
//CONTROL DE INSUMOS OPERADOR 


//MODAL3 
$( "#trigger3" ).click(function(){  
$('#modal1').modal();
$('#modal1').modal('close');
$('#modal3').modal();
$('#modal3').modal('open');
});
//MODAL3       

    
//AGREGAR INSUMO 
$('#lista').click(function(){ 
	var folio  = $('#folio').val();
	var insumo	 = $('#insumo').val(); 
	var nombre	 = $('#nombre').val();
	var unidad	 = $('#unidad').val(); 
	var cantidad  = $('#cantidad').val();
	var semana  = $('#semana').val();
	var fecha	 = $('#fecha').val();
	var hora	 = $('#hora').val(); 
	var usuario	 = $('#usuario').val(); 
	var stock	 = $('#stock').val();
if(unidad==''||cantidad==''||cantidad== 0||semana=='')
{
swal({ 
  title: "Alerta!!!",		
  icon: "warning", 
  text: "Por favor llene los campos!!!",
});
} 
else
{
if(stock<cantidad)
{
swal({ 
  title: "Alerta!!!",		
  icon: "warning", 
  text: "No hay suficiente!!!",
});
} 
else
{
$.ajax
({
url: 'crear_insumo.php',
data: {"folio":folio, "insumo":insumo, "nombre":nombre, "unidad":unidad, "cantidad":cantidad, "semana":semana, "fecha":fecha, "hora":hora,  "usuario":usuario},
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

//INFO DROPDOWN
var con_dropdown = document.getElementById('insumo');
var nombre = document.getElementById('nombre');
var stock = document.getElementById('stock');
var unidad = document.getElementById('unidad');
con_dropdown.onchange=function(){   
nombre.value=con_dropdown.options[con_dropdown.selectedIndex].text;
stock.value=$(this).find('option:selected').attr("data-s");
unidad.value=$(this).find('option:selected').attr("data-u");
}  
//INFO DROPDOWN


//ACEPTAR INSUMO
$(".aceptar").click(function()
{
var id = $(this).attr("id");
var ace_id = id; 
 swal({
  title: 'Aceptar?',
  text: "Al aceptar no podrá volver a editar este insumo!!!",
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
$.post('aceptar.php', {'ace_id':ace_id}, function(data){	
  swal(
    'Aceptado!!!',
    'El elemento se aceptó',
    'success'
  ); 
  //window.location.reload(); 
      window.setTimeout(function(){window.location.reload()}, 2000);
}); 
} 
else {
        swal("Cancelado", "Se canceló la operación", "error");
      }
});
return false;
});
//ACEPTAR INSUMO 


//RE-EDITAR INSUMO ADMINISTRADOR
$(".admin").click(function()
{
var id = $(this).attr("id");
var edit_id = id;  
 swal({
  title: 'Editar?',
  text: "Desea volver a EDITAR este insumo?",
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
$.post('reditar.php', {'edit_id':edit_id}, function(data){	
  swal(
    'Hecho!!!',
    'El elemento esta disponible para edición',
    'success'
  ); 
  //window.location.reload(); 
      window.setTimeout(function(){window.location.reload()}, 2000);
}); 
} 
else {
        swal("Cancelado", "Se canceló la eliminación", "error");
      }
});
return false;
}); 
//RE-EDITAR INSUMO 


//RE-EDITAR INSUMO OPERADOR
$(".op").click(function()
{
var id = $(this).attr("id");
var edit_id = id; 
var clave=prompt("Introduzca la clave de permiso:");
if (clave == null) 
{
window.location.reload();
} 
else 
{  
$.post('clave.php', {"edit_id":edit_id, "clave":clave}, function(data)
{ 
window.location.reload();
}); 	
}
return false;
}); 
//RE-EDITAR INSUMO OPERADOR 

//CREAR      
$('#enviarN').click(function(){  
	var nombre  = $('#Nnombre').val();
	var unidad	 = $('#Nunidad').val();
	var saldo	 = $('#Nsaldo').val();
	var fecha	 = $('#Nfecha').val(); 
if(nombre==''||unidad==''||saldo=='')
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
url: '../crud_insumo/crear.php',
data: {"nombre": nombre, "unidad": unidad, "saldo": saldo, "fecha": fecha},
type: 'post',
success: function(result)
{
window.location.reload()
}
});
} 
});
//CREAR 

//
});