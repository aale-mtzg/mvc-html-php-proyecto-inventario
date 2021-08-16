
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
                    
                <tbody> 
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
                    <?php } ?>
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

<!-- Modal: Registro de nuevo usuario-->
<div class="modal fade" id="modal-nuevoUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <H2 class="modal-title" id="exampleModalLongTitle">Nuevo usuario</H2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div id="msg"></div>
                            <!-- Mensajes de Verificación -->
                            <div id="error" class="alert alert-danger ocultar" role="alert">
                                Las Contraseñas no coinciden, vuelve a intentar!
                            </div>
                           
                            <!-- Fin Mensajes de Verificación -->


                            <!--FORMULARIO: REGISTRO DE NUEVO USUARIO-->
                            <form id="formulario-nuevoUsuario" class="FormularioAjax" action="<?php echo BASE_URL; ?>ajax/usuariosAjax.php" method="POST" data-form="save" autocomplete="off">
                                <div class="form-row ">
                                    <div class="form-group col-md-6">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" >
                                    </div>      
                                </div>
                                <div class="form-row ">
                                    <div class="form-group col-md-6">
                                        <label for="aMaterno">Apellido paterno</label>
                                    <input type="text" class="form-control" id="aPaterno" name="aPaterno" >    
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="aPaterno">Apellido materno</label>
                                        <input type="text" class="form-control" id="aMaterno" name="aMaterno" >    
                                    </div>     
                                         
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 ">
                                        <label for="rol">Rol</label>
                                        <select class="form-control" id="rol" name="rol">
                                            <?php // TODO ESTA LINEA DE CODIGO SOLO ES PARA TRAER LOS DATOS DE MIS TABLAS CON LA LLAVE FORANEA
                                                $get_roles = "SELECT * FROM rol";
                                                $consulta = $db -> Db_query($get_roles);
                                                while($fila=$consulta->fetch_array()){ //recorre el arreglo
                                                    echo "<option value ='".$fila['id_rol']."'>".$fila['rol']."</option>"; //muestra los datos de la tabla externa
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nombreUsuario">Nombre de usuario</label>
                                        <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label for="correo">Correo electronico</label>
                                        <input type="email" class="form-control" id="correo" name="correo" aria-describedby="emailHelp" >      
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="contrasena">Contraseña</label>
                                        <input type="password" class="form-control"  name="contraseña" id="contraseña" >      
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="confirmarContrasena">Confirmar contraseña</label>
                                        <input type="password" class="form-control" name="confirmaContraseña" id="confirmaContraseña" required>      
                                    </div>
                                </div>
                                
                                <div class="modal-btns-acciones">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" id="btn-registrar-usuario" class="btn btn-success">Registrar</button>
                                <!--<button  type="btn" class="btn-success" onclick="Ocultar()"  >Ocultar</button>-->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</div>