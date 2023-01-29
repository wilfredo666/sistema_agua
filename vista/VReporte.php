<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
   <h4>Lista de Ventas por <span class="text-muted"> Conductor</span></h4>
    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#Factura</th>
          <th>Cliente</th>
          <th>Fecha</th>
          <th>Total</th>
          <td>
            <button class="btn btn-primary" onclick="MNuevoFactura()">Nuevo</button>
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
            <td><?php echo $value["total"];?></td>
          
          <?php
        }
        ?>

      </tbody>
    </table>

  </section>
</div>