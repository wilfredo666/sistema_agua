<?php 

require_once "../../controlador/ventaControlador.php";
require_once "../../modelo/ventaModelo.php";

$id=$_GET["id"];

$factura=ControladorVenta::ctrInfoFactura($id);
$productos=json_decode($factura["detalle"],true);
?>
<div class="modal-header">
  <h4 class="modal-title">Información de factura</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <div class="row">
    <div class="col-sm-6">

      <table class="table">
        <tr>
          <th>#Factura</th>
          <td><?php echo $factura["cod_factura"];?></td>
        </tr>

        <tr>
          <th>Cliente</th>
          <td><?php echo $factura["razon_social_cliente"];?></td>
        </tr>

        <tr>
          <th>Fecha</th>
          <td><?php echo $factura["fecha_emision"];?></td>
        </tr>


        <tr>
          <th>Emitido por</th>
          <td><?php echo $factura["usuario"];?></td>
        </tr>

      </table>

    </div>
    <div class="col-sm-6">
      <table class="table">
        <tbody>
          <th>Producto</th>
          <th>Cantidad</th>
          <th>Precio</th>
          <th>Descuento</th>
          <th>Total</th>
        </tbody>
        <tbody>
          <?php
          $total=0;
          foreach($productos as $value){
          ?>
          <tr>
            <td><?php echo $value["descripcion"];?></td>
            <td><?php echo $value["cantidad"];?></td>
            <td><?php echo $value["precioUnitario"];?></td>
            <td><?php echo $value["montoDescuento"];?></td>
            <td><?php echo $value["subTotal"];?></td>
          </tr>
          <?php
            $total=$total+$value["subTotal"];
          }
          ?>
          <tr>
            <td colspan="4"><b>Total</b></td>
            <td><?php echo $total;?></td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>

</div>
