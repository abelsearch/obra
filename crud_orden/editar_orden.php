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
	<div class="form-group m3">
</head>
<body> 
<?php include('../menu.php'); ?>  
    
    <div class="container"> 
      <div class="row">
        <div class="col-m-12 text-center">
          <div class="col-m-6"> 
           <div id="title"> 
    <h2 class="form-signin-heading "> EDITAR</h2> 
    </div>
    <div id="buttons">
    <button class="btn #757575 grey darken-1 z-depth-5" type="button" id="btn-back">
              <i class="material-icons white-text left ">arrow_back</i>Volver</button>
    </div>
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

            <div class="form-group m3"> 
            <label>Folio<input type="text" id="c_folio" value="<?php echo$row['folio'];?>" readonly></label>  
            <label>Cliente<input type="text" id="c_cliente" value="<?php echo$row['cliente'];?>" readonly></label>
            <label>Servicio<input type="text" id="c_servicio" value="<?php echo$row['servicio'];?>" readonly></label> 
            <label>Presupuesto<input type="text" id="c_presupuesto" value="<?php echo$row['presupuesto'];?>" readonly></label> 
            <label>Gasto<input type="text" id="c_gasto" value="<?php echo$row['gasto'];?>" readonly></label>  
            <label>Cotizacion<input type="text" id="c_cot" value="<?php echo$row['id'];?>-COT" readonly></label> 
            <button class="btn waves-effect waves-light #757575 grey darken-1 z-depth-5" type="submit" id="cotizacion" name="action">Crear Cotización
            <i class="material-icons right">send</i>
          </button>
            </div> 

            <script>
        $('#cotizacion').click(function(){
        var c_folio = document.getElementById('c_folio');
        var c_cliente = document.getElementById('c_cliente');
        var c_servicio = document.getElementById('c_servicio');  
        var c_presupuesto = document.getElementById('c_presupuesto'); 
        var c_gasto = document.getElementById('c_gasto');  
        var c_cot = document.getElementById('c_cot'); 
        var folio =(c_folio.value); 
        var cliente =(c_cliente.value);
        var servicio =(c_servicio.value); 
        var presupuesto =(c_presupuesto.value);  
        var gasto =(c_gasto.value); 
        var cotizacion =(c_cot.value);
        $.ajax
        ({
        url: 'cotizacion.php',
        data: {"folio":folio, "cliente": cliente, "servicio": servicio, "presupuesto": presupuesto, "gasto": gasto, "cotizacion": cotizacion},
        type: 'post',
        success: function(result)
        {
        window.location.reload()
        }
        });
        
        });
        </script>    
            
