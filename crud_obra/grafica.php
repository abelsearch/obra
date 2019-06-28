<?php 
session_start(); 
?> 

<?php include('../menu.php'); ?>  

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>


<div class="container"> 
      <div class="row">
        <div class="col-m-12 text-center">
          <div class="col-m-6"> 
           <div id="title"> 
    <h2 class="form-signin-heading "> GRÁFICAS</h2> 
    </div>

<div id="buttons">
    <button class="btn #757575 grey darken-1 z-depth-5" type="button" id="btn-back">
    <i class="material-icons white-text left ">arrow_back</i>Volver</button>
    </div>

<div id="inline"> 
<div class="one"> 
<canvas id="myChart" style="position: relative; height:40vh; width:80vw"> 

</canvas>  
</div>
</div> 


</div> 
</div>
</div> 
</div> 

<!-- TEST MYSQL --> 
<script>
$(document).ready(function(){
    $.ajax({
        url: "http://cedeg.mx/iisac/crud_orden/data.php",
        method: "GET",
        success: function(data) {
            console.log(data); 
            var folio = [];
            var presupuesto = []; 
            var gasto = []; 
            

            for(var i in data) {
                folio.push("Orden " + data[i].folio); 
                presupuesto.push(data[i].presupuesto);
                gasto.push(data[i].gasto); 
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

            var ctx = $("#myChart");

            var barGraph = new Chart(ctx, {
                type: 'pie',
                data: chartdata
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
});
</script> 

 <script>
        $("#btn-back").click(function(){
        $("body").fadeOut('fast',function()
        { 
        window.location.href="../orden_index.php"; 
        });
        }); 
        </script>

