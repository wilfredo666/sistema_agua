<?php
require "../../controlador/personalControlador.php";
require "../../modelo/personalModelo.php";

$id = $_GET["id"];
$personal = ControladorPersonal::ctrInfoPersonal($id);

$nombresPersonal =  $personal["nombre_personal"] . "" . $personal["ap_pat_personal"];

?>
<div class="modal-header encabezado">
  <h4 class="modal-title font-weight-light">Información del Personal</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-6">
            <table class="table">
                <tr>
                    <th>#ID</th>
                    <td><?php echo $personal["id_personal"]; ?></td>
                </tr>

                <tr>
                    <th>Nombre</th>
                    <td><?php echo $personal["nombre_personal"]; ?></td>
                </tr>

                <tr>
                    <th>Apellidos</th>
                    <td><?php echo $personal["ap_pat_personal"] . " " . $personal["ap_mat_personal"]; ?></td>
                </tr>

                <tr>
                    <th>C.I.</th>
                    <td><?php echo $personal["ci_personal"]; ?></td>
                </tr>
                <tr>
                    <th>Cargo</th>
                    <td><?php echo $personal["cargo_personal"]; ?></td>
                </tr>
                <tr>
                    <th>Fecha Nacimiento</th>
                    <td><?php echo $personal["fecha_nac_personal"]; ?></td>
                </tr>
                <tr>
                    <th>Teléfono</th>
                    <td><?php echo $personal["telefono_personal"]; ?></td>
                </tr>
                <tr>
                    <th>Contácto de Referencia</th>
                    <td><?php echo $personal["contacto_referencia"]; ?></td>
                </tr>
                <tr>
                    <th>Fecha Ingreso</th>
                    <td><?php echo $personal["fecha_ingreso"]; ?></td>
                </tr>

                <tr>
                    <th>Estado</th>
                    <?php
                    if ($personal["estado_personal"] == 1) {
                    ?>
                        <td><span class="badge badge-success">Activo</span></td>
                    <?php
                    } else {
                    ?>
                        <td><span class="badge badge-danger">Inactivo</span></td>
                    <?php
                    }
                    ?>
                </tr>

            </table>
            <div class="form-group text-center justify-content-center align-items-center">
                <!-- <label for="">Adjuntar archivos</label>
                <button class="btn  bg-gradient-success btn-sm mb-2" style="width: 80%;" onclick="MSubirArchivos('<?php echo $nombresPersonal ?>')">
                    <i class="fas fa-upload"></i> Subir archivos
                </button> -->
                <a href="http://localhost/sistema_agua/vista/personal/MostrarArchivos.php?nombre=<?php echo $nombresPersonal ?>" class="btn bg-gradient-info btn-sm " target="_blank" style="width: 80%;">
                    <i class="far fa-copy"> </i> Visualizar archivos
                </a>
            </div>
        </div>
        <div class="col-sm-6 text-center">
            <label for="">Ubicación</label> <br>
        </div>
    </div>

</div>