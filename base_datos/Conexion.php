<?php
final class Conexion {

   
   
     public static function establecer(){
        $dsn = 'mysql:dbname=lab2022;host=127.0.0.1:3307';
        $user = 'root';
        $password = '';
              
        $conexion =new PDO($dsn, $user, $password);

        return $conexion;
      
     }
}


?>