<?php
    include('./models/principalModelo.php');

    $db = new principalModelo();

    session_start();

    if($_POST){

        $posData = [];
        $posData[0] = $_POST['correo'];
        $posData[1] = $_POST['contraseña'];

        $get_usuarios ="SELECT id_usuario, idX_rol, nombre_usuario, contrasena, correo FROM `usuarios` WHERE correo='$posData[0]'";
        $resultado = $db -> Db_query($get_usuarios);
        
        $filas = mysqli_num_rows($resultado);

        $errorContraseña = false;
        $errorUsuario = false;

        

        if($filas > 0){

            $row = $resultado->fetch_assoc();
            //base de datos
            $password_db = $row['contrasena'];
            //campo de texto
            //$password_campo = sha1($password);
            $password_campo = $posData[1];

            if($password_db == $password_campo){

                $_SESSION['id'] = $row['id_usuario'];
                $_SESSION['nombreUsuario'] = $row['nombre_usuario'];
                $_SESSION['rol'] = $row['idX_rol'];

                header("location: inicio");

            }else{
                //echo "La contraseña no coincide";
                
                //echo "La contraseña es incorrecta!";
                echo '<div id="error" class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        <strong>Error!</strong> La contraseña es incorrecta.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';

                //echo  $errorContraseña = true;
                //echo '<textarea class="form-control" id="var" name="var" rows="1" value = '.$errorContraseña.' ></textarea>'; 

                $errorContraseña = true;
        

            }

        }else{
              $errorUsuario = true;
            
            //echo  $errorUsuario = true;
            //echo "El correo no esta registrado!";
            echo '<div id="error" class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-triangle ocultar "></i>
                    <strong>Error!</strong> El correo no esta registrado, ustede no podra ingresar.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }
    }
    
    
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--estilos css-->
    <link rel="stylesheet" href="./assets/css/login-vista-styles.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!--Iconos-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
            crossorigin="anonymous">
    <!--Estilo de fuente-->    
    
    <title>Login</title>
  </head>
  <body>
    <div class="container">
        
        <div class="row tarjeta">
            <div class="col-lg-5 izquierda">
                <img src="./assets/img/img-login.jpg" class="img-fluid " alt="">
            </div>
            <div class="col-lg-7 derecha">
                <div class="row">
                    <img src="./assets/img/img-titulo.png" class="img-fluid" alt="">
                    <div class="prueba">

                    </div>
                </div>
                
                
                <!-- Mensajes de Verificación -->
                <div id="error" class="alert alert-danger ocultar" role="alert">
                    <i class="fas fa-exclamation-triangle"></i>
                    <strong>Error!</strong> La contraseña es incorrecta.
                </div>
                <!-- Fin Mensajes de Verificación -->

                <!-- Mensajes de Verificación-->
                <div id="error" class="alert alert-danger ocultar" role="alert">
                    <i class="fas fa-exclamation-triangle ocultar "></i>
                    <strong>Error!</strong> El correo no existe, ustede no podra ingresar.
                </div>
                <!--Fin Mensajes de Verificación -->
                
                <!--
                <div class="row" id="error-contraseña" >
                    <div class="alert alert-danger" id="alerta" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        La contraseña es incorrecta!
                    </div>
                </div>
                <div class="row" id="error-usuario">
                    <div class="alert alert-danger" id="alerta" role="alert" >
                        <i class="fas fa-times-circle"></i>
                        El correo no esta registrado!
                    </div>
                </div>
                -->

                <div class="row">
                    <form action="" method="POST" id="formulario-login"  >
                        <div class="form-row input-contenedor">
                            <i class="fas fa-user"></i>
                            <input type="email" class="form-control" name="correo" aria-describedby="emailHelp" placeholder="CORREO" required>
                        </div>
                        <div class="form-row input-contenedor">
                            <i class="fas fa-lock"></i>
                            <input type="password" class="form-control"  name="contraseña" placeholder="CONTRASEÑA" required>
                        </div>
                        <div class="form-row btn-ingresar">
                            <button type="submit" class="btn" >INGRESAR</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

    

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>



<script type="text/javascript">
	function verificarPasswords(){
        // Ontenemos los valores de los campos de contraseñas 
        //errorContraseña = document.getElementById('pass1');
        //errorCorreo = document.getElementById('pass2');

    //
        var formulario = document.getElementById("formulario-login");
        var errorContraseña = '<?php echo $errorContraseña;?>'
 
    // Verificamos si las constraseñas no coinciden 
        if ( errorContraseña  == true  ) {
    
            // Si las constraseñas no coinciden mostramos un mensaje 
            document.getElementById("error").classList.add("mostrar");
            document.getElementById("error").classList.remove("ocultar");

            return false;

        } else {

            
            //document.getElementById("error").classList.add("ocultar");
    
            // Si las contraseñas coinciden ocultamos el mensaje de error
            //document.getElementById("error").classList.remove("mostrar");
    
            // Mostramos un mensaje mencionando que las Contraseñas coinciden 
            //document.getElementById("ok").classList.remove("ocultar");
    
            // Desabilitamos el botón de login 
            //document.getElementById("registrar").disabled = true;
    
            // Refrescamos la página (Simulación de envío del formulario) 
            //setTimeout(function() {
            //  location.reload();
            //}, 3000);

            formulario.submit();
            return true;
        }
         	
	}

</script>