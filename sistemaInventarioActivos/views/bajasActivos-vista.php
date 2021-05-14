<!--CSS-->
<link href="./assets/css/bajasActivos-vista-styles.css" rel="stylesheet" type="text/css">

<?php

    include('./models/principalModelo.php');

    $db = new principalModelo();

?>

<!--Contenido VISTA INICIO-->
<div class="container">
    <!---->
    <div class="row " >
        <div class="col-lg-12">
            <h1>Baja de Activos</h1>
        </div>
    </div>
    <div class="row mb-3" id="btn-bajaActivo">
        <div class="col-lg-12">
            <button  type="button" class="btn btn-danger " onClick="mostrarSeleccionActivos()">
                Dar de baja activo
                <i class="fas fa-trash-alt"></i>
            </button>
        </div>
    </div>
    
    <!--Tabla-->
    <div class="row mb-3" id="tabla-bajas">
        <div class="col-lg-12">
            <table id="example" class="table table-striped table-bordered tabla-activos" >
                <thead class="">
                    <tr>
                       <!--<th scope="col">ID</th>-->
                        <th scope="col">ID de Baja</th>
                        <th scope="col">No. Serial</th>
                        <th>No. Serial Disp</th>
                        <th>No. Serial TecNM</th>
                        
                        <th>Tipo Activo</th>
                        
                        <th>Nombre</th>
                        <th scope="col">Fecha de Baja</th>
                        
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
            <button href="" type="button"  id="ver_modal" class="btn btn-outline-secondary " data-toggle="modal" data-target="#modal-confirmacion" onclick="">
                Baja de activos
            </button>
        </div>
    </div>
    <!--Eliminar Usuario-->       
    <div class="modal fade" id= "modal-confirmacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Baja de Activos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="div">
                            ¿Esta seguro que desea dar de baja estos activos del inventario?
                        </div>
                        <div class="modal-btns-acciones">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <a id="btn-eliminar"  href="" class="btn btn-danger">Aceptar</a>
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
        document.getElementById("btn-bajaActivo").style.display = "none";
        document.getElementById("tabla-bajas").style.display = "none";
    }
</script>