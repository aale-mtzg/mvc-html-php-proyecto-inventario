<?php

$peticionAjax = true;
require_once "../config/config.php";


//IF -> Validar campos obligatorios
//Auqnue ya esta aplicado ""require" desde el formulario
//Detectar el envio de formulario
if(isset($_POST['nombre'])){
    /**---------Instancia al controlador------- */
    require_once "../controllers/usuariosControlador.php";
    
    $instancia_usuario = new usuariosControlador();

    //Condicion para registrar usuarios
    if(isset($_POST['correo']) && isset($_POST['confirmarpass'])){
        echo $instancia_usuario->agregar_usuario_controlador();
    }

}else{
    //Por seguridad, iniciar session para poder eliminar las variables de session
    //Nombre de la session
    session_start(['name' => 'INVENTARIO']);
    //vaciar la session
    session_unset();
    //eliminar las variables de session
    session_destroy();
    //redireccionar el intento de acceder al archivo al login
    header("Location: ".BASE_URL."login");
    exit();
}