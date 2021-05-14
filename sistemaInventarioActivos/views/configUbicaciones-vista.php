
<!--CSS-->
<link href="./assets/css/configUbicaciones-vista-styles.css" rel="stylesheet" type="text/css">

<?php

include('./models/principalModelo.php');

$db = new principalModelo();

$conexion = $db -> connect();
$select = "SELECT * FROM ubicaciones";
$ubicacion = $db-> Db_query($select);

?>

<div class="container">
    <!---->
    <div class="row " >
        <div class="col-lg-12">
            <H1>Ubicaciones del sistema</H1>
            <div id="ok" class="alert alert-success ocultar" role="alert">
                Registro exitoso!
            </div>
        </div>
    </div>
    <div class="row btn-nuevoUsuario" >
        <div class="col-lg-12">
            <button  type="submit" class="btn btn-nuevoUsuario" data-toggle="modal" data-target="#modal-nuevaUbicacion">
                Registrar nueva ubicación
                <i class="fas fa-user-plus"></i>
            </button>
        </div>
    </div>
    <!--Tabla de usuarios registrados-->
    <div class="row" id="tabla-de-usuarios">
        <div class="col-lg-12">
            <table id="example" class="table table-striped table-bordered tabla-usuarios" style="width:100%">
                <thead>
                    <tr>
                        <th>Tipo de Ubicación</th>
                        <th>Nombre</thscope=>
                        <th>Nombre del Edificio</th>
                        <th>Descripcion</th>
                        <th id="col-capacidad">Capacidad de la Ubicación</th>
                        <th>...</th>
                        </tr>
                </thead>
                <tbody>
                    <?php while ($getresultado = $ubicacion->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $getresultado['tipo_ubicacion'] ?></td>
                            <td><?php echo $getresultado['nombre_ubicacion'] ?></td>
                            <td><?php echo $getresultado['nombre_edificio'] ?></td>
                            <td><?php echo $getresultado['descripcion_ubicacion'] ?></td>
                            <td><?php echo $getresultado['capacidad'] ?></td>
                            
                            <!--botones--> 
                            <td>
                                
                                <a href="" class="btn btn-outline-secondary acciones-btn" data-toggle="modal" data-target="#modal-editarUbicacion">
                                    <!--Editar--><i class="far fa-edit"></i>
                                </a>
                                <a href="" class="btn btn-outline-danger acciones-btn" data-toggle="modal" data-target="#modal-eliminarUsuario">
                                    <!--Eliminar--><i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                            
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--Variable auxiliar para mostrar alerta "Usuario Registrado"-->
    <?php if (isset($_GET['registro'])) : ?>
        <div class="flash-data-r" data-flashdata="<?= $_GET['registro']; ?>"></div>
    <?php endif; ?>
    <!-- Modal: Registro de nueva ubicacion-->
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
                        
                        
                        <form id="formulario-nuevaUbicacion" action="validarRegistroUbicaciones.php" method="POST">
                            <div class="form-row ">
                                <div class="form-group col-md-5">
                                    <label for="tipoUbicacion">Tipo de Ubicacion</label>
                                    <select class="form-control" id="tipoUbicacion" name="tipoUbicacion">
                                        <option value="Sala">Sala</option>
                                        <option value="Bodega">Bodega</option>
                                        <option value="Oficina">Oficina</option>
                                        <option value="No especificada">No especificado</option>
                                    </select>
                                </div>
                                <!--Agregar nuevo tipo de ubicacion-->    
                                <div class="form-group col-md-5">
                                    <label for="nuevoTipoUbicacion">Nuevo tipo</label>
                                    <input type="text" class="form-control" id="nuevoTipoUbicacion" name="nuevoTipoUbicacion">
                                </div>
                                <div class="form-group col-md-1 ">
                                    <a class="btn btn-outline-success" id="nuevaUb-btn" href="#" role="button"onclick="insertValue();">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>      
                                    
                            </div>
                            <div class="form-row ">
                                <div class="form-group col-12">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>  
                                
                            </div>
                            <div class="form-row ">
                                <div class="form-group col-12">
                                    <label for="aMaterno">Edificio</label>
                                    <input type="text" class="form-control" id="edificio" name="edificio" required >    
                                </div>  
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="descripcion">Descripcion de la ubicación</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="form-row ">
                                <div class="form-group col-md-2">
                                    <label for="capacidad">Capacidad</label>
                                    <input type="number" class="form-control" id="capacidad" name="capacidad" value="1" min="1" required>    
                                </div> 
                                
                            </div>
                            <div class="modal-btns-acciones">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" id="registrar" class="btn btn-success">Registrar</button>
                            <!--<button  type="btn" class="btn-success" onclick="Ocultar()"  >Ocultar</button>-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal: Registro editar ubicacion-->
    <div class="modal fade" id="modal-editarUbicacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <H2 class="modal-title" id="exampleModalLongTitle">Ubicación</H2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        
                        <form id="formulario-nuevaUbicacion" action="validarRegistroUbicaciones.php" method="POST">
                            <div class="form-row ">
                                <div class="form-group col-md-5">
                                    <label for="tipoUbicacion">Tipo de Ubicacion</label>
                                    <select class="form-control" id="tipoUbicacion" name="tipoUbicacion">
                                        <?php // TODO ESTA LINEA DE CODIGO SOLO ES PARA TRAER LOS DATOS DE MIS TABLAS CON LA LLAVE FORANEA
                                            $get_ubicaciones = "SELECT * FROM ubicaciones";
                                            $consulta = $db -> Db_query($get_ubicaciones);
                                            while($fila=$consulta->fetch_array()){ //recorre el arreglo
                                                echo "<option value ='".$fila['id_ubicacion']."'>".$fila['tipo_ubicacion']."</option>"; //muestra los datos de la tabla externa
                                            }
                                        ?>
                                        <option value="">No especificado</option>
                                    </select>
                                </div>
                                <!--Agregar nuevo tipo de ubicacion-->    
                                <div class="form-group col-md-5">
                                    <label for="nuevoTipoUbicacion">Nuevo tipo</label>
                                    <input type="text" class="form-control" id="nuevoTipoUbicacion" name="nuevoTipoUbicacion" required>
                                </div>
                                <div class="form-group col-md-1 ">
                                    <a class="btn btn-outline-success" id="nuevaUb-btn" href="#" role="button"onclick="insertValue();">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>      
                                    
                            </div>
                            <div class="form-row ">
                                <div class="form-group col-12">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required >
                                </div>  
                                
                            </div>
                            <div class="form-row ">
                                <div class="form-group col-12">
                                    <label for="aMaterno">Edificio</label>
                                    <input type="text" class="form-control" id="edificio" name="edificio" required>    
                                </div>  
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="descripcion">Descripcion de la ubicación</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="form-row ">
                                <div class="form-group col-md-2">
                                    <label for="capacidad">Capacidad</label>
                                    <input type="number" class="form-control" id="capacidad" name="capacidad" value="1" min="1" required>    
                                </div> 
                                
                            </div>
                            <div class="modal-btns-acciones">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" id="registrar" class="btn btn-success">Registrar</button>
                            <!--<button  type="btn" class="btn-success" onclick="Ocultar()"  >Ocultar</button>-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    
    <!--Eliminar Ubicacion-->       
    <div class="modal fade" id="modal-eliminarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Ubicacion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="div">
                            ¿Esta seguro que desea eliminar la ubicacion del registro?
                        </div>
                        <div class="modal-btns-acciones">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <a href="eliminarUsuario.php?id_usuario=<?= $getresultado['id_usuario'] ?>" class="btn btn-danger">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>