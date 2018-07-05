<?php 
session_start(); 
?> 

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <script src="js/materialize.min.js" type="text/javascript"></script>
    
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    

    <title>Clientes</title>
  </head>
  <body> 
  <?php include('menu.php'); ?> 
    <div class="container">  
    <div class="row"> 
    <div class="col m12">  
    <div id="title"> 
    <h2 class="form-signin-heading"> CLIENTES</h2> 
    </div>
    <div id="buttons">
    <button class="btn #757575 grey darken-1 z-depth-5 modal-trigger" type="button" id="trigger">
    <i class="material-icons white-text left ">add_circle</i>Nuevo</button> 
    </div>
        <table class="striped responsive-table centered" id="example"> 
    <thead>
        <tr>
          <th>Razón Social</th> 
          <th>Nombre Comercial</th> 
          <th>Estado</th> 
          <th>Ciudad</th> 
          <th>Telefono</th> 
          <th>Correo</th> 
          <th>Contacto</th> 
          <th>VER</th>  
          <th>EDITAR</th> 
          <th>ELIMINAR</th>
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
      <td><?php echo $row['razon_social']; ?></td> 
      <td><?php echo $row['nombre_comercial']; ?></td>
      <td><?php echo $row['estado']; ?></td> 
      <td><?php echo $row['ciudad']; ?></td>
      <td><?php echo $row['telefono']; ?></td>
      <td><?php echo $row['correo']; ?></td>
      <td><?php echo $row['nombre_contacto']; ?></td>

      <td align="center">  
      <center>
      <a id="<?php echo $row['id']; ?>" class="ver modal-trigger" href="#" title="Ver"> 
      <!--<button id="" class='ver modal-trigger trigger'>-->
      <i class="material-icons  black-text  center">visibility</i></a> 
      
      </center>
      </td>  

      <td align="center">  
      <center>
      <a id="<?php echo $row['id']; ?>" class="editar modal-trigger" href="#" title="Editar">
      <i class="material-icons black-text  center">edit</i> 
      </a>
      </center>
      </td> 
      
      <td align="center">  
      <center>
      <a id="<?php echo $row['id']; ?>" class="eliminar" href="#" title="Eliminar">
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
                <label>Numero<input type="text" name="numero" id="numero" required></label>
              
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
                 <label>Telefono<input type="text" name="telefono" id="telefono" required></label>
              </div> 

              <div class="form-group">
                 <label>Contacto<input type="text" name="nombre_contacto" id="nombre_contacto" required></label>
              </div> 

              <div class="form-group">
                 <label>Correo<input type="text" name="correo" id="correo" required></label>
              </div>
              <br>
              <button class="btn waves-effect  #757575 grey darken-1 z-depth-5" type="submit" id="enviar" name="action">Crear
          <i class="material-icons right">send</i>
          </button>
          </div>
          <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect btn-flat" id="cancel"><i class="material-icons">close</i></a>
          </div>
        </div> 

         <script> 
        $(document).ready(function(){
        $( "#trigger" ).click(function(){ 
          $('#modal1').modal();
        $('#modal1').modal('open');
        });
        $( "#cancel" ).click(function(){
          $('#modal1').modal();
        $('#modal1').modal('close');
        });
        });
        </script> 
       
<script>
        $('#enviar').click(function(){
        var c_razon_social = document.getElementById('razon_social');
        var c_nombre_comercial = document.getElementById('nombre_comercial');
        var c_rfc = document.getElementById('rfc');
        var c_calle = document.getElementById('calle');
        var c_colonia = document.getElementById('colonia');
        var c_numero = document.getElementById('numero'); 
        var c_codigo_postal = document.getElementById('codigo_postal'); 
        var c_ciudad = document.getElementById('ciudad'); 
        var c_estado = document.getElementById('estado');
        var c_telefono = document.getElementById('telefono');
        var c_nombre_contacto = document.getElementById('nombre_contacto');
        var c_correo = document.getElementById('correo');
        var razon_social =(c_razon_social.value);
        var nombre_comercial =(c_nombre_comercial.value);
        var rfc =(c_rfc.value);
        var calle =(c_calle.value);
        var colonia =(c_colonia.value);
        var numero =(c_numero.value); 
        var codigo_postal =(c_codigo_postal.value); 
        var ciudad =(c_ciudad.value); 
        var estado =(c_estado.value);
        var telefono =(c_telefono.value);
        var nombre_contacto =(c_nombre_contacto.value);
        var correo =(c_correo.value); 
        if(razon_social==''||nombre_comercial==''||rfc==''||calle==''||colonia==''||numero==''||codigo_postal==''||ciudad==''||estado==''||telefono==''||nombre_contacto==''||correo=='')
        {
        alert("POR FAVOR LLENE TODOS LOS CAMPOS!!!");
        }
        else
        {
        $.ajax
        ({
        url: 'crud_cliente/crear.php',
        data: {"razon_social": razon_social, "nombre_comercial": nombre_comercial, "rfc": rfc, "calle": calle, "colonia": colonia ,"numero": numero, "codigo_postal":codigo_postal,"ciudad":ciudad,"estado":estado,"telefono":telefono,"nombre_contacto":nombre_contacto,"correo":correo},
        type: 'post',
        success: function(result)
        {
           window.location.reload();
        }
        });
        }
        });
        </script>  

 <!-- Modal Structure -->
        <div id="modal2" class="modal bottom-sheet #e0e0e0 grey lighten-2">
          <div class="modal-content2"> 
          
          </div> 
          <br> 
           <center><button class="btn waves-effect  #757575 grey darken-1 z-depth-5" type="submit" id="enviar2" name="action">Editar
          <i class="material-icons right">send</i>
          </button></center>
          <br>
          <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect btn-flat" id="cancel"><i class="material-icons">close</i></a>
          </div>
        </div>
 

        <script> 
          $(document).ready(function(){
 $('.editar').click(function(){
   var id = $(this).attr("id");
   var edit_id = id;
   // AJAX request
   $.ajax({
    url: 'crud_cliente/editar_cliente.php',
    type: 'post',
    data: {edit_id: edit_id},
    success: function(response){ 
      // Add response in Modal body
      $('.modal-content2').html(response);
      $('#modal2').modal(); 
      $('#modal2').modal('open');    
    }
  });
 });
});
</script> 

     

