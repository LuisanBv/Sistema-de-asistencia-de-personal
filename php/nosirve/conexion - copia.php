<?php
function Conectar(){
    $conn=null;
    $host='127.0.0.1';
    $db= 'eystesh';
    $user='root';
    $pwd='';
    try{
        $conn = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pwd);
    }catch(PDOException $e){
        echo ':( Error en la conexion'.$e;
    }
    return $conn;
}
?>