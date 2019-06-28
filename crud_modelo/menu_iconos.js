agregar_iconos();

function agregar_iconos(){

	
	$('#menu_iconos').prepend(icono_nuevo()).prepend(icono_conceptos()).prepend(icono_nueva_fase());

	var icono_nuevo = document.getElementById("icono_nuevo");
	icono_nuevo.addEventListener("click", Control_Modal1);

	var icono_conceptos = document.getElementById('icono_conceptos');
	icono_conceptos.addEventListener('click', Control_Modal2);

	var icono_nueva_fase = document.getElementById("icono_fase");
	icono_nueva_fase.addEventListener("click", Control_Modal3);

	function icono_nuevo(){
	var nuevo = '<li class="green"><a class="tooltipped"id="icono_nuevo" data-position="left" data-tooltip="Nuevo Modelo"><i class="material-icons">add_circle</i></a></li>';
	return nuevo;
    };

    function icono_conceptos(){
	var nuevo = '<li><a class="tooltipped"id="icono_conceptos" data-position="left" data-tooltip="Nuevo Concepto"><i class="material-icons">add_circle</i></a></li>';
	return nuevo;
    };

    function icono_nueva_fase(){
	var nueva_fase = '<li class="blue"><a class="tooltipped"id="icono_fase" data-position="left" data-tooltip="Nueva Etapa"><i class="material-icons">add_circle</i></a></li>';
	return nueva_fase;
    };  



    function Control_Modal1(){
	$('#modal1').modal();
	$('#modal1').modal('open');
	};
	function Control_Modal2(){
	$('#modal2').modal();
	$('#modal2').modal('open');
	};
	function Control_Modal3(){
	$('#modal3').modal();
	$('#modal3').modal('open');
	}
};