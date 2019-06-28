agregar_iconos();

function agregar_iconos(){

	$('#ul_iconos').prepend(select_folio()); 

	
	var select_folio = document.getElementById("select_folio");
	select_folio.addEventListener("click", Control_Modal1);

	function icono_nuevo(){
	var nuevo = '<li><a class="tooltipped"id="select_folio" data-position="left" data-tooltip="Ver Greficas"><i class="material-icons">add_circle</i></a></li>';
	return nuevo;
    };

    
    function Control_Modal1(){
	$('#modal1').modal();
	$('#modal1').modal('open');
	};
	
};