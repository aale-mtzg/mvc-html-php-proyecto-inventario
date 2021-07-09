// constante para seleccionar todos los formularios que se tengan en una misma vista
const formularios_ajax = document.querySelectorAll(".FormularioAjax");

//Funcion
function enviar_formulario_ajax(e){
    //evita redireccinar a la url del envio de formulario
    e.preventDefault();

    //array de datos del form
    let data = new FormData(this);
    //enviar form
    let method = this.getAttribute("method");



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
            position: 'center',
            icon: 'success',
            title: alerta.Titulo,
            text: alerta.Texto,
            type: alerta.Tipo, //tipo de alerta
            confirmButtonText: 'Aceptar (Imprimir)'
        });

    }else if(alerta.Alerta==="recargar"){  //recargar la pagina al dar en aceptar
        Swal.fire({
            position: 'center',
            icon: 'success',
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
            position: 'center',
            icon: 'success',
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
