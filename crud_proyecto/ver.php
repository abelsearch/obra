<?php
$servername = "192.185.131.25";
$username   = "seicolag_cadmin";
$password   = "@seicolagc@@";
$dbname     = "seicolag_constructora";

$id_proyecto = $_POST['ver_id'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM obra WHERE proyecto_id = '$id_proyecto'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $arreglo .= '<tr><td class="#00897b teal darken-1 white-text" style="font-size:10px">';
        $arreglo .= $row['folio'];
        $arreglo .= '</td><td>';
        $arreglo .= '<input type="text" value="'.$row['titulo'].'" style="font-size:9px" id="'.$row['id'].'_titulo_obra">';                    
        $arreglo .= '</td><td>';
        $arreglo .= '<input type="text" value="'.$row['contrato'].'" style="font-size:9px" id="'.$row['id'].'_contrato">';
        $arreglo .= '</td><td>';
        $arreglo .= '<input type="text" value="'.$row['zona'].'" style="font-size:9px" id="'.$row['id'].'_manzana">';
        $arreglo .= '</td><td>';
        $arreglo .= '<input type="text" value="'.$row['lote'].'" style="font-size:9px" id="'.$row['id'].'_lote_obra">';
        $arreglo .= '</td><td>';
        $arreglo .= '<input type="text" value="'.$row['contratista'].'" style="font-size:9px" id="'.$row['id'].'_contratista">';
        $arreglo .= '</td><td>';
        $arreglo .= '<input type="text" value="'.$row['num_contratista'].'" style="font-size:9px" id="'.$row['id'].'_num_contratista">';
        $arreglo .= '</td><td>';
        $arreglo .= '<input type="text" value="'.$row['residente_obra'].'" style="font-size:9px" id="'.$row['id'].'_residente">';
        $arreglo .= '</td><td>';
        $arreglo .= '<input type="text" value="'.$row['num_residente'].'" style="font-size:9px" id="'.$row['id'].'_num_residente">';
        $arreglo .= '</td><td class="center">';
        $arreglo .= '<a style="cursor: pointer"onClick="editar_obra(\''.$row['id'].'\');" id="'.$row['id'].'"><i class="material-icons green-text center">edit</i></a>';
        $arreglo .= '</td><td class="center">';
        
        $arreglo .= '<a style="cursor: pointer"onClick="dirigir_obra(\''.$row['folio'].'\',\''.$row['id_modelo']. '\');" id="'.$row['id'].'"><i class="material-icons blue-text center">add_to_home_screen</i></a>';
        $arreglo .= '</td></tr>';      



    }
} else {    
    echo "0 resultados para este folio";
}
echo json_encode($arreglo);
mysqli_close($conn);
  ?>