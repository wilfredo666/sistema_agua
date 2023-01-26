<div class="content-wrapper">
  <section class="content-header"></section>
  <section class="content">

    <!--encabezado-->
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h4 class="card-title" style="font-size:20px;">Nota de Venta</h4>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>

      <div class="card-body">
        <!-- <form class="row"> -->
        <div class="row">
          <div class="col-md-5">
            <div class="form-group col-md-12">
              <table id="DataTableProductoNotaVenta" class="display compact">
                <thead>
                  <tr>
                    <th>Cod. Producto</th>
                    <th>Descripción</th>
                    <th>Acción</th>
                    <!-- <td></td> -->
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
          </div>
          <div class="col-md-7">
            <div class="col-md-12">
              <div class="form-group">
                <label for="">#Factura</label>
                <input type="number" class="form-control" name="numFactura" id="numFactura">
                <p class="text-danger" id="error-numFactura"></p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">NIT/CI</label>
                  <div class="input-group">
                    <input list="listCliente" type="text" class="form-control" name="nitCliente" id="nitCliente" placeholder="Ingrese el Carnet o el Nit del cliente">
                    <input type="hidden" id="idCliente" name="idCliente">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button" onclick="busCliente()">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>

                    <datalist id="listCliente">
                      <?php
                      $cliente = ControladorCliente::ctrInfoClientes();

                      foreach ($cliente as $value) {
                      ?>
                        <option value="<?php echo $value["nit_ci_cliente"]; ?>"><?php echo $value["razon_social_cliente"]; ?></option>
                      <?php }
                      ?>
                    </datalist>

                  </div>

                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Razon Social</label>
                  <input type="text" class="form-control" name="rsCliente" id="rsCliente">
                </div>
              </div>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th width=250px;>Descripción</th>
                  <th>Cantidad</th>
                  <th>P.Unitario</th>
                  <th width=100px;>Total</th>
                  <td>&nbsp;</td>
                </tr>
              </thead>
              <tbody id="listaDetalle2">
              </tbody>
              <tfooter>
                <th colspan="3">Total</th>
                <td id="totalVenta"></td>
              </tfooter>

            </table>

          </div>
        </div>
      </div>
      <div class="card-footer">
        <button class="btn btn-success " onclick="emitirFactura()">Guardar</button>
      </div>
    </div>

  </section>
</div>