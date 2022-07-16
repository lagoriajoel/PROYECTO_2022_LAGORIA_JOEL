<?php
session_start();

$cuenta=$_SESSION['cuenta'];

if ($cuenta==null || $cuenta=="") {
  echo  "usted no tiene Autorizacion";
  die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../librerias/bootstrap/bootstrap.min.css"/>
    <title>Document</title>
</head>
<body>
    <div class="p-5 bg-light">
        <div class="container">

        <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">INICIO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Legajos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Alumnos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="alta1.php">Nuevo Usuario</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cerrarSesion.php">Cerrar Sesion</a>
        </li>
       
       
      </ul>
    </div>
  </div>
</nav>
            <h1 class="display-3">VISTA DEL ADMINISTRADOR</h1>
           
         
        </div>
    </div>
</body>
</html>