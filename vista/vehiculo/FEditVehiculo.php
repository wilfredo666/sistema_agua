<?php
require "../../controlador/vehiculoControlador.php";
require "../../modelo/vehiculoModelo.php";

$id = $_GET["id"];
$vehiculo = ControladorVehiculo::ctrInfoVehiculo($id);
?>

<div class="modal-header encabezado">
  <h4 class="modal-title font-weight-light">Editar datos de Vehículo</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form action="" id="FormEditVehiculo" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group">
            <label for="">Nro. de Placa</label>
            <input type="text" class="form-control" id="placaVehiculo" name="placaVehiculo" value="<?php echo $vehiculo["placa_vehiculo"] ?>">
            <input type="hidden" id="idVehiculo" name="idVehiculo" value="<?php echo $vehiculo["id_vehiculo"] ?>">
        </div>
        <div class="row">
            <div class="form-group col-md-8">
                <label for="">Descripción</label>
                <input type="text" class="form-control" id="descVehiculo" name="descVehiculo" value="<?php echo $vehiculo["desc_vehiculo"] ?>">
            </div>

            <div class="col-md-4">
                <label for="">Estado</label>
                <select class="form-control" name="estadoVehiculo" id="estadoVehiculo" >
                    <option value="0" <?php if($vehiculo["estado_vehiculo"]== 0):?> selected <?php endif;?>>Inactivo</option>
                    <option value="1" <?php if($vehiculo["estado_vehiculo"]== 1):?> selected <?php endif;?>>Activo</option>
                </select>
            </div>
        </div>


        <div class="form-group">
            <label for="">Imagen Vehículo<span class="breadcrumb-item active">(Peso maximo 10MB)</span></label>
            <input type="file" class="form-control" id="ImgVehiculo" name="ImgVehiculo" onchange="previsualizar_vehiculo()">
            <!-- <img src="assest/dist/img/vehiculos/vehiculo_default.png" class="img-thumbnail previsualizar" width="200"> -->
            <input type="hidden" id="imgActVehiculo" name="imgActVehiculo" value="<?php echo $vehiculo["imagen_vehiculo"] ?>">
            <?php
            if ($vehiculo["imagen_vehiculo"] == "") {
            ?>
                <img src="assest/dist/img/vehiculos/vehiculo_default.png" alt="" class="img-thumbnail previsualizar" width="200">
            <?php
            } else {
            ?>
                <img src="assest/dist/img/vehiculos/<?php echo $vehiculo["imagen_vehiculo"] ?>" alt="" class="img-thumbnail previsualizar" width="200">
            <?php
            }
            ?>
        </div>
    </div>

    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <!-- <button type="button" class="btn btn-primary" onclick="RegVehiculo()">Guardar</button> -->
        <button type="submit" class="btn btn-primary" id="guardar">Actualizar</button>
    </div>
</form>

<script>
    $(function() {
        $.validator.setDefaults({
            submitHandler: function() {
                EditVehiculo()
            }
        })
        $(document).ready(function() {
            $("#FormEditVehiculo").validate({
                rules: {
                    placaVehiculo: {
                        required: true,
                        minlength: 6
                    },
                    descVehiculo: {
                        minlength: 3
                    },
                    /* perfilUsuario:"required" */
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback')
                    element.closest('.form-group').append(error)
                },

                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid')
                    /* .is-invalid */
                },

                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid')
                }
            })
        })
    })
</script>