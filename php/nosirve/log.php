<?php
include('conexion.php');
$correo = isset($_GET['correo']) ? $_GET['correo'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';
session_start();
$_SESSION['correo']=$correo;

$conexion=mysqli_connect("localhost","root","","eystesh");

$consulta="SELECT*FROM usuarios where correo='$correo' and password='$password'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_rol']==4){ //administrador
    header("location:../all/admin.php");

}else
if($filas['id_rol']==1){ //maestro
header("location:../all/prueba.php");
}else
if($filas['id_rol']==2){ //empleado
  header("location:../index/prueba.php");
}else
  if($filas['id_rol']==3){ //alumo
    header("location:../index/prueba.php");
    }

else{
    ?>
    <?php
    echo '<script> 
		alert ("CORREO O CONTRASEÑA INCORRECTAS"); 
		///regresar ahi mismo///
		window.history.go(-1); 
    
		</script>';
    
    ?>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);

?>

