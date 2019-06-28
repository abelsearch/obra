$(document).ready(function(){ 

//MODAL6
$( "#trigger6" ).click(function(){  
$('#modal2').modal();
$('#modal2').modal('close');
$('#modal6').modal();
$('#modal6').modal('open');
}); 
$( "#cancelN" ).click(function(){
window.location.reload();
});
//MODAL6        




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
url: '././crud_insumo/crear.php',
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