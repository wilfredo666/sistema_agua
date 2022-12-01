
<div class="modal-header">
  <h4 class="modal-title">Registrar nuevo usuario</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegUsuario">
  <div class="modal-body">


    <div class="form-group">
      <label for="">Login de usuario</label>
      <input type="text" class="form-control" id="loginUsuario" name="loginUsuario" onkeyup="ComprobarUsuario()">
      <p id="error-login"></p>
    </div>
    <div class="form-group">
      <label for="">Nombre de usuario</label>
      <input type="text" class="form-control" id="nomUsuario" name="nomUsuario">
    </div>
    <div class="form-group">
      <label for="">Password</label>
      <input type="password" class="form-control" id="passUsuario" name="passUsuario">
      <p class="text-danger" id="error-pass"></p>
    </div>
    <div class="form-group">
      <label for="">Repetir Password</label>
      <input type="password" class="form-control" id="passUsuario2" name="passUsuario2">
    </div>
    <div class="form-group">
      <label for="">Perfil de usuario</label>
      <select name="perfilUsuario" id="perfilUsuario" class="form-control">
        <option value="">Seleccionar</option>
        <option value="Cajero">Cajero</option>
        <option value="Administrador">Administrador</option>
      </select>
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