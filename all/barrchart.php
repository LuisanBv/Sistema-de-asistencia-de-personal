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
    <title>GRAFICA DE BARRAS</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/stylet.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="css/main.css">  
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
           
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
    
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
						<li class="nav-item active"><a class="nav-link" href="admin.PHP">Home</a></li>
				
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb12">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>GRAFICA DE BARRAS</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
   
<main>
<html>
			<?php 
      date_default_timezone_set('America/Mexico_City');    
      $Date = date('Y-m-d ');  
      $Time = date('H:i:s ');  
   			require("php/db1.php");
            $con=Conectar();
          
            
           
			      
            $count1=current ($con->query("SELECT COUNT(entradaysalida.ideys), usuarios.id_rol FROM entradaysalida, usuarios WHERE entradaysalida.fecha='$Date' AND usuarios.id_rol='1' ")->fetch());
            $count2=current ($con->query("SELECT COUNT(entradaysalida.ideys), usuarios.id_rol FROM entradaysalida, usuarios WHERE entradaysalida.fecha='$Date' AND usuarios.id_rol='2'")->fetch());
            $count3=current ($con->query("SELECT COUNT(entradaysalida.ideys), usuarios.id_rol FROM entradaysalida, usuarios WHERE entradaysalida.fecha='$Date' AND usuarios.id_rol='3'")->fetch());
            //$count2=current ($con->query("SELECT COUNT(ideys) FROM `entradaysalida` WHERE id_rol='2' AND `fecha`='$Date'")->fetch());
            //$count3=current ($con->query("SELECT COUNT(ideys) FROM `entradaysalida` WHERE id_rol='3' AND `fecha`='$Date'")->fetch());

            ?>					

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ['Profesores', <?php echo " ".$count1; ?>, 'stroke-color: #3498DB ; stroke-opacity: 0.6; stroke-width: 8; fill-color: #1F618D; fill-opacity: 0.2'],
        ['Empleados', <?php echo " ".$count2; ?>, 'stroke-color: #F1C40F ; stroke-opacity: 0.6; stroke-width: 8; fill-color: #FFC300; fill-opacity: 0.2'],
        ['Alumnos', <?php echo " ".$count3; ?>, 'stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2']
       ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Entradas por dia",
        width: 1300,
        height: 900,
        bar: {groupWidth: "50%"},
        legend: { position: "none" },
        
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values" style="width: 1300px; height: 500px;"></div>
  
</html>
    
</main>

<!-- jQuery, Popper.js, Bootstrap JS -->
<script src="jquery/jquery-3.3.1.min.js"></script> <!-- botones-->
<script src="popper/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
  
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