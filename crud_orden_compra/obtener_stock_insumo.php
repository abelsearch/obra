<?php
include_once '../db_config.php';
//if(!empty($_POST['id_orden'])){
    //$data = array(); 
if($_POST){ 
    $id = $_POST['add_id'];
    //$nombre_insumo = $_POST['nombre_insumo'];
    //create connection and select DB
    $db = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if($db->connect_error){
        die("No fué posible conectarse con la bd: " . $db->connect_error);
    } 

    $stmt0=$db_con->prepare("SELECT id_insumo, cantidad, nombre_insumo FROM almacen WHERE id=:id");
    if($stmt0->execute(array(':id'=>$id)))
    {
    while($row=$stmt0->fetch(PDO::FETCH_ASSOC)){ 
    $id_insumo = $row['id_insumo'];   
    $cantidad = $row['cantidad']; 
    $nombre_insumo = $row['nombre_insumo'];
    } 

    $stmt=$db_con->prepare("INSERT INTO catalogo_insumo(nombre,unidad,saldo_inicial,entradas,salidas,stock)VALUES($nombre_insumo,'N/A',$cantidad,$cantidad,0,$cantidad)");  


    //get user data from the database
    //$query = $db->query("SELECT id_insumo , stock FROM almacen WHERE nombre_insumo = 'LAMPARAS LEDS'"); 
    //$query = $db->query("SELECT id_insumo, cantidad FROM almacen WHERE nombre_insumo = '$nombre_insumo'");

    /**
    if($query->num_rows > 0){
        $userData = $query->fetch_assoc();
        $data['status'] = 'ok';
        $data['result'] = $userData;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    **/
    //returns data as JSON format
    echo json_encode($data);
}
}
?>