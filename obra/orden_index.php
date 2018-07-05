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
    

    <title>Ordenes de construcción</title>
  </head>
  <body> 
  <?php include('menu.php'); ?> 
    <div class="container">  
    <div class="row"> 
    <div class="col m12">  
    <div id="title"> 
    <h2 class="form-signin-heading "> ORDENES DE CONSTRUCCIÓN</h2> 
    </div>
    <div id="buttons">
    <button class="btn modal-trigger #757575 grey darken-1 z-depth-5" id="trigger"  href="#modal1">
    <i class="material-icons black-text left">add_circle</i>Nuevo</button> 

    </div>
        <table class="striped responsive-table z-depth-5" id="example"> 
    <thead>
        <tr>
          <th><center>Folio</center></th> 
          <th><center>Cliente</center></th> 
          <th><center>Servicio</center></th> 
          <th><center>Presupuesto</center></th> 
          <th><center>Gasto</center></th>  
          <th><center>Estado</center></th>
          <th><center>VER</center></th> 
          <th><center>GRÁFICA</center></th>  
          <th><center>EDITAR</center></th>
          <th><center>ELIMINAR</center></th> 
        <!--</tr>-->
    </thead> 
    <tbody> 
    <?php 
    require_once 'db_config.php'; 
    $stmt=$db_con->prepare("SELECT * FROM orden ORDER BY id");
    $stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
    {   
    ?> 
    <!--<tr>-->
      <td><center><?php echo $row['folio']; ?></center></td> 
      <td><center><?php echo $row['cliente']; ?></center></td>
      <td><center><?php echo $row['servicio']; ?></center></td> 
      <td><center><?php echo $row['presupuesto']; ?></center></td> 
      <td><center><?php echo $row['gasto']; ?></center></td>     
      
  
      <?php 
      if($row['gasto'] < $row['presupuesto']){ 
      ?> 
      <td><center><font color='green'><?php echo 'OK' ?></font></center></td> 
      <?php
      }   
      ?> 


      <?php 
      if($row['gasto'] >= $row['presupuesto']){ 
      ?> 
      <td><center><font color='red'><?php echo 'DANGER' ?></font></center></td> 
      <?php
      }   
      ?> 
      
      <td align="center">  
      <center>
      <a id="<?php echo $row['folio']; ?>" class="ver" href="#" title="Ver">
      <i class="material-icons black-text  center">visibility</i> 
      </a>
      </center>
      </td>  

      <td align="center">  
      <center>
      <a id="<?php echo $row['folio']; ?>" class="graf modal-trigger" href="#modal2" title="Grafica">
      <i class="material-icons black-text   center">pie_chart</i> 
      </a>
      </center>
      </td> 

      <td align="center">  
      <center>
      <!--<a class="ver modal-trigger trigger" href="" title="Ver">--> 
      <a id="<?php echo $row['folio']; ?>" class="editar" href="#">
      <i class="material-icons black-text center">edit</i></a> 
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
          <!-- MODAL ZONE!!! -->
        <!-- CREATE MODAL -->
        <div id="modal1" class="modal">
        <div class="modal-content"> 
          
              <div class="form-group">
                <?php 
      			     require_once 'db_config.php'; 
      			     $stmt=$db_con->prepare("SELECT MAX(id)+1 AS id FROM orden;");
      			     $stmt->execute();
      			     while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
      			     {
      			     ?> 
          		    <label>Folio<input type="text" id="folio" name="folio" value="<?php echo$row['id'];?>-ODC" readonly></label> 
          		  <?php
      			     }
      			     ?> 
              </div>
              
              <div class="form-group">
                <label>Nombre del cliente</label>
                <select required  name="cliente" id="cliente" class="browser-default" required>
                <option value="">Selección:</option>
                <?php
                require_once 'db_config.php';
                $stmt=$db_con->prepare("SELECT * FROM cliente ORDER BY id");
                $stmt->execute();
                while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                ?>
                <option  value="<?php echo$row['nombre_comercial'];?>"><?php echo $row['nombre_comercial'];?>
                <?php
                }
                ?>
                </select>
              </div>
              
              <div class="form-group">
                <label>Servicio</label>
                <select required  name="servicio" id="servicio" class="browser-default" required>
                <option value="">Selección:</option>
                <?php
                require_once 'db_config.php';
                $stmt=$db_con->prepare("SELECT * FROM servicio ORDER BY id");
                $stmt->execute();
                while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                ?>
                <option  value="<?php echo$row['descripcion'];?>"><?php echo $row['descripcion'];?>
                <?php
                }
                ?>
                </select>
              </div>
              
              <div class="form-group">
                 <label>Presupuesto<input type="text" name="presupuesto" id="presupuesto" required></label>
              </div>
              
              <button class="btn waves-effect #757575 grey darken-1 z-depth-5" type="submit" id="enviar" name="action">Crear
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
        
                <canvas id="myChart" style="position: relative; height:40vh; width:80vw"> 

                </canvas>  
               
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
          $(document).ready(function(){
 $('.graf').click(function(){
   var id = $(this).attr("id");
   var folio = id;
   // AJAX request
   $.ajax({
    url: 'crud_orden/data.php',
    type: 'post',
    data: {folio: folio},
    success: function(response){ 
      // Add response in Modal body
      //$('.modal-content2').html(response);
      $('#modal2').modal(); 
      $('#modal2').modal('open');
    }
  });
 });
});
</script>    

