<?php

include('./models/principalModelo.php');
$db = new Db();

$posData = [];
$posData[0]=$_POST['estatus'];
$posData[1]= $_POST['tipoUbicacion'];
$posData[2]= $_POST['numSerial'];
$posData[3]= $_POST['numDispositivo'];
$posData[4]= $_POST['numTecNM'];
$posData[5]= $_POST['tipoActivo'];
$posData[6]= $_POST['nombreActivo'];
$posData[7]= $_POST['fechaAlta'];
$posData[8]= $_POST['marca'];
$posData[9]= $_POST['modelo'];
$posData[10]= $_POST['color'];
$posData[11]= $_POST['descripcionActivo'];
$posData[12]= $_POST['archivoImagen'];
$posData[13]= $_POST['archivoQR'];
$posData[14]= $_POST['cantidad'];


$consultaUno = "INSERT INTO activos (idx_estatus, idx_ubicacion, numeroSerial, numero_serial_dispositivo,
numero_serial_tecNM, tipo_activo ,nombre_activo, fecha_alta, marca, modelo, color, descripcion_activo, imagen_activo, imagen_codigo_qr,cantidad) 
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$result = $db -> Db_query_save("iissssssssssssi",$consultaUno,$posData);

if(!$result === TRUE){
    echo($consultaUno);
    header("Location: registroMobiliario.php?registro=1");
    

}else {

    echo "Error";
    
    
}


?>