<?php
$textqr=$_POST['textqr'];//Recibo la variable pasada por post
$sizeqr=$_POST['sizeqr'];//Recibo la variable pasada por post
include('vendor/autoload.php');//Llamare el autoload de la clase que genera el QR
use Endroid\QrCode\QrCode;

$qrCode = new QrCode($textqr);//Creo una nueva instancia de la clase
$qrCode->setSize($sizeqr);//Establece el tamaño del qr
//header('Content-Type: '.$qrCode->getContentType());
$image = $qrCode->writeString();//Salida en formato de texto 

$imageData = base64_encode($image);//Salida en formato imagen Codifico la imagen usando base64_encode





//echo '<img name="archivoQR" id="archivoQR" src="data:image/png;base64,'.$imageData.'">';
//<img src="" alt=""name="archivoQR" id="archivoQR" class="">

//echo '<textarea class="form-control" id="pruebaQR" name="pruebaQR" rows="10" value = '.$image.' ></textarea>'; 

echo '<img name="archivoQR" id="archivoQR-img" src="data:image/png;base64,'.$imageData.'">';


//echo '<input id="archivoCodigoQR" type="file" class="form-control-file"  name="archivoCodigoQR src="data:image/png;base64,'.$imageData.'" >'; 


/**** Es necesario descargar libreria de codigo QR 
 * composer require endroid/qr-code
 */



?>