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
    
    <script src="../js/materialize.min.js" type="text/javascript"></script>
    
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Orden de construcción</title>
	<link rel="stylesheet" href="">
</head>
<body> 
<?php include('../menu.php'); ?> 

     <div class="container">
      
      <div class="row">
        
        <div class="col-m-12 text-center">
          
          <div class="col-m-6">
            
            <form action="" id="add" class="card-body">
              
              <h3 class="card-title"><i class="material-icons">insert_drive_file</i>Agregar Orden</h3>
              <button class="btn" type="button" id="btn-back">
              <i class="material-icons white-text left ">arrow_back</i>Volver</button>
              <div class="form-group m3">
                
                <?php 
      require_once '../db_config.php'; 
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
                <select required  name="cliente" id="cliente" class="browser-default"required>
                <option value="">Selección:</option>
                <?php
                require_once '../db_config.php';
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
                <select required  name="servicio" id="servicio" class="browser-default"required>
                <option value="">Selección:</option>
                <?php
                require_once '../db_config.php';
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
              
              
              <br>
              
              <button class="btn waves-effect waves-light" type="submit" id="enviar" name="action">Enviar
          <i class="material-icons right">send</i>
          </button>
              
            </form>
            
          </div>
          
        </div>
        
      </div>
      
    </div>
</body> 
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
        $.ajax
        ({
        url: 'crear.php',
        data: {"folio": folio, "cliente": cliente, "servicio": servicio, "presupuesto":presupuesto},
        type: 'post',
        success: function(result)
        { 
          //window.location.href="../orden_index.php";
        }
        });
        
        });
        </script>  

        <script>  
  $(document).ready(function () {
  $("#add").submit(function () { 
    Materialize.toast('Agregado!!!', 8000, 'green'); 
  });
  });
  </script>  

        <script>
        $("#btn-back").click(function(){
        $("body").fadeOut('fast',function()
        { 
        window.location.href="../orden_index.php"; 
        });
        }); 
        </script>
</html>