agregar_iconos();

function agregar_iconos(){

	$('#menu_iconos').prepend(icono_nuevo());

	var icono_nuevo = document.getElementById("icono_nuevo");
	icono_nuevo.addEventListener("click", Control_Modal1);

	function icono_nuevo(){
	var nuevo = '<li class="red"><a class="tooltipped"id="icono_nuevo" data-position="left" data-tooltip="Imprimir Almacén"><i class="material-icons white-text">picture_as_pdf</i></a></li>';
	return nuevo;
    };

    function Control_Modal1(){
	$('#modal1').modal();
	$('#modal1').modal('open');
	};

};


