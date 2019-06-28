agregar_iconos();

function agregar_iconos(){

	$('#ul_iconos').prepend(icono_nuevo()); 

	
	var icono_nuevo = document.getElementById("icono_nuevo");
	icono_nuevo.addEventListener("click", Control_Modal1);

	function icono_nuevo(){
	var nuevo = '<li><a class="tooltipped"id="icono_nuevo" data-position="left" data-tooltip="Nueva Evidencia"><i class="material-icons">add_circle</i></a></li>';
	return nuevo;
    };

    
    function Control_Modal1(){
	$('#modal1').modal();
	$('#modal1').modal('open');
	};
	
};