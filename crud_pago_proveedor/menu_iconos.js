agregar_iconos();

function agregar_iconos(){

	$('#menu_iconos').prepend(insumo_nuevo()).prepend(icono_nuevo());

	var icono_nuevo = document.getElementById("icono_nuevo");
	icono_nuevo.addEventListener("click", Control_Modal1);
	
	var insumo_nuevo = document.getElementById("insumo_nuevo");
	insumo_nuevo.addEventListener("click", Control_Modal2);


	function insumo_nuevo(){
	var nuevo_insumo = '<li class="green"><a class="tooltipped"id="insumo_nuevo" data-position="left" data-tooltip="Nuevo Insumo"><i class="material-icons">add_circle</i></a></li>';
	return nuevo_insumo;
    };
	function icono_nuevo(){
	var nuevo = '<li><a class="tooltipped"id="icono_nuevo" data-position="left" data-tooltip="Nueva Orden"><i class="material-icons">add_circle</i></a></li>';
	return nuevo;
    };

    function Control_Modal1(){
	$('#modal1').modal();
	$('#modal1').modal('open');
	};

	function Control_Modal2(){
	$('#modal2').modal();
	$('#modal2').modal('open');
	};
};
