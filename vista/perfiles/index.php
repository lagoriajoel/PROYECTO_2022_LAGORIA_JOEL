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
                <th>id</th>
                <th>Nombre</th>
               
              </tr>
            </thead>
            <tbody>
             <?php foreach ($listado as $id){?>
            <tr>
               <td> <?php echo $id['id']?></td>
               <td> <?php echo $id['nombre']?></td>

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



   
    

</body>
