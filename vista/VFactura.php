<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h4>Lista de Ventas</h4>
    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#Factura</th>
          <th>Cliente</th>
          <th>Fecha</th>
          <th>Usuario</th>
          <th>Total</th>
          <th>Estado</th>
          <td>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php 
        $factura=ControladorVenta::ctrInfoVentas();

        foreach($factura as $value){
        ?>
        <tr>
          <td><?php echo $value["codigo_factura"];?></td>
          <td><?php echo $value["razon_social_cliente"];?></td>
          <td><?php echo $value["fecha_emision"];?></td>

          <td><?php echo $value["login_usuario"];?></td>

          <td><?php echo $value["total"];?></td>
          <td id="estadoFactura_<?php echo $value["id_factura"];?>">
            <?php
          if($value["estado_factura"]==1){
            ?>
            <span class="badge badge-success">Emitido</span>
            <?php
          }else if($value["estado_factura"]==2){
            ?>
            <button type="button" class="btn btn-block btn-warning btn-xs" onclick="cmbEstadoVenta(<?php echo $value["id_factura"]?>)">Pendiente</button>
            <?php
          }else{
            ?>
            <span class="badge badge-danger">Anulado</span>
            <?php
          }?>
          </td>

          <td>
            <div class="btn-group">
              <button class="btn btn-info" onclick="MVerFactura(<?php echo $value["id_factura"];?>)">
                <i class="fas fa-eye"></i>
              </button>
              <button class="btn btn-danger" onclick="MAnularFactura(<?php echo $value["id_factura"];?>)">
                <i class="fas fa-trash"></i>
              </button>
              <a href="vista/factura/impNotaVenta.php?id=<?php echo $value["id_factura"];?>" class="btn btn-success" target="_blank">
                <i class="fas fa-print"></i>
              </a>
            </div>
          </td>
        </tr>

        <?php
        }
        ?>

      </tbody>
    </table>

  </section>
</div>

