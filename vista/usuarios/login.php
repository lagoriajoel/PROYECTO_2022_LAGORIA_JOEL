
<?php
require_once "vista/includes/head.php";?>
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
                      <form action="usuario/login" method="post">

                            <div class = "form-group">
                            <label for="exampleInputEmail1">Cuenta </label>
                            <input type="text" class="form-control" id="datoCuenta" name ="datoCuenta" aria-describedby="emailHelp" placeholder="ingrese su cuenta">
                           
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="password" class="form-control" name="datoClave" id="datoClave" placeholder="Ingrese su Contraseña">
                            </div>
                            
                            
                            <label  class="form-text text-muted">Olvide mi contraseña</label>
                           
                            <div>
                            <button type="submit" class="btn btn-primary">Ingresar</button>
                            <input type="hidden" name="accion" value="autenticarse">
                            </div>
                        </form>
             <?php
                if($accion === "autenticarse"){
                    if ($error !== ""){
                         echo '<div class="alert alert-danger m-3"><p class="fw-bold">Error en la operación</p><p>'.$error.'</p></div>';
                         }
                     }
            ?>      
                        </div>
                       
                     </div>
                    
                </div>
                
            </div>
        </div>
    </div>

</body>
</html>