<?php require_once "vista/includes/head.php"; 
 require_once "vista/includes/header.php"; 
?>

<body>
   
    <main>
      



<div class="container">
<div class="card m-3">
            <div class="card-header">
                   Registro de Usuario
            </div>
            <div class="card-body">
                        <form class="row g-3 needs-validation" action="perfil/guardar" method="post" novalidate>
                            <div class="col-md-6">
                                <label for="datoCuenta" class="form-label">Cuenta: </label>
                                <input type="text" name="datoCuenta" id="datoCuenta" value = "" maxlength="20" class="form-control" required>
                                <div class="invalid-feedback">
                                    Por favor ingrese un nombre correcto.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="datoApellido" class="form-label">Apellido: </label>
                                <input type="text" name="datoApellido" id="datoApellido" value = "" class="form-control" required>
                                <div class="invalid-feedback">
                                    Por favor introduzca un apeelido valido.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="datoNombres"    class="form-label">Nombres: </label>
                                <input type="text" name="datoNombres" id="datoNombres" value = "" class="form-control" required>
                                <div class="invalid-feedback">
                                    Por favor introduzca un Nombre valido.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="datoCorreo" class="form-label">Correo: </label>
                                <input type="email" name="datoCorreo" id="datoCorreo" value = "" class="form-control" required>
                                <div class="invalid-feedback">
                                    Por favor introduzca un correo valido.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="datoClave" class="form-label">Contraseña: </label>
                                <input type="password" name="datoClave" id="datoClave" value = "" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Repetir Contraseña</label>
                                <input type="password" class="form-control password" id="password2" required>
                            </div>
                           
                            <div class="col-md-3">
                                <label for="datoPerfil" class="form-label">Perfil: </label>
                                <select name="datoPerfil" id="datoPerfil" class="form-select" required>
                                    <option value="">Seleccione...</option>
                                    <option value="1" >Administrador</option>
                                    <option value="2" >Operador</option>
                                </select>
                            </div>
                       
                            <button type="submit" class="btn btn-success">Registrar cuenta</button>
                            <input type="hidden" name="accion" value="registrar">
                        </form>
                    </div>
    </main>
</div>
   <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()


   </script>
</body>
</html>