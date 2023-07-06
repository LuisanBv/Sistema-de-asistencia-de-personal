<?php

include("db.php");
$conexion=mysqli_connect("localhost","root","","eystesh");
// rowCount()

$datos = $conexion->eystesh->query("SELECT * FROM usuarios WHERE");
$total = $datos->rowCount();
$usuarios = $datos->fetchAll();
if ($usuarios)
{
	echo "Se encontraron registros.";
}
echo $total;

echo "<br>";

//-------------------
$datos = $conexion->eystesh->query("SELECT count(1) FROM usuarios");
echo $datos->fetchColumn();



