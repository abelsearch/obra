agregar_iconos();

function agregar_iconos(){

	$('#menu_iconos').prepend(icono_agregar());

	var icono_agregar = document.getElementById("icono_agregar");
	icono_agregar.addEventListener("click", Control_Modal1);
	
	function icono_agregar(){
	var agregar = '<li><a class="tooltipped"id="icono_agregar" data-position="left" data-tooltip="Agregar Proyecto"><i class="material-icons">add_circle</i></a></li>';
	return agregar;
    };

    function Control_Modal1(){
	$('#modal1').modal();
	$('#modal1').modal('open');
	};
};


