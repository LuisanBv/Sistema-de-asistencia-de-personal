		
<?php

$conexion=mysqli_connect('localhost', 'root', '', 'eystesh');

$id = isset($_GET['id_horario']) ? $_GET['id_horario'] : '';

$consulta="DELETE FROM horario WHERE idhorario ='$id'";
$resultado=mysqli_query($conexion,$consulta);

//$filas=mysqli_num_rows($resultado);
if (!$resultado) {
	echo '<script> 
		
	alert ("Error Al Eliminar Horario"); 
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