<script>
        $('#enviar2').click(function(){ 
        var e_id = document.getElementById('id2');  
        var e_razon_social = document.getElementById('razon_social2');
        var e_nombre_comercial = document.getElementById('nombre_comercial2');
        var e_rfc = document.getElementById('rfc2');
        var e_calle = document.getElementById('calle2');
        var e_colonia = document.getElementById('colonia2');
        var e_numero = document.getElementById('numero2'); 
        var e_codigo_postal = document.getElementById('codigo_postal2'); 
        var e_ciudad = document.getElementById('ciudad2'); 
        var e_estado = document.getElementById('estado2');
        var e_telefono = document.getElementById('telefono2');
        var e_nombre_contacto = document.getElementById('nombre_contacto2');
        var e_correo = document.getElementById('correo2'); 
        var id =(e_id.value);
        var razon_social =(e_razon_social.value);
        var nombre_comercial =(e_nombre_comercial.value);
        var rfc =(e_rfc.value);
        var calle =(e_calle.value);
        var colonia =(e_colonia.value);
        var numero =(e_numero.value); 
        var codigo_postal =(e_codigo_postal.value); 
        var ciudad =(e_ciudad.value); 
        var estado =(e_estado.value);
        var telefono =(e_telefono.value);
        var nombre_contacto =(e_nombre_contacto.value);
        var correo =(e_correo.value); 
        if(id==''||razon_social==''||nombre_comercial==''||rfc==''||calle==''||colonia==''||numero==''||codigo_postal==''||ciudad==''||estado==''||telefono==''||nombre_contacto==''||correo=='')
        {
        alert("POR FAVOR LLENE TODOS LOS CAMPOS!!!");
        }
        else
        {
        $.ajax
        ({
        url: 'crud_cliente/editar.php',
        data: {"id": id, "razon_social": razon_social, "nombre_comercial": nombre_comercial, "rfc": rfc, "calle": calle, "colonia": colonia ,"numero": numero, "codigo_postal":codigo_postal,"ciudad":ciudad,"estado":estado,"telefono":telefono,"nombre_contacto":nombre_contacto,"correo":correo},
        type: 'post',
        success: function(result)
        {
        window.location.reload()
        }
        });
        }
        });
        </script> 



        <!-- Modal Structure -->
        <div id="modal3" class="modal bottom-sheet #e0e0e0 grey lighten-2">
          <div class="modal-content3"> 
          
          </div>
          <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect btn-flat" id="cancel"><i class="material-icons">close</i></a>
          </div>
        </div>
        <script> 
          $(document).ready(function(){
 $('.ver').click(function(){
   var id = $(this).attr("id");
   var ver_id = id;
   // AJAX request
   $.ajax({
    url: 'crud_cliente/ver.php',
    type: 'post',
    data: {ver_id: ver_id},
    success: function(response){ 
      // Add response in Modal body
      $('.modal-content3').html(response);
      $('#modal3').modal(); 
      $('#modal3').modal('open');    
    }
  });
 });
});
</script>
      
      <!--</div>--> 
        <script>
          $(".eliminar").click(function()
          {
          var id = $(this).attr("id");
          var del_id = id;
          if(confirm('Eliminar?'))
          {
          $.post('crud_cliente/eliminar.php', {'del_id':del_id}, function(data)
          { 
          window.location.reload();
          }); 
          }
          return false;
          });
        </script>
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