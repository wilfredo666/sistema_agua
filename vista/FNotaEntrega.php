<div class="content-wrapper">
  <section class="content-header"></section>
  <section class="content">

    <!--encabezado-->
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h4 class="card-title" style="font-size:20px;">Nota de Entrega</h4>
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

        <div class="col-md-6">
          <div class="form-group col-md-12">
            <table id="DataTableProductoVenta" class="display compact">
              <thead>
                <tr>
                  <th>Cod. Producto</th>
                  <th>Descripción</th>
                  <!-- <th>Precio</th> -->
                  <td></td>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>

        </div>

        <div class="col-md-6">

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Chofer</span>
            </div>
            <select class="form-control select2bs4" name="chofer" id="chofer">
              <option value="">Seleccionar chofer</option>
              <?php
              $chofer = ControladorPersonal::ctrInfoChoferes();
              foreach ($chofer as $value) {
              ?>
                <option value="<?php echo $value["id_personal"]; ?>"><?php echo $value["nombre_personal"] . " " . $value["ap_pat_personal"] . " " . $value["ap_mat_personal"] ?></option>
              <?php
              }
              ?>
            </select>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Vehiculo</span>
            </div>
            <select class="form-control select2bs4" name="vehiculo" id="vehiculo">
              <option>Seleccionar vehiculo</option>
              <?php
              $vehiculo = ControladorVehiculo::ctrVehiculosActivos();
              foreach ($vehiculo as $value) {
              ?>
                <option value="<?php echo $value["id_vehiculo"]; ?>"><?php echo $value["desc_vehiculo"]; ?></option>
              <?php
              }
              ?>
            </select>

          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Zona de venta</span>
            </div>
            <input type="text" class="form-control" name="zonaVenta" id="zonaVenta" placeholder="Ingresar la zona de venta">
          </div>


          <div class="form-group">
            <table class="table">
              <thead>
                <tr>
                  <th style="width:200px">Descripción</th>
                  <th style="width:50px">Cantidad</th>
                  <!-- <th>Precio</th>
                  <th>P. Total</th> -->
                  <td>&nbsp;</td>
                </tr>
              </thead>
              <tbody id="listaDetalle">

              </tbody>
              <tfoot>
                <!-- <tr>
                  <th>
                    Total
                  </th>
                  <td></td>
                  <td></td>
                  <td id="totalNE" style="text-decoration: underline"></td>
                </tr> -->
              </tfoot>
            </table>
          </div>
        </div>

      </div>
      <div class="card-footer">
        <button class="btn btn-success float-right" onclick="emitirNotaEntrega()">Guardar</button>
      </div>
    </div>

  </section>
</div>