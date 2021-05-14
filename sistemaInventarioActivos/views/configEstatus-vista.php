<!--CSS-->
<link href="./assets/css/configEstatus-vista-styles.css" rel="stylesheet" type="text/css">

<?php

include('./models/principalModelo.php');

$db = new principalModelo();

$conexion = $db -> connect();
$select = "SELECT * FROM estatus";
$estatus = $db-> Db_query($select);

?>

<div class="container">
    <!---->
    <div class="row " >
        <div class="col-lg-12">
            <H1>Estatus</H1>
            <div id="ok" class="alert alert-success ocultar" role="alert">
                Registro exitoso!
            </div>
        </div>
    </div>
    <div class="row btn-nuevoUsuario" >
        <div class="col-lg-12">
            <button  type="submit" class="btn btn-nuevoUsuario" data-toggle="modal" data-target="#modal-nuevoEstatus">
                Registrar nuevo estatus
                <i class="fas fa-check-double"></i>
            </button>
        </div>
    </div>
    <!--Tabla de usuarios registrados-->
    <div class="row" id="tabla-de-estatus">
        <div class="col-lg-12">
            <table id="example" class="table table-striped table-bordered tabla-usuarios" style="width:100%">
                <thead>
                    <tr>
                        <th>Estatus</th>
                        <th>...</th>
                        </tr>
                </thead>
                <tbody>
                    <?php while ($getresultado = $estatus->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $getresultado['nombre_estatus'] ?></td>
                            <!--botones--> 
                            <td>
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
    <!-- Modal: Registro de nueva ubicacion-->
    <div class="modal fade" id="modal-nuevoEstatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <H2 class="modal-title" id="exampleModalLongTitle">Nuevo Estatus</H2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form id="formulario-nuevoEstatus" action="" method="POST">
                            <div class="form-row ">
                                <div class="form-group col-12">
                                    <label for="estatus">Estatus</label>
                                    <input type="text" class="form-control" id="estatus" name="estatus" required>    
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
    <div class="modal fade" id="modal-eliminarEstatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Estatus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="div">
                            ¿Esta seguro que desea eliminar este estatus del registro?
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
