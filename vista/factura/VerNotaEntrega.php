<?php 

require_once "../../controlador/ventaControlador.php";
require_once "../../modelo/ventaModelo.php";

$id=$_GET["id"];

$NotaVenta=ControladorVenta::ctrInfoNotaEntrega($id);
$productos=json_decode($NotaVenta["detalle_ne"],true);
?>
<div class="modal-header">
  <h4 class="modal-title">Nota de Venta</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <div class="row">
    <div class="col-sm-6">

      <table class="table">
        <tr>
          <th># NE</th>
          <td><?php echo $NotaVenta["id_nota_entrega"];?></td>
        </tr>

        <tr>
          <th>Emitido por</th>
          <td><?php echo $NotaVenta["nombre_usuario"];?></td>
        </tr>

        <tr>
          <th>Chofer</th>
          <td><?php echo $NotaVenta["nombre_personal"]." ".$NotaVenta["ap_pat_personal"]." ".$NotaVenta["ap_mat_personal"];?></td>
        </tr>

        <tr>
          <th>Vehículo</th>
          <td><?php echo $NotaVenta["desc_vehiculo"];?></td>
        </tr>

        <tr>
          <th>Fecha</th>
          <td><?php echo $NotaVenta["fecha_hora_ne"];?></td>
        </tr>

        <tr>
          <th>Zona</th>
          <td><?php echo $NotaVenta["zona_venta"];?></td>
        </tr>

      </table>

    </div>
    <div class="col-sm-6">
      <table class="table ">
        <thead class="bg-gradient-secondary">
          <tr>
            <th style="width:200px">Descripción</th>
            <th style="width:50px">Cantidad</th>
            <!-- <th>Precio</th>
            <th>P. Total</th> -->
          </tr>
        </thead>
        <tbody>
          <?php
          $total=0;
          foreach($productos as $value){
          ?>
          <tr>
            <td><?php echo $value["descProducto"];?></td>
            <td><?php echo $value["cantProducto"];?></td>
            
          </tr>
          <?php
           
          }
          ?>
          <!-- <tr>
            <td colspan="3"><b>Total</b></td>
            <td style="text-decoration: underline"></td>
          </tr> -->

        </tbody>
      </table>
    </div>
  </div>

</div>
