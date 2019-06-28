$(document).ready(function(){ 
/**
//AGREGAR CONCEPTO
$('#con_crear').click(function(){ 
	var folio       = $('#folio').val();
	var descripcion = $('#descripcion').val();  
	var unidad      = $('#unidad').val();  
	var cantidad    = $('#cantidad').val();
	var precio      = $('#precio').val(); 
	var semana      = $('#semana').val();
	var fecha       = $('#fecha').val();
	var hora        = $('#hora').val();  
	var usuario     = $('#usuario').val();
	var etapa       = $('#select_fase').val(); 
	var modelo       = $('#c_modelo').val(); 
	var partida       = $('#partida').val();

	if(descripcion==''||precio=='')
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
			url: 'crear_concepto.php',
			data: {"folio":folio,"etapa":etapa, "descripcion":descripcion, "unidad":unidad, "cantidad":cantidad, 
			"precio":precio, "semana":semana, "fecha":fecha, "hora":hora, "usuario":usuario, "modelo":modelo, "partida":partida},
			type: 'post',
			success: function(result)
			{
			window.location.reload()
			}
			}); 
	} 
	//event.stopImmediatePropagation();
}); 
//AGREGAR CONCEPTO            
**/
        
//AGREGAR NUEVA ETAPA
$('#btn_nueva_etapa').click(function(){

	var nombre_etapa = $('#nombre_etapa').val();
    var folio = $('#c_folio').val();
	if(nombre_etapa=='')
	{
		swal({ 
  title: "Alerta!!!",		
  icon: "warning", 
  text: "Por favor ingrese el nombre de la etapa!!!",
});
	} 
	else
	{
		$.ajax
			({
			url: 'crear_fase.php',
			data: {"folio":folio, "nombre_fase":nombre_etapa},
			type: 'post',
			success: function(result)
			{
			window.location.reload();
			}
			}); 
	}
}); 
//AGREGAR NUEVA ETAPA    

//INFO CONCEPTO    
var con_dropdown = document.getElementById('concepto');  
var descripcion = document.getElementById('descripcion');
var unidad = document.getElementById('unidad');
var cantidad = document.getElementById('cantidad');
var precio = document.getElementById('precio');
var etapa = document.getElementById('etapa'); 
var modelo = document.getElementById('modelo');
var partida = document.getElementById('partida');
/**
	var folio       = $('#folio').val();
	var descripcion = $('#descripcion').val();  
	var unidad      = $('#unidad').val();  
	var cantidad    = $('#cantidad').val();
	var precio      = $('#precio').val(); 
	var fecha       = $('#fecha').val();
	var hora        = $('#hora').val();  
	var usuario     = $('#usuario').val();
	var etapa       = $('#select_fase').val(); 
	var modelo       = $('#c_modelo').val(); 
	var partida       = $('#partida').val(); 
	**/
con_dropdown.onchange=function(){   
unidad.value=con_dropdown.options[con_dropdown.selectedIndex].value;
//modelo.value=con_dropdown.options[con_dropdown.selectedIndex].id;
descripcion.value=con_dropdown.options[con_dropdown.selectedIndex].text;
precio.value=$(this).find('option:selected').attr("name");
modelo.value=$(this).find('option:selected').attr("class");
etapa.value=$(this).find('option:selected').attr("data-phase");
estimado.value=$(this).find('option:selected').attr("data-es");
estimar.value=$(this).find('option:selected').attr("data-pe");
partida.value=$(this).find('option:selected').attr("data-par"); 
}  
document.getElementById("cantidad").addEventListener("keyup", calcular);   
function calcular(){        
var cantidad = document.getElementById('cantidad');
var precio = document.getElementById('precio');
var importe = document.getElementById('importe'); 
//var presupuesto = document.getElementById('presupuesto');
var porc = document.getElementById('con');
var presu = document.getElementById('pres');
var est_importe = document.getElementById('est_imp');
c=parseFloat(cantidad.value); 
p=parseFloat(precio.value);  
//i=parseFloat(importe.value); 
ei=parseFloat(est_importe.value); 
pr=parseFloat(presupuesto.value);
porc.value=parseFloat(p*c*100)/i;
//presu.value=parseFloat(ei*100)/pr;  
est_importe.value=parseFloat(c*p);
} 
//document.getElementById("cant").addEventListener("keyup", calcular2);   
//function calcular2(){        
//var presu = document.getElementById('pres');
//var est_importe = document.getElementById('est_imp');
//ei=parseFloat(est_importe.value); 
//presu.value=parseFloat(ei*100)/pr;  
//} 
//INFO CONCEPTO        

//MODAL 3
$('.ver').click(function(){
var id = $(this).attr("id");
var ver_id = id; 
var folio = $('#c_folio').val();
$.ajax({
url: 'ver_avance.php',
type: 'post',
data: {ver_id: ver_id, folio: folio},
success: function(response){
$('.modal-content9').html(response);
$('#modal9').modal();
$('#modal9').modal('open');
}
});
});
//MODAL 3



















});