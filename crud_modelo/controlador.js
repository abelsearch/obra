$(document).ready(function(){

  //HABILITA LA FUNCION DE LOS MODALS
  $( "#trigger" ).click(function(){ 
    $('#modal1').modal();
    $('#modal1').modal('open');
    });
    $( "#cancel" ).click(function(){
    $('#modal1').modal();
    $('#modal1').modal('close');
  });
  //TEMRINA METODO PARA HABILITAR FUNCION DE LOS MODALS
  //--------------------------------------------------------------
  //--------METODO PARA DAR DE ALTA UN NUEVO MODELO---------------    
  $('#enviar').click(function(){   
    var nombre  = $('#nombre').val();
    var m2       = $('#m2').val();	
    var fecha	   = $('#fecha').val();
    if(nombre==''||m2=='')
    {
    swal({ 
      title: "Error",		
      icon: "warning", 
      text: "Favor de llenar todos los campos correctamente.",
    });
    } 
    else
    {      
      $.ajax
      ({
      url: 'crud_modelo/crear.php',
      data: {"nombre": nombre, "m2": m2, "fecha": fecha},
      type: 'post',
      success: function(result)
      {
      window.location.reload()
      }
      });
    } 
  });
  //TERMINA METODO PARA DAR DE ALTA UN NUEVO MODELO 
  //------------------------------------------------------------------
  //--------METODO PARA DAR DE ALTA UN NUEVO CONCEPTO-----------------    
  $('#agregar_concepto').click(function(){   
    var id_modelo   = $('#selector_modelo').val();
    var id_etapa    = $('#selector_etapa').val();
    var concepto    = $('#nombre_concepto').val();  
    var partida     = $('#partida_concepto').val();
    var unidad      = $('#unidad_concepto').val();
    var precio      = $('#precio_concepto').val();
    var cantidad    = $('#cantidad_concepto').val();
    var importe     = $('#importe_concepto').val();
    if(id_modelo==''||id_etapa==''||concepto==''||unidad==''||precio==''||cantidad==''||importe=='')
    {
    swal({ 
      title: "Error",   
      icon: "warning", 
      text: "Favor de llenar todos los campos correctamente.",
    });
    } 
    else
    {      
      $.ajax
      ({
      url: 'crud_modelo/nuevo_concepto.php',
      data: {"id_modelo": id_modelo, "id_etapa": id_etapa, "concepto": concepto, "partida" : partida, "unidad" : unidad, "precio" : precio, "cantidad" : cantidad, "importe" : importe},
      type: 'post',
      success: function(result)
      {
        M.toast({html: result});
        //alert(result);
       //window.location.reload()
      }
      });
    } 
  });
  //TERMINA METODO PARA DAR DE ALTA UN NUEVO CONCEPTO-----------------
  //------------------------------------------------------------------
  //-----------SE DECLARAN LOS SELECTS QUE SE USARÁN EN EVENTOS ONCHANGE
  var select_modelo    = document.getElementById('selector_modelo');
  var select_conceptos = document.getElementById('#selector_conceptos');
  //--------------------------------------------------------------------
  //------- METODOS ONCHANGE DE SELECT DECLARADOS PREVIAMENTE-----------
  //--------------------------------------------------------------------
  //--------METODO PARA MOSTRAR LOS CONCEPTOS DE UN MODELO EN LA TABLA--
  select_modelo.onchange=function(){

    //INICIA ACCION DE ICONO VER INSUMO     

    var id_modelo = $('#selector_modelo').val();
    $('#row_modelo_conceptos').empty();
      /*----------------------------------------------------------
      ------------------------------------------------------------
      -----------------------------------------------------------*/
      $.ajax({
          type:'POST',
          url:'crud_modelo/mostrar_conceptos_modelo.php',
          dataType: "json",
          data:{'id_modelo' : id_modelo},
          success:function(data){
            if(data!=''){
                var arreglo = data;
                
                $('#row_modelo_conceptos').html(arreglo);
                
            }else{
                //M.toast({html: 'Insumos no encontrados', classes: 'rounded'}); 
                swal({ 
                      title: "Alerta!!!",   
                      icon: "warning", 
                      text: "INSUMOS NO ENCONTRADOS",
                    });
            } 
          }
      });
      /*-----------------------------------------------------------
      -------------------------------------------------------------
      ------------------------------------------------------------*/
    //TERMINA ACCION DE ICONO VER INSUMO
    /*
    var id_modelo = $('#selector_modelo').val();

    $.ajax({
    url: 'crud_modelo/mostrar_conceptos_modelo.php',
    type: 'post',
    data: {'id_modelo': id_modelo},
    success: function(response){
    $('#body_conceptos_modelo').append(response);
    console.log(response);
    }
    });*/
  }; 
  //--------TERMINA METODO PARA MOSTRAR CONCEPTOS-----------------------
  //--------------------------------------------------------------------
  //--------METODO PARA MOSTRAR UNIDAD DE MEDIDA Y NOMBRE DEL CONCEPTO--
  selector_conceptos.onchange = function(){
    var id_concepto = $(this).val();

    //--------------------------inicia ajax para obtener Unidad de Medida y Nombre
    $.ajax({
              type:'POST',
              url:'crud_modelo/mostrar_concepto.php',
              dataType: "json",
              data:{id_concepto:id_concepto},
              success:function(data){
              if(data.status == 'ok'){
                  //$('#row_editar_orden').html("");
                  $('#nombre_concepto').val(data.result.descripcion);
                  $('#unidad_concepto').val(data.result.medida);
                  $('#partida_concepto').val(data.result.partida);
              }else{
                  //M.toast({html: 'Orden no encontrada', classes: 'rounded'}); 
                  swal({ 
            title: "Alerta!",   
            icon: "warning", 
            text: "Concepto NO ENCONTRDA",
          });
              } 
              }
          });
    //--------------------------Termina ajax para obtener Unidad de Medida y Nombre
    //$('#nombre_concepto').val($('#selector_conceptos option:selected').html());
  };
  //--------TERMINA METODO PARA MOSTRAR U/M Y NOMBRE DE CONCEPTO--------
  //--------------------------------------------------------------------
  //--------MÉTODO MUESTRA LOS CONCEPTOS EN TABLA DESDE ICONO VER-------
  $('.ver').click(function(){
  var id_modelo = $(this).attr("id");

  $.ajax({
        type:'POST',
        url:'crud_modelo/mostrar_conceptos_modelo.php',
        dataType: "json",
        data:{id_modelo: id_modelo},
        success:function(data){
          if(data!=''){
              var arreglo = data;             
              $('#row_conceptos_modelo_modal4').html(arreglo);
              $('#modal4').modal(); 
              $('#modal4').modal('open');
          }else{
              swal({ 
                    title: "Alerta!",   
                    icon: "warning", 
                    text: "CONCEPTOS NO ENCINTRADOS",
                  });
                } 
        }                
       });
    });
  //--------TERMINA METODO DE MOSTRAR CONCEPTOS DESDE ICONO VER---------
  //--------------------------------------------------------------------
//--------MÉTODOS PARA CALCULO-------
//INFO CONCEPTO    
document.getElementById('precio_concepto').addEventListener("keyup", calcular);   
function calcular(){        
var cantidad = document.getElementById('cantidad_concepto');
var precio = document.getElementById('precio_concepto');
var importe = document.getElementById('importe_concepto'); 
c=parseFloat(cantidad.value); 
p=parseFloat(precio.value);  
//i=parseFloat(importe.value); 
//var i;
importe.value=parseFloat(c*p); 
//alert(i);
} 
//INFO CONCEPTO        

//INFO CONCEPTO    
document.getElementById('cantidad_concepto').addEventListener("keyup", calcular);   
function calcular(){        
var cantidad = document.getElementById('cantidad_concepto');
var precio = document.getElementById('precio_concepto');
var importe = document.getElementById('importe_concepto'); 
c=parseFloat(cantidad.value); 
p=parseFloat(precio.value);  
//i=parseFloat(importe.value); 
//var i;
importe.value=parseFloat(c*p); 
//alert(i);
} 
//INFO CONCEPTO       
//--------TERMINA METODOS PARA CALCULO---------







}); 