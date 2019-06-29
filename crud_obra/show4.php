<?php    
header('Content-Type: application/json');
define('DB_HOST', '192.185.131.25');
define('DB_USERNAME', 'seicolag_cadmin');
define('DB_PASSWORD', '@seicolagc@@');
define('DB_NAME', 'seicolag_constructora');

$id = $_GET['id'];

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}


//query to get data from the table
$query = sprintf("SELECT SUM(cantidad) as cantidad, nombre_insumo  FROM salida_insumo  WHERE folio = '$id' GROUP BY nombre_insumo"); 
//

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);

?>