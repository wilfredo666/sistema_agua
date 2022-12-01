<?php
require "../../controlador/clienteControlador.php";
require "../../modelo/clienteModelo.php";

$id=$_GET["id"];
$cliente=ControladorCliente::ctrInfoCliente($id);

?>

<div class="modal-header">
  <h4 class="modal-title">Actualizar Cliente</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <form action="" id="FormEditCliente">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Razon Social</label>
          <input type="text" class="form-control" id="rsCliente" name="rsCliente" value="<?php echo $cliente["razon_social_cliente"];?>" readonly>
          <input type="hidden" value="<?php echo $id;?>" name="idCliente">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">NIT/CI</label>
          <input type="text" class="form-control" id="NitCiCliente" name="NitCiCliente" value="<?php echo $cliente["nit_ci_cliente"];?>" readonly>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Dirección</label>
          <input type="text" class="form-control" id="dirCliente" name="dirCliente" value="<?php echo $cliente["direccion_cliente"];?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Nombre(s)</label>
          <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" value="<?php echo $cliente["nombre_cliente"];?>">

        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Telefono(s)</label>
          <input type="text" class="form-control" id="telCliente" name="telCliente" value="<?php echo $cliente["telefono_cliente"];?>">
        </div>
      </div>
      <div class="col-sm-6">

      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Ubicación</label>
        </div>
      </div>
      <div class="col-sm-6">

      </div>
    </div>
  </form>

</div>

<div class="modal-footer justify-content-between">
  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
  <button type="button" class="btn btn-primary" onclick="EditCliente()">Actualizar</button>
</div>
