<html>

<div id="modal3" class="modal">
	<div class="modal-content3">
		<div class="row" id="titulo">
			<h4>Obras del proyecto</h4>
		</div>
		<div class="row" id="mostrar_obras">
			<table id="table_obras" class="highlight">
				<thead class="orange white-text">
					<tr>
						<th style="font-size:10px">FOLIO</th>
						<th style="font-size:10px">TITULO</th>
						<th style="font-size:10px">CONTRATO</th>
						<th style="font-size:10px">MANZANA</th>
						<th style="font-size:10px">LOTE</th>
						<th style="font-size:10px">CONTRATISTA</th>
						<th style="font-size:10px">N° CONTRA</th>
						<th style="font-size:10px">RESIDENTE</th>
						<th style="font-size:10px">N° RESI</th>
						<th style="font-size:10px">Actualizar</th>
						<th style="font-size:10px">Acceder</th>
					</tr>
				</thead>
				<tbody id="body_obras">
				</tbody>
			</table>
		</div>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-action modal-close btn-flat" id="cancel"><i class="material-icons">close</i></a>
	</div>
</div>
<script type="text/javascript">
	function editar_obra(id_obra){
		alert(id_obra);
		//Se leen las variables a actualizar

		var id_obra_editar  = id_obra;
		var titulo          = $('#'+id_obra_editar+'_titulo_obra').val();
		var contrato        = $('#'+id_obra_editar+'_contrato').val();
		var manzana         = $('#'+id_obra_editar+'_manzana').val();
		var lote 	        = $('#'+id_obra_editar+'_lote_obra').val();
		var contratista     = $('#'+id_obra_editar+'_contratista').val();
		var num_contratista = $('#'+id_obra_editar+'_num_contratista').val();
		var residente       = $('#'+id_obra_editar+'_residente').val();
		var num_residente   = $('#'+id_obra_editar+'_num_residente').val();

		//Se manda el ajax para actualizar
		$.ajax({
	        type:'POST',
	        url:'crud_proyecto/actualizar_obra.php',
	        dataType: "json",
	        data:{'id_obra': id_obra_editar, 'titulo' : titulo, 'contrato': contrato, 'manzana' : manzana, 'lote' : lote, 'contratista' : contratista, 'num_contratista' : num_contratista, 'residente' : residente, 'num_residente':num_residente},
	        success:function(data){

		        if(data!=''){
		            alert('Obra actualizada exitosamente.');
		            console.log(data);
		            
		        }else{
		            //M.toast({html: 'Insumos no encontrados', classes: 'rounded'}); 
		            swal({ 
					  title: "Alerta!!!",		
					  icon: "warning", 
					  text: "INSUMOS NO ENCINTRADOS",
					});
		        } 
	        } 
	        	            
		    });
		//Termina el ajax para actualizar
	};
	function dirigir_obra(folio,id){
		//window.location.href="crud_obra/editar_obra.php?edit_id="+folio+"&id="+id; 
		window.location.href="crud_obra/editar_obra.php?edit_id="+folio+"&id_modelo="+id; 
	}

</script>

 </html>