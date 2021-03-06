$(document).ready(function(){

//CREAR
$('#enviar').click(function(){
var rfc	 = $('#rfc').val();
var razon_social  = $('#razon_social').val();
var nombre  = $('#nombre').val();
var domicilio  = $('#domicilio').val();
var contacto	 = $('#contacto').val();		
var correo	 = $('#correo').val();	
var telefono  = $('#telefono').val();
var ciudad	 = $('#ciudad').val();
var estado  = $('#estado').val();
var estatus	 = $('#estatus').val();	
var fecha	 = $('#fecha').val();
if(rfc==''||razon_social==''||nombre==''||domicilio==''||contacto==''||correo==''||telefono==''||ciudad==''||estado==''||estatus=='')
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
url: 'crud_proveedor/crear.php',
data: {"rfc":rfc,"razon_social":razon_social,"nombre":nombre,"domicilio":domicilio,"contacto":contacto,"correo":correo,"telefono":telefono,"ciudad":ciudad,"estado":estado,"estatus":estatus,"fecha":fecha},
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
url: 'crud_proveedor/editar_proveedor.php',
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
var rfc	 = $('#rfc2').val();
var razon_social  = $('#razon_social2').val();
var nombre  = $('#nombre2').val();
var domicilio  = $('#domicilio2').val();
var contacto	 = $('#contacto2').val();		
var correo	 = $('#correo2').val();	
var telefono  = $('#telefono2').val();
var ciudad	 = $('#ciudad2').val();
var estado  = $('#estado2').val();
var estatus	 = $('#estatus2').val();	
if(id==''||rfc==''||razon_social==''||nombre==''||domicilio==''||contacto==''||correo==''||telefono==''||ciudad==''||estado==''||estatus=='')
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
url: 'crud_proveedor/editar.php',
data: {"id": id,"rfc":rfc,"razon_social":razon_social,"nombre":nombre,"domicilio":domicilio,"contacto":contacto,"correo":correo,"telefono":telefono,"ciudad":ciudad,"estado":estado,"estatus":estatus},
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
url: 'crud_proveedor/ver.php',
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
  showCancelButton: false,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  //confirmButtonText: 'Eliminar'
}).then(function(isConfirm) {  
	if (isConfirm) {
$.post('crud_proveedor/eliminar.php', {'del_id':del_id}, function(data){
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