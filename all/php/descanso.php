<?php
	session_start();


	date_default_timezone_set('America/Mexico_City');    
	$Date = date('Y-m-d ');  
	$Time = date('H:i:s ');  
	
	?>
    			
<?php
$us= $_SESSION['idusuario'];
$inicio = isset($_GET['inicio']) ? $_GET['inicio'] : '';
$fin = isset($_GET['fin']) ? $_GET['fin'] : '';
$motivo = isset($_GET['motivo']) ? $_GET['motivo'] : '';

$conexion=mysqli_connect('localhost', 'root', '', 'eystesh');
include 'db2.php';

$id_usuario =$_SESSION['idusuario'];

$db = new Database();
$lleno="SELECT descansos.fecha, descansos.llegadadescanso, descansos.id_usuario FROM descansos WHERE descansos.llegadadescanso != '00:00:00' AND descansos.id_usuario='$us' AND descansos.fecha='$Date'";
$lleno=$db->connect()->query($lleno);
$row2 = $lleno->fetch(PDO::FETCH_NUM);
if($row2 == true){
	echo '<script> 
	alert ("Error Al Registrar Descanso, ya ah tomado el descanso del Día"); 
	window.history.go(-1); 
	</script>';
exit;	

}else{
	

$consulta="INSERT INTO descansos(`fecha`, `salidadescanso`, `llegadadescanso`, `motivos`, `id_usuario`)
	VALUES ('$Date','$inicio', '$fin','$motivo','$id_usuario')";
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
