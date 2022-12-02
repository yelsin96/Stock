<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Stock</title> 
    <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		<?php 

			session_start();
	 
			if(!isset($_SESSION['user_id'])){
			    header('Location: login.php');
			    exit;
			} else {
				include "Menu.php"; 
		?>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">	
				<div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
			      <!-- Carousel indicators -->
			      <ol class="carousel-indicators">
			        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			        <li data-target="#myCarousel" data-slide-to="1"></li>
			        <li data-target="#myCarousel" data-slide-to="2"></li>
			      </ol>
			      <!-- Carousel items -->
			      <div class="carousel-inner">
			        <div class="item active">
			          <img src="img/banner1.jpg" class="img-fluid" alt="First Slide">
			          <div class="carousel-caption">
			            <h3>Título de la primera diapositiva</h3>
			            <p>Contenido de la diapositiva</p>
			          </div>
			        </div>
			        <div class="item">
			          <img src="img/banner2.jpg" alt="Second Slide">
			          <div class="carousel-caption">
			            <h3>Título de la segunda diapositiva</h3>
			            <p>Contenido de la diapositiva</p>
			          </div>
			        </div>
			        <div class="item">
			          <img src="img/banner3.jpg" alt="Third Slide">
			          <div class="carousel-caption">
			            <h3>Título de la tercera diapositiva</h3>
			            <p>Contenido de la diapositiva</p>
			          </div>
			        </div>
			      </div>
			      <!-- Carousel nav -->
			      <a class="carousel-control left" href="#myCarousel" data-slide="prev">
			      <span class="glyphicon glyphicon-chevron-left"></span>
			      </a>
			      <a class="carousel-control right" href="#myCarousel" data-slide="next">
			      <span class="glyphicon glyphicon-chevron-right"></span>
			      </a>
			    </div>
	    	</div>
	    	<div class="col-md-2"></div>
	    </div>

		
	</div>
	
	<script type="text/javascript" src='js/jquery.min.js'></script>
	<script type="text/javascript" src='js/bootstrap.min.js'></script>

	<?php 
	}
	 ?>
</body>
</html>