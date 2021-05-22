
<!--CSS-->
<link href="./assets/css/inventario-vista-styles.css" rel="stylesheet" type="text/css">

 

<?php

include('./models/principalModelo.php');

$db = new principalModelo();

?>

<div class="container">
    <h1>Inventario</h1>  
<!--Tabla de activos registrados-->
    <div class="row">
        <div class="col-lg-12 ">
            <table id="example" class="table table-striped table-bordered tabla-inventario" style="width:100%">
                <thead>
                    <tr>
                        <th id="col-numSerial">No.Serial</th>
                        <th>No. Serial Disp</th>
                        <th>No. Serial TecNM</th>
                        <th>Estatus</th>
                        <th>Tipo Activo</th>
                        <th>Ubicacion</th>
                        <th>Nombre</th>
                        <th>...</th>
                        			
                    </tr>
                </thead>
                    <?php 
                        
                        $conexion = $db -> connect();
                    
                        $select = "SELECT activos.*, ubicaciones.nombre_ubicacion,estatus.nombre_estatus 
                        FROM activos 
                        INNER JOIN ubicaciones ON activos.idx_ubicacion = ubicaciones.id_ubicacion
                        INNER JOIN estatus ON activos.idx_estatus = estatus.id_estatus";
                        $activo = $db -> Db_query($select);
                        while ($getresultado = mysqli_fetch_array($activo)) { 
                            $datos = $getresultado[3].'||'.
                                $getresultado[4]."||".
                                $getresultado[5]."||".
                                $getresultado[17]."||".
                                $getresultado[6]."||".
                                $getresultado[16]."||".
                                $getresultado[7]."||";                   
                    ?>                    
                <tbody>
   <tr>
   	<th scope="row"> <?php echo $getresultado[3] ?> </th> <!--serial-->
                            <td><?php echo $getresultado[4] ?></td> <!--serial Dispo-->
   	<td><?php echo $getresultado[5] ?></td> <!--serial tec-->
   	<td><?php echo $getresultado[17] ?></td> <!--estatus-->
                            <td><?php echo $getresultado[6] ?></td> <!--tipo activo-->
   	<td><?php echo $getresultado[16] ?></td> <!--ubicacion-->
                            <td><?php echo $getresultado[7] ?></td> <!--nombre-->
                            <td>
                                <!--Boton de accion Editar(Modal)-->
                                <button type="button" id="" class="btn btn-outline-secondary acciones-btn" data-toggle="modal" data-target="#modal-editarActivo">
                                    Editar<i class="far fa-edit"></i>
                                </button>
                                <!-- Boton de accion Eliminar(Modal)-->
                                <button type="button" class="btn btn-outline-danger acciones-btn" data-toggle="modal" data-target="#modal-eliminarActivo">
                                    Eliminar <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                           
                            
                            <!--
                            <td><?php echo $getresultado['fecha_alta'] ?></td>
   	<td><?php echo $getresultado['marca'] ?></td>
   	<td><?php echo $getresultado['modelo'] ?></td>
   	<td><?php echo $getresultado['color'] ?></td>
   	<td><?php echo $getresultado['descripcion_activo'] ?></td>
   	<td>
   		<img src="data/:image/jpeg:base64, <?php echo base64_encode($getresultado['imagen_activo']) ?>">
   	</td>
   	<td>
                            	<img src="data/:image/jpeg:base64, <?php echo base64_encode($getresultado['imagen_codigo_qr']) ?>">
                            </td>
                            
   	
   	<td>
   		<a href="modificarActivo.php?idx_numeroSerial=<?= $getresultado['idx_numeroSerial'] ?>" class="btn btn-outline-info">Modificar</a>
   	</td>
                            -->
   </tr>
  <?php } ?>
                </tbody>
            </table> 
            
            <!-- Modal Editar datos de Activos-->
            <div class="modal fade" id="modal-editarActivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Editar Informacion de Activo</h5>
        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            Traer formulario segun el tipo de activo que sea para poder mostrar la informacion
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success">Guardar</button>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Modal Eliminar datos de Activos-->
            <div class="modal fade" id="modal-eliminarActivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Activo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            Verificar el tipo de activo que se quiere eliminar para agregar condicion!
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger">Eliminar</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>