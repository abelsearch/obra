function grafica_pie4(id){//indicadores de bienestar
  var cantidad = [];
  var nombre_insumo = []; 

  $.getJSON('show4.php',{id:id},function(data){
    $.each(data,function(i,value){ 
      nombre_insumo.push(data[i].nombre_insumo);
      cantidad.push(data[i].cantidad);
      console.log(i+" "+value);
    }); 

    var chartdata = {
                labels: nombre_insumo,
                datasets : [
                    {
                        label: 'Material (Salida por Semana)',
                        //backgroundColor: 'rgba(255, 165, 2,1.0)',
                        borderColor: 'rgba(248, 194, 145,1.0)',
                        hoverBackgroundColor: 'rgba(255, 165, 2,1.0)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: cantidad
                    }
                ]
            }; 

            var ctx = $("#pie-chart4");

            var barGraph = new Chart(ctx, {
                type: 'polarArea',
                data: chartdata
            });
  })
} 
