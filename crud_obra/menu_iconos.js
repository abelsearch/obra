agregar_iconos();

function agregar_iconos(){

	$('#ul_iconos').prepend(icono_editar()).prepend(icono_presupuesto());

	var icono_editar = document.getElementById("icono_editar");
	icono_editar.addEventListener("click", Control_Modal1);
	
	var icono_presupuesto = document.getElementById("icono_presupuesto");
	icono_presupuesto.addEventListener("click", Control_Modal2);

	function icono_editar(){
	var editar = '<li><a class="tooltipped"id="icono_editar" data-position="left" data-tooltip="Editar Orden"><i class="material-icons">edit</i></a></li>';
	return editar;
    };

    function icono_presupuesto(){
	var presupuesto = '<li><a class="tooltipped"id="icono_presupuesto" data-position="left" data-tooltip="Editar Presupuesto"><i class="material-icons">attach_money</i></a></li>';
	return presupuesto;
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


