<?php
//setting header to json
header('Content-Type: application/json');
require_once 'db_config.php'; 
//database
//database
define('DB_HOST', '192.185.131.25');
define('DB_USERNAME', 'seicolag_cadmin');
define('DB_PASSWORD', '@seicolagc@@');
define('DB_NAME', 'seicolag_constructora');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}


//query to get data from the table
$query = sprintf("SELECT folio,SUM(gasto) AS costo FROM obra GROUP BY folio ORDER BY gasto DESC LIMIT 5");
//$query = sprintf("SELECT descripcion,SUM(precio_unitario) AS costo FROM avance_concepto GROUP BY concepto");
//SELECT descripcion,SUM(precio_unitario) AS costo FROM concepto GROUP BY descripcion ORDER BY costo DESC LIMIT 5

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