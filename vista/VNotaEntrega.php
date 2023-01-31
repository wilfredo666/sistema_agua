<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
   <h4>Notas de Entrega</h4>
    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th># NE</th>
          <th>Emitido por</th>
          <th>Chofer</th>
          <th>Fecha y Hora</th>
          <th>Zona</th>
          <td>
          </td>
        </tr>
      </thead>
      <tbody>
       <?php 
        $notaEntrega=ControladorVenta::ctrInfoNotasEntrega();
        
        foreach($notaEntrega as $value){
          ?>
          <tr>
            <td><?php echo $value["id_nota_entrega"];?></td>
            <td><?php echo $value["nombre_usuario"];?></td>
            <td><?php echo $value["nombre_personal"]." ".$value["ap_pat_personal"];?></td>
            <td><?php echo $value["fecha_hora_ne"];?></td>
            <td><?php echo $value["zona_venta"];?></td>
            <td>
              <div class="btn-group">
                <button class="btn btn-info" onclick="MVerNotaEntrega(<?php echo $value["id_nota_entrega"];?>)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-danger" onclick="MEliNotaEntrega('<?php echo $value["id_nota_entrega"];?>')">
                  <i class="fas fa-trash"></i>
                </button>
                <a href="vista/factura/ImpNotaEntrega.php?id=<?php echo $value["id_nota_entrega"];?>" class="btn btn-success" target="_blank">
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