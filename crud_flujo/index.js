$(document).ready(function(){

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
 $('#enviar').click(function(){
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


//ALERTA
$(".eliminar").click(function(){
 var id = $(this).attr("id");
   var del_id = id;
   // AJAX request
   $.ajax({
    url: 'crud_flujo/flujo_eliminar.php',
    type: 'post',
    data: {del_id: del_id},
    success: function(response){ 
      // Add response in Modal body
      $('.modal-content2').html(response);
      $('#modal2').modal(); 
      $('#modal2').modal('open');
    }
  });
 });
//ALERTA


//EDITAR 
 $('#eliminar').click(function(){
 var d_id = document.getElementById('id2');
 var d_folio = document.getElementById('folio');
 var d_usuario = document.getElementById('usuario'); 
 var d_reporte = document.getElementById('reporte')
 var d_fecha = document.getElementById('fecha'); 
 var d_hora = document.getElementById('hora')
 var id =(d_id.value); 
 var folio =(d_folio.value);
 var usuario =(d_usuario.value);  
 var reporte =(d_reporte.value); 
 var fecha =(d_fecha.value); 
 var hora =(d_hora.value);
 if(reporte=='')
 {
 alert("POR FAVOR LLENE EL REPORTE!!!");
 }
 else
 {
 $.ajax
 ({
 url: 'crud_flujo/eliminar.php',
 data: {"id":id, "folio": folio, "usuario": usuario, "reporte": reporte, "fecha": fecha, "hora": hora},
 type: 'post',
 success: function(result)
 {
 window.location.reload()
 }
 }); 
 }
 });
//EDITAR
























});