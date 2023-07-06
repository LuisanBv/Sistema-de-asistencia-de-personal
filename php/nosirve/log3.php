<?php
    include_once 'db.php';
    
    session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset(); 

        // destroy the session 
        session_destroy(); 
    }
    
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location:../index/prueba.php');
              break;

              case 2:
                header('location:../index/prueba.php');
              break;
              case 3:
                header('location:../index/prueba.php');
              break;
              case 4:
                header('location:../all/admin.php');
              break;

            default:
        }
    }

    if(isset($_POST['correo']) && isset($_POST['password'])){
        $correo = $_POST['correo'];
        $password = $_POST['password'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT *FROM usuarios WHERE correo = :correo AND password = :password');
        $query->execute(['correo' => $correo, 'password' => $password]);

        $row = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true){
            $rol = $row[8];
            
            $_SESSION['rol'] = $rol;
            switch($rol){
              case 1:
                header('location:../index/prueba.php');
              break;

              case 2:
                header('location:../index/prueba.php');
              break;
              case 3:
                header('location:../index/prueba.php');
              break;
              case 4:
                header('location:../all/admin.php');
              break;
              

              default:
            }
        }else{
            // no existe el usuario
            ?>
            <?php
        echo '<script> 
		alert ("CORREO O CONTRASEÑA INCORRECTAS"); 
		///regresar ahi mismo///
		window.history.go(-1); 
    
		</script>';
    
    
        }
        ?>
        <?php

    }

?>