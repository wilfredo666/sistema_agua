<?php
require "../../controlador/personalControlador.php";
require "../../modelo/personalModelo.php";

$id = $_GET["id"];
$personal = ControladorPersonal::ctrInfoPersonal($id);

?>
<div class="modal-header">
    <h4 class="modal-title">Información del personal</h4>
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
        </div>
        <div class="col-sm-6 text-center">
            <label for="">Ubicación</label> <br>
        </div>
    </div>

</div>