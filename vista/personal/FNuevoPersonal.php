<div class="modal-header encabezado">
  <h4 class="modal-title font-weight-light">Registrar Nuevo Personal</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegPersonal">
  <div class="modal-body">

    <div class="form-group">
      <label for="">Nombre</label>
      <input type="text" class="form-control" id="nomPersonal" name="nomPersonal">
      <!-- <p id="error-login"></p> -->
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Apellido Paterno</label>
          <input type="text" class="form-control" id="patPersonal" name="patPersonal">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Apellido Materno</label>
          <input type="text" class="form-control" id="matPersonal" name="matPersonal">
          <!-- <p class="text-danger" id="error-pass"></p> -->
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          <label for="">Carnet de identidad</label>
          <input type="text" class="form-control" id="ciPersonal" name="ciPersonal">
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="">Telefono(s)</label>
          <input type="text" class="form-control" id="telPersonal" name="telPersonal">
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="">Teléfono de referencia</label>
          <input type="text" class="form-control" id="contactoReferencia" name="contactoReferencia">
        </div>
      </div>

    </div>

    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          <label for="">Cargo</label>
          <select name="cargoPersonal" id="cargoPersonal" class="form-control">
            <option value="">Seleccionar</option>
            <option value="Secretaria">Secretaria</option>
            <option value="Chofer">Chofer</option>
            <option value="Administracion">Administracion</option>
            <option value="Planta">Planta</option>
          </select>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="">Fecha de nacimiento</label>
          <input type="date" class="form-control" id="fechaNacPersonal" name="fechaNacPersonal">
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="">Fecha de ingreso</label>
          <input type="date" class="form-control" id="fechaIngPersonal" name="fechaIngPersonal">
        </div>
      </div>
    </div>

  </div>

  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
  </div>
</form>


<script>
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        RegPersonal()
      }
    })
    $(document).ready(function() {
      $("#FormRegPersonal").validate({
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
  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
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