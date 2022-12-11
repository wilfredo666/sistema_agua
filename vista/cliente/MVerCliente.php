<?php
require "../../controlador/clienteControlador.php";
require "../../modelo/clienteModelo.php";

$id = $_GET["id"];
$cliente = ControladorCliente::ctrInfoCliente($id);

?>
<div class="modal-header">
  <h4 class="modal-title">Información de cliente</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <div class="row">
    <div class="col-sm-6">
      <table class="table">

        <tr>
          <th>Razon Social</th>
          <td><?php echo $cliente["razon_social_cliente"]; ?></td>
        </tr>

        <tr>
          <th>Nit/Ci</th>
          <td><?php echo $cliente["nit_ci_cliente"]; ?></td>
        </tr>

        <tr>
          <th>Dirección</th>
          <td><?php echo $cliente["direccion_cliente"]; ?></td>
        </tr>

        <tr>
          <th>Nombre(s)</th>
          <td><?php echo $cliente["nombre_cliente"]; ?></td>
        </tr>

        <tr>
          <th>Contactos</th>
          <td><?php echo $cliente["telefono_cliente"]; ?></td>
        </tr>

        <tr>
          <th>Fecha de Registro</th>
          <td><?php echo $cliente["fecha_registro_cliente"]; ?></td>
        </tr>

        <tr>
          <th>Precio de Entrega</th>
          <td><?php echo $cliente["precio_entrega"]; ?></td>
        </tr>


      </table>

    </div>
    <div class="col-sm-6 text-center">
      <!--aqui va el mapa-->
      <label for="">Fachada</label> <br>
      <?php
      if ($cliente["foto_fachada"] == "") {
      ?>
        <img src="assest/dist/img/fachadas/casa_default.png" alt="" width="300">
      <?php
      } else {
      ?>
        <img src="assest/dist/img/fachadas/<?php echo $cliente["foto_fachada"] ?>" alt="" width="350">
      <?php
      }
      ?>
    </div>
  </div>

</div>