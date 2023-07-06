<?php
	session_start();


	date_default_timezone_set('America/Mexico_City');    
	$Date = date('Y-m-d ');  
	$Time = date('H:i:s ');  
	
	?>
    			
<?php
$us= $_SESSION['idusuario'];
$conexion=mysqli_connect('localhost', 'root', '', 'eystesh');
include 'db2.php';

$id_usuario =$_SESSION['idusuario'];

$db = new Database();
$lleno="SELECT entradaysalida.fecha, entradaysalida.id_usuario FROM entradaysalida WHERE entradaysalida.horain != '00:00:00' AND entradaysalida.id_usuario='$us' AND entradaysalida.fecha='$Date'";
$lleno=$db->connect()->query($lleno);
$row2 = $lleno->fetch(PDO::FETCH_NUM);
if($row2 == true){
	echo '<script> 
	alert ("Error Al Registrar Entrada"); 
	window.history.go(-1); 
	</script>';
exit;

}else{
	$consulta="INSERT INTO entradaysalida(`fecha`, `horain`, `id_usuario`)
	VALUES ('$Date','$Time', '$id_usuario')";
	$resultado=mysqli_query($conexion,$consulta);
	
	//$filas=mysqli_num_rows($resultado);
	if ($resultado=true) {
		
		echo '<script> 
			alert ("Se ha regristrado exitosamente");
				
			</script>';
			header("Location:../checadorout.php");	
	
		exit;
	
	}


mysqli_free_result($resultado);
mysqli_close($conexion);
}
?>
