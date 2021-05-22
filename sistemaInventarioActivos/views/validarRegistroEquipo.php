
<?php
    include('./models/principalModelo.php');

    $consultaUno = "INSERT INTO activos (idx_estatus, idx_ubicacion, numeroSerial, numero_serial_dispositivo,
    numero_serial_tecNM, tipo_activo ,nombre_activo, fecha_alta, marca, modelo, color, descripcion_activo, imagen_activo, imagen_codigo_qr, cantidad) 
    VALUES (".$_POST['estatus'].",".$_POST['tipoUbicacion'].",'".$_POST['numSerial']."','".$_POST['numDispositivo']."',
    '".$_POST['numTecNM']."','".$_POST['tipoActivo']."','".$_POST['nombreActivo']."','".$_POST['fechaAlta']."','".$_POST['marca']."','".$_POST['modelo']."','".$_POST['color']."','".$_POST['descripcionActivo']."','".$_POST['archivoImagen']."','".$_POST['archivoQR']."','".$_POST['cantidad']."')";
    echo $consultaUno;
    $result=mysqli_query($conexion, $consultaUno) or die (mysqli_error($conexion));

    if($result){
        $idCabecera = mysqli_insert_id($conexion);
        echo $idCabecera;
        

        
        $consultaDos = "INSERT INTO activo_equipo($idCabecera,capacidad_memoria, procesador, disco_duro, pulgadas, resolucion, conectividad, tipo_entrada) 
        VALUES ('".$_POST['capacidadMemoria']."','".$_POST['procesador']."','".$_POST['discoDuro']."','".$_POST['pulgadas']."','".$_POST['resolucion']."','".$_POST['conectividad']."','".$_POST['tipoEntrada']."')";
        
        echo $consultaDos;

        mysqli_query($conexion, $consultaDos) or die (mysqli_error($conexion));
        header("Location: registroEquipo.php");



    }else {

        echo "Error";
        echo $consultaDos;
        
    }
?>