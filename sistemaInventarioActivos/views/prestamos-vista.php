<!--CSS-->
<link href="./assets/css/prestamos-vista-styles.css" rel="stylesheet" type="text/css">


<?php

include('./models/principalModelo.php');

$db = new principalModelo();

$conexion = $db -> connect();
    $select = "SELECT * FROM ubicaciones";
    $ubicacion = $db-> Db_query($select);

?>


<div class="container">
    <!---->
    <h1>Prestamo de Activos</h1>
    <div class="row mb-3" id="btn-nuevoPrestamo">
        <div class="col-lg-12">
            <button  type="button" class="btn btn-danger " onClick="mostrarSeleccionActivos()">
                Registrar nuevo prestamo
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>
    
    <!--Tabla-->
    <div class="row mb-3" id="tabla-prestamos">
        <div class="col-lg-12">
            <table id="example" class="table table-striped table-bordered tabla-activos" >
                <thead class="">
                    <tr>
                       <!--<th scope="col">ID</th>-->
                        <th scope="col">ID de prestamo</th>
                        <th scope="col">Lista de activos</th>
                        <th scope="col">Fecha de Prestamo</th>
                        <th scope="col">Fecha de Devolucion</th>
                        <th scope="col">...</th>
                        
                    </tr>
                </thead>
                <tbody> 
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                        <td>
                            <!--Boton de devolucion-->
                            <button type="button" href="" class="btn btn-outline-primary acciones-btn" data-toggle="modal" data-target="#modal-devolucion">
                                <i class="fas fa-people-carry"></i>
                                Devolución
                            </button>
                            
                        </td>
                    </tr>
                </tbody>
                
            </table>
        </div>
    </div>
    
    <!-- Modal: Devolución de prestamos-->
    <div class="modal fade" id="modal-devolucion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <H2 class="modal-title" id="exampleModalLongTitle">Devolución</H2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="container">
                            <form>
                                <div class="form-row ">
                                    <div class="form-group col-12">
                                        <label for="fechaAlta">Fecha de devolución</label>
                                            <input type="date" class="form-control" id="fechaPrestamo" name="fechaPrestamo" value="<?php echo date("Y-m-d");?>">
                                    </div>  
                                </div>
                                <div class="form-row ">
                                    <div class="form-group col-12">
                                        <label for="aMaterno">Activos:</label>
                                        <P>Listar activos que se prestaron...</P>
                                    </div>  
                                </div>
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

    <div class="row" id="seleccionar-activo">
        <div class="col-lg-12">
            <h2>Seleccionar Activo</h2>
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
    </div>

    <!--Tabla de activos seleccionados-->
    <div class="row " id="tabla-activos">
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
            <!--Boton registro de prestamo-->
            <button href="" type="button"  id="ver_modal" class="btn btn-outline-secondary " data-toggle="modal" data-target="#modal-prestamo" onclick="">
                Registrar Prestamo
            </button>

            <!-- Modal: Formulario de prestamo-->
            <div class="modal fade" id="modal-prestamo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <H2 class="modal-title" id="exampleModalLongTitle">Prestamo</H2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <form>
                                    <div class="form-row ">
                                        <div class="form-group col-md-2">
                                            <label for="capacidad">Unidades</label>
                                            <input type="number" class="form-control" id="unidades" name="unidades" value="1" min="1" required>    
                                        </div> 
                                    </div>
                                    <div class="form-row ">
                                        <div class="form-group col-12">
                                            <label for="aMaterno">Nombre del departamento</label>
                                            <input type="text" class="form-control" id="departamento" name="departamento" required >    
                                        </div>  
                                    </div>
                                    <div class="form-row ">
                                        <div class="form-group col-12">
                                            <label for="fechaAlta">Fecha de prestamo</label>
                                                <input type="date" class="form-control" id="fechaPrestamo" name="fechaPrestamo" value="<?php echo date("Y-m-d");?>">
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
    </div>
</div>



<script type="text/javascript">
    function mostrarSeleccionActivos(){
        document.getElementById("seleccionar-activo").style.display = "block";
        document.getElementById("tabla-activos").style.display = "block";
        document.getElementById("btn-nuevoPrestamo").style.display = "none";
        document.getElementById("tabla-prestamos").style.display = "none";
    }
</script>

