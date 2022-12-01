<div class="modal-header">
  <h4 class="modal-title">Nuevo Vehículo</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <form action="" id="FormRegProducto" enctype="multipart/form-data">

    <div class="form-group">
      <label for="">Nro. de Placa</label>
      <input type="text" class="form-control" id="codProducto" name="codProducto" placeholder="Codigo usado por la empresa">
    </div>
    <div class="form-group">
      <label for="">Descripción</label>
      <input type="text" class="form-control" id="descProducto" name="descProducto">
    </div>

    <div class="form-group">
      <label for="">Imagen <span class="breadcrumb-item active">(Peso maximo 10MB)</span></label>
      <input type="file" class="form-control" id="ImgProducto" name="ImgProducto" onchange="previsualizar()">

      <img src="assest/dist/img/vehiculos/vehiculo_default.png" class="img-thumbnail previsualizar" width="200">

    </div>

  </form>

</div>

<div class="modal-footer justify-content-between">
  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
  <button type="button" class="btn btn-primary" onclick="RegVehiculo()">Guardar</button>
</div>
