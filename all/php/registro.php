<?php

$conexion=mysqli_connect('localhost', 'root', '', 'eystesh');


$ncontrol = isset($_GET['ncontrol']) ? $_GET['ncontrol'] : '';
$correo = isset($_GET['correo']) ? $_GET['correo'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';
$nombres = isset($_GET['nombres']) ? $_GET['nombres'] : '';
$ap = isset($_GET['ap']) ? $_GET['ap'] : '';
$am = isset($_GET['am']) ? $_GET['am'] : '';
$fotoperfil = isset($_GET['foto']) ? $_GET['foto'] : '';
$id_rol = isset($_GET['id_rol']) ? $_GET['id_rol'] : '';
$id_horario = isset($_GET['id']) ? $_GET['id'] : '';


//$fotoperfil = $_FILES['foto']['name'];


#$correo=$_POST['correo'];
#$password=$_POST['password'];



$consulta="INSERT INTO usuarios(`ncontrol`, `correo`, `password`, `nombres`, `ap`, `am`, `fotoperfil`, `id_rol`, `id_horario`)
VALUES ('$ncontrol', '$correo', '$password', '$nombres', '$ap', '$am', '$fotoperfil', '$id_rol', '$id_horario')";


$verificar_usuario=mysql_query("SELECT * FROM usuarios WHERE idusuario= '$idusuario'");
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
		header("Location:../registrousr.php");	

	exit;


}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>