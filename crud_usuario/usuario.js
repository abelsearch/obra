$(document).ready(function(){

//MODAL CREAR USUARIO
$( "#trigger" ).click(function(){  
    $('#modal1').modal();
    $('#modal1').modal('open');
    });
    $( "#cancel" ).click(function(){
    $('#modal1').modal();
    $('#modal1').modal('close');
});
//MODAL CREAR USUARIO 

//CREAR USUARIO 
$('#enviar').click(function(){
    var clave = $('#clave').val();
    var nombre = $('#nombre').val(); 
    var paterno = $('#paterno').val();  
    var materno = $('#materno').val();
    var nacimiento = $('#nacimiento').val(); 
    var tipo = $('#usuario').val();  
    var nombreu = $('#usuario').val();
    var correo = $('#correo').val(); 
    var telefono = $('#tel').val();  
    var depto = $('#depto').val();
    var password = $('#password').val(); 
    var tipo = $('#tipo').val();  
    var fecha = $('#fecha').val();
    var hora = $('#hora').val();
    if(nombreu==''||nombre==''||paterno==''||materno==''||password==''||depto==''||tipo==''){
        swal({ 
            title: "Alerta!!!",       
            icon: "warning", 
            text: "Por favor llene los campos!!!",
        });
    } 
    else{    
        $.ajax
        ({
        url: 'crud_usuario/crear.php',
        data: {"clave": clave, "nombre": nombre, "paterno": paterno, 
        "materno": materno, "nacimiento": nacimiento, "tipo": tipo,
        "nombreu": nombreu, "correo": correo, "telefono": telefono, 
        "depto": depto, "password": password, "tipo": tipo, "fecha": fecha, "hora": hora},
        type: 'post',
        success: function(result)
        {
        window.location.reload()
        }
        }); 
        }
});
//CREAR USUARIO


//EDITAR USUARIO 
$('#enviar2').click(function(){
var id  = $('#id').val(); 
//var nom_usu  = $('#nombre2').val(); 
//var pass  = $('#pass2').val();  
var e_nom_usu = document.getElementById('nombre2'); 
var nom_usu = (e_nom_usu.value);
var e_pass = document.getElementById('pass2'); 
var pass = (e_pass.value);
if(nom_usu==''||pass==''){
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
url: 'crud_usuario/editar_usuario.php',
data: {"id":id, "nom_usu": nom_usu, "pass": pass},
type: 'post',
success: function(result)
{
window.location.reload()
}
}); 
}
});
//EDITAR USUARIO

//EDITAR TIPO DE USUARIO
$('#enviar3').click(function(){
var e_id = document.getElementById('id');
var e_tipo = document.getElementById('type2'); 
var id =(e_id.value); 
var tipo =(e_tipo.value);  
if(tipo<=0)
{
swal({ 
  title: "Alerta!!!",       
  icon: "warning", 
  text: "Por favor seleccione un tipo de usuario!!!",
});
}
else
{
$.ajax
({
url: 'crud_usuario/editar_tipo.php',
data: {"id":id, "tipo": tipo},
type: 'post',
success: function(result)
{
window.location.reload()
}
}); 
}
});       
//EDITAR TIPO DE USUARIO  

//EDITAR 
 $('.editar').click(function(){
   var id = $(this).attr("id");
   var edit_id = id;
   // AJAX request
   $.ajax({
    url: 'crud_usuario/editar.php',
    type: 'post',
    data: {edit_id: edit_id},
    success: function(response){ 
      // Add response in Modal body
      $('.modal-content2').html(response);
      $('#modal2').modal(); 
      $('#modal2').modal('open');
    }
  });
 });
//EDITAR 


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
$.post('crud_usuario/eliminar.php', {'del_id':del_id}, function(data){ 
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

//PERMISO USUARIO 
$('#permiso').click(function(){
var id  = $('#p_usuario').val(); 
var vista  = $('#p_vista').val(); 
if(id==''||vista==''){
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
url: 'crud_usuario/permiso.php',
data: {"id":id, "vista": vista},
type: 'post',
success: function(result)
{
window.location.reload()
}
}); 
}
});
//PERMISO USUARIO

//RETIRAR PERMISO USUARIO 
$('#retirar').click(function(){
var id  = $('#r_usuario').val(); 
var vista  = $('#r_vista').val(); 
if(id==''||vista==''){
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
url: 'crud_usuario/retirar.php',
data: {"id":id, "vista": vista},
type: 'post',
success: function(result)
{
window.location.reload()
}
}); 
}
});
//RETIRAR PERMISO USUARIO 

//MODAL 3
$('.ver').click(function(){
var id = $(this).attr("id");
var ver_id = id;
$.ajax({
url: 'crud_usuario/ver.php',
type: 'post',
data: {ver_id: ver_id},
success: function(response){
$('.modal-content4').html(response);
$('#modal4').modal();
$('#modal4').modal('open');
}
});
});
//MODAL 3




//
}); 