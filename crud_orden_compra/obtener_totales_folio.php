<?php
include_once '../db_config.php';
if(!empty($_POST['id_orden'])){
    $data = array();
    $folio = $_POST['id_orden'];
    //create connection and select DB
    $db = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if($db->connect_error){
        die("No fué posible conectarse con la bd: " . $db->connect_error);
    }
    
    //get user data from the database
    //$query = $db->query("SELECT id, folio, folio_obra, total, iva, subtotal FROM orden_compra WHERE folio = '$folio'");
    $query = $db->query("SELECT orden_compra.id_proveedor, proveedor.nombre AS nombre, orden_compra.folio AS folio, 
    orden_compra.folio_obra AS folio_obra, orden_compra.subtotal AS subtotal, orden_compra.iva AS iva, orden_compra.total AS total 
    FROM orden_compra INNER JOIN proveedor ON orden_compra.id_proveedor=proveedor.id WHERE orden_compra.folio = '$folio'");

    
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