$(document).ready(function(){ 

//CONTROL DE INSUMOS
$('#loading').hide();
$("#btn-ins").click(function(){ 
var folio = document.getElementById('c_folio');
var id =(folio.value); 
window.location.href='insumo.php?id='+id;
}); 
//CONTROL DE INSUMOS 


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


    
//AGREGAR SEMANA
$('#semana').click(function(){ 
var folio        = $('#c_folio').val(); 	//folio de la obra
var fecha_inicio = $('#inicio').val();		//fecha de inicio
var fecha_fin    = $('#fin').val();  		//fecha de fin
var num_semana   = parseInt($('#num_semana').val());  	//numero de la nueva semana por asignar
var semana       = parseInt($('#c_semana').val()); 		//total de semanas dentro de la obra
var res_semana   = parseInt($('#res_semana').val());	//Resta de seamnas disponibles por asignar
var asign        = parseInt($('#asign').val());			//numero de la semana ya insertada

console.log("semana que se ingreso: "+num_semana+" - total de semanas dentro de la obra: "+semana+": fin");
if(num_semana>semana)
{
//alert("Error, El número de la semana supera el límite de las semanas creadas en la obra");
swal({ 
  title: "Alerta!!!",		
  icon: "warning", 
  text: "Error, El número de la semana supera el límite de las semanas creadas en la obra",
});
} 
else
{
if(res_semana==0)
{
swal({ 
  title: "Alerta!!!",		
  icon: "warning", 
  text: "Error, Ya no hay semanas para agregar",
});
//alert("Error, Ya no hay Semanas por Agregar");
} 
else
{
if(num_semana==asign)
{
swal({ 
  title: "Alerta!!!",		
  icon: "warning", 
  text: "Error, Semana ya asignada",
}); 
//alert("Error, Semana ya asignada!!!");
} 
else
{
if(num_semana==''||num_semana<0||fecha_inicio==''||fecha_fin=='')
{ 
swal({ 
  title: "Alerta!!!",		
  icon: "warning", 
  text: "Por favor llene los campos!!!",
});	
//alert("Error, Favor de llenar todos los campos para continuar");
} 
else
{
$.ajax
({
url: 'crear_semana.php',
data: {"folio":folio, "num_semana":num_semana, "fecha_inicio":fecha_inicio, "fecha_fin":fecha_fin},
type: 'post',
success: function(result)
{
$("#sem").load(window.location + " #sem"); 
$("#crear").load(window.location + " #crear");
}
}); 
} 
} 
}
}
}); 
//AGREGAR SEMANA       


//ELIMINAR SEMANA
$(".sem_eliminar").click(function(){
//on("click",".sem_eliminar",function(){
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
$.post('semana_eliminar.php', {'del_id':del_id}, function(data){	
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

//ELIMINAR SEMANA


//
});