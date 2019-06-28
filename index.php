<?php include('smenu.php'); ?>
<?php include('menu_index.php'); ?>
<!--<style> 
#inline{width:100%;height:auto;display:flex;}
.one,.two{width:70%;height:100px;margin:10px;}
</style>-->
    <div class="row">
        <div class="col l8 m12 s12">
          <ul class="collection" >
            <li class="collection-item avatar color-fondo"> 
            <i class="material-icons circle blue">folder</i>     
              <span class="title">Nueva Obra Creada</span>
              <p>Módulo de Obras
              </p>
              <a href="#!" class="secondary-content"><span class="new badge">1</span></a>
            </li>
            <li class="collection-item avatar   color-fondo">
              <i class="material-icons circle green">folder</i>
              <span class="title">Nuevo Avance Registrado</span>
              <p>Folio ODT-2</p>
              <a href="#!" class="secondary-content"><span class="new badge">1</span></a>
            </li>    
          </ul>
        </div>
        <div class="col l4 m12 s12" style="margin-top:1em">
            <img src="img/almacen.png" width="100%">
        </div>
    </div>    
    <div class="row">
        <div class="one col l6 m12 s12">
            <canvas id="myChart" >
            </canvas>  
        </div>
        <div class="two col l6 m12 s12">
            <canvas id="myChart3" >
            </canvas> 
        </div>
        <div class="col l12 m12 s12" style="margin-top:1em">
            <img src="img/footer2.png" class="tooltipped"data-position="top" data-tooltip="Conoce a cerca de nosotros..."width="100%" height="143px">
        </div>
    </div>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
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
    <!-- Gráfica de presupuestos ejecutados --> 
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
                        
                    }

                    var chartdata = {
                        labels: folio,
                        datasets : [
                            {
                                label: 'Presupuesto de Obras',
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
    <!--Finaliza gráfica de presupuestos ejecutados-->
    <!-- Gráfica de presupuestos iniciales--> 
    <script>
        $(document).ready(function(){
            $.ajax({
                url: "http://seicolaguna.com/sistema/data2.php",
                method: "GET",
                success: function(data) {
                    console.log(data); 
                    var folio = [];
                    var costo = []; 
                    var coloR = [];   

                    var dynamicColors = function() {
                    var r = Math.floor(Math.random() * 255);
                    var g = Math.floor(Math.random() * 255);
                    var b = Math.floor(Math.random() * 255);
                    return "rgb(" + r + "," + g + "," + b + ")";
                 };
                    
                    for(var i in data) {
                        folio.push(data[i].folio); 
                        costo.push(data[i].costo); 
                        coloR.push(dynamicColors());
                    } 

                   
                    var chartdata = {
                        labels: folio,
                        datasets : [
                            {
                                label: 'Presupuesto Ejecutado - Ultimos 5 presupuestos',
                                backgroundColor: coloR,
                                borderColor: 'rgba(54, 162, 235, 0.2)',
                                hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                                hoverBorderColor: 'rgba(200, 200, 200, 1)',
                                data: costo
                            }
                        ]
                    };

                    var ctx2 = $("#myChart");

                    var barGraph = new Chart(ctx2, {
                        type: 'bar',
                        data: chartdata
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
    <!--Finaliza gráfica de presupuestos iniciales-->
</body> 
</div>
</html>