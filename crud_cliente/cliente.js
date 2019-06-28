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

//CREAR
$('#enviar').click(function(){
var razon_social  = $('#razon_social').val();
var nombre_comercial  = $('#nombre_comercial').val();
var rfc	 = $('#rfc').val();	
var calle	 = $('#calle').val();
var colonia  = $('#colonia').val();
var numero  = $('#numero').val();
var codigo_postal	 = $('#codigo_postal').val();	
var ciudad	 = $('#ciudad').val();
var estado  = $('#estado').val();
var telefono  = $('#telefono').val();
var nombre_contacto	 = $('#nombre_contacto').val();	
var correo	 = $('#correo').val();	
var fecha	 = $('#fecha').val();
if(razon_social==''||nombre_comercial==''||rfc==''||calle==''||colonia==''||numero==''||codigo_postal==''||ciudad==''||estado==''||telefono==''||nombre_contacto==''||correo=='')
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
url: 'crud_cliente/crear.php',
data: {"razon_social": razon_social, "nombre_comercial": nombre_comercial, "rfc": rfc, "calle": calle, "colonia": colonia ,"numero": numero, "codigo_postal":codigo_postal,"ciudad":ciudad,"estado":estado,"telefono":telefono,"nombre_contacto":nombre_contacto,"correo":correo},
type: 'post',
success: function(result)
{
window.location.reload();
}
});
}
});
//CREAR

//MODAL 2
$('.editar').click(function(){
var id = $(this).attr("id");
var edit_id = id;
$.ajax({
url: 'crud_cliente/editar_cliente.php',
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

//EDITAR
$('#enviar2').click(function(){ 
var id  = $('#id2').val();
var razon_social  = $('#razon_social2').val();
var nombre_comercial  = $('#nombre_comercial2').val();
var rfc	 = $('#rfc2').val();	
var calle	 = $('#calle2').val();
var colonia  = $('#colonia2').val();
var numero  = $('#numero2').val();
var codigo_postal	 = $('#codigo_postal2').val();	
var ciudad	 = $('#ciudad2').val();
var estado  = $('#estado2').val();
var telefono  = $('#telefono2').val();
var nombre_contacto	 = $('#nombre_contacto2').val();	
var correo	 = $('#correo2').val();	
if(id==''||razon_social==''||nombre_comercial==''||rfc==''||calle==''||colonia==''||numero==''||codigo_postal==''||ciudad==''||estado==''||telefono==''||nombre_contacto==''||correo=='')
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
url: 'crud_cliente/editar.php',
data: {"id": id, "razon_social": razon_social, "nombre_comercial": nombre_comercial, "rfc": rfc, "calle": calle, "colonia": colonia ,"numero": numero, "codigo_postal":codigo_postal,"ciudad":ciudad,"estado":estado,"telefono":telefono,"nombre_contacto":nombre_contacto,"correo":correo},
type: 'post',
success: function(result)
{
window.location.reload()
}
});
}
});
//EDITAR

//MODAL 3
$('.ver').click(function(){
var id = $(this).attr("id");
var ver_id = id;
$.ajax({
url: 'crud_cliente/ver.php',
type: 'post',
data: {ver_id: ver_id},
success: function(response){
$('.modal-content3').html(response);
$('#modal3').modal();
$('#modal3').modal('open');
}
});
});
//MODAL 3

//ELIMINAR
$(".eliminar").click(function()
{
var id = $(this).attr("id");
var del_id = id;
swal({
  title: 'Eliminar?',
  text: "El elemento seleccionado se eliminará!!!",
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
$.post('crud_cliente/eliminar.php', {'del_id':del_id}, function(data){	
  swal(
    'Eliminado!!!',
    'El elemento se eliminó',
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

//ELIMINAR
});