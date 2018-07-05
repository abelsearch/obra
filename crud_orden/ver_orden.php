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
           <?php
            include_once '../db_config.php';
            if($_GET['edit_id'])
            {
            $id = $_GET['edit_id']; 
            $stmt=$db_con->prepare("SELECT * FROM orden WHERE folio=:id");
            $stmt->execute(array(':id'=>$id)); 
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            }
            ?> 
          <table cellpadding="0" cellspacing="0" class="striped z-depth-5" id="inf">          
            <tr class="heading"> 
                <td>
                    <img src="../img/logo.PNG" >
                </td>

                <td>
                    <b>Fecha:</b> &nbsp; <?php echo date('d/m/y');?>
                </td>
                
                <td>
                    <b>Folio:</b> &nbsp; <?php echo $row['folio'];?> 
                </td>       
            </tr>
           </table>   

           <!-- info ORDEN --> 
          <table cellpadding="0" cellspacing="0" class="striped" id="inf">          
            <thead>
          <th><center>Folio</center></th> 
          <th><center>Cliente</center></th> 
          <th><center>Servicio</center></th> 
          <th><center>Presupuesto</center></th>    
            </thead> 
          <tbody> 
      <td><center><?php echo $row['folio']; ?></center></td> 
      <td><center><?php echo $row['cliente']; ?></center></td>
      <td><center><?php echo $row['servicio']; ?></center></td> 
      <td><center><?php echo $row['presupuesto']; ?></center></td>   
    </tbody> 
        </table>         
       
        <!-- Insumos --> 
        <h4>Insumos</h4>
        <table cellpadding="0" cellspacing="0" class="striped" id="inf">          
            <thead>
          <th><center>Tipo de Insumo</center></th> 
          <th><center>Descripción</center></th> 
          <th><center>Unidad</center></th> 
           <th><center>Cantidad</center></th> 
          <th><center>Precio Unitario</center></th> 
          <th><center>IVA</center></th> 
          <th><center>TOTAL</center></th>    
            </thead> 
          <tbody>  
          <?php
          include_once '../db_config.php';
          if($_GET['edit_id'])
          {
          $folio = $_GET['edit_id']; 
          $stmt=$db_con->prepare("SELECT * FROM lista WHERE folio_orden=:folio");
          $stmt->execute(array(':folio'=>$folio)); 
          $stmt->execute();
          while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
          {
          ?>   
          <tr>
      <td><center><?php echo $row['tipo_insumo']; ?></center></td>
      <td><center><?php echo $row['descripcion']; ?></center></td> 
      <td><center><?php echo $row['unidad']; ?></center></td>  
      <td><center><?php echo $row['cantidad']; ?></center></td> 
      <td><center><?php echo $row['precio_unitario']; ?></center></td>
      <td><center><?php echo $row['precio_iva']; ?></center></td> 
      <td><center><?php echo $row['total']; ?></center></td>   
        </tr>
      <?php
        } 
        }
        ?>     
    </tbody> 
        </table>   
        <br>   
        <?php
          include_once '../db_config.php';
          if($_GET['edit_id'])
          {
          $folio = $_GET['edit_id']; 
          $stmt=$db_con->prepare("SELECT round(sum(total),2) AS total FROM lista WHERE folio_orden=:folio");
          $stmt->execute(array(':folio'=>$folio)); 
          $stmt->execute();
          while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
          {
          ?>   
        TOTAL: $ <?php echo $row['total']; ?>
      <?php
        } 
        }
        ?>  
        <br>
        <?php
          include_once '../db_config.php';
          if($_GET['edit_id'])
          {
          $folio = $_GET['edit_id']; 
          $stmt=$db_con->prepare("SELECT sum(precio_real) AS total_real FROM lista WHERE folio_orden=:folio");
          $stmt->execute(array(':folio'=>$folio)); 
          $stmt->execute();
          while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
          {
          ?>   
        TOTAL REAL: $ <?php echo $row['total_real']; ?>
      <?php
        } 
        }
        ?>      



        <!-- Servicios Adicionales --> 
        <h4>Servicios Adicionales</h4>
        <table cellpadding="0" cellspacing="0" class="striped" id="inf">          
            <thead>
          <th><center>Descripción</center></th> 
          <th><center>Precio</center></th> 
            </thead> 
          <tbody>  
          <?php
          include_once '../db_config.php';
          if($_GET['edit_id'])
          {
          $folio = $_GET['edit_id']; 
          $stmt=$db_con->prepare("SELECT * FROM adicional WHERE folio_orden=:folio");
          $stmt->execute(array(':folio'=>$folio)); 
          $stmt->execute();
          while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
          {
          ?>   
          <tr>
      <td><center><?php echo $row['descripcion']; ?></center></td>   
      <td><center><?php echo $row['precio']; ?></center></td>    
        </tr>
      <?php
        } 
        }
        ?>     
    </tbody> 
        </table>               
        

       <!-- Servicios Extras --> 
       <h4>Servicios Extras</h4>
        <table cellpadding="0" cellspacing="0" class="striped" id="inf">          
            <thead>
          <th><center>Descripción</center></th> 
          <th><center>Precio</center></th> 
            </thead> 
          <tbody>  
          <?php
          include_once '../db_config.php';
          if($_GET['edit_id'])
          {
          $folio = $_GET['edit_id']; 
          $stmt=$db_con->prepare("SELECT * FROM extra WHERE folio_orden=:folio");
          $stmt->execute(array(':folio'=>$folio)); 
          $stmt->execute();
          while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
          {
          ?>   
          <tr>
      <td><center><?php echo $row['descripcion']; ?></center></td>   
      <td><center><?php echo $row['precio']; ?></center></td>    
        </tr>
      <?php
        } 
        }
        ?>     
    </tbody> 
        </table>                

    
     <!-- Flujos --> 
     <h4>Flujos</h4>
        <table cellpadding="0" cellspacing="0" class="striped" id="inf">          
            <thead>  
          <th><center>Tipo</center></th>   
          <th><center>Descripción</center></th> 
          <th><center>Cantidad</center></th>  
           <th><center>Estatus</center></th> 
            </thead> 
          <tbody>  
          <?php
          include_once '../db_config.php';
          if($_GET['edit_id'])
          {
          $folio = $_GET['edit_id']; 
          $stmt=$db_con->prepare("SELECT * FROM flujo WHERE folio_orden=:folio");
          $stmt->execute(array(':folio'=>$folio)); 
          $stmt->execute();
          while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
          {
          ?>   
          <tr>   
      <td><center><?php echo $row['tipo_gasto']; ?></center></td>     
      <td><center><?php echo $row['descripcion']; ?></center></td>   
      <td><center><?php echo $row['cantidad']; ?></center></td>     
      <td><center><?php echo $row['estatus']; ?></center></td>
        </tr>
      <?php
        } 
        }
        ?>     
    </tbody> 
        </table>  

        <!-- Flujos Pendientes --> 
     <h4>Flujos Pendientes</h4>
        <table cellpadding="0" cellspacing="0" class="striped" id="inf">          
            <thead>  
          <th><center>Descripción</center></th>   
          <th><center>Cantidad</center></th>  
            </thead> 
          <tbody>  
          <?php
          include_once '../db_config.php';
          if($_GET['edit_id'])
          {
          $folio = $_GET['edit_id']; 
          $stmt=$db_con->prepare("SELECT descripcion, cantidad FROM flujo WHERE estatus= 'Pendiente' and folio_orden=:folio");
          $stmt->execute(array(':folio'=>$folio)); 
          $stmt->execute();
          while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
          {
          ?>   
          <tr>   
      <td><center><?php echo $row['desripcion']; ?></center></td>     
      <td><center><?php echo $row['cantidad']; ?></center></td>
        </tr>
      <?php
        } 
        }
        ?>     
    </tbody> 
        </table> 

    
        <!-- Flujos Pagados --> 
     <h4>Flujos Pagados</h4>
        <table cellpadding="0" cellspacing="0" class="striped" id="inf">          
            <thead>  
          <th><center>Descripción</center></th>   
          <th><center>Cantidad</center></th>  
            </thead> 
          <tbody>  
          <?php
          include_once '../db_config.php';
          if($_GET['edit_id'])
          {
          $folio = $_GET['edit_id']; 
          $stmt=$db_con->prepare("SELECT descripcion, cantidad FROM flujo WHERE estatus= 'Pagado' and folio_orden=:folio");
          $stmt->execute(array(':folio'=>$folio)); 
          $stmt->execute();
          while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
          {
          ?>   
          <tr>   
      <td><center><?php echo $row['descripcion']; ?></center></td>     
      <td><center><?php echo $row['cantidad']; ?></center></td>
        </tr>
      <?php
        } 
        }
        ?>     
    </tbody> 
        </table>   
        <?php
          include_once '../db_config.php';
          if($_GET['edit_id'])
          {
          $folio = $_GET['edit_id']; 
          $stmt=$db_con->prepare("SELECT sum(cantidad) AS total FROM flujo WHERE estatus= 'Pagado' and folio_orden=:folio");
          $stmt->execute(array(':folio'=>$folio)); 
          $stmt->execute();
          while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
          {
          ?>   
        TOTAL CONSUMO: $ <?php echo $row['total']; ?>
      <?php
        } 
        }
        ?>     


























          </div>
        </div>
      </div>
    </div>
</body> 
</html>