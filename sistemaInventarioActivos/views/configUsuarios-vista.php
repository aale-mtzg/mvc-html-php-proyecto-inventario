
<!--CSS-->
<link href="./assets/css/configUsuarios-vista-styles.css" rel="stylesheet" type="text/css">

<?php

include('./models/principalModelo.php');

$db = new principalModelo();

?>

<div class="container">
    <!---->
    <div class="row " >
        <div class="col-lg-12">
            <H1>Usuarios del sistema</H1>
        </div>
    </div>
    <div class="row btn-nuevoUsuario" >
        <div class="col-lg-12">
            <button  type="submit" class="btn btn-nuevoUsuario" data-toggle="modal" data-target="#modal-nuevoUsuario">
                Registrar nuevo usuario
                <i class="fas fa-user-plus"></i>
            </button>
        </div>
    </div>
    <!--Tabla de usuarios registrados-->
    <div class="row" id="tabla-de-usuarios">
        <div class="col-lg-12">
            <table id="example" class="table table-striped table-bordered tabla-usuarios" >
                <thead>
                    <tr>
                       <!--<th scope="col">ID</th>-->
                        <th scope="col">Rol</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido Paterno</th>
                        <th scope="col">Apellido Materno</th>
                        <th scope="col">Nombre de Usuario</th>
                        <th scope="col">Correo</th>
                        <th scope="col">...</th>
                    </tr>
                </thead>
                    <?php 
                    $conexion = $db -> connect();
                    
                    $select = "SELECT usuarios.*, rol.rol FROM usuarios INNER JOIN rol ON usuarios.idX_rol = rol.id_rol";
                    //$usuario = mysqli_query($conexion, $select);
                    $usuario = $db -> Db_query($select);
                    while ($getFila = mysqli_fetch_array($usuario)) { 
                        $datos = $getFila[0].'||'. //ID
                                $getFila[8]."||". //rol
                                $getFila[2]."||". //nombre
                                $getFila[3]."||". //ap
                                $getFila[4]."||". //am
                                $getFila[5]."||".
                                $getFila[6]."||". //pass
                                $getFila[7];
                    ?>
                <tbody> 
                    <tr>
                    <th scope="row"> <?php echo $getFila[8] ?> </th> <!-- rol--> 
                        <th><?php echo $getFila[2] ?></th> <!--nom-->
                        <td><?php echo $getFila[3] ?></td> <!--ap-->
                        <td><?php echo $getFila[4] ?></td> <!--am-->
                        <td><?php echo $getFila[5] ?></td> <!--nomUser-->
                        <td><?php echo $getFila[7] ?></td> <!--correo-->
                        
                        <!--botones--> 
                        <td>
                            <!--Movimintos-->
                            <button type="button" href="" class="btn btn-outline-primary acciones-btn" data-toggle="modal" data-target="#modal-movimientosUsuario">
                                <!--Movimientos--><i class="far fa-folder-open"></i>
                            </button>
                            <!--Editar-->
                            <button href="" type="button"  id="ver_modal" class="btn btn-outline-secondary acciones-btn " data-toggle="modal" data-target="#modal-editarUsuario" onclick="llenarModal_actualizar('<?php echo $datos ?>');">
                                <i class="far fa-edit"></i>
                            </button>
                            <!--Eliminar-->
                            <button href="" type="button" class="btn btn-outline-danger acciones-btn" data-toggle="modal" data-target=<?php echo "#modal-eliminarUsuario" . $getFila[0]; ?>>
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
                <!--Eliminar Usuario-->       
                <div class="modal fade" id=<?php echo "modal-eliminarUsuario" . $getFila[0]; ?> tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="div">
                                        ¿Esta seguro que desea eliminar el usuario del registro?
                                    </div>
                                    <div class="modal-btns-acciones">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <a id="btn-eliminar"  href="eliminarUsuarios.php?id=<?php echo $getFila[0]; ?>" class="btn btn-danger">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               <?php } ?>
            </table>
            <!--Variable auxiliar para mostrar alerta "Usuario Eliminado"-->
            <?php if (isset($_GET['eliminar'])) : ?>
                <div class="flash-data" data-flashdata="<?= $_GET['eliminar']; ?>"></div>
            <?php endif; ?>
            <!--Variable auxiliar para mostrar alerta "Usuario Registrado"-->
            <?php if (isset($_GET['registro'])) : ?>
                <div class="flash-data-r" data-flashdata="<?= $_GET['registro']; ?>"></div>
            <?php endif; ?>
            
        </div>
    </div>
                        
    
    
</div>