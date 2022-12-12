<div class="modal-header">
  <h4 class="modal-title">Nuevo Vehículo</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<form action="" id="FormRegVehiculo" enctype="multipart/form-data">
  <div class="modal-body">
    <div class="form-group">
      <label for="">Nro. de Placa</label>
      <input type="text" class="form-control" id="placaVehiculo" name="placaVehiculo" placeholder="Placa del vehículo">
    </div>
    <div class="form-group">
      <label for="">Descripción</label>
      <input type="text" class="form-control" id="descVehiculo" name="descVehiculo" placeholder="Descripción vehículo, marca, color">
    </div>

    <div class="form-group">
      <label for="">Imagen Vehículo<span class="breadcrumb-item active">(Peso maximo 10MB)</span></label>
      <input type="file" class="form-control" id="ImgVehiculo" name="ImgVehiculo" onchange="previsualizar_vehiculo()">
      <img src="assest/dist/img/vehiculos/vehiculo_default.png" class="img-thumbnail previsualizar" width="200">
    </div>
  </div>

  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    <!-- <button type="button" class="btn btn-primary" onclick="RegVehiculo()">Guardar</button> -->
    <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
  </div>
</form>

<script>
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        RegVehiculo()
      }
    })
    $(document).ready(function() {
      $("#FormRegVehiculo").validate({
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