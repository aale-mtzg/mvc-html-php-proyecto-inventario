<?php

    
?>

<!Doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!---->
        <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!--CSS-->
        <link href="./assets/css/general-navbar-sidebar-menu-styles.css" rel="stylesheet" type="text/css">
        
        <!--icons-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <title>Inicio</title>
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

