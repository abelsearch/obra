<?php include('../smenu.php');?> 
<?php include('menu_graficas.php');?>
<?php 
require_once '../db_config.php';
if($_GET['id'])
{
$id = $_GET['id']; 
$stmt=$db_con->prepare("SELECT * FROM semana WHERE folio=:id");
$stmt->execute(array(':id'=>$id)); 
$row=$stmt->fetch(PDO::FETCH_ASSOC);
}
?> 
<input type="hidden" id="c_folio" value="<?php echo $row['folio'];?>" readonly> 
<!--<button type="" id="select_folio" ></button>--> 
<center><button class="btn #757575 indigo darken-1 z-depth-5 tooltipped" data-position="top" data-tooltip="Click para generar gráficas" id="select_folio">Generar</button></center>
<style> 
.divSquare{
        width:358px; height:300px; margin:2px; border:1px solid transparent; float: left
    } 

    .div-main{
  height:200px;
  width:400px;
  z-index:1000;
  padding:30px 0 30px 0;
  max-width:1000px;
  margin:0 auto;}

.footer_filler{ 
  width:400px; 
  height:200px;
  z-index:-1;
  padding:30px 0 30px 0; 
  max-width:1000px;
  margin:0 auto;
}
</style>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/> 
    <link type="text/css" rel="stylesheet" href="../css/estilos.css"  media="screen,projection"/> 
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="../js/materialize.min.js"      type="text/javascript"></script>
    <script src="../crud_avance/menu_iconos.js" type="text/javascript"></script>
    <script src="avance.js" type="text/javascript"></script>
    <script src="graph.js"  type="text/javascript"></script> 
    <script src="graph2.js" type="text/javascript"></script> 
    <script src="graph3.js" type="text/javascript"></script> 
    <script src="graph4.js" type="text/javascript"></script>
    <script src="modulo.js" type="text/javascript"></script>
  <title>Avance</title>
  </head>
  <body>  
    <div class="container">  
      <div id="second" class="divSquare">
        <div id="first" class="div-main col l12 m12 s12"> 
          <canvas id="pie-chart2" style="width:150px; height:100px; vertical-align: middle;"></canvas> 
        </div>  
        <div id="second"class="divSquare">   
        <br>
          <canvas id="pie-chart3" style="width:150px; height:100px; vertical-align: middle;"></canvas> 
        </div> 
        <div id="third"class="divSquare">   
        <br>
          <canvas id="pie-chart4" style="width:150px; height:100px; vertical-align: middle;"></canvas> 
        </div> 
        
         <!--
        <div id="second" class="footer_filler col l12 m12 s12">
         <canvas id="pie-chart3" style="width:150px; height:100px; vertical-align: middle;"></canvas>  
        </div> 
        <div  style='clear:both'></div>
       
        <div id="third"class="divSquare">   
        <br>
          <canvas id="pie-chart3" style="width:150px; height:100px; vertical-align: middle;"></canvas> 
        </div> 
        <div id="fourth" class="divSquare"> 
        <br>
         <canvas id="pie-chart4" style="width:150px; height:100px; vertical-align: middle;"></canvas>  
        </div>
        -->
      </div> 
    </div> 
    <!--DATOS DE CONCEPTO--> 
    <script>
         $(function(){
        $('#select_folio').click(function(){
          grafica_pie2($('#c_folio').val()); 
          grafica_pie3($('#c_folio').val()); 
          grafica_pie4($('#c_folio').val()); 
        });

    });
     </script> 
    <!--DATOS DE CONCEPTO--> 

  </body>
</html>
<!--
<script type="text/javascript">
    $(function(){
        $('#select_folio').click(function(){
          grafica_pie2($('#folio_c').val()); 
        });

    });
  </script>

<script type="text/javascript">
    $(function(){
        $('#select_folio').click(function(){
          grafica_pie($('#select_folio').val()); 
        });

    });
  </script>
  
  <script type="text/javascript">
    $(function(){
        $('#select_folio').click(function(){
          grafica_pie2($('#select_folio').val()); 
        });

    });
  </script> 

  <script type="text/javascript">
    $(function(){
        $('#select_folio').click(function(){
          grafica_pie3($('#select_folio').val()); 
        });

    });
  </script> 

  <script type="text/javascript">
    $(function(){
        $('#select_folio').click(function(){
          grafica_pie4($('#select_folio').val()); 
        });
    });
  </script>
-->
  <script type="text/javascript">
  $(document).ready(function(){
  $('.tooltipped').tooltip(); //Función js para utilizar tooltipped de iconos
});
</script>
<!--Función para darle color activo a la opción insumo del menú tabs-->
<script type="text/javascript">
 $(document).ready(function(){
 $('#nav-ava').attr('style','background-color: rgb(38,50,56); color: white;');
 $('#ul_iconos').prepend('<li class="#ffb300 amber darken-1 white-text">&nbsp <b>FOLIO '+$('#c_folio').val()+'</b>&nbsp&nbsp</li>');
 $('#')
 });
</script>