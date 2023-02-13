<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Stock</title>
    <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/adminlte.min.css"> -->
</head>

<body>
    <div class="container-fluid">
        <?php 

			session_start();
	 
			if(!isset($_SESSION['user_id'])){
			    header('Location: login.php');
			    exit;
			} else {
				include "Menu.php"; 
		?>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <?php include "donutChart.php"; ?>
                    </div>
                    <div class="col-md-6">
                        <?php include "equiposCambio.php"; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <?php include "carrusel.php"; ?>
            </div>
        </div>

    </div>

    <script type="text/javascript" src='js/jquery.min.js'></script>
    <script type="text/javascript" src='js/bootstrap.min.js'></script>
    <script src="js/chart.js/Chart.min.js"></script>
    <script>
    $(function() {

        //-------------
        //- DONUT CHART -
        //-------------
        let totalSistemas = document.getElementById("totalSistemas").value;
        let arraySistemas = [];
        let arrayCantidadSistema = [];
        for (let contador = 0; contador <= totalSistemas; contador++) {
            arraySistemas.push(document.getElementById("sistema"+contador).value);
            arrayCantidadSistema.push(document.getElementById("cantidadSistema"+contador).value);
            console.log(arraySistemas);
            console.log(arrayCantidadSistema);
        }

        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: arraySistemas,
            datasets: [{
                data: arrayCantidadSistema,
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }

        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })

    })
    </script>
    <?php 
	}
	 ?>
</body>

</html>