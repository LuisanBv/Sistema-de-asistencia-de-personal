<?php
include('db.php');
$correo = isset($_GET['correo']) ? $_GET['correo'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';
session_start();
$_SESSION['correo']=$correo;

$conexion=mysqli_connect("localhost","root","","eystesh");

$consulta="SELECT*FROM usuarios where correo='$correo' and password='$password'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_rol']==1){ //administrador
    header("location:../interfaces/admin/index.html");

}else
if($filas['id_rol']==2){ //usuario
header("location:../index/indexusuario.html");
}else
if($filas['id_rol']==3){ //visita
  header("location:../index/indexvisita.html");
  }
else{
    ?>
    <?php
    include("../index.html");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);



