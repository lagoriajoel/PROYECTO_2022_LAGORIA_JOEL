<?php

$host="127.0.0.1:3307";
$bd="paginaweb";
$usuario="root";
$contraseña="";
$conexion="";


try {
    $conexion= new PDO("mysql:host=$host; dbname=$bd",$usuario,$contraseña);
    if ($conexion) {
       
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
};

?>