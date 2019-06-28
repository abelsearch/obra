<?php
    $servername = "192.185.131.25";
    $username   = "seicolag_cadmin";
    $password   = "@seicolagc@@";
    $dbname     = "seicolag_constructora";
    $id_modelo = $_POST['id_modelo'];
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
-
    $sql = "SELECT c.partida as partida, c.descripcion as descripcion, c.unidad as unidad, 
                   c.cantidad as cantidad,c.precio_unitario as precio_unitario, c.importe as importe, e.nombre as etapa 
                   FROM modelo_concepto c INNER JOIN etapa_modelo e ON c.etapa=e.id WHERE c.id_modelo = '$id_modelo'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $arreglo = '<table><thead class="color-menu white-text"><tr style="font-size:12px"><th>Etapa</th><th>Partida</th><th>Descripción</th><th>Unidad</th><th>Cantidad</th><th>P Unitario</th><th>Importe</th></tr></thead><tbody>';
        while($row = mysqli_fetch_assoc($result)) {
            $arreglo .= '<tr><td class="color-smenu white-text" style="font-size:12px">';
            $arreglo .= $row['etapa'];
            $arreglo .= '</td><td style="font-size:12px">';
            $arreglo .= '<input type="text" value="'.$row['partida'].'">';                    
            $arreglo .= '</td><td style="font-size:12px">';
            $arreglo .= '<input type="text" value="'.$row['descripcion'].'">';
            $arreglo .= '</td><td style="font-size:12px">';
            $arreglo .= $row['unidad'];
            $arreglo .= '</td><td style="font-size:12px">';
            $arreglo .= $row['cantidad'];
            $arreglo .= '</td><td style="font-size:12px">';
            $arreglo .= $row['precio_unitario'];
            $arreglo .= '</td><td style="font-size:12px">';
            $arreglo .= $row['importe'];
            $arreglo .= '</td><tr>';                    
        }
    } else {    
        echo "0 resultados para este MODELO";
    }
    $arreglo .= '</tbody></table>';
    echo json_encode($arreglo);
    mysqli_close($conn);          
/*
$servername = "192.185.131.25";
$username   = "seicolag_cadmin";
$password   = "@seicolagc@@";
$dbname     = "seicolag_constructora";

$id_modelo = $_POST['id_modelo'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM modelo_concepto WHERE id_modelo = '1'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $arreglo  = "<tr><td>".$row["etapa"]."<td>".$row["partida"]."<td>".$row["descripcion"]."<td>".$row["unidad"]."<td>".$row["cantidad"]."<td>".$row["precio_unitario"]."<td>".$row["importe"]."<tr>";
        /*$arreglo .= "</td>";
        $arreglo .= '<td>'.$row['partida'].'</td>';
        $arreglo .= '<td>'.$row['descripcion'];
        $arreglo .= '<td>'.$row['unidad'];
        $arreglo .= '<td>'.$row['cantidad'];
        $arreglo .= '<td>'.$row['precio_unitario'];
        $arreglo .= '<td>'.$row['importe'].'<tr>';*//*
    }
} else {    
    echo "0 resultados para este folio";
}
echo json_encode($arreglo);
mysqli_close($conn);*/
?>