<?php

$conexion=mysqli_connect('localhost', 'root', '', 'eystesh');


$area = isset($_GET['area']) ? $_GET['area'] : '';
$descripcion = isset($_GET['descripcion']) ? $_GET['descripcion'] : '';
$inicio = isset($_GET['inicio']) ? $_GET['inicio'] : '';
$fin = isset($_GET['fin']) ? $_GET['fin'] : '';



#$correo=$_POST['correo'];
#$password=$_POST['password'];



$consulta="INSERT INTO horario(`area`, `descripcion`, `inicio`, `fin`)
VALUES ('$area', '$descripcion', '$inicio', '$fin')";


$verificar_usuario=mysql_query("SELECT * FROM horario WHERE idhorario= '$idhorario'");
if (mysql_num_rows($verificar_usuario) >0) {
	echo '<script> 
		alert ("Este Usuario Ya Esta Registrado"); 
		///regresar ahi mismo///
		window.history.go(-1); 
		</script>';
	exit;
}       

$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);
if (!$resultado) {
	echo '<script> 
		alert ("Error Al Registrarse"); 
		window.history.go(-1); 
		</script>';
	exit;
}
else{
	echo '<script> 
		alert ("Se ha regristrado exitosamente");
			
		</script>';
		header("Location:../registrohorario.php");	

	exit;


}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>