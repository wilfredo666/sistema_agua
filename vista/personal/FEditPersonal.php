<?php
require "../../controlador/personalControlador.php";
require "../../modelo/personalModelo.php";

$id = $_GET["id"];
$personal = ControladorPersonal::ctrInfoPersonal($id);

$nombre = preg_replace('/\s+/', '_', $personal["nombre_personal"]) ;

$nombresPersonal =  $nombre . "" . $personal["ap_pat_personal"];
?>

<div class="modal-header encabezado">
  <h4 class="modal-title font-weight-light">Editar datos del Personal</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="" id="FormEditPersonal">
    <div class="modal-body">

        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" class="form-control" id="nomPersonal" name="nomPersonal" value="<?php echo $personal["nombre_personal"] ?>">
            <input type="hidden" id="idPersonal" name="idPersonal" value="<?php echo $personal["id_personal"] ?>">
            <!-- <p id="error-login"></p> -->
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Apellido Paterno</label>
                    <input type="text" class="form-control" id="patPersonal" name="patPersonal" value="<?php echo $personal["ap_pat_personal"] ?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Apellido Materno</label>
                    <input type="text" class="form-control" id="matPersonal" name="matPersonal" value="<?php echo $personal["ap_mat_personal"] ?>">
                    <!-- <p class="text-danger" id="error-pass"></p> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Carnet de identidad</label>
                    <input type="text" class="form-control" id="ciPersonal" name="ciPersonal" value="<?php echo $personal["ci_personal"] ?>">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Telefono(s)</label>
                    <input type="text" class="form-control" id="telPersonal" name="telPersonal" value="<?php echo $personal["telefono_personal"] ?>">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Teléfono de referencia</label>
                    <input type="text" class="form-control" id="contactoReferencia" name="contactoReferencia" value="<?php echo $personal["contacto_referencia"] ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Cargo</label>
                    <select name="cargoPersonal" id="cargoPersonal" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="Secretaria" <?php if ($personal["cargo_personal"] == "Secretaria") : ?>selected <?php endif; ?>>Secretaria</option>
                        <option value="Chofer" <?php if ($personal["cargo_personal"] == "Chofer") : ?>selected <?php endif; ?>>Chofer</option>
                        <option value="Administracion" <?php if ($personal["cargo_personal"] == "Administracion") : ?>selected <?php endif; ?>>Administracion</option>
                        <option value="Planta" <?php if ($personal["cargo_personal"] == "Planta") : ?>selected <?php endif; ?>>Planta</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="fechaNacPersonal" name="fechaNacPersonal" value="<?php echo $personal["fecha_nac_personal"] ?>">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Fecha de ingreso</label>
                    <input type="date" class="form-control" id="fechaIngPersonal" name="fechaIngPersonal" value="<?php echo $personal["fecha_ingreso"] ?>">
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Estado</label>
                    <select name="estadoPersonal" id="estadoPersonal" class="form-control">
                        <option value="1" <?php if ($personal["estado_personal"] == "1") : ?>selected<?php endif; ?>>Activo</option>
                        <option value="0" <?php if ($personal["estado_personal"] == "0") : ?>selected<?php endif; ?>>Inactivo</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group text-center justify-content-center align-items-center">
                <label for="">Adjuntar archivos</label>
                <button type="button" class="btn  bg-gradient-success btn-sm mb-2" style="width: 80%;" onclick="MSubirArchivos('<?php echo $nombresPersonal ?>')">
                    <i class="fas fa-upload"></i> Subir archivos
                </button>
            </div> 

        </div>
        <div class="col-sm-4"></div>
    </div>

    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="guardar">Actualizar</button>
    </div>
</form>

<script>
    $(function() {
        $.validator.setDefaults({
            submitHandler: function() {
                EditPersonal()
            }
        })
        $(document).ready(function() {
            $("#FormEditPersonal").validate({
                rules: {
                    nomPersonal: {
                        required: true,
                        minlength: 3
                    },
                    patPersonal: {
                        required: true,
                        minlength: 3
                    },
                    matPersonal: {
                        required: true,
                        minlength: 3
                    },
                    ciPersonal: {
                        required: true,
                        minlength: 3
                    },
                    telPersonal: {
                        minlength: 3
                    },
                    contactoReferencia: {
                        minlength: 3
                    },
                    cargoPersonal: "required"

                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback')
                    element.closest('.form-group').append(error)
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid')
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid')
                }
            })
        })

    })

    $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
</script>