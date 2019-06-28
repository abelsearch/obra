<?php
require('../library/php-excel-reader/excel_reader2.php');
require('../library/SpreadsheetReader.php');
require('../db_config.php');
	
if(isset($_POST['Submit'])){ 

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
			<td>Razón Social</td>
            <td>Nombre Comercial</td>
            <td>RFC</td>
            <td>Calle</td>     
            <td>Colonia</td>
            <td>Número</td>
            <td>Código Postal</td>
            <td>Ciudad</td>               
            <td>Estado</td>
            <td>Telefono</td>
            <td>Nombre de contacto</td>
            <td>Correo</td>        
		</tr>";

		/* For Loop for all sheets */
		for($i=0;$i<$totalSheet;$i++){

			$Reader->ChangeSheet($i);
			foreach ($Reader as $Row)
	        {
	        	$html.="<tr>";
				/* Check If sheet not emprt */
		        $razon_social = isset($Row[0]) ? $Row[0] : '';
				$nombre = isset($Row[1]) ? $Row[1] : '';
				$rfc = isset($Row[2]) ? $Row[2] : '';
				$calle = isset($Row[3]) ? $Row[3] : ''; 
				$colonia = isset($Row[4]) ? $Row[4] : ''; 
				$numero = isset($Row[5]) ? $Row[5] : ''; 
				$codigo = isset($Row[6]) ? $Row[6] : ''; 
				$ciudad = isset($Row[7]) ? $Row[7] : ''; 
				$estado = isset($Row[8]) ? $Row[8] : ''; 
				$telefono = isset($Row[9]) ? $Row[9] : ''; 
				$contacto = isset($Row[10]) ? $Row[10] : ''; 
				$correo = isset($Row[11]) ? $Row[11] : ''; 
				 
				$html.="<td>".$razon_social."</td>"; 
				$html.="<td>".$nombre."</td>"; 
				$html.="<td>".$rfc."</td>";
				$html.="<td>".$calle."</td>"; 
				$html.="<td>".$colonia."</td>"; 
				$html.="<td>".$numero."</td>"; 
				$html.="<td>".$codigo."</td>"; 
				$html.="<td>".$ciudad."</td>";
				$html.="<td>".$estado."</td>"; 
				$html.="<td>".$telefono."</td>"; 
				$html.="<td>".$contacto."</td>"; 
				$html.="<td>".$correo."</td>";
								

				$html.="</tr>"; 

$stmt=$db_con->prepare("INSERT INTO cliente(
	razon_social,
	nombre_comercial,
	rfc,
	calle,
	colonia,
	numero,
	codigo_postal,
	ciudad,
	estado,
	telefono,
	nombre_contacto,
	correo
	)VALUES(
	'$razon_social',
	'$nombre',
	'$rfc',
	'$calle',
	'$colonia',
	'$numero',
	'$codigo',
	'$ciudad',
	'$estado',
	'$telefono',
	'$contacto',
	'$correo'
	)");  

	
 
				if($stmt->execute())
				{ 
				//echo "OK"; 
				//header("location:javascript://history.go(-1)");
				}
				else{
				echo "Problemas al agregar Concepto!!!";
				} 
				
				
	        }

		}

		$html.="</table>";
		echo $html; 

	}else { 
		die("<br/>SOLO ARCHIVOS EXCEL!!!");  
	
	}

}

?> 
<form>
	<input type="button" value="Hecho!!! Pulse aquí para regresar" onClick="javascript:history.go(-1)" />
</form>