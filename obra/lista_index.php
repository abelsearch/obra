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
    

    <title>Lista de insumos</title>
  </head>
  <body> 
  <?php include('menu.php'); ?> 
    <div class="container">  
    <div class="row"> 
    <div class="col m12">  
    <div id="title"> 
    <h2 class="form-signin-heading"> LISTA DE INSUMOS</h2> 
    </div>
        <table class="striped responsive-table " id="example"> 
    <thead>
        <tr>
          <th><center>Folio</center></th> 
          <th><center>Tipo de Insumo</center></th> 
          <th><center>Descripción</center></th> 
          <th><center>Unidad</center></th>  
          <th><center>Cantidad</center></th> 
          <th><center>Precio Unitario</center></th> 
          <th><center>IVA</center></th> 
          <th><center>EDITAR</center></th> 
          <th><center>ELIMINAR</center></th>
        <!--</tr>-->
    </thead> 
    <tbody> 
    <?php 
    require_once 'db_config.php'; 
    $stmt=$db_con->prepare("SELECT * FROM lista");
    $stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
    {   
    ?> 
    <!--<tr>-->
      <td><center><?php echo $row['folio_orden']; ?></center></td> 
      <td><center><?php echo $row['tipo_insumo']; ?></center></td>
      <td><center><?php echo $row['descripcion']; ?></center></td> 
      <td><center><?php echo $row['unidad']; ?></center></td>
      <td><center><?php echo $row['cantidad']; ?></center></td> 
     <td><center><?php echo $row['precio_unitario']; ?></center></td>
      <td><center><?php echo $row['precio_iva']; ?></center></td> 
     
      <td align="center">  
      <center>
      <!--<a class="ver modal-trigger trigger" href="" title="Ver">--> 
      <a id="<?php echo $row['id']; ?>" class='edit modal-trigger trigger' href="#">
      <i class="material-icons  black-text  center">edit</i></a> 
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
        <div id="modal" class="modal">
          <div class="modal-content">  
          
               </div> 
    
              <div class="form-group">  
              <center>
              <label>Tipo de insumo</label>
                <select id="insumo" name="insumo" class="browser-default">
                <option value="">Selección:</option>
                <?php
                require_once 'db_config.php';
                $stmt=$db_con->prepare("SELECT * FROM insumo ORDER BY id");
                $stmt->execute();
                while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                ?>
                <option value="<?php $row['tipo'];?>"><?php echo $row['tipo'];?></option>
                <?php
                }
                ?>
                </select>  
                <center>
                  <br>
              <center><button class="btn waves-effect waves-light #757575 grey darken-1 z-depth-5" type="submit" id="enviar" name="action">Editar
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
    url: 'crud_lista/editar.php',
    type: 'post',
    data: {edit_id: edit_id},
    success: function(response){ 
      // Add response in Modal body
      $('.modal-content').html(response);
      $('#modal').modal(); 
      $('#modal').modal('open');
      // Display Modal
      //$('#empModal').modal('show');        
    }
  });
 });
});
  </script> 

  <script type="text/javascript">   
        var mydropdown = document.getElementById('insumo');
        var tipo = document.getElementById('tipo_insumo');    
        mydropdown.onchange=function(){   
        tipo.value=mydropdown.options[mydropdown.selectedIndex].value;
        } 
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
          $.post('crud_lista/eliminar.php', {'del_id':del_id}, function(data)
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

<script>
        $('#enviar').click(function(){
        var l_id = document.getElementById('id');
        var l_folio_orden = document.getElementById('folio_orden');
        var l_tipo_insumo = document.getElementById('tipo_insumo');
        var l_descripcion = document.getElementById('descripcion'); 
        var l_unidad = document.getElementById('unidad');
        var l_cantidad = document.getElementById('cantidad'); 
        var l_precio_unitario = document.getElementById('precio_unitario');
        var l_importe = document.getElementById('importe');
        var l_cantidad_real = document.getElementById('cantidad_real');
        var l_precio_real = document.getElementById('precio_real');
        var l_importe_real = document.getElementById('importe_real'); 
        var id =(l_id.value); 
        var folio_orden =(l_folio_orden.value);
        var tipo_insumo =(l_tipo_insumo.value); 
        var descripcion =(l_descripcion.value); 
        var unidad =(l_unidad.value);
        var cantidad =(l_cantidad.value); 
        var precio_unitario =(l_precio_unitario.value);
        var importe =(l_importe.value);
        var cantidad_real =(l_cantidad_real.value);
        var precio_real =(l_precio_real.value);
        var importe_real =(l_importe_real.value);
  
        $.ajax
        ({
        url: 'crud_lista/editar_lista.php',
        data: {"id":id, "folio_orden":folio_orden, "tipo_insumo":tipo_insumo, "descripcion":descripcion, "unidad":unidad ,"cantidad": cantidad, "precio_unitario":precio_unitario, "importe":importe, "cantidad_real":cantidad_real, "precio_real":precio_real,    "importe_real":importe_real},
        type: 'post',
        success: function(result)
        {
        window.location.reload()
        }
        });
        
        });
        </script>                  