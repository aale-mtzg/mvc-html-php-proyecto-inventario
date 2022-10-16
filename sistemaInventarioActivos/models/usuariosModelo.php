<?php

require_once "principalModelo.php";

class usuariosModelo extends principalModelo{
    /**---------Modelo agregar usuario------- */
    protected static function agregar_usuario_modelo($datos){

        $db = new Db();
        
        $sql = principalModelo::connect()->prepare("INSERT INTO usuarios (idX_rol, nombre, apellido_paterno, apellido_materno, nombre_usuario, contrasena, correo) 
        VALUES (:rol,:nombre,:aPaterno,:aMaterno,:nombreUsuario,:correo,:confirmarpass)");

        $sql->bindParam(":rol",$datos['rol']);
        $sql->bindParam(":nombre",$datos['nombre']);
        $sql->bindParam(":aPaterno",$datos['aPaterno']);
        $sql->bindParam(":aMaterno",$datos['aMaterno']);
        $sql->bindParam(":nombreUsuario",$datos['nombreUsuario']);
        $sql->bindParam(":correo",$datos['correo']);
        $sql->bindParam(":confirmarpass",$datos['confirmarpass']);

        $sql->execute();

        return $sql;
        
        /*
        $db = new Db();
        //PENDIENTE CONFRIMAR PASS
        $confirmarpass = $_POST['confirmarpass'];
        //$posData = [];
        $datos = [];

        $datos[0] = $_POST['rol'];
        $datos[1] = $_POST['nombre'];
        $datos[2] = $_POST['aPaterno'];
        $datos[3] = $_POST['aMaterno'];
        $datos[4] = $_POST['nombreUsuario'];
        $datos[5] = $_POST['password'];
        $datos[6] = $_POST['correo'];

        //confirmar si el usuario ya esta registrado con ese correo
        //ALERTA FUNCIONAL 
        $get_usuario= "SELECT * FROM usuarios WHERE correo = ?";
        $result1 = $db -> Db_query_select_all("s",$get_usuario,[$datos[6]]);

        if(mysqli_num_rows($result1) == 0){
            $consulta = "INSERT INTO usuarios (idX_rol, nombre, apellido_paterno, apellido_materno, nombre_usuario, contrasena, correo) VALUES (?,?,?,?,?,?,?)";
            
            $result = $db -> Db_query_save("issssss",$consulta,$datos);
            if (!$result === TRUE){
                header("location:usuarios.php?registro=1"); 
                   }else {echo "error";}
            }else {
            echo '<script>
            alert("El correo ya existe");
            window.history.go(-1);</script>';
           //header("location:usuarios.php");
        }
        */
    } 

}