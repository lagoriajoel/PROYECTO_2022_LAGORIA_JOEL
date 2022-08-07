<?php require_once "vista/includes/head.php"; 
    require_once "vista/includes/header.php";
    ?>
   
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
      <div class="container mx-auto m-3" style="width: 800px;">
           <div class="card">
            <div class="card-header">
                Header
            </div>
            <div class="card-body">
                <form action="usuario/actualizarContrasenia/<?php echo $usuario->getIdUsuario()?>" method="post">
                    <div>
                    <label for="" class="label-control">Cuenta : </label>
                    <input type="text" name="" id="" value = "<?php echo $usuario->getCuenta()?>"  class="form-control"  disabled=""></input>  
                    </div>
                    <div>
                    <label for="" class="label-control">Contraseña Actual: </label>
                    <input type="text" name="datoClave" id="datoClave" value = "" class="form-control"  required=""></input>  
                    </div>
                    <div>
                    <label for="" class="label-control">Contraseña Nueva: </label>
                    <input type="text" name="claveNueva" id="claveNueva" value = "" class="form-control"  required=""></input>  
                    </div>
                    <div>
                    <label for="" class="label-control">Repetir contraseña: </label>
                    <input type="text" name="ClaveConfirmacion" id="ClaveConfirmacion" value = "" class="form-control"  required=""></input>  
                    </div>
                    
                     <input type="hidden" name="accion" value="actualizar"  />
                 

                     <button id="actualizar" class="btn btn-primary" type="submit">Actualizar clave</button>
                    


                </form>
            </div>
           
           </div>
      </div>
</main>
   
<script>
        const validarClave = () => {
    
    const clave1=document.getElementById('claveNueva');
    const clave2=document.getElementById('ClaveConfirmacion');
  

    if(clave1.value !== clave2.value){
       
        alert("Las contraseñas no coinciden")
       
       
    } 
}
      let boton = document.getElementById('actualizar')
        boton.addEventListener('click', validarClave);


    </script>
</body>
</html>