<!--CSS-->
<link href="./assets/css/cambioUbicacion-vista-styles.css" rel="stylesheet" type="text/css">

<?php

include('./models/principalModelo.php');

$db = new principalModelo();

?>

<div class="container">
    <!---->
    <h1>Cambio de Ubicación</h1>
    <div class="row">
        <h2>Seleccionar Activo</h2>
    </div>
    <div class="row">
        <form class="" action="procesarMovimiento.php" method="POST">
            <div class="form-row">
                <div class="form-group mr-2">
                    <input type="text" class="form-control" id="" name="lista[]" placeholder="Ingresar No. Serial...">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-danger buscar-btn" >
                        Aceptar
                        <i class="fas fa-check"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!--Tabla de usuarios registrados-->
    <div class="row " id="tabla-de-activos">
        <div class="col-lg-12">
            <table id="example" class="table table-striped table-bordered tabla-activos" >
                <thead class="">
                    <tr>
                       <!--<th scope="col">ID</th>-->
                        <th scope="col">No. Serial</th>
                        <th scope="col">No. Serial Disp</th>
                        <th scope="col">No. TecNM</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Esatus</th>
                        <th scope="col">Ubicacion Actual</th>
                    </tr>
                </thead>
                    
                <tbody> 
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
                
            </table>
            
        </div>
    </div>
    <div class="row mt-3">
        <!--Boton para seleccionar nueva ubicacion-->
        <button href="" type="button"  id="ver_modal" class="btn btn-outline-secondary " data-toggle="modal" data-target="#modal-nuevaUbicacion" onclick="">
            Seleccionar nueva ubicación
        </button>
        
    </div>

    <!-- Modal: Seleccionar nueva ubicacion-->
        <div class="modal fade" id="modal-nuevaUbicacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <H2 class="modal-title" id="exampleModalLongTitle">Nueva Ubicación</H2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form>
                                
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
                                <div class="modal-btns-acciones">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" href="" value="" name="action" id="" class="btn btn-success">Aceptar</button>
                                
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>