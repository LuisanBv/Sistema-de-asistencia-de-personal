<?php
include('db.php');
$correo = isset($_GET['correo']) ? $_GET['correo'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';
#$correo=$_POST['correo'];
#$password=$_POST['password'];



$consulta="SELECT*FROM usuarios where correo='$correo' and password='$password'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  
    header("location:home.php");

}else{
    ?>
    <?php
    include("home.html");
    echo '<script>alert("CORREO O CONTRASEÑA INCORRECTAS")</script> ';

  ?>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
