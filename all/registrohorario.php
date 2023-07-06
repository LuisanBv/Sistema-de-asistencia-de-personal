<?php

session_start();

if(!isset($_SESSION['rol'])){
    header('location: ../login.php');
}else{
    if($_SESSION['rol'] != 4){
        header('location: ../login.php');
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 

    
	<!---------------------------------------------------------------------------------------------------------->
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>REGISTRAR NUEVOS HORARIOS</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS --> 
	<link rel="stylesheet" href="css/stylet.css">
    <link rel="stylesheet" href="css/stylebar.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/estilos2.css">
    
</head>
<body>
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="admin.php">
				    <img src="img/tesh.png" alt="" />
					<img src="img/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="admin.php">Home</a></li>
				
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb7">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>REGISTRAR NUEVOS HORARIOS</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
   
<main>


<form action="php/registrohor.php" class="formulario" id="formulario">
    
	<!------------------------------------------------>
			<!-- Grupo: AREA -->
			<div class="formulario__grupo" id="grupo__nombres">
				<label for="area" class="formulario__label">Area</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="area" id="area" placeholder="Ingrese el area" required>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El Area tiene que ser de 5 a 20 dígitos y solo puede contener letras.</p>
			</div>
			<!-- Grupo: DESCRIPCION -->
			<div class="formulario__ncon" id="grupo__ncontrol">
				<label for="descripcion" class="formulario__label">Descripcion</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="descripcion" id="descripcion" placeholder="Ingrese la descripcion" required>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">La Descripcion debe contener unicamente letras.</p>
			</div>
			<!-- Grupo: INICIO -->
			<div class="formulario__grupo" id="grupo__ap">
				<label for="inicio" class="formulario__label">Hora de Inicio</label>
				<div class="formulario__grupo-input">
					<input type="time" class="formulario__input" name="inicio" id="inicio" placeholder="Ingrese la hora de incio 07:00 hrs" required>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">La Hora de Inicio solo puede tener el formato 00:00 HRS.</p>
			</div>
			<!-- Grupo: FIN -->
			<div class="formulario__grupo" id="grupo__am">
				<label for="fin" class="formulario__label">Hora de Termino</label>
				<div class="formulario__grupo-input">
					<input type="time" class="formulario__input" name="fin" id="fin" placeholder="Ingrese la hora de termino 13:00 hrs" required>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">La Hora de Termino solo puede tener el formato 00:00 HRS.</p>
			</div>

		
			<div class="formulario__mensaje" id="formulario__mensaje">
				<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
			</div>

			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<button type="submit" class="formulario__btn">Enviar</button>
				<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
			</div>

</form>
	<!-- End Reservation -->

			

</main>


<script src="js/formulario22.js"></script>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

</body>
</html>