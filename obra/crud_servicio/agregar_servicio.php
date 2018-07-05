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
  <title>CLIENTE</title>
  <link rel="stylesheet" href="">
</head>
<body> 
<?php include('../menu.php'); ?> 

     <div class="container">
      
      <div class="row">
        
        <div class="col-m-12 text-center">
          
          <div class="col-m-6">
            
            <form action="" class="card-body">
              
              <h3 class="card-title"><i class="material-icons">face</i> Agregar Cliente</h3>
              <button class="btn" type="button" id="btn-back">
              <i class="material-icons white-text left ">visibility</i>Volver</button>
            
              <div class="form-group">
                <label>Razón Social<input type="text" name="razon_social" id="razon_social" required></label>
              </div>
              
              <div class="form-group">
                <label>Nombre Comercial<input type="text" name="nombre_comercial" id="nombre_comercial" required></label>
              </div>
              
              <div class="form-group">
                 <label>RFC<input type="text" name="rfc" id="rfc" required></label>
              </div>
              
              <div class="form-group">
                 <label>Calle<input type="text" name="calle" id="calle" required></label>
              </div>
              
              <div class="form-group">
                <label>Colonia<input type="text" name="colonia" id="colonia" required></label>
                
              </div>
              
              <div class="form-group">
                <label>Numero<input type="text" name="numero" id="numero" required></label>
              
              </div> 

              <div class="form-group">
                <label>Código Postal<input type="text" name="codigo_postal" id="codigo_postal" required></label>
              
              </div> 

              <div class="form-group">
                 <label>Ciudad<input type="text" name="ciudad" id="ciudad" required></label>
              </div> 

              <div class="form-group">
                 <label>Estado<input type="text" name="estado" id="estado" required></label>
              </div> 

              <div class="form-group">
                 <label>Telefono<input type="text" name="telefono" id="telefono" required></label>
              </div> 

              <div class="form-group">
                 <label>Contacto<input type="text" name="nombre_contacto" id="nombre_contacto" required></label>
              </div> 

              <div class="form-group">
                 <label>Correo<input type="text" name="correo" id="correo" required></label>
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
        var c_razon_social = document.getElementById('razon_social');
        var c_nombre_comercial = document.getElementById('nombre_comercial');
        var c_rfc = document.getElementById('rfc');
        var c_calle = document.getElementById('calle');
        var c_colonia = document.getElementById('colonia');
        var c_numero = document.getElementById('numero'); 
        var c_codigo_postal = document.getElementById('codigo_postal'); 
        var c_ciudad = document.getElementById('ciudad'); 
        var c_estado = document.getElementById('estado');
        var c_telefono = document.getElementById('telefono');
        var c_nombre_contacto = document.getElementById('nombre_contacto');
        var c_correo = document.getElementById('correo');
        var razon_social =(c_razon_social.value);
        var nombre_comercial =(c_nombre_comercial.value);
        var rfc =(c_rfc.value);
        var calle =(c_calle.value);
        var colonia =(c_colonia.value);
        var numero =(c_numero.value); 
        var codigo_postal =(c_codigo_postal.value); 
        var ciudad =(c_ciudad.value); 
        var estado =(c_estado.value);
        var telefono =(c_telefono.value);
        var nombre_contacto =(c_nombre_contacto.value);
        var correo =(c_correo.value); 
        if(razon_social==''||nombre_comercial==''||rfc==''||calle==''||colonia==''||numero==''||codigo_postal==''||ciudad==''||estado==''||telefono==''||nombre_contacto==''||correo=='')
        {
        //alert("Please Fill All Fields");
        }
        else
        {
        $.ajax
        ({
        url: 'crear.php',
        data: {"razon_social": razon_social, "nombre_comercial": nombre_comercial, "rfc": rfc, "calle": calle, "colonia": colonia ,"numero": numero, "codigo_postal":codigo_postal,"ciudad":ciudad,"estado":estado,"telefono":telefono,"nombre_contacto":nombre_contacto,"correo":correo},
        type: 'post',
        success: function(result)
        {
          window.location.href="../cliente_index.php";
        }
        });
        }
        });
        </script> 

        <script>
        $("#btn-back").click(function(){
        $("body").fadeOut('fast',function()
        { 
        window.location.href="../cliente_index.php"; 
        });
        }); 
        </script>
</html>