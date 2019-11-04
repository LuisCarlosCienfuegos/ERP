<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/Chart.min.js"></script>
    <style type="text/css">
    	#myChart{
    		max-width: 70%
    	}
    </style>
</head>
<body>

<canvas id="myChart"></canvas>
<?php 
  require_once("compras.php");
  $obj = new Compras();


?>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php $obj->etiquetasCompras(); ?>],
        datasets: [{
            label: 'Existencia de Compras',
            data: [<?php $obj->datosCompras(); ?>],
            backgroundColor: 'steelblue',
            borderColor: 'rgb(255,255,0)',
            borderWidth:1

        }]
    },
            
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>




</body>
</html>