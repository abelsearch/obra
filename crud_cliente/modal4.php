 <div id="modal4" class="modal">
        <div class="modal-content"> 
          <form method="POST" action='crud_cliente/cliente_excel.php' enctype="multipart/form-data"> 
            <div class="form-group">
              <label>Adjuntar Archivo Excel</label>
              <input type="file" name="file" class="form-control">
            </div>  
            <br> 
            <br>
            NOTA: El archivo excel no debe contener encabezados, solo los valores en 
            el siguiente orden: 
            <br>  
            <br>
            <table>
            <thead>
            <tr>
            <th>Razón Social</th>
            <th>Nombre Comercial</th>
            <th>RFC</th>
            <th>Calle</th>     
            <th>Colonia</th>
            <th>Número</th>
            <th>Código Postal</th>
            <th>Ciudad</th>               
            <th>Estado</th>
            <th>Telefono</th>
            <th>Nombre de contacto</th>
            <th>Correo</th>               
            </tr>
            </thead>
            </table>
            <div class="form-group"> 
             <input type="hidden" name="fecha" id="fecha" value="<?php echo date('Y-m-d');?>" readonly>
            </div> 
            
            <div class="form-group">
              <input type="hidden" name="hora" id="hora" value="<?php date_default_timezone_set("America/Mexico_City"); echo date('h:i:sa');?>" readonly>
            </div>  

            <div class="form-group">
            <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario']; ?>" readonly>   
            </div>
            <br>          
            <button class="btn waves-effect #757575 indigo darken-1 z-depth-5" type="submit" name="Submit">Agregar
            <i class="material-icons right">send</i>
            </button>
          </form>
        </div>
        <div class="modal-footer">
          <a href="#!" class=" modal-action modal-close btn-flat" id="cancel"><i class="material-icons">close</i></a>
        </div>
      </div>