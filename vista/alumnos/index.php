

<?php
require_once "vista/includes/head.php";
require_once "vista/includes/header.php";

?>

<body>
   <div class="container"> 
    <div class="row my-3">
    <div class="col-md-2 my-3">
        <div>
           <button type="button" class="btn btn-primary">Mostrar Lista</button>
        </div>

    </div>
    <div class="col-md-10">
    <div class="table-responsive">
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
                   <td> <?php echo $id['fecha_nacimiento']?></td>
                   <td> <?php echo $id['fecha_alta']?></td>



    
                   <td>
    
                            <form method="post">
                                <input type="hidden" name="txtID" id="txtID" value="<?php echo $id['id']; ?>"/>
                                <input type="submit" name="action" value="Actualizar" class="btn btn-light">
                                <input type="submit" name="action" value="Borrar" class="btn btn-light">
    
                            </form>
                        </td>
               
               
                 
                </tr>
                  
    
                <?php }  ?>
             
          
            
            </tbody>
        </table>
        
        </div>
    </div>
    </div>
</div>
    
</body>
</html>