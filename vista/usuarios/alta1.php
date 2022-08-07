

<?php require_once "vista/includes/head.php"; ?>

<body>

<?php
    if($accion === "registrar"){
        if ($error !== ""){
            echo '<div class="alert alert-danger m-3"><p class="fw-bold">Error en la operación</p><p>'.$error.'</p></div>';
        }
        else{
            echo '<div class="alert alert-success m-3"><p class="fw-bold">Operación exitosa</p><p>Se registró la cuenta en la base de datos</p></div>';
        }
    }
?>

<div class="container">
           
           
        <div class="card m-3">
            <div class="card-header">
                   Registro de Usuario
            </div>
            <div class="card-body">
                  
        <form class="row g-3" id="form" action="usuario/guardar" method="post">
                            
                            <div class="col-md-6">
                                    <label for="" class="form-label">Usuario</label>
                                <div class="input-group">
                                   
                                    <input type="text" class="form-control usuario" name="datoCuenta" id="datoCuenta" value = "<?= $usuario->getCuenta() ?>" maxlength="20" aria-describedby="inputGroupPrepend2" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label ">Nombres</label>
                                <input type="text" class="form-control nombre"  name="datoNombres" id="datoNombres" value = "<?= $usuario->getNombres() ?>" placeholder="Nombres"  required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Apellidos</label>
                                <input type="text" class="form-control apellido"  name="datoApellido" id="datoApellido" value = "<?= $usuario->getApellido() ?>" required>
                            </div>
                           
                            <div class="col-md-6">
                                <label for="validationDefault03" class="form-label" value = "">Correo</label>
                                <input type="email" class="form-control correo" name="datoCorreo" id="datoCorreo" value = "<?= $usuario->getCorreo() ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Contraseña</label>
                                <input type="password" class="form-control password" name="datoClave" id="datoClave" required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Repetir Contraseña</label>
                                <input type="pasword" class="form-control password" id="password2" required>
                            </div>

                            <div class="col-md-3">
                                <label for="validationDefault04" class="f">Perfil de Usuario</label>
                                <select name="datoPerfil" id="datoPerfil" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <option value="1" <?php if($usuario->getPerfilId() === 1) echo 'selected'; ?>>Administrador</option>
                                    <option value="2" <?php if($usuario->getPerfilId() === 2) echo 'selected'; ?>>Operador</option>
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
                                <button type="submit" class="btn btn-success">Registrar cuenta</button>
                                <input type="hidden" name="accion" value="registrar">
                            </div>
                    </form>

        
            </div>
            
          </div>
      
    </div>
</body>

</html>