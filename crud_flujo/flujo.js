$(document).ready(function(){

//CATALOGO
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
var i_descripcion = document.getElementById('descripcion'); 
var descripcion =(i_descripcion.value); 
if(descripcion=='')
{
alert("Por favor escriba una descripción!!!");
} 
else
{      
$.ajax
({
url: 'crud_flujo/crear.php',
data: {"descripcion": descripcion},
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
url: 'crud_flujo/editar.php',
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
  var ec_id = document.getElementById('2id');
  var ec_descripcion = document.getElementById('2descripcion');
  var id =(ec_id.value); 
  var descripcion =(ec_descripcion.value); 
        if(descripcion=='')
        {
        alert("POR FAVOR ESCRIBA UNA DESCRIPCIÓN!!!");
        }
        else
        {
        $.ajax
        ({
        url: 'crud_flujo/editar_flujo.php',
        data: {"id":id, "descripcion":descripcion},
        type: 'post',
        success: function(result)
        {
        window.location.reload()
        }
        }); 
        }
        });
//EDITAR





//CATALOGO

//LISTA
//MODAL
$('.editar').click(function(){
   var id = $(this).attr("id");
   var edit_id = id;
   // AJAX request
   $.ajax({
    url: 'crud_flujo/editar.php',
    type: 'post',
    data: {edit_id: edit_id},
    success: function(response){ 
      // Add response in Modal body
      $('.modal-content').html(response);
      $('#modal1').modal(); 
      $('#modal1').modal('open');
    }
  });
 });
//MODAL 


//EDITAR 
 $('#enviar3').click(function(){
        var e_id = document.getElementById('id');
        var e_folio = document.getElementById('folio');
        var e_estado = document.getElementById('estado'); 
		var e_usuario = document.getElementById('usuario');
        var e_fecha = document.getElementById('fecha'); 
        var e_hora = document.getElementById('hora');        
        var id =(e_id.value); 
        var folio =(e_folio.value); 
        var estado =(e_estado.value);  
        var usuario =(e_usuario.value); 
        var fecha =(e_fecha.value);  
        var hora =(e_hora.value); 
        if(estado<=0)
        {
        alert("POR FAVOR SELECCIONE EL ESTADO!!!");
        }
        else
        {
        $.ajax
        ({
        url: 'crud_flujo/editar_estado.php',
        data: {"id":id, "folio":folio, "estado": estado, "usuario": usuario, "fecha": fecha, "hora": hora},
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
if(confirm('Eliminar?')){
$.post('crud_flujo/eliminar.php', {'del_id':del_id}, function(data)
{ 
window.location.reload();
}); 
}
return false;
});
//ELIMINAR        
























//
});