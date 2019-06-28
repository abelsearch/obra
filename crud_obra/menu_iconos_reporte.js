agregar_iconos();

function agregar_iconos(){

	$('#ul_iconos').prepend(icono_pdf());

    var icono_pdf =  document.getElementById("icono_pdf");
    //icono_pdf.addEventListener("click", Control_Modal1);

  	function icono_pdf(){
	var pdf = '<li class="red"><a class="tooltipped"id="pdf" data-position="left" data-tooltip="Crear PDF"><i class="material-icons">picture_as_pdf</i></a></li>';
	return pdf;
    };
    
	function Control_Modal1(){
	alert("Función no disponible aún, comunicate con tu administrador");
	};

};