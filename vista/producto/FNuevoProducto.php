<div class="modal-header">
  <h4 class="modal-title">Nuevo Producto</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <form action="" id="FormRegProducto" enctype="multipart/form-data">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Codigo Producto</label>
          <input type="text" class="form-control" id="codProducto" name="codProducto" placeholder="Codigo usado por la empresa">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Descripción</label>
          <input type="text" class="form-control" id="descProducto" name="descProducto">
        </div>
      </div>
    </div>


    <div class="row">

      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Precio de Venta</label>
          <input type="number" class="form-control" id="precioProducto" name="precioProducto" step="0.1">

        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Unidad de medida</label>
          <select name="UMProducto" id="UMProducto" class="form-control">
            <option value="">Seleccionar</option>
            <option value="ML">ML</option>
            <option value="LT">LT</option>
          </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Imagen <span class="breadcrumb-item active">(Peso maximo 10MB)</span></label>
          <input type="file" class="form-control" id="ImgProducto" name="ImgProducto" onchange="previsualizar()">

          <img src="assest/dist/img/productos/product_default.png" class="img-thumbnail previsualizar" width="200">

        </div>
      </div>
    </div>

  </form>

</div>

<div class="modal-footer justify-content-between">
  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
  <button type="button" class="btn btn-primary" onclick="RegProducto()">Guardar</button>
</div>
