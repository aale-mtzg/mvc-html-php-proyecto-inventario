
<!--CSS-->

<link href="./assets/css/registroEquipo-vista-styles.css" rel="stylesheet" type="text/css">

<?php

    include('./models/principalModelo.php');

    $db = new principalModelo();

?>



<div class="container">
    <!---->
    <h1>Registro de Equipo</h1>

    <div class="container-form">
        <form action="validarRegistroEquipo.php" method="POST"></form>
            <!--Informacion general-->
            <div class="row">
                <div class="col-md-8">
                    <!--Informacion general-->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="numSerial">Serial</label>
                            <input type="text" class="form-control " id="numSerial" aria-describedby="inputGroup-sizing-sm" readonly>
                            
                        </div>
                        <div class="form-group col-md-4">
                            <label for="numDispositivo">Serial del Dispositivo</label>
                            <input type="text" class="form-control" id="numDispositivo" name="numDispositivo">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="numTecNM">Serial TecNM</label>
                            <input type="text" class="form-control" id="numTecNM" name="numTecNM">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nombreActivo">Nombre</label>
                            <input type="text" class="form-control" id="nombreActivo" name="nombreActivo" required>
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="fechaAlta">Fecha de alta</label>
                            <input type="date" class="form-control" id="fechaAlta" name="fechaAlta" value="<?php echo date("Y-m-d");?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" value="1" min="1">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            
                            <div class="form-group ">
                                <label for="marca">Marca</label>
                                <input type="text" class="form-control" id="marca" name="marca">
                            </div>
                            <div class="form-group ">
                                <label for="modelo">Modelo</label>
                                <input type="text" class="form-control" id="modelo" name="modelo">
                            </div>
                            
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group ">
                                <label for="descripcionActivo">Descripción del Activo</label>
                                <textarea class="form-control" id="descripcionActivo" rows="5"></textarea>
                            </div>
                            
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="color">Color</label>
                            <input type="text" class="form-control" id="color" name="color">
                        </div>
                        <!--Informacion Equipo-->
                        <div class="form-group col-md-6">
                            <label for="capacidadMemoria">Memoria</label>
                            <input type="text" class="form-control" id="capacidadMemoria" name="capacidadMemoria">
                        </div>
                    </div>
                    <!--Informacion Equipo-->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="procesador">Procesador</label>
                            <input type="text" class="form-control" id="procesador" name="procesador">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="discoDuro">Disco Duro</label>
                            <input type="text" class="form-control" id="discoDuro" name="discoDuro">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="pulgadas">Pulgadas</label>
                            <input type="text" class="form-control" id="pulgadas" name="pulgadas">
                        </div>
                        
                    </div>        
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="resolucion">Resolución</label>
                            <input type="text" class="form-control" id="resolucion" name="resolucion">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="conectividad">Conectividad</label>
                            <input type="text" class="form-control" id="conectividad" name="conectividad">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tipoEntrada">Tipo de entrada</label>
                            <input type="text" class="form-control" id="tipoEntrada" name="tipoEntrada">
                        </div>
                    </div>
                </div> 
                <div class="col-md-4 ">
                    <!--Imagen del activo-->
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="archivoImagen">Imagen</label>
                            <div class="previewImagen">
                                <span class="delPhoto notBlock"><i class="fas fa-times"></i></span>
                                <label for="archivoImagen"></label>
                                <div>
                                    <div class="image-activo">
                                        <img src="" alt="" id="img" class="oculto">
                                    </div>
                                    <div class="content" id="portada">
                                        <div class="icon"><i class="fas fa-camera"></i></div>
                                        <div class="text">Subir imagen</div>
                                    </div>
                                </div>
                            </div>
                            <div class="upimg">
                                <input type="file" name="archivoImagen" id="archivoImagen">
                            </div>
                            <div id="form_alert"></div>
                        </div>
                    </div>
                    <!--Informacion general-->
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="tipoActivo">Tipo de activo</label>
                            <input class="form-control" id="tipoActivo" type="text" value="Equipo" readonly>
                        </div>
                    </div>
                    <!---->
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="estatus">Estatus</label>
                            <select class="form-control" id="estatus" name="estatus">
                                <?php // TODO ESTA LINEA DE CODIGO SOLO ES PARA TRAER LOS DATOS DE MIS TABLAS CON LA LLAVE FORANEA
                                    $get_estatus= "SELECT * FROM estatus";
                                    $consulta = $db -> Db_query($get_estatus);
                                    while($fila=$consulta->fetch_array()){ //recorre el arreglo
                                        echo "<option value ='".$fila['id_estatus']."'>".$fila['nombre_estatus']."</option>"; //muestra los datos de la tabla externa
                                    }
                                ?>
                                <option value="">No especificado</option>
                            </select>
                        </div>
                    </div>
                    <!---->
                    <div class="form-row">
                        <!--Informacion de ubicacion-->
                        <div class="form-group col-md-12">
                            <label for="tipoUbicacion">Ubicación</label> <!--Tipo/Nobre ubicacion-->
                            <select class="form-control" id="tipoUbicacion" name="tipoUbicacion" >
                            <?php // TODO ESTA LINEA DE CODIGO SOLO ES PARA TRAER LOS DATOS DE MIS TABLAS CON LA LLAVE FORANEA
                                $get_ubicaciones = "SELECT * FROM ubicaciones";
                                $consulta = $db -> Db_query($get_ubicaciones);
                                while($fila=$consulta->fetch_array()){ //recorre el arreglo
                                    echo "<option value ='".$fila['id_ubicacion']."'>".$fila['tipo_ubicacion']." ".$fila['nombre_ubicacion']."</option>"; //muestra los datos de la tabla externa
                                }
                            ?>
                            <option value="">No especificado</option>
                            </select>
                        </div>
                    </div>
                    
                    
                    <!--QR-->
                    <div class="form-row oculto">
                        <div class="form-group ">
                            <!--<input id="archivoCodigoQR" type="file" class="form-control-file"  name="archivoCodigoQR" >-->
                            <div class="content-codigo-qr">
                            </div>
                        </div>
                        <!--Auxiliar oculto para guadar QR base64-->
                        <textarea class="form-control" id="archivoQR" name="archivoQR" rows="1"></textarea>
                    </div>
                    <!--QR imagen jpg--> 
                    <div class="form-row oculto">
                        <div class="form-group">
                            <div class="content-codigo-qr-img">
                                <!---Desplegar imagen de QR-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
            </div>
            
            <div class="form-row center">
                <button type="submit" class="btn btn-lg registro-btn" href="" >Registrar Activo</button>
            </div>
        </form>

        <!--Codigo QR del activo (tamaño de la imagen)-->
        <div class="row">
            <div class="col-12">
                <div class="form-row">
                    <!--Elegir tamaño de QR-->
                    <div class="form-group oculto" >
                        <div class="container">
                            <form method="post" id="generador" action="">
                                <div class="form-group">
                                    <label for="textqr">Tamaño</label>
                                    <select class='form-control' id='sizeqr'>
                                        <option value='100'>100 px</option>
                                        <option value='200'>200 px</option>
                                        <option value='300' selected>300 px</option>
                                        <option value='400'>400 px</option>
                                        <option value='500'>500 px</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        


        <!--<button type="button" id="btnDownload" class="btn btn btn-primary" href="" >Descargar</button>
                            -->
    </div>
</div>





