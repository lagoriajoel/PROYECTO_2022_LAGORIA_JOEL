    <?php require_once "vista/includes/head.php"; 
    require_once "vista/includes/header.php";
    ?>
    <script defer src="vista/usuarios/js/consultas.js"></script>
   
</head>
<body>
<?php
   
   if($accion === "actualizar"){
        if ($error !== ""){
            echo '<div class="alert alert-danger m-3"><p class="fw-bold">Error en la operación</p><p>'.$error.'</p></div>';
        }
        else{
            echo '<div class="alert alert-success m-3"><p class="fw-bold">Operación exitosa</p><p>Se registró la cuenta en la base de datos</p></div>';
        }
    }
?>
    
    <main>
        <div class="container">
     
           <div class="mx-auto" style="width: 800px;">
           
           <div class="card m-2">
            <div class="card-header">
              ELIMINAR/MODIFICAR REGISTROS
            </div>
            <div class="card-body">
               
            <form action="usuario/actualizar" method="post" id="formUsuario" class="row g-3">
                        
                        <div class="">
                            <label class="form-label" for="datoCuenta">Cuenta: </label>
                            <input type="text" name="datoCuenta" id="datoCuenta" value = "<?= $usuario->getCuenta() ?>" maxlength="20" class="form-control" disabled>
                        </div>
                        <div class="">
                            <label for="datoApellido">Apellido: </label>
                            <input type="text" name="datoApellido" id="datoApellido" value = "<?= $usuario->getApellido() ?>" class="form-control" disabled>
                        </div>
                        <div class="">
                            <label for="datoNombres">Nombres: </label>
                            <input type="text" name="datoNombres" id="datoNombres" value = "<?= $usuario->getNombres() ?>" class="form-control" disabled>
                        </div>
                        <div class="">
                            <label for="datoCorreo">Correo: </label>
                            <input type="email" name="datoCorreo" id="datoCorreo" value = "<?= $usuario->getCorreo() ?>" class="form-control" disabled>
                        </div>
                        <div class="">
                            <label for="datoEstado">Estado : </label>
                            <select name="datoEstado" id="datoEstado" " class="form-select" disabled>
                                <option value="">Seleccione...</option>
                                <option value="1" <?php if($usuario->getEstado() === 0) echo 'selected'; ?>>Activo</option>
                                <option value="2" <?php if($usuario->getEstado() === 1) echo 'selected'; ?>>INACTIVO</option>
                            </select>
                        </div>
                        <div class="">
                            <label for="datoPerfil">Perfil: </label>
                            <select name="datoPerfil" id="datoPerfil" class="form-select"disabled>
                                <option value="">Seleccione...</option>
                                <option value="1" <?php if($usuario->getPerfilId() === 1) echo 'selected'; ?>>Administrador</option>
                                <option value="2" <?php if($usuario->getPerfilId() === 2) echo 'selected'; ?>>Operador</option>
                            </select>
                        </div>
                       <div class="">
                         
                            <button id="botonModificar" type="button" class="btn btn-outline-success ">Modificar</button>
                            <button id="botonAceptar" type="button" class="btn btn-outline-dark" disabled>Aceptar</button>
                            <button id="botonCancelar" type="button" class="btn btn-outline-dark" disabled>Cancelar</button>
                            <button id="botonClave" type="button"  class="btn btn-outline-primary">Actualizar contraseña</button>
                        
                            <button id="botonEliminar" type="button" class="btn btn-outline-danger" >Eliminar</button>
                            <input type="hidden" name="datoId" id="datoId" value = "<?= $usuario->getIdUsuario() ?>">
                            <input type="hidden" name="datoEstado" id="datoEstado" value = "<?= $usuario->getEstado() ?>">

                            <input  type="hidden" name="accion" value="actualizar">
                       </div>
                    </form>
            </div>
            
           </div>

           </div>

          </div>
        </div>
    </main>
   
</body>
</html>