<?php 

	$id = $_GET['id'];
	
	$conn = new mysqli("localhost","root","","tesis");
  	// CHECK CONNECTION
  	if ($conn->connect_error) {
    	die('Error de conexion: ' . $conn->connect_error);
  	}else{
  		$resultado = "SELECT id,igualdad,proteccion,identidad,salud,atencion,familia,educacion,prioridad,sin_violencia,integridad_personal,no_discriminacion FROM indicadores WHERE id = '$id'";
		$result = $conn->query($resultado);
		$fila = $result->fetch_assoc();
		$ejemplo = array (
			"id" => $fila['id'],
			"igualdad" => $fila['igualdad'],
		    "proteccion" => $fila['proteccion'],
		    "identidad" => $fila['identidad'],
		    "salud" => $fila['salud'],
		    "atencion" => $fila['atencion'],
		    "familia" => $fila['familia'],
		    "educacion" => $fila['educacion'],
		    "prioridad" => $fila['prioridad'],
		    "sin_violencia" => $fila['sin_violencia'],
		    "integridad_personal" => $fila['integridad_personal'],
		    "no_discriminacion" => $fila['no_discriminacion'] 
		);
		echo json_encode($ejemplo);
		mysqli_free_result($result);
							
		// Liberar resultados
  	}		
	
?>