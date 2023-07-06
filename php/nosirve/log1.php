
<?php
include_once 'db.php';
session_start();
if(isset($_GET['cerrar_cesion'])){
	session_unset();
	session_destroy();

}
if(isset($_SESSION['rol'])){
	switch($_SESSION['rol']){
		case 1:
            header('location: ../interfaces/admin/prof.php');
        break;

        case 2:
            header('location: ../interfaces/admin/empleado.php');
        break;

        case 3:
            header('location: ../interfaces/admin/alumno.php');
        break;

        case 4:
            header('location: ../interfaces/admin/admin.php');
        break;
        default: 

	}
}
if(isset($_POST['correo']) && isset($_POST['password'])){
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $db = new Database();
    $query = $db->connect()->prepare('SELECT*FROM usuarios WHERE correo = :correo AND password = :password');
    $query->execute(['correo'=> $correo, 'password'=> $password]);
    
    $row = $query->fetch(PDO::FETCH_NUM);
    if($row==true){
    //VALIDAR EL ROL
    $rol = $row[1];
    $_SESSION['rol'] = $rol;
    switch($_SESSION['rol']){
		case 1:
            header('location: ../interfaces/admin/prof.php');
        break;

        case 2:
            header('location: ../interfaces/admin/empleado.php');
        break;

        case 3:
            header('location: ../interfaces/admin/alumno.php');
        break;

        case 4:
            header('location: ../interfaces/admin/admin.php');
        break;
        default: 
	}
    }else{
        //NO EXISTE
        echo "EL USUARIO O CONTRASEÑA SON INCORRECTOS";
    }

}
?>