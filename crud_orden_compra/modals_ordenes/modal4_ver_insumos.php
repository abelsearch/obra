<div id="modal4" class="modal">
      <div class="modal-content #eeeeee grey lighten-3">
        <h4 id="hmodal4"style="font: 150% sans-serif; font-size: 24px;">Insumos de la Orden</h4>
        <div class="row" id="row_editar_insumo">
          <?php/*
            $servername = "192.185.131.25";
            $username   = "seicolag_cadmin";
            $password   = "@seicolagc@@";
            $dbname     = "seicolag_constructora";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM orden_insumo WHERE id_orden = '6'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<label>".$row['insumo']."</label>";
                }
            } else {
                echo "0 results";
            }

            mysqli_close($conn);*/
          ?>
        </div>
        <div class=" col l2 m12 s12 offset-l10 modal-footer"style="background-color: rgba(1,1,1,0)">
          <a href="#!" class=" modal-action modal-close waves-effect btn-flat red white-text" id="cancel">Salir<i class="material-icons">close</i></a>
        </div>
      </div>
    </div>