<style>
  #map{
    margin: 10px;
    width: 100%;
    height: 300px;
  }
</style>
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
        <div class="form-group">
          <label for="">Ubicación</label>

          <input type="text" class="form-control" id="ubicacionCli">
          <div id="map"></div>

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

<!--validar formulario nuevo cliente-->
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



<!--funcion que permite manipular el mapa-->
<!--
<script type="text/javascript">
function initMap() {
// Configuración del mapa
var mapProp = {
center: new google.maps.LatLng(-17.36650567763735, -66.14541385351319),
zoom: 16,
mapTypeId: google.maps.MapTypeId.ROADMAP
};
// Agregando el mapa al tag de id divMap
var map = new google.maps.Map(document.getElementById("divMap"), mapProp);

// Creando un marker en el mapa
var marker = new google.maps.Marker({
position: new google.maps.LatLng(-17.36650567763735, -66.14541385351319),
map: map,
title: 'Hello World!',
draggable: true //que el marcador se pueda arrastrar
});

// Registrando el evento drag, en este caso imprime
// en consola la latitud y longitud
/*google.maps.event.addListener(marker,'drag',function(event) {
console.log(event.latLng.lat());
document.getElementById("textLatitude").innerHTML = event.latLng.lat();
document.getElementById("textLongitude").innerHTML = event.latLng.lng();
});*/

}

// Inicializando el mapa cuando se carga la página
google.maps.event.addDomListener(window, 'load', initMap);
</script>
-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<script src="assest/js/main.js"></script>
<script src="assest/js/localizacion.js"></script>
<!--api key google maps-->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyD6bEfxo5LpvCiHF0z51nBsPC_OIUi6Hx4&callback=iniciarMap"></script>