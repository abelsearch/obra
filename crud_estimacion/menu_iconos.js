agregar_iconos();

function agregar_iconos(){

	$('#ul_iconos').prepend(icono_nuevo()).prepend(icono_excel()); 
	
	
	var icono_nuevo = document.getElementById("icono_nuevo");
	icono_nuevo.addEventListener("click", Control_Modal1);

	var icono_excel =  document.getElementById("icono_excel");
    icono_excel.addEventListener("click", Control_Modal2);


	function icono_nuevo(){
	var nuevo = '<li><a class="tooltipped"id="icono_nuevo" data-position="left" data-tooltip="Nueva Estimación"><i class="material-icons">add_circle</i></a></li>';
	return nuevo;
    };
  	function icono_excel(){
	var excel = '<li class="amber"><a class="tooltipped"id="icono_excel" data-position="left" data-tooltip="Corregir Estimación"><i class="material-icons">remove_circle</i></a></li>';
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