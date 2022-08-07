const habilitarFormulario = ()=>{
    //Controles
    let controles = document.querySelectorAll("#formUsuario input, #formUsuario select");
    controles.forEach(control => {
        control.disabled = false;
    });
    //Botones
    let botones = document.querySelectorAll("#formUsuario button");
    botones.forEach(boton => {
        boton.disabled = true;
    });
    let botonAceptar = document.getElementById("botonAceptar");
    botonAceptar.disabled = false;
    let botonCancelar = document.getElementById("botonCancelar");
    botonCancelar.disabled = false;
};

const deshabilitarFormulario = ()=>{
    //Controles
    let controles = document.querySelectorAll("#formUsuario input, #formUsuario select");
    controles.forEach(control => {
        control.disabled = true;
    });
    //Botones
    let botones = document.querySelectorAll("#formUsuario button");
    botones.forEach(boton => {
        boton.disabled = false;
    });
    let botonAceptar = document.getElementById("botonAceptar");
    botonAceptar.disabled = true;
    let botonCancelar = document.getElementById("botonCancelar");
    botonCancelar.disabled = true;
};


document.addEventListener("DOMContentLoaded", ()=>{
    let botonModificar = document.getElementById("botonModificar");
    botonModificar.onclick = ()=>{
        habilitarFormulario();
    };

    let botonAceptar = document.getElementById("botonAceptar");
    botonAceptar.onclick = ()=>{
        //validaciones javascript para los datos del formulario
        document.forms["formUsuario"].submit();
    };

    let botonCancelar = document.getElementById("botonCancelar");
    botonCancelar.onclick = ()=>{
        deshabilitarFormulario();
    };

    let botonClave = document.getElementById("botonClave");
    botonClave.onclick = ()=>{
       let id=document.getElementById("datoId");
       window.location.href = "usuario/actualizarContrasenia/"+id.value;
    };

    let botonEliminar = document.getElementById("botonEliminar");
    botonEliminar.onclick = ()=>{
       
     if (confirm("¿Desea eliminar el ususario?")){ 
        

        let formulario = document.getElementById("formUsuario");
          
            formulario.setAttribute('action', 'usuario/eliminar')
        
            document.forms["formUsuario"].submit();
        
    }
    else{alert("Operacion cancelada" )}  
    };
    

})
  




