<?php
   //archivo de configuraciones del sistema
   require_once "./config/config.php";
   //controlador de vistas
   require_once "./controllers/vistasControlador.php";

   $plantillaGeneral = new vistasControlador();

   $plantillaGeneral->obtener_plantilla_controlador();

?>