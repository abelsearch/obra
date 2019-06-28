<?php include('smenu.php'); ?>
<?php 
if($_SESSION['tipo']== 1){
?>  
<?php include('menu.php'); ?>   
<script src="crud_cliente/menu_iconos.js" type="text/javascript"></script>      
<?php
} 
if($_SESSION['tipo']== 2){ 
?> 
<?php include('menu_operador.php'); ?> 
<script src="crud_cliente/menu_iconos.js" type="text/javascript"></script>
<?php 
} 
if($_SESSION['tipo']== 3){
?>  
<?php include('menu_invitado.php'); ?>
<?php
} 
?>
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
    <script src="crud_cliente/cliente.js" type="text/javascript"></script>
    
        
    <title>Clientes</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col m12">
          <div id="title">
            <h2 class="form-signin-heading"> CLIENTES</h2>
          </div>
          <table class="striped responsive-table centered" id="example">
            <thead>
              <tr>
                <!--<th>Razón Social</th>-->
                <th>Nombre Comercial</th>
                <th>Estado</th>
                <th>Ciudad</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Contacto</th>
                <th>VER</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require_once 'db_config.php';
              $stmt=$db_con->prepare("SELECT * FROM cliente ORDER BY nombre_comercial");
              $stmt->execute();
              while($row=$stmt->fetch(PDO::FETCH_ASSOC))
              {
              ?>
              <tr>
                <!--<td>--><?php //echo $row['razon_social']; ?><!--</td>-->
                <td><?php echo $row['nombre_comercial']; ?></td>
                <td><?php echo $row['estado']; ?></td>
                <td><?php echo $row['ciudad']; ?></td>
                <td><?php echo $row['telefono']; ?></td>
                <td><?php echo $row['correo']; ?></td>
                <td><?php echo $row['nombre_contacto']; ?></td>
                <td align="center">
                  <center>
                  <a id="<?php echo $row['id']; ?>" class="ver modal-trigger tooltipped" data-position="top" data-tooltip="Ver" href="#">
                    <!--<button id="" class='ver modal-trigger trigger'>-->
                  <i class="material-icons  black-text  center">visibility</i></a>
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
    <!-- Modal Structure -->
    <div id="modal1" class="modal bottom-sheet #e0e0e0 grey lighten-2">
      <div class="modal-content">
        <h5>CREAR CLIENTE</h5>
        <br>
        <div class="form-group">
          <label>Razón Social<input type="text" name="razon_social" id="razon_social" required></label>
        </div>
        
        <div class="form-group">
          <label>Nombre Comercial<input type="text" name="nombre_comercial" id="nombre_comercial" required></label>
        </div>
        
        <div class="form-group">
          <label>RFC<input type="text" name="rfc" id="rfc" required></label>
        </div>
        
        <div class="form-group">
          <label>Calle<input type="text" name="calle" id="calle" required></label>
        </div>
        
        <div class="form-group">
          <label>Colonia<input type="text" name="colonia" id="colonia" required></label>
          
        </div>
        
        <div class="form-group">
          <label>Número<input type="text" name="numero" id="numero" required></label>
          
        </div>
        <div class="form-group">
          <label>Código Postal<input type="text" name="codigo_postal" id="codigo_postal" required></label>
          
        </div>
        <div class="form-group">
          <label>Ciudad<input type="text" name="ciudad" id="ciudad" required></label>
        </div>
        <div class="form-group">
          <label>Estado<input type="text" name="estado" id="estado" required></label>
        </div>
        <div class="form-group">
          <label>Teléfono<input type="text" name="telefono" id="telefono" required></label>
        </div>
        <div class="form-group">
          <label>Contacto<input type="text" name="nombre_contacto" id="nombre_contacto" required></label>
        </div>
        <div class="form-group">
          <label>Correo<input type="text" name="correo" id="correo" required></label>
        </div>
        <br>
        <button class="btn waves-effect  #757575 indigo darken-1 z-depth-5" type="submit" id="enviar" name="action">Crear
        <i class="material-icons right">send</i>
        </button>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect btn-flat" id="cancel"><i class="material-icons">close</i></a>
      </div>
    </div>
    <!-- Modal Structure -->
    <div id="modal2" class="modal bottom-sheet #e0e0e0 grey lighten-2">
      <div class="modal-content2">
        
      </div>
      <br>
      <center><button class="btn waves-effect  #757575 indigo darken-1 z-depth-5" type="submit" id="enviar2" name="action">Editar
      <i class="material-icons right">send</i>
      </button></center>
      <br>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect btn-flat" id="cancel"><i class="material-icons">close</i></a>
      </div>
    </div>
    
    <!-- Modal Structure -->
    <div id="modal3" class="modal bottom-sheet #e0e0e0 grey lighten-2">
      <div class="modal-content3">
        
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect btn-flat" id="cancel"><i class="material-icons">close</i></a>
      </div>
    </div>
  </body>
</html>
<!-- Buscador -->
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
<script>
$("#search").click(function(){
document.getElementById("example").focus();
});
</script>
<style>
table:focus, table:active {
color: green;
}
</style>