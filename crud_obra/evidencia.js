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


//AGREGAR EVIDENCIA 
$('#evi_crear').click(function(){
var c_folio = document.getElementById('folio');
var c_fecha = document.getElementById('fecha'); 
var c_hora = document.getElementById('hora'); 
var c_usuario = document.getElementById('usuario');
var c_reporte = document.getElementById('reporte'); 
var c_file = document.getElementById('file');
var c_semana = document.getElementById('semana');
var folio =(c_folio.value);
var fecha =(c_fecha.value);   
var hora =(c_hora.value); 
var usuario =(c_usuario.value);
var reporte =(c_reporte.value);
var file =(c_file.value); 
var semana =(c_semana.value);
if(reporte=='')
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
url: 'crear_evidencia.php',
data: {"folio":folio, "fecha":fecha, "hora":hora, "usuario":usuario, "reporte": reporte, "file": file, "semana": semana},
type: 'post',
success: function(result)
{ 
window.location.reload()
}
});
}
});
//AGREGAR EVIDENCIA      

// 
});