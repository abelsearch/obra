<?php
require('../library/php-excel-reader/excel_reader2.php');
require('../library/SpreadsheetReader.php');
require('../db_config.php');
	
if(isset($_POST['Submit'])){ 

	$fecha=date('Y-m-d');

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
			<td>RFC</td>
			<td>Razón Social</td>
            <td>Nombre Comercial</td>
            <td>Domicilio</td>
            <td>Contacto</td>     
            <td>Correo</td>
            <td>Telefono</td>
            <td>Ciudad</td>         
            <td>Estatus</td>
		</tr>";

		/* For Loop for all sheets */
		for($i=0;$i<$totalSheet;$i++){

			$Reader->ChangeSheet($i);
			foreach ($Reader as $Row)
	        {
	        	$html.="<tr>";
				/* Check If sheet not emprt */ 
				$rfc = isset($Row[0]) ? $Row[0] : '';
		        $razon_social = isset($Row[1]) ? $Row[1] : '';
				$nombre = isset($Row[2]) ? $Row[2] : '';
				$domicilio = isset($Row[3]) ? $Row[3] : '';  
				$contacto = isset($Row[4]) ? $Row[4] : '';
				$correo = isset($Row[5]) ? $Row[5] : ''; 
				$telefono = isset($Row[6]) ? $Row[6] : ''; 
				$ciudad = isset($Row[7]) ? $Row[7] : ''; 
				$estado = isset($Row[8]) ? $Row[8] : ''; 
				 
				$html.="<td>".$rfc."</td>"; 
				$html.="<td>".$razon_social."</td>"; 
				$html.="<td>".$nombre."</td>"; 
				$html.="<td>".$domicilio."</td>"; 
				$html.="<td>".$contacto."</td>"; 
				$html.="<td>".$correo."</td>";
				$html.="<td>".$telefono."</td>"; 
				$html.="<td>".$ciudad."</td>";
				$html.="<td>".$estado."</td>";
				$html.="</tr>"; 

				

$stmt=$db_con->prepare("INSERT INTO proveedor( 
	rfc,	
	razon_social,
	nombre,
	domicilio, 
	contacto, 
	correo, 
	telefono, 
	ciudad,
	estado,
	estatus,
	fecha
	)VALUES( 
	'$rfc',	
	'$razon_social',
	'$nombre',
	'$domicilio', 
	'$contacto', 
	'$correo', 
	'$telefono', 
	'$ciudad',
	'$estado',
	'ACTIVO',
	'$fecha'
	)");  
				
				if($stmt->execute())
				{ 
				//echo "OK"; 
				//die("location:javascript://history.go(-1)");   
				//header('HTTP/1.0 302 Found');
				//header("location:javascript://history.go(-1)");	
				//exit();
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