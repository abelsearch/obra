<?php
require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
require('../db_config.php');
	
if(isset($_POST['Submit'])){ 
	$fecha = $_POST['fecha']; 
	$hora = $_POST['hora']; 
	$usuario = $_POST['usuario']; 
	$semana = $_POST['semana'];


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
		<td>Semana</td>
		<td>Concepto</td> 
		<td>Costo</td>
		</tr>";

		/* For Loop for all sheets */
		for($i=0;$i<$totalSheet;$i++){

			$Reader->ChangeSheet($i);
			foreach ($Reader as $Row)
	        {
	        	$html.="<tr>";
				/* Check If sheet not emprt */
		        $folio_orden = isset($Row[0]) ? $Row[0] : '';
				$semana = isset($Row[1]) ? $Row[1] : ''; 
				$concepto = isset($Row[2]) ? $Row[2] : ''; 
				$costo = isset($Row[3]) ? $Row[3] : '';
				
				$html.="<td>".$folio_orden."</td>";
				$html.="<td>".$semana."</td>"; 
				$html.="<td>".$concepto."</td>"; 
				$html.="<td>".$costo."</td>";
				$html.="</tr>";

				 $stmt=$db_con->prepare("INSERT INTO avance_adicional(folio, num_semana, fecha, concepto, costo)VALUES('$folio_orden','$semana','$fecha','$concepto','$costo')");  

				 $stmt2=$db_con->prepare("INSERT INTO bitacora_obra(folio_orden,usuario,fecha,hora,reporte,accion)
					VALUES('$folio_orden','$usuario','$fecha','$hora','$concepto','CONCEPTO AGREGADO')"); 


				 
				if($stmt->execute())
				{ 
				//echo "OK"; 
				//header("location:javascript://history.go(-1)");
				}
				else{
				//echo "Problemas al agregar Insumo!!!";
				} 

				if($stmt2->execute())
				{ 
				//echo "OK"; 
				//header("location:javascript://history.go(-1)");
				}
				else{
				echo "Problemas al crear Bitacora!!!";
				}

				
	        }

		}

		$html.="</table>";
		echo $html; 


		//echo "<br />Datos Insertados Correctamente!!!";
	}else { 
		die("<br/>SOLO ARCHIVOS EXCEL!!!");  
	
	}

}

?> 
<form>
	<input type="button" value="Hecho!!! Pulse aquí para regresar" onClick="javascript:history.go(-1)" />
</form>