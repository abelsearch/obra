agregar_iconos();

function agregar_iconos(){

	$('#menu_iconos').prepend(icono_nuevo()).prepend(icono_excel()); 

	var icono_nuevo = document.getElementById("icono_nuevo");
	icono_nuevo.addEventListener("click", Control_Modal1); 

	var icono_excel = document.getElementById("icono_excel");
	icono_excel.addEventListener("click", Control_Modal4);


	function icono_nuevo(){
	var nuevo = '<li><a class="tooltipped"id="icono_nuevo" data-position="left" data-tooltip="Nuevo Cliente"><i class="material-icons">add_circle</i></a></li>';
	return nuevo;
    }; 

    function icono_excel(){
	var excel = '<li class="green"><a class="tooltipped" id="icono_excel" data-position="left" data-tooltip="Adjuntar desde Excel"><i class="material-icons">cloud_upload</i></a></li>';
	return excel;
    }; 

    function Control_Modal1(){
	$('#modal1').modal();
	$('#modal1').modal('open');
	}; 

	function Control_Modal4(){
	$('#modal4').modal();
	$('#modal4').modal('open');
	};

};


