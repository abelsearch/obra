agregar_iconos();

function agregar_iconos(){

	$('#menu_iconos').prepend(icono_nuevo()).prepend(permiso_nuevo());

	var icono_nuevo = document.getElementById("icono_nuevo");
	icono_nuevo.addEventListener("click", Control_Modal1); 

	var permiso_nuevo = document.getElementById("permiso_nuevo");
	permiso_nuevo.addEventListener("click", Control_Modal3);

	function icono_nuevo(){
	var nuevo = '<li><a class="tooltipped"id="icono_nuevo" data-position="left" data-tooltip="Nuevo Usuario"><i class="material-icons">add_circle</i></a></li>';
	return nuevo;
    }; 

    function permiso_nuevo(){
	var nuevo = '<li><a class="tooltipped"id="permiso_nuevo" data-position="right" data-tooltip="Permiso"><i class="material-icons">fingerprint</i></a></li>';
	return nuevo;
    };

    function Control_Modal1(){
	$('#modal1').modal();
	$('#modal1').modal('open');
	}; 

	function Control_Modal3(){
	$('#modal3').modal();
	$('#modal3').modal('open');
	};

};


