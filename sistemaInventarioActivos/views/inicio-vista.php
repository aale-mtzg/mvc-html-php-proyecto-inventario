<!--CSS-->
<link href="./assets/css/inicio-styles.css" rel="stylesheet" type="text/css">

<?php

include('./models/principalModelo.php');

$db = new principalModelo();

?>

<!--Contenido VISTA INICIO-->
<div class="container">
    <!--Página de Inicio-->
    <h1>Buscar</h1>
    
    <div class="row">
        <div class="col-md-6">
            <form class="">
                <div class="form-row">
                    <div class="form-group col-8">
                        <input type="text" class="form-control" id="" placeholder="Ingresar No. Serial...">
                    </div>
                    <div class="form-group col">
                        <button type="button" class="btn btn-info camara-archivo-btn">
                            
                            <div class="icon"><i class="fas fa-camera"></i></div>
                        </button>
                    </div>
                    <div class="form-group col">
                        <button type="button" class="btn btn-info camara-archivo-btn">
                            
                            <div class="icon"><i class="fas fa-upload"></i></div>
                        </button>
                    </div>
                </div>
                
                <div class="form-row">
                    <!--Subir -->
                    <div class="form-group col-12">
                        <div class="previewImagen ">
                            <span class="delPhoto notBlock"><i class="fas fa-times"></i></span>
                            <label for="archivoImagen"></label>
                            <div>
                                <div class="image-activo">
                                    <img src="" alt="" id="img" class="oculto">
                                </div>
                                <div class="content" id="portada">
                                    <i class="fas fa-qrcode icon"></i>
                                    <div class="text">Código QR</div>
                                </div>
                            </div>
                        </div>
                        <div class="upimg">
                            <input type="file" name="archivoImagen" id="archivoImagen">
                        </div>
                        <div id="form_alert"></div>
                    </div>
                </div>
                <div class="form-row center">
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger buscar-btn">
                            Buscar
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>