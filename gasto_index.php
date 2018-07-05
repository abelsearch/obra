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
    

    <title>Servicios</title>
  </head>
  <body> 
  <?php include('menu.php'); ?> 
    <div class="container">  
    <div class="row"> 
    <div class="col m12">  
    <div id="title"> 
    <h2 class="form-signin-heading"><i class="material-icons" style="font-size:40px;">face</i> SERVICIO</h2> 
    </div>
    <div id="buttons">
    <button class="btn modal-trigger" id="trigger"  href="#modal1">
    <i class="material-icons white-text left ">add_circle</i>Nuevo</button> 
    </div>
        <table class="striped responsive-table " id="example"> 
    <thead>
        <tr>
          <th><center>Clave SAT</center></th> 
          <th><center>Clave Interna</center></th> 
          <th><center>Descripción</center></th> 
          <th><center>Precio</center></th> 
          <th><center>Medida</center></th> 
          <th><center>EDITAR</center></th> 
          <th><center>ELIMINAR</center></th>
        <!--</tr>-->
    </thead> 
    <tbody> 
    <?php 
    require_once 'db_config.php'; 
    $stmt=$db_con->prepare("SELECT * FROM servicio");
    $stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
    {   
    ?> 
    <!--<tr>-->
      <td><center><?php echo $row['clave_sat']; ?></center></td> 
      <td><center><?php echo $row['clave_interna']; ?></center></td>
      <td><center><?php echo $row['descripcion']; ?></center></td> 
      <td><center><?php echo $row['precio']; ?></center></td>
      <td><center><?php echo $row['medida']; ?></center></td> 
     
      <td align="center">  
      <center>
      <!--<a class="ver modal-trigger trigger" href="" title="Ver">--> 
      <button id="<?php echo $row['id']; ?>" class='ver modal-trigger trigger'>
      <i class="material-icons  blue-text  center">playlist_add_check</i></button> 
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
                <label>Clave SAT<input type="text" name="clave_sat" id="clave_sat" required></label>
              </div>
              
              <div class="form-group">
                <label>Clave Interna<input type="text" name="clave_interna" id="clave_interna" required></label>
              </div>
              
              <div class="form-group">
                 <label>Descripción<input type="text" name="descripcion" id="descripcion" required></label>
              </div>
              
              <div class="form-group">
                 <label>Precio<input type="text" name="precio" id="precio" required></label>
              </div>
              
              <div class="form-group">
                <label>Medida<input type="text" name="medida" id="medida" required></label>                
              </div> 
              <button class="btn waves-effect waves-light" type="submit" id="enviar" name="action">Submit
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
          //var id = $(this).attr("id");
          //var ver_id = id; 
          $('#modal1').modal();
        $('#modal1').modal('open');
        });
        $( "#cancel" ).click(function(){
          $('#modal1').modal();
        $('#modal1').modal('close');
        });
        });
        </script> 
        
        <!-- Modal Structure -->
        <div id="modal2" class="modal">
          <div class="modal-content2">  
          
               </div>
              <center><button class="btn waves-effect waves-light" type="submit" id="enviar2" name="action">Editar
              <i class="material-icons right">send</i>
              </button></center>  

              <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect btn-flat" id="cancel"><i class="material-icons">close</i></a>
          </div> 

          </div>
          
        
        <script> 
          $(document).ready(function(){
 $('.trigger').click(function(){
   var id = $(this).attr("id");
   var edit_id = id;
   // AJAX request
   $.ajax({
    url: 'crud_servicio/editar.php',
    type: 'post',
    data: {edit_id: edit_id},
    success: function(response){ 
      // Add response in Modal body
      $('.modal-content2').html(response);
      $('#modal2').modal(); 
      $('#modal2').modal('open');
      // Display Modal
      //$('#empModal').modal('show');        
    }
  });
 });
});

        </script>

      </div>
    </body>
  </html> 

<script>  
  $(".eliminar").click(function(){
    var id = $(this).attr("id");
    var del_id = id;
    var parent = $(this).parent("td").parent("tr");
      $.post('crud_servicio/eliminar.php', {'del_id':del_id}, function(data){
      parent.fadeOut('slow');
    }); 
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

<script>
        $('#enviar').click(function(){
        var s_clave_sat = document.getElementById('clave_sat');
        var s_clave_interna = document.getElementById('clave_interna');
        var s_descripcion = document.getElementById('descripcion'); 
        var s_precio = document.getElementById('precio');
        var s_medida = document.getElementById('medida');
        var clave_sat =(s_clave_sat.value);
        var clave_interna =(s_clave_interna.value); 
        var descripcion =(s_descripcion.value); 
        var precio =(s_precio.value);
        var medida =(s_medida.value);
        $.ajax
        ({
        url: 'crud_servicio/crear.php',
        data: {"clave_sat": clave_sat, "clave_interna": clave_interna, "descripcion": descripcion, "precio": precio ,"medida": medida},
        type: 'post',
        success: function(result)
        {
          window.location.reload()
        }
        });
        
        });
        </script> 

<script>
        $('#enviar2').click(function(){
        var s_id = document.getElementById('2id');
        var s_clave_sat = document.getElementById('2clave_sat');
        var s_clave_interna = document.getElementById('2clave_interna');
        var s_descripcion = document.getElementById('2descripcion'); 
        var s_precio = document.getElementById('2precio');
        var s_medida = document.getElementById('2medida'); 
        var id =(s_id.value); 
        var clave_sat =(s_clave_sat.value);
        var clave_interna =(s_clave_interna.value); 
        var descripcion =(s_descripcion.value); 
        var precio =(s_precio.value);
        var medida =(s_medida.value);
        $.ajax
        ({
        url: 'crud_servicio/editar_servicio.php',
        data: {"id":id, "clave_sat": clave_sat, "clave_interna": clave_interna, "descripcion": descripcion, "precio": precio ,"medida": medida},
        type: 'post',
        success: function(result)
        {
        window.location.reload()
        }
        });
        
        });
        </script>        


<script>
$("#btn-add").click(function(){
$("body").fadeOut('fast',function()
{ 
window.location.href="crud_cliente/agregar_cliente.php"; 
});
}); 
</script>     





<script> 
$(".editar").click(function(){
var id = $(this).attr("id");
var edit_id = id; 
window.location.href="crud_cliente/editar_cliente.php?edit_id="+edit_id; 
return false;
});
</script> 