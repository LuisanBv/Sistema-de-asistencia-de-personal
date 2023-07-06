<?php
	session_start();
	date_default_timezone_set('America/Mexico_City');    
	$Date = date('Y-m-d ');  
	$Time = date('H:i:s ');  
	
	?>
    			
<?php

$conexion=mysqli_connect('localhost', 'root', '', 'eystesh');
$us= $_SESSION['idusuario'];

$id_usuario =$_SESSION['idusuario'];
include 'db2.php';
$db = new Database();
$lleno="SELECT entradaysalida.fecha, entradaysalida.id_usuario FROM entradaysalida WHERE entradaysalida.horaout = '00:00:00' AND entradaysalida.id_usuario='$us' AND entradaysalida.fecha='$Date'";
$lleno=$db->connect()->query($lleno);
$row2 = $lleno->fetch(PDO::FETCH_NUM);
if($row2 == true){
	
	$consulta="UPDATE entradaysalida SET horaout ='$Time' WHERE fecha ='$Date'and id_usuario ='$id_usuario'";
     
	$resultado=mysqli_query($conexion,$consulta);
	
	//$filas=mysqli_num_rows($resultado);
	if ($resultado=true) {
		
		echo '<script> 
			alert ("Se ha regristrado exitosamente");
				
			</script>';
			header("Location: ../yacheco.php");	
	
		exit;}
}else{


	echo '<script> 
	alert ("Error al registrar su  salida, Ya ah sido registrada"); 
	 
	</script>';
	header("Location: ../yacheco.php");	
exit;



mysqli_free_result($resultado);
mysqli_close($conexion);
}
?>
