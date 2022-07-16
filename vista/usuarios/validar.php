
<?php

if(!empty($_POST) ){
  if (isset($_POST['cuenta']) && isset($_POST['clave'])) {

  

$cuenta=$_POST['cuenta'];
$clave=$_POST['clave'];










session_start();
$_SESSION['cuenta']=$cuenta;

require_once "../../base_datos/Conexion.php";

$sql="SELECT * FROM usuarios WHERE cuenta=? AND clave=?";

try {
    $conexion= Conexion::establecer();
  
   $stmt=$conexion->prepare($sql);
   $stmt->execute(array($cuenta,$clave));

   $count=$stmt->rowCount();
      
   if ($count) {
    header('Location:admin.php');
   }
   else{
   echo("Usuario no encontrado");
   }

} catch (PDOException $ex) {
   
    echo "error ".$ex->getMessage();
}


}
else{ echo " no se inicio sesion";}
}
?>