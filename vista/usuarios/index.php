
<?php
require_once('vista/includes/head.php');
require_once('vista/includes/header.php');


?>

<body>
 <div class="container">
<div class="row">
    <div class="col-md-2">
      
    </div>
    <div class="col-md-10">
          <table class="table">
            <thead>
              <tr>
                <th>cuenta</th>
                <th>Clave</th>
                <th>Apellido</th>

                <th>Nombre</th>
                <th>Correo</th>
                <th>Fecha de Alta</th>
                <th>Estado</th>
                <th>Perfil</th>


               
              </tr>
            </thead>
            <tbody>
             <?php
             foreach ($listado as $id){
              echo '<tr>';
              echo '<td>' . $id['cuenta'] . '</td>';
              echo '<td>' . $id['clave'] . '</td>';
              echo '<td>' . $id['apellido'] . '</td>';
              echo '<td>' . $id['nombres'] . '</td>';
              echo '<td>' . $id['correo'] . '</td>';
              echo '<td>' . $id['fecha_alta'] . '</td>';
              echo '<td>' . $id['estado'] . '</td>';
              echo '<td>' . $id['id_perfil'] . '</td>';


              echo '</tr>' ;

             }
             
             ?>
            
            </tbody>
          </table>
          
    </div>  
</div>
 </div>



   
    

</body>
