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


$('#ayuda_ver_obras').click(function(){
	alert("Hola, Aquí podrás visualizar todas las obras que están dentro de tu proyecto, desde aquí puedes actualizar datos de los campos que se muestran y dar click en <<Actualizar>> que es el ícono de lápiz verde, o puedes presionar en <<Acceder>> que es el ícono de la flecha azul, para que puedas entrar directo a esa obra.");
});
});	