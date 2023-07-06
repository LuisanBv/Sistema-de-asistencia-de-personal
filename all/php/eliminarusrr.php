		
<?php

$conexion=mysqli_connect('localhost', 'root', '', 'eystesh');

$id = isset($_GET['id']) ? $_GET['id'] : '';

$consulta="DELETE FROM usuarios WHERE idusuario ='$id'";
$resultado=mysqli_query($conexion,$consulta);

//$filas=mysqli_num_rows($resultado);
if (!$resultado) {
	echo '<script> 
		
	alert ("Error Al Eliminar usuario"); 
		window.history.go(-1); 
		</script>';
	exit;
}else{
    	
    echo '<script> 
	
	alert ("Se ha Eliminado exitosamente");
        window.history.go(-2);
		</script>';
        //header("Location:../actualizarusr.php"); 
	exit;
}

mysqli_free_result($resultado);
mysqli_close($conexion);

?>
