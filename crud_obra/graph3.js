function grafica_pie3(id){//indicadores de bienestar
  var total = [];
  //var num_semana = [];
  //var adicional = []; 

  $.getJSON('show3.php',{id:id},function(data){
    $.each(data,function(i,value){ 
      total.push(data[i].total);
      //adicional.push(data[i].adicional);
      //num_semana.push(data[i].num_semana);
      console.log(i+" "+value);
    }); 

    var chartdata = {
                //labels: num_semana, 
                datasets : [
                    {
                        label: 'Avance por M2',
                        backgroundColor: 'rgba(223, 228, 234,1.0)',
                        borderColor: 'rgba(248, 194, 145,1.0)',
                        hoverBackgroundColor: 'rgba(255, 165, 2,1.0)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: total
                    }
                ]
            }; 

            var ctx = $("#pie-chart3");

            var barGraph = new Chart(ctx, {
                type: 'line',
                data: chartdata
            });
  })
} 
