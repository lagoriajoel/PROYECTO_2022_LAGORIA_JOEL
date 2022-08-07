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
                <th>cuenta</th>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Fecha de Alta</th>
                <th>Estado</th>
                <th>Perfil</th>
                <th></th>


              </tr>
            </thead>
            <tbody>
             <?php
             $estado="";
             $perfil="";
             foreach ($listado as $id){

                if ( $id['estado']==1) {
                  $estado= "ACTIVO";
                }
                else {$estado="INACTIVO";}

              

                echo '<tr>';
                echo '<td>' . $id['cuenta'] . '</td>';
                echo '<td>' . $id['apellido'] . '</td>';
                echo '<td>' . $id['nombres'] . '</td>';
                echo '<td>' . $id['correo'] . '</td>';
                echo '<td>' . $id['fechaAlta'] . '</td>';
                echo '<td>' . $estado . '</td>';
                echo '<td>' .$id['perfil'] . '</td>';
                echo '<td><a href="usuario/cargar/'.$id["id"].'">Consultar</a></td>';
                echo '</tr>' ;
                     

             }
             
             ?>
            
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