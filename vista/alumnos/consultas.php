<?php require_once "vista/includes/head.php"; 
    require_once "vista/includes/header.php";
    ?>
  
  <script defer src="vista/alumnos/JS/consultasAlumnos.js"></script>
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
               
            <form action="alumno/actualizar" method="post" id="formAlumno" class="row g-3">
                        
                       
                        <div class="">
                            <label for="apellido">Apellido: </label>
                            <input type="text" name="apellido" id="apellido" value = "<?= $alumno->getApellido() ?>" class="form-control"disabled>
                        </div>
                        <div class="">
                            <label for="nombres">Nombres: </label>
                            <input type="text" name="nombres" id="nombres" value = "<?= $alumno->getNombres() ?>" class="form-control" disabled>
                        </div>
                        <div class="">
                            <label for="dni">Dni: </label>
                            <input type="text" name="dni" id="dni" value = "<?= $alumno->getDni() ?>" class="form-control"disabled>
                        </div>
                        <div class="">
                            <label for="cuil">Cuil : </label>
                            <input type="text" name="cuil" id="cuil" value = "<?= $alumno->getCuil() ?>" class="form-control"disabled>
                        </div>
                       
                        <div class="">
                            <label for="telefono01">Telefono 1: </label>
                            <input type="text" name="telefono01" id="telefono01" value = "<?= $alumno->getTelefono01() ?>" class="form-control"disabled>
                        </div>
                        <div class="">
                            <label for="telefono02">Telefono 2: </label>
                            <input type="text" name="telefono02" id="telefono02" value = "<?= $alumno->getTelefono02() ?>" class="form-control"disabled>
                        </div>
                        <div class="">
                            <label for="domicilio">Domicilio: </label>
                            <input type="text" name="domicilio" id="domicilio" value = "<?= $alumno->getDomicilio() ?>" class="form-control"disabled>
                        </div>
                        <div class="">
                            <label for="localidad">Localidad : </label>
                            <input type="text" name="localidad" id="localidad" value = "<?= $alumno->getDomicilioLocalidad() ?>" class="form-control"disabled>
                        </div>
                       
                        <div class="">
                            <label for="provincia">Provincia: </label>
                            <input type="text" name="provincia" id="provincia" value = "<?= $alumno->getDomicilioProvincia() ?>" class="form-control"disabled>
                        </div>
                        <div class="">
                            <label for="correo">Correo: </label>
                            <input type="text" name="correo" id="correo"  value = "<?= $alumno->getCorreo() ?>" class="form-control"disabled>
                        </div>
                        <div class="">
                            <label for="fechaNacimiento">Fecha de Nacimiento: </label>
                            <input type="email" name="fechaNacimiento" id="fechaNacimiento" value = "<?= $alumno->getFechaNacimiento() ?>" class="form-control">
                        </div>
                        
                       <div class="">
                         
                            <button id="Modificar" type="button" class="btn btn-outline-success ">Modificar</button>
                            <button id="Aceptar" type="button" class="btn btn-outline-dark" disabled>Aceptar</button>
                            <button id="Cancelar" type="button" class="btn btn-outline-dark" disabled>Cancelar</button>
                            <button id="Clave" type="button"  class="btn btn-outline-primary">Actualizar contraseña</button>
                        
                            <button id="Eliminar" type="button" class="btn btn-outline-danger" >Eliminar</button>
                            <input type="hidden" name="idAlumno" id="idAlumno" value = "<?= $alumno->getId() ?>">
                           

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