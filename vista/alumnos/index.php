
<?php
require_once('vista/includes/head.php');
require_once('vista/includes/header.php');




?>
<script>
       function NuevoAlumno(){
        window.location.href = "alumno/guardar"
    }
    function exportarPDF(){
        window.location.href = "alumno/exportar"
    }
    

</script>

<body>
 <div class="container">
    
     <div class="container">
       <div class="row m-2">
            <div class="col">
                       
                        <button type="button" class="btn btn-light" onclick="NuevoAlumno()">Agregar Nuevo Alumno</button>
                        <button type="button" class="btn btn-light" onclick="exportarPDF()">exportar a PDF</button>
            </div>
          
       </div>
     </div>
            
     
      <div class="col">
       
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



                    <td>   
                       <a href="alumno/cargar/<?php echo $id["id"]?>">Consultar</a></td>
                    </td>
                    <td>   
                       <div class="icono">
                        <a href="alumno/reportes/<?php echo $id["id"]?>"><i class="bi bi-file-earmark-pdf"></i>
                        PDF</a>
                      </div> 
                    </td>
                    </td>
               
                 
                </tr>
                  
    
                <?php }  ?>
             
                
                    
                    </tbody>
                </table>
                
        
            </div>
            </div>
    
    </div>  
</div>  
</div>      
</body>
<?php
require_once 'vista/includes/footer.php';


?>
</html>