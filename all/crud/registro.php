<?php
include('../db.php');

$usuario = isset($_GET['usuario']) ? $_GET['usuario'] : '';
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
$correo = isset($_GET['correo']) ? $_GET['correo'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';
$telefono = isset($_GET['telefono']) ? $_GET['telefono'] : '';

#$correo=$_POST['correo'];
#$password=$_POST['password'];



$consulta="INSERT INTO usuarios(`correo`, `password`, `usuario`, `nombre`, `telefono`) 
VALUES ('$correo', '$password', '$usuario','$nombre', '$telefono')";

$verificar_usuario=mysql_query("SELECT * FROM usuarios WHERE id= '$id'");
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
		header("Location:../home.php");	

	exit;


}
mysqli_free_result($resultado);
mysqli_close($conexion);
