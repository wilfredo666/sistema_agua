<div class="content-wrapper">
  <section class="content-header"></section>
  <section class="content">

    <!--encabezado-->
    <form id="FNotaVenta" class="card card-primary card-outline">
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

      <div class="card-body row">

        <div class="col-md-6">
          <div class="form-group col-md-12">
            <table id="DataTableProd" class="display compact">
              <thead>
                <tr>
                  <th>Cod. Producto</th>
                  <th>Descripción</th>
                  <th>Acción</th>
                  <!--        <td>
                    $botones="<div class='btn-group'>
                             <button type='button' class='btn btn-info btn-block btn-sm' onclick='agregarCarrito2(".$value['id_producto'].")'>
                                <i class='fas fa-plus'></i>
                             </button>
                            </div>";
                          </td> -->
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
                      <div class="btn-group">
                        <button type="button" class="btn btn-info" onclick="agregarCarrito2(<?php echo $value["id_producto"]; ?>)">
                          <i class="fas fa-plus"></i>
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
              <span class="input-group-text">#Factura</span>
            </div>
            <input type="number" class="form-control" name="numFactura" id="numFactura">
            <p class="text-danger" id="error-numFactura"></p>
          </div>


          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"> NIT/CI </span>
            </div>
            <!-- <div class="input-group"> -->
            <input list="listCliente" type="text" class="form-control" name="nitCliente" id="nitCliente" placeholder="Ingrese el Carnet o el Nit del cliente">
            <input type="hidden" id="idCliente" name="idCliente">
            <div class="input-group-append">
              <button class="btn btn-secondary" type="button" onclick="busCliente()">
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
            <!-- </div> -->
          </div>


          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Razon Social</span>
            </div>
            <input type="text" class="form-control" name="rsCliente" id="rsCliente">
          </div>


          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Personal</span>
            </div>
            <select class="form-control select2bs4" name="personal" id="personal">
              <option value="">Seleccionar personal</option>
              <?php
              $personal = ControladorUsuario::ctrUsuarioDisp();
              foreach ($personal as $value) {
              ?>
                <option value="<?php echo $value["id_personal"]; ?>"><?php echo $value["nombre_personal"] . " " . $value["ap_pat_personal"] . " " . $value["ap_mat_personal"] ?></option>
              <?php
              }
              ?>
            </select>
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

              <tr>

                <td colspan="2"></td>
                <td colspan="3">
                  <div class="input-group sm-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="padding:0.15rem 0.5rem">Subtotal</span>
                    </div>
                    <input type="text" class="form-control form-control-sm" name="totalVenta" id="totalVenta" value="0.00" readonly style="text-align:right">
                  </div>

                  <div class="input-group sm-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="padding:0.15rem 0.5rem">Descuento</span>
                    </div>
                    <input type="text" id="descuentoVenta" class="form-control form-control-sm" onkeyup="calcularTotal()" value="0.00" style="text-align:right">
                  </div>

                  <div class="input-group sm-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="padding:0.15rem 0.5rem">Total</span>
                    </div>
                    <input type="text" id="netoVenta" readonly class="form-control form-control-sm" style="text-align:right" value="0.00">
                  </div>
                </td>

                <!--<th>Subtotal</th>
<td><input type="text" id="totalVenta" readonly class="form-control form-control-sm"></td>

<th>Descuento</th>
<td><input type="text" id="descuentoVenta" class="form-control form-control-sm" onkeyup="calcularTotal()" value="0"></td>-->
              </tr>

              <!--<th colspan="3">Total</th>
<td><input type="text" id="netoVenta" readonly class="form-control form-control-sm"></td>-->


            </tfooter>

          </table>

        </div>

      </div>
      <div class="card-footer">
        <button class="btn btn-success float-right">Guardar</button>
      </div>
    </form>

  </section>
</div>