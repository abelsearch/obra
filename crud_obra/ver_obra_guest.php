<?php include('../smenu.php'); ?> 
<?php include('menu_obra.php'); ?> 
<?php 
require_once '../db_config.php';
if($_GET['edit_id'])
{
$id = $_GET['edit_id']; 
$stmt=$db_con->prepare("SELECT * FROM obra WHERE folio=:id");
$stmt->execute(array(':id'=>$id)); 
$row=$stmt->fetch(PDO::FETCH_ASSOC);
}
?> 
<input type="hidden" id="c_folio" value="<?php echo $row['folio'];?>" readonly>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <script src="../js/materialize.min.js" type="text/javascript"></script> 
    <script src="../crud_obra/ver.js" type="text/javascript"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/html2pdf@0.0.11/html2pdf.node.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>  
<script src="//mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>

    
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Orden de construcción</title>
	<link rel="stylesheet" href="">
</head>
<body> 
 
     <div class="container escritorio"> 
      <div class="row">
        <div class="col-m-12 text-center">
          <div class="col-m-6">
          <div id="printablediv">
          <br>
           <?php
            include_once '../db_config.php';
            if($_GET['edit_id'])
            {
            $id = $_GET['edit_id']; 
            $stmt=$db_con->prepare("SELECT *, DATE_FORMAT(fecha,'%d/%m/%Y') AS fecha FROM obra WHERE folio=:id");
            $stmt->execute(array(':id'=>$id)); 
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            }
            ?> 
          <table cellpadding="0" cellspacing="0" class="striped z-depth-5" id="inf">          
            <tr class="heading"> 
                <td>
                    <img src="../img/seico.jpg" height="100" width="300">
                </td>

                <td>
                    <b>Fecha:</b> &nbsp; <?php echo date('d/m/Y');?>
                </td>
                
                <td>
                    <b>Folio:</b> &nbsp; <?php echo $row['folio'];?> 
                </td>       
            </tr>
           </table>   

           <!-- info ORDEN --> 
          <table cellpadding="0" cellspacing="0" class="striped" id="inf">          
            <thead> 
          <th><center># Contrato</center></th>  
          <th><center>Folio</center></th> 
          <th><center>Cliente</center></th> 
          <th><center>Descripción</center></th> 
          <th><center>Monto Actual</center></th> 
          <th><center>Monto Inicial</center></th>     
          <th><center>Fecha de Creación</center></th>
            </thead> 
          <tbody> 
      <td><center><?php echo $row['referencia']; ?></center></td>     
      <td><center><?php echo $row['folio']; ?></center></td> 
      <td><center><?php echo $row['cliente']; ?></center></td> 
      <td><center><?php echo $row['titulo']; ?></center></td>
      <td><center><?php echo $row['presupuesto']; ?></center></td>    
      <td><center><?php echo $row['presupuesto_inicial']; ?></center></td>
      <td><center><?php echo $row['fecha']; ?></center></td>
    </tbody> 
        </table>          
        <br>
        <!-- Servicios --> 
        <h4>Conceptos</h4>
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
          $stmt=$db_con->prepare("SELECT descripcion,precio FROM concepto WHERE folio_orden=:folio");
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
         <br>
        <?php
          include_once '../db_config.php';
          if($_GET['edit_id'])
          {
          $folio = $_GET['edit_id']; 
          $stmt=$db_con->prepare("SELECT sum(precio) AS total FROM concepto WHERE folio_orden=:folio");
          $stmt->execute(array(':folio'=>$folio)); 
          $stmt->execute();
          while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
          {
          ?>   
        TOTAL CONCEPTOS: $ <?php echo $row['total']; ?>
      <?php
        } 
        }
        ?>      
        <br> 
        <br>
        <!-- Servicios Adicionales --> 
        <h4>Conceptos Adicionales</h4>
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

         <br>
        <?php
          include_once '../db_config.php';
          if($_GET['edit_id'])
          {
          $folio = $_GET['edit_id']; 
          $stmt=$db_con->prepare("SELECT sum(precio) AS total FROM adicional WHERE folio_orden=:folio");
          $stmt->execute(array(':folio'=>$folio)); 
          $stmt->execute();
          while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
          {
          ?>   
        TOTAL ADICIONALES: $ <?php echo $row['total']; ?>
      <?php
        } 
        }
        ?>      
        


        <!-- Insumos --> 
        <h4>Insumos</h4>
        <table cellpadding="0" cellspacing="0" class="striped" id="inf">          
            <thead>
          <th><center>Tipo de Insumo</center></th> 
          <th><center>Descripción</center></th> 
          <th><center>Unidad</center></th> 
           <th><center>Cantidad</center></th> 
          <th><center>Precio Unitario</center></th> 
            </thead> 
          <tbody>  
          <?php
          include_once '../db_config.php';
          if($_GET['edit_id'])
          {
          $folio = $_GET['edit_id']; 
          $stmt=$db_con->prepare("SELECT * FROM lista_insumo WHERE folio_orden=:folio");
          $stmt->execute(array(':folio'=>$folio)); 
          $stmt->execute();
          while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
          {
          ?>   
          <tr>
      <td><center><?php echo $row['tipo_insumo']; ?></center></td>
      <td><center><?php echo $row['descripcion']; ?></center></td> 
      <td><center><?php echo $row['unidad']; ?></center></td>  
      <td><center><?php echo $row['cantidad_real']; ?></center></td> 
      <td><center><?php echo $row['precio_real']; ?></center></td>
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
          $stmt=$db_con->prepare("SELECT round(sum(importe_real),2) AS total FROM lista_insumo WHERE folio_orden=:folio");
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
        <br> 
        <br>
    
     <!-- Flujos --> 
     <h4>Flujos</h4>
        <table cellpadding="0" cellspacing="0" class="striped" id="inf">          
            <thead>  
          <th><center>Tipo</center></th>   
          <th><center>Descripción</center></th> 
          <th><center>Cantidad</center></th>  
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
          $stmt=$db_con->prepare("SELECT sum(cantidad) AS total FROM flujo WHERE folio_orden=:folio");
          $stmt->execute(array(':folio'=>$folio)); 
          $stmt->execute();
          while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
          {
          ?>   
        TOTAL FLUJOS: $ <?php echo $row['total']; ?>
      <?php
        } 
        }
        ?>     
         <br> 
         <br>       
        
        <!-- Total de obra --> 
     <h4>TOTAL FINAL</h4>
        <table cellpadding="0" cellspacing="0" class="striped" id="inf">          
            <thead>  
          <th><center>Total de la obra</center></th>   
            </thead> 
          <tbody>  
          <?php
          include_once '../db_config.php';
          if($_GET['edit_id'])
          {
          $folio = $_GET['edit_id']; 
          $stmt=$db_con->prepare("SELECT gasto AS total from obra WHERE folio=:folio");
          $stmt->execute(array(':folio'=>$folio)); 
          $stmt->execute();
          while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
          {
          ?>   
          <tr>   
      <td><center>$<?php echo $row['total']; ?></center></td>     
        </tr>
      <?php
        } 
        }
        ?>     
    </tbody> 
        </table>   
          </div>
          </div>
        </div>
      </div>
    </div>
</body> 
</html> 
<style type="text/css">
 li.menu{
  margin-left: 10px;
 }
 div.escritorio{
  margin-left: 200px;
 }
 a.tabs-font{
  font-size: 10px; 
 }
 li.tabs-font{
  font-size: 10px;
 }
</style>

<script>
$(function () { 
    $('#pdf').click(function () { 
        var doc = new jsPDF('p', 'pt', 'a4');        
        doc.addHTML($('#printablediv')[0], 0, 0,  {     
        //pagesplit: true 
        }, 
        function() {  
        doc.save('Cotizacion.pdf'); 
    });
  });
});
</script> 