<?php
	
	date_default_timezone_set('America/Mexico_City');    
	$Date = date('Y-m-d ');  
	$Time = date('H:i:s ');  
	
	?>

<?php
    include_once 'php/db2.php';
    
    session_start();
    if(isset($_GET['cerrar_sesion'])){
        session_unset(); 

        // destroy the session 
        session_destroy(); 
    }
    
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
              $lleno="SELECT entradaysalida.fecha, entradaysalida.id_usuario FROM entradaysalida WHERE entradaysalida.horaout != '00:00:00' AND entradaysalida.id_usuario='$us' AND entradaysalida.fecha='$Date'";
                $lleno=$db->connect()->query($lleno);
                $row2 = $lleno->fetch(PDO::FETCH_NUM);
                if($row2 == true){

                  header('location: all/yacheco.php');
                }
                else{
                $sql="SELECT entradaysalida.fecha, entradaysalida.horaout, entradaysalida.id_usuario FROM entradaysalida WHERE entradaysalida.horaout = '00:00:00' AND entradaysalida.id_usuario='$us' AND entradaysalida.fecha='$Date'";
                $sql=$db->connect()->query($sql);
                $row1 = $sql->fetch(PDO::FETCH_NUM);
                if($row1 == true){
                  
                  header('location: all/checadorout.php');
                }else{
                    header('location: all/checadorin.php');
                  }
                }
              break;

              case 2:
                $lleno="SELECT entradaysalida.fecha, entradaysalida.id_usuario FROM entradaysalida WHERE entradaysalida.horaout != '00:00:00' AND entradaysalida.id_usuario='$us' AND entradaysalida.fecha='$Date'";
                $lleno=$db->connect()->query($lleno);
                $row2 = $lleno->fetch(PDO::FETCH_NUM);
                if($row2 == true){

                  header('location: all/yacheco.php');
                }
                else{
                $sql="SELECT entradaysalida.fecha, entradaysalida.horaout, entradaysalida.id_usuario FROM entradaysalida WHERE entradaysalida.horaout = '00:00:00' AND entradaysalida.id_usuario='$us' AND entradaysalida.fecha='$Date'";
                $sql=$db->connect()->query($sql);
                $row1 = $sql->fetch(PDO::FETCH_NUM);
                if($row1 == true){
                  
                  header('location: all/checadorout.php');
                }else{
                    header('location: all/checadorin.php');
                  }
                }
              break;
              case 3:
                header('location: all/checadorin.php');
              break;
              case 4:
                header('location: all/admin.php');
              break;

            default:
        }
    }

    if(isset($_POST['correo']) && isset($_POST['password'])){
        $correo = $_POST['correo'];
        $password = $_POST['password'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT * FROM usuarios WHERE correo = :correo AND password = :password');
        $query->execute(['correo' => $correo, 'password' => $password]);
 
        $row = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true){

          if(!empty($_POST['check'])) {

            $remember = $_POST['check'];
            //setcockies
            setcookie('correo',$correo,time()+3600*24*7);
            setcookie('password',$password,time()+3600*24*7);
            setcookie('userlogin',$remember,time()+3600*24*7);

              }else{ //expire coockie
                  setcookie('correo',$correo,30);
                  setcookie('password',$password,30);
                  }




            $rol = $row[8];
            $_SESSION['idusuario'] = $row[0];
            $us= $_SESSION['idusuario'];
            $_SESSION['ncontrol'] = $row[1];
            $_SESSION['correo'] = $row[2];
            $_SESSION['password'] = $row[3];
            $_SESSION['nombre'] = $row[4];
            $_SESSION['ap'] = $row[5];
            $_SESSION['am'] = $row[6];
            $_SESSION['foto'] = $row[7];
            $_SESSION['id_rol'] = $row[8];
            $_SESSION['id_horario'] = $row[9];
            $_SESSION['rol'] = $rol;
           

            switch($rol){
              case 1:
                $lleno="SELECT entradaysalida.fecha, entradaysalida.id_usuario FROM entradaysalida WHERE entradaysalida.horaout != '00:00:00' AND entradaysalida.id_usuario='$us' AND entradaysalida.fecha='$Date'";
                $lleno=$db->connect()->query($lleno);
                $row2 = $lleno->fetch(PDO::FETCH_NUM);
                if($row2 == true){

                  header('location: all/yacheco.php');
                }
                else{
                $sql="SELECT entradaysalida.fecha, entradaysalida.horaout, entradaysalida.id_usuario FROM entradaysalida WHERE entradaysalida.horaout = '00:00:00' AND entradaysalida.id_usuario='$us' AND entradaysalida.fecha='$Date'";
                $sql=$db->connect()->query($sql);
                $row1 = $sql->fetch(PDO::FETCH_NUM);
                if($row1 == true){
                  
                  header('location: all/checadorout.php');
                }else{
                    header('location: all/checadorin.php');
                  }
                }
              break;

              case 2:
                
                $lleno="SELECT entradaysalida.fecha, entradaysalida.id_usuario FROM entradaysalida WHERE entradaysalida.horaout != '00:00:00' AND entradaysalida.id_usuario='$us' AND entradaysalida.fecha='$Date'";
                $lleno=$db->connect()->query($lleno);
                $row2 = $lleno->fetch(PDO::FETCH_NUM);
                if($row2 == true){

                  header('location: all/yacheco.php');
                }
                else{
                $sql="SELECT entradaysalida.fecha, entradaysalida.horaout, entradaysalida.id_usuario FROM entradaysalida WHERE entradaysalida.horaout = '00:00:00' AND entradaysalida.id_usuario='$us' AND entradaysalida.fecha='$Date'";
                $sql=$db->connect()->query($sql);
                $row1 = $sql->fetch(PDO::FETCH_NUM);
                if($row1 == true){
                  
                  header('location: all/checadorout.php');
                }else{
                    header('location: all/checadorin.php');
                  }
                }
              break;
              case 3:
                header('location: all/alumnos.php');
              break;
              case 4:
                header('location: all/admin.php');
              break;
              

              default:
            }
        }else{
            // no existe el usuario
            ?>
            <?php
           echo '<script> 
		      alert ("CORREO O CONTRASEÑA INCORRECTAS"); 
		      ///regresar ahi mismo///
		      window.history.go(-1); 
    
		</script>';
    
    
        }
        ?>
        <?php

    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 

    
	<!---------------------------------------------------------------------------------------------------------->
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>SISTEMA DE ENTRADAS-LOGIN</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/estilos1.css">
    
</head>
<body>
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.php">
				    <img src="images/tesh.png" alt="" />
					<img src="images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
				
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	<!-- Start All Pages 
	<div class="all-page-title page-breadcrumb1">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>INICIAR SESIÓN</h1>
				</div>
			</div>
		</div>
	</div>
	 End All Pages -->
   
<main>
	<form action="login.php" class="formulario" id="formulario" method="POST">
    <!-- Grupo: Correo Electronico -->
			<div class="formulario__grupo" id="grupo__correo">
				<label for="correo" class="formulario__label">Correo Electrónico</label>
				<div class="formulario__grupo-input">
					<input type="email" class="formulario__input" name="correo" id="correo" placeholder="Ingrese su correo" required
          value="<?php if(isset($_COOKIE['correo'])){echo $_COOKIE['correo'];};?>">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
			</div>

    <!-- Grupo: Contraseña -->
			<div class="formulario__grupo" id="grupo__password">
				<label for="password" class="formulario__label">Contraseña</label>
				<div class="formulario__grupo-input">
					<input type="password" class="formulario__input" name="password" id="password" placeholder="Ingrese su contraseña" required
          value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];};?>">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">La contraseña debe contener unicamente 11 caracteres.</p>
			</div>

			<div class="formulario__mensaje" id="formulario__mensaje">
				<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
			</div>

			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<button type="submit" class="formulario__btn">Ingresar</button>
				<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
			</div>
      <div class="formulario__grupo formulario__grupo-btn-enviar" >
				<label class="formulario__label">Recordarme en este equipo</label>
					<input type="checkbox" class="formulario__btn" name="check" id="check"
                    <?php if(isset($_COOKIE['userlogin'])){echo "checked";};?>>
			</div>
   </form>
</main>


<script src="js/formulario1.js"></script>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

</body>
</html>