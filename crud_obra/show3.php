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
//$query = sprintf("SELECT num_semana,adicional FROM semana WHERE folio = '$id'"); 
$query = sprintf("SELECT SUM(ac.cantidad) AS total FROM avance_concepto ac WHERE ac.unidad='M2' AND ac.folio='$id'");

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