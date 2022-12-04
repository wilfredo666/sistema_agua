<?php
require "../../controlador/productoControlador.php";
require "../../modelo/productoModelo.php";

$id=$_GET["id"];
$producto=ControladorProducto::ctrInfoProducto($id);

?>


<div class="modal-header">
  <h4 class="modal-title">Editar Producto</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <form action="" id="FormEditProducto" enctype="multipart/form-data">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Codigo Producto</label>
          <input type="text" class="form-control" id="codProducto" name="codProducto" placeholder="Codigo usado por la empresa" value="<?php echo $producto["cod_producto"];?>" readonly>
          <input type="hidden" value="<?php echo $id;?>" name="idProducto">
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Descripción</label>
          <input type="text" class="form-control" id="descProducto" name="descProducto" value="<?php echo $producto["nombre_producto"];?>">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Precio</label>
          <input type="text" class="form-control" id="precioProducto" name="precioProducto" value="<?php echo $producto["precio_venta_producto"];?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Unidad de medida</label>
          <input type="text" class="form-control" id="UMProducto" name="UMProducto" placeholder="Unidad de medida usada por la empresa" value="<?php echo $producto["unidad_medida"];?>">
        </div>
      </div>
    </div>

  <div class="row">
  <div class="col-sm-6">
    <div class="form-group">
      <label for="">Imagen <span class="breadcrumb-item active">(Peso maximo 10MB)</span></label>
      <input type="file" class="form-control" id="ImgProducto" name="ImgProducto" onchange="previsualizar()">
      <input type="hidden" id="imgActProducto" name="imgActProducto" value="<?php echo $producto["imagen_producto"];?>">
      <?php if($producto["imagen_producto"]==""){
  ?>
  <img src="assest/dist/img/productos/product_default.png" class="img-thumbnail previsualizar" width="200">
  <?php
}else{
  ?>
  <img src="assest/dist/img/productos/<?php echo $producto["imagen_producto"];?>" class="img-thumbnail previsualizar" width="200">
  <?php
}
      ?>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="form-group">
      <label for="">Estado</label>
      <select name="estadoProducto" id="estadoProducto" class="form-control">
        <option value="1" <?php if($producto["estado"]==1):?> selected <?php endif;?>>Disponible</option>
        <option value="0" <?php if($producto["estado"]==0):?> selected <?php endif;?>>No disponible</option>
      </select>
    </div>
  </div>
  </div>

  </form>

</div>

<div class="modal-footer justify-content-between">
  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
  <button type="button" class="btn btn-primary" onclick="EditProducto()">Actualizar</button>
</div>