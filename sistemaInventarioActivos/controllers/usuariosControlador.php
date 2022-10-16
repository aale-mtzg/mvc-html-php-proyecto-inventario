<?php

//comprobar si hay una peticion ajax
if(peticionAjax){
    //incluir usaurioModelo????
    require_once "../models/principalModelo.php";
}else{
    //???
    require_once "../models/principalModelo.php";

}

class usuariosControlador extends usuarioModelo {
    /**---------Controlador agregar usuario------- */
    public function agregar_usuario_controlador($datos){
        $nombre = principalModelo::limpiar_cadena($_POST['nombre']);
        $aPaterno = principalModelo::limpiar_cadena($_POST['aPaterno']);
        $aMaterno = principalModelo::limpiar_cadena($_POST['aMaterno']);
        $rol = principalModelo::limpiar_cadena($_POST['rol']);
        $nombreUsuario = principalModelo::limpiar_cadena($_POST['nombreUsuario']);
        $correo = principalModelo::limpiar_cadena($_POST['correo']);
        $contraseña = principalModelo::limpiar_cadena($_POST['contraseña']);
        $confirmaContraseña = principalModelo::limpiar_cadena($_POST['confirmaContraseña']);


        //*** Comprobar campos vacios */
/*        if($nombre=="" || $aPaterno=="" || $aMaterno=="" || $nombreUsuario=="" || $correo=="" || $contraseña=="" || $confirmaContraseña=="" ){
            $alerta=[
                "Alerta"=>"simple", 
                "Titulo"=>"Ocurrio un error inesperado",
                "Texto"=>"No se han llenado los campos obligatorios",
                "Tipo"=>"error"
            ];

            echo json_encode($alerta);
            //Para que no se siga executando el codigo 
            exit();

        } 
*/
        /*== comprobar campos vacios ==*/
		if($nombre=="" || $aPaterno=="" || $aMaterno=="" || $contraseña=="" || $confirmaContraseña==""){
			
            //echo json_encode('Llena todos los campos');
            $alerta =[
				"Alerta"=>"simple",
				"Titulo"=>"Error",
				"Texto"=>"No has llenado todos los campos que son obligatorios",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();*/
		}else{
            echo json_encode('Correcto!');
        }

        //*** Comprobar contraseñas iguales */
        if($contraseña != $confirmaContraseña){
            $alerta=[
                "Alerta"=>"simple", 
                "Titulo"=>"Ocurrio un error inesperado",
                "Texto"=>"Las contraseñas no coinciden",
                "Tipo"=>"error"
            ];

            echo json_encode($alerta);
            //Para que no se siga executando el codigo 
            exit();

        }
    }

}