<ul class="collapsible" data-collapsible="accordion"> 
  <!--Editar información básica de la orden-->
    <li>
    <div class="collapsible-header"><i class="material-icons">mode_edit</i>Editar Información de la orden</div>
      <div class="collapsible-body"> 
       
              <div class="form-group m3"> 
            <input type="hidden" id="id" name="id" value="<?php echo$row['id'];?>" readonly>
            <input type="hidden" id="folio" name="folio" value="<?php echo$row['folio'];?>" readonly>
            <input type="hidden" id="cliente" name="cliente" value="<?php echo$row['cliente'];?>" readonly>
            <input type="hidden" id="servicio" name="servicio" value="<?php echo$row['servicio'];?>" readonly>
            <label>Presupuesto<input type="text" id="presupuesto" name="presupuesto" value="<?php echo$row['presupuesto'];?>"></label>
            </div>

              <div class="form-group">
                 <label>Nombre del cliente</label>
                <select id="cli" class="browser-default">
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
                <select id="serv" class="browser-default">
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
              <br>
              <button class="btn waves-effect waves-light #757575 grey darken-1 z-depth-5" type="submit" id="enviar" name="action">Enviar
            <i class="material-icons right">send</i>
          </button>  
          
             <script type="text/javascript">   
        var mydropdown = document.getElementById('cli');
        var cliente = document.getElementById('cliente');    
        mydropdown.onchange=function(){   
        cliente.value=mydropdown.options[mydropdown.selectedIndex].value;
        } 
        </script>  

        <script type="text/javascript">   
        var mydropdown2 = document.getElementById('serv');
        var servicio = document.getElementById('servicio');    
        mydropdown2.onchange=function(){   
        servicio.value=mydropdown2.options[mydropdown2.selectedIndex].value;
        } 
        </script> 

        <script>
        $('#enviar').click(function(){
        var e_id = document.getElementById('id'); 
        var e_folio = document.getElementById('folio');
        var e_cliente = document.getElementById('cliente');
        var e_servicio = document.getElementById('servicio');  
        var e_presupuesto = document.getElementById('presupuesto');  
        var id =(e_id.value); 
        var folio =(e_folio.value); 
        var cliente =(e_cliente.value);
        var servicio =(e_servicio.value); 
        var presupuesto =(e_presupuesto.value); 
        $.ajax
        ({
        url: 'editar.php',
        data: {"id":id, "folio":folio, "cliente": cliente, "servicio": servicio, "presupuesto": presupuesto},
        type: 'post',
        success: function(result)
        {
        window.location.reload()
        }
        });
        
        });
        </script>    
      </div>
    </li> 
  <!-- Agregar servicios adicionales/extras a la orden -->
    <li>
      <div class="collapsible-header"><i class="material-icons">build</i>Servicio Adicional</div>
      <div class="collapsible-body">    
              <div class="form-group"> 
              <label>Servicio</label>
                <select id="serv2" name="serv2" class="browser-default">
                <option value="">Selección:</option>
                <?php
                require_once '../db_config.php';
                $stmt=$db_con->prepare("SELECT * FROM servicio ORDER BY id");
                $stmt->execute();
                while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                ?>
                <option  
                id="<?php echo$row['precio'];?>"
                value="<?php echo$row['descripcion'];?>"><?php echo $row['descripcion'];?>
                <?php
                }
                ?>
                </select> 
                <input type='text' name='costo' id="costo" required>  
               
              </div>              
              <br> 
              <center><button class="btn waves-effect #757575 grey darken-1 z-depth-5" type="submit" id="enviar2" name="action">Crear Adicional
              <i class="material-icons right">send</i>
              </button></center>   
             

              <script type="text/javascript">   
              var mydropdown3 = document.getElementById('serv2');
              var costo = document.getElementById('costo');    
              mydropdown3.onchange=function(){   
              costo.value=mydropdown3.options[mydropdown3.selectedIndex].id;
              } 
              </script> 
              
              <script>
              $('#enviar2').click(function(){ 
              var a_folio = document.getElementById('folio');
              var a_descripcion = document.getElementById('serv2');  
              var a_precio = document.getElementById('costo');   
              var folio = (a_folio.value); 
              var descripcion = (a_descripcion.value); 
              var precio = (a_precio.value);  
              if(folio==''||descripcion==''||precio=='')
              {
              alert("Por favor llene los campos!!!");
              } 
              else
              {
              $.ajax
              ({
              url: 'adicional.php',
              data: {"folio":folio, "descripcion": descripcion, "precio": precio},
              type: 'post',
              success: function(result)
              {
              window.location.reload()
              }
              }); 
              }
              });
              </script>  
      </div>   
    </li> 
