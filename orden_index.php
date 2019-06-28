<?php include('smenu.php'); ?>
<?php 
if($_SESSION['tipo']== 1){
?>  
<?php include('crud_orden_compra/menu.php'); ?>   
<script src="crud_orden_compra/menu_iconos.js" type="text/javascript"></script>      
<?php
} 
if($_SESSION['tipo']== 2){ 
?> 
<?php include('crud_orden_compra/menu_operador.php'); ?> 
<script src="crud_orden_compra/menu_iconos.js" type="text/javascript"></script>
<?php 
} 
if($_SESSION['tipo']== 3){
?>  
<?php include('crud_orden_compra/menu_invitado.php'); ?>
<?php
} 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>    
    <script src="js/materialize.min.js" type="text/javascript"></script>
    <script src="crud_orden_compra/orden.js" type="text/javascript"></script>   
    <script src="crud_orden_compra/modals_orden_compra/insumo.js" type="text/javascript"></script>   
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Orden de Compra</title>
  </head>
  <body>
    <!--Tabla de ordenes de compra-->  
    <?php include './crud_orden_compra/tabla_orden_compra/tabla_orden_compra.php'; ?>
    <!--Termina tabla de ordenes de compra-->
    <!--MODAL PARA NUEVA ORDEN DE COMPRA-->
    <?php include './crud_orden_compra/modals_orden_compra/modal1_nueva_orden.php'; ?>
    <!--TERMINA MODAL DE ORDEN DE COMPRA-->
    <!--MODAL PARA AGREGAR INSUMOS-->
    <?php include './crud_orden_compra/modals_orden_compra/modal2_agregar_insumo.php'; ?>
    <!--MODAL PARA AGREGAR INSUMO-->
    <?php include './crud_orden_compra/modals_orden_compra/modal6_insumo.php'; ?>
    
    <!--TERMINA MODAL PARA AGREGAR INSUMOS-->
    <!--MODAL PARA VER ORDEN DE COMPRA-->
    <?php include './crud_orden_compra/modals_orden_compra/modal3_ver_orden.php'; ?>
    <!-- INICIA MODAL PARA VER LOS INSUMOS DE LA ORDEN SELECCIONADA-->
    <?php include './crud_orden_compra/modals_orden_compra/modal4_ver_insumos.php'; ?>
    <!--TERMINA MODAL PARA VER LOS INSUMOS DE LA ORDEN SELECCIONADA--> 

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" src="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"></script>
    <script>
      $(document).ready(function() {
        $('.datepicker').datepicker();
        $('#row_ayuda').hide();
        $('.modal').modal();
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
    <script type="text/javascript">
      function insumos(){
        var insumo = $('#insumo_catalogo').val();
        $('#insumo_nuevo_input').val(insumo);
      }
    </script>
  </body>
</html>