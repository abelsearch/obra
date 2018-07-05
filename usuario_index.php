<!--
<?php 
//session_start(); 
?> 
-->
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
    

    <title>Usuarios</title>
  </head>
  <body> 
  <?php include('menu.php'); ?> 
    <div class="container">  
    <div class="row"> 
    <div class="col m12">  
    <div id="title"> 
    <h2 class="form-signin-heading"> USUARIOS</h2> 
    </div>
    <div id="buttons">
    <button class="btn modal-trigger #757575 grey darken-1 z-depth-5" id="trigger"  href="#modal1">
    <i class="material-icons white-text left ">add_circle</i>Nuevo</button> 
    </div>
        <table class="striped responsive-table " id="example"> 
    <thead>
        <tr>
          <th><center>Nombre de Usuario</center></th> 
          <th><center>Tipo de usuario</center></th> 
          <th><center>EDITAR</center></th> 
          <th><center>ELIMINAR</center></th>
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
      <td><center><?php echo $row['nombre']; ?></center></td> 
      <td><center><?php echo $row['tipo']; ?></center></td>
    
      <td align="center">  
      <center>
      <a id="<?php echo $row['id']; ?>" class="editar" href="#" title="Editar">
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
          <!-- Modal Zone -->
        <!-- Modal Structure -->
        <div id="modal1" class="modal">
          <div class="modal-content"> 
          <form action="">
              <div class="form-group">
                <label>Nombre<input type="text" name="nombre" id="nombre" required></label>
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
              <br>
             
              <button class="btn waves-effect #757575 grey darken-1 z-depth-5" type="submit" id="enviar" name="action">Crear
              <i class="material-icons right">send</i>
              </button>
            </form>
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
        var u_nombre = document.getElementById('nombre');
        var u_password = document.getElementById('password');
        var u_tipo = document.getElementById('tipo'); 
        var nombre =(u_nombre.value);
        var password =(u_password.value); 
        var tipo =(u_tipo.value);  
        if(nombre==''||password==''||tipo=='')
        {
        alert("Por favor llene los campos!!!");
        } 
        else
        {    
        $.ajax
        ({
        url: 'crud_usuario/crear.php',
        data: {"nombre": nombre, "password": password, "tipo": tipo},
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
        <div id="modal2" class="modal">
          <div class="modal-content2">  
          
               </div>  
               <center><button class="btn waves-effect waves-light #757575 grey darken-1 z-depth-5" type="submit" id="enviar2" name="action">Editar
              <i class="material-icons right">send</i>
              </button></center>
               <div class="form-group">
                <label>Tipo de usuario</label>
                <select id="type2" class="browser-default">
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
              
               <br> 
              <center><button class="btn waves-effect waves-light #757575 grey darken-1 z-depth-5" type="submit" id="enviar3" name="action">Editar Tipo
              <i class="material-icons right">send</i>
              </button></center>  

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
    url: 'crud_usuario/editar.php',
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
        var e_id = document.getElementById('id');
        var e_nombre = document.getElementById('nombre2');
        var e_password = document.getElementById('password2');
        var id =(e_id.value); 
        var nombre =(e_nombre.value);
        var password =(e_password.value);  
        $.ajax
        ({
        url: 'crud_usuario/editar_usuario.php',
        data: {"id":id, "nombre": nombre, "password": password},
        type: 'post',
        success: function(result)
        {
        window.location.reload()
        }
        });
        });
        </script>     

        <script>
        $('#enviar3').click(function(){
        var e_id = document.getElementById('id');
        var e_tipo = document.getElementById('type2'); 
        var id =(e_id.value); 
        var tipo =(e_tipo.value);  
        if(tipo<=0)
        {
        alert("POR FAVOR SELECCIONE EL TIPO DE USUARIO!!!");
        }
        else
        {
        $.ajax
        ({
        url: 'crud_usuario/editar_tipo.php',
        data: {"id":id, "tipo": tipo},
        type: 'post',
        success: function(result)
        {
        window.location.reload()
        }
        }); 
        }
        });
        </script>     

        

      </div>
    </body>
  </html> 

 <script>
          $(".eliminar").click(function()
          {
          var id = $(this).attr("id");
          var del_id = id;
          if(confirm('Eliminar?'))
          {
          $.post('crud_usuario/eliminar.php', {'del_id':del_id}, function(data)
          { 
          window.location.reload();
          }); 
          }
          return false;
          });
        </script>

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


   

