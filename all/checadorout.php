<?php

session_start();

if(!isset($_SESSION['rol'])){
    header('location: ../login.php');
}else{
    if($_SESSION['rol'] != 2){
        header('location: ../login.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Checador OUT </title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <script src="https://kit.fontawesome.com/77cf46e692.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/stylet.css">    
	<!-- Pickadate CSS -->
    <link rel="stylesheet" href="css/classic.css">    
	<link rel="stylesheet" href="css/classic.date.css">    
	<link rel="stylesheet" href="css/classic.time.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    
    <link rel="stylesheet" href="css/stylem.css">
	<link rel="stylesheet" href="css/style2.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="checadorout.php">
					
					<img src="img/tesh.png" alt="" />
					<img src="img/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
					<!--<li class="nav-item active"><a class="nav-link" href="admin.php">Home</a></li>-->
					<li class="nav-item "><a class="nav-link" href="tomarundescanso.php">Tomar descanso</a></li>
					<li class="nav-item dropdown" >
                <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">
				<?PHP ECHO $_SESSION['nombre'], ' ',$_SESSION['ap'],' ',$_SESSION['am'];?> 
                    <img src="img/user-1.jpg" class="img-fluid rounded-circle avatar mr-2"
                      alt="https://generated.photos/" />
                    </a>
        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                    <!--a href="miperfil.php" class="dropdown-item" class="d-block text-light p-3 border-0"><i class="fa-solid fa-address-card"></i>
                    Mi perfil</a>
					<a href="asistenciapersonal.php" class="dropdown-item" class="d-block text-light p-3 border-0"><i class="fa-solid fa-clipboard-check"></i>
                   	Mi Asistencia</a>
					<a href="descansopersonal.php" class="dropdown-item" class="d-block text-light p-3 border-0"><i class="fa-solid fa-pause"></i>
                    Mis Descansos</a-->
                    <a href="../login.php?cerrar_sesion" class="dropdown-item" class="d-block text-light p-3 border-0"><i class="fa-solid fa-arrow-right-from-bracket"></i>
                    Cerrar sesión</a>          
        </div>
    	</li>
					
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb6">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>REGISTRE SU SALIDA</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	
	<!-- Start Reservation -->
	<form action="php/checkout.php" class="formulario" id="formulario" method="POST" >
	<div class="reservation-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
					<div class="container-clock">
					<h1 id="time">00:00:00</h1>
        			<p id="date">date</p>	
					</div>
								<div class="submit-button text-center">
										<button class="btn btn-common" id="submit" type="submit">Registre su salida</button>
										<div id="msgSubmit" class="h3 text-center hidden"></div> 
										<div class="clearfix"></div> 
									</div>
								</div>
					</div>
    
					
                    
					</div>
				</div>		
			</div>
		</div>
	</div>
	<!-- End Reservation -->
</form>

	<div class="map-full"></div>
	
	<!-- End Footer -->
	</main>
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/jquery.mapify.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>



    <script src="js/custom.js"></script>
    <script src="js/clock.js"></script>

	<script>
		$('.map-full').mapify({
			points: [
				{	
					
					lat: 40.7143528,
					lng: -74.0059731,
					marker: true,
					title: 'Marker title',
					infoWindow: 'TU ESTAS AQUI'
				}
			]
		});	
	</script>
</body>
</html>