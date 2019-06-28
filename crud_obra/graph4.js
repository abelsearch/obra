function grafica_pie4(id){//indicadores de bienestar
  var num_semana = [];
  var insumo = []; 

  $.getJSON('show4.php',{id:id},function(data){
    $.each(data,function(i,value){ 
      insumo.push(data[i].insumo);
      num_semana.push(data[i].num_semana);
      console.log(i+" "+value);
    }); 

    var chartdata = {
                labels: num_semana,
                datasets : [
                    {
                        label: 'Material (Salida por Semana)',
                        backgroundColor: 'rgba(255, 165, 2,1.0)',
                        borderColor: 'rgba(248, 194, 145,1.0)',
                        hoverBackgroundColor: 'rgba(255, 165, 2,1.0)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: insumo
                    }
                ]
            }; 

            var ctx = $("#pie-chart4");

            var barGraph = new Chart(ctx, {
                type: 'line',
                data: chartdata
            });
  })
} 
