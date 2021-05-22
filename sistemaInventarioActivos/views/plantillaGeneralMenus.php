<?php

    
?>

<!Doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>Inicio</title>

        <?php include "./views/nav/head-links.php";?> 

    </head>
    <body>
        <?php

            $peticionAjax = false;

            require_once "./controllers/vistasControlador.php";
            $instanciaVistas = new vistasControlador();
            //nombre de la vista que se va a mostrar 
            $vistas = $instanciaVistas->obtener_vistas_controlador();
            //detectar si la repsuesta del modelo es login/404
            if($vistas =="login" || $vistas=="404"){
                require_once "./views/".$vistas."-vista.php";
            }else{
                 
        ?>


        <!--Menu/Navbar Superior-->
        <?php include "./views/nav/navbar_superior.php";?>
        

        <div class="wrapper fixed-left">
            <!--Menu/Navbar Lateral-->
            <?php include "./views/nav/navbar_lateral.php";?>
            
            <!--Contenido principal-->
            <div id="content" class="container tarjeta">
                
                <!--Aqui contenido de cada vista-->
                <?php 
                   
                   include_once $vistas; 
                   
                ?>
            </div>
        </div>

        <?php include "./views/nav/script.php";?> 
            
        
        <?php } ?>

    </body>
</html>

<!--Alerta de confirmacion:Cerrar Sesion-->
<script type="text/javascript">
    function cerrarSesion() {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success botones-confirmacion',
                cancelButton: 'btn btn-secondary botones-confirmacion'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Cerrar Sesión',
            text: "¿Está seguro que desea salir de esta página?",
            //icon: 'warning', //No me gusta el icono :C
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: 'Si',
            cancelButtonText: 'Cancelar',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                //Redirigir a logout
                window.location.replace("logout.php");
                

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                
            }
        })
    }
</script>


<!--FUNCIONAMIENTO PARA MENU SIDEBAR-->
<script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        document.getElementById("bodyContent").style.width="100%";
        });
    });
</script>

<!--FUNCIONAMIENTO PARA MENU NAVBAR-->
<script>
    const menuBtn = document.querySelector(".menu-navbar span");
    const logoutBtn = document.querySelector(".logout-icon-navbar");
    const cancelBtn = document.querySelector(".cancel-icon");
    const items = document.querySelector(".nav-items");
    const form = document.querySelector("form");

    menuBtn.onclick = ()=>{
        items.classList.add("active");
        menuBtn.classList.add("hide");
        logoutBtn.classList.add("hide");
        cancelBtn.classList.add("show");    
    }
    cancelBtn.onclick = ()=>{
        items.classList.remove("active");
        menuBtn.classList.remove("hide");
        logoutBtn.classList.remove("hide");
        cancelBtn.classList.remove("show");
        
        cancelBtn.style.color = "#ff3d00";
    }
    
</script>

