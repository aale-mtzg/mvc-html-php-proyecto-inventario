$(document).ready(function(){
    //--------------------- SELECCIONAR FOTO ACTIVO ---------------------
    $("#archivoImagen").on("change",function(){
        var uploadFoto = document.getElementById("archivoImagen").value;
        var foto       = document.getElementById("archivoImagen").files;
        var nav = window.URL || window.webkitURL;
        var contactAlert = document.getElementById('form_alert');
        
            if(uploadFoto !='')
            {
                var type = foto[0].type;
                var name = foto[0].name;
                if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png')
                {
                    contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';                        
                    $("#img").remove();
                    $(".delPhoto").addClass('notBlock');
                    
                    $('#foto').val('');
                    return false;
                }else{  
                        contactAlert.innerHTML='';
                        $("#img").remove();
                        document.getElementById("portada").style.display = "none";
                        $(".delPhoto").removeClass('notBlock');
                        var objeto_url = nav.createObjectURL(this.files[0]);
                        $(".previewImagen").append("<img id='img' src="+objeto_url+">");
                        $(".upimg label").remove();
                        
                    }
            }else{
                alert("No selecciono foto");
                $("#img").remove();
            }              
    });
    $('.delPhoto').click(function(){
        $('#foto').val('');
        $(".delPhoto").addClass('notBlock');
        document.getElementById("portada").style.display = "block";
        $("#img").remove();
    });
});