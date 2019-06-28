<?php
require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
require('../db_config.php');
	
if(isset($_POST['Submit'])){ 
	$fecha = $_POST['fecha']; 
	$hora = $_POST['hora']; 
	$usuario = $_POST['usuario']; 
	


	$mimes = ['application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','xls','xlsx','application/vnd.oasis.opendocument.spreadsheet'];
	
	if(in_array($_FILES["file"]["type"],$mimes)){

		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		
		$uploadFilePath = 'Uploads/'.basename($_FILES['file']['name']);
		move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

		$Reader = new SpreadsheetReader($uploadFilePath);

		$totalSheet = count($Reader->sheets());

		//echo "You have total ".$totalSheet." sheets".

		$html="<table border='1'>";
		$html.="<table border=1>
		<tr>
		<td>Folio Orden</td>
		<td>Tipo Insumo</td>
		<td>Descripcion</td> 
		<td>Unidad</td>
		<td>Cantidad</td>
		<td>Precio Unitario</td>
		<td>Semana</td> 
		</tr>";

		/* For Loop for all sheets */
		for($i=0;$i<$totalSheet;$i++){

			$Reader->ChangeSheet($i);
			foreach ($Reader as $Row)
	        {
	        	$html.="<tr>";
				/* Check If sheet not emprt */
		        $folio = isset($Row[0]) ? $Row[0] : '';
				$id_insumo = isset($Row[1]) ? $Row[1] : ''; 
				$nombre_insumo = isset($Row[2]) ? $Row[2] : ''; 
				$unidad = isset($Row[3]) ? $Row[3] : '';
				$cantidad = isset($Row[4]) ? $Row[4] : ''; 
				$semana = isset($Row[5]) ? $Row[5] : '';
				
				$html.="<td>".$folio."</td>";
				$html.="<td>".$id_insumo."</td>"; 
				$html.="<td>".$nombre_insumo."</td>"; 
				$html.="<td>".$unidad."</td>";
				$html.="<td>".$cantidad."</td>"; 
				$html.="<td>".$semana."</td>"; 

				
				$html.="</tr>";

			$stmt=$db_con->prepare("INSERT INTO salida_insumo(folio, id_insumo, nombre_insumo, unidad, cantidad, num_semana, estatus, fecha, hora)VALUES('$folio','$id_insumo','$nombre_insumo','$unidad','$cantidad','$semana','EDITABLE','$fecha','$hora')");  
/**
			$stmt2=$db_con->prepare("INSERT INTO bitacora_obra(folio_orden,usuario,fecha,hora,reporte,accion)
					VALUES('$folio','$usuario','$fecha','$hora','$descripcion','INSUMO CREADO')");   

			$stmt3=$db_con->prepare("DELETE FROM bitacora_obra WHERE folio_orden=''");  
**/

				 
				if($stmt->execute())
				{ 
				//echo "OK"; 
				//header("location:javascript://history.go(-1)");
				}
				else{
				//echo "Problemas al agregar Insumo!!!";
				} 
/**
				if($stmt2->execute())
				{ 
				//echo "OK"; 
				//header("location:javascript://history.go(-1)");
				}
				else{
				//echo "Problemas al crear Bitacora!!!";
				} 

				if($stmt3->execute())
				{ 
				//echo "OK"; 
				//header("location:javascript://history.go(-1)");
				}
				else{
				//echo "Problemas al crear Bitacora!!!";
				}
**/
				
	        }

		}

		$html.="</table>";
		echo $html; 


		//echo "<br />Datos Insertados Correctamente!!!";
	}else { 
		die("<br/>Sorry, File type is not allowed. Only Excel file.");  
	
	}

}

?> 
<form>
	<input type="button" value="Hecho!!! Pulse aquí para regresar" onClick="javascript:history.go(-1)" />
</form>