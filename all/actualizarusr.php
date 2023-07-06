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
<?php
$id='';
$ncontrol='';
$correo='';
$password='';
$nombres='';
$ap='';
$am='';
$foto='';
$idrol='';
$idh='';
?>
<?php
   
   if(isset($_POST['idusuario'])){
  
	$id = $_POST['idusuario'];
	include 'php/db2.php';
 	 $db = new Database();
    $query_usuario = $db->connect()->prepare("SELECT * FROM usuarios WHERE idusuario = '$id'");
    $query_usuario->execute();
    $usuarios = $query_usuario->fetchAll(PDO::FETCH_ASSOC);           
    foreach($usuarios as $usuario) {
                
				
				$id= $usuario['idusuario'];
				$ncontrol= $usuario['ncontrol'];
                $correo = $usuario['correo'];
                $password = $usuario['password'];
                $nombres = $usuario['nombres'];
                $ap = $usuario['ap'];
                $am = $usuario['am'];
                $foto = $usuario['fotoperfil'];
                $idrol = $usuario['id_rol'];
                
				
            }
   		}
		?>
<?php
   
   if(isset($_POST['idhorario'])){
  
	$idh = $_POST['idhorario'];
	
    $query_horario = $db->connect()->prepare("SELECT * FROM horario WHERE idhorario = '$idh'");
    $query_horario->execute();
    $horarios = $query_horario->fetchAll(PDO::FETCH_ASSOC);           
    foreach($horarios as $horario) {
                
				
				$idh= $horario['idhorario'];
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
    <title>ACTUALIZAR USUARIOS</title>  
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
				<a class="navbar-brand" href="index.php">
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
	<div class="all-page-title page-breadcrumb9">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>ACTUALIZAR USUARIOS</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
   
<main>

		<form action="actualizarusr.php" method="POST">
			<!-- Grupo: Seleccionaruser -->
			<div class="formulario__grupo" id="grupo__nombre">
				<label for="nombre" class="formulario__label">Seleccionar usuario</label>
				<div class="formulario__grupo-input">
				<select  class="custom-select d-block form-control" id="idusuario" name="idusuario" required data-error="Please select Person">
					   
						<option disabled selected>Seleccione un usurario *</option>
						
						<?php
						$conexion=mysqli_connect('localhost', 'root', '', 'eystesh');
						$consulta="SELECT * FROM usuarios";
						$ejecutar=mysqli_query($conexion, $consulta) or die (mysqli_error($conexion)); 
						?>
						
						<?php foreach($ejecutar as $opciones): ?>
						<option value="<?php echo $opciones['idusuario']?>"><?php echo $opciones['idusuario'], ' ',$opciones['nombres'], ' ',$opciones['ap'], ' ',$opciones['am']?></option>
						
						
						<?php endforeach ?>
						
				</select>
				<!-- Grupo: horario -->		
				<div class="formulario__grupo" id="grupo__nombre">
				<label for="nombre" class="formulario__label">Seleccione el horario</label>
				<div class="formulario__grupo-input">
				<select  class="custom-select d-block form-control" id="idhorario" name="idhorario" required data-error="Please select Person">
					   
						<option disabled selected>Seleccione el horario *</option>
						
						<?php
						$conexion=mysqli_connect('localhost', 'root', '', 'eystesh');
						$consulta="SELECT * FROM horario";
						$ejecutar=mysqli_query($conexion, $consulta) or die (mysqli_error($conexion)); 
						?>
						
						<?php foreach($ejecutar as $opciones):?>
						<option value="<?php echo $opciones['idhorario']?>"><?php echo $opciones['idhorario'], ' ',$opciones['area'], ' ',$opciones['descripcion'], ' ',$opciones['inicio'], ' ',$opciones['fin']?></option>
	
						<?php endforeach ?>
						
				</select>
				<button type="submit" class="formulario__btn">Seleccionar</button>
				</div>
			</div>
		</form>
<form action="php/actualizarusr.php" class="formulario" id="formulario" >
    
	<!------------------------------------------------>
			<!-- Grupo: Nombre -->
			
					<input type="hidden" class="formulario__input" name="id" id="id"  value="<?php echo $id;?>">
					<input type="hidden" class="formulario__input" name="id_horario" id="id_horario"  value="<?php echo $idh;?>">
					
			<!-- Grupo: Nombre -->
			<div class="formulario__grupo" id="grupo__nombres">
				<label for="nombres" class="formulario__label">Nombre(S)</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="nombres" id="nombres" placeholder="Ingrese su nombre" value="<?php echo $nombres;?>"required>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El Nombre tiene que ser de 5 a 20 dígitos y solo puede contener letras.</p>
			</div>
			<!-- Grupo: ncontrol -->
			<div class="formulario__ncon" id="grupo__ncontrol">
				<label for="ncontrol" class="formulario__label">Numero de control</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="ncontrol" id="ncontrol" placeholder="Ingrese el numero de control" value="<?php echo $ncontrol;?>"required>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El Numero de control debe contener unicamente 8 numeros.</p>
			</div>
			<!-- Grupo: AP -->
			<div class="formulario__grupo" id="grupo__ap">
				<label for="ap" class="formulario__label">Apellido Paterno</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="ap" id="ap" placeholder="Ingrese su Apellido" value="<?php echo $ap;?>"required>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El Apellido Paterno tiene que ser de 5 a 20 dígitos y solo puede contener letras.</p>
			</div>
			<!-- Grupo: AM -->
			<div class="formulario__grupo" id="grupo__am">
				<label for="am" class="formulario__label">Apellido Materno</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="am" id="am" placeholder="Ingrese su Apellido" value="<?php echo $am;?>"required>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El Apellido Materno tiene que ser de 5 a 20 dígitos y solo puede contener letras.</p>
			</div>

			<!-- Grupo: Contraseña -->
			<div class="formulario__grupo" id="grupo__password">
				<label for="password" class="formulario__label">Contraseña</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="password" id="password" placeholder="Ingrese su contraseña" value="<?php echo $password;?>"required>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">La contraseña unicamente debe contener los 11 numeros del NSS.</p>
			</div>

			<!-- Grupo: Contraseña 2 -->
			<div class="formulario__grupo" id="grupo__password2">
				<label for="password2" class="formulario__label">Repetir Contraseña</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="password2" id="password2" placeholder="Ingrese nuevamente" value="<?php echo $password;?>"required>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
			</div>

			<!-- Grupo: Correo Electronico -->
			<div class="formulario__grupo" id="grupo__correo">
				<label for="correo" class="formulario__label">Correo Electrónico</label>
				<div class="formulario__grupo-input">
					<input type="email" class="formulario__input" name="correo" id="correo" placeholder="correo@correo.com" value="<?php echo $correo;?>"required>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
			</div>
			<!-- Grupo: tipodeusuario -->
			<div class="formulario__grupo" id="grupo__nombre">
				<label for="nombre" class="formulario__label">Tipo de usuario</label>
				<div class="formulario__grupo-input">
				<select class="custom-select d-block form-control" id="id_rol" name="id_rol" required data-error="Please select Person" value="<?php echo $idrol;?>" required>
					<option disabled selected>Tipo de Usuario</option>
						<option value="1">Profesor</option>
						<option value="2">Empleado</option>
				</select>
				</div>
				
			</div>
			
		
			<!-- Grupo: foto -->
			<div class="formulario__grupo" id="grupo__foto">
				<label for="foto" class="formulario__label">Foto de perfil</label>
				<div class="formulario__grupo-input" >
					<input name="foto" id="foto" type="file" value="<?php echo $foto;?>">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				
			</div>



			<div class="formulario__mensaje" id="formulario__mensaje">
				<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
			</div>

			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<button type="submit" class="formulario__btn">Guardar</button>
				<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
			</div>

</form>
	<!-- End Reservation -->

			

</main>


<script src="js/formulario2.js"></script>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

</body>
</html>