<?php include('smenu.php'); ?>
<?php include('menu.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <script src="js/materialize.min.js" type="text/javascript"></script>
    <script src="crud_usuario/usuario.js" type="text/javascript"></script> 
    <script src="crud_usuario/menu_iconos_index.js" type="text/javascript"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      
  <title>Usuarios</title>
  </head>
  <body>
    
    <div class="container">
      <div class="row">
        <div class="col m12">
          <div id="title">
            <h2 class="form-signin-heading" style="font: 150% sans-serif;">USUARIOS</h2>
          </div>
          
          <table class="striped responsive-table " id="example">
            <thead class="orange">
              <tr>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Nombre de Usuario</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>Tipo de Usuario</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>VER</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>EDITAR</center></th>
                <th style="font: 150% sans-serif; font-size: 14px; color: white"><center>ELIMINAR</center></th>
                <!--</tr>-->
              </thead>
              <tbody>
                <?php
                require_once 'db_config.php';
                $stmt=$db_con->prepare("SELECT * FROM usuario");
                $stmt->execute();
                while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                ?>
                <!--<tr>-->
                <td><center><?php echo $row['nombre_usuario']; ?></center></td>
                <td><center><?php echo $row['tipo']; ?></center></td> 

                <td align="center">
                  <center>
                  <a id="<?php echo $row['id']; ?>" class="ver tooltipped" data-position="top" data-tooltip="Ver" href="#modal4">
                    <i class="material-icons black-text  center">remove_red_eye</i>
                  </a>
                  </center>
                </td>
                
                
                <td align="center">
                  <center>
                  <a id="<?php echo $row['id']; ?>" class="editar tooltipped" data-position="top" data-tooltip="Editar" href="#modal2">
                    <i class="material-icons black-text  center">edit</i>
                  </a>
                  </center>
                </td>

                <td align="center">
                  <center>
                  <a id="<?php echo $row['id']; ?>" class="eliminar tooltipped" data-position="top" data-tooltip="Eliminar" href="#">
                    <i class="material-icons red-text  center">delete</i>
                  </a>
                  </center>
                </td>
              </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Modal Zone -->
    <!-- Modal Structure -->
    <div id="modal1" class="modal">
      <div class="modal-content">
        <div class="form-group">
          <label>Clave<input type="text" name="clave" id="clave" required></label>
        </div> 

        <div class="form-group">
          <label>Nombre<input type="text" name="nombre" id="nombre" required></label>
        </div> 

        <div class="form-group">
          <label>A. Paterno<input type="text" name="paterno" id="paterno" required></label>
        </div> 

        <div class="form-group">
          <label>A. Materno<input type="text" name="materno" id="materno" required></label>
        </div> 

        <div class="form-group">
          <label>Fecha Nacimiento<input type="date" name="nacimiento" id="nacimiento" required></label>
        </div> 

        <div class="form-group">
          <label>Nombre de Usuario<input type="text" name="usuario" id="usuario" required></label>
        </div> 

        <div class="form-group">
          <label>Correo<input type="text" name="correo" id="correo" required></label>
        </div> 

        <div class="form-group">
          <label>Telefono<input type="text" name="tel" id="tel" required></label>
        </div> 

        <div class="form-group">
          <label>Departamento<input type="text" name="depto" id="depto" required></label>
        </div> 
        
        <div class="form-group">
          <label>Password<input type="password" name="password" id="password" required></label>
        </div>
        
        <div class="form-group">
          <label>Tipo de usuario</label>
          <select required  name="tipo" id="tipo" class="browser-default"required>
            <option value="">Selección:</option>
            <?php
            require_once 'db_config.php';
            $stmt=$db_con->prepare("SELECT * FROM tipo ORDER BY id");
            $stmt->execute();
            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
            {
            ?>
            <option  value="<?php echo$row['tipo'];?>"><?php echo $row['descripcion'];?>
              <?php
              }
              ?>
            </select>
          </div> 

          <div class="col l4 m12 s12">
            <input type="hidden" name="fecha" id="fecha" value="<?php echo date('Y-m-d');?>" readonly>
            <input type="hidden" name="hora" id="hora" value="<?php date_default_timezone_set("America/Mexico_City"); echo date('h:i:s a');?>" readonly>
          </div>
          <br>
          <button class="btn waves orange z-depth-5" type="submit" id="enviar" name="action">Crear
          <i class="material-icons right">send</i>
          </button>
          
        </div>
        <div class="modal-footer">
          <a href="#!" class=" modal-action modal-close waves-effect btn-flat" id="cancel"><i class="material-icons">close</i></a>
        </div>
      </div>
      <!-- Modal Structure -->
      <div id="modal2" class="modal">
        <div class="modal-content2">
          
        </div>
        <center><button class="btn waves orange z-depth-5" type="submit" id="enviar2" name="action">Editar
        <i class="material-icons right">send</i>
        </button></center> 
        <br> 
        <center>
        <div class="form-group">
          <label>Tipo de usuario</label>
          <select name="type2" id="type2" class="browser-default" style="width:250px;">
            <option value="">Selección:</option>
            <?php
            require_once 'db_config.php';
            $stmt=$db_con->prepare("SELECT * FROM tipo ORDER BY id");
            $stmt->execute();
            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
            {
            ?>
            <option  value="<?php echo$row['tipo'];?>"><?php echo $row['descripcion'];?></option>
            <?php
            }
            ?>
          </select>
        </div>
        </center>
        <br>
        <center><button class="btn orange z-depth-5" type="submit" id="enviar3" name="action">Editar Tipo
        <i class="material-icons right">send</i>
        </button></center>
        <div class="modal-footer">
          <a href="#!" class=" modal-action modal-close waves-effect btn-flat" id="cancel"><i class="material-icons">close</i></a>
        </div>
      </div> 
<!-- Modulo de Permisos-->
      <div id="modal3" class="modal">
      <div class="modal-content"> 
      <center>Otorgar Permiso</center>
      <div class="form-group">
          <label>Usuario</label>
          <select required  name="tipo" id="p_usuario" class="browser-default"required>
            <option value="">Selección:</option>
            <?php
            require_once 'db_config.php';
            $stmt=$db_con->prepare("SELECT * FROM usuario ORDER BY id");
            $stmt->execute();
            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
            {
            ?>
            <option  value="<?php echo$row['id'];?>"><?php echo $row['nombre_usuario'];?>
              <?php
              }
              ?>
            </select>
          </div> 

        
        <div class="form-group">
          <label>Permiso</label>
          <select required  name="tipo" id="p_vista" class="browser-default"required>
            <option value="">Selección:</option>
            <option value="1">OBRAS</option> 
            <option value="2">COMPRAS</option> 
            <option value="3">PAGOS</option> 
            <option value="4">ALMACÉN</option> 
            <option value="5">CONCEPTOS</option> 
            <option value="6">INSUMOS</option> 
            <option value="7">PROVEEDORES</option> 
            <option value="8">CLIENTES</option> 
            <option value="9">USUARIOS</option>  
            </select>
          </div> 
          <br>
          <button class="btn waves orange z-depth-5" type="submit" id="permiso" name="action">Crear
          <i class="material-icons right">send</i>
          </button> 
          <br> 
          <center>Retirar Permiso</center>
      <div class="form-group">
          <label>Usuario</label>
          <select required  name="tipo" id="r_usuario" class="browser-default"required>
            <option value="">Selección:</option>
            <?php
            require_once 'db_config.php';
            $stmt=$db_con->prepare("SELECT * FROM usuario ORDER BY id");
            $stmt->execute();
            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
            {
            ?>
            <option  value="<?php echo$row['id'];?>"><?php echo $row['nombre_usuario'];?>
              <?php
              }
              ?>
            </select>
          </div> 

        
        <div class="form-group">
          <label>Permiso</label>
          <select required  name="tipo" id="r_vista" class="browser-default"required>
            <option value="">Selección:</option>
            <option value="1">OBRAS</option> 
            <option value="2">COMPRAS</option> 
            <option value="3">PAGOS</option> 
            <option value="4">ALMACÉN</option> 
            <option value="5">CONCEPTOS</option> 
            <option value="6">INSUMOS</option> 
            <option value="7">PROVEEDORES</option> 
            <option value="8">CLIENTES</option> 
            <option value="9">USUARIOS</option>  
            </select>
          </div> 
          <br>
          <button class="btn waves orange z-depth-5" type="submit" id="retirar" name="action">Retirar
          <i class="material-icons right">send</i>
          </button>
          
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close btn-flat" id="cancel"><i class="material-icons">close</i></a>
        </div>
      </div>
      
       <!-- Modal Structure -->
      <div id="modal4" class="modal">
        <div class="modal-content4">
          
        </div>
        <div class="modal-footer">
          <a href="#!" class=" modal-action modal-close waves-effect btn-flat" id="cancel"><i class="material-icons">close</i></a>
        </div>
      </div> 

    </div>
  </body>
</html>
<!-- Buscador
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" src="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"></script>
<script>
$(document).ready(function() {
$('#example').dataTable({
"iDisplayLength": 5,
"ordering": false,
//"searching": true,
"paging": false,
"ordering": false,
"info": false
});
})
</script>
<!-- Buscador -->