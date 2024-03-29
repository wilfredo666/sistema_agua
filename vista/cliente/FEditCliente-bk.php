<?php
require "../../controlador/clienteControlador.php";
require "../../modelo/clienteModelo.php";

//$id = $_GET["id"];
$id = 6;
$cliente = ControladorCliente::ctrInfoCliente($id);


$razonSocial = $cliente["razon_social_cliente"]; 

$rzCliente = preg_replace('([^A-Za-z0-9])', '', $razonSocial);

?>

<div class="modal-header encabezado">
  <h4 class="modal-title font-weight-light">Actualizar datos del Cliente</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditCliente">
  <div class="modal-body">

    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Razon Social</label>
          <input type="text" class="form-control" id="rsCliente" name="rsCliente" value="<?php echo $cliente["razon_social_cliente"]; ?>" readonly>
          <input type="hidden" value="<?php echo $id; ?>" name="idCliente">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">NIT/CI</label>
          <input type="text" class="form-control" id="NitCiCliente" name="NitCiCliente" value="<?php echo $cliente["nit_ci_cliente"]; ?>" readonly>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Dirección</label>
          <input type="text" class="form-control" id="dirCliente" name="dirCliente" value="<?php echo $cliente["direccion_cliente"]; ?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Nombre(s)</label>
          <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" value="<?php echo $cliente["nombre_cliente"]; ?>">

        </div>
      </div>
      
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Telefono(s)</label>
          <input type="text" class="form-control" id="telCliente" name="telCliente" value="<?php echo $cliente["telefono_cliente"]; ?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Precio de entrega</label>
          <input type="number" class="form-control" id="precioEntregaCli" name="precioEntregaCli" value="<?php echo $cliente["precio_entrega"]; ?>">
        </div>
      </div>
      
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Ubicación</label>
        </div>
      </div>
      
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Fachada <span class="breadcrumb-item active">(Peso maximo 10MB)</span></label>
          <input type="file" class="form-control" id="ImgFachada" name="ImgFachada" onchange="previsualizar_fachada()">
          <!-- <img src="assest/dist/img/fachadas/casa_default.png" class="img-thumbnail previsualizar" width="150"> -->
          <input type="hidden" id="imgActFachada" name="imgActFachada" value="<?php echo $cliente["foto_fachada"]; ?>">
          <?php
          if ($cliente["foto_fachada"] == "") {
          ?>
            <img src="assest/dist/img/fachadas/casa_default.png" class="img-thumbnail previsualizar" width="150">
          <?php
          } else {
          ?>
            <img src="assest/dist/img/fachadas/<?php echo $cliente["foto_fachada"]; ?>" class="img-thumbnail previsualizar" width="200">
          <?php
          }
          ?>
        </div>
      </div>
      
    </div>
    <div class="col-sm-5 mb-0">
      <div class="form-group text-center justify-content-center align-items-center mb-0">
        <label for="">Adjuntar archivos</label>
        <button type="button" class="btn  bg-gradient-success btn-sm mb-2" style="width: 80%;" onclick="MSubirArchivosCli('<?php echo $rzCliente ?>')">
          <i class="fas fa-upload"></i> Subir archivos
        </button>
      </div>
    </div>
    
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    <!-- <button type="button" class="btn btn-primary" onclick="EditCliente()">Actualizar</button> -->
    <button type="submit" class="btn btn-primary">Actualizar</button>
  </div>
</form>

