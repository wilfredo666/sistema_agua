<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  </section>

  <section class="content">
    <style> 
      #map{
        margin: 10px 10px 10px 0px;
        width: 100%;
        height: 300px;
      }
    </style>
    <form id="FormRegCliente" class="card card-primary card-outline">
      <div class="card-header">
        <h4 class="card-title" style="font-size:20px;">Registrar Nuevo Cliente</h4>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>

      <div class="card-body row">

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
                <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" placeholder="Persona a cargo; Gerente, Administrador, Secretaria">
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
<input type="hidden" id="ubiLatitud" name="ubiLatitud">
<input type="hidden" id="ubiLongitud" name="ubiLongitud">
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="card-footer">
        <!-- <button type="button" class="btn btn-primary" onclick="RegCliente()">Guardar</button> -->
        <button type="submit" class="btn btn-primary float-right" id="guardar">Guardar</button>
      </div>
    </form>
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assest/js/main.js"></script>
    <script src="assest/js/localizacion.js"></script>
    <!--api key google maps-->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyD6bEfxo5LpvCiHF0z51nBsPC_OIUi6Hx4&callback=iniciarMap"></script>
  </section>
</div>