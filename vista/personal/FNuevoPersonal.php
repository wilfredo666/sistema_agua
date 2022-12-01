
<div class="modal-header">
  <h4 class="modal-title">Registrar nuevo personal</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegPersonal">
  <div class="modal-body">


    <div class="form-group">
      <label for="">Nombre</label>
      <input type="text" class="form-control" id="loginUsuario" name="loginUsuario" onkeyup="ComprobarUsuario()">
      <p id="error-login"></p>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Apellido Paterno</label>
          <input type="text" class="form-control" id="nomUsuario" name="nomUsuario">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Apellido Materno</label>
          <input type="text" class="form-control" id="passUsuario" name="passUsuario">
          <p class="text-danger" id="error-pass"></p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Carnet de identidad</label>
          <input type="text" class="form-control" id="passUsuario2" name="passUsuario2">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Telefono(s)</label>
          <input type="text" class="form-control" id="passUsuario2" name="passUsuario2">
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
          </select>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="">Fecha de nacimiento</label>
          <input type="date" class="form-control" id="passUsuario2" name="passUsuario2">
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="">Fecha de ingreso</label>
          <input type="date" class="form-control" id="passUsuario2" name="passUsuario2">
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
  $(function(){
    $.validator.setDefaults({
      submitHandler:function(){
        RegUsuario()
      }
    })
    $(document).ready(function(){
      $("#FormRegUsuario").validate({
        rules:{
          loginUsuario:{
            required:true,
            minlength:5
          },
          passUsuario:{
            required:true,
            minlength:8
          },
          perfilUsuario:"required"

        },
        errorElement:'span',
        errorPlacement:function(error, element){
          error.addClass('invalid-feedback')
          element.closest('.form-group').append(error)
        },

        highlight: function(element, errorClass, validClass){
          $(element).addClass('.is-invalid')
        },

        unhighlight: function(element, errorClass, validClass){
          $(element).removeClass('.is-invalid')
        }

      })
    })

  })

</script>