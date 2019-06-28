

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
    $query = $db->query("SELECT orden_compra.folio AS folio_orden, orden_compra.folio_obra AS folio_obra,
        orden_compra.id_proveedor AS id_proveedor, orden_compra.total AS total, orden_compra.iva AS iva, 
        orden_compra.subtotal AS subtotal, orden_compra.comentarios AS comentarios, orden_compra.usuario AS usuario,
        orden_compra.estatus AS estatus, orden_compra.fecha AS fecha_orden, proveedor.nombre AS nombre_proveedor
        FROM orden_compra INNER JOIN proveedor ON orden_compra.id_proveedor = proveedor.id WHERE folio = '$folio'");

    
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