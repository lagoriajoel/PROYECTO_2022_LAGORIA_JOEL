



	usuario= /^[a-zA-Z0-9\_\-]{6,20}$/, // Letras, numeros, guion y guion_bajo
	regexNombre= /^[a-zA-ZÀ-ÿ\s]{1,45}$/, // Letras y espacios, pueden llevar acentos.
	regexApellido= /^[a-zA-ZÀ-ÿ\s]{1,45}$/,
    regexPassword= /^.{8,15}$/, // 8 a 15 digitos.
	regexCorreo= /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/



    const nombre=document.getElementById('nombre');
    const apellido=document.getElementById('apellido');
    const correo=document.getElementById('correo');
    const password=document.getElementById('password1');
    const parrafo=document.getElementById('warnings');
    const form=document.getElementById('form');

   
   

    const campos = {
        usuario: false,
        nombre: false,
       apellido: false,
        password: false,
        correo: false
    }
    
    
    form.addEventListener("submit", e=>{
         e.preventDefault()
        
        
       
       
         if (!regexNombre.test(usuario.value)) {
            alert("Usuario No valido")
        }
        else{campos.usuario=true}
       
         if (!regexNombre.test(nombre.value)) {
            alert("nombre No valido")
        }
        else{campos.nombre=true}

        if (!regexApellido.test(apellido.value)) {
            alert("Apellido No valido")
        }
        else{campos.apellido=true}

        if (!regexCorreo.test(correo.value)) {
            alert("Correo No valido")
        }
        else{campos.correo=true}
        if (!regexPassword.test(password.value)) {
            alert("Contraseña No valida")
        }
        else{campos.password=true}

        validarPassword2()
           
        
       
        if (campos.usuario && campos.nombre && campos.apellido && campos.correo && campos.password) {
       // form.reset()
           
        alert("enviado")
            
        }
      



    })




    const validarPassword2 = () => {
        const inputPassword1 = document.getElementById('password1');
        const inputPassword2 = document.getElementById('password2');
    
        if(inputPassword1.value !== inputPassword2.value){
           
            alert("Las contraseñas no coinciden")
           
            campos['password'] = false;
        } else {
           
            campos['password'] = true;
        }
    }

   