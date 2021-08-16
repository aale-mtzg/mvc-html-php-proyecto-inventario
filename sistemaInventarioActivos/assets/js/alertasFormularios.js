// constante para seleccionar todos los formularios que se tengan en una misma vista
const formularios_ajax = document.querySelectorAll(".FormularioAjax"); //esta clase la deben de tener todos lod formularios

//Funcion
function enviar_formulario_ajax(e){
    //evita redireccinar a la url del envio de formulario
    e.preventDefault();

    //array de datos del form
    let datosFormulario = new FormData(this);
    //enviar form
    let method = this.getAttribute("method");

    let action = this.getAttribute("action");

    let tipo = this.getAttribute("data-form");

    let encabezados = new Headers();
    //todas las configuraciones para la funcion fetch en un  array
    let config = {
        method: 'POST',
        headers: encabezados,
        mode: 'cors', 
        cache: 'default',
        body: datosFormulario
    };

    //Cambiar texto de alertas
    let texto_alerta;

    if(tipo==="save"){
        texto_alerta="Informacion guardada correctamente";
    }else if(tipo==="delete"){
        texto_alerta="Datos eliminados";
    
    }else if(tipo==="update"){
        texto_alerta="Datos actualizados";
    }else{
        texto_alerta="Quieres realizar la operacion solicitada";
    }
    Swal.fire({
            
        title: '¿Estas seguro?',
        text: texto_alerta,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if(result.isConfirmed){
            //Funcion fetch
            fetch(action, config)
            .then(respuesta => respuesta.json())
            .then(respuesta => {
                //retornar alerta de registro exitoso
                return alertas_ajax(respuesta);
                
            });
        }  
    });
}


//Detectar el envio de formularios
formularios_ajax.forEach(formularios => {
    formularios.addEventListener("submit", enviar_formulario_ajax);
});

//ALERTAS
function alertas_ajax(alerta){
    
    if(alerta.Alerta==="simple"){
        /*Alerta Registro de activos exitoso
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Activo registrado',
            showConfirmButton: false,
            timer: 1600
        })
        //se activa el método luego de 1 segundos
        setTimeout(refresh,1000);*/

        Swal.fire({
            /*position: 'center',
            icon: 'success',*/
            title: alerta.Titulo,
            text: alerta.Texto,
            icon: alerta.Tipo, //tipo de alerta
            confirmButtonText: 'Aceptar (Imprimir)'
        });

    }else if(alerta.Alerta==="recargar"){  //recargar la pagina al dar en aceptar
        Swal.fire({
            
            title: alerta.Titulo,
            text: alerta.Texto,
            type: alerta.Tipo, //tipo de alerta
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.isConfirmed) {
                location.reload();
            }
        })

    }else if(alerta.Alerta==="limpiar"){ //limpiar los campos del formulario
        Swal.fire({
            
            title: alerta.Titulo,
            text: alerta.Texto,
            type: alerta.Tipo, //tipo de alerta
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.querySelector(".FormularioAjax").requestFullscreen(); //Seleccionar un unico elemento(el formulario que se esta enviando)
            }
        })
    }else if(alerta.Alerta==="redireccionar"){
        window.location.href=alerta.URL;

    }
}
