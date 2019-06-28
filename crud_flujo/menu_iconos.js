agregar_iconos();

function agregar_iconos(){

	$('#ul_iconos').prepend(icono_nuevo()).prepend(icono_excel()).prepend(breadcrumb()); 

	function breadcrumb(){
	var nuevo = '<li><a data-position="left">FLUJOS</a></li>';
	return nuevo;
    };

	var icono_nuevo = document.getElementById("icono_nuevo");
	icono_nuevo.addEventListener("click", Control_Modal1);

	function icono_nuevo(){
	var nuevo = '<li><a class="tooltipped"id="icono_nuevo" data-position="left" data-tooltip="Nuevo Flujo"><i class="material-icons">add_circle</i></a></li>';
	return nuevo;
    };

    var icono_excel =  document.getElementById("icono_excel");
    icono_excel.addEventListener("click", Control_Modal2);

  	function icono_excel(){
	var excel = '<li class="green"><a class="tooltipped"id="icono_excel" data-position="left" data-tooltip="Adjuntar desde Excel"><i class="material-icons">cloud_upload</i></a></li>';
	return excel;
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