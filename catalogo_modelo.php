<?php
include('smenu.php');
require_once 'crud_modelo/validacion.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/materialize.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="crud_modelo/buscador.js" type="text/javascript"></script>
    <script src="crud_modelo/controlador.js" type="text/javascript"></script>
    <link type="text/css" rel="stylesheet" href="css/estilos.css"  media="screen,projection"/>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link   rel="stylesheet" src="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"></script>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>    
    <title>Catálogo Modelos</title>
  </head>
  <body>
      <?php require_once 'crud_modelo/tabla_modelos.php'; ?>
      <?php require_once 'crud_modelo/modal1.php'; ?>
      <?php require_once 'crud_modelo/modal2.php'; ?>
      <?php require_once 'crud_modelo/modal3.php'; ?>
      <?php require_once 'crud_modelo/modal4.php'; ?>
</body>
</html>