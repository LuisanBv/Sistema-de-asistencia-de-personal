		
<?php

$conexion=mysqli_connect('localhost', 'root', '', 'eystesh');

$id = isset($_GET['id']) ? $_GET['id'] : '';
$ncontrol = isset($_GET['ncontrol']) ? $_GET['ncontrol'] : '';
$correo = isset($_GET['correo']) ? $_GET['correo'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';
$nombres = isset($_GET['nombres']) ? $_GET['nombres'] : '';
$ap = isset($_GET['ap']) ? $_GET['ap'] : '';
$am = isset($_GET['am']) ? $_GET['am'] : '';
//$fotoperfil = isset($_GET['foto']) ? $_GET['foto'] : '';
//$id_rol = isset($_GET['id_rol']) ? $_GET['id_rol'] : '';
//$id_horario = isset($_GET['id_horario ']) ? $_GET['id_horario '] : '';

//,fotoperfil ='$fotoperfil', id_rol ='$id_rol',id_horario ='$id_horario'

$consulta="UPDATE `usuarios` SET `ncontrol` ='$ncontrol', `correo` ='$correo', `password` ='$password', `nombres` ='$nombres', `ap` ='$ap', 
`am` ='$am' WHERE `idusuario` ='$id'";
$resultado=mysqli_query($conexion,$consulta);

//$filas=mysqli_num_rows($resultado);
if (!$resultado) {
	echo '<script> 
		alert ("Error Al actualizar usuario"); 
		window.history.go(-1); 
		</script>';
	exit;
}else{
    	
    echo '<script> 
		alert ("Se ha actualizado exitosamente");	
        window.history.go(-2);
		</script>';
        //header("Location:../actualizarusr.php"); 
	exit;
}

mysqli_free_result($resultado);
mysqli_close($conexion);

?>
