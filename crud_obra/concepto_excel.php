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
		<td>Etapa</td> 
		<td>Partida</td>
		<td>Descripción</td> 
		<td>Unidad</td> 
		<td>Cantidad</td>
		<td>Precio</td> 
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
				$etapa = isset($Row[1]) ? $Row[1] : '';
				$partida = isset($Row[2]) ? $Row[2] : '';
				$descripcion = isset($Row[3]) ? $Row[3] : ''; 
				$unidad = isset($Row[4]) ? $Row[4] : ''; 
				$cantidad = isset($Row[5]) ? $Row[5] : ''; 
				$precio = isset($Row[6]) ? $Row[6] : ''; 
				$semana = isset($Row[7]) ? $Row[7] : ''; 
				$html.="<td>".$folio."</td>"; 
				$html.="<td>".$etapa."</td>"; 
				$html.="<td>".$partida."</td>";
				$html.="<td>".$descripcion."</td>"; 
				$html.="<td>".$unidad."</td>"; 
				$html.="<td>".$cantidad."</td>"; 
				$html.="<td>".$precio."</td>"; 
				$html.="<td>".$semana."</td>";
				$html.="</tr>"; 

$stmt=$db_con->prepare("INSERT INTO concepto(etapa,
	folio,
	partida,
	descripcion,
	unidad,
	cantidad,
	res_cantidad,
	est_cantidad,
	precio_unitario,
	importe,
	est_importe,
	p_concepto,
	p_presupuesto,
	fecha,
	hora)VALUES('$etapa',
	'$folio',
	'$partida',
	'$descripcion',
	'$unidad',
	$cantidad,
	$cantidad,
	0,
	$precio,
	$precio*$cantidad,
	0,
	0,
	0,
	'$fecha',
	'$hora')");  

				//$stmt2=$db_con->prepare("INSERT INTO avance_concepto(folio,num_semana,fecha,concepto,costo)VALUES('$folio','$semana','$fecha','$descripcion','$precio')");  

				//$stmt3=$db_con->prepare("INSERT INTO bitacora_obra(folio_orden,usuario,fecha,hora,reporte,accion)
				//	VALUES('$folio','$usuario','$fecha','$hora','$descripcion','CONCEPTO AGREGADO')"); 

				//$stmt4=$db_con->prepare("UPDATE semana SET concepto=concepto+'$costo'  WHERE folio = '$folio' AND num_semana = '$semana'"); 
 
				if($stmt->execute())
				{ 
				//echo "OK"; 
				//header("location:javascript://history.go(-1)");
				}
				else{
				echo "Problemas al agregar Concepto!!!";
				} 
				/**
				if($stmt2->execute())
				{ 
				//echo "OK"; 
				//header("location:javascript://history.go(-1)");
				}
				else{
				echo "Problemas al crear Bitacora!!!";
				} 

				if($stmt3->execute())
				{ 
				//echo "OK"; 
				//header("location:javascript://history.go(-1)");
				}
				else{
				echo "Problemas al crear Bitacora!!!";
				} 

				if($stmt4->execute())
				{ 
				//echo "OK"; 
				//header("location:javascript://history.go(-1)");
				}
				else{
				echo "Problemas al crear Bitacora!!!";
				}
				**/
				
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