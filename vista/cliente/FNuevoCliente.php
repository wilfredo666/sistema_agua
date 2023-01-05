<div class="modal-header encabezado">
  <h4 class="modal-title">Registrar Nuevo Cliente</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<form action="" id="FormRegCliente">
  <div class="modal-body">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Razon Social</label>
          <input type="text" class="form-control" id="rsCliente" name="rsCliente">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">NIT/CI</label>
          <input type="text" class="form-control" id="NitCiCliente" name="NitCiCliente">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Dirección</label>
          <input type="text" class="form-control" id="dirCliente" name="dirCliente">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Nombre(s)</label>
          <input type="text" class="form-control" id="nombreCliente" name="nombreCliente">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Telefono(s)</label>
          <input type="text" class="form-control" id="telCliente" name="telCliente">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Precio de entrega</label>
          <input type="number" class="form-control" id="precioEntregaCli" name="precioEntregaCli" step="0.1">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Fachada <span class="breadcrumb-item active">(Peso maximo 10MB)</span></label>
          <input type="file" class="form-control" id="ImgFachada" name="ImgFachada" onchange="previsualizar_fachada()">
          <img src="assest/dist/img/fachadas/casa_default.png" class="img-thumbnail previsualizar" width="150">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Ubicación</label>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    <!-- <button type="button" class="btn btn-primary" onclick="RegCliente()">Guardar</button> -->
    <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
  </div>
</form>


<script>
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        RegCliente()
      }
    })
    $(document).ready(function() {
      $("#FormRegCliente").validate({
        rules: {
          rsCliente: {
            required: true,
            minlength: 3
          },
          NitCiCliente: {
            required: true,
            minlength: 3
          },
          dirCliente: {
            minlength: 3
          },
          telCliente: {
            minlength: 3
          },
          precioEntregaCli: {
            required: true,
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
