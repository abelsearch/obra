agregar_info();

function agregar_info(){

	$('#slide-out').append(contratista()).append(residente());


	function contratista(){
	var contratista = '<li><a href="#" class="white-text"style="font-size:12px">Contratista '+$('#o_contratista').val()+' N° Contratista '+$('#o_num_contratista').val()+'</a></li>';
	return contratista;
    };

    function residente(){
	var residente = '<li><a href="#" class="white-text"style="font-size:12px">Residente '+$('#o_residente').val()+' N° Contratista '+$('#o_num_residente').val()+'</a></li>';
	return residente;
    };

};


