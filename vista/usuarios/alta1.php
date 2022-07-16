<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="../../librerias/bootstrap/bootstrap.min.css">
  
    <title>Document</title>
</head>
<body>
<nav class="navbar bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Padron Estudiantil</a>
                </div>
             </nav>

    <div class="container">
           
           
          <div class="card">
            <div class="card-header">
               Registro de Usuario
            </div>
            <div class="card-body">
                  
            <form class="row g-3" id="form" action="validarAdmin.php" method="post">
        <div class="col-md-6">
            <label for="validationDefault01" class="form-label ">Nombres</label>
            <input type="text" class="form-control nombre" id="nombre" value="" required>
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">Apellidos</label>
            <input type="text" class="form-control apellido" id="apellido" value="" required>
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">Usuario</label>
            <div class="input-group">
            <span class="input-group-text" id="inputGroupPrepend2">@</span>
            <input type="text" class="form-control usuario" id="usuario"  aria-describedby="inputGroupPrepend2" required>
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationDefault03" class="form-label">Correo</label>
            <input type="email" class="form-control correo" id="correo" required>
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">Contraseña</label>
            <input type="pasword" class="form-control password" id="password1" required>
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">Repetir Contraseña</label>
            <input type="pasword" class="form-control password" id="password2" required>
        </div>

        <div class="col-md-3">
            <label for="validationDefault04" class="form-label">Perfil de Usuario</label>
            <select class="form-select" id="validationDefault04" required>
            <option selected disabled value="">Seleccione...</option>
            <option>Administrador</option>
            <option>Operador</option>
            </select>
        </div>
        
        <div class="col-12">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
            <label class="form-check-label" for="invalidCheck2">
                Acepto los terminos y condiciones
            </label>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" id="boton" type="submit">Registrar</button>
        </div>
        </form>

        <div>
        <p class="warnings" id="warnings"></p>
       </div>
            </div>
            
          </div>
      
    </div>
</body>

<script src="../../librerias/js/alta1.js"></script>
</html>