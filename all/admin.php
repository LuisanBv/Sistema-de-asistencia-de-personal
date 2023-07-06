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
$conexion=mysqli_connect('localhost', 'root', '', 'eystesh');
date_default_timezone_set('America/Mexico_City');    
	$Date = date('Y-m-d ');  
	$Time = date('H:i:s ');  
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <script src="https://kit.fontawesome.com/77cf46e692.js" crossorigin="anonymous"></script>


    <!-- Styles -->
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style3.css">
    <link rel="stylesheet" href="css/stylebar.css">


    <!-- Bootstrap CSS -->
 
	<!-- Site CSS -->
       
    <!-- Responsive CSS -->
    
    <!-- Custom CSS -->
    
	<!-- Bootstrap CSS -->
   
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="css/main.css">  


   
    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
    

    <title>TABLERO - ADMINISTRADOR</title>
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
        <li class="nav-item dropdown" >
			    <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"><i class="fa-solid fa-clipboard-check"></i>
                REPORTES</a>
			<div class="dropdown-menu" aria-labelledby="dropdown-a">
                <a href="entradasysalidasalumnos.php" class="dropdown-item" class="d-block text-light p-3 border-0"><i class="fas fa-user-graduate"></i>
                    Alumnos </a>
                <a href="entradasysalidasprof.php" class="dropdown-item" class="d-block text-light p-3 border-0"><i class="fas fa-chalkboard-teacher"></i>
                    Profesores</a>
                <a href="entradasysalidasemploy.php" class="dropdown-item" class="d-block text-light p-3 border-0"><i class="fa-solid fa-id-card-clip"></i>
                    Empleados</a>
                <a href="entradasysalidasvisitas.php" class="dropdown-item" class="d-block text-light p-3 border-0"><i class="fas fa-users"></i>
                    Visitas</a>
                <a href="entradasysalidasgeneral.php" class="dropdown-item" class="d-block text-light p-3 border-0"><i class="fa-solid fa-person-shelter"></i>
                    Entradas Generales</a>
                <a href="descansos.php" class="dropdown-item" class="d-block text-light p-3 border-0"><i class="fa-solid fa-mug-saucer"></i>
                    Descansos</a>
                
			</div>
		</li>

        <li class="nav-item dropdown" >
			    <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"><i class="fa-solid fa-chart-simple"></i>
                Estadiscticas</a>
			<div class="dropdown-menu" aria-labelledby="dropdown-a">
                <a href="piechart.php" class="dropdown-item" class="d-block text-light p-3 border-0"><i class="fa-solid fa-chart-pie"></i>
                    Total de ususarios </a>
                <a href="barrchart.php" class="dropdown-item" class="d-block text-light p-3 border-0"><i class="fa-solid fa-chart-simple"></i>
                    Entradas por dia </a>
                
			</div>
		</li>


        <li class="nav-item dropdown" >
			    <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"><i class="fa-solid fa-business-time"></i>
                HORARIOS</a>
			<div class="dropdown-menu" aria-labelledby="dropdown-a">
                <a href="horarios.php" class="dropdown-item" class="d-block text-light p-3 border-0"><i class="fa-solid fa-business-time"></i>
                    HORARIOS </a>
                <a href="registrohorario.php" class="dropdown-item" class="d-block text-light p-3 border-0"><i class="fa-solid fa-calendar-plus"></i>
                    AGREGAR HORARIO </a>
                <a href="actualizarhor.php" class="dropdown-item" class="d-block text-light p-3 border-0"><i class="fa-solid fa-calendar"></i>
                    ACTUALIZAR HORARIO</a>
                <a href="eliminarhor.php" class="dropdown-item" class="d-block text-light p-3 border-0"><i class="fa-solid fa-calendar-xmark"></i>
                    ELIMINAR HORARIO</a>
                
			</div>
		</li>
        <li class="nav-item dropdown" >
			    <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"><i class="fa-solid fa-user"></i>
                USUARIOS</a>
			<div class="dropdown-menu" aria-labelledby="dropdown-a">
                <a href="registrousr.php" class="dropdown-item" class="d-block text-light p-3 border-0"><i class="fa-solid fa-user-plus"></i>
                    AGREGAR USUARIOS </a>
                <a href="actualizarusr.php" class="dropdown-item" class="d-block text-light p-3 border-0"><i class="fa-solid fa-user-pen"></i>
                    ACTUALIZAR USUARIOS</a>
                <a href="eliminarusr.php" class="dropdown-item" class="d-block text-light p-3 border-0"><i class="fa-solid fa-user-xmark"></i>
                    ELIMINAR USUARIOS</a>
			</div>
		</li>

            <li class="nav-item dropdown" >
                <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">
                    <?PHP ECHO $_SESSION['nombre'], ' ',$_SESSION['ap'],' ',$_SESSION['am'];?>
                    <img src="img/user-1.jpg" class="img-fluid rounded-circle avatar mr-2"
                      alt="https://generated.photos/" />
                    </a>
        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                    <!--a href="miperfil.php" class="dropdown-item" class="d-block text-light p-3 border-0"><i class="fa-solid fa-address-card"></i>
                   Mi perfil</a-->
                    <!--<a href="desarrollo.php" class="dropdown-item" class="d-block text-light p-3 border-0"><i class="fa-solid fa-gear"></i>
                    Configuración</a>-->
                    <a href="../login.php?cerrar_sesion" class="dropdown-item" class="d-block text-light p-3 border-0"><i class="fa-solid fa-arrow-right-from-bracket"></i>
                    Cerrar sesión</a>          
        </div>
    	</li>
    </ul>
				