<!-- Agregar Gastos -->    
    <li>
      <div class="collapsible-header"><i class="material-icons">build</i>Servicio Extra</div>
      <div class="collapsible-body">  
       <div class="form-group"> 
              <label>Servicio</label>
                <select id="serv3" name="serv3" class="browser-default">
                <option value="">Selección:</option>
                <?php
                require_once '../db_config.php';
                $stmt=$db_con->prepare("SELECT * FROM servicio ORDER BY id");
                $stmt->execute();
                while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                ?>
                <option  
                id="<?php echo$row['precio'];?>"
                value="<?php echo$row['descripcion'];?>"><?php echo $row['descripcion'];?>
                <?php
                }
                ?>
                </select> 
                <input type='text' name='costo2' id="costo2"  required>  
               
              </div>              
              <br> 
             
              <center><button class="btn waves-effect #757575 grey darken-1 z-depth-5" type="submit" id="enviar3" name="action">Crear Extra
              <i class="material-icons right">send</i>
              </button></center>  

              <script type="text/javascript">   
              var mydropdown4 = document.getElementById('serv3');
              var costo2 = document.getElementById('costo2');    
              mydropdown4.onchange=function(){   
              costo2.value=mydropdown4.options[mydropdown4.selectedIndex].id;
              } 
              </script> 
              
              <script>
              $('#enviar3').click(function(){ 
              var e_folio = document.getElementById('folio');
              var e_descripcion = document.getElementById('serv3');  
              var e_precio = document.getElementById('costo2');   
              var folio = (e_folio.value); 
              var descripcion = (e_descripcion.value); 
              var precio = (e_precio.value);  
              if(folio==''||descripcion==''||precio=='')
              {
              alert("Por favor llene los campos!!!");
              } 
              else
              {
              $.ajax
              ({
              url: 'extra.php',
              data: {"folio":folio, "descripcion": descripcion, "precio": precio},
              type: 'post',
              success: function(result)
              {
              window.location.reload()
              }
              }); 
              }
              });
              </script>  

      </div>
    </li> 
 <!-- Insumos -->
    <li>
      <div class="collapsible-header"><i class="material-icons">sort</i>Lista de insumos</div>
      <div class="collapsible-body">   

               <div class="form-group"> 
              <label>Tipo de insumo</label>
                <select id="insumo" name="insumo" class="browser-default">
                <option value="">Selección:</option>
                <?php
                require_once '../db_config.php';
                $stmt=$db_con->prepare("SELECT * FROM insumo ORDER BY id");
                $stmt->execute();
                while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                ?>
                <option value="<?php echo$row['tipo'];?>"><?php echo $row['tipo'];?>
                <?php
                }
                ?>
                </select> 
              </div>              

              <div class="form-group">
                <label>Descripción<input type="text" name="descripcion" id="descripcion" required></label>
              </div>
              
              <div class="form-group">
                 <label>Unidad<input type="text" name="unidad" id="unidad" required></label>
              </div>
              
              <div class="form-group">
                 <label>Cantidad<input type="text" name="cantidad" id="cantidad" required></label>
              </div>
              
              <div class="form-group">
                <label>Precio Unitario<input type="number" name="precio_unitario" id="precio_unitario" required></label>
              </div>
              
              <div class="form-group">
                <label>IVA<input type="text" name="precio_iva" id="precio_iva" readonly></label>
              </div>  
              
              <div class="form-group">
                <label>TOTAL<input type="text" name="total" id="total" readonly></label>
              </div>  

              <center><button class="btn waves-effect #757575 grey darken-1 z-depth-5" type="submit" id="lista" name="action">Agregar
              <i class="material-icons right">send</i>
              </button></center>   

              <script type="text/javascript">  
              document.getElementById("precio_unitario").addEventListener("keyup", calcular);   
              function calcular(){        
              var precio_unitario = document.getElementById('precio_unitario');
              var cantidad = document.getElementById('cantidad'); 
              var iva = document.getElementById('precio_iva');    
              var total = document.getElementById('total');
              c=parseFloat(cantidad.value); 
              p=parseFloat(precio_unitario.value);  
              iva.value=parseFloat(p*.16+p);   
              total.value=parseFloat(c*(p*.16+p));   
              //i=.16;
              
              
              } 
              </script> 

              <script>
              $('#lista').click(function(){ 
              var l_folio_orden = document.getElementById('folio');
              var l_tipo_insumo = document.getElementById('insumo');  
              var l_descripcion = document.getElementById('descripcion');  
              var l_unidad = document.getElementById('unidad');
              var l_cantidad = document.getElementById('cantidad');  
              var l_precio_unitario = document.getElementById('precio_unitario');  
              var l_precio_iva = document.getElementById('precio_iva');
              var l_total = document.getElementById('total');
              var folio_orden = (l_folio_orden.value); 
              var tipo_insumo = (l_tipo_insumo.value); 
              var descripcion = (l_descripcion.value);  
              var unidad = (l_unidad.value); 
              var cantidad = (l_cantidad.value); 
              var precio_unitario = (l_precio_unitario.value); 
              var precio_iva = (l_precio_iva.value); 
              var total = (l_total.value); 
              if(folio_orden==''||tipo_insumo==''||descripcion==''||unidad==''||cantidad==''||precio_unitario==''||precio_iva==''||total=='')
              {
              alert("Por favor llene los campos!!!");
              } 
              else
              {
              $.ajax
              ({
              url: 'lista.php',
              data: {"folio_orden":folio_orden, "tipo_insumo":tipo_insumo, "descripcion":descripcion, "unidad":unidad, "cantidad":cantidad, "precio_unitario": precio_unitario, "precio_iva":precio_iva, "total":total},
              type: 'post',
              success: function(result)
              {
              window.location.reload()
              }
              }); 
              }
              });
              </script>  

      
      </div>
    </li> 
    <!-- Gastos --> 
    <li>
      <div class="collapsible-header"><i class="material-icons">attach_money</i> Flujos</div>
      <div class="collapsible-body">    

               <div class="form-group"> 
              <label>Tipo de gasto</label>
                <select id="gasto" name="gasto" class="browser-default">
                <option value="">Selección:</option>
                <?php
                require_once '../db_config.php';
                $stmt=$db_con->prepare("SELECT * FROM gasto ORDER BY id");
                $stmt->execute();
                while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                ?>
                <option value="<?php echo$row['tipo'];?>"><?php echo $row['tipo'];?></option>
                <?php
                }
                ?>
                </select> 
              </div>       

              <div class="form-group">
                <label>Descripción<input type="text" name="descripcion" id="descripcion2" required></label>
              </div>
              
              <div class="form-group">
                 <label>Cantidad<input type="text" name="cantidad" id="cantidad2" required></label>
              </div> 

              <div class="form-group"> 
              <label>Estatus</label>
                <select id="estatus" name="estatus" class="browser-default">
                <option value="">Selección:</option>
                <option value="PAGADO">Pagado</option> 
                <option value="PENDIENTE">Pendiente</option>  
                <option value="PRECIO NO ESTABLECIDO">Precio no establecido</option>
                </select> 
              </div>      
              

              <center><button class="btn waves-effect #757575 grey darken-1 z-depth-5" type="submit" id="flujo" name="action">Agregar
              <i class="material-icons right">send</i>
              </button></center>  

              <script>
              $('#flujo').click(function(){ 
              var f_folio_orden = document.getElementById('folio');
              var f_tipo_gasto = document.getElementById('gasto');  
              var f_descripcion = document.getElementById('descripcion2');  
              var f_cantidad = document.getElementById('cantidad2');  
              var f_estatus = document.getElementById('estatus');  
              var folio_orden = (f_folio_orden.value); 
              var tipo_gasto = (f_tipo_gasto.value); 
              var descripcion = (f_descripcion.value);   
              var cantidad = (f_cantidad.value); 
              var estatus = (f_estatus.value);  
              if(folio_orden==''||tipo_gasto==''||descripcion==''||cantidad==''||estatus=='')
              {
              alert("Por favor llene los campos!!!");
              } 
              else
              {
              $.ajax
              ({
              url: 'flujo.php',
              data: {"folio_orden":folio_orden, "tipo_gasto":tipo_gasto, "descripcion":descripcion, "cantidad":cantidad, "estatus":estatus},
              type: 'post',
              success: function(result)
              {
              window.location.reload()
              }
              }); 
              }
              });
              </script>  

      
      </div>
    </li>
<!--
    <li>
      <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
      <div class="collapsible-body"> 

      </div>
    </li>
  -->

  </ul>        
  <script>
        $("#btn-back").click(function(){
        $("body").fadeOut('fast',function()
        { 
        window.location.href="../orden_index.php"; 
        });
        }); 
        </script>

          </div>
        </div>
      </div>
    </div>
</body> 
</html>