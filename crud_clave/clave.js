$(document).ready(function(){

//MODAL
$("#trigger" ).click(function(){ 
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
var c_clave = document.getElementById('clave'); 
var clave =(c_clave.value); 
if(clave=='')
{
alert("Por favor escriba una clave!!!");
} 
else
{      
$.ajax
({
url: 'crud_clave/crear.php',
data: {"clave": clave},
type: 'post',
success: function(result)
{
window.location.reload()
}
});
} 
});
//CREAR  


//ELIMINAR 
$(".eliminar").click(function(){
var id = $(this).attr("id");
var del_id = id;
if(confirm('Eliminar?')){
$.post('crud_clave/eliminar.php', {'del_id':del_id}, function(data)
{ 
window.location.reload();
}); 
}
return false;
});
//ELIMINAR        
























//
});