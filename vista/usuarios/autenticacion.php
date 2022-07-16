<?php

if($_POST) {
    header('Location: index.php');
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
    <div class="container">
        <br/>
        <div class="container">
            <div class="row">
            <div class="col-md-4"></div>
                <div class="col-md-4">
                     <div class="card">
                        <div class="card-header bg-primary">
                          <label for="" class="text-white">INGRESAR</label>
                        </div>
                 <div class="card-body">
                      <form action="validar.php" method="post">

                            <div class = "form-group">
                            <label for="exampleInputEmail1">Cuenta </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name ="cuenta" aria-describedby="emailHelp" placeholder="ingrese su cuenta">
                           
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="password" class="form-control" name="clave" id="exampleInputPassword1" placeholder="Ingrese su Contraseña">
                            </div>
                            
                            
                            <label  class="form-text text-muted">Olvide mi contraseña</label>
                           
                            <div>
                            <button type="submit" class="btn btn-primary">Ingresar</button>
                            </div>
                        </form>
                    
                        </div>
                       
                     </div>
                    
                </div>
                
            </div>
        </div>
    </div>

</body>
</html>