<!-- TEST MYSQL --> 
<script>
$(document).ready(function(){
    $.ajax({
        url: "http://127.0.0.1/obra/crud_orden/data.php",
        method: "GET",
        success: function(data) {
            console.log(data); 
            var folio = [];
            var presupuesto = []; 
            var gasto = []; 
            

            for(var i in data) {
                folio.push("Orden " + data[i].folio); 
                presupuesto.push(data[i].presupuesto);
                gasto.push(data[i].gasto); 
                //score.push(data[i].score);
            }

            var chartdata = {
                labels: folio,
                datasets : [
                    {
                        label: 'Presupuesto de Órdenes',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 0.2)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: presupuesto
                    }
                ]
            };

            var ctx = $("#myChart");

            var barGraph = new Chart(ctx, {
                type: 'pie',
                data: chartdata
            });
        },
        error: function(data) {
            console.log(data);
        }
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
          $.post('crud_orden/eliminar.php', {'del_id':del_id}, function(data)
          { 
          window.location.reload();
          }); 
          }
          return false;
          });
        </script>
    </body>
  </html>   

<script> 
        $(".editar").click(function(){
        var id = $(this).attr("id");
        var edit_id = id; 
        window.location.href="crud_orden/editar_orden.php?edit_id="+edit_id; 
      return false;
    });
      </script>  

<script> 
        $(".ver").click(function(){
        var id = $(this).attr("id");
        var edit_id = id; 
        window.location.href="crud_orden/ver_orden.php?edit_id="+edit_id; 
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
        var o_folio = document.getElementById('folio');
        var o_cliente = document.getElementById('cliente');
        var o_servicio = document.getElementById('servicio');  
        var o_presupuesto = document.getElementById('presupuesto');
        var folio =(o_folio.value);
        var cliente =(o_cliente.value);
        var servicio =(o_servicio.value);  
        var presupuesto =(o_presupuesto.value); 
        if(folio==''||cliente==''||servicio==''||presupuesto=='')
        {
        alert("Por favor llene los campos!!!");
        }
        else
        {
        $.ajax
        ({
        url: 'crud_orden/crear.php',
        data: {"folio": folio, "cliente": cliente, "servicio": servicio, "presupuesto":presupuesto},
        type: 'post',
        success: function(result)
        { 
         window.location.reload()
        }
        });
        }
        });     
</script>  