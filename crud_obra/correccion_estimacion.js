$(document).ready(function(){  

//SELECCIÓN SEMANA 
/**
var semc_dropdown = document.getElementById('semana_c');  
semc_dropdown.onchange=function(){   
var num;
num=semc_dropdown.options[semc_dropdown.selectedIndex].value;
var edit_id = num;
var folio; 
folio=$(this).find('option:selected').attr("class");
$.ajax({
url: 'select_concepto.php',
type: 'post',
data: {edit_id: edit_id, folio: folio},
success: function(response){ 
//$('#select_concepto').html(response); 
$('#select_concepto').append(new Option(response));
}
});
}  
**/
//SELECCIÓN SEMANA


//INFO CORRECCIÓN    
var con_dropdown = document.getElementById('concepto_c'); 
var unidad = document.getElementById('uni_c');
var importe = document.getElementById('imp_c');
var descripcion = document.getElementById('desc_c');
var precio = document.getElementById('pre_c');
var cantidad = document.getElementById('cant_c');
var etapa = document.getElementById('eta_c');
var id = document.getElementById('id_con_c');
var est_importe = document.getElementById('est_imp_c'); 
var presupuesto = document.getElementById('pres_c');
var estimacion_id = document.getElementById('ac_id');
var o_cantidad = document.getElementById('can');
var o_importe = document.getElementById('impo');
var o_fecha = document.getElementById('fech');
var c_semana = document.getElementById('c_semana');
var o_pre = document.getElementById('ppre');
var o_con = document.getElementById('pcon'); 
var estimado = document.getElementById('c_estim'); 
var estimar = document.getElementById('c_pestim');


con_dropdown.onchange=function(){   
unidad.value=con_dropdown.options[con_dropdown.selectedIndex].value;
importe.value=con_dropdown.options[con_dropdown.selectedIndex].id;
descripcion.value=con_dropdown.options[con_dropdown.selectedIndex].text;
precio.value=$(this).find('option:selected').attr("name");
etapa.value=$(this).find('option:selected').attr("data-phase"); 
id.value=$(this).find('option:selected').attr("class");
estimacion_id.value=$(this).find('option:selected').attr("data-acid");
o_cantidad.value=$(this).find('option:selected').attr("data-cant");
o_importe.value=$(this).find('option:selected').attr("data-impo");
o_fecha.value=$(this).find('option:selected').attr("data-fecha");
c_semana.value=$(this).find('option:selected').attr("data-num");
o_pre.value=$(this).find('option:selected').attr("data-pre");
o_con.value=$(this).find('option:selected').attr("data-con");
estimado.value=$(this).find('option:selected').attr("data-ces");
estimar.value=$(this).find('option:selected').attr("data-cpe");

}  
document.getElementById("cant_c").addEventListener("keyup", calcular);   
function calcular(){        
var cantidad = document.getElementById('cant_c');
var precio = document.getElementById('pre_c');
var importe = document.getElementById('imp_c'); 
var presupuesto = document.getElementById('presupuesto_c');
var porc = document.getElementById('con_c');
var presu = document.getElementById('pres_c');
var est_importe = document.getElementById('est_imp_c');
c=parseFloat(cantidad.value); 
p=parseFloat(precio.value);  
i=parseFloat(importe.value);   
ei=parseFloat(est_importe.value);
pr=parseFloat(presupuesto.value);
porc.value=parseFloat(p*c*100)/i;
presu.value=parseFloat(ei*100)/pr;
est_importe.value=parseFloat(c*p);
} 
//INFO CORRECCIÓN        


//CORREGIR ESTIMACIÓN
$('#correccion2').click(function(){ 
var a_id = document.getElementById('ac_id');  
var e_folio = document.getElementById('folio_c'); 
var e_semana = document.getElementById('c_semana');
var e_cantidad = document.getElementById('cant_c');   
var e_por_con = document.getElementById('con_c');
var e_por_pre = document.getElementById('pres_c');
var e_id = document.getElementById('id_con_c');
var e_est_importe = document.getElementById('est_imp_c');
var n_cantidad = document.getElementById('can');
var n_importe = document.getElementById('impo');
var n_semana = document.getElementById('c_semana');
var n_pre = document.getElementById('ppre');
var n_con = document.getElementById('pcon');
var n_fecha = document.getElementById('fech');

var a_id = (a_id.value);
var folio = (e_folio.value); 
var semana = (e_semana.value);
var cantidad = (e_cantidad.value);     
var porcentaje_con = (e_por_con.value);   
var porcentaje_pre = (e_por_pre.value);   
var id = (e_id.value);  
var est_importe = (e_est_importe.value); 

var cantidad_n = (n_cantidad.value);
var importe_n = (n_importe.value); 
var presu_n = (n_pre.value);     
var conce_n = (n_con.value);   

var clave=prompt("Introduzca la clave de permiso:");
if (clave == null) 
{
window.location.reload();
} 
else 
{  
$.ajax
({
url: 'correccion_estim.php',
data: {"a_id":a_id, "clave":clave, "id":id, "folio":folio, "semana":semana, "cantidad":cantidad, 
"porcentaje_con":porcentaje_con, "porcentaje_pre":porcentaje_pre, "est_importe":est_importe, 
"cantidad_n":cantidad_n, "importe_n":importe_n, "presu_n":presu_n, "conce_n":conce_n},
type: 'post',
success: function(result)
{
window.location.reload()
}
});   
}
}); 
//CORREGIR ESTIMACIÓN            


//CORREGIR ESTIMACIÓN
$('#correccion').click(function(){  
var e_folio = document.getElementById('folio_c'); 
var e_semana = document.getElementById('semana_c');
var e_cantidad = document.getElementById('cant_c');   
var e_por_con = document.getElementById('con_c');
var e_por_pre = document.getElementById('pres_c');
var e_id = document.getElementById('id_con_c');
var e_est_importe = document.getElementById('est_imp_c');
var folio = (e_folio.value); 
var semana = (e_semana.value);
var cantidad = (e_cantidad.value);     
var porcentaje_con = (e_por_con.value);   
var porcentaje_pre = (e_por_pre.value);   
var id = (e_id.value);  
var est_importe = (e_est_importe.value);
if(cantidad=='')
{
swal({ 
  title: "Alerta!!!",		
  icon: "warning", 
  text: "Por favor escriba una cantidad!!!",
});
} 
else
{ 
var clave=prompt("Introduzca la clave de permiso:");
if (clave == null) 
{
window.location.reload();
} 
else 
{  
$.ajax
({
url: 'corregir_estimacion.php',
data: {"id":id, "clave":clave, "folio":folio, "semana":semana, "cantidad":cantidad, "porcentaje_con":porcentaje_con, "porcentaje_pre":porcentaje_pre, "est_importe":est_importe},
type: 'post',
success: function(result)
{
window.location.reload()
}
}); 
} 
evt.stopImmediatePropagation(); 
}
}); 
//CORREGIR ESTIMACIÓN            

 
//
});