</div>
		</nav>
        
	</header>

        <!-- Page Content -->
        <div style="height:100px"></div>
        <div id="content" class="bg-grey w-100">
        
        
             <section class="bg-light py-3">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-9 col-md-8">
                          
                          
                            <h1 class="font-weight-bold mb-0">Bienvenido <?PHP ECHO $_SESSION['nombre'], ' ',$_SESSION['ap'],' ',$_SESSION['am'];?></h1>
                            <p class="lead text-muted">Revisa la última información</p>
                          </div>
                          <div class="col-lg-3 col-md-4 d-flex">
                            <!--button class="btn btn-primary w-100 align-self-center">Descargar reporte</button-->
</div>
                      </div>
                  </div>
              <!--/section-->

              <!--section class="bg-mix py-3"-->
                <div class="container">
                    <div class="card rounded-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Alumnos</h6>
                                        <h3 class="font-weight-bold">
                                          <?php 
                                          require("php/db1.php");
                                          $con=Conectar();
                                          $count=current ($con->query("SELECT COUNT(idusuario) FROM `usuarios` WHERE id_rol='3'")->fetch());
                                          echo " ".$count;
                                          ?>
                                        </h3>
                                        <div class="icon-box">
                                        <i class="fas fa-user-graduate"></i>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Profesores</h6>
                                        <h3 class="font-weight-bold">
                                        <?php 
                                        $con2=Conectar();
                                        $count=current ($con2->query("SELECT COUNT(idusuario) FROM `usuarios` WHERE id_rol='1'")->fetch());
                                        echo " ".$count;
                                        ?>
                                        </h3>
                                        <div class="icon-box">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Empleados</h6>
                                        <h3 class="font-weight-bold">
                                        <?php 
                                        $con3=Conectar();
                                        $count=current ($con3->query("SELECT COUNT(idusuario) FROM `usuarios` WHERE id_rol='2'")->fetch());
                                        echo " ".$count;
                                        ?>
                                        </h3>
                                        <div class="icon-box">
                                        <i class="fa-solid fa-id-card-clip"></i>
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 d-flex my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Total de usuarios</h6>
                                        <h3 class="font-weight-bold">
                                        <?php 
                                        $con4=Conectar();
                                        $count=current ($con4->query("SELECT COUNT(idusuario) FROM `usuarios` WHERE id_rol= id_rol")->fetch());
                                        echo " ".$count;
                                        ?>
                                        </h3>
                                        <div class="icon-box">
                                        <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <!--/section-->

              
            <!--section id="tabla"-->
			<div class="container">
			<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
                                    
							<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
									<tr>
										<th> N. CONTROL </th>
										<th> OCUPACION </th>
										<th> NOMBRE(S) </th>
										<th> APELLIDO PATERNO </th>
										<th> APELLIDO MATERNO </th>
										<th> FECHA </th>
										<th> ENTRADA </th>
										<th> SALIDA </th>                               
										
									</tr>
								</thead>
								<tbody>
								<?php 
								$sql="SELECT usuarios.ncontrol ,usuarios.nombres, usuarios.ap, usuarios.am, roles.rol, entradaysalida.fecha, entradaysalida.horain, entradaysalida.horaout FROM usuarios, entradaysalida, roles WHERE usuarios.id_rol = usuarios.id_rol and entradaysalida.id_usuario = usuarios.idusuario and usuarios.id_rol = roles.idrol and entradaysalida.fecha='$Date'";
								$result=mysqli_query($conexion,$sql);

								while($mostrar=mysqli_fetch_array($result)){
		 						?>

								<tr>
								<td><?php echo $mostrar['ncontrol'] ?></td>
								<td><?php echo $mostrar['rol'] ?></td>
								<td><?php echo $mostrar['nombres'] ?></td>
								<td><?php echo $mostrar['ap'] ?></td>
								<td><?php echo $mostrar['am'] ?></td>
								<td><?php echo $mostrar['fecha'] ?></td>
								<td><?php echo $mostrar['horain'] ?></td>
								<td><?php echo $mostrar['horaout'] ?></td>
								
								
								</tr>
								<?php 
								}
	 							?>
						   </table>                  
						</div>
					</div>
			</div>  
		</div>
		</section>  
        <html>
  <head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script>
    google.charts.load('current', {
    'packages': ['map'],
    // Note: you will need to get a mapsApiKey for your project.
    // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
    'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
    
    });
    google.charts.setOnLoadCallback(drawMap);

    function drawMap() {
      var data = google.visualization.arrayToDataTable([
        ['Country', 'Population'],
        ['China', 'China: 1,363,800,000'],
        ['India', 'India: 1,242,620,000'],
        ['US', 'US: 317,842,000'],
        ['Indonesia', 'Indonesia: 247,424,598'],
        ['Brazil', 'Brazil: 201,032,714'],
        ['Pakistan', 'Pakistan: 186,134,000'],
        ['Nigeria', 'Nigeria: 173,615,000'],
        ['Bangladesh', 'Bangladesh: 152,518,015'],
        ['Russia', 'Russia: 146,019,512'],
        ['Japan', 'Japan: 127,120,000']
      ]);

    var options = {
      showTooltip: true,
      showInfoWindow: true
    };

    var map = new google.visualization.Map(document.getElementById('chart_div'));

    map.draw(data, options);
  };
  </script>
  </head>
  <body>
    <div id="chart_div"></div>
  </body>
</html>
 
                           
             

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
        


<!-- jQuery, Popper.js, Bootstrap JS -->
<script src="jquery/jquery-3.3.1.min.js"></script>
<script src="popper/popper.min.js"></script>

  
<!-- datatables JS -->
<script type="text/javascript" src="datatables/datatables.min.js"></script>    
 
<!-- para usar botones en datatables JS -->  
<script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
<script src="datatables/JSZip-2.5.0/jszip.min.js"></script>    
<script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
<script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
<!-- código JS propìo-->    
<script type="text/javascript" src="js/main.js"></script>  
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>

</html>