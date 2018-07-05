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
    

    <title>Renta de equipo</title>
  </head>
  <body> 
  <?php include('menu.php'); ?> 
    <div class="container">  
    <div class="row"> 
    <div class="col m12">  
    <div id="title"> 
    <h2 class="form-signin-heading "> RENTA DE EQUIPO</h2> 
    </div>
    <div id="buttons">
    <button class="btn modal-trigger #757575 grey darken-1 z-depth-5" id="trigger"  href="#modal1">
    <i class="material-icons black-text left">add_circle</i>Nuevo</button> 

    </div>
        <table class="striped responsive-table z-depth-5" id="example"> 
    <thead>
        <tr>
          <th><center>Folio</center></th> 
          <th><center>Descripción</center></th> 
          <th><center>Costo</center></th>    
          <th><center>ELIMINAR</center></th> 
        <!--</tr>-->
    </thead> 
    <tbody> 
    <?php 
    require_once 'db_config.php'; 
    $stmt=$db_con->prepare("SELECT * FROM renta");
    $stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
    {   
    ?> 
    <!--<tr>-->
      <td><center><?php echo $row['folio_orden']; ?></center></td> 
      <td><center><?php echo $row['descripcion']; ?></center></td>
      <td><center><?php echo $row['costo']; ?></center></td> 

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
          <!-- MODAL ZONE!!! -->
        <!-- CREATE MODAL -->
        <div id="modal1" class="modal">
        <div class="modal-content"> 
          <form action="">
              <div class="form-group">
               <label>Orden</label>
                <select required  name="folio" id="folio" class="browser-default" required>
                <option value="">Selección:</option>
                <?php
                require_once 'db_config.php';
                $stmt=$db_con->prepare("SELECT * FROM orden ORDER BY id");
                $stmt->execute();
                while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                ?>
                <option  value="<?php echo$row['folio'];?>"><?php echo $row['folio'];?></option>
                <?php
                }
                ?>
                </select>
              </div>
              
              <div class="form-group">
                <label>Descripción<input type="text" name="descripcion" id="descripcion" required></label>
              </div>
              
              <div class="form-group">
                 <label>Costo<input type="text" name="costo" id="costo" required></label>
              </div>
              
              <button class="btn waves-effect #757575 grey darken-1 z-depth-5" type="submit" id="enviar" name="action">Crear Rentas
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
      </div> 
      <script>
          $(".eliminar").click(function()
          {
          var id = $(this).attr("id");
          var del_id = id;
          if(confirm('Eliminar?'))
          {
          $.post('crud_renta/eliminar.php', {'del_id':del_id}, function(data)
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

<script>
   $('#enviar').click(function(){
        var r_folio = document.getElementById('folio');
        var r_descripcion = document.getElementById('descripcion');
        var r_costo = document.getElementById('costo');  
        var folio =(r_folio.value);
        var descripcion =(r_descripcion.value);
        var costo =(r_costo.value);  
        if(folio==''||descripcion==''||costo=='')
        {
        alert("Por favor llene los campos!!!");
        }
        else
        {
        $.ajax
        ({
        url: 'crud_renta/crear.php',
        data: {"folio": folio, "descripcion": descripcion, "costo": costo},
        type: 'post',
        success: function(result)
        { 
         window.location.reload()
        }
        });
        }
        });     
</script>  