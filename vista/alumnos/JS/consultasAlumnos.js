const habilitarFormulario = ()=>{
    //Controles
    let controles = document.querySelectorAll("#formAlumno input, #formAlumno select");
    controles.forEach(control => {
        control.disabled = false;
    });
    //Botones
    let botones = document.querySelectorAll("#formAlumno button");
    botones.forEach(boton => {
        boton.disabled = true;
    });
    let botonAceptar = document.getElementById("Aceptar");
    botonAceptar.disabled = false;
    let botonCancelar = document.getElementById("Cancelar");
    botonCancelar.disabled = false;
};

const deshabilitarFormulario = ()=>{
    //Controles
    let controles = document.querySelectorAll("#formAlumno input, #formAlumno select");
    controles.forEach(control => {
        control.disabled = true;
    });
    //Botones
    let botones = document.querySelectorAll("#formAlumno button");
    botones.forEach(boton => {
        boton.disabled = false;
    });
    let botonAceptar = document.getElementById("Aceptar");
    botonAceptar.disabled = true;
    let botonCancelar = document.getElementById("Cancelar");
    botonCancelar.disabled = true;
};


document.addEventListener("DOMContentLoaded", ()=>{
    let botonModificar = document.getElementById("Modificar");
    botonModificar.onclick = ()=>{
        habilitarFormulario();
    };

    let botonAceptar = document.getElementById("Aceptar");
    botonAceptar.onclick = ()=>{
        //validaciones javascript para los datos del formulario
        document.forms["formAlumno"].submit();
    };

    let botonCancelar = document.getElementById("Cancelar");
    botonCancelar.onclick = ()=>{
        deshabilitarFormulario();
    };

    let botonClave = document.getElementById("Clave");
    botonClave.onclick = ()=>{
       window.location.href = "usuario/actualizarContrasena"
    };

    let botonEliminar = document.getElementById("Eliminar");
    botonEliminar.onclick = ()=>{
       
     if (confirm("¿Desea eliminar el ususario?")){ 
        let id= document.getElementById("idAlumno"); 
       
        window.location.href = "alumno/eliminar/"+id.value; 

      
    }
    else{alert("Operacion cancelada" )}  
    };
    

})

