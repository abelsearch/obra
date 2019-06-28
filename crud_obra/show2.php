<?php    
header('Content-Type: application/json'); 
define('DB_HOST', '192.185.131.25');
define('DB_USERNAME', 'seicolag_cadmin');
define('DB_PASSWORD', '@seicolagc@@');
define('DB_NAME', 'seicolag_constructora'); 
$id = $_GET['id']; 
//var_dump($id);
//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
/*
if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}
*/
//$query = $mysqli->query("SELECT num_semana,concepto FROM semana WHERE folio = 'OBRA-56'"); 

    /*
    if($query->num_rows > 0){
        $userData = $query->fetch_assoc();
        $data['status'] = 'ok';
        $data['result'] = $userData;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    */
    //returns data as JSON format
    //echo json_encode($data);

//query to get data from the table
$query = sprintf("SELECT num_semana,concepto FROM semana WHERE folio = '$id'");

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