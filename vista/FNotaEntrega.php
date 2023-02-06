<div class="content-wrapper">
  <section class="content-header"></section>
  <section class="content">

    <!--encabezado-->
    <form id="FNotaEntrega" class="card card-primary card-outline">
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
            <table id="DataTableProd" class="display compact">
              <thead>
                <tr>
                  <th>Cod. Producto</th>
                  <th>Descripción</th>
                  <td></td>
                </tr>
              </thead>
              <tbody>
                <?php
                $producto = ControladorProducto::ctrInfoProductos();
                foreach ($producto as $value) {
                ?><tr>
                    <td><?php echo $value["cod_producto"]; ?></td>
                    <td><?php echo $value["nombre_producto"]; ?></td>
                    <td>
                      <div class="btn-group"  >
                        <button type="button" class="btn btn-info" onclick="agregarCarrito(<?php echo $value["id_producto"]; ?>)">
                          <i class="fas fa-plus" ></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                <?php
                }
                ?>
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
              <option value="">Seleccionar vehiculo</option>
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


          <table class="table">
            <thead>
              <tr>
                <th style="width:300px">Descripción</th>
                <th style="width:50px">Cantidad</th>

                <td>&nbsp;</td>
              </tr>
            </thead>
            <tbody id="listaDetalle">
            </tbody>

          </table>
        </div>

      </div>

      <div class="card-footer">
        <button class="btn btn-success float-right">Guardar</button>
      </div>

    </form>
  </section>
</div>