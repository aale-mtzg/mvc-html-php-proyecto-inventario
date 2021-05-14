<?php

    //incluir modelo
    require_once "./models/vistasModelo.php";


    class vistasControlador extends vistasModelo{
        
        /**----Controlador obtener plantilla de  Side-menu y nav-bar general del sistema--- */
        public function obtener_plantilla_controlador(){
            return require_once "./views/plantillaGeneralMenus.php";
        }

        /**----Controlador obtener vistas--- */
        public function obtener_vistas_controlador(){
            if(isset($_GET['urlViews'])){
                $ruta = explode("/",$_GET['urlViews']);
                //obtener la posicion 0 del url = la vista
                $respuesta = vistasModelo::obtener_vistas_modelo($ruta[0]);

            }else{
                $respuesta = "login";

            }
            return $respuesta;
        }
    }