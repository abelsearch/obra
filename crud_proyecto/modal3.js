$(document).ready(function(){
$('.ver').click(function(){
	var id = $(this).attr("id");
	var ver_id = id;

	$.ajax({
        type:'POST',
        url:'crud_proyecto/ver.php',
        dataType: "json",
        data:{ver_id: ver_id},
        success:function(data){

	        if(data!=''){
	            var arreglo = data;	            
	            $('#body_obras').html(arreglo); 
	            $('#modal3').modal(); 
				$('#modal3').modal('open');
	            
	        }else{
	            //M.toast({html: 'Insumos no encontrados', classes: 'rounded'}); 
	            swal({ 
				  title: "Alerta!!!",		
				  icon: "warning", 
				  text: "INSUMOS NO ENCINTRADOS",
				});
	        } 
        } 
        	            
	    });
});



});	