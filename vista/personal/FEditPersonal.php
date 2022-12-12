<?php
require "../../controlador/personalControlador.php";
require "../../modelo/personalModelo.php";

$id = $_GET["id"];
$personal = ControladorPersonal::ctrInfoPersonal($id);
?>

<div class="modal-header">
    <h4 class="modal-title">Editar datos personal</h4>
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
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Ubicación</label>
                </div>
            </div>
            <div class="col-sm-2">
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Estado</label>
                    <select name="estadoPersonal" id="estadoPersonal" class="form-control">
                        <option value="1" <?php if ($personal["estado_personal"] == "1") : ?>selected<?php endif; ?>>Activo</option>
                        <option value="0" <?php if ($personal["estado_personal"] == "0") : ?>selected<?php endif; ?>>Inactivo</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- DESCOMENTAR PARA VER CAMPO ARCHIVOS CON DROPZONE -->
        <!-- <div class="row">
            <div class="col-sm-12">
                <label for="">Archivos Adjuntos</label>
                <div id="actions" class="row">
                    <div class="col-md-8">
                        <div class="btn-group w-100">
                            <span class="btn btn-success col fileinput-button">
                                <i class="fas fa-plus"></i>
                                <span>Añadir archivos</span>
                            </span>
                            <button type="submit" class="btn btn-primary col start">
                                <i class="fas fa-upload"></i>
                                <span>Subir</span>
                            </button>
                            <button type="reset" class="btn btn-warning col cancel">
                                <i class="fas fa-times-circle"></i>
                                <span>Cancelar subida</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center">
                        <div class="fileupload-process w-100">
                            <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table table-striped files" id="previews">
                    <div id="template" class="row mt-2">
                        <div class="col-auto">
                            <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                        </div>
                        <div class="col d-flex align-items-center">
                            <p class="mb-0">
                                <span class="lead" data-dz-name></span>
                                (<span data-dz-size></span>)
                            </p>
                            <strong class="error text-danger" data-dz-errormessage></strong>
                        </div>
                        <div class="col-4 d-flex align-items-center">
                            <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                            </div>
                        </div>
                        <div class="col-auto d-flex align-items-center">
                            <div class="btn-group">
                                <button class="btn btn-primary start">
                                    <i class="fas fa-upload"></i>
                                    <span>Subir</span>
                                </button>
                                <button data-dz-remove class="btn btn-warning cancel">
                                    <i class="fas fa-times-circle"></i>
                                    <span>Cancelar</span>
                                </button>
                                <button data-dz-remove class="btn btn-danger delete">
                                    <i class="fas fa-trash"></i>
                                    <span>Eliminar</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- FIN dropzone -->

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
</script>

<!-- Script para el dropzone -->
<!-- <script>
    Dropzone.autoDiscover = false

    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        url: "/target-url", // Set the url
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    myDropzone.on("addedfile", function(file) {
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function() {
            myDropzone.enqueueFile(file)
        }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1"
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true)
    }
    // DropzoneJS Demo Code End
</script> -->