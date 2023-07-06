		
<?php

$conexion=mysqli_connect('localhost', 'root', '', 'eystesh');

$id = isset($_GET['id_horario']) ? $_GET['id_horario'] : '';
$area = isset($_GET['area']) ? $_GET['area'] : '';
$descripcion = isset($_GET['descripcion']) ? $_GET['descripcion'] : '';
$inicio = isset($_GET['inicio']) ? $_GET['inicio'] : '';
$fin = isset($_GET['fin']) ? $_GET['fin'] : '';





$consulta="UPDATE `horario` SET `area` ='$area', `descripcion` ='$descripcion', `inicio` ='$inicio', `fin` ='$fin' 
WHERE `idhorario` ='$id'";
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
