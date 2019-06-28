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
var partida  = $('#partida').val();
var descripcion  = $('#descripcion').val();
var medida	 = $('#medida').val();	
var fecha	 = $('#fecha').val();
if(partida==''||descripcion==''||medida=='')
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
url: 'crud_catalogo/crear.php',
data: {"partida": partida, "descripcion": descripcion, "medida": medida, "fecha": fecha},
type: 'post',
success: function(result)
{
window.location.reload()
}
});
} 
});
//CREAR 


//MODAL 2        
$('.trigger').click(function(){
var id = $(this).attr("id");
var edit_id = id;
$.ajax({
url: 'crud_catalogo/editar.php',
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
var id  = $('#2id').val();
var partida  = $('#2partida').val();
var descripcion  = $('#2descripcion').val();
var medida	 = $('#2medida').val();	
if(partida==''||descripcion==''||medida=='')
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
url: 'crud_catalogo/editar_servicio.php',
data: {"id":id, "partida":partida, "descripcion":descripcion, "medida":medida},
type: 'post',
success: function(result)
{
window.location.reload()
}
});
}
});
//EDITAR        


//ELIMINAR 
$(".eliminar").click(function(){
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
$.post('crud_catalogo/eliminar.php', {'del_id':del_id}, function(data){	
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