$(document).ready(function(){ 

//SELECCIÓN SEMANA 
var sem_dropdown = document.getElementById('select_semana');  
var exe = document.getElementById('exe'); 
var exe2 = document.getElementById('exe2'); 

var tot = document.getElementById('tot'); 
var por = document.getElementById('por'); 

var exe3 = document.getElementById('exe3'); 
var exe4 = document.getElementById('exe4'); 


sem_dropdown.onchange=function(){   
exe.value=$(this).find('option:selected').attr("data-e");
exe2.value=$(this).find('option:selected').attr("data-e2");

tot.value=$(this).find('option:selected').attr("data-t");
por.value=$(this).find('option:selected').attr("data-p");

exe3.value=$(this).find('option:selected').attr("data-r");
exe4.value=$(this).find('option:selected').attr("data-rp");
var id; 
var folio;
id=sem_dropdown.options[sem_dropdown.selectedIndex].value;
folio=$(this).find('option:selected').attr("class");
$.ajax({
url: 'tabla_estimacion.php',
type: 'post',
data: {id: id, folio: folio},
success: function(response){
$('.concepto').html(response);
}
});
}  
//SELECCIÓN SEMANA


//INFO CONCEPTO    
var con_dropdown = document.getElementById('concepto'); 
var unidad = document.getElementById('uni');
var importe = document.getElementById('imp');
var descripcion = document.getElementById('desc');
var precio = document.getElementById('pre');
var cantidad = document.getElementById('cant');
var id = document.getElementById('id_con');
var etapa = document.getElementById('eta'); 
var est_importe = document.getElementById('est_imp');
//var estimado = document.getElementById('estim'); 
//var estimar = document.getElementById('pestim');
var partida = document.getElementById('par');
con_dropdown.onchange=function(){   
unidad.value=con_dropdown.options[con_dropdown.selectedIndex].value;
importe.value=con_dropdown.options[con_dropdown.selectedIndex].id;
descripcion.value=con_dropdown.options[con_dropdown.selectedIndex].text;
precio.value=$(this).find('option:selected').attr("name");
id.value=$(this).find('option:selected').attr("class");
etapa.value=$(this).find('option:selected').attr("data-phase");
//estimado.value=$(this).find('option:selected').attr("data-es");
//estimar.value=$(this).find('option:selected').attr("data-pe");
partida.value=$(this).find('option:selected').attr("data-par");
var num;
var folio2;
num=$(this).find('option:selected').attr("class");
//folio2=$(this).find('option:selected').attr("data-fo"); 
var folio2 = $('#foliox').val(); 
$.ajax({
url: 'tabla_semana.php',
type: 'post',
data: {num: num, folio2: folio2},
success: function(response){
$('.semana').html(response);
}
});
}  
document.getElementById("cant").addEventListener("keyup", calcular);   
function calcular(){        
var cantidad = document.getElementById('cant');
var precio = document.getElementById('pre');
var importe = document.getElementById('imp'); 
//var presupuesto = document.getElementById('presupuesto');
var porc = document.getElementById('con');
var presu = document.getElementById('pres');
var est_importe = document.getElementById('est_imp');
c=parseFloat(cantidad.value); 
p=parseFloat(precio.value);  
i=parseFloat(importe.value); 
ei=parseFloat(est_importe.value); 
pr=parseFloat(presupuesto.value);
porc.value=parseFloat(p*c*100)/i;
//presu.value=parseFloat(ei*100)/pr;  
est_importe.value=parseFloat(c*p);
} 
document.getElementById("cant").addEventListener("keyup", calcular2);   
function calcular2(){        
var presu = document.getElementById('pres');
var est_importe = document.getElementById('est_imp');
ei=parseFloat(est_importe.value); 
presu.value=parseFloat(ei*100)/pr;  
} 
//INFO CONCEPTO        


//AGREGAR ESTIMACIÓN
$('#estimacion').click(function(){   
var partida  = $('#partida').val();
// 
var folio = $('#foliox').val(); 
var semana =$('#semana').val(); 
var fecha = $('#fecha').val(); 
var concepto = $('#desc').val(); 
var unidad = $('#uni').val();  
var cantidad =$('#cant').val();   
var importe = $('#imp').val();   
var porcentaje_con =$('#con').val();    
var porcentaje_pre =$('#pres').val();    
var hora = $('#hora').val(); 
var usuario =$('#usuario').val();  
var id = $('#id_con').val(); 
var etapa =$('#eta').val();  
var est_importe =$('#est_imp').val(); 
if(semana==''||concepto==''||cantidad=='')
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
url: 'crear_estimacion.php',
data: {"id":id, "folio":folio, "semana":semana, "fecha":fecha, "concepto":concepto, "unidad":unidad, "cantidad":cantidad, "importe":importe, "porcentaje_con":porcentaje_con, "porcentaje_pre":porcentaje_pre, "hora":hora, "usuario":usuario, "etapa":etapa, "est_importe":est_importe},
type: 'post',
success: function(result)
{
window.location.reload()
}
}); 
} 
evt.stopImmediatePropagation(); 

}); 
//AGREGAR ESTIMACIÓN            

//BTN REGRESAR 
$("#btn-back").click(function(){
$("body").fadeOut('fast',function()
{ 
window.history.back();	 
}); 
evt.stopImmediatePropagation();
});  
//BTN REGRESAR 

//
});