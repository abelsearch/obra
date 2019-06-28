<?php
            $servername = "192.185.131.25";
            $username   = "seicolag_cadmin";
            $password   = "@seicolagc@@";
            $dbname     = "seicolag_constructora";
            $id_compra = $_POST['folio'];
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM orden_insumo WHERE id_orden = '$id_compra'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                $arreglo = '<table><thead class="orange white-text"><tr><th>Insumo</th><th>P Unitario</th><th>Cantidad</th><th>Importe</th><th>Fecha Registro</th></tr></thead><tbody>';
                while($row = mysqli_fetch_assoc($result)) {
                    $arreglo .= '<tr><td class="#00897b teal darken-1 white-text">';
                    $arreglo .= $row['insumo'];
                    $arreglo .= '</td><td>';
                    $arreglo .= $row['precio_unitario'];                    
                    $arreglo .= '</td><td>';
                    $arreglo .= $row['cantidad'];
                    $arreglo .= '</td><td>';
                    $arreglo .= $row['importe'];
                    $arreglo .= '</td><td>';
                    $arreglo .= $row['fecha'];
                    $arreglo .= '</td></tr>';                    
                }
            } else {    
                echo "0 resultados para este folio";
            }
            $arreglo .= '</tbody></table>';
            echo json_encode($arreglo);
            mysqli_close($conn);
          ?>