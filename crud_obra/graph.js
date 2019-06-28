function grafica_pie(id){
  var num_semana = [];
  var insumo = [];  
  
  $.getJSON('show.php',{id:id},function(data){
    $.each(data,function(i,value){ 
      insumo.push(data[i].insumo);
      num_semana.push(data[i].num_semana);
      console.log(i+" "+value);
    }); 

    var chartdata = {
                labels: num_semana,
                datasets : [
                    {
                        label: 'Insumos por Semana',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 0.2)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: insumo
                    }
                ]
            }; 

            var ctx = $("#pie-chart");

            var barGraph = new Chart(ctx, { 

                type: 'bar',
                data: chartdata
            });
  })
} 