<div class="content-wrapper">
  <section class="content-header"></section>
  <section class="content">

    <!--encabezado-->
    <div class="card">
      <div class="card-header">
        <h3>Formulario de Venta <span class="text-muted">- Encabezado</span></h3>
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
        <form class="row">
          <div class="col-md-7">
            <div class="form-group col-md-12">
              <table id="DataTableProductoVenta" class="display compact">
                <thead>
                  <tr>
                    <th>Cod. Producto</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <td></td>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label for="">#Factura</label>
              <input type="number" class="form-control" name="numFactura" id="numFactura">
              <p class="text-danger" id="error-numFactura"></p>
            </div>

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
                  $cliente=ControladorCliente::ctrInfoClientes();

                  foreach($cliente as $value){
                  ?>
                  <option value="<?php echo $value["nit_ci_cliente"];?>"><?php echo $value["razon_social_cliente"];?></option>
                  <?php }
                  ?>
                </datalist>

              </div>

            </div>

            <div class="form-group">
              <label for="">Razon Social</label>
              <input type="text" class="form-control" name="rsCliente" id="rsCliente">
            </div>

            <!-- <div class="card" style="background-colo:#f2f2f2">
<div class="input-group sm-3">
<div class="input-group-prepend">
<span class="input-group-text">Subtotal</span>
</div>
<input type="text" class="form-control" name="subTotal" id="subTotal" value="0.00" readonly style="text-align:right;">
</div>

<div class="input-group sm-3">
<div class="input-group-prepend">
<span class="input-group-text">Descuento</span>
</div>
<input type="text" class="form-control" name="descAdicional" id="descAdicional" value="0.00" style="text-align:right;" onkeyup="calcularTotal()">
</div>

<div class="input-group sm-3">
<div class="input-group-prepend">
<span class="input-group-text">Total</span>
</div>
<input type="text" class="form-control" name="totApagar" id="totApagar" value="0.00" readonly style="text-align:right;">
</div>
</div>
-->
          </div>
        </form>
      </div>
      <div class="card-footer">
        <button class="btn btn-success" onclick="emitirFactura()">Guardar</button>
      </div>
    </div>

    <!--agregar a carrito-->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Agregar productos</h3>
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
        <div class="row">
          <div class="form-group col-md-2">
            <label for="">Cod. Producto</label>
            <div class="input-group form-group">
              <input list="listaProductos" type="text" class="form-control" name="codProducto" id="codProducto">
              <input type="hidden" id="codProductoSin" name="codProductoSin">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" onclick="busCod()">
                  <i class="fas fa-search"></i>
                </button>
              </div>
              <datalist id="listaProductos">
                <?php 
                $productos=ControladorProducto::ctrInfoProductosVenta();
                foreach($productos as $value){
                ?>
                <option value="<?php echo $value["cod_producto"];?>"><?php echo $value["nombre_producto"];?></option>

                <?php
                }
                ?>

              </datalist>

            </div>
          </div>

          <div class="form-group col-md-4">
            <label for="">Concepto</label>
            <div class="input-group form-group">
              <input type="text" class="form-control" name="conceptoProducto" id="conceptoProducto">
            </div>
          </div>

          <div class="form-group col-md-1">
            <label for="">Cantidad</label>
            <div class="input-group form-group">
              <input type="number" class="form-control" name="cantProducto" id="cantProducto" value="0" onkeyup="calcularPreProd()">
            </div>
          </div>

          <div class="form-group col-md-1">
            <label for="">U. Medida</label>
            <div class="input-group form-group">
              <input type="text" class="form-control" name="uniMedida" id="uniMedida">
              <input type="hidden" id="uniMedidaSin" name="uniMedidaSin">
            </div>
          </div>

          <div class="form-group col-md-1">
            <label for="">P. Unit</label>
            <div class="input-group form-group">
              <input type="text" class="form-control" name="preUnitario" id="preUnitario" readonly>
              <input type="hidden" name="preUnitActual" id="preUnitActual">
            </div>
          </div>

          <div class="form-group col-md-1">
            <label for="">Descuento</label>
            <div class="input-group form-group">
              <input type="text" class="form-control" name="descProducto" id="descProducto" value="0.00" onkeyup="descPreProducto()">
            </div>
          </div>

          <div class="form-group col-md-1">
            <label for="">P. Total</label>
            <div class="input-group form-group">
              <input type="text" class="form-control" name="preTotal" id="preTotal" readonly value="0.00">
            </div>
          </div>

          <div class="form-group col-md-1">
            <label for="">&nbsp;</label>
            <div class="input-group form-group">
              <div class="input-group form-group">
                <button class="btn btn-info btn-circle form-control" onclick="agregarCarrito()">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer"></div>
    </div>

    <!--carrito-->
    <div class="card">
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>Descripción</th>
              <th>Cantidad</th>
              <th>P. Unitario</th>
              <th>Descuento</th>
              <th>P. Total</th>
              <td>&nbsp;</td>
            </tr>
          </thead>
          <tbody id="listaDetalle">

          </tbody>

        </table>
      </div>
    </div>
  </section>
</div>