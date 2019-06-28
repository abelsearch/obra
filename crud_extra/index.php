<?php include('smenu.php'); ?>
<?php include('menu_index.php'); ?>
<style> 
#inline{width:100%;height:auto;display:flex;}
.one,.two{width:50%;height:100px;margin:10px;}
</style>
<div class="row">
    <div class="col l12">
  <ul class="collection #e0e0e0 grey lighten-2" >
    <li class="collection-item avatar #cfd8dc blue-grey lighten-4"> 
    <i class="material-icons circle blue">folder</i>     
      <span class="title">Nueva Obra Creada</span>
      <p>Módulo de Obras
      </p>
      <a href="#!" class="secondary-content"><span class="new badge">1</span></a>
    </li>
    <li class="collection-item avatar #cfd8dc blue-grey lighten-4">
      <i class="material-icons circle green">folder</i>
      <span class="title">Nuevo Avance Registrado</span>
      <p>Folio ODT-2</p>
      <a href="#!" class="secondary-content"><span class="new badge">1</span></a>
    </li>    
  </ul>
  </div>
</div>
<div id="cont">
<div class="col l9 m12 s12" >
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
$(function(){
Materialize.toast('Hola de nuevo!!!', 4000);
});
</script>

<div id="inline"> 
<div class="one"> 
<canvas id="myChart" style="position: relative; height:40vh; width:80vw"> 
</canvas>  
</div>

<div class="two">
<canvas id="myChart2" style="position: relative; height:40vh; width:80vw">
</canvas> 
</div>
</div> 
<br> 
<br> 
<br>
<div>
<canvas id="myChart3" style="position: relative; height:40vh; width:80vw">
</canvas> 
</div>

<script>
var ctx2 = document.getElementById("myChart2").getContext('2d');
var myChart2 = new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>


<script>
var ctx3 = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>

<!-- TEST MYSQL --> 
<script>
$(document).ready(function(){
    $.ajax({
        url: "http://seicolaguna.com/sistema/data.php",
        method: "GET",
        success: function(data) {
            console.log(data); 
            var folio = [];
            var presupuesto = []; 
            //var score = []; 
            
            for(var i in data) {
                folio.push("Orden " + data[i].folio); 
                presupuesto.push(data[i].presupuesto);
                //presupuesto.push("Presupuesto " + data[i].id); 
                //score.push(data[i].score);
            }

            var chartdata = {
                labels: folio,
                datasets : [
                    {
                        label: 'Presupuesto de Órdenes',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 0.2)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: presupuesto
                    }
                ]
            };

            var ctx = $("#myChart3");

            var barGraph = new Chart(ctx, {
                type: 'line',
                data: chartdata
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
});
</script>

</body> 
</div>
</html>