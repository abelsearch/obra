

<?php
include_once '../db_config.php';
if(!empty($_POST['folio'])){
    $data = array();
    $folio = $_POST['folio'];
    //create connection and select DB
    $db = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if($db->connect_error){
        die("No fué posible conectarse con la bd: " . $db->connect_error);
    }
    
    //get user data from the database
    $query = $db->query("SELECT * FROM orden_compra WHERE folio = '$folio'");
    
    if($query->num_rows > 0){
        $userData = $query->fetch_assoc();
        $data['status'] = 'ok';
        $data['result'] = $userData;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    
    //returns data as JSON format
    echo json_encode($data);
}
?>