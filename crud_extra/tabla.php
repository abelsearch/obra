<?php 
include_once("db_config.php");
?> 
<title>phpzag.com : DemoCreate Live Editable Table with jQuery, PHP and MySQL</title>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.tabledit.js"></script>  

<div class="container home">  
  <h2>Create Live Editable Table with jQuery, PHP and MySQL</h2>     
  <table id="data_table" class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
          <th>Tipo</th> 
          <th>Descripción</th> 
          <th>Unidad</th> 
          <th>Cantidad</th> 
          <th>Precio Unitario</th> 
          <th>Importe</th> 
          <th>Cantidad Real</th>   
          <th>Precio Real</th> 
          <th>Importe Real</th>
      </tr>
    </thead>
    <tbody> 
        <?php 
    require_once 'db_config.php';  
    $stmt=$db_con->prepare("SELECT * FROM lista_insumo");
   $stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))   
    {   
    ?> 
    <!--<tr>-->  
    <tr id="<?php echo $row ['id']; ?>">
    <td><center><?php echo $row ['id']; ?></center></td>
      <td><center><?php echo $row ['tipo_insumo']; ?></center></td>
      <td><center><?php echo $row ['descripcion']; ?></center></td> 
      <td><center><?php echo $row ['unidad']; ?></center></td>
      <td><center><?php echo $row ['cantidad']; ?></center></td> 
      <td><center><?php echo $row ['precio_unitario']; ?></center></td>
      <td><center><?php echo $row ['importe']; ?></center></td> 
      <td><center><?php echo $row ['cantidad_real']; ?></center></td>
      <td><center><?php echo $row ['precio_real']; ?></center></td> 
      <td><center><?php echo $row ['importe_real']; ?></center></td>
    </tr>
  <?php
  }   
  ?>   
    </tbody>
    </table>  

</div>
<script type="text/javascript">
  $(document).ready(function(){
  $('#data_table').Tabledit({
    deleteButton: false,
    editButton: false,      
    columns: {
      identifier: [0, 'id'],                    
      editable: [[1, 'tipo_insumo'], [2, 'descripcion'], [3, 'unidad'], [4, 'cantidad'], [5, 'precio_unitario'], [6, 'importe'], [7, 'cantidad_real'], [8, 'precio_real']]
    },
    hideIdentifier: false,
    url: 'live_edit.php'    
  });
});
</script>
                                                                                                    