<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h4>Lista del Vehiculo</h4>
    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Placa</th>
          <th>Descripción</th>
          <th>Imagen</th>
          <td>
            <button class="btn btn-primary" onclick="MNuevoVehiculo()">Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php 
        $Vehiculo=ControladorVehiculo::ctrListaVehiculos();

        foreach($Vehiculo as $value){
        ?>
        <tr>
          <td><?php echo $value["placa_vehiculo"];?></td>
          <td><?php echo $value["desc_vehiculo"];?></td>
          <td><?php
          if($value["imagen_vehiculo"]==""){
            ?>
            <img src="assest/dist/img/vehiculos/vehiculo_default.png" width='50'>
            <?php
          }else{
            ?>
            <img src='assest/dist/img/vehiculos/<?php echo $value["imagen_vehiculo"];?>' width='50'>
            <?php
          }
            ?></td>
          <td>
            <div class="btn-group">
              <button class="btn btn-secondary" onclick="MEditVehiculo('<?php echo $value["id_vehiculo"];?>')">
                <i class="fas fa-edit"></i>
              </button>
              <button class="btn btn-danger" onclick="MEliVehiculo('<?php echo $value["id_vehiculo"];?>')">
                <i class="fas fa-trash"></i>
              </button>
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