<?php
require "../../controlador/clienteControlador.php";
require "../../modelo/clienteModelo.php";

$id=$_GET["id"];
$cliente=ControladorCliente::ctrInfoCliente($id);

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
      <td><?php echo $cliente["razon_social_cliente"];?></td>
    </tr>

    <tr>
      <th>Nit/Ci</th>
      <td><?php echo $cliente["nit_ci_cliente"];?></td>
    </tr>

    <tr>
      <th>Dirección</th>
      <td><?php echo $cliente["direccion_cliente"];?></td>
    </tr>

    <tr>
      <th>Nombre(s)</th>
      <td><?php echo $cliente["nombre_cliente"];?></td>
    </tr>

    <tr>
      <th>Contactos</th>
      <td><?php echo $cliente["telefono_cliente"];?></td>
    </tr>
    
  </table>

  </div>
  <div class="col-sm-6">
   <!--aqui va el mapa-->
  </div>
</div>

</div>

