function grafica_pie2(id){
  var num_semana = [];
  var concepto = []; 

  $.getJSON('show2.php',{id:id},function(data){
    $.each(data,function(i,value){ 
      concepto.push(data[i].concepto);
      num_semana.push(data[i].num_semana);
      console.log(i+" "+value);
    }); 
    var tex='Semana: ';
    var chartdata = {
                labels: num_semana,
                datasets : [
                    {
                        label: 'Importes Ejecutados por Semana',
                        backgroundColor: 'rgba(196, 229, 56,1.0)',
                        borderColor: 'rgba(248, 194, 145,1.0)',
                        hoverBackgroundColor: 'rgba(255, 165, 2,1.0)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: concepto
                    }
                ]
            }; 

            var ctx = $("#pie-chart2");

            var barGraph = new Chart(ctx, {
                type: 'line', 
                data: chartdata
            });
  })
} 
