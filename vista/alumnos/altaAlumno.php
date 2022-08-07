
<?php require_once "vista/includes/head.php";
 require_once "vista/includes/header.php"; 
?>

<body>
   
<main>
<?php
    if($accion === "registrarAlumno"){
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
                   Registro de Alumnos
            </div>
            <div class="card-body">
                        <form class="row g-3 needs-validation" action="alumno/guardar" method="post" novalidate>
                           
                            <div class="col-md-6">
                                <label for="datoApellido" class="form-label">Apellido: </label>
                                <input type="text" name="datoApellido" id="datoApellido" value = "" class="form-control" required>
                                <div class="invalid-feedback">
                                    Ingreso no valido.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="datoNombres"    class="form-label">Nombres: </label>
                                <input type="text" name="datoNombres" id="datoNombres" value = "" class="form-control" required>
                                <div class="invalid-feedback">
                                    Ingreso no valido.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="datoDni" class="form-label">DNI </label>
                                <input type="text" name="datoDni" id="datoDni" value = "" class="form-control" required>
                                <div class="invalid-feedback">
                                    Ingreso no valido.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="datoCuil" class="form-label">CUIL </label>
                                <input type="text" name="datoCuil" id="datoCuil" value = "" class="form-control"required>
                                <div class="invalid-feedback">
                                    Ingreso no valido.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="datoDomicilio" class="form-label">Domicilio </label>
                                <input type="text" name="datoDomicilio" id="datoDomicilio"  value = "" class="form-control"required>
                                <div class="invalid-feedback">
                                    Ingreso no valido.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="datoLocalidad" class="form-label">Localidad</label>
                                <input type="text" name="datoLocalidad" class="form-control" id="datoLocalidad" required>
                                <div class="invalid-feedback">
                                    Ingreso no valido.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="datoPorvincia" class="form-label">Provincia</label>
                                <input type="text" name="datoProvincia"  class="form-control" id="datoProvincia" required >
                                <div class="invalid-feedback">
                                    Ingreso no valido.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="datoTelefono1" class="form-label">Telefono 1</label>
                                <input type="tel" name="datoTelefono1"  class="form-control" id="datoTelefono1" required >
                                <div class="invalid-feedback">
                                    Ingreso no valido.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="datoTelefono2" class="form-label">Telefono 2</label>
                                <input type="tel" name="datoTelefono2"  class="form-control" id="datoTelefono2" required>
                                <div class="invalid-feedback">
                                    Ingreso no valido.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="datoCorreo" class="form-label">Correo:</label>
                                <input type="email" name="datoCorreo" class="form-control  class="form-control" id="datoCorreo" required>
                                <div class="invalid-feedback">
                                    Ingreso no valido.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="datoNacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" name="datoNacimiento"  class="form-control" id="datoNacimiento" required>
                                <div class="invalid-feedback">
                                    Ingreso no valido.
                                </div>
                            </div>
                          

                         
                       
                            <button type="submit" class="btn btn-success">Registrar Alumno</button>
                            <input type="hidden" name="accion" value="registrarAlumno">
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