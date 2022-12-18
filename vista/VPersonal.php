<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h4>Lista del Personal</h4>
    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nombre(s)</th>
          <th>Cargo</th>
          <th>Fecha N.</th>
          <th>Telefono(s)</th>
          <th>Estado</th>
          <td>
            <button class="btn btn-primary" onclick="MNuevoPersonal()">Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $personal = ControladorPersonal::ctrListaPersonal();

        foreach ($personal as $value) {
        ?>
          <tr>
            <td><?php echo $value["nombre_personal"] . " " . $value["ap_pat_personal"] . " " . $value["ap_mat_personal"]; ?></td>
            <td><?php echo $value["cargo_personal"]; ?></td>
            <td><?php echo $value["fecha_nac_personal"]; ?></td>
            <td><?php echo $value["telefono_personal"]; ?></td>
            <?php
            if ($value["estado_personal"] == 1) {
            ?>
              <td><span class="badge badge-success">Activo</span></td>
            <?php
            } else {
            ?>
              <td><span class="badge badge-danger">Inactivo</span></td>
            <?php
            }
            ?>
            <td>
              <div class="btn-group">
                <button class="btn btn-info" onclick="MVerPersonal(<?php echo $value["id_personal"]; ?>)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-secondary" onclick="MEditPersonal('<?php echo $value["id_personal"]; ?>')">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-danger" onclick="MEliPersonal('<?php echo $value["id_personal"]; ?>')">
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