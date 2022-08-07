<?php 
ob_start(); 

 ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://localhost/Proyecto_2022_Lagoria_Joel/librerias/bootstrap/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://localhost/Proyecto_2022_Lagoria_Joel/librerias/css/estilos.css">
  <base href="http://localhost/Proyecto_2022_Lagoria_Joel/">


  <style type="text/css">  

    .container{

        text-align: left;
        font-size: 20px;
        padding: auto;
        margin-top: 2rem;
        
    }
   </style>
  
  <title>sistema</title>

</head>

 
<body>

    
    <main>
        <div class="container">
     
       
           
         
         
             Reportes
         
          
               
              
                       
                        <div class="">
                            <label for="apellido">Apellido: </label>
                            <input type="text" name="apellido" id="apellido" value = "<?= $alumno->getApellido() ?>" class="form-control"disabled>
                        </div>
                        <div class="">
                            <label for="nombres">Nombres: </label>
                            <input type="text" name="nombres" id="nombres" value = "<?= $alumno->getNombres() ?>" class="form-control" disabled>
                        </div>
                        <div class="">
                            <label for="dni">Dni: </label>
                            <input type="text" name="dni" id="dni" value = "<?= $alumno->getDni() ?>" class="form-control"disabled>
                        </div>
                        <div class="">
                            <label for="cuil">Cuil : </label>
                            <input type="text" name="cuil" id="cuil" value = "<?= $alumno->getCuil() ?>" class="form-control"disabled>
                        </div>
                       
                        <div class="">
                            <label for="telefono01">Telefono 1: </label>
                            <input type="text" name="telefono01" id="telefono01" value = "<?= $alumno->getTelefono01() ?>" class="form-control"disabled>
                        </div>
                        <div class="">
                            <label for="telefono02">Telefono 2: </label>
                            <input type="text" name="telefono02" id="telefono02" value = "<?= $alumno->getTelefono02() ?>" class="form-control"disabled>
                        </div>
                        <div class="">
                            <label for="domicilio">Domicilio: </label>
                            <input type="text" name="domicilio" id="domicilio" value = "<?= $alumno->getDomicilio() ?>" class="form-control"disabled>
                        </div>
                        <div class="">
                            <label for="localidad">Localidad : </label>
                            <input type="text" name="localidad" id="localidad" value = "<?= $alumno->getDomicilioLocalidad() ?>" class="form-control"disabled>
                        </div>
                       
                        <div class="">
                            <label for="provincia">Provincia: </label>
                            <input type="text" name="provincia" id="provincia" value = "<?= $alumno->getDomicilioProvincia() ?>" class="form-control"disabled>
                        </div>
                        <div class="">
                            <label for="correo">Correo: </label>
                            <input type="text" name="correo" id="correo"  value = "<?= $alumno->getCorreo() ?>" class="form-control"disabled>
                        </div>
                        <div class="">
                            <label for="fechaNacimiento">Fecha de Nacimiento: </label>
                            <input type="email" name="fechaNacimiento" id="fechaNacimiento" value = "<?= $alumno->getFechaNacimiento() ?>" class="form-control">
                        </div>
                        
                     
          
            
            
         

        </div>
    </main>
   
</body>
</html>
<?php
$html = ob_get_clean();

$html;


require_once 'librerias/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("lagoriajoel.pdf", array("Attachment" =>false));


?>