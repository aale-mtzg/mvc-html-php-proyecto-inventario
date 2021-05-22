<?php

    class vistasModelo{

        /**----Modelo obetener vistas----*/
        protected static function obtener_vistas_modelo($vistas){
            $listaVistasPermitidas = ["inicio", "cambioUbicacion", "prestamos", "bajasActivos", "registroEquipo", "registroMobiliario",
                                        "registroRefacciones", "inventario", "ubicaciones", "reportesInventario", "configUsuarios", 
                                        "configUbicaciones", "configEstatus", "inventario2"];
            //comprobar que la vista forma parte del sistema
            if(in_array($vistas, $listaVistasPermitidas)){
                
                if(is_file("./views/".$vistas."-vista.php")){
                    $contenido = "./views/".$vistas."-vista.php";
                }else{
                    $contenido="404";
                }
            }elseif($vistas=="login" || $vistas=="index"){
                $contenido="login";
            }else{
                $contenido="404";
            }
            return $contenido;
        }
    }