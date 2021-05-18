$(document).ready(function() {
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    function getARandomOneInRange() {
    return possible.charAt(Math.floor(Math.random() * possible.length));
    }

    function getRandomFour() {
    return getARandomOneInRange() + getARandomOneInRange() + getARandomOneInRange() + getARandomOneInRange();
    }
    //Funcion autoejecutada, carga al entrar a la pagina
    window.onload = function generarNumSerial(){
        var serial = `${getRandomFour()}-${getRandomFour()}-${getRandomFour()}-${getRandomFour()}`;
        $('#numSerial').val(serial);
        //  <!--GENERAR CODIGO QR (Solo # serial por ahora)-->
        //Variable del imput text
        var textqr=$("#numSerial").val();
        var sizeqr=$("#sizeqr").val();
        parametros={"textqr":textqr,"sizeqr":sizeqr};
            $.ajax({
            type: "POST",
            url: "qr.php",
            data: parametros,
            success: function(datos){
                image = $(".content-codigo-qr").html(datos);
                //let image = $("#archivoQR").val();
                $("#archivoQR").val(image);
            }
        })
        parametros={"textqr":textqr,"sizeqr":sizeqr};
            $.ajax({
            type: "POST",
            url: "qr-img.php",
            data: parametros,
            success: function(datos){
                $(".content-codigo-qr-img").html(datos);
                //let image = $("#archivoQR").val();
                //$("#archivoQR").val(image);
            }
        })
        0
        event.preventDefault();
    }
});