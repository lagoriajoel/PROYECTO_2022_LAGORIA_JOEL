<?php 

ob_start(); 

 ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <base href="http://localhost/Proyecto_2022_Lagoria_Joel/">
  
  <title>sistema</title>

</head>

 
<body>

    
    <main>
        <div class="container">
     
              
         <table class="table">
          <thead>
                <tr>
                    <th>Apellidos</th>
                    <th>Nombres</th>
                    <th>Dni</th>
                    <th>Cuil</th>
                    <th>Domicilio</th>
                    <th>Localidad</th>
                    <th>Provincia</th>
                    <th>Telefono 1</th>
                    <th>Telefono 2</th>
                    <th>Correo</th>

                    <th>Fecha de Nacimiento</th>
                    <th>Fecha de Alta</th>

                </tr>
            </thead>
            <tbody>
             
             <?php foreach ($listado as $id){?>
                <tr>
                   <td> <?php echo $id['apellido']?></td>
                   <td> <?php echo $id['nombres']?></td>
                   <td> <?php echo $id['dni']?></td>
                   <td> <?php echo $id['cuil']?></td>
                   <td> <?php echo $id['domicilio']?></td>
                   <td> <?php echo $id['domicilio_localidad']?></td>
                   <td> <?php echo $id['domicilio_provincia']?></td>
                   <td> <?php echo $id['telefono01']?></td>
                   <td> <?php echo $id['telefono02']?></td>
                   <td> <?php echo $id['correo']?></td>
                   <td> <?php echo $id['fecha_nacimiento']?></td>
                   <td> <?php echo $id['fecha_alta']?></td>

                 
                </tr>
                  
    
                <?php }  ?>
             
                
                    
                    </tbody>
                </table>        
          
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